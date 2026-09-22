<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot documentation';
$pageDescription = 'Separate, complete documentation for Maxbot Core and the WhatsApp Integration add-on.';
$pageUrl         = mb_url('docs');
$navCurrent      = 'docs';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<section class="pagehead">
    <div class="container">
        <div class="eyebrow">Documentation</div>
        <h1 class="h-display" style="max-width:18ch;">Choose the product you want to configure.</h1>
        <p class="lede" style="margin-top:20px;max-width:62ch;">
            Maxbot Core and the WhatsApp Integration are documented separately, so each guide stays
            complete and focused instead of half-explaining both.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-2" style="gap:22px;">
            <a class="docpick" href="<?php echo mb_e(mb_url('docs-core')); ?>">
                <div class="channel-top">
                    <span class="channel-logo channel-logo--core"><?php echo mb_icon('box'); ?></span>
                    <span class="tag tag--core">Start here</span>
                </div>
                <div>
                    <h2 class="h-2">Maxbot Core</h2>
                    <p style="margin-top:12px;">
                        Install the plugin and build, test, improve and publish complete chatbot
                        experiences from inside WordPress.
                    </p>
                </div>
                <ul class="ticks">
                    <li><?php echo mb_icon('check'); ?><span>Agents, topics, templates and projects</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Quick replies, cards, keyword routing, fallbacks and joins</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Entities, variables, Users Data, rich content and training</span></li>
                </ul>
                <div class="docpick-foot">
                    <span class="textlink">Open Core documentation <?php echo mb_icon('arrow-right'); ?></span>
                </div>
            </a>

            <a class="docpick docpick--wa" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">
                <div class="channel-top">
                    <span class="channel-logo channel-logo--whatsapp"><?php echo mb_icon('whatsapp'); ?></span>
                    <span class="tag tag--live">Add-on</span>
                </div>
                <div>
                    <h2 class="h-2">WhatsApp Add-on</h2>
                    <p style="margin-top:12px;">
                        Connect a tested Maxbot flow to Meta's WhatsApp Cloud API and prepare the
                        integration for production.
                    </p>
                </div>
                <ul class="ticks">
                    <li><?php echo mb_icon('check'); ?><span>Meta app, credentials and webhook setup</span></li>
                    <li><?php echo mb_icon('check'); ?><span>WhatsApp projects, production number and permanent token</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Testing, logs, verification and carousel templates</span></li>
                </ul>
                <div class="docpick-foot">
                    <span class="textlink textlink--green">Open Add-on documentation <?php echo mb_icon('arrow-right'); ?></span>
                </div>
            </a>
        </div>

        <div class="callout callout--warn" style="margin-top:28px;">
            <strong>Installation order matters.</strong> Install and authorize Maxbot Core first. The
            WhatsApp product is an add-on and cannot operate without the active core plugin.
        </div>

        <div class="grid grid-3" style="margin-top:44px;">
            <a class="card card--hover" href="<?php echo mb_e(mb_url('tutorials')); ?>">
                <div class="card-icon card-icon--signal"><?php echo mb_icon('play'); ?></div>
                <h3 class="h-4">Video tutorials</h3>
                <p style="margin-top:8px;">Watch the same steps performed, for Core and for the WhatsApp setup.</p>
            </a>
            <a class="card card--hover" href="<?php echo mb_e(mb_url('templates')); ?>">
                <div class="card-icon"><?php echo mb_icon('grid'); ?></div>
                <h3 class="h-4">Template library</h3>
                <p style="margin-top:8px;">Preview a working conversation before you build one from scratch.</p>
            </a>
            <a class="card card--hover" href="<?php echo mb_e(mb_url('features')); ?>#licensing">
                <div class="card-icon"><?php echo mb_icon('info'); ?></div>
                <h3 class="h-4">Requirements</h3>
                <p style="margin-top:8px;">WordPress and PHP versions, HTTPS, licences and project allowances.</p>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
