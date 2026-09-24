<?php
require __DIR__ . '/../src/LaunchInterest.php';
$count = 0;
function check($condition, string $name): void {
    global $count; $count++;
    if (!$condition) throw new RuntimeException('FAIL: ' . $name);
}
$input = ['email' => 'tester@example.com', 'consent' => true, 'edition' => 'pro'];
$called = 0;
$transport = static function () use (&$called) { $called++; throw new RuntimeException('Must not send'); };
check(LaunchInterest::submit($input, [], $transport)['status'] === 503, 'unconfigured fails closed');
check($called === 0, 'unconfigured never contacts upstream');
foreach (['', 'bad', 'a b@example.com', "a\n@example.com", str_repeat('a', 255) . '@example.com'] as $email) {
    check(LaunchInterest::validate(array_replace($input, ['email' => $email]))['body']['code'] === 'invalid_email', 'reject email');
}
foreach ([false, 'true', 1, null] as $consent) check(LaunchInterest::validate(array_replace($input, ['consent' => $consent]))['body']['code'] === 'consent_required', 'explicit boolean consent');
foreach ([null, [], ['email' => []], array_merge($input, ['name' => 'injected']), array_replace($input, ['edition' => 'free']), array_replace($input, ['edition' => []])] as $bad) {
    check(LaunchInterest::validate($bad)['body']['code'] === 'invalid_request', 'reject malformed payload');
}
// Synthetic adapter contract ONLY. These markers are not production API fields or accepted values.
$config = ['enabled' => true, 'editions' => []];
foreach (['standard', 'pro'] as $edition) {
    $config['editions'][$edition] = [
        'build_payload' => static function ($valid) { return ['email' => $valid['email'], 'consent' => true, 'fixture_edition' => $valid['edition']]; },
        'confirms_launch_consent' => static function ($body, $valid) { return ($body['fixture_recorded_edition'] ?? null) === $valid['edition']; },
    ];
}
$body = ['success' => true, 'code' => 'ok', 'data' => ['status' => 'accepted'], 'fixture_recorded_edition' => 'pro'];
$mock = static function ($status, $body) { return static function () use ($status, $body) { return compact('status', 'body'); }; };
foreach (['standard', 'pro'] as $edition) {
    $current = array_replace($input, ['edition' => $edition]);
    $expected = array_replace($body, ['fixture_recorded_edition' => $edition]);
    $result = LaunchInterest::submit($current, $config, static function ($url, $payload) use ($edition, $expected) {
        check($url === LaunchInterest::ENDPOINT, 'fixed destination');
        check($payload['fixture_edition'] === $edition, 'edition mapping agrees');
        check(!isset($payload['name'], $payload['setup_answers']), 'no fabricated identity');
        return ['status' => 200, 'body' => $expected];
    });
    check($result['body']['code'] === 'launch_interest_recorded', 'verified mock success');
}
foreach ([['success' => false], null, ['success' => true], array_replace($body, ['fixture_recorded_edition' => 'standard']),
    ['success' => true, 'code' => 'ok', 'data' => ['status' => 'accepted']], // real old duplicate: insufficient evidence
    array_replace($body, ['data' => ['status' => 'unsubscribed']]), array_replace($body, ['code' => 'failure'])] as $bad) {
    check(LaunchInterest::submit($input, $config, $mock(200, $bad))['body']['success'] === false, 'never infer success');
}
foreach ([0 => 'signup_unavailable', 302 => 'not_confirmed', 422 => 'invalid_request', 429 => 'rate_limited', 500 => 'not_confirmed', 503 => 'signup_unavailable'] as $status => $code) {
    check(LaunchInterest::submit($input, $config, $mock($status, $body))['body']['code'] === $code, 'upstream failure mapping');
}
check(LaunchInterest::submit($input, $config, $mock(422, ['code' => 'consent_required']))['body']['code'] === 'consent_required', 'API consent rejection');
check(LaunchInterest::submit($input, $config, $transport)['status'] === 503, 'network exception');
$rateIdentity = 'test-' . bin2hex(random_bytes(8));
for ($i=0; $i<6; $i++) check(LaunchInterest::allowRequest($rateIdentity), 'rate request allowed');
check(!LaunchInterest::allowRequest($rateIdentity), 'seventh request blocked');
echo "$count adapter assertions passed (mocked upstream; no live signup).\n";
