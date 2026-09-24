<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/icons.php';
require_once __DIR__ . '/components.php';

$pageTitle       = $pageTitle ?? 'Maxbot, Visual chatbot builder for WordPress';
$pageDescription = $pageDescription ?? $pageDesc ?? 'Maxbot is a WordPress chatbot builder for guided conversations: quick replies, cards, data capture, templates, a website widget, and official WhatsApp Cloud API automation.';
$pageKeywords    = $pageKeywords ?? 'Maxbot, WordPress chatbot, chatbot builder, WhatsApp chatbot, WhatsApp Cloud API, quick reply chatbot, lead capture, chatbot templates';
$pageUrl         = $pageUrl ?? mb_url();
$pageImage       = $pageImage ?? mb_url('static/images/landing.png');
$bodyClass       = $bodyClass ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo mb_e($pageTitle); ?></title>
<meta name="description" content="<?php echo mb_e($pageDescription); ?>">
<meta name="keywords" content="<?php echo mb_e($pageKeywords); ?>">

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo mb_e($pageUrl); ?>">
<meta property="og:title" content="<?php echo mb_e($pageTitle); ?>">
<meta property="og:description" content="<?php echo mb_e($pageDescription); ?>">
<meta property="og:site_name" content="<?php echo mb_e(MAXBOT_SITE_NAME); ?>">
<meta property="og:image" content="<?php echo mb_e($pageImage); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo mb_e($pageTitle); ?>">
<meta name="twitter:description" content="<?php echo mb_e($pageDescription); ?>">
<meta name="twitter:image" content="<?php echo mb_e($pageImage); ?>">

<link rel="canonical" href="<?php echo mb_e($pageUrl); ?>">
<link rel="icon" type="image/png" href="<?php echo mb_e(mb_url('content/favicon.png')); ?>" sizes="32x32">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Source+Serif+4:opsz,wght@8..60,400;8..60,600&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo mb_e(mb_url('static/css/maxbot.css')); ?>?v=3.0">
<script src="<?php echo mb_e(mb_url('static/js/maxbot.js')); ?>?v=3.0" defer></script>
<link rel="stylesheet" href="<?php echo mb_e(mb_url('static/css/launch.css')); ?>?v=3.0">
<script src="<?php echo mb_e(mb_url('static/js/launch.js')); ?>?v=3.0" defer></script>
</head>
<body<?php echo $bodyClass !== '' ? ' class="' . mb_e($bodyClass) . '"' : ''; ?>>
<a class="sr-only" href="#main">Skip to content</a>
