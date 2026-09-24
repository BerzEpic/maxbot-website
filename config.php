<?php
/**
 * Maxbot demo website – global configuration.
 *
 * APP_BASE_URL is the single place that controls where the site lives.
 * If you move the site to the domain root, set it to '' (empty string).
 */

define('APP_BASE_PATH', __DIR__);
define('APP_BASE_URL', '/landing/maxbot');

/** WhatsApp is a separate product; its existing destination is preserved. */
define('MAXBOT_WHATSAPP_BUY_URL', '#');
require_once __DIR__ . '/src/Editions.php';

/**
 * Live demo widgets are served by the real WordPress/Maxbot installation.
 * The source page id only needs to be targeted by both projects; Maxbot uses
 * it to resolve the Web Widget + WhatsApp actions inside the inline widget.
 */
define('MAXBOT_LIVE_WIDGET_WORDPRESS_URL', '/portfo/');
define('MAXBOT_LIVE_WIDGET_WEB_PROJECT_ID', '1787690713745');
define('MAXBOT_LIVE_WIDGET_WHATSAPP_PROJECT_ID', '1787690735851');
define('MAXBOT_LIVE_WIDGET_SOURCE_PAGE_ID', 4157);

define('MAXBOT_SITE_NAME', 'Maxbot');
define('MAXBOT_YEAR', '2026');

/** Privacy notice contact. Confirm the operator's legal name before publishing. */
define('MAXBOT_PRIVACY_OPERATOR', 'Maxbot');
define('MAXBOT_PRIVACY_EMAIL', 'hello@climaxweb.net');

if (!function_exists('mb_url')) {
    /**
     * Build a site URL from a path such as 'features' or 'static/css/maxbot.css'.
     */
    function mb_url(string $path = ''): string
    {
        $path = ltrim($path, '/');
        $base = rtrim(APP_BASE_URL, '/');

        if ($path === '') {
            return $base . '/';
        }

        return $base . '/' . $path;
    }
}

if (!function_exists('mb_e')) {
    function mb_e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('mb_is_current')) {
    /**
     * True when the current request maps to the given page slug.
     */
    function mb_is_current(string $slug): bool
    {
        $script = basename($_SERVER['SCRIPT_NAME'] ?? '', '.php');

        return $script === $slug;
    }
}
