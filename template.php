<?php
require_once __DIR__ . '/config.php';

$templates = require __DIR__ . '/data/templates-data.php';

$slug     = $_GET['slug'] ?? '';
$template = null;
$index    = null;

foreach ($templates as $position => $item) {
    if (($item['slug'] ?? '') === $slug) {
        $template = $item;
        $index    = $position;
        break;
    }
}

if (!$template) {
    header('Location: ' . mb_url('templates'));
    exit;
}

$others = array_values(array_filter($templates, static function ($item) use ($slug) {
    return ($item['slug'] ?? '') !== $slug;
}));
shuffle($others);
$others = array_slice($others, 0, 3);

$pageTitle       = $template['title'] . ' template, Maxbot';
$pageDescription = $template['subtitle'];
$pageUrl         = mb_url('template?slug=' . urlencode($slug));
$navCurrent      = 'templates';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<section class="pagehead">
    <div class="container">
        <nav class="small" style="margin-bottom:22px;display:flex;align-items:center;gap:8px;">
            <a href="<?php echo mb_e(mb_url('templates')); ?>" style="color:var(--muted);">Templates</a>
            <span style="color:var(--faint);">/</span>
            <span style="color:var(--ink);"><?php echo mb_e($template['title']); ?></span>
        </nav>

        <div class="split split--wide-left" style="align-items:center;gap:52px;">
            <div>
                <div class="eyebrow">Template <?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></div>
                <h1 class="h-display" style="max-width:15ch;"><?php echo mb_e($template['title']); ?></h1>
                <p class="lede" style="margin-top:18px;max-width:48ch;"><?php echo mb_e($template['subtitle']); ?></p>

                <?php if (!empty($template['highlights'])) : ?>
                    <div class="chip-row" style="margin-top:22px;">
                        <?php foreach ($template['highlights'] as $highlight) : ?>
                            <span class="chip"><?php echo mb_e($highlight); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="callout" style="margin-top:26px;">
                    <strong>This preview is the real conversation.</strong> Tap the buttons and follow a
                    branch, it is the same flow you import into WordPress, running the same runtime.
                </div>

                <div class="btn-row" style="margin-top:26px;">
                    <?php echo mb_edition_cta('standard', 'btn btn--primary'); ?>
                    <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('templates')); ?>">All templates</a>
                </div>
            </div>

            <div>
                <div class="preview-shell">
                    <div class="preview-head">
                        <span class="thread-avatar" style="width:30px;height:30px;"><?php echo mb_icon('message'); ?></span>
                        <span>
                            <span class="t" style="display:block;"><?php echo mb_e($template['title']); ?></span>
                            <span class="tiny" style="display:block;">Live preview</span>
                        </span>
                        <button type="button" class="btn btn--ghost btn--sm" id="reload-preview">
                            <?php echo mb_icon('refresh'); ?> Restart
                        </button>
                    </div>
                    <div class="preview-body">
                        <iframe
                            id="template-preview-frame"
                            title="<?php echo mb_e($template['title']); ?> preview"
                            src="<?php echo mb_e(mb_url('preview-template.php?template_id=' . urlencode($template['slug']))); ?>"
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/partials/showcase-notice.php'; ?>


<section class="section">
    <div class="container">
        <div class="head-center">
            <div class="eyebrow eyebrow--center">What you can change</div>
            <h2 class="h-2">Everything in it is editable.</h2>
        </div>

        <div class="grid grid-4">
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('message'); ?></div>
                <h3 class="h-4">The messages</h3>
                <p style="margin-top:7px;">Rewrite every bubble in your own voice, in any language you can type.</p>
            </article>
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('flow'); ?></div>
                <h3 class="h-4">The branches</h3>
                <p style="margin-top:7px;">Keep the paths that fit your business and delete the ones that don't.</p>
            </article>
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('database'); ?></div>
                <h3 class="h-4">The fields</h3>
                <p style="margin-top:7px;">Swap in your own entities, city, budget, order number, group size.</p>
            </article>
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('sliders'); ?></div>
                <h3 class="h-4">The widget</h3>
                <p style="margin-top:7px;">Your agent name, greeting, colours and the pages it appears on.</p>
            </article>
        </div>
    </div>
</section>

<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="split" style="align-items:flex-end;margin-bottom:32px;gap:40px;">
            <div>
                <div class="eyebrow">Keep looking</div>
                <h2 class="h-2">Other templates</h2>
            </div>
            <div style="text-align:right;">
                <a class="btn btn--ghost btn--sm" href="<?php echo mb_e(mb_url('templates')); ?>">
                    See all <?php echo mb_icon('arrow-right'); ?>
                </a>
            </div>
        </div>

        <div class="tpl-grid">
            <?php foreach ($others as $other) : ?>
                <a class="tpl" href="<?php echo mb_e(mb_url('template?slug=' . urlencode($other['slug']))); ?>">
                    <div class="tpl-top">
                        <span class="tpl-icon"><?php echo mb_icon($other['icon']); ?></span>
                    </div>
                    <div>
                        <h3><?php echo mb_e($other['title']); ?></h3>
                        <p style="margin-top:7px;"><?php echo mb_e($other['description']); ?></p>
                    </div>
                    <span class="tpl-foot">Open live preview <?php echo mb_icon('arrow-right'); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
document.getElementById('reload-preview')?.addEventListener('click', function () {
    var frame = document.getElementById('template-preview-frame');
    if (frame) frame.src = frame.src;
});
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
