<?php
/**
 * Shared documentation renderer.
 *
 * Content is supplied by docs-core.php and docs-whatsapp.php. This file owns
 * only the presentation.
 */

require_once __DIR__ . '/../config.php';

if (!isset($pageTitle, $docVersion, $docKind, $heroTitle, $heroText, $docGroups, $docSections)) {
    throw new RuntimeException('The documentation page configuration is incomplete.');
}

$isWhatsApp      = $docKind === 'WhatsApp Add-on';
$pageDescription = $pageDescription ?? $pageDesc ?? $heroText;
$pageUrl         = $pageUrl ?? mb_url($isWhatsApp ? 'docs-whatsapp' : 'docs-core');
$navCurrent      = 'docs';

if (!function_exists('maxbot_docs_e')) {
    function maxbot_docs_e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('maxbot_docs_media')) {
    /**
     * Render one screenshot.
     *
     * The layout class is finished in the browser from the image's real
     * dimensions (see static/js/maxbot.js): wide shots take their own row,
     * tall and square shots sit beside the text, and nothing is ever
     * displayed larger than its natural size.
     */
    function maxbot_docs_media(array $media)
    {
        $src = $media['src'] ?? '';
        if ($src === '') {
            return;
        }

        if (strpos($src, 'static/images/') === 0) {
            $src = mb_url($src);
        }

        $alt     = $media['alt'] ?? 'Maxbot documentation screenshot';
        $caption = $media['caption'] ?? $alt;
        ?>
        <figure class="docs-fig" data-fig>
            <button type="button" data-zoom aria-label="Enlarge: <?php echo maxbot_docs_e($alt); ?>">
                <img src="<?php echo maxbot_docs_e($src); ?>" alt="<?php echo maxbot_docs_e($alt); ?>" loading="lazy" decoding="async">
            </button>
            <figcaption><?php echo maxbot_docs_e($caption); ?> <em>Click to enlarge.</em></figcaption>
        </figure>
        <?php
    }
}

include __DIR__ . '/header.php';
include __DIR__ . '/navbar.php';
?>

<div class="docs-shell">
    <aside class="docs-aside<?php echo $isWhatsApp ? ' docs-aside--wa' : ''; ?>" aria-label="Documentation navigation">
        <button class="docs-mobile-toggle" type="button" data-docs-toggle aria-expanded="false" aria-controls="docs-nav">
            <?php echo mb_icon('menu'); ?> Browse documentation
        </button>

        <div id="docs-nav" class="docs-nav" data-docs-nav>
            <nav class="docs-switch" aria-label="Documentation products">
                <a href="<?php echo mb_e(mb_url('docs')); ?>">
                    <?php echo mb_icon('home'); ?> Documentation home
                </a>
                <a class="<?php echo $isWhatsApp ? '' : 'is-active'; ?>" href="<?php echo mb_e(mb_url('docs-core')); ?>">
                    <?php echo mb_icon('box'); ?> Maxbot Core
                </a>
                <a class="is-wa <?php echo $isWhatsApp ? 'is-active' : ''; ?>" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">
                    <?php echo mb_icon('whatsapp'); ?> WhatsApp Add-on
                </a>
            </nav>

            <label class="docs-search">
                <span class="sr-only">Filter documentation sections</span>
                <?php echo mb_icon('search'); ?>
                <input id="docs-filter" type="search" placeholder="Filter sections…" autocomplete="off">
            </label>
            <div id="docs-filter-empty" class="docs-empty">No matching section.</div>

            <?php foreach ($docGroups as $groupIndex => $group) : ?>
                <details class="docs-group" <?php echo $groupIndex < 2 ? 'open' : ''; ?>>
                    <summary><?php echo maxbot_docs_e($group['title']); ?></summary>
                    <div class="items">
                        <?php foreach ($group['items'] as $item) : ?>
                            <a class="docs-link" href="#<?php echo maxbot_docs_e($item['id']); ?>" data-docs-link><?php echo maxbot_docs_e($item['title']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </aside>

    <div class="docs-main">
        <header class="docs-hero<?php echo $isWhatsApp ? ' docs-hero--wa' : ''; ?>">
            <div class="eyebrow<?php echo $isWhatsApp ? ' eyebrow--green' : ''; ?>">
                <?php echo maxbot_docs_e($docKind); ?> documentation · <?php echo maxbot_docs_e($docVersion); ?>
            </div>
            <h1><?php echo maxbot_docs_e($heroTitle); ?></h1>
            <p><?php echo maxbot_docs_e($heroText); ?></p>

            <?php if (!empty($heroBadges)) : ?>
                <div class="chip-row" style="margin-top:22px;">
                    <?php foreach ($heroBadges as $badge) : ?>
                        <span class="chip<?php echo $isWhatsApp ? ' chip--green' : ''; ?>"><?php echo maxbot_docs_e($badge); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </header>

        <?php foreach ($docSections as $sectionIndex => $section) :
            $media = $section['media'] ?? [];
            ?>
            <section id="<?php echo maxbot_docs_e($section['id']); ?>" class="doc-sec" data-docs-section>
                <div class="doc-sec-head">
                    <span class="doc-sec-num"><?php echo str_pad((string) ($sectionIndex + 1), 2, '0', STR_PAD_LEFT); ?></span>
                    <h2><?php echo maxbot_docs_e($section['title']); ?></h2>
                </div>

                <div class="doc-sec-body">
                    <div class="doc-sec-text"><?php echo $section['body']; ?></div>

                    <?php if (!empty($media)) : ?>
                        <div class="docs-figs" data-figs>
                            <?php foreach ($media as $item) {
                                maxbot_docs_media($item);
                            } ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <?php if (!empty($nextPage)) : ?>
            <a class="docs-next" href="<?php echo maxbot_docs_e(mb_url(basename($nextPage['href'], '.php'))); ?>">
                <span><?php echo maxbot_docs_e($nextPage['label']); ?></span>
                <?php echo mb_icon('arrow-right'); ?>
            </a>
        <?php endif; ?>
    </div>
</div>

<div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Documentation screenshot" aria-hidden="true">
    <button type="button" aria-label="Close enlarged screenshot">&times;</button>
    <img src="" alt="">
</div>

<?php include __DIR__ . '/footer.php'; ?>
