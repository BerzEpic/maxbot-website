<?php
/** Product direction, availability and actions live here, independently of features. */
function mb_editions(): array
{
    return [
        'free' => ['name' => 'Maxbot Free', 'channel' => 'WordPress.org', 'billing' => 'Free · no monthly subscription',
            'status' => 'Listing to be announced', 'docs' => 'docs-free', 'checkout' => ''],
        'standard' => ['name' => 'Maxbot Standard', 'channel' => 'CodeCanyon', 'billing' => 'One-time purchase · lifetime access',
            'status' => 'Checkout not available here yet', 'docs' => 'docs-standard', 'checkout' => ''],
        'pro' => ['name' => 'Maxbot Pro', 'channel' => 'This website, using Freemius', 'billing' => 'Monthly subscription',
            'status' => 'Coming soon', 'docs' => null, 'checkout' => ''],
    ];
}

function mb_edition_cta(string $edition, string $class = 'btn btn--primary', ?string $label = null): string
{
    $item = mb_editions()[$edition] ?? null;
    if (!$item || $edition === 'free') {
        throw new InvalidArgumentException('A paid edition is required for this action.');
    }
    // A verified Standard checkout can be restored by editing just its configuration.
    if ($edition === 'standard' && filter_var($item['checkout'], FILTER_VALIDATE_URL)
        && parse_url($item['checkout'], PHP_URL_SCHEME) === 'https') {
        return '<a class="' . mb_e($class) . '" href="' . mb_e($item['checkout']) . '">Get ' . mb_e($item['name']) . '</a>';
    }
    return '<button type="button" class="' . mb_e($class) . '" data-launch-edition="' . mb_e($edition)
        . '" aria-haspopup="dialog">' . mb_e($label ?? ('Notify me about ' . $item['name'])) . '</button>';
}
