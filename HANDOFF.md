# Maxbot website implementation handoff — 24 September 2026

## Delivery status

Website changes are implemented. The launch modal and server adapter work, but production lead submission is intentionally disabled: the current Free API cannot record the requested minimal, edition-specific launch consent correctly. No production deployment or live lead submission was performed. The API and plugin reference packages were not modified.

## Task 1 — documentation

- Added a four-card documentation hub: Free, Standard, Pro (Coming soon), and the separate WhatsApp Add-on.
- Added a complete 16-section Free guide checked against `maxbot-core-3.0.30.zip`: requirements, installation, the exact Starter Guide sequence, Agent, Project, a two-choice conversation, saving, Test Flow, explicit enabling, public-page checks, Conversations, notifications, integrations and troubleshooting.
- Verified setup order: Welcome → Intended use → Agent → Project setup → Build and save → Test Flow → Email notifications → Stay in touch → Enable chatbot.
- Verified the release declares WordPress 6.4+ and PHP 7.4+. The actual ending selector says **Close Discussion**; the guide identifies it as the explicit Stop/Close Conversation action.
- Free notification settings expose four events; `User data/lead` is removed from the selectable list. WordPress, browser and optional email settings are documented separately, with delivery tied to conversation close.
- No paid-screen screenshots were copied into Free documentation.
- Added a Standard edition/installation-preparation guide using confirmed commercial direction only. Detailed Standard feature instructions remain a release-content dependency: no Standard reference package was available.
- Audited the original Core guide. It contains agents/topics lists, entities, templates, Users Data and advanced routing, so it remains an explicitly labelled legacy builder reference instead of being assigned wholesale to Free, Standard or Pro. Its section IDs and the WhatsApp guide’s section IDs are retained.
- Updated navigation, footer, cross-links, page titles, descriptions, canonical paths and breadcrumbs.

Routes, relative to `/landing/maxbot`:

| Route | Result |
| --- | --- |
| `/docs` | Edition hub |
| `/docs-free` | New Free user guide |
| `/docs-standard` | New Standard edition guide |
| `/docs-core` | Existing URL and anchors retained as legacy reference |
| `/docs-whatsapp` | Existing guide and anchors retained; obsolete authorization language corrected |
| `/features#licensing`, `/#licensing` | Old anchors retained, now showing three edition models |

Pro has a Coming soon card, not a broken or empty route. Documentation availability does not claim a marketplace listing is live.

## Task 2 — purchase actions and launch form

- Removed the old Maxbot CodeCanyon item URL and `MAXBOT_CORE_BUY_URL` purchase mechanism.
- All affected navigation, hero, page, template and footer actions now use `mb_edition_cta()` and actual buttons. The old paid Core action maps explicitly to **Standard**, not to Pro.
- Added Pro actions on its edition and documentation cards.
- One native dialog provides edition-specific copy, labelled email, unchecked consent, the real privacy-policy link, validation, pending/retry/error/success states, scroll locking, Escape handling, focus restoration and keyboard containment.
- Added `api/launch-interest.php` and `src/LaunchInterest.php`: a same-origin JSON adapter to a fixed Free API endpoint. It validates on the server, rejects extra browser fields, limits requests, bounds request/response sizes, uses HTTPS verification, forbids redirects and exposes no credentials or provider/subscriber details.
- No database, email storage in the browser, confirmation email, signup receipt, polling, SMTP, fake installation, installation token, Freemius billing or campaign sender was added.
- The existing WhatsApp product destination remains separate and unchanged. Its original `#` placeholder still needs its own verified destination; this task did not invent one or redirect it to a Standard/Pro mailing list.

### Verified existing API contract

Reference: `maxbot-saas-rest-api-free-cleanup.zip`, current available version dated 23 September. Reviewed `README.md`, `routes/api.php`, `RouteServiceProvider.php`, `FreeController.php`, `LeadSignup.php`, `LeadSubscriptions.php` and migrations. This is source verification, not a fresh production integration test.

| Detail | Current implementation |
| --- | --- |
| Base URL / route | `https://climaxweb.net/rest-free/api/v1` + `POST /leads` |
| Authentication | Public lead endpoint; no installation credential or product-license key |
| v1 fields | Exact fields: name, email, intended_use, product_interests, consent, consent_version |
| v1 name | Required nonempty string |
| v2 variation | `maxbot-tutorials-v2` allows an empty name but also requires `setup_answers` |
| Intended use | support, leads, sales, bookings, learning, other |
| Product interests | core, pro, whatsapp, future_addons — **no Standard value** |
| Consent | Boolean true; only maxbot-tutorials-v1 or maxbot-tutorials-v2 |
| Successful envelope | HTTP 200, success=true, code=ok, data.status=accepted or existing confirmed |
| Duplicate handling | insertOrIgnore; existing preferences/consent/opt-outs remain unchanged |
| Opt-out handling | Existing unsubscribed record returns data.status=unsubscribed |
| Validation | HTTP 422 invalid_lead or consent_required |
| Disabled/unconfigured | HTTP 503 lead_signup_unavailable |
| Rate limit | 6 requests/minute/IP for leads; HTTP 429 |
| Delivery | Immediate contact recording; no new confirmation/welcome delivery workflow |

### Why live signup is blocked

The minimal website form has only email and edition-specific launch consent. The API currently requires additional data, has no launch-only consent version, and has no Standard interest. Reusing a tutorial consent version would broaden the visitor’s consent. Inventing a name, intended use or setup answers would misrepresent what the visitor supplied.

Also, an existing contact can return `accepted` while its old interests are left unchanged. That does not prove the requested Standard or Pro launch interest was recorded. Returning a success message from that response would be incorrect.

Before enabling, the existing service needs a reviewed contract that:

1. Accepts the minimal launch request without fabricated onboarding fields.
2. Defines accepted Standard/Pro product-interest values and launch-only consent wording/version.
3. Records the selected edition’s consent for new and repeat contacts without overwriting unrelated preferences or restoring an opt-out improperly.
4. Provides a verifiable handled outcome for that request, with privacy-preserving duplicate behavior.

Implement that in the existing lead service rather than a parallel signup system. Backend changes were outside this website delivery and were not made.

### Configuration and deployment

- **Current safe setting:** leave `MAXBOT_LAUNCH_CONFIG_FILE` unset. The form submits to the local server, which returns 503 `signup_unavailable` without sending a lead upstream. The UI explains that signup is temporarily unavailable and offers retry.
- After the above contract is supported, copy `config/launch.example.php` outside the public document root. Set `MAXBOT_LAUNCH_CONFIG_FILE` to its absolute path in the PHP hosting environment.
- Supply reviewed per-edition `build_payload` and `confirms_launch_consent` callbacks and set `enabled` to true. The response callback must prove edition-specific launch consent, including duplicates. Do not simply return true for the current API’s bare `accepted` response. The example deliberately supplies no guessed fields or values.
- Transport destination is fixed to the source-verified Free `/api/v1/leads` endpoint in `LaunchInterest::ENDPOINT`. It is never accepted from a browser parameter. No secrets are required by the currently reviewed public endpoint.
- PHP needs cURL when live submission is enabled. There must be a writable private system temporary directory for request counters. Counter storage failures fail closed. Counters store hashed connecting IP addresses, not emails. Expired counters are purged on subsequent requests; use normal system temporary-file cleanup during idle periods.
- Behind a reverse proxy, configure its trusted client-IP handling at the web server. The adapter intentionally does not trust arbitrary `X-Forwarded-For`. Because it proxies submissions, the existing backend limit can aggregate all website visitors under the website server IP; review that capacity with the existing service before launch.
- `src/Editions.php` centralizes billing, channel/status, docs routes and CTA behavior. To restore a verified Standard checkout later, set its `checkout` URL and update its status there. Pro remains a notification action; implementing Freemius checkout is a separate task.
- Keep `/landing/maxbot` in both `config.php` and `.htaccess`, or update both if moving the installation.
- The `.htaccess` changes allow new documentation routes and block maintainer/config/test paths from public HTTP. The actual Apache/Hostinger rewrite configuration still needs deployment verification.

## Task 3 — edition and licensing messaging

Free is described as free with no monthly subscription and planned WordPress.org distribution. Standard is described as a one-time purchase with lifetime access and planned CodeCanyon distribution. Pro is described as a monthly subscription planned through Freemius on this website, with checkout unavailable.

Removed Regular/Extended project quotas, purchase-code activation instructions and generic no-monthly-fee claims applying to all editions. Kept ordinary project instructions. No new prices, site allowances, discounts, dates or lifetime support/update/service promises were introduced.

Advanced features and templates remain visible as explicitly scoped legacy builder examples, without allocating them to Standard or Pro. The WhatsApp documentation remains available; add-on compatibility and entitlements are not invented. Updated the existing privacy notice to remove obsolete confirmation/welcome-email claims and explain launch-only consent.

## Executed validation

- **39 PHP files** passed `php -l` using PHP 8.3.6.
- Both authored marketing JavaScript files passed `node --check`.
- **47 PHP adapter assertions passed**, with mocked upstream transport: malformed/email/consent validation, fixed destination, edition mapping, disabled configuration, positive verified outcomes, existing duplicate without launch proof, opt-out, HTTP-200 API failure, validation failure, rate limit, network/service errors and request limiting.
- **592 browser/HTTP assertions passed** in headless Chromium 153 through the local PHP router. Covered 14 page routes at 1440px and 390px, overflow, affected visible CTAs, edition wording, consent, focus/keyboard/Escape/scroll restoration, mobile menu, internal page/fragment links, real disabled adapter response, mocked errors/success, retry, concurrent-submit prevention and server/header validation.
- Desktop documentation hub and desktop/mobile modal screenshots were visually inspected.
- `git diff --check` passed. Final patch applicability, retained documentation section IDs and packaging integrity are checked during packaging.
- No project build/lint/test runner existed in the original ZIP. There is no build step for these authored PHP/CSS/JS changes; no generated bundle was edited. Existing widget/template runtime and template assets are byte-for-byte preserved.

### Limits and remaining checks

- Enabled API success tests are **mocks**, not live or staging integration tests. Production availability, backend migrations and a launch-compatible payload remain unverified.
- External requests were blocked in browser tests. The unchanged embedded template preview produced two expected `jQuery is not defined` errors because its existing external jQuery CDN was blocked. Its live runtime and third-party media were not validated. No unexpected errors occurred in the changed marketing/modal scripts.
- Keyboard and dialog semantics were exercised, but no screen reader audit or complete accessibility certification was performed. Safari/iOS and other browser engines were not tested.
- Apache `.htaccess`, Hostinger deployment, live plugin behavior, email/browser-push delivery and WhatsApp messaging were not tested here. Free documentation was checked against source, not a live WordPress installation.
- Standard/Pro detailed feature allocation, paid-edition requirements, live marketplace listings and Pro checkout remain product/release dependencies. These are not assumed by this implementation.

## Files and patch

The ZIP contains the complete website source/assets, safe configuration example, focused tests, README and this handoff. It excludes `.git`, credentials, real `.env` files, runtime downloads, node_modules and temporary verification files.

Apply the patch from the root of an untouched copy of the supplied website:

```sh
git apply --check maxbot-website-editions.patch
git apply maxbot-website-editions.patch
```

The patch uses source paths relative to the website root, without its surrounding ZIP directory. If your copy has changed since the supplied ZIP, review conflicts rather than forcing the patch.
