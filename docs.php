<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Maxbot documentation | Free and Pro';
$pageDescription = 'Set up Maxbot Free, build with Maxbot Pro, or configure the separate WhatsApp Add-on.';
$pageUrl = mb_url('docs'); $navCurrent = 'docs';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>
<section class="pagehead"><div class="container">
    <div class="eyebrow">Documentation</div>
    <h1 class="h-display" style="max-width:19ch;">The right guide for your Maxbot.</h1>
    <p class="lede" style="margin-top:20px;max-width:62ch;">Choose Free or Pro to get started. The WhatsApp Add-on has its own setup guide.</p>
</div></section>
<section class="section"><div class="container">
    <div class="grid grid-2" style="gap:22px;">
        <a class="docpick" href="<?php echo mb_e(mb_url('docs-free')); ?>">
            <div class="channel-top"><span class="channel-logo channel-logo--core"><?php echo mb_icon('box'); ?></span><span class="tag tag--core">Free · Setup guide</span></div>
            <div><h2 class="h-2">Maxbot Free</h2><p style="margin-top:12px;">From the Starter Guide to your first published conversation. Configure one agent, build quick replies, test and enable your chatbot.</p></div>
            <ul class="ticks"><li><?php echo mb_icon('check'); ?><span>Agent, Project and Flow Editor</span></li><li><?php echo mb_icon('check'); ?><span>Test Flow, Conversations and notifications</span></li></ul>
            <div class="docpick-foot"><span class="textlink">Open the Free guide <?php echo mb_icon('arrow-right'); ?></span></div>
        </a>
        <a class="docpick" href="<?php echo mb_e(mb_url('docs-pro')); ?>">
            <div class="channel-top"><span class="channel-logo channel-logo--core"><?php echo mb_icon('layers'); ?></span><span class="tag tag--core">Pro · Builder guide</span></div>
            <div><h2 class="h-2">Maxbot Pro</h2><p style="margin-top:12px;">Explore the current full builder: agents, topics, templates, guided conversations, data capture and publishing.</p></div>
            <ul class="ticks"><li><?php echo mb_icon('check'); ?><span>Quick replies, cards and conversation routing</span></li><li><?php echo mb_icon('check'); ?><span>Entities, Users Data and website projects</span></li></ul>
            <div class="docpick-foot"><span class="textlink">Open the Pro guide <?php echo mb_icon('arrow-right'); ?></span></div>
        </a>
    </div>
    <div class="callout" style="margin-top:28px;"><strong>Maxbot Pro Professional.</strong> Annual billing and the final amount are shown by Freemius Checkout. <?php echo mb_edition_cta('pro', 'btn btn--ghost btn--sm'); ?></div>
    <a class="docpick docpick--wa" style="margin-top:28px;" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">
        <div class="channel-top"><span class="channel-logo channel-logo--whatsapp"><?php echo mb_icon('whatsapp'); ?></span><span class="tag tag--live">Separate add-on · Setup guide</span></div>
        <div><h2 class="h-2">WhatsApp Add-on</h2><p style="margin-top:12px;">Configure Meta credentials, webhooks, a connected flow and production settings. Check the add-on’s compatibility requirements for your installed edition.</p></div>
        <div class="docpick-foot"><span class="textlink textlink--green">Open the WhatsApp guide <?php echo mb_icon('arrow-right'); ?></span></div>
    </a>
    <div class="btn-row" style="margin-top:28px;"><a class="btn btn--ghost" href="<?php echo mb_e(mb_url('features')); ?>#licensing">Explore Free and Pro</a><a class="btn btn--ghost" href="<?php echo mb_e(mb_url('tutorials')); ?>">Watch tutorials</a></div>
</div></section>
<?php include __DIR__ . '/partials/footer.php'; ?>
