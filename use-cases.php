<?php
require_once __DIR__ . '/config.php';

$pageTitle       = 'Maxbot use cases, support, bookings, lead capture and more';
$pageDescription = 'How businesses use Maxbot: customer support menus, appointment requests, lead qualification, product recommendations, order assistance, conversational forms and guided FAQs.';
$pageUrl         = mb_url('use-cases');
$navCurrent      = 'use-cases';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<section class="pagehead">
    <div class="container">
        <div class="split" style="align-items:flex-end;">
            <div>
                <div class="eyebrow">Use cases</div>
                <h1 class="h-display" style="max-width:16ch;">Seven conversations worth automating.</h1>
            </div>
            <div>
                <p class="lede">
                    Every one of these is a flow you can build with what is in the box, quick
                    replies, cards, validated fields and a clear ending. Most businesses launch with
                    one and add the second a fortnight later.
                </p>
                <div class="btn-row" style="margin-top:22px;">
                    <a class="btn btn--ghost btn--sm" href="<?php echo mb_e(mb_url('templates')); ?>">
                        <?php echo mb_icon('grid'); ?> Start from a template
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== LEAD -->
<section class="section">
    <div class="container">
        <div class="split split--wide-left">
            <div>
                <div class="tiny mono" style="letter-spacing:.1em;color:var(--muted);">Use case 01</div>
                <h2 class="h-1" style="margin-top:8px;">Lead qualification</h2>
                <p class="lede" style="margin-top:16px;">
                    The difference between “hi, how much?” and a qualified opportunity with a budget
                    band attached, decided before anyone on your team spends a minute on it.
                </p>
                <ul class="ticks" style="margin-top:22px;">
                    <li><?php echo mb_icon('check'); ?><span>Narrow the need with two or three button choices</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Capture name, email and phone with validation</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Store the budget band and service as saved selections</span></li>
                    <li><?php echo mb_icon('check'); ?><span>End with a clear promise of what happens next</span></li>
                </ul>
                <p class="small" style="margin-top:20px;">
                    <strong>Good for:</strong> agencies, consultants, B2B services, high-ticket sales.
                </p>
            </div>

            <div>
                <div class="artboard">
                    <div class="artboard-label"><span class="dot"></span> Website widget</div>
                    <?php echo mb_thread([
                        ['bot' => 'Before I put you through, roughly what budget are you working with?'],
                        ['replies' => ['Under 20k', '20–50k', '50k+'], 'picked' => '20–50k'],
                        ['bot' => 'Perfect. That is squarely in our range.'],
                        ['bot' => 'What is the best email for the proposal?'],
                        ['user' => 'karim@dourane.co'],
                        ['bot' => 'Saved. A consultant will reply within one working day, <span class="tok">@name</span>.'],
                    ], ['name' => 'Dourane Studio', 'role' => 'Sales assistant', 'input' => false]); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================== SUPPORT -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="split split--wide-right">
            <div>
                <div class="tiny mono" style="letter-spacing:.1em;color:var(--muted);">Use case 02</div>
                <h2 class="h-1" style="margin-top:8px;">Customer support</h2>
                <p class="lede" style="margin-top:16px;">
                    The three questions that eat most of the inbox get answered instantly, in the
                    same words every time. Only the genuinely unusual cases reach a person.
                </p>
                <ul class="ticks" style="margin-top:22px;">
                    <li><?php echo mb_icon('check'); ?><span>A menu of support categories as quick replies</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Collect the order or reference number before escalating</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Link to the right guide, policy or resource</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Route the rest into a human handover branch</span></li>
                </ul>
                <p class="small" style="margin-top:20px;">
                    <strong>Good for:</strong> ecommerce, SaaS, utilities, anyone with a help desk.
                </p>
            </div>

            <div>
                <div class="artboard artboard--plain">
                    <div class="artboard-label"><span class="dot"></span> Support menu · block structure</div>
                    <?php echo mb_flowmap([
                        'kind' => 'Bot response',
                        'text' => 'What do you need help with?',
                        'children' => [
                            ['label' => 'Order status', 'note' => 'Asks for @order_number'],
                            ['label' => 'Returns', 'note' => 'Links the policy'],
                            ['label' => 'Something else', 'note' => 'Human handover', 'highlight' => true],
                        ],
                    ]); ?>
                    <div class="node" style="margin-top:22px;">
                        <div class="node-kind">Shared continuation</div>
                        <div class="node-text">All three branches finish at the same contact-details block.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================== BOOKING -->
<section class="section">
    <div class="container">
        <div class="split split--wide-left">
            <div>
                <div class="tiny mono" style="letter-spacing:.1em;color:var(--muted);">Use case 03</div>
                <h2 class="h-1" style="margin-top:8px;">Bookings and appointments</h2>
                <p class="lede" style="margin-top:16px;">
                    A complete request, service, timing, name, phone, sitting in WordPress before
                    anyone picks up a phone. Compare that to a contact form nobody fills in on mobile.
                </p>
                <ul class="ticks" style="margin-top:22px;">
                    <li><?php echo mb_icon('check'); ?><span>Service chosen from buttons or cards</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Preferred day or time collected as a field</span></li>
                    <li><?php echo mb_icon('check'); ?><span>Contact details validated on the way in</span></li>
                    <li><?php echo mb_icon('check'); ?><span>A confirmation message that repeats what was requested</span></li>
                </ul>
                <p class="small" style="margin-top:20px;">
                    <strong>Good for:</strong> clinics, salons, studios, garages, restaurants, consultants.
                </p>
            </div>

            <div>
                <?php echo mb_phone([
                    ['in' => 'book', 'time' => '19:12'],
                    ['out' => 'Happy to help 👋 Which service?', 'time' => '19:12', 'buttons' => ['Consultation', 'Follow-up', 'Scan']],
                    ['in' => 'Consultation', 'time' => '19:13'],
                    ['out' => 'When suits you best?', 'time' => '19:13', 'buttons' => ['This week', 'Next week']],
                    ['in' => 'This week', 'time' => '19:13'],
                    ['out' => 'Noted. Your name and phone number, and reception will confirm.', 'time' => '19:13'],
                ], ['name' => 'Atlas Clinic', 'status' => 'Booking assistant']); ?>
                <p class="tiny center" style="margin-top:14px;">
                    The same flow runs on the website widget and on WhatsApp.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================= OTHERS -->
<section class="section band band--tint band--line-top">
    <div class="container">
        <div class="head">
            <div class="eyebrow">And four more</div>
            <h2 class="h-1">Same building blocks, different objective.</h2>
        </div>

        <div class="grid grid-2" style="gap:20px;">
            <article class="card">
                <div class="tiny mono" style="letter-spacing:.1em;color:var(--muted);">Use case 04</div>
                <div class="card-icon" style="margin-top:12px;"><?php echo mb_icon('cart'); ?></div>
                <h3 class="h-3">Product and service recommendations</h3>
                <p style="margin-top:8px;">
                    Narrow preferences with a few cards, then point the visitor at the option that
                    fits. Cards carry an image, a title and a description, so nobody chooses blind.
                </p>
                <p class="small" style="margin-top:14px;"><strong>Good for:</strong> ecommerce, travel, insurance, subscriptions.</p>
            </article>

            <article class="card">
                <div class="tiny mono" style="letter-spacing:.1em;color:var(--muted);">Use case 05</div>
                <div class="card-icon" style="margin-top:12px;"><?php echo mb_icon('inbox'); ?></div>
                <h3 class="h-3">Order assistance</h3>
                <p style="margin-top:8px;">
                    Help customers track an order, understand a return, or reach the right team,
                    collecting the reference number the agent will need before the handover happens.
                </p>
                <p class="small" style="margin-top:14px;"><strong>Good for:</strong> online shops, delivery, marketplaces.</p>
            </article>

            <article class="card">
                <div class="tiny mono" style="letter-spacing:.1em;color:var(--muted);">Use case 06</div>
                <div class="card-icon" style="margin-top:12px;"><?php echo mb_icon('user-plus'); ?></div>
                <h3 class="h-3">Conversational forms</h3>
                <p style="margin-top:8px;">
                    Replace a long sequence of visible fields with short, validated questions asked
                    one at a time. Same data, radically different completion rate.
                </p>
                <p class="small" style="margin-top:14px;"><strong>Good for:</strong> quotes, applications, registrations, surveys.</p>
            </article>

            <article class="card">
                <div class="tiny mono" style="letter-spacing:.1em;color:var(--muted);">Use case 07</div>
                <div class="card-icon" style="margin-top:12px;"><?php echo mb_icon('book'); ?></div>
                <h3 class="h-3">Guided FAQs</h3>
                <p style="margin-top:8px;">
                    Present categories and choices that walk someone to the correct answer, guide or
                    resource, instead of asking them to search for words they don't know yet.
                </p>
                <p class="small" style="margin-top:14px;"><strong>Good for:</strong> education, healthcare, public services, software.</p>
            </article>
        </div>
    </div>
</section>

<!-- ========================================================= INDUSTRIES -->
<section class="section">
    <div class="container">
        <div class="head-center">
            <div class="eyebrow eyebrow--center">Who builds these</div>
            <h2 class="h-1">Written for WordPress businesses, not for developers.</h2>
        </div>

        <div class="grid grid-4" style="gap:18px;">
            <article class="card"><div class="card-icon"><?php echo mb_icon('briefcase'); ?></div><h3 class="h-4">Agencies</h3><p class="small" style="margin-top:7px;">Deploy on client sites and charge for the setup and the strategy, not a subscription that isn't yours.</p></article>
            <article class="card"><div class="card-icon"><?php echo mb_icon('cart'); ?></div><h3 class="h-4">Ecommerce</h3><p class="small" style="margin-top:7px;">Pre-sales questions, order help and returns guidance without adding a support seat.</p></article>
            <article class="card"><div class="card-icon"><?php echo mb_icon('heart'); ?></div><h3 class="h-4">Clinics &amp; services</h3><p class="small" style="margin-top:7px;">Appointment requests and the questions reception answers forty times a week.</p></article>
            <article class="card"><div class="card-icon"><?php echo mb_icon('home'); ?></div><h3 class="h-4">Real estate</h3><p class="small" style="margin-top:7px;">Intent, area and a verified email captured from a message that would have got “hello, yes 🙂”.</p></article>
        </div>

        <div class="btn-row" style="justify-content:center;margin-top:40px;">
            <a class="btn btn--primary" href="<?php echo mb_e(mb_url('templates')); ?>">
                Find the closest template <?php echo mb_icon('arrow-right'); ?>
            </a>
            <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('whatsapp')); ?>">Add WhatsApp</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
