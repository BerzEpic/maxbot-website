<?php
/**
 * Freemius Checkout configuration for the Maxbot marketing website.
 * The browser receives the public ID/key and (in sandbox only) a short-lived,
 * signed token. The product secret MUST remain outside the document root.
 *
 * This does not verify completed payments or activate WordPress licenses.
 */
final class FreemiusCheckout
{
    public const PRODUCT_ID = 42360;
    public const PROFESSIONAL_PLAN_ID = 74609;
    public const PUBLIC_KEY = 'pk_1b72c370ec81ae12f3ef0391946bc';

    /** Read a private config file ONLY if its real path is outside the web directory. */
    private static function privateSettings(): array
    {
        static $cached = null;
        if ($cached !== null) {
            return $cached;
        }
        $cached = [];
        $filename = defined('MAXBOT_FREEMIUS_PRIVATE_FILE') ? constant('MAXBOT_FREEMIUS_PRIVATE_FILE') : '';
        if (!is_string($filename) || $filename === '' || $filename[0] !== '/') {
            return $cached;
        }
        $file = realpath($filename);
        $root = realpath(dirname(__DIR__));
        if ($file === false || $root === false || !is_file($file) || !is_readable($file)
            || $file === $root || strpos($file, $root . DIRECTORY_SEPARATOR) === 0) {
            return $cached;
        }
        $data = require $file;
        if (is_array($data)) {
            $cached = $data;
        }
        return $cached;
    }

    /** Environment variables take precedence over the optional private PHP file. */
    private static function setting(string $environment, string $fileKey): string
    {
        $value = getenv($environment);
        if (is_string($value) && $value !== '') {
            return $value;
        }
        $settings = self::privateSettings();
        return is_string($settings[$fileKey] ?? null) ? $settings[$fileKey] : '';
    }

    public static function mode(): string
    {
        $mode = strtolower(trim(self::setting('MAXBOT_FREEMIUS_CHECKOUT_MODE', 'mode')));
        return in_array($mode, ['sandbox', 'production'], true) ? $mode : 'disabled';
    }

    /** An explicit operator acknowledgement is needed before public sandbox checkout can work. */
    public static function sandboxAllowed(): bool
    {
        $local = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'], true);
        return $local || self::setting('MAXBOT_FREEMIUS_SANDBOX_PROTECTED', 'sandbox_protected') === '1';
    }

    /** Official Freemius PHP sandbox token formula. Never expose the secret. */
    public static function signSandbox(string $context, string $secret): string
    {
        return md5($context . self::PRODUCT_ID . $secret . self::PUBLIC_KEY . 'checkout');
    }

    /** @return array{status:int, body:array<string,mixed>} */
    public static function configuration(): array
    {
        $mode = self::mode();
        if ($mode === 'disabled') {
            return ['status' => 503, 'body' => ['success' => false, 'code' => 'checkout_disabled']];
        }
        $body = [
            'success' => true,
            'mode' => $mode,
            'product_id' => self::PRODUCT_ID,
            'plan_id' => self::PROFESSIONAL_PLAN_ID,
            'public_key' => self::PUBLIC_KEY,
        ];
        if ($mode === 'sandbox') {
            if (!self::sandboxAllowed()) {
                return ['status' => 403, 'body' => ['success' => false, 'code' => 'sandbox_requires_protection']];
            }
            $secret = self::setting('MAXBOT_FREEMIUS_SECRET_KEY', 'secret_key');
            if (!is_string($secret) || strpos($secret, 'sk_') !== 0 || strlen($secret) < 20) {
                return ['status' => 503, 'body' => ['success' => false, 'code' => 'sandbox_not_configured']];
            }
            // Unique, unpredictable context. The browser only sees ctx + derived token.
            try {
                $context = (string) time() . '-' . bin2hex(random_bytes(8));
            } catch (Throwable $e) {
                return ['status' => 503, 'body' => ['success' => false, 'code' => 'sandbox_not_configured']];
            }
            $body['sandbox'] = [
                'token' => self::signSandbox($context, $secret),
                'ctx' => $context,
            ];
        }
        return ['status' => 200, 'body' => $body];
    }
}
