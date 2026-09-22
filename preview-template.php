<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/src/TemplatePreview.php';

$templateId = isset($_GET['template_id'])
    ? preg_replace('/[^a-zA-Z0-9_\-]/', '', $_GET['template_id'])
    : '';

if ($templateId === '') {
    http_response_code(400);
    echo 'Missing template_id';
    exit;
}

try {
    $ctx = TemplatePreview::buildContext($templateId);
} catch (Throwable $e) {
    http_response_code(404);
    echo htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    exit;
}

$ctx['rootURL'] = APP_BASE_URL . '/widget/';
$ctx['ajaxUrl'] = APP_BASE_URL . '/api/maxbot-public.php';
$ctx['ajaxNonce'] = '';
$ctx['dataEntities'] = [];
$ctx['inlineTestingChat'] = true;
$ctx['inlineTemplatePreview'] = true;

require __DIR__ . '/view/inline-template-preview.php';