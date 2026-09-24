<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot WhatsApp Integration, WhatsApp chatbot automation for WordPress';
$pageDescription = 'Connect Maxbot flows to the official WhatsApp Business Platform and Cloud API. Incoming WhatsApp messages enter your flow and are answered automatically, from inside WordPress.';
$pageUrl         = mb_url('whatsapp');
$navCurrent      = 'whatsapp';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<!-- ============================================================== HERO -->
<section class="pagehead pagehead--green">
    <div class="container">
        <div class="split split--wide-left" style="gap:56px;">
            <div>
                <div class="eyebrow eyebrow--green">Add-on · Requires Maxbot builder</div>
                <h1 class="h-display">
                    Every other WhatsApp plugin opens a chat.<br>
                    <span class="mark">This one answers it.</span>
                </h1>
                <p class="lede" style="margin-top:20px;max-width:52ch;">
                    Maxbot WhatsApp Integration connects your WordPress site to Meta's official
                    WhatsApp Cloud API. When a customer sends a message, the flow you designed
                    answers them, instantly, every time, in the exact words you approved.
                </p>

                <div class="btn-row" style="margin-top:28px;">
                    <a class="btn btn--green" href="<?php echo mb_e(MAXBOT_WHATSAPP_BUY_URL); ?>">
                        Get the WhatsApp add-on <?php echo mb_icon('arrow-right'); ?>
                    </a>
                    <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">
                        <?php echo mb_icon('book'); ?> Read the setup guide
                    </a>
                </div>

                <div class="chip-row" style="margin-top:24px;">
                    <span class="pill pill--green"><span class="dot"></span> Official Cloud API</span>
                    <span class="pill pill--green"><span class="dot"></span> No message markup</span>
                    <span class="pill pill--green"><span class="dot"></span> Your server, your data</span>
                </div>
            </div>

            <div>
                <?php echo mb_phone([
                    ['in' => 'Hi, I would like a quote for a property', 'time' => '22:07'],
                    ['out' => 'Hi 👋 Happy to help.<br>What type of property are you interested in?', 'time' => '22:07', 'buttons' => ['House', 'Condo', 'Land']],
                    ['in' => 'House', 'time' => '22:08'],
                    ['out' => 'Great. Which city?', 'time' => '22:08', 'buttons' => ['Austin', 'Chicago', 'Miami']],
                    ['in' => 'Miami', 'time' => '22:08'],
                    ['out' => 'Got it. Send me your name and email, and I will send you the selection.', 'time' => '22:08'],
                ], ['name' => 'Atlas Realty', 'status' => 'Replies in 1 second · 22:08']); ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ THE GAP -->
<section class="section band band--tint">
    <div class="container">
        <div class="head" style="max-width:700px;">
            <div class="eyebrow eyebrow--green">The difference</div>
            <h2 class="h-1">One is a door. The other is a receptionist.</h2>
            <p class="lede" style="margin-top:16px;">
                A click-to-chat button solves the easy half of the problem. It opens WhatsApp,
                and then a person has to be awake, available, and willing to type the same five
                answers they typed yesterday.
            </p>
        </div>

        <div class="grid grid-2" style="gap:22px;">
            <article class="card">
                <div class="tiny" style="letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--muted);margin-bottom:16px;">
                    Every other WhatsApp plugin
                </div>
                <?php echo mb_path([
                    ['t' => 'Visitor clicks'],
                    ['t' => 'WhatsApp opens'],
                    ['t' => 'Someone has to reply'],
                ]); ?>
                <p class="small" style="margin-top:16px;">
                    The conversation starts exactly where your automation stops.
                </p>
            </article>

            <article class="card" style="border-color:var(--green-line);">
                <div class="tiny" style="letter-spacing:.12em;text-transform:uppercase;font-weight:700;color:var(--green);margin-bottom:16px;">
                    Maxbot WhatsApp
                </div>
                <?php echo mb_path([
                    ['t' => 'Customer messages', 'style' => 'green'],
                    ['t' => 'Your flow recognises it', 'style' => 'green'],
                    ['t' => 'Answered and qualified', 'style' => 'green'],
                    ['t' => 'Data lands in WordPress', 'style' => 'green'],
                ]); ?>
                <p class="small" style="margin-top:16px;">
                    A receptionist who never sleeps and never forgets the script.
                </p>
            </article>
        </div>

        <blockquote class="pull pull--green" style="max-width:760px;">
            This is not a button that opens WhatsApp. It connects incoming WhatsApp
            messages to the automated conversation flows built in Maxbot.
        </blockquote>
    </div>
</section>

<!-- ========================================================= THE PATH -->
<section class="section">
    <div class="container">
        <div class="head-center">
            <div class="eyebrow eyebrow--green eyebrow--center">The message path</div>
            <h2 class="h-1">What happens between "hello" and the answer.</h2>
            <p class="lede" style="margin-top:16px;">
                Every incoming message follows the same route. When something goes wrong, the
                add-on's logs tell you exactly which step it stopped at.
            </p>
        </div>

        <?php echo mb_path([
            ['n' => 'Step 1', 't' => 'WhatsApp user', 'd' => 'Sends a message from the app they already use.'],
            ['n' => 'Step 2', 't' => 'Meta webhook', 'd' => 'The Business Platform delivers the event to your site.', 'style' => 'green'],
            ['n' => 'Step 3', 't' => 'Maxbot add-on', 'd' => 'Verifies the payload and resolves the linked project.', 'style' => 'green'],
            ['n' => 'Step 4', 't' => 'Assigned flow', 'd' => 'Core decides the block, the reply and the data to store.', 'style' => 'signal'],
            ['n' => 'Step 5', 't' => 'Cloud API', 'd' => 'The response is delivered back into the thread.', 'style' => 'green'],
        ]); ?>

        <div class="callout callout--green" style="margin-top:28px;">
            <strong>Core builds the conversation. The add-on connects it to WhatsApp.</strong>
            The add-on is not a second chatbot builder, it uses the agents, topics, entities and
            flows that already exist in Maxbot builder.
        </div>
    </div>
</section>

<!-- ========================================================== TRIGGERS -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="split split--wide-left">
            <div>
                <div class="eyebrow eyebrow--green">Triggers</div>
                <h2 class="h-1">You decide when the flow runs.</h2>
                <p class="lede" style="margin-top:16px;">
                    A WhatsApp project can start on any incoming message, or only when someone
                    writes a word that matters to your business.
                </p>

                <div class="chip-row" style="margin-top:22px;">
                    <span class="chip chip--mono">pricing</span>
                    <span class="chip chip--mono">devis</span>
                    <span class="chip chip--mono">booking</span>
                    <span class="chip chip--mono">rendez-vous</span>
                    <span class="chip chip--mono">support</span>
                    <span class="chip chip--mono">سعر</span>
                </div>

                <ul class="ticks" style="margin-top:24px;">
                    <li><?php echo mb_icon('check'); ?><span><b>Exact, Contains, or Starts with.</b> As loose or as precise as the wording needs.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Never talk over yourself.</b> A trigger can be stopped from restarting a flow mid-conversation.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Website launcher.</b> A floating WhatsApp button with a prefilled message, on the pages you choose.</span></li>
                    <li><?php echo mb_icon('check'); ?><span><b>Any language you can type.</b> Every message is text you wrote, so there is nothing to translate.</span></li>
                </ul>
            </div>

            <div>
                <div class="artboard artboard--green">
                    <div class="artboard-label"><span class="dot" style="background:var(--green);"></span> WhatsApp project · Trigger</div>

                    <div class="card" style="padding:18px;">
                        <div class="tiny" style="font-weight:650;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);">Start the flow when</div>
                        <div class="stack-sm" style="margin-top:12px;">
                            <div class="mockfield" style="color:var(--muted);background:var(--paper);">Any incoming message</div>
                            <div class="mockfield" style="color:var(--ink);background:var(--green-tint);border-color:var(--green-line);">
                                Specific messages <span style="color:var(--green);">✓</span>
                            </div>
                        </div>

                        <div class="tiny" style="font-weight:650;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);margin-top:18px;">Match type</div>
                        <div class="chip-row" style="margin-top:10px;">
                            <span class="chip">Exact</span>
                            <span class="chip chip--green">Contains</span>
                            <span class="chip">Starts with</span>
                        </div>

                        <div class="tiny" style="font-weight:650;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);margin-top:18px;">Assigned flow</div>
                        <div class="mockfield" style="margin-top:10px;color:var(--ink);background:var(--paper);">
                            Booking, Miami villas <span>&#9662;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================= WHAT YOU GET -->
<section class="section">
    <div class="container">
        <div class="head-center">
            <div class="eyebrow eyebrow--green eyebrow--center">In the add-on</div>
            <h2 class="h-1">Everything the channel needs, and nothing Core already does.</h2>
        </div>

        <div class="rulegrid">
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('lock'); ?></div>
                <h3>Guided credential setup</h3>
                <p>App ID, App Secret, WABA ID, Phone Number ID, access token and verify token, entered on guided screens, with secrets masked once saved.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('link'); ?></div>
                <h3>Webhook verification</h3>
                <p>A public HTTPS callback URL and a verify token you generate, plus checks that the WABA is actually subscribed to message events.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('target'); ?></div>
                <h3>WhatsApp projects</h3>
                <p>A channel-specific project type that assigns the agent and the flow that should handle incoming messages.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('shield'); ?></div>
                <h3>Production credentials</h3>
                <p>Move from Meta's development number and temporary token to your verified business number and a permanent system-user token.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('layout'); ?></div>
                <h3>Message templates</h3>
                <p>Create, sync and track the approval status of the templates Meta reviews before business-initiated messaging.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('grid'); ?></div>
                <h3>Carousel templates</h3>
                <p>Quick Reply and Link carousels of two to ten cards, with images, titles, descriptions and per-card actions.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('activity'); ?></div>
                <h3>Connection testing</h3>
                <p>One-click connection tests, webhook status and timestamps, template sync health, and linked-project checks.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('inbox'); ?></div>
                <h3>Delivery logs</h3>
                <p>Sent, delivered, read or failed, with sanitized error detail and timestamps you can actually reconstruct a path from.</p>
            </article>
            <article>
                <div class="card-icon card-icon--green"><?php echo mb_icon('refresh'); ?></div>
                <h3>Session reset tools</h3>
                <p>Clear an active conversation so every test starts from the first block instead of halfway down a branch.</p>
            </article>
        </div>
    </div>
</section>

<!-- ========================================================== CAROUSELS -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="split split--wide-right">
            <div>
                <div class="eyebrow eyebrow--green">Carousels</div>
                <h2 class="h-1">Let people choose from cards, inside WhatsApp.</h2>
                <p class="lede" style="margin-top:16px;">
                    A carousel template carries between two and ten cards. Meta reviews the
                    structure once; your flow then fills it with real content.
                </p>

                <div class="grid grid-2" style="margin-top:26px;gap:16px;">
                    <article class="card" style="padding:20px;">
                        <h3 class="h-4">Quick Reply carousel</h3>
                        <p style="margin-top:7px;">Each card returns a reply action, so the customer picks a product, category or path without typing.</p>
                    </article>
                    <article class="card" style="padding:20px;">
                        <h3 class="h-4">Link carousel</h3>
                        <p style="margin-top:7px;">Each card opens a destination built from the template's base URL and that card's own suffix.</p>
                    </article>
                </div>

                <div class="callout callout--warn" style="margin-top:24px;">
                    <strong>Only approved templates go to production.</strong> The live flow must keep
                    the approved card count and action format, so build the template around the message
                    you will actually send.
                </div>
            </div>

            <div>
                <div class="artboard artboard--green">
                    <div class="artboard-label"><span class="dot" style="background:var(--green);"></span> Carousel template · 3 of 4 cards</div>
                    <div class="carousel">
                        <div class="ccard">
                            <div class="ccard-media"><?php echo mb_icon('image'); ?></div>
                            <h4>Studio · Downtown Austin</h4>
                            <p>From $1,850 / month</p>
                            <span class="ccard-btn">See details</span>
                        </div>
                        <div class="ccard">
                            <div class="ccard-media"><?php echo mb_icon('image'); ?></div>
                            <h4>House · Miami Beach</h4>
                            <p>From $1.2M</p>
                            <span class="ccard-btn">See details</span>
                        </div>
                        <div class="ccard ccard--cut">
                            <div class="ccard-media"><?php echo mb_icon('image'); ?></div>
                            <h4>Condo · Chicago</h4>
                            <p>From $650K</p>
                            <span class="ccard-btn">See details</span>
                        </div>
                    </div>
                    <p class="tiny" style="margin-top:14px;">
                        Approved structure, production content. Two to ten cards per template.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================= SETUP -->
<section class="section">
    <div class="container">
        <div class="split split--wide-left split--top">
            <div>
                <div class="eyebrow eyebrow--green">Setup</div>
                <h2 class="h-1">From zero to live, in five steps.</h2>
                <p class="lede" style="margin-top:16px;">
                    No terminal, no code, no developer. Connecting WordPress to Meta is where most
                    people get stuck, so the plugin is built around that problem, and the whole
                    thing is on video.
                </p>

                <div class="btn-row" style="margin-top:26px;">
                    <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('tutorials')); ?>#whatsapp">
                        <?php echo mb_icon('play'); ?> Watch the WhatsApp tutorials
                    </a>
                </div>
            </div>

            <div>
                <ol class="steps steps--green">
                    <li>
                        <h4 class="h-4">Install</h4>
                        <p>Add Maxbot builder and the WhatsApp add-on to WordPress, in that order.</p>
                    </li>
                    <li>
                        <h4 class="h-4">Connect Meta</h4>
                        <p>Create the app, enter the credentials on the guided screen, and run the connection test.</p>
                    </li>
                    <li>
                        <h4 class="h-4">Verify the webhook</h4>
                        <p>Paste the callback URL and your verify token into Meta, then subscribe the WABA to message events.</p>
                    </li>
                    <li>
                        <h4 class="h-4">Create a WhatsApp project</h4>
                        <p>Choose the flow, choose the trigger, choose which pages show the WhatsApp button.</p>
                    </li>
                    <li>
                        <h4 class="h-4">Test, then go live</h4>
                        <p>Validate with Meta's development number, then switch to your real business number and a permanent token.</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- ======================================================== COMPARISON -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="head" style="max-width:660px;">
            <div class="eyebrow eyebrow--green">The comparison</div>
            <h2 class="h-1">Why buyers choose this over a WhatsApp SaaS platform.</h2>
            <p class="lede" style="margin-top:16px;">
                Hosted platforms do roughly the same job. The difference is what they charge for it,
                and where your customers' data ends up living.
            </p>
        </div>

        <div class="cmp-wrap">
            <table class="cmp">
                <thead>
                    <tr>
                        <th></th>
                        <th>Click-to-chat plugin</th>
                        <th>WhatsApp SaaS platform</th>
                        <th class="col-mb">Maxbot WhatsApp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Opens WhatsApp from your site</td><td class="yes">Yes</td><td>,</td><td class="col-mb yes">Yes</td></tr>
                    <tr><td>Replies automatically</td><td class="no">No</td><td class="yes">Yes</td><td class="col-mb yes">Yes</td></tr>
                    <tr><td>Visual flow builder</td><td class="no">No</td><td class="yes">Yes</td><td class="col-mb yes">Yes</td></tr>
                    <tr><td>Captures name, email, phone</td><td class="no">No</td><td class="yes">Yes</td><td class="col-mb yes">Yes</td></tr>
                    <tr><td>Maxbot billing</td><td>—</td><td>Check provider terms</td><td class="col-mb">Depends on edition; add-on terms separate</td></tr>
                    <tr><td>Markup on Meta's rates</td><td>,</td><td>Usually</td><td class="col-mb"><strong>None</strong></td></tr>
                    <tr><td>Contact and conversation limits</td><td>,</td><td>Tiered</td><td class="col-mb"><strong>None</strong></td></tr>
                    <tr><td>Builder capabilities</td><td>—</td><td>Check provider terms</td><td class="col-mb">Check your installed edition</td></tr>
                    <tr><td>Where customer data lives</td><td>,</td><td>Their servers</td><td class="col-mb"><strong>Your server</strong></td></tr>
                    <tr><td>Managed from WordPress</td><td class="yes">Yes</td><td class="no">No</td><td class="col-mb yes">Yes</td></tr>
                </tbody>
            </table>
        </div>

        <p class="small" style="margin-top:16px;max-width:70ch;">
            Meta bills message conversations directly, at Meta's own published rates. Maxbot does not
            add a markup and does not sit between you and that invoice.
        </p>
    </div>
</section>

<!-- =========================================================== HONESTY -->
<section class="section band band--ink">
    <div class="container">
        <div class="split split--top">
            <div>
                <div class="eyebrow eyebrow--light">Before you buy</div>
                <h2 class="h-1">The honest part.</h2>
                <p class="lede" style="margin-top:16px;max-width:44ch;">
                    We would rather you buy this knowing exactly what it is, and what Meta will
                    ask of you before your first live message.
                </p>
            </div>

            <ul class="ticks ticks--light" style="gap:18px;">
                <li><?php echo mb_icon('info'); ?><span><b>This is an add-on.</b> It requires Maxbot builder, installed and active. It extends Maxbot to WhatsApp; it does not replace it.</span></li>
                <li><?php echo mb_icon('info'); ?><span><b>WhatsApp is Meta's platform, and Meta's rules apply.</b> You need a Meta developer app, a Business Portfolio and a WhatsApp Business Account with your own number. Business verification, display-name review and template approval may apply.</span></li>
                <li><?php echo mb_icon('info'); ?><span><b>HTTPS and a publicly reachable site are required</b>, because Meta has to deliver webhook events to your WordPress installation.</span></li>
                <li><?php echo mb_icon('info'); ?><span><b>This is not a bulk-messaging or broadcast tool.</b> It is built for conversations customers start, which is exactly what the Cloud API is designed for.</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- =============================================================== FAQ -->
<section class="section">
    <div class="container container--narrow">
        <div class="head-center">
            <div class="eyebrow eyebrow--green eyebrow--center">Frequently asked</div>
            <h2 class="h-1">Answers before you ask.</h2>
        </div>

        <div class="faq">
            <details>
                <summary>Do I need the Maxbot builder plugin?</summary>
                <div class="faq-body"><p>Yes. The add-on requires a compatible active Maxbot plugin to build and run its conversation flows. Check the add-on’s compatibility requirements for your installed release. Deactivating the required builder stops the add-on working.</p></div>
            </details>
            <details>
                <summary>Are there monthly fees?</summary>
                <div class="faq-body"><p>Maxbot Free has no monthly subscription, Standard is a one-time purchase and Pro is planned as a monthly subscription. Check the separate add-on terms and Meta’s current charges before use.</p></div>
            </details>
            <details>
                <summary>Can my customers reply from their normal WhatsApp?</summary>
                <div class="faq-body"><p>Yes. They message your business number from the app they already use. There is nothing for them to install or sign up for.</p></div>
            </details>
            <details>
                <summary>Can I still reply manually?</summary>
                <div class="faq-body"><p>Not directly through Maxbot yet. The WhatsApp Integration add-on currently focuses on automated conversations and chatbot flows. Manual agent takeover and conversation management will be available through a dedicated live chat/inbox solution.</p></div>
            </details>
            <details>
                <summary>Can I use my existing WhatsApp number?</summary>
                <div class="faq-body"><p>The number has to be registered to the WhatsApp Cloud API. A clean, unused number is the smoothest path; the documentation covers this properly, because getting it wrong is the most common setup mistake.</p></div>
            </details>
            <details>
                <summary>What if I get stuck during the Meta setup?</summary>
                <div class="faq-body"><p>The add-on includes connection testing, webhook and subscription diagnostics, and message logs that point at the actual failure, plus a full video walkthrough from an empty Meta account to a live conversation.</p></div>
            </details>
            <details>
                <summary>Could this get my number restricted?</summary>
                <div class="faq-body"><p>It runs on Meta's official Cloud API, the same infrastructure the large platforms use, and it responds to people who messaged you first. Unsolicited bulk messaging is what gets numbers restricted, and this add-on is not built to do that.</p></div>
            </details>
            <details>
                <summary>Will it work with my theme or page builder?</summary>
                <div class="faq-body"><p>Yes. It does not touch your design or your templates. It adds a floating trigger on the pages you select and leaves everything else alone.</p></div>
            </details>
        </div>
    </div>
</section>

<!-- =============================================================== CTA -->
<section class="section band band--green band--line-top">
    <div class="container center">
        <h2 class="h-1" style="max-width:24ch;margin:0 auto;">Make sure someone is always there.</h2>
        <p class="lede" style="margin:18px auto 0;max-width:56ch;">
            Your customers have already chosen the channel. The only question left is whether
            anyone answers when they message you at 22:00 on a Friday.
        </p>
        <div class="btn-row" style="justify-content:center;margin-top:30px;">
            <a class="btn btn--green" href="<?php echo mb_e(MAXBOT_WHATSAPP_BUY_URL); ?>">
                Get the WhatsApp add-on <?php echo mb_icon('arrow-right'); ?>
            </a>
            <?php echo mb_edition_cta('standard', 'btn btn--ghost'); ?>
        </div>
        <p class="tiny" style="margin-top:18px;">A compatible Maxbot plugin is required. Check the chosen edition and add-on terms separately.</p>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
