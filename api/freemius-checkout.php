<?php
/** Same-origin config endpoint used only when a customer clicks a Pro purchase CTA. */
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, max-age=0, must-revalidate');
header('Pragma: no-cache');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET') {
    http_response_code(405);
    header('Allow: GET');
    echo json_encode(['success' => false, 'code' => 'method_not_allowed']);
    exit;
}

$response = FreemiusCheckout::configuration();
http_response_code($response['status']);
echo json_encode($response['body'], JSON_UNESCAPED_SLASHES);
