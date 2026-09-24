<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Maxbot documentation | Free, Standard and Pro';
$pageDescription = 'Get started with Maxbot Free, understand Standard, check Pro documentation status, or configure the separate WhatsApp Add-on.';
$pageUrl = mb_url('docs'); $navCurrent = 'docs';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>
<section class="pagehead"><div class="container">
    <div class="eyebrow">Documentation</div>
    <h1 class="h-display" style="max-width:19ch;">The right guide for your Maxbot.</h1>
    <p class="lede" style="margin-top:20px;max-width:62ch;">Start with your edition. The WhatsApp Add-on has its own setup guide, and the earlier full-builder reference remains available for existing users.</p>
</div></section>
<section class="section"><div class="container">
    <div class="grid grid-2" style="gap:22px;">
        <a class="docpick" href="<?php echo mb_e(mb_url('docs-free')); ?>">
            <div class="channel-top"><span class="channel-logo channel-logo--core"><?php echo mb_icon('box'); ?></span><span class="tag tag--core">Free · Setup guide</span></div>
            <div><h2 class="h-2">Maxbot Free</h2><p style="margin-top:12px;">From the Starter Guide to your first published conversation. Configure one agent, build quick replies, test and enable your chatbot.</p></div>
            <ul class="ticks"><li><?php echo mb_icon('check'); ?><span>Agent, Project and Flow Editor</span></li><li><?php echo mb_icon('check'); ?><span>Test Flow, Conversations and notifications</span></li></ul>
            <div class="docpick-foot"><span class="textlink">Open the Free guide <?php echo mb_icon('arrow-right'); ?></span></div>
        </a>
        <a class="docpick" href="<?php echo mb_e(mb_url('docs-standard')); ?>">
            <div class="channel-top"><span class="channel-logo channel-logo--core"><?php echo mb_icon('layers'); ?></span><span class="tag tag--core">Standard · Edition guide</span></div>
            <div><h2 class="h-2">Maxbot Standard</h2><p style="margin-top:12px;">Understand the one-time purchase model, installation preparation and how to choose the right documentation.</p></div>
            <p>Planned for CodeCanyon. Read the edition overview and prepare for installation.</p>
            <div class="docpick-foot"><span class="textlink">Open the Standard guide <?php echo mb_icon('arrow-right'); ?></span></div>
        </a>
        <article class="docpick">
            <div class="channel-top"><span class="channel-logo channel-logo--core"><?php echo mb_icon('box'); ?></span><span class="tag">Pro · Coming soon</span></div>
            <div><h2 class="h-2">Maxbot Pro</h2><p style="margin-top:12px;">The monthly subscription edition is planned for this website using Freemius. Pro documentation and checkout are coming soon.</p></div>
            <div class="docpick-foot"><?php echo mb_edition_cta('pro'); ?></div>
        </article>
        <a class="docpick docpick--wa" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">
            <div class="channel-top"><span class="channel-logo channel-logo--whatsapp"><?php echo mb_icon('whatsapp'); ?></span><span class="tag tag--live">Separate add-on · Setup guide</span></div>
            <div><h2 class="h-2">WhatsApp Add-on</h2><p style="margin-top:12px;">Configure Meta credentials, webhooks, a connected flow and production settings. Check the add-on’s compatibility requirements for your installed edition.</p></div>
            <div class="docpick-foot"><span class="textlink textlink--green">Open the WhatsApp guide <?php echo mb_icon('arrow-right'); ?></span></div>
        </a>
    </div>
    <div class="callout" style="margin-top:28px;"><strong>Using the earlier full builder?</strong> The <a class="textlink" href="<?php echo mb_e(mb_url('docs-core')); ?>">legacy builder reference</a> keeps existing section links and screenshots. It is separate from the current Free guide and does not establish Standard or Pro features.</div>
    <div class="btn-row" style="margin-top:28px;"><a class="btn btn--ghost" href="<?php echo mb_e(mb_url('features')); ?>#licensing">Compare edition models</a><a class="btn btn--ghost" href="<?php echo mb_e(mb_url('tutorials')); ?>">Watch tutorials</a></div>
</div></section>
<?php include __DIR__ . '/partials/footer.php'; ?>
