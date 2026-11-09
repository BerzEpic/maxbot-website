<?php
require_once __DIR__ . '/../config.php';

function testCheck($condition, string $message): void
{
    if (!$condition) {
        fwrite(STDERR, "FAIL: {$message}\n");
        exit(1);
    }
    echo "PASS: {$message}\n";
}

putenv('MAXBOT_FREEMIUS_CHECKOUT_MODE');
putenv('MAXBOT_FREEMIUS_SECRET_KEY');
putenv('MAXBOT_FREEMIUS_SANDBOX_PROTECTED');
$_SERVER['REMOTE_ADDR'] = '198.51.100.10';

testCheck(FreemiusCheckout::mode() === 'disabled', 'fail closed when checkout mode absent');
$a = FreemiusCheckout::configuration();
testCheck($a['status'] === 503 && $a['body']['code'] === 'checkout_disabled', 'disabled checkout rejects requests');
putenv('MAXBOT_FREEMIUS_CHECKOUT_MODE=sandbox');
$a = FreemiusCheckout::configuration();
testCheck($a['status'] === 403 && $a['body']['code'] === 'sandbox_requires_protection', 'sandbox denied to unprotected remote visitor');
putenv('MAXBOT_FREEMIUS_SANDBOX_PROTECTED=1');
$a = FreemiusCheckout::configuration();
testCheck($a['status'] === 503 && $a['body']['code'] === 'sandbox_not_configured', 'sandbox requires secret');
$fake = 'sk_TEST_FIXTURE_NOT_A_REAL_FREEMIUS_KEY_001';
putenv('MAXBOT_FREEMIUS_SECRET_KEY=' . $fake);
$a = FreemiusCheckout::configuration();
testCheck($a['status'] === 200 && $a['body']['mode'] === 'sandbox', 'valid sandbox configuration');
testCheck($a['body']['product_id'] === 42360 && $a['body']['plan_id'] === 74609, 'public IDs match Professional');
testCheck(isset($a['body']['sandbox']['ctx'], $a['body']['sandbox']['token']), 'generated sandbox context/token');
$ctx = $a['body']['sandbox']['ctx'];
testCheck($a['body']['sandbox']['token'] === md5($ctx . '42360' . $fake . FreemiusCheckout::PUBLIC_KEY . 'checkout'), 'sandbox token matches Freemius documentation');
testCheck(strpos(json_encode($a['body']), $fake) === false, 'secret never exposed in JSON response');
$b = FreemiusCheckout::configuration();
testCheck($b['body']['sandbox']['ctx'] !== $ctx, 'each request gets unique sandbox context');
putenv('MAXBOT_FREEMIUS_CHECKOUT_MODE=production');
$a = FreemiusCheckout::configuration();
testCheck($a['status'] === 200 && !isset($a['body']['sandbox']), 'production configuration does not reveal sandbox token');
testCheck(strpos(json_encode($a['body']), $fake) === false, 'production does not reveal secret');
putenv('MAXBOT_FREEMIUS_CHECKOUT_MODE=INVALID');
testCheck(FreemiusCheckout::mode() === 'disabled', 'unknown modes fail closed');
$cta = mb_edition_cta('pro');
testCheck(strpos($cta, 'data-freemius-checkout="professional"') !== false, 'shared Pro CTA opens Freemius');
testCheck(strpos($cta, 'launch-edition') === false, 'launch modal no longer used');

echo "Freemius Checkout PHP tests passed.\n";
