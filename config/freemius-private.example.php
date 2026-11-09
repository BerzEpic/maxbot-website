<?php
/**
 * TEMPLATE ONLY. Copy to a private path OUTSIDE the public website directory.
 * For example: /home/account/private/maxbot-freemius.php
 * Then set MAXBOT_FREEMIUS_PRIVATE_FILE in config.php to that absolute path.
 * Replace the sample secret with your newly rotated Freemius product secret.
 * This example contains no usable credentials.
 */
return [
    'mode' => 'disabled', // 'sandbox' on protected staging, 'production' after launch
    'secret_key' => '', // new sk_... key, SANDBOX ONLY
    'sandbox_protected' => '0', // set '1' ONLY behind actual authentication / IP allowlisting
];
