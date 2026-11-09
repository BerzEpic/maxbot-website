# Maxbot Pro 3.0.55 — WordPress-side Freemius integration checklist

**Scope:** The marketing website checkout does not activate, enforce, or deliver the plugin.
Continue work from the known final Pro 3.0.55 baseline, not the non-adopted 3.0.57 guide.
The earlier `maxbot-pro-3.0.55-freemius-staging-sdk-required.zip` is a staging
integration candidate but expressly does **not** bundle the SDK; do not distribute
that ZIP as a production licensed release.

1. **Freeze/backup 3.0.55** plugin source, database and `uploads`. Preserve the existing
   business data, code, plugin activation and old-version compatibility path. Take a real
   staging backup before changing WordPress plugin identity/dirname.
2. **Download the official Freemius WordPress SDK** from Freemius. Bundle its complete
   supported files under `vendor/freemius/`, after reviewing version/license/compliance.
   The marketing site's Checkout JavaScript is *not* this WordPress SDK.
3. **Initialize once, early**, in the existing main plugin PHP file, after header and
   `ABSPATH` check. Follow Freemius' generated SDK snippet and actual plugin loading
   order. Match Product ID `42360`, Public Key `pk_1b72c370ec81ae12f3ef0391946bc`,
   slug `maxbot-pro`, type `plugin`, `is_premium=true`, `is_premium_only=true`,
   `has_paid_plans=true`, `has_addons=false`. Confirm the configured `mp_fs()` function
   does not collide with a second SDK bootstrap; do not ship duplicate SDK trees.
4. **Menu placement:** Identify the actual registered top-level menu slug. In the
   3.0.55 archive, this was `maxbot-dashboard`, not automatically `maxbot-pro`.
   Set the Freemius `menu.slug` accordingly (or supply a verified alternative).
   Confirm WordPress permissions and SDK Account/License navigation.
5. **Professional plan:** use Plan ID `74609`; for the initial test, allow only one
   recognized Professional plan. Inspect the license/plan in the SDK, validate that
   an active key belongs to Product ID `42360` and that the site activation is valid.
   A Pricing ID is NOT a Plan ID. Do not build tier entitlements for nonexistent plans.
6. **Staging:** put `WP_FS__DEV_MODE=true` into private WordPress `wp-config.php` only
   on staging. Keep official product-specific sandbox secret *out* of plugin files,
   JavaScript, commits, ZIPs and web pages. Use a newly rotated key. Generate a
   disposable Professional sandbox purchase via the PHP website; confirm that the
   license, term and WordPress activation agree with Freemius dashboard records.
7. **Expiry policy:** explicitly decide blocked Pro features, a payment grace period,
   lost connectivity allowance and data retention. Avoid deleting user data. Do not
   equate a local grace period with an actual paid subscription renewal. Check SDK
   state server-side on admin/write paths and use bounded cached state for public
   widgets; NEVER make remote billing calls on every visitor message.
8. **Compatibility:** test Pro alone, Pro+Free, Pro+CodeCanyon Standard, all three,
   and fallback when Pro deactivates. Ensure no duplicate frontend widgets/admin menus
   or accidental disabling/removal of another edition. Validate upgrades in place.
9. **Update delivery:** build one installable premium ZIP with correct folder/header,
   publish via Freemius release management and validate both fresh install and plugin
   updates. SDK activation alone does not demonstrate update delivery.
10. **Go-live:** remove staging flags, verify production product and purchased plans,
    legal terms, refund/support pages, updater and customer migration. Only after
    successful sandbox tests, enable `MAXBOT_FREEMIUS_CHECKOUT_MODE=production` on the
    standalone PHP marketing site.

Official Freemius references:
- https://freemius.com/help/documentation/wordpress/integration-with-sdk/
- https://freemius.com/help/documentation/wordpress-sdk/integration/software-licensing/
- https://freemius.com/help/documentation/checkout/integration/testing/
