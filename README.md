# Maxbot Website — Free + Pro (Freemius Checkout)

Plain PHP marketing website. Maxbot Free and WhatsApp remain separate products.
Maxbot Pro Professional checkout uses Freemius Overlay Checkout (Option A).

## Installation

Upload this entire directory to the existing `/landing/maxbot` website path, including `.htaccess`.
Configure your PHP server with the variables below. DO NOT put secrets in the web root,
JavaScript, a committed `.env`, or a public PHP config file.

| Server environment variable | Value | Purpose |
| --- | --- | --- |
| `MAXBOT_FREEMIUS_CHECKOUT_MODE` | `disabled` (default), `sandbox`, or `production` | Explicitly enables checkout |
| `MAXBOT_FREEMIUS_SECRET_KEY` | Your newly rotated `sk_...` | **Sandbox only**. PHP server-side secret |
| `MAXBOT_FREEMIUS_SANDBOX_PROTECTED` | `1` only if your site is already password-protected/allowlisted | Enables non-local sandbox access; it does NOT create protection |

If PHP-FPM / shared hosting cannot provide environment variables, copy
`config/freemius-private.example.php` to a file **outside the public website root**,
set `MAXBOT_FREEMIUS_PRIVATE_FILE` in `config.php` to its absolute path, and edit
only that private file. The website will reject a private file located inside its
public directory. Environment variables take precedence when both are present.

For sandbox, protect your staging website with authentication / IP allowlisting FIRST;
then set `MAXBOT_FREEMIUS_CHECKOUT_MODE=sandbox` and provide the secret to PHP-FPM.
Local development from loopback is allowed without the acknowledgement flag.
**Never enable sandbox on a publicly accessible production domain:** it can issue test purchases.

When moving to production, rotate the exposed secret in Freemius, ensure the WordPress Pro
plugin's matching SDK/licensing integration has been tested and released, finish legal/refund
settings, and switch to `MAXBOT_FREEMIUS_CHECKOUT_MODE=production`.
`MAXBOT_FREEMIUS_SECRET_KEY` is NOT needed in production on the marketing website.
Never ship the private secret to visitors.

Product ID: `42360`. Professional plan ID: `74609`. Public key lives in
`src/FreemiusCheckout.php`. IDs/public key are non-secret, but verify them in Freemius.
Other plans are not wired and should not be marketed as ready.

## Runtime flow

Every Pro CTA (`mb_edition_cta()` in `src/Editions.php`) uses the same checkout button.
`static/js/freemius-checkout.js` fetches `api/freemius-checkout.php` when clicked,
loads Freemius' official checkout library, and opens a 1-site checkout popup.
Sandbox mode sends Freemius' official signed `sandbox` token and context, generated
only on the server. Purchase callbacks display a UI message but NEVER activate
licenses or treat the callback as authoritative proof of payment.
The WordPress Pro plugin must verify licenses through its own Freemius SDK.

The old `Notify me` modal, JavaScript, and disabled lead-signup endpoint have been removed.
No legacy marketing leads are migrated.

## Local testing

```sh
php -S 127.0.0.1:8082 tests/router.php
# Then visit http://127.0.0.1:8082/landing/maxbot/
php tests/freemius-checkout-test.php
find . -name '*.php' -print0 | xargs -0 -n1 php -l
node --check static/js/freemius-checkout.js
```

For integration/browser testing, use the optional `tests/browser.cjs` if Playwright is installed.
It mocks the external Checkout SDK; it does not charge cards.

## Notes

- Checkout is disabled by default until the operator sets an explicit mode.
- Existing widget/template assets and standalone WhatsApp purchase destination are unchanged.
- The marketing site does not itself distribute/update the plugin or validate licenses.
- Version 3.0.55 plugin integration requires a complete tested SDK installation (see `docs/FREEMIUS-PRO-PLUGIN-NEXT-STEPS.md`).
