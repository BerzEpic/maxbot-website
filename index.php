<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot, Visual chatbot builder for WordPress';
$pageDescription = 'Build guided chatbot conversations visually inside WordPress, publish them on your website, and extend the same flow to WhatsApp through the official Cloud API.';
$pageUrl         = mb_url();
$navCurrent      = 'home';

$templates = require __DIR__ . '/data/templates-data.php';
$featured  = array_slice($templates, 0, 6);

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<!-- ============================================================== HERO -->
<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="seq">
                <div class="eyebrow">WordPress plugin · No monthly fee</div>
                <h1 class="h-display">
                    Build the conversation once.<br>
                    Let it <span class="mark">answer forever</span>.
                </h1>
                <p class="lede" style="margin-top:20px;">
                    Maxbot is a visual chatbot builder for WordPress. Design a guided conversation with
                    buttons instead of typing, capture the answers into your own database, and publish it
                    on your website, or on WhatsApp.
                </p>
                <div class="btn-row" style="margin-top:28px;">
                    <a class="btn btn--primary" href="<?php echo mb_e(MAXBOT_CORE_BUY_URL); ?>">
                        Get Maxbot Core <?php echo mb_icon('arrow-right'); ?>
                    </a>
                    <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('templates')); ?>">
                        <?php echo mb_icon('cursor'); ?> Try a live template
                    </a>
                </div>
                <div class="chip-row" style="margin-top:24px;">
                    <span class="pill"><span class="dot"></span> Runs inside WordPress</span>
                    <span class="pill"><span class="dot"></span> No code</span>
                    <span class="pill pill--green"><span class="dot"></span> Official WhatsApp Cloud API</span>
                </div>
            </div>

            <!-- signature: the two halves of the product, side by side -->
            <div class="artboard seq">
                <div class="duo">
                    <div>
                        <div class="duo-cap"><b>You build this</b> · Flow Editor</div>
                        <?php echo mb_flowmap([
                            'kind' => 'Bot response',
                            'text' => 'Hi 👋 What can I help you with today?',
                            'children' => [
                                ['label' => 'Book a visit', 'note' => 'Quick reply', 'highlight' => true],
                                ['label' => 'Pricing', 'note' => 'Quick reply'],
                                ['label' => 'Talk to a person', 'note' => 'Quick reply'],
                            ],
                        ]); ?>
                    </div>

                    <div class="duo-link"><?php echo mb_icon('arrow-down'); ?></div>

                    <div>
                        <div class="duo-cap"><b>Your customer gets this</b> · Website widget</div>
                        <?php echo mb_thread([
                            ['bot' => 'Hi 👋 What can I help you with today?'],
                            ['replies' => ['Book a visit', 'Pricing', 'Talk to a person'], 'picked' => 'Book a visit'],
                            ['bot' => 'Great, what is your name?'],
                            ['user' => 'Nisrine'],
                            ['bot' => 'Thanks <span class="tok">@name</span>. Which service do you need?'],
                        ], ['name' => 'Atlas Clinic', 'role' => 'Booking assistant']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ STATS -->
<section class="band band--line-top band--line-bottom">
    <div class="container" style="padding-top:34px;padding-bottom:34px;">
        <div class="stats">
            <div><b>1</b><span>Purchase, not a subscription</span></div>
            <div><b>0</b><span>Monthly platform fees</span></div>
            <div><b>&infin;</b><span>Flows, fields &amp; collected data</span></div>
            <div><b>2</b><span>Channels: website &amp; WhatsApp</span></div>
        </div>
    </div>
</section>

<!-- ========================================================== PROBLEM -->
<section class="section band band--tint">
    <div class="container">
        <div class="split split--wide-left">
            <div class="reveal">
                <div class="eyebrow">Why a chatbot at all</div>
                <h2 class="h-1">Your contact form is the slowest part of your website.</h2>
                <p class="lede" style="margin-top:18px;">
                    Six fields, a dropdown that fights the thumb, and a promise to reply within
                    48 hours. Most visitors close the tab instead, and you paid for that visit
                    exactly as much as you paid for the one that converted.
                </p>
                <blockquote class="pull">
                    People finish conversations. They abandon forms.<br>
                    Same information, very different completion rate.
                </blockquote>
                <p>
                    Maxbot asks for the same details, name, email, phone, service, budget, one
                    question at a time, with buttons to tap. Every answer is validated as it arrives
                    and stored in your own WordPress database.
                </p>
                <div class="btn-row" style="margin-top:26px;">
                    <a class="textlink" href="<?php echo mb_e(mb_url('use-cases')); ?>">
                        See how businesses use it <?php echo mb_icon('arrow-right'); ?>
                    </a>
                </div>
            </div>

            <div class="reveal">
                <div class="grid" style="gap:16px;">
                    <div class="card">
                        <div class="tiny" style="letter-spacing:.12em;text-transform:uppercase;font-weight:650;margin-bottom:12px;">The form</div>
                        <div class="stack-sm">
                            <div class="mockfield">Full name</div>
                            <div class="mockfield">Email address</div>
                            <div class="mockfield">Phone number</div>
                            <div class="mockfield">Choose a service <span>&#9662;</span></div>
                            <div class="mockfield mockfield--area">Tell us about your project…</div>
                        </div>
                        <p class="tiny" style="margin-top:14px;">Five fields before anyone knows if you can help them.</p>
                    </div>

                    <div class="card" style="border-color:#c9d3e3;">
                        <div class="tiny" style="letter-spacing:.12em;text-transform:uppercase;font-weight:650;margin-bottom:12px;color:var(--navy);">The conversation</div>
                        <?php echo mb_thread([
                            ['bot' => 'What are you looking for?'],
                            ['replies' => ['A quote', 'Opening hours', 'Support'], 'picked' => 'A quote'],
                            ['bot' => 'Which service?'],
                            ['replies' => ['Installation', 'Maintenance']],
                        ], ['head' => false, 'input' => false, 'class' => 'thread--bare']); ?>
                        <p class="tiny" style="margin-top:14px;">Two taps, and you already know what they want.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================== HOW IT WORKS -->
<section class="section">
    <div class="container">
        <div class="head-center reveal">
            <div class="eyebrow eyebrow--center">How Maxbot works</div>
            <h2 class="h-1">Three moves, all inside WordPress.</h2>
            <p class="lede" style="margin-top:16px;">
                No terminal, no external dashboard, no second login for your team to forget.
            </p>
        </div>

        <div class="grid grid-3 reveal">
            <article class="card">
                <div class="card-icon card-icon--signal"><?php echo mb_icon('flow'); ?></div>
                <div class="tiny mono" style="letter-spacing:.1em;">01</div>
                <h3 class="h-3" style="margin-top:6px;">Build the flow</h3>
                <p>
                    Create an agent, open a topic, and lay out the conversation as connected blocks.
                    Each block sends messages, offers quick replies or cards, stores an answer, and
                    decides what happens next.
                </p>
            </article>

            <article class="card">
                <div class="card-icon"><?php echo mb_icon('target'); ?></div>
                <div class="tiny mono" style="letter-spacing:.1em;">02</div>
                <h3 class="h-3" style="margin-top:6px;">Publish with a project</h3>
                <p>
                    A project connects one flow to one place: the website widget or WhatsApp, on the
                    pages you choose. Switch it off for the holidays and nothing you built is lost.
                </p>
            </article>

            <article class="card">
                <div class="card-icon"><?php echo mb_icon('database'); ?></div>
                <div class="tiny mono" style="letter-spacing:.1em;">03</div>
                <h3 class="h-3" style="margin-top:6px;">Collect the answers</h3>
                <p>
                    Names, emails, phone numbers and any custom field you invent are validated in the
                    conversation and written into Users Data, in your own database.
                </p>
            </article>
        </div>
    </div>
</section>

<!-- ====================================================== FLOW EDITOR -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="split split--wide-right">
            <div class="reveal">
                <div class="eyebrow">The Flow Editor</div>
                <h2 class="h-1">Guided by design, not by guesswork.</h2>
                <p class="lede" style="margin-top:16px;">
                    Maxbot is built around quick replies and cards, so the visitor never has to guess
                    what to type, and you always know which paths exist.
                </p>

                <ul class="ticks" style="margin-top:26px;">
                    <li><?php echo mb_icon('check'); ?><span><b>Quick reply buttons.</b> Short, fixed choices that lead straight to their block.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Quick replies as cards.</b> An image, a title and a description when a plain button isn't enough context.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Message sequences.</b> Split a long paragraph into natural bubbles instead of one wall of text.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Shared continuations.</b> Send several branches into the same contact step instead of rebuilding it.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Optional typed replies.</b> Trigger keywords for the steps that genuinely need free text.</span></li>
                </ul>

                <div class="btn-row" style="margin-top:28px;">
                    <a class="textlink" href="<?php echo mb_e(mb_url('features')); ?>">
                        All Core features <?php echo mb_icon('arrow-right'); ?>
                    </a>
                </div>
            </div>

            <div class="reveal">
                <div class="artboard artboard--plain">
                    <div class="artboard-label"><span class="dot"></span> Flow Editor · Topic: New enquiry</div>

                    <?php echo mb_flowmap([
                        'kind' => 'Block 01 · Bot response',
                        'text' => 'What would you like to do?',
                        'children' => [
                            ['label' => 'Get a quote', 'note' => 'Card'],
                            ['label' => 'Support', 'note' => 'Quick reply'],
                            ['label' => 'Opening hours', 'note' => 'Quick reply'],
                        ],
                    ]); ?>

                    <div style="margin-top:22px;display:grid;gap:10px;">
                        <div class="node">
                            <div class="node-kind">Next step</div>
                            <div class="node-text">Wait for a reply and save it into <span class="mono" style="color:var(--navy);">@email</span>, validate as an email address.</div>
                        </div>
                        <div class="node node--muted">
                            <div class="node-kind">End of branch</div>
                            <div class="node-text">Close the discussion, or continue from an existing block.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================== DATA CAPTURE -->
<section class="section">
    <div class="container">
        <div class="split split--wide-left">
            <div class="reveal">
                <div class="eyebrow">Conversational data capture</div>
                <h2 class="h-1">A chat your business can't remember is just noise.</h2>
                <p class="lede" style="margin-top:16px;">
                    Entities are reusable fields with stable variable names. Ask once, validate the
                    answer, store it, then use it again later in the conversation so it reads like a
                    person wrote it.
                </p>

                <div class="card" style="margin-top:26px;background:var(--tint);border-style:dashed;">
                    <p class="small" style="margin-bottom:10px;">Reuse a captured value in any later message:</p>
                    <p class="mono" style="font-size:.86rem;color:var(--ink);line-height:1.7;">
                        Thanks <span style="background:var(--signal-tint);padding:1px 5px;border-radius:4px;">@name</span>.
                        We'll contact you at <span style="background:var(--signal-tint);padding:1px 5px;border-radius:4px;">@email</span>
                        about <span style="background:var(--signal-tint);padding:1px 5px;border-radius:4px;">@preferred_service</span>.
                    </p>
                </div>

                <ul class="ticks" style="margin-top:24px;">
                    <li><?php echo mb_icon('check'); ?><span>Built-in fields for name, email and phone, plus any custom entity you need.</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Validation rules so a broken email never reaches your database.</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Saved quick-reply selections and free-text answers, side by side in Users Data.</span></li>
                </ul>
            </div>

            <div class="reveal">
                <div class="artboard">
                    <div class="artboard-label"><span class="dot"></span> One completed conversation</div>
                    <?php echo mb_datarows([
                        'name'              => 'Nisrine B.',
                        'email'             => 'nisrine@atlas-realty.com',
                        'phone'             => '+1 (305) 555-0148',
                        'preferred_service' => 'Property viewing',
                        'city'              => 'Miami',
                        'budget'            => '$800K - $1M',
                    ]); ?>
                    <p class="tiny" style="margin-top:14px;">
                        Stored in your WordPress database, on your server, under the privacy policy you already published.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================== CAPABILITIES -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="head-center reveal">
            <div class="eyebrow eyebrow--center">What's in the box</div>
            <h2 class="h-1">Everything you need to run a real conversation.</h2>
        </div>

        <div class="rulegrid reveal">
            <article>
                <div class="card-icon"><?php echo mb_icon('users'); ?></div>
                <h3>Agents</h3>
                <p>Give the chatbot a name, an avatar, a role and a short description so it belongs to your business.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('sitemap'); ?></div>
                <h3>Topics &amp; blocks</h3>
                <p>One topic per objective, built from blocks that each handle a single conversational moment.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('layout'); ?></div>
                <h3>Cards &amp; rich content</h3>
                <p>Images, GIFs, YouTube videos and links when a message needs more than words.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('database'); ?></div>
                <h3>Entities &amp; validation</h3>
                <p>Reusable fields with stable variable names, validated before anything is stored.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('grid'); ?></div>
                <h3>Template library</h3>
                <p>Prebuilt conversations for booking, support, commerce and lead capture. Import and adapt.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('play'); ?></div>
                <h3>Test Flow</h3>
                <p>Run the whole conversation yourself, every button, every branch, before anyone sees it.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('sliders'); ?></div>
                <h3>Website widget</h3>
                <p>Your greeting, your colours, your layout, on the pages you choose.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('target'); ?></div>
                <h3>Projects</h3>
                <p>Connect a flow to a channel and a set of pages. Switch it on or off without losing anything.</p>
            </article>
            <article>
                <div class="card-icon"><?php echo mb_icon('activity'); ?></div>
                <h3>Training review</h3>
                <p>When typed replies are used, review unmatched answers and tighten the flow over time.</p>
            </article>
        </div>
    </div>
</section>

<!-- ========================================================= TEMPLATES -->
<section class="section">
    <div class="container">
        <div class="split" style="align-items:flex-end;margin-bottom:38px;gap:40px;">
            <div class="reveal">
                <div class="eyebrow">Templates</div>
                <h2 class="h-1">You never start from a blank screen.</h2>
            </div>
            <div class="reveal" style="text-align:right;">
                <p class="lede" style="margin-bottom:18px;">
                    Twelve prebuilt conversations you can preview live, import, and rewrite in your own words.
                </p>
                <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('templates')); ?>">
                    Browse all templates <?php echo mb_icon('arrow-right'); ?>
                </a>
            </div>
        </div>

        <div class="tpl-grid reveal">
            <?php foreach ($featured as $template) : ?>
                <a class="tpl" href="<?php echo mb_e(mb_url('template?slug=' . urlencode($template['slug']))); ?>">
                    <div class="tpl-top">
                        <span class="tpl-icon"><?php echo mb_icon($template['icon']); ?></span>
                    </div>
                    <div>
                        <h3><?php echo mb_e($template['title']); ?></h3>
                        <p style="margin-top:7px;"><?php echo mb_e($template['description']); ?></p>
                    </div>
                    <span class="tpl-foot">Open live preview <?php echo mb_icon('arrow-right'); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================================================== CHANNELS -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="head-center reveal">
            <div class="eyebrow eyebrow--center">Channels</div>
            <h2 class="h-1">Build once. Publish where your customers already are.</h2>
            <p class="lede" style="margin-top:16px;">
                The website widget ships with Maxbot Core. WhatsApp is a separate add-on that runs the
                same flows on Meta's official Cloud API.
            </p>
        </div>

        <div class="grid grid-4 reveal">
            <article class="channel channel--live">
                <div class="channel-top">
                    <span class="channel-logo channel-logo--core"><?php echo mb_icon('message'); ?></span>
                    <span class="tag tag--core">In Core</span>
                </div>
                <div>
                    <h3>Website widget</h3>
                    <p style="margin-top:6px;">A branded chat trigger on the pages you choose, with your greeting and colours.</p>
                </div>
                <div class="channel-foot">
                    <a class="textlink" href="<?php echo mb_e(mb_url('features')); ?>#widget">How it works <?php echo mb_icon('arrow-right'); ?></a>
                </div>
            </article>

            <article class="channel channel--live">
                <div class="channel-top">
                    <span class="channel-logo channel-logo--whatsapp"><?php echo mb_icon('whatsapp'); ?></span>
                    <span class="tag tag--live">Available</span>
                </div>
                <div>
                    <h3>WhatsApp</h3>
                    <p style="margin-top:6px;">Incoming messages enter your flow and are answered through the official Cloud API.</p>
                </div>
                <div class="channel-foot">
                    <a class="textlink textlink--green" href="<?php echo mb_e(mb_url('whatsapp')); ?>">See the add-on <?php echo mb_icon('arrow-right'); ?></a>
                </div>
            </article>

            <article class="channel channel--soon">
                <div class="channel-top">
                    <span class="channel-logo"><?php echo mb_icon('instagram'); ?></span>
                    <span class="tag tag--soon">Planned</span>
                </div>
                <div>
                    <h3>Instagram</h3>
                    <p style="margin-top:6px;">On the roadmap as a future add-on. Not available yet.</p>
                </div>
            </article>

            <article class="channel channel--soon">
                <div class="channel-top">
                    <span class="channel-logo"><?php echo mb_icon('messenger'); ?></span>
                    <span class="tag tag--soon">Planned</span>
                </div>
                <div>
                    <h3>Messenger</h3>
                    <p style="margin-top:6px;">On the roadmap as a future add-on. Not available yet.</p>
                </div>
            </article>
        </div>

        <div class="center" style="margin-top:28px;">
            <a class="textlink" href="<?php echo mb_e(mb_url('integrations')); ?>">See the channel roadmap <?php echo mb_icon('arrow-right'); ?></a>
        </div>
    </div>
</section>

<!-- ========================================================= WHATSAPP -->
<section class="section band band--ink">
    <div class="container">
        <div class="split split--wide-left">
            <div class="reveal">
                <div class="eyebrow eyebrow--light">Add-on · WhatsApp Integration</div>
                <h2 class="h-1">Every other WhatsApp plugin opens a chat.<br>This one answers it.</h2>
                <p class="lede" style="margin-top:18px;">
                    A click-to-chat button stops working the moment WhatsApp opens. From that moment,
                    somebody has to be awake. The Maxbot add-on connects incoming WhatsApp messages to
                    the flow you already built and replies in one second, every time.
                </p>

                <ul class="ticks ticks--light" style="margin-top:26px;">
                    <li><?php echo mb_icon('check'); ?><span>Official Meta Cloud API with your own credentials, no reseller in the middle.</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Trigger on any message, or only on the words that matter to your business.</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Approved message templates and carousels, plus delivery status and logs.</span></li>
                </ul>

                <div class="btn-row" style="margin-top:30px;">
                    <a class="btn btn--green" href="<?php echo mb_e(mb_url('whatsapp')); ?>">
                        Explore the WhatsApp add-on <?php echo mb_icon('arrow-right'); ?>
                    </a>
                    <a class="btn btn--onink" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">Read the setup docs</a>
                </div>

                <p class="tiny" style="margin-top:20px;">Requires Maxbot Core, installed and authorized.</p>
            </div>

            <div class="reveal">
                <?php echo mb_phone([
                    ['in' => 'Hi, are you open on Sunday?', 'time' => '21:42'],
                    ['out' => 'Hi 👋 Yes, Sunday from 10am to 4pm.<br>How can I help you?', 'time' => '21:42', 'buttons' => ['Book an appointment', 'View pricing']],
                    ['in' => 'Book an appointment', 'time' => '21:43'],
                    ['out' => 'Perfect. What is your name?', 'time' => '21:43'],
                ], ['name' => 'Atlas Clinic', 'status' => 'Answers in 1 second']); ?>
            </div>
        </div>
    </div>
</section>

<!-- ======================================================= PREDICTABLE -->
<section class="section">
    <div class="container container--narrow center">
        <div class="reveal">
            <div class="eyebrow eyebrow--center">Not generative AI</div>
            <h2 class="h-1">Predictable by design, because your business needs control.</h2>
            <p class="lede" style="margin-top:18px;">
                Maxbot is not a generative AI chatbot. It uses structured flows you design yourself, so
                every message, choice, validation rule and branch stays under your control. It does not
                invent answers or hallucinate prices, policies or availability. For support, bookings,
                lead capture and other business workflows where consistency matters, that predictability
                is the advantage.
            </p>
            <div class="chip-row" style="justify-content:center;margin-top:26px;">
                <span class="chip"><?php echo mb_icon('check'); ?> Never invents a price</span>
                <span class="chip"><?php echo mb_icon('check'); ?> Never promises a date you didn't approve</span>
                <span class="chip"><?php echo mb_icon('check'); ?> Never improvises a refund policy at 2am</span>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================= LICENSING -->
<section class="section band band--tint band--line-top" id="licensing">
    <div class="container">
        <div class="split split--top">
            <div class="reveal">
                <div class="eyebrow">Licensing</div>
                <h2 class="h-1">Build without limits. Scale when you're ready.</h2>
                <p class="lede" style="margin-top:16px;">
                    Both licences include the complete builder. What the licence sets is how many
                    projects you deploy, a project being one flow, on one channel, in one place.
                </p>
                <p class="small" style="margin-top:16px;">
                    Envato's standard terms still apply to installations: an Extended licence removes
                    the Maxbot project limit inside the licensed installation, not the number of
                    websites a single purchase covers.
                </p>
            </div>

            <div class="grid grid-2 reveal">
                <article class="card">
                    <span class="tag tag--core">Regular</span>
                    <h3 class="h-3" style="margin-top:14px;">One project</h3>
                    <p style="margin-top:8px;">Where almost everyone starts, and it goes further than people expect.</p>
                    <ul class="ticks" style="margin-top:16px;">
                        <li><?php echo mb_icon('check'); ?><span>Unlimited flows and topics</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Unlimited fields and entries</span></li>
                        <li><?php echo mb_icon('check'); ?><span>All templates included</span></li>
                    </ul>
                </article>

                <article class="card" style="border-color:#f0dfa0;background:var(--signal-tint);">
                    <span class="tag tag--signal">Extended</span>
                    <h3 class="h-3" style="margin-top:14px;">No project limit</h3>
                    <p style="margin-top:8px;">For several experiences running at once, multiple channels, campaigns or departments.</p>
                    <ul class="ticks ticks--signal" style="margin-top:16px;">
                        <li><?php echo mb_icon('check'); ?><span>Everything in Regular</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Unlimited Maxbot projects</span></li>
                        <li><?php echo mb_icon('check'); ?><span>Website and WhatsApp side by side</span></li>
                    </ul>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================= LEARN -->
<section class="section">
    <div class="container">
        <div class="head-center reveal">
            <div class="eyebrow eyebrow--center">Learn</div>
            <h2 class="h-1">Documented properly, and filmed.</h2>
        </div>

        <div class="grid grid-3 reveal">
            <a class="card card--hover" href="<?php echo mb_e(mb_url('docs-core')); ?>">
                <div class="card-icon"><?php echo mb_icon('box'); ?></div>
                <h3 class="h-3">Core documentation</h3>
                <p style="margin-top:8px;">Installation, the Flow Editor, entities, testing, projects and publishing.</p>
                <span class="textlink" style="margin-top:16px;">Open <?php echo mb_icon('arrow-right'); ?></span>
            </a>

            <a class="card card--hover" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">
                <div class="card-icon card-icon--green"><?php echo mb_icon('whatsapp'); ?></div>
                <h3 class="h-3">WhatsApp documentation</h3>
                <p style="margin-top:8px;">Meta app, credentials, webhooks, projects, production tokens and carousels.</p>
                <span class="textlink textlink--green" style="margin-top:16px;">Open <?php echo mb_icon('arrow-right'); ?></span>
            </a>

            <a class="card card--hover" href="<?php echo mb_e(mb_url('tutorials')); ?>">
                <div class="card-icon card-icon--signal"><?php echo mb_icon('play'); ?></div>
                <h3 class="h-3">Video tutorials</h3>
                <p style="margin-top:8px;">Short, practical walkthroughs for Core and for the WhatsApp setup.</p>
                <span class="textlink" style="margin-top:16px;">Watch <?php echo mb_icon('arrow-right'); ?></span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
