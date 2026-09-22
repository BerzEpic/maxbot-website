<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot Core features, the visual chatbot builder for WordPress';
$pageDescription = 'Agents, topics, the visual Flow Editor, quick replies and cards, entities and validation, Users Data, templates, rich content, Test Flow, projects and the website widget.';
$pageUrl         = mb_url('features');
$navCurrent      = 'features';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<section class="pagehead">
    <div class="container">
        <div class="split" style="align-items:flex-end;">
            <div>
                <div class="eyebrow">Maxbot Core</div>
                <h1 class="h-display" style="max-width:17ch;">The builder behind every Maxbot conversation.</h1>
            </div>
            <div>
                <p class="lede">
                    Core is where the conversation is designed, tested and published. Channels only
                    decide where it runs. Everything on this page is included in the plugin, on
                    either licence.
                </p>
                <div class="btn-row" style="margin-top:22px;">
                    <a class="btn btn--primary btn--sm" href="<?php echo mb_e(MAXBOT_CORE_BUY_URL); ?>">Get Maxbot Core</a>
                    <a class="btn btn--ghost btn--sm" href="<?php echo mb_e(mb_url('docs-core')); ?>">Read the docs</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================== THE VOCABULARY -->
<section class="section">
    <div class="container">
        <div class="head">
            <div class="eyebrow">The vocabulary</div>
            <h2 class="h-1">Five words that explain the whole product.</h2>
            <p class="lede" style="margin-top:16px;">
                Once these five make sense, nothing else in Maxbot is surprising.
            </p>
        </div>

        <div class="grid grid-3">
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('users'); ?></div>
                <h3 class="h-3">Agent</h3>
                <p style="margin-top:8px;">The visible identity of the chatbot, a name, an avatar, a role and a short description. A support assistant, a booking assistant, a product guide.</p>
            </article>
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('sitemap'); ?></div>
                <h3 class="h-3">Topic</h3>
                <p style="margin-top:8px;">One focused conversation with one objective: answer pricing questions, book an appointment, qualify a lead, guide a support request.</p>
            </article>
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('layers'); ?></div>
                <h3 class="h-3">Block</h3>
                <p style="margin-top:8px;">One conversational moment. How it is reached, what the bot sends, what is stored, and what happens next.</p>
            </article>
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('database'); ?></div>
                <h3 class="h-3">Entity</h3>
                <p style="margin-top:8px;">A reusable data field with a stable variable name, validated on the way in and reusable in any later message.</p>
            </article>
            <article class="card">
                <div class="card-icon"><?php echo mb_icon('target'); ?></div>
                <h3 class="h-3">Project</h3>
                <p style="margin-top:8px;">The deployable configuration: which agent, which flow, which channel, and where it appears. Switchable on and off.</p>
            </article>
            <article class="card card--tint" style="display:flex;flex-direction:column;justify-content:center;">
                <p class="serif" style="font-size:1.15rem;color:var(--ink);line-height:1.45;">
                    An agent presents a topic. The topic is made of blocks. Blocks capture entities.
                    A project publishes the result.
                </p>
            </article>
        </div>
    </div>
</section>

<!-- ========================================================= FLOW EDITOR -->
<section class="section band band--tint band--line-top" id="flow-editor">
    <div class="container">
        <div class="split split--wide-right">
            <div>
                <div class="eyebrow">The Flow Editor</div>
                <h2 class="h-1">A readable structure, not an infinite canvas.</h2>
                <p class="lede" style="margin-top:16px;">
                    The editor shows the conversation as a tree of connected blocks, so you can see
                    the whole journey and edit any single step of it. Its strength is that the
                    structure stays legible when the conversation gets long.
                </p>

                <h3 class="h-3" style="margin-top:30px;">Each block holds three decisions</h3>
                <ul class="ticks" style="margin-top:16px;">
                    <li><?php echo mb_icon('check'); ?><span><b>User Input.</b> How this block is reached from its parent, a quick reply, a card, or an optional typed keyword.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Bot Responses.</b> What Maxbot sends when the block is reached, as one message or a short sequence.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Next Step.</b> What happens afterwards, wait, validate, store, branch, jump, or close.</span></li>
                </ul>
            </div>

            <div>
                <div class="artboard artboard--plain">
                    <div class="artboard-label"><span class="dot"></span> Block anatomy</div>

                    <div class="node node--active" style="margin-bottom:12px;">
                        <div class="node-kind">User input</div>
                        <div class="node-text">Reached by the quick reply <strong>Book a visit</strong>.</div>
                    </div>
                    <div class="node" style="margin-bottom:12px;">
                        <div class="node-kind">Bot responses</div>
                        <div class="node-text">
                            “Great choice.”<br>
                            “Which city should I look in?”
                        </div>
                    </div>
                    <div class="node" style="margin-bottom:12px;">
                        <div class="node-kind">Next step</div>
                        <div class="node-text">Require a quick reply, and save the selection into <span class="mono" style="color:var(--navy);">@city</span>.</div>
                    </div>
                    <div class="node node--muted">
                        <div class="node-kind">Rich content</div>
                        <div class="node-text">Optional card, image, GIF, video or link.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== INPUT -->
<section class="section">
    <div class="container">
        <div class="head">
            <div class="eyebrow">User input</div>
            <h2 class="h-1">Buttons first. Typing only when it earns its place.</h2>
            <p class="lede measure" style="margin-top:16px;">
                Guided choices make conversations predictable, easy to test, and far more likely to
                finish. Free text is supported where a step genuinely needs it.
            </p>
        </div>

        <div class="grid grid-3">
            <article class="card">
                <div class="card-icon card-icon--signal"><?php echo mb_icon('cursor'); ?></div>
                <h3 class="h-3">Quick reply buttons</h3>
                <p style="margin-top:8px;">Short, fixed buttons that lead straight to their connected block. The available paths are visible, so nobody has to guess what to type.</p>
                <div class="replies" style="margin-top:16px;">
                    <span class="reply">Track my order</span>
                    <span class="reply">Returns</span>
                    <span class="reply reply--picked">Talk to a person</span>
                </div>
            </article>

            <article class="card">
                <div class="card-icon card-icon--signal"><?php echo mb_icon('layout'); ?></div>
                <h3 class="h-3">Quick replies as cards</h3>
                <p style="margin-top:8px;">When a plain button isn't enough context: an image, a title, a short description and button text. Useful for products, plans, services and categories.</p>
                <div class="ccard" style="margin-top:16px;flex:1 1 auto;border-color:var(--line);">
                    <div class="ccard-media" style="background:var(--tint);color:var(--navy);"><?php echo mb_icon('image'); ?></div>
                    <h4>Standard service</h4>
                    <p>Two-hour visit, parts included</p>
                    <span class="ccard-btn" style="color:var(--navy);">Choose this</span>
                </div>
            </article>

            <article class="card">
                <div class="card-icon"><?php echo mb_icon('terminal'); ?></div>
                <h3 class="h-3">Optional typed replies</h3>
                <p style="margin-top:8px;">A child block can define trigger keywords and phrases that decide which branch receives a typed answer. Distinct phrases beat overlapping ones.</p>
                <div class="chip-row" style="margin-top:16px;">
                    <span class="chip chip--mono">refund</span>
                    <span class="chip chip--mono">money back</span>
                    <span class="chip chip--mono">cancel order</span>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- ========================================================== NEXT STEP -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="split split--wide-left split--top">
            <div>
                <div class="eyebrow">Next Step</div>
                <h2 class="h-1">Eight ways a block can end.</h2>
                <p class="lede" style="margin-top:16px;">
                    Next Step is where a conversation stops being a script and starts being a
                    process. Every option here is a setting, not code.
                </p>

                <div class="callout" style="margin-top:24px;">
                    <strong>Continue from another block.</strong> Several branches can share one
                    contact-details sequence, one confirmation, or one central menu, instead of you
                    rebuilding it three times and maintaining it four.
                </div>
            </div>

            <div>
                <div class="datarows">
                    <div class="datarow datarow--head"><span>Next step options</span></div>
                    <div class="datarow"><span class="val">Require one of the quick replies</span></div>
                    <div class="datarow"><span class="val">Save the selected quick reply</span></div>
                    <div class="datarow"><span class="val">Wait for a reply and store it in an entity</span></div>
                    <div class="datarow"><span class="val">Validate the collected value</span></div>
                    <div class="datarow"><span class="val">Let typed keywords choose the next block</span></div>
                    <div class="datarow"><span class="val">Store the raw typed reply in a variable</span></div>
                    <div class="datarow"><span class="val">Continue from an existing block</span></div>
                    <div class="datarow"><span class="val">Close the discussion</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================================== DATA -->
<section class="section" id="data">
    <div class="container">
        <div class="split split--wide-right">
            <div>
                <div class="eyebrow">Entities, validation and Users Data</div>
                <h2 class="h-1">A conversational form that people actually finish.</h2>
                <p class="lede" style="margin-top:16px;">
                    Instead of showing every field at once, the bot asks for one value at a time,
                    checks it, stores it, and confirms it back using the visitor's own words.
                </p>

                <ol class="steps" style="margin-top:26px;">
                    <li><h4 class="h-4">Ask</h4><p>One question, with buttons wherever a choice is possible.</p></li>
                    <li><h4 class="h-4">Validate</h4><p>If the answer can't be used, Maxbot explains and lets them correct it.</p></li>
                    <li><h4 class="h-4">Store</h4><p>The value lands in its entity, with a stable variable name.</p></li>
                    <li><h4 class="h-4">Reuse</h4><p>Drop it into a later message so the conversation reads like a person wrote it.</p></li>
                </ol>

                <p class="small" style="margin-top:22px;">
                    Collect only what you need, and apply your own access, retention and deletion
                    practices to what you keep.
                </p>
            </div>

            <div>
                <div class="artboard">
                    <div class="artboard-label"><span class="dot"></span> Validation in the conversation</div>
                    <?php echo mb_thread([
                        ['bot' => 'What is the best email to reach you on?'],
                        ['user' => 'nisrine@'],
                        ['bot' => 'That doesn\'t look like a complete email address, could you check it?'],
                        ['user' => 'nisrine@atlas-realty.com'],
                        ['bot' => 'Perfect, saved. Thanks <span class="tok">@name</span>.'],
                    ], ['name' => 'Atlas Immobilier', 'role' => 'Enquiry assistant', 'input' => false]); ?>

                    <div style="margin-top:18px;">
                        <?php echo mb_datarows([
                            'name'  => 'Nisrine B.',
                            'email' => 'nisrine@atlas-realty.com',
                        ], 'Stored in Users Data'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== TEST -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="split split--wide-left split--top">
            <div>
                <div class="eyebrow">Test and improve</div>
                <h2 class="h-1">Nothing goes live until you've talked to it yourself.</h2>
                <p class="lede" style="margin-top:16px;">
                    Test Flow runs the conversation exactly as a visitor would, so you fix what feels
                    wrong while nobody is watching. Test while you build, not only the night before
                    launch.
                </p>
            </div>

            <div class="grid grid-2" style="gap:16px;">
                <article class="card" style="padding:20px;">
                    <h3 class="h-4">What to test</h3>
                    <ul class="ticks" style="margin-top:12px;">
                        <li><?php echo mb_icon('check'); ?><span>Message order and pacing</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Every button and card action</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Capture, validation and variables</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Shared continuations and endings</span></li>
                    </ul>
                </article>
                <article class="card" style="padding:20px;">
                    <h3 class="h-4">Training review</h3>
                    <p style="margin-top:8px;">
                        When typed routing is used, Maxbot surfaces the replies it couldn't match.
                        Those records show you the missing phrases, and the steps that would be more
                        reliable as guided choices.
                    </p>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ WIDGET -->
<section class="section" id="widget">
    <div class="container">
        <div class="split split--wide-right">
            <div>
                <div class="eyebrow">Publishing</div>
                <h2 class="h-1">Your widget, your brand, your pages.</h2>
                <p class="lede" style="margin-top:16px;">
                    A project publishes an assigned flow through the website chat widget. It controls
                    the agent, the trigger behaviour, the appearance and the locations where it
                    appears.
                </p>

                <ul class="ticks" style="margin-top:24px;">
                    <li><?php echo mb_icon('check'); ?><span>Greeting content and agent presentation</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Text colour, accent colour and layout options</span></li>
                    <li><?php echo mb_icon('check'); ?><span>The pages or locations the project appears on</span></li>
                    <li><?php echo mb_icon('check'); ?><span>One trigger per context, the web launcher, or a WhatsApp entry point</span></li>
                </ul>

                <div class="btn-row" style="margin-top:26px;">
                    <a class="textlink" href="<?php echo mb_e(mb_url('integrations')); ?>">
                        See all channels <?php echo mb_icon('arrow-right'); ?>
                    </a>
                </div>
            </div>

            <div>
                <?php echo mb_window('yourbusiness.com/pricing', mb_thread([
                    ['bot' => 'Looking at pricing? I can help you find the right plan.'],
                    ['replies' => ['Compare plans', 'Book a demo', 'Just browsing']],
                ], ['name' => 'Nadia', 'role' => 'Sales assistant'])); ?>

                <p class="tiny center" style="margin-top:14px;">
                    Shown on the pricing page only, because a checkout visitor and a homepage
                    visitor are not the same person.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================= EVERYTHING -->
<section class="section band band--ink">
    <div class="container">
        <div class="head-center">
            <div class="eyebrow eyebrow--light eyebrow--center">At a glance</div>
            <h2 class="h-1">The whole system on one screen.</h2>
        </div>

        <div class="grid grid-4" style="gap:18px;">
            <article class="card card--ink">
                <div class="card-icon card-icon--ink"><?php echo mb_icon('flow'); ?></div>
                <h3 class="h-4">Build</h3>
                <p class="small" style="margin-top:8px;">Flow Editor · messages · quick replies · cards · branching · shared continuations</p>
            </article>
            <article class="card card--ink">
                <div class="card-icon card-icon--ink"><?php echo mb_icon('database'); ?></div>
                <h3 class="h-4">Capture</h3>
                <p class="small" style="margin-top:8px;">Name · email · phone · custom entities · validation · variables · Users Data</p>
            </article>
            <article class="card card--ink">
                <div class="card-icon card-icon--ink"><?php echo mb_icon('target'); ?></div>
                <h3 class="h-4">Deploy</h3>
                <p class="small" style="margin-top:8px;">Projects · channel selection · page targeting · on/off control</p>
            </article>
            <article class="card card--ink">
                <div class="card-icon card-icon--ink"><?php echo mb_icon('grid'); ?></div>
                <h3 class="h-4">Start faster</h3>
                <p class="small" style="margin-top:8px;">Template library · live preview · one-click import · full documentation</p>
            </article>
        </div>
    </div>
</section>

<!-- ====================================================== REQUIREMENTS -->
<section class="section" id="licensing">
    <div class="container">
        <div class="split split--top">
            <div>
                <div class="eyebrow">Licensing and requirements</div>
                <h2 class="h-1">One purchase, no platform fee.</h2>
                <p class="lede" style="margin-top:16px;">
                    Both licences include the complete builder, unlimited flows, topics, entities,
                    blocks, branches and stored entries. The licence sets how many projects you
                    deploy.
                </p>

                <div class="cmp-wrap" style="margin-top:24px;">
                    <table class="cmp" style="min-width:0;">
                        <thead>
                            <tr><th>Licence</th><th class="col-mb">Maxbot project allowance</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Regular</td><td class="col-mb">One project</td></tr>
                            <tr><td>Extended</td><td class="col-mb"><strong>Unlimited projects</strong></td></tr>
                        </tbody>
                    </table>
                </div>

                <p class="small" style="margin-top:16px;">
                    Under Envato's standard terms, an Extended licence removes the Maxbot project
                    limit inside the licensed installation. It does not mean one purchase can be
                    installed on unlimited websites.
                </p>
            </div>

            <div>
                <article class="card">
                    <h3 class="h-3">What you need</h3>
                    <ul class="ticks" style="margin-top:16px;">
                        <li><?php echo mb_icon('check'); ?><span>WordPress 6.5 or later</span></li>
                        <li><?php echo mb_icon('check'); ?><span>PHP 8.0 or later</span></li>
                        <li><?php echo mb_icon('check'); ?><span>WordPress administrator access</span></li>
                        <li><?php echo mb_icon('check'); ?><span>HTTPS for production, and for any channel using a public callback</span></li>
                        <li><?php echo mb_icon('check'); ?><span>A valid Maxbot Core purchase and authorization</span></li>
                        <li><?php echo mb_icon('check'); ?><span>For WhatsApp: the separate add-on, a Meta developer account, a Business Portfolio and a WhatsApp Business Account</span></li>
                    </ul>

                    <div class="callout callout--warn" style="margin-top:20px;">
                        Test updates on staging with current file and database backups before moving
                        them to production.
                    </div>

                    <div class="btn-row" style="margin-top:22px;">
                        <a class="btn btn--primary" href="<?php echo mb_e(MAXBOT_CORE_BUY_URL); ?>">
                            Get Maxbot Core <?php echo mb_icon('arrow-right'); ?>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
