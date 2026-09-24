<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot channels, website widget, WhatsApp, and the roadmap';
$pageDescription = 'Maxbot publishes the same conversation on your website widget and on WhatsApp through the official Cloud API. Instagram, Messenger and Telegram are planned as future add-ons.';
$pageUrl         = mb_url('integrations');
$navCurrent      = 'integrations';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<section class="pagehead">
    <div class="container">
        <div class="split" style="align-items:flex-end;">
            <div>
                <div class="eyebrow">Channels</div>
                <h1 class="h-display" style="max-width:16ch;">One conversation, published where it belongs.</h1>
            </div>
            <div>
                <p class="lede">
                    Maxbot builder owns the conversation. A channel decides where that conversation
                    runs. The website widget ships with Maxbot Free; WhatsApp is a separate add-on. More
                    channels are planned, and we will only list one as available when its add-on
                    genuinely is.
                </p>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/partials/showcase-notice.php'; ?>


<!-- ======================================================== AVAILABLE -->
<section class="section">
    <div class="container">
        <div class="head">
            <div class="eyebrow">Available today</div>
            <h2 class="h-2">Two channels, one set of flows.</h2>
        </div>

        <div class="grid grid-2" style="gap:22px;">
            <article class="card" style="padding:0;overflow:hidden;">
                <div style="padding:28px;">
                    <div class="channel-top" style="margin-bottom:18px;">
                        <span class="channel-logo channel-logo--core"><?php echo mb_icon('message'); ?></span>
                        <div>
                            <h3 class="h-3">Website widget</h3>
                            <span class="tag tag--core" style="margin-top:6px;display:inline-block;">Included in Maxbot builder</span>
                        </div>
                    </div>
                    <p>
                        A floating chat trigger on the pages you choose, carrying your greeting,
                        your agent, your colours and your layout. Controlled by a project, so you
                        can switch it off without losing anything you built.
                    </p>
                    <ul class="ticks" style="margin-top:18px;">
                        <li><?php echo mb_icon('check'); ?><span>Greeting, colours and layout options</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Page-level targeting</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Desktop and mobile</span></li>
                    </ul>
                    <div class="btn-row" style="margin-top:22px;">
                        <a class="btn btn--ghost btn--sm" href="<?php echo mb_e(mb_url('features')); ?>#widget">How it works</a>
                        <a class="btn btn--ghost btn--sm" href="<?php echo mb_e(mb_url('templates')); ?>">Try a live preview</a>
                    </div>
                </div>
            </article>

            <article class="card" style="padding:0;overflow:hidden;border-color:var(--green-line);">
                <div style="padding:28px;">
                    <div class="channel-top" style="margin-bottom:18px;">
                        <span class="channel-logo channel-logo--whatsapp"><?php echo mb_icon('whatsapp'); ?></span>
                        <div>
                            <h3 class="h-3">WhatsApp</h3>
                            <span class="tag tag--live" style="margin-top:6px;display:inline-block;">Separate add-on · Available</span>
                        </div>
                    </div>
                    <p>
                        Incoming WhatsApp messages are delivered by Meta's webhook, resolved to a
                        linked WhatsApp project, passed into the assigned Maxbot flow, and answered
                        through the official Cloud API.
                    </p>
                    <ul class="ticks" style="margin-top:18px;">
                        <li><?php echo mb_icon('check'); ?><span>Official Meta Cloud API, your own credentials</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Keyword triggers with exact, contains or starts-with matching</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Approved templates, carousels, delivery logs</span></li>
                    </ul>
                    <div class="btn-row" style="margin-top:22px;">
                        <a class="btn btn--green btn--sm" href="<?php echo mb_e(mb_url('whatsapp')); ?>">Explore the add-on</a>
                        <a class="btn btn--ghost btn--sm" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">Setup guide</a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- ========================================================== ROADMAP -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="head-center">
            <div class="eyebrow eyebrow--center">Roadmap</div>
            <h2 class="h-1">Planned, and not pretending otherwise.</h2>
            <p class="lede" style="margin-top:16px;">
                The architecture is built so a new channel can be added without changing what
                Maxbot builder is. These add-ons are not released yet, so nothing here is on sale
                and nothing here is included with a current purchase.
            </p>
        </div>

        <div class="grid grid-3">
            <article class="channel channel--soon">
                <div class="channel-top">
                    <span class="channel-logo"><?php echo mb_icon('instagram'); ?></span>
                    <span class="tag tag--soon">Coming soon</span>
                </div>
                <div>
                    <h3>Instagram Direct</h3>
                    <p style="margin-top:6px;">
                        Bringing the same guided flows to Instagram direct messages, through Meta's
                        messaging platform.
                    </p>
                </div>
                <div class="channel-foot">
                    <span class="tiny">Status: planned · Not available</span>
                </div>
            </article>

            <article class="channel channel--soon">
                <div class="channel-top">
                    <span class="channel-logo"><?php echo mb_icon('messenger'); ?></span>
                    <span class="tag tag--soon">Coming soon</span>
                </div>
                <div>
                    <h3>Messenger</h3>
                    <p style="margin-top:6px;">
                        Page conversations answered by a Maxbot flow, using the same projects and
                        captured fields.
                    </p>
                </div>
                <div class="channel-foot">
                    <span class="tiny">Status: planned · Not available</span>
                </div>
            </article>

            <article class="channel channel--soon">
                <div class="channel-top">
                    <span class="channel-logo"><?php echo mb_icon('telegram'); ?></span>
                    <span class="tag tag--soon">Under consideration</span>
                </div>
                <div>
                    <h3>Telegram</h3>
                    <p style="margin-top:6px;">
                        Being evaluated as a future add-on for businesses whose audience lives on
                        Telegram.
                    </p>
                </div>
                <div class="channel-foot">
                    <span class="tiny">Status: exploring · Not available</span>
                </div>
            </article>
        </div>

        <div class="callout" style="margin-top:30px;">
            <strong>What "coming soon" means here.</strong> A channel is listed as available only once
            its add-on, documentation and supported workflows are finished. Until then it stays on this
            page as a plan, not a promise attached to a purchase.
        </div>
    </div>
</section>

<!-- ======================================================== WHY IT WORKS -->
<section class="section">
    <div class="container">
        <div class="split split--wide-left">
            <div>
                <div class="eyebrow">Why this structure</div>
                <h2 class="h-1">The flow outlives the channel.</h2>
                <p class="lede" style="margin-top:16px;">
                    Because the conversation lives in the builder and the channel is only a delivery
                    surface, a support flow you build today keeps working when a new channel
                    arrives. The same captured fields, the same branches, the same project model.
                </p>
                <div class="btn-row" style="margin-top:26px;">
                    <a class="textlink" href="<?php echo mb_e(mb_url('features')); ?>">
                        Explore builder examples <?php echo mb_icon('arrow-right'); ?>
                    </a>
                </div>
            </div>

            <div>
                <div class="artboard">
                    <div class="artboard-label"><span class="dot"></span> One flow, two published projects</div>
                    <?php echo mb_flowmap([
                        'kind' => 'Topic · Support',
                        'text' => 'What do you need help with?',
                        'children' => [
                            ['label' => 'Order status', 'note' => 'Quick reply'],
                            ['label' => 'Returns', 'note' => 'Quick reply'],
                            ['label' => 'Something else', 'note' => 'Quick reply'],
                        ],
                    ]); ?>

                    <div class="grid grid-2" style="margin-top:24px;gap:12px;">
                        <div class="node">
                            <div class="node-kind">Project A</div>
                            <div class="node-text">Website widget, all pages except checkout.</div>
                        </div>
                        <div class="node" style="border-color:var(--green-line);">
                            <div class="node-kind">Project B</div>
                            <div class="node-text">WhatsApp, trigger on <span class="mono">support</span>.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
