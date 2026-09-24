<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot tutorials, step-by-step video guides';
$pageDescription = 'Video tutorials for Maxbot builder and the WhatsApp Integration: build quick reply and advanced keyword-driven flows, capture and reuse user data, use templates, customize the widget, and configure WhatsApp.';
$pageUrl         = mb_url('tutorials');
$navCurrent      = 'tutorials';

$groups = require __DIR__ . '/data/tutorials-data.php';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';

$renderGroup = static function (string $key, array $group): void {
    $isWhatsApp = $key === 'whatsapp';
    ?>
    <section class="section<?php echo $isWhatsApp ? ' band band--tint band--line-top' : ''; ?>" id="<?php echo mb_e($key); ?>">
        <div class="container">
            <div class="split" style="align-items:flex-end;margin-bottom:34px;gap:40px;">
                <div>
                    <div class="eyebrow<?php echo $isWhatsApp ? ' eyebrow--green' : ''; ?>">
                        <?php echo $isWhatsApp ? 'Add-on tutorials' : 'Builder tutorials'; ?>
                    </div>
                    <h2 class="h-2"><?php echo mb_e($group['label']); ?></h2>
                    <p class="lede" style="margin-top:12px;max-width:50ch;"><?php echo mb_e($group['description']); ?></p>
                </div>
                <div style="text-align:right;">
                    <a class="btn btn--ghost btn--sm" href="<?php echo mb_e($isWhatsApp ? mb_url('docs-whatsapp') : mb_url('docs-core')); ?>">
                        <?php echo mb_icon('book'); ?>
                        <?php echo $isWhatsApp ? 'WhatsApp documentation' : 'Legacy builder reference'; ?>
                    </a>
                </div>
            </div>

            <div class="grid grid-<?php echo count($group['items']) > 2 ? '4' : '2'; ?>">
                <?php foreach ($group['items'] as $item) :
                    $placeholder = !empty($item['placeholder']);
                    $tag  = $placeholder ? 'div' : 'a';
                    $attr = $placeholder ? '' : ' href="' . mb_e($item['url']) . '" target="_blank" rel="noopener noreferrer"';
                    ?>
                    <<?php echo $tag . $attr; ?> class="tut<?php echo $isWhatsApp ? ' tut--wa' : ''; ?>">
                        <span class="tut-play"><?php echo mb_icon($placeholder ? 'video' : 'play'); ?></span>

                        <div class="tut-meta">
                            <span class="tag <?php echo $isWhatsApp ? 'tag--live' : 'tag--core'; ?>"><?php echo mb_e($item['level']); ?></span>
                            <span class="chip"><?php echo mb_icon('clock'); ?> <?php echo mb_e($item['duration']); ?></span>
                        </div>

                        <div>
                            <h3><?php echo mb_e($item['title']); ?></h3>
                            <p style="margin-top:8px;"><?php echo mb_e($item['description']); ?></p>
                        </div>

                        <div class="tut-foot">
                            <?php if ($placeholder) : ?>
                                <span class="tiny" style="display:flex;align-items:center;gap:7px;">
                                    <?php echo mb_icon('clock'); ?> Link coming soon
                                </span>
                            <?php else : ?>
                                <span class="textlink<?php echo $isWhatsApp ? ' textlink--green' : ''; ?>">
                                    Watch on YouTube <?php echo mb_icon('external'); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </<?php echo $tag; ?>>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
};
?>

<section class="pagehead">
    <div class="container">
        <div class="split" style="align-items:flex-end;">
            <div>
                <div class="eyebrow">Tutorials</div>
                <h1 class="h-display" style="max-width:15ch;">Watch it built, then build it.</h1>
            </div>
            <div>
                <p class="lede">
                    Practical walkthroughs from first flow to advanced routing. The Builder tutorials cover quick replies,
                    user data, templates, widget customization, keywords, variables, Join routing, and saved responses.
                    The WhatsApp tutorials cover complete setup and production readiness, plus carousel templates.
                </p>
                <div class="btn-row" style="margin-top:22px;">
                    <a class="btn btn--ghost btn--sm" href="#core"><?php echo mb_icon('box'); ?> Builder tutorials</a>
                    <a class="btn btn--ghost btn--sm" href="#whatsapp"><?php echo mb_icon('whatsapp'); ?> WhatsApp tutorials</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/showcase-notice.php'; ?>
<?php
foreach ($groups as $key => $group) {
    $renderGroup($key, $group);
}
?>

<section class="section band band--ink">
    <div class="container center">
        <h2 class="h-1" style="max-width:22ch;margin:0 auto;">Prefer to read it?</h2>
        <p class="lede" style="margin:16px auto 0;max-width:54ch;">
            Choose your edition guide, consult the legacy builder reference or follow the separate WhatsApp setup.
        </p>
        <div class="btn-row" style="justify-content:center;margin-top:28px;">
            <a class="btn btn--signal" href="<?php echo mb_e(mb_url('docs-core')); ?>">Legacy builder reference</a>
            <a class="btn btn--onink" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">WhatsApp documentation</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
