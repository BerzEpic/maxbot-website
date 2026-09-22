# Maxbot demo website — rebuilt

A complete rebuild of the Maxbot marketing and documentation site, with one
consistent product identity across the homepage, the WhatsApp add-on page and
both documentation guides.

---

## 1. Before you publish — three things to fill in

### a. Purchase links
Open `config.php` and replace the two placeholder constants:

```php
define('MAXBOT_CORE_BUY_URL', '#');       // ← marketplace URL for Maxbot Core
define('MAXBOT_WHATSAPP_BUY_URL', '#');   // ← marketplace URL for the WhatsApp add-on
```

Every "Get Maxbot" / "Get the WhatsApp add-on" button on the site reads from
these two values, so you only edit them once.

### b. The two WhatsApp tutorials
Open `data/tutorials-data.php`. The two WhatsApp entries are placeholders:
put in the real `title`, `description`, `duration` and `url`, then **delete the
line `'placeholder' => true,`** from each. That flag is what currently renders
them as non-clickable cards with a "Link coming soon" label instead of a
broken YouTube link.

The five Maxbot Core tutorials include the existing beginner guides plus the advanced Keywords, Variables, Join & User Data guide, and already have their
real URLs.

### c. Install path
`config.php` also holds:

```php
define('APP_BASE_URL', '/landing/maxbot');
```

That is the only place the install path is defined. If you ever move the site
to the domain root, set it to an empty string `''` and every link, asset and
canonical URL follows.

---

## 2. Page structure

| URL | File | Notes |
|---|---|---|
| `/` | `index.php` | Homepage |
| `/features` | `features.php` | Maxbot Core — includes the licensing and requirements section |
| `/templates` | `templates.php` | Template library |
| `/template?slug=…` | `template.php` | Single template + live preview |
| `/whatsapp` | `whatsapp.php` | **New** — dedicated WhatsApp Integration page |
| `/integrations` | `integrations.php` | **New** — channels available today + "Coming soon" roadmap |
| `/use-cases` | `use-cases.php` | Seven use cases |
| `/tutorials` | `tutorials.php` | Core tutorials and WhatsApp tutorials, clearly separated |
| `/docs` | `docs.php` | Documentation landing — choose Core or WhatsApp |
| `/docs-core` | `docs-core.php` | Maxbot Core documentation |
| `/docs-whatsapp` | `docs-whatsapp.php` | WhatsApp add-on documentation |

**Removed:** the Blog page. `/blog` now 301-redirects to the homepage in
`.htaccess`, so any existing link to it still lands somewhere sensible.

---

## 3. How it is put together

```
config.php                    base URL, purchase links, helpers
partials/
  header.php                  <head>, fonts, meta, Open Graph
  navbar.php                  navigation
  footer.php                  footer + closing CTA
  icons.php                   inline SVG icon set (no icon library)
  components.php              reusable product components
  docs-renderer.php           documentation presentation layer
data/
  templates-data.php          the 12 templates (unchanged)
  tutorials-data.php          tutorials, grouped by product
static/css/maxbot.css         the whole design system, one file
static/js/maxbot.js           navigation, docs behaviour, screenshots (no dependencies)
```

**No Bootstrap, no jQuery, no icon library, no webfont bundle** on the
marketing and documentation pages. The old dark Bootstrap theme
(`static/frontend/`), the unused JS bundles and the duplicate `templates/`
folder have been removed — the site went from ~23 MB to ~11 MB.

The live template preview (`preview-template.php`, `view/`, `src/`, `widget/`,
`template-assets/`) is untouched and still works exactly as before. It does
still load jQuery from `code.jquery.com`, as it always has — worth knowing if
you ever want to make previews independent of a third-party CDN.

---

## 4. The visual identity

The palette comes from the Maxbot mark itself: deep navy `#002048` and signal
yellow `#FDD600`, on a cool white/grey paper. Yellow is used sparingly — as a
marker, never as a background you have to read text on. WhatsApp green
`#14704B` is reserved strictly for WhatsApp surfaces, so the channel is
instantly recognisable and never bleeds into Core pages.

Typography is Inter, with Source Serif 4 for pull-quotes only and a monospace
face for the product's own vocabulary (`@name`, trigger keywords, credential
names). This matches the WhatsApp CodeCanyon description, so the marketplace
page and the website now read as the same product.

**No screenshots or generated images are used in the marketing pages.**
Instead, the conversation itself is the artwork. `partials/components.php`
provides:

- `mb_thread()` — a chat transcript with quick replies
- `mb_flowmap()` — the Flow Editor's block tree
- `mb_phone()` — a WhatsApp thread on a device
- `mb_datarows()` — captured values as they land in Users Data
- `mb_path()` — the message pipeline
- `mb_window()` — a browser frame

They take arguments, so the same component tells a different story on each
page — and they stay sharp at any screen size because they are CSS, not images.

---

## 5. Documentation screenshots

The documentation content is **unchanged** — every section, callout, table and
screenshot reference is exactly as it was. Only the presentation was rebuilt.

Screenshot layout is decided automatically from each image's real dimensions
when it loads:

- **wide** screenshots (ratio ≥ 1.6) take their own full-width row
- **square and tall** screenshots sit beside the text they explain
- a section is only given the side-by-side layout once *every* screenshot in it
  has been measured, so it is never laid out from a guess
- no image is ever displayed wider than its natural size, so nothing is
  upscaled into blur, and each image gets a reserved `aspect-ratio` so nothing
  is stretched or jumps as it loads

This works for the local screenshots and for the remotely hosted ones equally,
without tagging any of them by hand. Clicking a screenshot opens it full size.

---

## 6. Checked

- Every page renders with no JavaScript errors and no broken internal links
- All PHP files pass `php -l`
- No horizontal overflow at 390 px on any page
- Mobile navigation, mobile documentation navigation, section filter, scroll
  spy and the screenshot lightbox all tested
- `prefers-reduced-motion` is respected throughout
