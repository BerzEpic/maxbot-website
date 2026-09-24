<?php
/** Fixed-destination adapter; no mailing list, credentials, email delivery or local lead store. */
final class LaunchInterest
{
    public const ENDPOINT = 'https://climaxweb.net/rest-free/api/v1/leads';

    public static function validate($input): array
    {
        if (!is_array($input) || count($input) !== 3 || array_diff(array_keys($input), ['email', 'consent', 'edition'])
            || !isset($input['email'], $input['edition']) || !is_string($input['email']) || !is_string($input['edition'])
            || !in_array($input['edition'], ['standard', 'pro'], true)) {
            return self::failure(422, 'invalid_request');
        }
        $email = trim($input['email']);
        if (strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/[\x00-\x20\x7f]/', $email)) {
            return self::failure(422, 'invalid_email');
        }
        if (($input['consent'] ?? null) !== true) return self::failure(422, 'consent_required');
        return ['email' => $email, 'consent' => true, 'edition' => $input['edition']];
    }

    public static function failure(int $status, string $code): array
    {
        return ['status' => $status, 'body' => ['success' => false, 'code' => $code]];
    }

    public static function submit(array $input, array $config, callable $transport): array
    {
        $valid = self::validate($input);
        if (isset($valid['status'])) return $valid;
        $edition = $config['editions'][$valid['edition']] ?? [];
        if (($config['enabled'] ?? false) !== true || !is_callable($edition['build_payload'] ?? null)
            || !is_callable($edition['confirms_launch_consent'] ?? null)) {
            return self::failure(503, 'signup_unavailable');
        }
        try {
            // Both callbacks are installed server-side only after reviewing a supported contract.
            // The current API's tutorial consent MUST NOT be reused for launch-only consent.
            $payload = $edition['build_payload']($valid);
            if (!is_array($payload) || ($payload['email'] ?? null) !== $valid['email'] || ($payload['consent'] ?? null) !== true) {
                return self::failure(503, 'signup_unavailable');
            }
            $upstream = $transport(self::ENDPOINT, $payload);
            $status = $upstream['status'] ?? 0;
            $body = $upstream['body'] ?? null;
            if ($status === 429) return self::failure(429, 'rate_limited');
            if ($status === 503 || $status === 0) return self::failure(503, 'signup_unavailable');
            if ($status === 422) {
                return self::failure(422, is_array($body) && ($body['code'] ?? '') === 'consent_required' ? 'consent_required' : 'invalid_request');
            }
            // HTTP success alone, a duplicate, an opt-out, or an old tutorial signup is not launch consent.
            if (!is_int($status) || $status < 200 || $status >= 300 || !is_array($body)
                || ($body['success'] ?? null) !== true || ($body['code'] ?? null) !== 'ok'
                || !is_array($body['data'] ?? null)
                || !in_array($body['data']['status'] ?? null, ['accepted', 'confirmed'], true)
                || $edition['confirms_launch_consent']($body, $valid) !== true) {
                return self::failure(502, 'not_confirmed');
            }
            return ['status' => 200, 'body' => ['success' => true, 'code' => 'launch_interest_recorded']];
        } catch (Throwable $error) {
            // Do not echo provider errors, subscriber information, payloads or credentials.
            return self::failure(503, 'signup_unavailable');
        }
    }

    public static function transport(string $url, array $payload): array
    {
        if ($url !== self::ENDPOINT || !function_exists('curl_init')) throw new RuntimeException('Transport unavailable');
        $curl = curl_init($url);
        $response = '';
        curl_setopt_array($curl, [
            CURLOPT_POST => true, CURLOPT_POSTFIELDS => json_encode($payload, JSON_THROW_ON_ERROR),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json', 'Accept: application/json'],
            CURLOPT_CONNECTTIMEOUT => 4, CURLOPT_TIMEOUT => 10, CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS, CURLOPT_SSL_VERIFYPEER => true, CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_WRITEFUNCTION => static function ($handle, $chunk) use (&$response) {
                if (strlen($response) + strlen($chunk) > 32768) return 0;
                $response .= $chunk; return strlen($chunk);
            },
        ]);
        $ok = curl_exec($curl);
        $status = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return ['status' => $ok === false ? 0 : $status, 'body' => json_decode($response, true)];
    }

    /** Six attempts per minute per remote address, without storing raw addresses or emails. */
    public static function allowRequest(string $address): bool
    {
        $directory = sys_get_temp_dir() . '/maxbot-launch-' . substr(hash('sha256', __DIR__), 0, 16);
        if (!is_dir($directory) && !@mkdir($directory, 0700, true) && !is_dir($directory)) throw new RuntimeException('Rate storage unavailable');
        $file = @fopen($directory . '/rate.json', 'c+');
        if (!$file) throw new RuntimeException('Rate storage unavailable');
        try {
            if (!flock($file, LOCK_EX)) throw new RuntimeException('Rate lock unavailable');
            $records = json_decode(stream_get_contents($file), true);
            $records = is_array($records) ? $records : [];
            $now = time();
            foreach ($records as $key => $record) if (($record['until'] ?? 0) <= $now) unset($records[$key]);
            $key = hash('sha256', $address);
            $entry = $records[$key] ?? ['until' => $now + 60, 'count' => 0];
            $allowed = $entry['count'] < 6 && (isset($records[$key]) || count($records) < 10000);
            if ($allowed) { $entry['count']++; $records[$key] = $entry; }
            $json = json_encode($records);
            rewind($file);
            if (!ftruncate($file, 0) || fwrite($file, $json) !== strlen($json) || !fflush($file)) throw new RuntimeException('Rate storage unavailable');
            return $allowed;
        } finally { flock($file, LOCK_UN); fclose($file); }
    }
}
