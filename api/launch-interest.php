<?php
require_once __DIR__ . '/../src/LaunchInterest.php';
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');
function launch_reply(array $result): void {
    http_response_code($result['status']);
    if ($result['status'] === 429) header('Retry-After: 60');
    echo json_encode($result['body']);
    exit;
}
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST'); launch_reply(LaunchInterest::failure(405, 'invalid_request'));
}
// JSON plus a custom header requires a cross-origin preflight; this endpoint never grants CORS.
if (strtolower(trim(explode(';', $_SERVER['CONTENT_TYPE'] ?? '')[0])) !== 'application/json'
    || ($_SERVER['HTTP_X_MAXBOT_LAUNCH'] ?? '') !== '1'
    || in_array($_SERVER['HTTP_SEC_FETCH_SITE'] ?? '', ['cross-site', 'same-site'], true)) {
    launch_reply(LaunchInterest::failure(403, 'invalid_request'));
}
$raw = file_get_contents('php://input', false, null, 0, 4097);
if ($raw === false || strlen($raw) > 4096) launch_reply(LaunchInterest::failure(413, 'invalid_request'));
$input = json_decode($raw, true, 8);
$valid = LaunchInterest::validate($input);
if (isset($valid['status'])) launch_reply($valid);
try {
    if (!LaunchInterest::allowRequest($_SERVER['REMOTE_ADDR'] ?? 'unknown')) launch_reply(LaunchInterest::failure(429, 'rate_limited'));
} catch (Throwable $error) { launch_reply(LaunchInterest::failure(503, 'signup_unavailable')); }
$config = [];
// Optional reviewed contract lives outside the public document root; no browser configuration or keys.
$path = getenv('MAXBOT_LAUNCH_CONFIG_FILE');
if (is_string($path) && $path !== '' && is_file($path) && is_readable($path)) {
    try { $loaded = require $path; if (is_array($loaded)) $config = $loaded; }
    catch (Throwable $error) { $config = []; }
}
launch_reply(LaunchInterest::submit($valid, $config, [LaunchInterest::class, 'transport']));
