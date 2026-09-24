<?php
/**
 * Copy OUTSIDE the public document root. Set MAXBOT_LAUNCH_CONFIG_FILE to its absolute path.
 * This intentionally does not enable signup: the current Free API does not support this form.
 * Read HANDOFF.md for the verified contract and blocking differences.
 *
 * After the existing /api/v1/leads service supports minimal launch-only consent:
 * - build_payload(array $input): array maps email, consent and the selected edition to the
 *   REVIEWED API fields/values. Do not invent a name, intended use, or setup answers.
 * - confirms_launch_consent(array $response, array $input): bool must verify that this edition's
 *   consent was recorded, including repeat contacts, without reviving opt-outs or disclosing data.
 *   A bare data.status=accepted from the current API is NOT sufficient.
 * - Enable each edition only when both callbacks are reviewed and tested against staging.
 * No installation tokens, API keys, licensing registration, or SMTP belong here.
 */
return [
    'enabled' => false,
    'editions' => [
        'standard' => ['build_payload' => null, 'confirms_launch_consent' => null],
        'pro' => ['build_payload' => null, 'confirms_launch_consent' => null],
    ],
];
