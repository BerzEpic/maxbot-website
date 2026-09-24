<?php
require_once __DIR__ . '/config.php';

$pageTitle = 'Privacy policy | Maxbot';
$pageDescription = 'How Maxbot handles optional email subscriptions, website visits and the Free service, and how to manage your information.';
$pageUrl = mb_url('privacy-policy');
$navCurrent = '';
$sections = [
    'about' => 'Who we are',
    'signup' => 'Information you share',
    'emails' => 'Email choices',
    'website' => 'Using this website',
    'chatbots' => 'Chatbots and the Free service',
    'purposes' => 'Why we use information',
    'providers' => 'Service providers',
    'retention' => 'Keeping your information',
    'rights' => 'Your rights and requests',
    'changes' => 'Policy updates',
];

include __DIR__ . '/partials/header.php';
include __DIR__ . '/partials/navbar.php';
?>

<div class="docs-shell">
    <aside class="docs-aside" aria-label="Privacy policy contents">
        <button class="docs-mobile-toggle" type="button" data-docs-toggle aria-expanded="false" aria-controls="privacy-nav">
            <?php echo mb_icon('menu'); ?> On this page
        </button>
        <nav id="privacy-nav" class="docs-nav" data-docs-nav aria-label="Policy sections">
            <p class="eyebrow" style="margin-bottom:16px;">Your privacy</p>
            <?php foreach ($sections as $id => $title): ?>
                <a class="docs-link" href="#<?php echo mb_e($id); ?>" data-docs-link><?php echo mb_e($title); ?></a>
            <?php endforeach; ?>
        </nav>
    </aside>

    <div class="docs-main">
        <header class="docs-hero">
            <div class="eyebrow">Maxbot</div>
            <h1>Privacy policy</h1>
            <p>Understand what you share with Maxbot, why we use it, and the choices you have.</p>
            <p class="small" style="margin-top:18px;">Last updated: <time datetime="2026-09-24">24 September 2026</time></p>
        </header>

        <section id="about" class="doc-sec" data-docs-section aria-labelledby="about-title">
            <h2 id="about-title">Who we are</h2>
            <p style="margin-top:16px;"><?php echo mb_e(MAXBOT_PRIVACY_OPERATOR); ?> operates the Maxbot website and central Free service at climaxweb.net. This notice covers this website, optional Maxbot tutorial subscriptions, product updates and edition launch requests, and the Free service described below.</p>
            <p>For questions about your information, contact <a class="textlink" href="mailto:<?php echo mb_e(MAXBOT_PRIVACY_EMAIL); ?>"><?php echo mb_e(MAXBOT_PRIVACY_EMAIL); ?></a>.</p>
            <div class="docs-callout"><strong>Subscribing is optional.</strong> You can use Maxbot Free, finish setup and access the tutorials without joining the email list. Reading this policy does not subscribe you.</div>
        </section>

        <section id="signup" class="doc-sec" data-docs-section aria-labelledby="signup-title">
            <h2 id="signup-title">Information you share</h2>
            <p style="margin-top:16px;">When you choose to subscribe through the Starter Guide, Maxbot receives:</p>
            <ul>
                <li><strong>Your email address</strong>, which you can edit before submitting.</li>
                <li><strong>Your name and selected product interests</strong>, if you provide them.</li>
                <li><strong>Your intended use and selected setup answers</strong>: who you are building for and your main goal. The form shows the selected answers before you agree to share them.</li>
                <li><strong>Your consent</strong>, recorded with the consent wording version, this policy's URL and the date of submission.</li>
            </ul>
            <p>The website launch form asks only for your email and explicit consent for the selected edition’s launch. When signup is available, the existing Maxbot Free service records the request and its consent context. We do not ask for a name or setup answers on this website form, and launch consent does not subscribe you to unrelated marketing.</p>
            <p>Contact records include status and consent history. Existing opt-outs are preserved. A form success message means the service accepted the relevant request; an unavailable or failed submission is not reported as a signup.</p>
            <p>The signup request does not include your website URL, license key, installation credentials, chatbot flows or visitors' conversation histories. Your chosen setup answers help us make recommendations relevant to what you want to build.</p>
            <p>When you open the signup step, your WordPress server checks whether signup is available and retrieves this policy link. This check does not send the contact form or create a subscription. Like other web requests, it can appear in server access logs.</p>
        </section>

        <section id="emails" class="doc-sec" data-docs-section aria-labelledby="emails-title">
            <h2 id="emails-title">Email choices</h2>
            <p style="margin-top:16px;">The consent checkbox starts unchecked. Entering a notification email elsewhere in setup does not subscribe you. Choose <strong>Skip this step</strong> if you do not want tutorials or product updates by email.</p>
            <p>Accepted signup requests are recorded immediately. There is no confirmation-email step, signup receipt or immediate welcome email. A website launch request covers a future announcement for the selected edition; it does not send that announcement at signup.</p>
            <p>You can withdraw consent or ask to remove a launch request by contacting us. Existing unsubscribe links remain usable where provided. Withdrawing launch consent does not change your chatbot settings.</p>
            <p>Your chatbot and its visitor-notification settings continue to work when you skip signup or unsubscribe. Deactivating or uninstalling the plugin does not unsubscribe you from the central email list.</p>
        </section>

        <section id="website" class="doc-sec" data-docs-section aria-labelledby="website-title">
            <h2 id="website-title">Using this website</h2>
            <p style="margin-top:16px;">Our web hosting and security services may process your IP address, request time, requested page, browser information and referring page to deliver the website, diagnose faults and prevent abuse. Requests from the plugin reach us from your WordPress server; visiting this website reaches us from your browser.</p>
            <p>The website loads fonts from Google Fonts, and template previews load a JavaScript library from the jQuery CDN. Your browser connects to those providers to retrieve these resources, which exposes connection information such as your IP address. External media in a preview can also connect to its provider.</p>
            <p>Tutorial links open YouTube. Maxbot Standard and Pro notification buttons open an email form on this website; separate external product links may open a marketplace. Those services apply their own privacy and cookie policies when you visit them. This website's marketing pages do not include an advertising pixel or analytics tracker in their page code.</p>
            <p>The launch form does not save your email in browser storage. A temporary server-side rate counter uses a hash of the connecting IP address to limit signup abuse. Chatbot previews may use browser storage for conversation state. Your browser settings let you clear stored data and manage cookies; doing so can reset a preview or conversation. Hosting and third-party services may apply their own security or session cookies.</p>
        </section>

        <section id="chatbots" class="doc-sec" data-docs-section aria-labelledby="chatbots-title">
            <h2 id="chatbots-title">Chatbots and the Free service</h2>
            <p style="margin-top:16px;">Chatbot conversations and settings on a customer's WordPress site are managed by that site's operator. Contact that operator about information you share with their chatbot. Its configured email, messaging or other integrations may receive information according to that site's settings and privacy notice.</p>
            <p>Separately from the optional signup, saving a flow in Maxbot Free or Standard uses the central Free compilation service. It receives the authored flow inputs and responses, node relationships, variable and entity definitions, and topic identifier to produce the runnable flow. Information you type into those definitions is part of that request.</p>
            <p>The Free service uses a random installation identifier and authentication credential rather than a project purchase license. The server stores the installation identifier, a hash of the credential, and registration or revocation information. Enrollment also sends the client version. This connection does not subscribe you to emails, and the subscription request does not include these credentials.</p>
            <p>Setup progress and the decision to skip the invitation are saved in your WordPress installation. They are not an activity feed sent to the subscription service.</p>
        </section>

        <section id="purposes" class="doc-sec" data-docs-section aria-labelledby="purposes-title">
            <h2 id="purposes-title">Why we use information</h2>
            <ul>
                <li><strong>Launch announcements for the selected edition, or separately requested tutorials, recommendations and product updates:</strong> based on your consent, using the contact details and preferences you choose to share.</li>
                <li><strong>Providing the Free service and responding to requests:</strong> to deliver the functionality or assistance you ask for.</li>
                <li><strong>Security and subscription administration:</strong> to prevent abuse, resolve delivery problems, record consent and respect unsubscribe requests.</li>
            </ul>
            <p>Where data-protection law requires a lawful basis, we rely on consent for optional subscription emails, performance of the service you request where applicable, and our legitimate interests in operating and protecting the service and honoring your preferences for necessary administration.</p>
            <p>Selected interests can guide which Maxbot information is relevant to you. The subscription service does not make automated decisions that have legal or similarly significant effects on you.</p>
        </section>

        <section id="providers" class="doc-sec" data-docs-section aria-labelledby="providers-title">
            <h2 id="providers-title">Service providers</h2>
            <p style="margin-top:16px;">Hosting, database and email-delivery providers process the information needed to run the service. For example, the email provider receives your recipient address and the message it delivers. Authorized people administering Maxbot may access records to provide support, manage subscriptions and investigate problems.</p>
            <p>Provider processing locations depend on our hosting and email arrangements and can differ from your country. Contact us for the current providers, processing locations and any applicable international-transfer safeguards.</p>
            <p>HTTPS protects requests in transit. Keep any private subscription-management links private. No internet service or storage system can be guaranteed completely secure.</p>
        </section>

        <section id="retention" class="doc-sec" data-docs-section aria-labelledby="retention-title">
            <h2 id="retention-title">Keeping your information</h2>
            <p style="margin-top:16px;">Subscription records are retained while needed to manage the subscription, record consent, honor opt-outs and resolve delivery or support issues. The relevant criteria are whether the subscription is active, whether records are needed to avoid unwanted contact, and whether there is an outstanding request or legal obligation.</p>
            <p><strong>Withdrawing consent does not automatically erase all contact history.</strong> Contact us to request deletion. A limited opt-out record may be retained to avoid unwanted contact.</p>
            <p>Server logs, email-delivery records and backups have separate operational retention arrangements. Removing the WordPress plugin does not erase records held by the central Maxbot service. Contact us for information about these records or to make a deletion request.</p>
        </section>

        <section id="rights" class="doc-sec" data-docs-section aria-labelledby="rights-title">
            <h2 id="rights-title">Your rights and requests</h2>
            <p style="margin-top:16px;">Depending on the law that applies to you, you may request access to, correction or deletion of your information, a portable copy, or restrictions on its use. You may also object to processing based on legitimate interests.</p>
            <div class="docs-callout"><strong>You can stop subscription emails at any time.</strong> Use the unsubscribe link in the email or write to <a class="textlink" href="mailto:<?php echo mb_e(MAXBOT_PRIVACY_EMAIL); ?>"><?php echo mb_e(MAXBOT_PRIVACY_EMAIL); ?></a>. Withdrawing consent does not affect processing that already took place lawfully.</div>
            <p>To make a request, tell us the email address concerned and what you would like us to do. We may ask for enough information to verify that the request relates to you. Do not send passwords, license keys or subscription tokens.</p>
            <p>You may complain to the data-protection authority in your country or region where applicable. For the UK, you can contact the <a class="textlink" href="https://ico.org.uk/make-a-complaint/" rel="noopener noreferrer">Information Commissioner's Office</a>.</p>
        </section>

        <section id="changes" class="doc-sec" data-docs-section aria-labelledby="changes-title">
            <h2 id="changes-title">Policy updates</h2>
            <p style="margin-top:16px;">We update this page when our practices change and show the revised date above. Where a change requires further notice or renewed consent, we will provide it before using your information for that new purpose.</p>
        </section>
    </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
