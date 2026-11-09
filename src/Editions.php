<?php
/** Public edition descriptions and shared call-to-action markup. */
function mb_editions(): array
{
    $mode = FreemiusCheckout::mode();
    return [
        'free' => [
            'name' => 'Maxbot Free',
            'channel' => 'WordPress.org',
            'billing' => 'Free · no monthly subscription',
            'status' => 'Listing to be announced',
            'docs' => 'docs-free',
        ],
        'pro' => [
            'name' => 'Maxbot Pro',
            'channel' => 'This website, via Freemius Checkout',
            'billing' => 'Professional · annual subscription (price shown at checkout)',
            'status' => $mode === 'sandbox' ? 'Sandbox testing' : ($mode === 'production' ? 'Checkout available' : 'Checkout not enabled'),
            'docs' => 'docs-pro',
        ],
    ];
}

function mb_edition_cta(string $edition, string $class = 'btn btn--primary', ?string $label = null): string
{
    $item = mb_editions()[$edition] ?? null;
    if (!$item || $edition !== 'pro') {
        throw new InvalidArgumentException('Only Maxbot Pro has a Freemius checkout action.');
    }
    return '<button type="button" class="' . mb_e($class) . '" data-freemius-checkout="professional"'
        . ' aria-label="' . mb_e($label ?? 'Buy Maxbot Pro Professional') . '">'
        . mb_e($label ?? 'Buy Maxbot Pro') . '</button>';
}
