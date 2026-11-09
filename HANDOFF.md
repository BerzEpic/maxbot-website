# Maxbot PHP website — Freemius Checkout integration handoff

Base: `maxbot-website-latest-version.zip` provided by the user on 2026-11-09.

Changes:
- All centralized Pro CTA buttons now open Freemius Overlay Checkout, not the retired launch-signup modal.
- Single Professional plan only (product 42360, plan 74609), 1 site activation, annual offer configured in Freemius.
- The PHP endpoint signs sandbox parameters on demand; never sends the product secret to browser.
- Mode disabled by default. Sandbox must run only behind staging access controls; production does not sign tokens.
- Pro copy, pricing language, privacy copy, and checks updated.
- Legacy standalone launch form and lead adapter removed. Free and WhatsApp flows unchanged.
- No app-level license provisioning based on unverified callback data.

Pending before live production:
- Rotate the publicly shared Freemius product secret.
- Configure PHP-FPM environment or private PHP file outside web root, and protected staging.
- Confirm Freemius product/plan are enabled, pricing/refund policy approved.
- Complete and test WordPress SDK + entitlement enforcement in Pro 3.0.55.
- Deploy a valid premium ZIP via Freemius and test license/update delivery.
- Perform real sandbox purchase and verify in Freemius dashboard + WordPress staging.
- Verify public legal, refund, tax and support disclosures.

See `README.md` and `docs/FREEMIUS-PRO-PLUGIN-NEXT-STEPS.md`.

## Applying the unified patch to the original ZIP

The uploaded website uses CRLF line endings in some sources. To apply the patch
without line-ending conflicts, from the original website root use:

```sh
git apply --check --ignore-space-change maxbot-website-freemius-professional-checkout.patch
git apply --ignore-space-change maxbot-website-freemius-professional-checkout.patch
```

The complete ZIP contains the same result and can be deployed without applying a patch.
