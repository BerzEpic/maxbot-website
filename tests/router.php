<?php
// Local development/test router. Apache production uses .htaccess.
$root = dirname(__DIR__);
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$prefix = '/landing/maxbot';
if (strpos($path, $prefix) !== 0) { http_response_code(404); exit; }
$relative = substr($path, strlen($prefix));
if (preg_match('~^/(tests|config|src|partials|data)(/|\.)~', $relative) || strpos($relative, '..') !== false) { http_response_code(403); exit; }
$relative = $relative === '' || $relative === '/' ? '/index.php' : $relative;
if (!pathinfo($relative, PATHINFO_EXTENSION)) $relative .= '.php';
$file = realpath($root . $relative);
if (!$file || strpos($file, $root . '/') !== 0 || !is_file($file)) { http_response_code(404); exit; }
if (substr($file, -4) === '.php') { $_SERVER['SCRIPT_NAME'] = $prefix . $relative; require $file; return true; }
$types = ['css' => 'text/css', 'js' => 'application/javascript', 'svg' => 'image/svg+xml', 'png' => 'image/png', 'jpg' => 'image/jpeg'];
header('Content-Type: ' . ($types[pathinfo($file, PATHINFO_EXTENSION)] ?? 'application/octet-stream'));
readfile($file); return true;
