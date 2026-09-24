# Maxbot website

Plain PHP marketing and documentation site. No framework, package installation or asset build is required for deployment. The marketing CSS and JavaScript are authored source files. Existing template-preview/widget assets remain unchanged.

## Run locally

Use PHP 7.4 or later (validation here used PHP 8.3):

```sh
php -S 127.0.0.1:8082 tests/router.php
```

Open `http://127.0.0.1:8082/landing/maxbot/`. The router is for development only; production uses Apache `.htaccess` with mod_rewrite. For deployment, PHP cURL is needed if/when the reviewed launch adapter is enabled.

## Routes

All routes are relative to `/landing/maxbot`:

| Route | Purpose |
| --- | --- |
| `/` | Homepage and edition models |
| `/features#licensing` | Free, Standard and Pro distribution/billing |
| `/docs` | Edition documentation hub |
| `/docs-free` | Free 3.0.30 setup-to-publishing guide |
| `/docs-standard` | Confirmed Standard model and installation preparation |
| `/docs-core` | Earlier full-builder reference; existing anchors retained |
| `/docs-whatsapp` | Separate WhatsApp Add-on guide; existing anchors retained |
| `/privacy-policy` | Optional signup and service privacy notice |
| `/templates`, `/template?slug=…` | Existing live template examples |
| `/tutorials`, `/use-cases`, `/integrations`, `/whatsapp` | Existing product resources |

Pro documentation is marked Coming soon on the hub. There is no empty `/docs-pro` page.

## Configuration

- `config.php`: install path, existing live demo identifiers and privacy contact.
- `.htaccess`: update its RewriteBase and redirect prefixes as well if moving the site away from `/landing/maxbot`.
- `src/Editions.php`: edition names, planned distribution, billing, current status and checkout behavior. The Standard checkout is intentionally empty. After verifying a live Standard destination, set its `checkout` value and update its status here. Pro remains a notification action; no Freemius checkout is implemented.
- `MAXBOT_LAUNCH_CONFIG_FILE`: optional absolute path to a reviewed PHP contract file outside the public document root. See `config/launch.example.php` and `HANDOFF.md`. Leave unset for the current API, which does not support the launch form's consent and duplicate requirements.

The website adapter returns an honest 503 when unavailable and never fakes success or stores lead emails locally. The existing WhatsApp product destination is preserved separately; it is not a Standard or Pro CTA.

## Checks

```sh
find . -name '*.php' -print0 | xargs -0 -n1 php -l
node --check static/js/maxbot.js
node --check static/js/launch.js
php tests/launch-interest-test.php
```

Optional browser checks require Playwright and Chromium already installed:

```sh
node tests/browser.cjs
```

The browser script starts/stops its own local PHP server. It supports `PHP_BIN`, `PLAYWRIGHT_MODULE`, `CHROMIUM_BIN`, and `SCREENSHOT_DIR` overrides. It blocks external resources and mocks enabled signup outcomes; it does not submit to the live leads service. Test fixtures and their synthetic consent markers are not a production contract.

## Packaging

Deploy the source tree, including `static/`, `content/`, `template-assets/`, `view/`, `widget/`, and `.htaccess`. Do not upload `.git`, runtime downloads, credentials, local configuration, real `.env` files or dependency directories. Tests, README and HANDOFF are included for maintainers and blocked from HTTP by `.htaccess`; they may be omitted from a public deployment.

See `HANDOFF.md` for source verification, remaining integration blockers and executed test results.
