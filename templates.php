<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot templates, ready-made chatbot conversations';
$pageDescription = 'Twelve prebuilt Maxbot conversations for booking, support, lead generation, ecommerce, healthcare and more. Preview each one live, then import and adapt it.';
$pageUrl         = mb_url('templates');
$navCurrent      = 'templates';

$templates = require __DIR__ . '/data/templates-data.php';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<section class="pagehead">
    <div class="container">
        <div class="split split--wide-left" style="align-items:center;">
            <div>
                <div class="eyebrow">Template library</div>
                <h1 class="h-display" style="max-width:16ch;">You never start from a blank screen.</h1>
                <p class="lede" style="margin-top:20px;max-width:50ch;">
                    The hardest part of a chatbot is not the tool. It is the empty page and the
                    question <em>what should it even say?</em> Import the structure closest to your
                    business, change the words to yours, and launch.
                </p>
                <div class="btn-row" style="margin-top:26px;">
                    <a class="btn btn--primary" href="#library">
                        Browse all <?php echo count($templates); ?> templates <?php echo mb_icon('arrow-down'); ?>
                    </a>
                    <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('tutorials')); ?>">
                        <?php echo mb_icon('play'); ?> Watch the templates tutorial
                    </a>
                </div>
            </div>

            <div>
                <div class="artboard">
                    <div class="artboard-label"><span class="dot"></span> How a template becomes yours</div>
                    <ol class="steps" style="margin-top:4px;">
                        <li>
                            <h4 class="h-4">Preview it live</h4>
                            <p>Talk to the conversation on this site before you commit to anything.</p>
                        </li>
                        <li>
                            <h4 class="h-4">Import the structure</h4>
                            <p>The blocks, branches and captured fields arrive already connected.</p>
                        </li>
                        <li>
                            <h4 class="h-4">Rewrite it in your words</h4>
                            <p>Change messages, buttons, cards and fields. Delete the branches you don't need.</p>
                        </li>
                        <li>
                            <h4 class="h-4">Test, then publish</h4>
                            <p>Run every path in Test Flow, then attach it to a project.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="library">
    <div class="container">
        <div class="split" style="align-items:flex-end;margin-bottom:36px;gap:40px;">
            <div>
                <div class="eyebrow">The library</div>
                <h2 class="h-2">Twelve conversations, built for real business goals.</h2>
            </div>
            <div style="text-align:right;">
                <p class="small">Every template opens on its own page with a live, tappable preview.</p>
            </div>
        </div>

        <div class="tpl-grid">
            <?php foreach ($templates as $template) : ?>
                <a class="tpl" href="<?php echo mb_e(mb_url('template?slug=' . urlencode($template['slug']))); ?>">
                    <div class="tpl-top">
                        <span class="tpl-icon"><?php echo mb_icon($template['icon']); ?></span>
                    </div>
                    <div>
                        <h3><?php echo mb_e($template['title']); ?></h3>
                        <p style="margin-top:7px;"><?php echo mb_e($template['description']); ?></p>
                    </div>
                    <?php if (!empty($template['highlights'])) : ?>
                        <div class="chip-row">
                            <?php foreach (array_slice($template['highlights'], 0, 2) as $highlight) : ?>
                                <span class="chip"><?php echo mb_e($highlight); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <span class="tpl-foot">Open live preview <?php echo mb_icon('arrow-right'); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section band band--tint band--line-top">
    <div class="container center">
        <div class="container--narrow" style="margin:0 auto;padding:0;">
            <div class="eyebrow eyebrow--center">After the import</div>
            <h2 class="h-1">A template is a starting point, not a straitjacket.</h2>
            <p class="lede" style="margin-top:16px;">
                Once a template is in your WordPress, it is an ordinary Maxbot topic. Every message,
                button, card, entity and branch is yours to edit, and the branches you delete are
                gone for good.
            </p>
            <div class="btn-row" style="justify-content:center;margin-top:28px;">
                <a class="btn btn--primary" href="<?php echo mb_e(MAXBOT_CORE_BUY_URL); ?>">
                    Get Maxbot Core <?php echo mb_icon('arrow-right'); ?>
                </a>
                <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('docs-core')); ?>#template-library">Read the template docs</a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
