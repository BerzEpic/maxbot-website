<?php
$docVersion = 'v3.1';
$docKind    = 'WhatsApp Add-on';
$pageTitle  = 'Maxbot WhatsApp Add-on Documentation';
$pageDesc   = 'Complete documentation for connecting Maxbot to Meta WhatsApp Cloud API and operating the integration in production.';
$pageUrl    = 'docs-whatsapp.php';
$heroTitle  = 'Connect Maxbot to WhatsApp Cloud API.';
$heroText   = 'Install the add-on, create the Meta app, configure credentials and webhooks, link a tested Maxbot flow, move to a production number and permanent token, and build approved carousel templates.';
$heroBadges = ['Separate add-on', 'Meta Cloud API', 'Webhook delivery', 'Production token', 'Carousel templates'];
$nextPage   = ['href' => 'docs.php', 'label' => 'Return to the documentation hub'];

$docGroups = [
    ['title' => 'Start here', 'items' => [
        ['id' => 'overview', 'title' => 'Product boundary'],
        ['id' => 'prerequisites', 'title' => 'Prerequisites'],
        ['id' => 'install-addon', 'title' => 'Install the add-on'],
        ['id' => 'setup-map', 'title' => 'Setup map'],
    ]],
    ['title' => 'Meta app and credentials', 'items' => [
        ['id' => 'create-meta-app', 'title' => 'Create the Meta app'],
        ['id' => 'development-assets', 'title' => 'Development phone assets'],
        ['id' => 'credential-reference', 'title' => 'Credential reference'],
        ['id' => 'enter-credentials', 'title' => 'Enter credentials in Maxbot'],
    ]],
    ['title' => 'Webhook and project', 'items' => [
        ['id' => 'configure-webhook', 'title' => 'Configure the webhook'],
        ['id' => 'verify-subscription', 'title' => 'Verify delivery and subscription'],
        ['id' => 'create-project', 'title' => 'Create a WhatsApp project'],
        ['id' => 'link-project', 'title' => 'Link the project and flow'],
    ]],
    ['title' => 'Production launch', 'items' => [
        ['id' => 'production-number', 'title' => 'Production phone number'],
        ['id' => 'permanent-token', 'title' => 'Permanent access token'],
        ['id' => 'production-settings', 'title' => 'Replace test credentials'],
        ['id' => 'end-to-end-test', 'title' => 'End-to-end test'],
        ['id' => 'business-verification', 'title' => 'Business verification'],
    ]],
    ['title' => 'WhatsApp templates', 'items' => [
        ['id' => 'template-basics', 'title' => 'Template basics'],
        ['id' => 'carousel-types', 'title' => 'Carousel types'],
        ['id' => 'create-carousel', 'title' => 'Create a carousel template'],
        ['id' => 'template-approval', 'title' => 'Approval and statuses'],
        ['id' => 'carousel-flow', 'title' => 'Use a carousel in a flow'],
    ]],
    ['title' => 'Operate and troubleshoot', 'items' => [
        ['id' => 'message-logs', 'title' => 'Message logs'],
        ['id' => 'security', 'title' => 'Security'],
        ['id' => 'troubleshooting', 'title' => 'Troubleshooting'],
        ['id' => 'launch-checklist', 'title' => 'Launch checklist'],
        ['id' => 'retire-integration', 'title' => 'Retire the integration'],
    ]],
];

$docSections = [
    [
        'id' => 'overview',
        'title' => 'Product boundary',
        'body' => <<<'HTML'
            <p class="docs-lead">Maxbot WhatsApp Integration is an add-on. It extends a compatible, active Maxbot plugin; it does not replace the core builder.</p>
            <p>This guide retains the existing add-on workflow and screenshots. Some examples use screens from the legacy full builder; they are not a Standard/Pro feature comparison. Free users configure the single flow in Flow Editor and use Project and Conversations. Check your add-on release’s compatibility requirements before installation.</p>
            <p>The builder owns the conversation blocks, Flow Editor logic and project configuration. The add-on receives Meta webhook events, resolves the linked WhatsApp project and assigned flow, passes the message into Maxbot, and sends the resulting response through WhatsApp Cloud API.</p>
            <div class="docs-grid">
                <article class="docs-card"><h3>Build in Maxbot</h3><p>Create and test the complete conversation,including keywords, fallbacks, validation, joins, and endings,before connecting the channel.</p></article>
                <article class="docs-card"><h3>Connect in the Add-on</h3><p>Configure Meta assets, webhook delivery, the linked project, production credentials, templates, testing, and channel-specific operations.</p></article>
            </div>
HTML,
    ],
    [
        'id' => 'prerequisites',
        'title' => 'Prerequisites',
        'body' => <<<'HTML'
            <ul>
                <li>An installed, active Maxbot plugin compatible with this add-on release.</li>
                <li>A complete Maxbot topic/flow that already passes Test Flow.</li>
                <li>The installable Maxbot WhatsApp Integration add-on ZIP.</li>
                <li>A Meta developer account and a Business Portfolio.</li>
                <li>A Meta app using the WhatsApp Business use case.</li>
                <li>A public HTTPS WordPress site that Meta can reach.</li>
                <li>Administrator access to WordPress and appropriate control of the Meta business assets.</li>
            </ul>
            <div class="docs-callout warning"><strong>Do not begin with production credentials.</strong> Validate the connection with Meta’s development assets first, then move deliberately to the real number and permanent token.</div>
HTML,
    ],
    [
        'id' => 'install-addon',
        'title' => 'Install the WhatsApp add-on',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Confirm your compatible Maxbot plugin is installed, active and functioning.</li>
                <li>Open <strong>Plugins → Add New Plugin → Upload Plugin</strong>.</li>
                <li>Choose the installable WhatsApp add-on ZIP and select <strong>Install Now</strong>.</li>
                <li>Activate the add-on.</li>
                <li>Open <strong>Maxbot → WhatsApp Integration</strong> and confirm Settings, Templates, Dashboard/Logs, and Troubleshooting are available.</li>
            </ol>
            <div class="docs-callout warning"><strong>Dependency:</strong> do not deactivate or remove the compatible Maxbot plugin while the add-on is active.</div>
HTML,
    ],
    [
        'id' => 'setup-map',
        'title' => 'Setup map',
        'body' => <<<'HTML'
            <ol>
                <li>Create the Meta app and select the WhatsApp Business use case.</li>
                <li>Validate Meta’s test phone assets.</li>
                <li>Copy development credentials into Maxbot.</li>
                <li>Configure the callback URL, verify token, and <span class="docs-code">messages</span> subscription.</li>
                <li>Create and link a WhatsApp project to a tested Maxbot flow.</li>
                <li>Add the real business number and permanent system-user token.</li>
                <li>Run a two-way production test and inspect logs.</li>
                <li>Complete business verification and template approval when required.</li>
            </ol>
HTML,
    ],
    [
        'id' => 'create-meta-app',
        'title' => 'Create the Meta app',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open Meta for Developers and select <strong>My Apps → Create App</strong>.</li>
                <li>Enter an app name and contact email.</li>
                <li>Choose the <strong>WhatsApp Business</strong> use case.</li>
                <li>Select the Business Portfolio that should own the WhatsApp Business Account.</li>
                <li>Review the selection, create the app, and complete any confirmation Meta requests.</li>
                <li>On the app dashboard, add or customize the WhatsApp product and open its API Setup.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2Fx5Xprkxc8ece8Z2XTPaaLZ%2FhGvwyF46TJxR7httHZcHfT_doc.png?alt=media&token=de4ce5ac-af37-4231-9a27-b0bd25ec8691',
            'alt' => 'Initiate Meta app creation',
            'caption' => 'Create a dedicated Meta app owned by the correct Business Portfolio.',
        ], [
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2Fx5Xprkxc8ece8Z2XTPaaLZ%2F87bxY3YuSvUpYGJGhV3GvM_doc.png?alt=media&token=32fa2b37-c44f-4465-8ec3-e5502b8678ae',
            'alt' => 'Choose the WhatsApp Business use case in Meta',
            'caption' => 'Select WhatsApp Business so the app receives the required Cloud API configuration.',
        ]],
    ],
    [
        'id' => 'development-assets',
        'title' => 'Validate Meta development phone assets',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open the WhatsApp product’s <strong>API Setup</strong> or <strong>Try it out</strong> area.</li>
                <li>Select Meta’s test sender number.</li>
                <li>Add a recipient number that you control and verify it when Meta requires confirmation.</li>
                <li>Send Meta’s sample message.</li>
                <li>Confirm it arrives before adding Maxbot to the path.</li>
                <li>Record the App ID, WABA ID, test Phone Number ID, and temporary access token shown for the development assets.</li>
            </ol>
            <div class="docs-callout"><strong>Isolation test:</strong> if Meta’s own sample does not arrive, fix the Meta asset or recipient setup before troubleshooting Maxbot.</div>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2Fx5Xprkxc8ece8Z2XTPaaLZ%2Fm63C6VVihxYMUeUNVEtohT_doc.png?alt=media&token=82fe2e24-96fc-4c4d-85ae-aa45226500ea',
            'alt' => 'Meta WhatsApp Try It Out step',
            'caption' => 'Use Meta’s development sender and test recipient before configuring the Maxbot webhook.',
        ], [
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2Fx5Xprkxc8ece8Z2XTPaaLZ%2F4jmvWC9pqck9dv6yCejhuf_doc.png?alt=media&token=e9a74e3f-5e2c-46cb-9c99-0e33e1fefa7b',
            'alt' => 'Select a WhatsApp test recipient number in Meta',
            'caption' => 'Choose a recipient you can access so both outgoing delivery and incoming replies can be checked.',
        ]],
    ],
    [
        'id' => 'credential-reference',
        'title' => 'Credential reference',
        'body' => <<<'HTML'
            <div class="docs-table-wrap"><table class="docs-table">
                <thead><tr><th>Value</th><th>Source</th><th>Purpose</th></tr></thead>
                <tbody>
                    <tr><td>App ID</td><td>Meta app dashboard</td><td>Identifies the Meta app.</td></tr>
                    <tr><td>App Secret</td><td>Meta app basic settings</td><td>Validates webhook signatures. Keep it private.</td></tr>
                    <tr><td>WABA ID</td><td>WhatsApp API Setup</td><td>Identifies the WhatsApp Business Account.</td></tr>
                    <tr><td>Phone Number ID</td><td>WhatsApp API Setup</td><td>Identifies the sender in Cloud API calls.</td></tr>
                    <tr><td>Access token</td><td>Temporary token for development; system-user token for production</td><td>Authorizes API requests.</td></tr>
                    <tr><td>Verify token</td><td>Created by you in Maxbot</td><td>Must exactly match Meta’s webhook configuration.</td></tr>
                    <tr><td>Callback URL</td><td>Generated by Maxbot</td><td>Public HTTPS endpoint that receives Meta webhook events.</td></tr>
                </tbody>
            </table></div>
            <div class="docs-callout warning"><strong>Identifiers must belong together.</strong> A WABA ID, Phone Number ID, app, token, and production phone drawn from different business assets can pass some checks while failing message delivery.</div>
HTML,
    ],
    [
        'id' => 'enter-credentials',
        'title' => 'Enter development credentials in Maxbot',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open <strong>Maxbot → WhatsApp Integration → Settings</strong>.</li>
                <li>Copy the App ID from the Meta app dashboard.</li>
                <li>Reveal and copy the App Secret from Meta’s basic app settings.</li>
                <li>Copy the WABA ID, development Phone Number ID, and temporary access token from WhatsApp API Setup.</li>
                <li>Paste each value into the matching Maxbot field without surrounding spaces or labels.</li>
                <li>Create a strong verify token that is not the App Secret or access token.</li>
                <li>Save the settings before configuring the webhook in Meta.</li>
            </ol>
            <div class="docs-callout warning"><strong>Temporary tokens expire.</strong> They are appropriate only for the development phase and must be replaced before production.</div>
HTML,
    ],
    [
        'id' => 'configure-webhook',
        'title' => 'Configure the webhook',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>In Maxbot WhatsApp settings, confirm the verify token and credentials are saved.</li>
                <li>Copy the callback URL generated by Maxbot.</li>
                <li>In Meta, open <strong>WhatsApp → Configuration</strong> and choose to configure the webhook.</li>
                <li>Paste the callback URL into Meta’s Callback URL field.</li>
                <li>Paste the exact same verify token.</li>
                <li>Select <strong>Verify and Save</strong>.</li>
                <li>In the webhook fields list, subscribe to <strong>messages</strong>.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2F3Jpe4nS6sTJCiaGZBgdUpy%2FsD3f5JMWggEmJkpcih21kH_doc.png?alt=media&token=8aea9b73-698f-4bed-81d4-131632c54f8e',
            'alt' => 'Maxbot webhook callback URL',
            'caption' => 'Copy the HTTPS callback URL generated by Maxbot and keep its verify token saved.',
        ], [
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2F3Jpe4nS6sTJCiaGZBgdUpy%2F39xppLxoTJgdY3yo7rM8DY_doc.png?alt=media&token=cfbea9e7-4bd0-48f7-b527-fcaabe185ef2',
            'alt' => 'Verify and save the webhook in Meta',
            'caption' => 'Meta accepts the callback only when it can reach the site and both verify-token values match exactly.',
        ]],
    ],
    [
        'id' => 'verify-subscription',
        'title' => 'Verify webhook delivery and app subscription',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open <strong>WhatsApp Integration → Troubleshooting</strong>.</li>
                <li>Select <strong>Test Connection</strong>.</li>
                <li>If webhook delivery is disabled, enable it, save, and retest.</li>
                <li>Confirm the app, WABA, phone assets, callback, and subscription are detected.</li>
                <li>Confirm the WABA is subscribed to the app and the <span class="docs-code">messages</span> field is active.</li>
                <li>Send a Meta test message and reply from the recipient phone.</li>
                <li>Verify the incoming event appears in Maxbot’s logs.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2F3Jpe4nS6sTJCiaGZBgdUpy%2FtrETuV6EAKLAp5pzUYm8Aw_doc.png?alt=media&token=66774626-ed7e-466b-8e2f-8fab48b4f426',
            'alt' => 'Initiate a WhatsApp connection test in Maxbot',
            'caption' => 'Run the built-in test after saving credentials and subscribing Meta’s webhook.',
        ], [
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2F3Jpe4nS6sTJCiaGZBgdUpy%2F49MpZjhuM3R15t6ipDr9Ng_doc.png?alt=media&token=5c9743fc-4943-4111-b8d8-e4d2e878c72c',
            'alt' => 'WhatsApp connection success in Maxbot',
            'caption' => 'A successful test confirms the main Meta and Maxbot integration checks.',
        ]],
    ],
    [
        'id' => 'create-project',
        'title' => 'Create a WhatsApp project',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>In the compatible Maxbot plugin, create and fully test the topic/flow that should answer WhatsApp messages.</li>
                <li>Open <strong>Projects</strong> and select <strong>Add New Project</strong>.</li>
                <li>Enter a project name and select the WhatsApp project/channel type.</li>
                <li>Assign the correct agent and conversation flow.</li>
                <li>Choose whether any incoming message or only specific messages can start the flow.</li>
                <li>For a specific-message trigger, enter keywords or phrases and choose Exact, Contains, or Starts with.</li>
                <li>Enable “only trigger if no active conversation exists” when a new trigger should not restart an ongoing session.</li>
                <li>Optionally configure a website WhatsApp launcher and prefilled message.</li>
                <li>Save and enable the project.</li>
            </ol>
HTML,
    ],
    [
        'id' => 'link-project',
        'title' => 'Link the project and flow',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open WhatsApp Integration settings.</li>
                <li>Locate <strong>Linked WhatsApp Project</strong>.</li>
                <li>Select the WhatsApp project created for this integration.</li>
                <li>Save the settings.</li>
                <li>Return to Troubleshooting and run the connection test again.</li>
                <li>Confirm the result identifies the linked project and assigned flow.</li>
            </ol>
            <div class="docs-callout warning"><strong>A connected Meta app is not enough.</strong> Incoming messages cannot start the intended conversation until the integration resolves an enabled WhatsApp project with an assigned flow.</div>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2FwCxYA4TNXtTTymWwzTSFiN%2F6Z8fdkhop4BcpfNvQwb5e8_doc.png?alt=media&token=92712630-ec2e-41a0-8821-569fd22eb28b',
            'alt' => 'Linked WhatsApp Project selector in Maxbot',
            'caption' => 'Select the enabled WhatsApp project whose assigned flow should handle incoming messages.',
        ]],
    ],
    [
        'id' => 'production-number',
        'title' => 'Add the production phone number',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>In WhatsApp API Setup, select <strong>Add phone number</strong>.</li>
                <li>Enter the public display name, business category, and business description.</li>
                <li>Enter the real phone number.</li>
                <li>Complete Meta’s verification method for that number.</li>
                <li>Select the new number in API Setup.</li>
                <li>Copy its Phone Number ID and confirm the WABA ID belongs to the same business account.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2Fx5Xprkxc8ece8Z2XTPaaLZ%2F45awp8EHxKu1LjaMSMpVAL_doc.png?alt=media&token=8d9ff02d-dca6-4dd3-92c3-99328269ef57',
            'alt' => 'Manage WhatsApp phone numbers in Meta',
            'caption' => 'Add and verify the production phone number under the same business assets used by the app.',
        ]],
    ],
    [
        'id' => 'permanent-token',
        'title' => 'Create a permanent system-user token',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open Meta Business Settings.</li>
                <li>Create or select a system user controlled by the business.</li>
                <li>Assign the Meta app and WhatsApp Business Account assets.</li>
                <li>Grant only the WhatsApp permissions required to manage and send messages.</li>
                <li>Generate a system-user token for the app.</li>
                <li>Copy the token immediately and store it in the business’s approved secret manager.</li>
            </ol>
            <div class="docs-callout warning"><strong>Permanent does not mean public.</strong> Never place the token in screenshots, support tickets, chat messages, frontend JavaScript, or source control. Rotate it after suspected exposure or ownership changes.</div>
HTML,
    ],
    [
        'id' => 'production-settings',
        'title' => 'Replace test credentials with production values',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open Maxbot WhatsApp settings.</li>
                <li>Replace the temporary token with the system-user token.</li>
                <li>Replace the test Phone Number ID with the production Phone Number ID.</li>
                <li>Confirm the App ID, App Secret, and WABA ID match the production number’s assets.</li>
                <li>Enter the public business number in international format.</li>
                <li>Save the settings.</li>
                <li>Run Test Connection and confirm the detected number, WABA subscription, webhook, linked project, and assigned flow.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2F1yKAhJdzaMRZcVJfy9hLSs%2FnWsLHHmtDKiWYCWZWQFPtM_doc.png?alt=media&token=da2016f3-b5f9-4924-9bb8-8a815dfbebfe',
            'alt' => 'Successful production WhatsApp connection test in Maxbot',
            'caption' => 'Retest after replacing development assets so the result identifies the real business number.',
        ]],
    ],
    [
        'id' => 'end-to-end-test',
        'title' => 'Run an end-to-end production test',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open WhatsApp Integration Troubleshooting and confirm every connection check passes.</li>
                <li>Enter a recipient number using digits in international format.</li>
                <li>Select an approved template and send the test message.</li>
                <li>Confirm the message arrives on the recipient phone.</li>
                <li>Reply with text that matches the configured project trigger.</li>
                <li>Confirm the linked project starts its assigned Maxbot flow.</li>
                <li>Complete quick replies, keyword routes, validation, media, joins, and the final action that the flow uses.</li>
                <li>Verify webhook-received, sent, delivered, and read events in Dashboard or Message Logs where available.</li>
                <li>Repeat from a second WhatsApp account and after any credential, webhook, template, project, or flow change.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2F3Jpe4nS6sTJCiaGZBgdUpy%2Fgg8UxnRzpGpkHbcEqtmsZy_doc.png?alt=media&token=bbdc3796-eb41-4410-bcd4-317a3b0d57cd',
            'alt' => 'Test WhatsApp messaging from Maxbot',
            'caption' => 'Send a controlled test message, reply from WhatsApp, and verify the complete two-way path.',
        ]],
    ],
    [
        'id' => 'business-verification',
        'title' => 'Meta business verification',
        'body' => <<<'HTML'
            <p>Meta may require Business Verification before production access or higher messaging limits are available.</p>
            <ol class="docs-steps">
                <li>Open Meta Business Settings or Security Center and start verification.</li>
                <li>Enter the legal business name, address, phone, website, business type, and category exactly as official records show them.</li>
                <li>Add a trading name only when the business genuinely uses it.</li>
                <li>Choose an available verification method.</li>
                <li>Upload a current, readable file of the exact document type Meta requests.</li>
                <li>Review and submit the information.</li>
                <li>Monitor the verification status and account email for follow-up requests.</li>
                <li>After approval, confirm the app, WABA, production number, display name, and system-user assets still match.</li>
            </ol>
HTML,
    ],
    [
        'id' => 'template-basics',
        'title' => 'WhatsApp template basics',
        'body' => <<<'HTML'
            <p>WhatsApp message templates are created for defined business-initiated messages and reviewed by Meta. A template has a unique name, language, content, components, samples, and a status.</p>
            <ul>
                <li>Use clear content that matches the real business purpose.</li>
                <li>Provide realistic samples for variables and media.</li>
                <li>Use only publicly accessible HTTPS sample media.</li>
                <li>Do not place a Pending or Rejected template in a production flow.</li>
                <li>Keep the live payload compatible with the approved structure.</li>
            </ul>
HTML,
    ],
    [
        'id' => 'carousel-types',
        'title' => 'Quick Reply and Link Carousels',
        'body' => <<<'HTML'
            <div class="docs-grid">
                <article class="docs-card"><h3>Quick Reply Carousel</h3><p>Each card returns a reply action so the customer can choose a product, category, service, or path directly inside WhatsApp.</p></article>
                <article class="docs-card"><h3>Link Carousel</h3><p>Each card opens a destination created from the template’s base URL and the individual card’s URL suffix.</p></article>
            </div>
            <p>Complete the production WhatsApp setup before creating carousel templates.</p>
HTML,
    ],
    [
        'id' => 'create-carousel',
        'title' => 'Create a carousel template',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open <strong>WhatsApp Integration → Templates</strong>.</li>
                <li>Select Quick Reply Carousel or Link Carousel.</li>
                <li>Enter a unique lowercase template name in Meta’s accepted format and choose the language.</li>
                <li>Write the shared message body that introduces the cards.</li>
                <li>Select the card body format and choose between 2 and 10 sample cards.</li>
                <li>Add a publicly accessible HTTPS sample image, realistic title, and description for every card.</li>
                <li>For a Quick Reply Carousel, enter the reply label returned by each card.</li>
                <li>For a Link Carousel, configure the shared base URL and enter only each card’s URL suffix.</li>
                <li>Review the content and select <strong>Create Template</strong>.</li>
            </ol>
            <div class="docs-callout"><strong>Card-count rule:</strong> build the live flow with the same number of cards used in the approved template.</div>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2F79J4vrbicPz9XozCQtcqFb%2FjtFD9zxBZH3q6KguCYCo4S_doc.png?alt=media&token=63464ee0-5e64-49c5-8be3-d89f18e9a560',
            'alt' => 'WhatsApp carousel template configuration in Maxbot',
            'caption' => 'Configure the shared message and card format before adding the sample cards Meta will review.',
        ]],
    ],
    [
        'id' => 'template-approval',
        'title' => 'Approval and template statuses',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>After submission, confirm the template appears in Maxbot with Pending status.</li>
                <li>Open Meta Message Templates and locate the same name and language.</li>
                <li>Wait for Meta’s review; do not create duplicate copies while the template is pending.</li>
                <li>When review finishes, return to Maxbot and select <strong>Refresh Template Statuses</strong>.</li>
                <li>Use the template only after Maxbot reports Approved.</li>
                <li>If it is Rejected, inspect Meta’s reason, correct the content or samples, and submit a revised template.</li>
            </ol>
HTML,
    ],
    [
        'id' => 'carousel-flow',
        'title' => 'Use a carousel in a Maxbot flow',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Create a topic for the carousel journey and open its Flow Editor.</li>
                <li>Add a welcome prompt and quick replies that select the desired carousel path.</li>
                <li>Give every quick reply a defined child-block action.</li>
                <li>In the child block, enable the card/carousel response and select the approved template.</li>
                <li>Add the same number of production cards used in the approved template.</li>
                <li>Provide each production image, title, description, and required action value.</li>
                <li>For Quick Reply cards, make the returned label match the branch logic.</li>
                <li>For Link cards, provide only the suffix when the template already defines the base URL.</li>
                <li>Save, link the flow to the WhatsApp project, and test every card action on a real WhatsApp account.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FINoqoFYVv8NBsekzqyWLqz5UiqR2%2Fcx6gJhZSsuUirKpvXDnjKp%2Faub3Lstpo5aUhxB6HtEmLU_doc.png?alt=media&token=668b3594-1f7b-4c44-8c28-163e1d3d1c4a',
            'alt' => 'Enable a card response for a WhatsApp carousel flow',
            'caption' => 'Enable card view in the branch that will send the approved carousel template.',
        ]],
    ],
    [
        'id' => 'message-logs',
        'title' => 'Dashboard and message logs',
        'body' => <<<'HTML'
            <p>Use Dashboard and Message Logs to reconstruct the message path:</p>
            <ul>
                <li>Whether Meta delivered the incoming webhook.</li>
                <li>Which sender and phone-number asset produced the event.</li>
                <li>Whether Maxbot resolved the linked project and active conversation.</li>
                <li>Which flow and block handled the input.</li>
                <li>Whether the outgoing request reached sent, delivered, read, or failed status.</li>
                <li>Any sanitized error code and timestamp needed for troubleshooting.</li>
            </ul>
            <div class="docs-callout warning"><strong>Support data:</strong> share timestamps, status labels, and sanitized errors,never access tokens, App Secrets, verify tokens, or private message content.</div>
HTML,
    ],
    [
        'id' => 'security',
        'title' => 'Security',
        'body' => <<<'HTML'
            <ul>
                <li>Use HTTPS for WordPress and the webhook endpoint.</li>
                <li>Keep the App Secret and access token private.</li>
                <li>Validate Meta’s App Secret signature on incoming webhook requests.</li>
                <li>Use a strong, unique verify token.</li>
                <li>Use a system-user token with only the required assets and permissions.</li>
                <li>Restrict WordPress administrator and Meta Business access.</li>
                <li>Rotate credentials after staff, ownership, permission, or exposure changes.</li>
                <li>Keep WordPress, the compatible Maxbot plugin, the add-on, and server dependencies updated.</li>
            </ul>
HTML,
    ],
    [
        'id' => 'troubleshooting',
        'title' => 'Troubleshooting',
        'body' => <<<'HTML'
            <div class="docs-table-wrap"><table class="docs-table">
                <thead><tr><th>Problem</th><th>What to check</th></tr></thead>
                <tbody>
                    <tr><td>Add-on activation fails</td><td>the compatible Maxbot plugin must be installed and active. Upload the installable add-on ZIP and verify server compatibility and dependencies.</td></tr>
                    <tr><td>Webhook verification fails</td><td>The callback must be public HTTPS; save Maxbot first; both verify-token values must match exactly; security or cache layers must not block Meta’s verification request.</td></tr>
                    <tr><td>Connection works but no incoming reply</td><td>Check the <span class="docs-code">messages</span> subscription, App Secret, WABA/number pairing, webhook delivery, linked project, assigned flow, enabled state, trigger match, and active-conversation option.</td></tr>
                    <tr><td>Test message does not arrive</td><td>Use international digits, the correct Phone Number ID and token, an approved template, and a recipient active on WhatsApp.</td></tr>
                    <tr><td>Token or authorization error</td><td>Replace expired development credentials, confirm the system user’s permissions and assigned assets, and regenerate the production token when necessary.</td></tr>
                    <tr><td>Wrong flow starts</td><td>Confirm the Linked WhatsApp Project, project type, assigned flow, trigger keywords, match type, and whether an active conversation already exists.</td></tr>
                    <tr><td>Template stays Pending or is Rejected</td><td>Inspect Meta’s status and reason, verify sample media accessibility and valid content, refresh statuses, then correct and resubmit when needed.</td></tr>
                    <tr><td>Carousel sends incorrectly</td><td>Use an Approved template, match the approved card count and structure, supply all production card fields, and use only the suffix for a Link Carousel with a base URL.</td></tr>
                </tbody>
            </table></div>
HTML,
    ],
    [
        'id' => 'launch-checklist',
        'title' => 'Production launch checklist',
        'body' => <<<'HTML'
            <ul>
                <li>Your compatible Maxbot plugin and the WhatsApp add-on are active and current.</li>
                <li>The core flow passes all expected, fallback, validation, join, and ending tests.</li>
                <li>The production phone number is registered and its display name is approved.</li>
                <li>The App ID, App Secret, WABA ID, Phone Number ID, public number, and system-user token belong to matching production assets.</li>
                <li>The callback uses HTTPS, App Secret signature validation is enabled, and the verify token remains private.</li>
                <li>The <span class="docs-code">messages</span> subscription and WABA app subscription are active.</li>
                <li>The WhatsApp project is enabled, linked, and assigned to the intended flow.</li>
                <li>Every live template reports Approved and its payload matches the approved structure.</li>
                <li>Two-way tests from at least two recipient accounts succeed and appear in logs.</li>
                <li>Token storage, staff access, privacy, logging, and escalation procedures are documented.</li>
            </ul>
HTML,
    ],
    [
        'id' => 'retire-integration',
        'title' => 'Retire or uninstall the integration',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Back up relevant project, template, and message-log information according to the business’s retention policy.</li>
                <li>Disable the linked WhatsApp project so it stops starting new conversations.</li>
                <li>Remove or disable Meta webhook subscriptions when the integration is permanently retired.</li>
                <li>Revoke the system-user token and remove unnecessary app/business asset assignments.</li>
                <li>Review the add-on cleanup setting, then deactivate and remove the add-on.</li>
                <li>Keep the compatible Maxbot plugin installed when other web or channel projects still use it.</li>
            </ol>
HTML,
    ],
];

include __DIR__ . '/partials/docs-renderer.php';
