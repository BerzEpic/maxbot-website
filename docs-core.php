<?php
if (!headers_sent()) {
    header('X-Maxbot-Docs-Build: core-3.2.1');
}

$docVersion = 'v3.2.1';
$docKind    = 'Legacy builder reference';
$pageTitle  = 'Maxbot legacy builder reference | Documentation';
$pageDesc   = 'Reference for the earlier Maxbot full builder. Current Free and Standard guidance is documented separately.';
$pageUrl    = 'docs-core.php';
$heroTitle  = 'Legacy Maxbot builder reference.';
$heroText   = 'This retained guide describes the earlier full builder and its screenshots. It is not the Maxbot Free guide or a confirmed Standard/Pro feature list. Choose your edition from the navigation for current guidance.';
$heroBadges = ['WordPress plugin', 'Visual Flow Editor', 'Quick reply buttons', 'Data capture', 'Web widget'];
$nextPage   = ['href' => 'docs-whatsapp.php', 'label' => 'Next: configure the WhatsApp Add-on'];

$docGroups = [
    ['title' => 'Start here', 'items' => [
        ['id' => 'overview', 'title' => 'What Maxbot is'],
        ['id' => 'requirements', 'title' => 'Requirements'],
        ['id' => 'installation', 'title' => 'Installation'],
        ['id' => 'license-limits', 'title' => 'Current editions'],
        ['id' => 'core-concepts', 'title' => 'Core concepts'],
        ['id' => 'typical-workflow', 'title' => 'Typical workflow'],
    ]],
    ['title' => 'Create your chatbot', 'items' => [
        ['id' => 'agents', 'title' => 'Agents'],
        ['id' => 'topics', 'title' => 'Topics'],
        ['id' => 'planning', 'title' => 'Plan before building'],
    ]],
    ['title' => 'Templates', 'items' => [
        ['id' => 'template-library', 'title' => 'Template library'],
        ['id' => 'use-template', 'title' => 'Use and adapt a template'],
        ['id' => 'template-choice', 'title' => 'Template or scratch'],
    ]],
    ['title' => 'Flow Editor', 'items' => [
        ['id' => 'flow-editor', 'title' => 'Flow Editor overview'],
        ['id' => 'blocks-tabs-actions', 'title' => 'Blocks, tabs, and actions'],
        ['id' => 'block-connections', 'title' => 'How blocks work together'],
    ]],
    ['title' => 'User input and routing', 'items' => [
        ['id' => 'user-input-tab', 'title' => 'User Input tab'],
        ['id' => 'quick-reply-text', 'title' => 'Quick reply buttons'],
        ['id' => 'quick-reply-cards', 'title' => 'Quick replies as cards'],
        ['id' => 'trigger-keywords', 'title' => 'Typed replies (optional)'],
    ]],
    ['title' => 'Bot responses', 'items' => [
        ['id' => 'bot-responses', 'title' => 'Messages and pacing'],
        ['id' => 'message-variables', 'title' => 'Variables in messages'],
    ]],
    ['title' => 'Next Step logic', 'items' => [
        ['id' => 'next-step-controls', 'title' => 'Next Step controls'],
        ['id' => 'require-quick-reply', 'title' => 'Require a quick reply'],
        ['id' => 'save-selection', 'title' => 'Save a selection'],
        ['id' => 'save-entity', 'title' => 'Save into an entity'],
        ['id' => 'join-redirect', 'title' => 'Continue from another block'],
        ['id' => 'end-conversation', 'title' => 'End the conversation'],
        ['id' => 'keyword-flow', 'title' => 'Optional typed-reply flow'],
        ['id' => 'fallback-retry', 'title' => 'Fallback and retry'],
        ['id' => 'save-free-text', 'title' => 'Save free text'],
    ]],
    ['title' => 'Data entities and users', 'items' => [
        ['id' => 'data-entities', 'title' => 'Data entities'],
        ['id' => 'validation', 'title' => 'Validation rules'],
        ['id' => 'users-data', 'title' => 'Users Data'],
        ['id' => 'data-capture-workflow', 'title' => 'Complete capture workflow'],
    ]],
    ['title' => 'Rich content', 'items' => [
        ['id' => 'rich-content', 'title' => 'Rich Content tab'],
        ['id' => 'rich-content-types', 'title' => 'Cards, media, and links'],
    ]],
    ['title' => 'Test and improve', 'items' => [
        ['id' => 'test-flow', 'title' => 'Test Flow'],
        ['id' => 'training', 'title' => 'Training and improvement'],
    ]],
    ['title' => 'Publish', 'items' => [
        ['id' => 'projects', 'title' => 'Projects'],
        ['id' => 'widget-triggers', 'title' => 'Widget and triggers'],
        ['id' => 'publish-checklist', 'title' => 'Publish checklist'],
    ]],
    ['title' => 'Use and maintain', 'items' => [
        ['id' => 'use-cases', 'title' => 'Real use cases'],
        ['id' => 'best-practices', 'title' => 'Best practices'],
        ['id' => 'integrations-addons', 'title' => 'Integrations and add-ons'],
        ['id' => 'backup-uninstall', 'title' => 'Backup and uninstall'],
    ]],
];

$docSections = [
    [
        'id' => 'overview',
        'title' => 'What Maxbot is',
        'body' => <<<'HTML'
            <p class="docs-lead">Maxbot is a visual chatbot builder for WordPress. It combines guided quick-reply and card-based conversations, structured data capture, reusable templates, rich content, testing, and website deployment.</p>
            <p>The Flow Editor is the center of the product. Each block represents one conversational moment: what the user can say, what the bot sends, what data is stored, and what happens next.</p>
            <div class="docs-grid">
                <article class="docs-card"><h3>Conversation design</h3><p>Build menus, decision trees, FAQs, conversational forms, recommendations, and support journeys without hardcoding the complete experience.</p></article>
                <article class="docs-card"><h3>Reliable guided journeys</h3><p>Use clear buttons and cards, test every branch, inspect captured data, and refine the wording and structure over time.</p></article>
            </div>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2Fb2PxBxL7dV9hJsn1JKd55c%2F8DQS2GB2MrUkBvuSAxeasr_doc.png?alt=media&token=e6017e59-1d31-499c-a320-b9b47a8d5589',
            'alt' => 'Maxbot visual Flow Editor overview',
            'caption' => 'The Flow Editor presents the entire conversation as connected blocks on one canvas.',
        ]],
    ],
    [
        'id' => 'requirements',
        'title' => 'Requirements',
        'body' => <<<'HTML'
            <ul>
                <li>A WordPress website where you have administrator access.</li>
                <li>A currently supported WordPress and PHP environment.</li>
                <li>HTTPS for production use and for any channel integration that requires a public callback.</li>
                <li>The installable Maxbot plugin ZIP from the product download.</li>
                <li>A staging site and current database/files backup before installation or updates.</li>
            </ul>
            <div class="docs-callout warning"><strong>Upload the installable ZIP only.</strong> If the marketplace package contains documentation, licenses, and several archives, extract it first.</div>
HTML,
    ],
    [
        'id' => 'installation',
        'title' => 'Install Maxbot',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>In WordPress, open <strong>Plugins → Add New Plugin</strong>.</li>
                <li>Select <strong>Upload Plugin</strong>, choose the installable Maxbot ZIP, and select <strong>Install Now</strong>.</li>
                <li>After installation finishes, select <strong>Activate Plugin</strong>.</li>
                <li>Open the new <strong>Maxbot</strong> menu.</li>
                <li>The following legacy sections describe screens from the earlier full builder. For current setup, select the Free or Standard guide in the navigation.</li>
            </ol>
            <div class="docs-callout success"><strong>Update safely:</strong> back up the site, update on staging, test a published project and its stored data, then update production.</div>
HTML,
    ],
    [
        'id' => 'license-limits',
        'title' => 'Current editions and licensing',
        'body' => <<<'HTML'
            <p>Maxbot Free is planned for WordPress.org and has no monthly subscription. Maxbot Standard is planned for CodeCanyon as a one-time purchase with lifetime access. Maxbot Pro is planned for this website using Freemius with a monthly subscription; its checkout is not available yet.</p>
            <p>Free and Standard use the Free service without product-license verification or per-project licensing. API authentication remains separate. A product’s feature limits are not license allowances.</p>
            <p>These commercial models do not establish website allowances or a promise of lifetime support, updates or hosted-service availability. Check the terms provided with your edition. The old Regular/Extended project-quota model no longer describes these editions.</p>
            <p>The WhatsApp Integration remains a separate add-on. Check the add-on’s requirements for your installed release.</p>
HTML,
    ],
    [
        'id' => 'core-concepts',
        'title' => 'Core concepts',
        'body' => <<<'HTML'
            <div class="docs-grid">
                <article class="docs-card"><h3>Agent</h3><p>The visible chatbot identity: name, avatar, occupation or role, and short description.</p></article>
                <article class="docs-card"><h3>Topic</h3><p>A focused conversation flow for one primary objective.</p></article>
                <article class="docs-card"><h3>Block</h3><p>One conversation unit that can receive input, send responses, store data, show rich content, or route elsewhere.</p></article>
                <article class="docs-card"><h3>Project</h3><p>The deployable configuration that assigns an agent and flow to website locations or a supported channel.</p></article>
                <article class="docs-card"><h3>Data entity</h3><p>A reusable structured field such as name, email, phone, company, country, or a custom value.</p></article>
                <article class="docs-card"><h3>Variable</h3><p>The stable identifier used to reuse a saved value, such as <span class="docs-code">@name</span> or <span class="docs-code">@email</span>.</p></article>
                <article class="docs-card"><h3>Quick reply</h3><p>A visible button or card that gives the user a clear choice and opens its connected child block.</p></article>
                <article class="docs-card"><h3>Add-on</h3><p>An optional product that extends the core builder through a supported integration.</p></article>
            </div>
HTML,
    ],
    [
        'id' => 'typical-workflow',
        'title' => 'Typical workflow',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Define the chatbot’s outcome and the information it needs.</li>
                <li>Create the agent identity.</li>
                <li>Create one focused topic.</li>
                <li>Create or review the required data entities.</li>
                <li>Build the conversation in the Flow Editor.</li>
                <li>Test every button, card, saved value, shared continuation, and ending.</li>
                <li>Create a project, assign the agent and flow, configure its trigger and locations, then publish.</li>
                <li>Review Users Data, improve the guided journey, and test again.</li>
            </ol>
HTML,
    ],
    [
        'id' => 'agents',
        'title' => 'Agents',
        'body' => <<<'HTML'
            <p>The agent is the identity users see in the chat. A strong identity explains its purpose without pretending to do more than the assigned flows support.</p>
            <ol class="docs-steps">
                <li>Open <strong>Maxbot → Agents</strong> and select <strong>Add New Agent</strong>.</li>
                <li>Enter a display name and a clear occupation such as Support Assistant, Sales Assistant, Booking Assistant, or Product Guide.</li>
                <li>Add a recognizable avatar and a short first-person description.</li>
                <li>Select <strong>Add Agent</strong> and confirm it appears in the agents list.</li>
            </ol>
            <div class="docs-callout"><strong>Good description:</strong> “I help visitors choose a service, answer common questions, and reach the right next step.”</div>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FpNBu4TvfWCcycFCsV2TNhW%2FoxUkWBLV1tNmizReVSpr2d_doc.png?alt=media&token=dc9f5dbb-b33c-4c89-9811-4c973dc2b639',
            'alt' => 'Add New Agent screen in Maxbot',
            'caption' => 'Create the chatbot identity before assigning it to a project.',
        ]],
    ],
    [
        'id' => 'topics',
        'title' => 'Topics',
        'body' => <<<'HTML'
            <p>A topic contains one conversation structure. Keep its scope narrow enough that a user can understand the promised outcome.</p>
            <ol class="docs-steps">
                <li>Open <strong>Topics</strong> and select <strong>Add New</strong>.</li>
                <li>Enter a recognizable topic name.</li>
                <li>Add a short description that states the conversation’s purpose.</li>
                <li>Save the topic, then open its <strong>Flow Editor</strong>.</li>
            </ol>
            <p>Good topic scopes include Pricing Questions, Technical Support, Product Recommendation, Contact Us, Demo Booking, and FAQ Assistant.</p>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FpNBu4TvfWCcycFCsV2TNhW%2F1Thxft5LZSYkmVTyQCz7nX_doc.png?alt=media&token=fb1971d9-e9ae-447f-ab7e-3f39cde66915',
            'alt' => 'Save Topic action in Maxbot',
            'caption' => 'Give each topic one clear objective before opening its Flow Editor.',
        ]],
    ],
    [
        'id' => 'planning',
        'title' => 'Plan before building',
        'body' => <<<'HTML'
            <p>Answer these questions before creating blocks:</p>
            <ol>
                <li>What should the chatbot achieve?</li>
                <li>What should the user be able to do?</li>
                <li>What data must be collected, validated, stored, or reused?</li>
                <li>Which answers should use a quick reply button, a card, or a collected data field?</li>
                <li>Is there any step where an optional typed reply is genuinely more useful than a guided choice?</li>
                <li>Which branches share the same continuation and should use a join?</li>
                <li>What are the successful endings and recovery paths?</li>
            </ol>
            <div class="docs-callout"><strong>Prefer a clear choice.</strong> Quick reply buttons and cards make the available paths visible and keep the conversation reliable.</div>
HTML,
    ],
    [
        'id' => 'template-library',
        'title' => 'Template library',
        'body' => <<<'HTML'
            <p>Templates are prebuilt chatbot structures for common goals. They reduce the blank-page problem, demonstrate good flow patterns, and give you editable starter content.</p>
            <ol class="docs-steps">
                <li>Open <strong>Templates</strong>.</li>
                <li>Search by use case or browse categories such as Booking, Commerce, Support, or All.</li>
                <li>Use filters such as location, specialty, or author when they are available.</li>
                <li>Preview a result before acquiring it.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2Fb2PxBxL7dV9hJsn1JKd55c%2F2CmFunYckeiVj2hcbNf8U3_doc.png?alt=media&token=ced6200c-1f02-418d-8c45-b5a58ae06c85',
            'alt' => 'Template search in Maxbot',
            'caption' => 'Search directly or browse a category to find a close starting structure.',
        ], [
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2Fb2PxBxL7dV9hJsn1JKd55c%2Ft44orNtGLf8nsd2usdXsyw_doc.png?alt=media&token=c62a5765-4717-4271-9ebf-a2b7ff0a5c0f',
            'alt' => 'Preview Template Details in Maxbot',
            'caption' => 'Preview the conversation structure and included inputs before applying the template.',
        ]],
    ],
    [
        'id' => 'use-template',
        'title' => 'Use and adapt a template',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Open the template preview and select <strong>Acquire</strong> or <strong>Use Template</strong>.</li>
                <li>Open the acquired template and review its conversation from the first block to each ending.</li>
                <li>Adapt the visible bot messages, quick reply buttons, cards, and collected fields to the experience you want to publish.</li>
                <li>Keep the useful branches and remove options that do not belong in your conversation.</li>
                <li>Save the flow, then use <strong>Test Flow</strong> to select every retained button and card before publishing.</li>
            </ol>
            <div class="docs-callout"><strong>Think of a template as a starting flow.</strong> Its structure is ready to adapt, while its wording and available choices should match the conversation you want visitors to follow.</div>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2Fb2PxBxL7dV9hJsn1JKd55c%2F4Kb9vBUJhA4e45p7Ycv92R_doc.png?alt=media&token=87001699-b739-4e67-877d-130cd2a59d8f',
            'alt' => 'Apply Template To Project in Maxbot',
            'caption' => 'Acquire a template, open its flow, and adapt the guided choices to your own conversation.',
        ]],
    ],
    [
        'id' => 'template-choice',
        'title' => 'Template or build from scratch?',
        'body' => <<<'HTML'
            <div class="docs-grid">
                <article class="docs-card"><h3>Use a template</h3><p>Choose a template when the goal is common, its journey is close to the real use case, speed matters, or you want to learn from an existing structure.</p></article>
                <article class="docs-card"><h3>Build from scratch</h3><p>Start empty when the flow is unique, you need complete control, or adapting the template would require replacing most blocks.</p></article>
            </div>
            <p>Templates are useful for lead capture, contact requests, support intake, bookings, FAQs, service recommendations, commerce, real estate, restaurant, and healthcare journeys.</p>
HTML,
    ],
    [
        'id' => 'flow-editor',
        'title' => 'Flow Editor overview',
        'body' => <<<'HTML'
            <p class="docs-lead">The Flow Editor is the visual workspace where blocks become a complete conversation tree.</p>
            <p>A block can define how it is reached, send one or more messages, wait for user input, require a fixed choice, store an answer, show rich content, redirect, end, or record unmatched replies for training.</p>
            <p>Use the canvas to understand the whole journey. Open a block only when you need to edit its settings.</p>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FpNBu4TvfWCcycFCsV2TNhW%2FwztV9BHHEUCDhSMyyss76Y_doc.png?alt=media&token=6a07451f-8711-459c-8a92-c9a29e80a2f8',
            'alt' => 'Open the Maxbot Flow Editor',
            'caption' => 'Open a topic’s Flow Editor to build its messages, inputs, branches, and outcomes.',
        ]],
    ],
    [
        'id' => 'blocks-tabs-actions',
        'title' => 'Blocks, tabs, and action buttons',
        'body' => <<<'HTML'
            <p>One block should represent one conversational moment. The main block areas are:</p>
            <ul>
                <li><strong>User Input:</strong> the quick reply button or card that opens this child block, plus optional matching rules for typed replies.</li>
                <li><strong>Bot Responses:</strong> one or more messages sent when the block is reached.</li>
                <li><strong>Next Step:</strong> how the conversation waits, stores, routes, joins, or ends.</li>
                <li><strong>Rich Content:</strong> cards, images, GIFs, YouTube videos, and links.</li>
                <li><strong>Training:</strong> unmatched-reply review when optional typed routing is used.</li>
            </ul>
            <p>Block action buttons let you zoom, collapse or expand, add a child block, and delete a block. Collapse finished branches in a large flow so the active area remains readable.</p>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FpNBu4TvfWCcycFCsV2TNhW%2FnqCKATgW5cqJ9D5VPWJkGR_doc.png?alt=media&token=9fcd5a91-2cf5-413c-ad4d-de09e7e40bea',
            'alt' => 'Add a button action in the Flow Editor',
            'caption' => 'Actions connect the current user choice to a child block or another supported outcome.',
        ]],
    ],
    [
        'id' => 'block-connections',
        'title' => 'How blocks work together',
        'body' => <<<'HTML'
            <p>Most flows use a parent-child structure. A parent asks a question; each child represents one recognized answer or selectable option.</p>
            <p>Example: a parent asks “How can I help?” and its children represent Pricing, Support, and Book a Demo. Child blocks may continue to their own children or redirect into a shared continuation.</p>
            <div class="docs-callout"><strong>Maintainable structure:</strong> use child blocks for genuinely different outcomes and joins for repeated downstream steps such as contact details or a shared confirmation.</div>
HTML,
    ],
    [
        'id' => 'user-input-tab',
        'title' => 'User Input tab',
        'body' => <<<'HTML'
            <p>The User Input tab defines the choice that leads from a parent block into the current child block. For most Maxbot conversations, start with one of the two guided formats:</p>
            <ul>
                <li><strong>Quick reply button:</strong> enter the short text displayed as a fixed choice.</li>
                <li><strong>Quick reply card:</strong> add the image, title, description, and button text that help the user choose.</li>
                <li><strong>Typed reply:</strong> optionally add trigger keywords and phrases when the user needs to type instead of selecting a guided choice.</li>
            </ul>
            <p>Do not confuse User Input with Next Step. User Input describes how the current block is reached; Next Step describes what happens after its responses are sent.</p>
HTML,
        'media_aside' => true,
        'media' => [[
            'src' => 'static/images/docs/user-input.png',
            'alt' => 'User Input tab in a Maxbot block',
            'caption' => 'Use the User Input tab on child blocks to configure the visible button, card, or optional typed-reply rule.',
        ]],
    ],
    [
        'id' => 'quick-reply-text',
        'title' => 'Quick reply buttons',
        'body' => <<<'HTML'
            <p>Quick reply text becomes a fixed button displayed to the user. Selecting that button takes the conversation directly into its child block, so the route is predictable and does not depend on typed wording.</p>
            <p>Use short, distinct labels such as <em>Yes</em>, <em>No</em>, <em>Contact Sales</em>, <em>Learn More</em>, or <em>Book a Demo</em>. Every visible button should lead to a useful response or next action.</p>
HTML,
        'media' => [[
            'src' => 'static/images/docs/quick-reply-text.png',
            'alt' => 'Quick reply text in Maxbot',
            'caption' => 'A child block’s quick reply text becomes the option displayed by its parent.',
        ]],
    ],
    [
        'id' => 'quick-reply-cards',
        'title' => 'Quick replies as cards',
        'body' => <<<'HTML'
            <p>Cards give the user more context before choosing. Each card can contain an <strong>image</strong>, <strong>title</strong>, <strong>short description</strong>, and <strong>button text</strong>.</p>
            <p>Use cards for products, services, plans, categories, or recommendations where a plain text button would not give enough information. The card button leads directly to its child block.</p>
            <div class="docs-callout"><strong>Keep the choice easy to scan.</strong> Use a clear image, a concise description, and action-oriented button text. Card choices do not require keyword priority.</div>
HTML,
        'media' => [[
            'src' => 'static/images/docs/quick-replies-as-cards.png',
            'alt' => 'Card-based quick reply configuration',
            'caption' => 'Use cards when an image and description materially help the user compare choices.',
        ]],
    ],
    [
        'id' => 'trigger-keywords',
        'title' => 'Trigger keywords and matching weight (optional)',
        'body' => <<<'HTML'
            <p>Use trigger keywords only when a step should accept a typed reply. Add the clear words and phrases that should route the user into this child block.</p>
            <p><strong>Matching weight:</strong> if typed phrases for two sibling blocks overlap, the higher weight is preferred. Keep this value simple and use distinct phrases whenever possible.</p>
HTML,
        'media' => [[
            'src' => 'static/images/docs/trigger-keywords.png',
            'alt' => 'Optional trigger keywords configured in Maxbot',
            'caption' => 'Typed-reply routing is available when a guided button or card is not appropriate for the step.',
        ]],
    ],
    [
        'id' => 'bot-responses',
        'title' => 'Bot messages and pacing',
        'body' => <<<'HTML'
            <p>The Bot Responses tab defines what Maxbot sends when the block is reached. A block can contain one or several messages.</p>
            <p>Split a heavy paragraph into a short sequence when that improves pacing:</p>
            <ul>
                <li>“Welcome to Maxbot.”</li>
                <li>“I can help with pricing, support, and bookings.”</li>
                <li>“What would you like to do?”</li>
            </ul>
            <p>Keep one idea per bubble, state the next expected action clearly, and do not repeat information already visible in the quick replies.</p>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FpNBu4TvfWCcycFCsV2TNhW%2FfkwfznfUw8SsTWWnwkzcPd_doc.png?alt=media&token=9b39b39c-9c7b-418c-b738-efd23dd261ea',
            'alt' => 'Enter a bot message in Maxbot',
            'caption' => 'Add the message or short message sequence the user should receive in this block.',
        ]],
    ],
    [
        'id' => 'message-variables',
        'title' => 'Variables in messages',
        'body' => <<<'HTML'
            <p>Reuse values captured earlier with their variable names, for example:</p>
            <p><span class="docs-code">Thanks @name. We will contact you at @email about @preferred_service.</span></p>
            <p>Variables can come from data entities, saved quick-reply selections, or raw free-text replies. Use stable names and verify the output in Test Flow when a value may be empty.</p>
            <div class="docs-callout"><strong>Personalize purposefully.</strong> Reuse a value when it confirms understanding or improves the next step, not in every message.</div>
HTML,
    ],
    [
        'id' => 'next-step-controls',
        'title' => 'What Next Step controls',
        'body' => <<<'HTML'
            <p>The Next Step tab controls what happens after the current block’s messages are sent. Maxbot can:</p>
            <ul>
                <li>Require the user to choose one of the available quick replies.</li>
                <li>Save the selected quick reply into the database.</li>
                <li>Wait for a reply and validate it with a data entity.</li>
                <li>Let child-block keywords decide the next route.</li>
                <li>Save the raw free-text reply.</li>
                <li>Join or redirect to another block.</li>
                <li>End the conversation.</li>
            </ul>
            <p>Choose one behavior based on what the conversation needs next. Do not leave a published block without a deliberate continuation or ending.</p>
HTML,
        'media' => [[
            'src' => 'static/images/docs/what-next-step-controls.png',
            'alt' => 'Next Step controls in Maxbot',
            'caption' => 'Next Step determines whether Maxbot waits, stores, routes, redirects, or ends.',
        ]],
    ],
    [
        'id' => 'require-quick-reply',
        'title' => 'Require a quick reply',
        'body' => <<<'HTML'
            <p>This mode prevents free typing and requires one of the child options. Use it for menus, surveys, support categories, product pickers, qualification, and other steps where reliable selection matters more than natural-language freedom.</p>
            <ol class="docs-steps">
                <li>Add one child block for every supported option.</li>
                <li>Set each child’s Quick Reply Text or card content.</li>
                <li>On the parent block, select the option that requires a quick reply.</li>
                <li>Save and test every button once.</li>
            </ol>
HTML,
    ],
    [
        'id' => 'save-selection',
        'title' => 'Save the user’s selection',
        'body' => <<<'HTML'
            <p>When quick reply mode is active, Maxbot can store the chosen label or value. This is useful for analytics, qualification, personalization, exports, and later workflow decisions.</p>
            <p>Choose a stable variable name such as <span class="docs-code">selected_plan</span>, <span class="docs-code">issue_type</span>, or <span class="docs-code">preferred_service</span>. Verify the value in Users Data and inside any later message that references it.</p>
HTML,
    ],
    [
        'id' => 'save-entity',
        'title' => 'Save a reply into a data entity',
        'body' => <<<'HTML'
            <p>Use this mode to collect a structured value such as name, email, phone, company, city, country, or a custom field.</p>
            <ol class="docs-steps">
                <li>Write a bot message that asks for one value.</li>
                <li>Open Next Step and choose to save the reply into an entity.</li>
                <li>Select the correct entity.</li>
                <li>Confirm its validation rule and validation message.</li>
                <li>Connect the block to the next question or ending.</li>
                <li>Test valid, invalid, corrected, and empty input.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'static/images/docs/save-reply-into-data-entity.png',
            'alt' => 'Save a user reply into a Maxbot data entity',
            'caption' => 'Choose the entity that should validate and store this answer.',
        ]],
    ],
    [
        'id' => 'keyword-flow',
        'title' => 'Optional: build a typed-reply flow',
        'body' => <<<'HTML'
            <p>Quick reply buttons and cards are the recommended choice for most branches. Use typed-reply routing only where visitors genuinely need to enter their own wording.</p>
            <ol class="docs-steps">
                <li>Create a parent block whose message asks an open question, such as “What can I help you with?”</li>
                <li>Add one child block per supported intent,for example Pricing, Support, and Book a Demo.</li>
                <li>Open each child’s User Input tab and enter realistic trigger keywords and phrases.</li>
                <li>Keep sibling phrase lists distinct so each typed reply has a clear destination.</li>
                <li>Return to the parent’s Next Step tab and choose the option that lets keywords decide which child block comes next.</li>
                <li>Write a helpful fallback message for inputs that match no child.</li>
                <li>Set a retry limit and a quick-replies prompt so repeated unmatched input converts into guided choices.</li>
                <li>Optionally save the raw reply for analysis or support context.</li>
                <li>Save the flow and test a direct keyword, a phrase, a spelling variation, and an unmatched message for every intent.</li>
                <li>After publishing, review Training and add genuine missing expressions to the correct child.</li>
            </ol>
            <div class="docs-callout success"><strong>Expected behavior:</strong> recognized text reaches the correct child, while unsupported text receives a guided recovery choice instead of a dead end.</div>
HTML,
        'media' => [[
            'src' => 'static/images/docs/keywords-decide-next-block.png',
            'alt' => 'Let keywords decide the next child block',
            'caption' => 'The parent waits for text while each child supplies the intent keywords used for matching.',
        ], [
            'src' => 'static/images/docs/trigger-keywords.png',
            'alt' => 'Example child-block trigger keywords',
            'caption' => 'Add the phrases real users use for this child’s intent, then test overlaps with its siblings.',
        ]],
    ],
    [
        'id' => 'fallback-retry',
        'title' => 'Fallback message, retry limit, and rescue prompt',
        'body' => <<<'HTML'
            <h3>Fallback message</h3>
            <p>The fallback is shown when no child keyword matches. It should explain what the user can do next: “I didn’t catch that. You can ask about pricing, support, or a demo.”</p>
            <h3>Retry limit</h3>
            <p>The retry limit prevents an endless loop. One or two free-text retries are usually enough before Maxbot switches to guided options.</p>
            <h3>Quick replies prompt</h3>
            <p>This prompt appears above the rescue choices after the retry limit, for example: “Please choose one of these options to continue.”</p>
            <div class="docs-callout warning"><strong>Never punish the user for a mismatch.</strong> Keep the message neutral, preserve any already captured data, and provide a clear way forward.</div>
HTML,
    ],
    [
        'id' => 'save-free-text',
        'title' => 'Save the user’s free-text reply',
        'body' => <<<'HTML'
            <p>Maxbot can store raw text even when the message is used for keyword routing. This supports lead qualification, support intake, later review, personalization, and analytics.</p>
            <p>Use a stable variable such as <span class="docs-code">user_question</span>, <span class="docs-code">company_need</span>, or <span class="docs-code">request_details</span>. Collect only text the business genuinely needs and protect it according to the site’s privacy policy.</p>
HTML,
    ],
    [
        'id' => 'join-redirect',
        'title' => 'Close the discussion or continue from another block',
        'body' => <<<'HTML'
            <p>In <strong>Next Step</strong>, choose <strong>End the conversation or jump to another block</strong>. The <strong>What happens next</strong> setting then gives you two simple choices:</p>
            <ul>
                <li><strong>Close the discussion</strong> when this branch is complete.</li>
                <li><strong>Continue from another block</strong> when the conversation should reuse an existing part of the flow.</li>
            </ul>
            <ol class="docs-steps">
                <li>Select the option to continue from another block.</li>
                <li>Choose a <strong>topic</strong> from the list. Maxbot then shows the available blocks in that topic.</li>
                <li>Use <strong>Expand</strong> to reveal a block’s children. Select it again to collapse them when you no longer need that part of the tree.</li>
                <li>Find the destination using the <strong>First bot message</strong> column, which is only a preview that helps you distinguish similar blocks.</li>
                <li>Choose the destination with the radio button in the <strong>Select</strong> column, then save the flow.</li>
                <li>Test the conversation from the branch that performs the jump and confirm it continues through the intended destination without creating a loop.</li>
            </ol>
            <div class="docs-callout"><strong>About “First bot message”:</strong> the text shown in that column is there to identify the block in the selection list; choosing the row does not send that preview by itself. The conversation follows the response and continuation configured for the selected block.</div>
HTML,
        'media' => [[
            'src' => 'static/images/docs/join-block-redirect-flow.png',
            'alt' => 'Join another block or redirect a Maxbot flow',
            'caption' => 'Choose a topic, expand its block tree, and use the Select column to choose where the conversation continues.',
        ]],
    ],
    [
        'id' => 'end-conversation',
        'title' => 'End the conversation',
        'body' => <<<'HTML'
            <p>End the conversation when the goal is complete, the bot has handed off the next action, or no additional input is required.</p>
            <p>The last bot message should confirm what happened and explain any next expectation: a form was saved, a link was provided, the team will follow up, or the user can reopen the launcher later.</p>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FpNBu4TvfWCcycFCsV2TNhW%2FjbJDbyv1T6f1oeZ9Rfo2iN_doc.png?alt=media&token=92cb76ba-e8bf-4c5b-84b6-b5d00125f157',
            'alt' => 'Configure the conversation end in Maxbot',
            'caption' => 'Give completed branches an explicit ending instead of leaving the next action undefined.',
        ]],
    ],
    [
        'id' => 'data-entities',
        'title' => 'Data entities',
        'body' => <<<'HTML'
            <p>Entities are structured fields used to validate, store, and reuse user information. Maxbot includes protected system entities for common values and supports custom entities for business-specific fields.</p>
            <ol class="docs-steps">
                <li>Open <strong>Entities</strong> and review the system fields.</li>
                <li>Select <strong>Add New Entity</strong> for a custom value.</li>
                <li>Enter a readable label and a stable variable name without spaces.</li>
                <li>Enable the appropriate validation rule and write an instructional validation message.</li>
                <li>Save the entity and select it in a block’s Next Step settings.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FoqiSUFtV1SR8qgw2WgiaxF%2Fdcwhk2wVnWu28ZP5ucZjQ4_doc.png?alt=media&token=4c97a87e-cb26-44b0-ba74-8803491727a7',
            'alt' => 'Open Entity Editor in Maxbot',
            'caption' => 'The Entities screen is the source of truth for structured fields used by conversation flows.',
        ], [
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FoqiSUFtV1SR8qgw2WgiaxF%2FtLWLmFtvbkAJWC6EgsaJXU_doc.png?alt=media&token=7b8a1ac1-d06d-4eb1-bdcc-237685f2464d',
            'alt' => 'Add a new custom entity in Maxbot',
            'caption' => 'Create custom entities only for fields not already covered by the protected system entities.',
        ]],
    ],
    [
        'id' => 'validation',
        'title' => 'Validation rules and reusable values',
        'body' => <<<'HTML'
            <p>Use built-in validation for email, phone, digits, alphabetic text, or alphanumeric values. Use a custom regular expression only when the built-in rules cannot describe the expected format.</p>
            <p>Write the error as an instruction: “Enter a valid email such as name@example.com” is more useful than “Invalid value.”</p>
            <p>After a value is stored, reuse it through its variable in later bot messages, joins, confirmations, and project outcomes.</p>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FoqiSUFtV1SR8qgw2WgiaxF%2F1pRR2s43uFAPRzysFP4JPe_doc.png?alt=media&token=84cdc8a0-40e5-4a5f-8b59-3e944e21c6a5',
            'alt' => 'Select an Alphabet validation option for a custom entity',
            'caption' => 'Choose the rule that reflects the accepted input and pair it with a helpful retry message.',
        ]],
    ],
    [
        'id' => 'users-data',
        'title' => 'Users Data',
        'body' => <<<'HTML'
            <p>Users Data contains values captured from entities, saved quick replies, and raw free-text answers. Use it to review submissions, verify mappings, follow up with leads, and inspect whether the conversation stored the intended fields.</p>
            <div class="docs-callout warning"><strong>Privacy:</strong> collect only necessary information, explain why it is requested, restrict administrator access, and apply the retention and deletion rules relevant to the business.</div>
HTML,
        'media_aside' => true,
        'media' => [[
            'src' => 'static/images/docs/users-data.png',
            'alt' => 'Users Data in Maxbot',
            'caption' => 'Confirm each captured value appears in the expected field after a complete test conversation.',
        ]],
    ],
    [
        'id' => 'data-capture-workflow',
        'title' => 'Complete data-capture workflow',
        'body' => <<<'HTML'
            <ol class="docs-steps">
                <li>Edit the Email system entity and add a useful validation message.</li>
                <li>Create a custom Country entity with variable <span class="docs-code">country</span>, Alphabet validation, and a clear retry message.</li>
                <li>Open a topic and ask for the user’s email.</li>
                <li>Save that reply into the Email entity.</li>
                <li>Add the next bot message, ask for a phone number, and save it into Phone.</li>
                <li>Add another message, ask for location, and save it into Country.</li>
                <li>Add a final thank-you message and reuse variables where helpful.</li>
                <li>End or redirect the conversation, then save the flow.</li>
                <li>Test valid and invalid values, publish the project, complete it on the website, and verify the record in Users Data.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FoqiSUFtV1SR8qgw2WgiaxF%2F2ibL6MhUKTPJ8Ysvmfa9HT_doc.png?alt=media&token=5ec5bbc3-fda4-4194-8212-5d9dc6eb24e7',
            'alt' => 'Open additional flow settings during the data-capture workflow',
            'caption' => 'Expand the flow controls to add the next question, storage rule, or ending.',
        ]],
    ],
    [
        'id' => 'rich-content',
        'title' => 'Rich Content tab',
        'body' => <<<'HTML'
            <p>Rich Content adds visual or actionable material to a block. Use it only when it improves understanding or gives the user a useful next action.</p>
            <p>Confirm every media URL is accessible, optimized for mobile, and appropriate for the site’s privacy and copyright requirements.</p>
HTML,
        'media' => [[
            'src' => 'static/images/docs/rich-content-overview.png',
            'alt' => 'Rich Content settings in Maxbot',
            'caption' => 'Add visual content after the block’s conversation and routing logic are clear.',
        ]],
    ],
    [
        'id' => 'rich-content-types',
        'title' => 'Cards, images, GIFs, YouTube, and links',
        'body' => <<<'HTML'
            <div class="docs-grid">
                <article class="docs-card"><h3>Cards</h3><p>Present products, plans, resources, or services with an image, title, description, and action.</p></article>
                <article class="docs-card"><h3>Images and GIFs</h3><p>Explain a visual state, demonstrate a short interaction, or give the conversation useful context. Optimize the file for mobile.</p></article>
                <article class="docs-card"><h3>YouTube videos</h3><p>Embed a longer walkthrough when the user needs a demonstration that would be inefficient as chat text.</p></article>
                <article class="docs-card"><h3>Clickable links</h3><p>Connect documentation, downloads, booking pages, product pages, or other trusted destinations.</p></article>
            </div>
            <ul>
                <li>Use descriptive titles and button labels.</li>
                <li>Do not hide required instructions only inside an image or video.</li>
                <li>Test links and media on mobile and desktop.</li>
                <li>Provide a text alternative when important information is visual.</li>
            </ul>
HTML,
        'media' => [[
            'src' => 'static/images/docs/cards.png',
            'alt' => 'Cards in Maxbot rich content',
            'caption' => 'Cards are most useful when the user needs context before opening or selecting an item.',
        ]],
    ],
    [
        'id' => 'test-flow',
        'title' => 'Test Flow',
        'body' => <<<'HTML'
            <p>The visual canvas shows structure; Test Flow shows the real conversation experience.</p>
            <ul>
                <li>Verify bot-message order and pacing.</li>
                <li>Select every quick reply and card action.</li>
                <li>If the flow accepts typed replies, test its phrases, unmatched text, fallback, and rescue choices.</li>
                <li>Submit valid and invalid entity values.</li>
                <li>Confirm variables render and rich content loads.</li>
                <li>Test every join from its source and every explicit ending.</li>
                <li>Reset between independent scenarios.</li>
            </ul>
HTML,
        'media' => [[
            'src' => 'static/images/docs/test-flow.png',
            'alt' => 'Test Flow in Maxbot',
            'caption' => 'Use the built-in conversation tester continuously while building, not only before launch.',
        ]],
    ],
    [
        'id' => 'training',
        'title' => 'Training and improvement',
        'body' => <<<'HTML'
            <p>Training surfaces replies that failed to match a child block. These records show how users actually describe their needs and where the current keyword coverage or prompt is weak.</p>
            <ol class="docs-steps">
                <li>Review unmatched replies regularly.</li>
                <li>Decide whether the reply belongs to an existing intent, reveals a missing branch, or indicates an unclear prompt.</li>
                <li>Add precise expressions to the correct child rather than making every keyword group broader.</li>
                <li>Replace repeated difficult free-text steps with guided choices when appropriate.</li>
                <li>Retest overlaps, fallbacks, and the updated branch before publishing again.</li>
            </ol>
HTML,
        'media' => [[
            'src' => 'static/images/docs/reviewing-unmatched-replies.png',
            'alt' => 'Review unmatched replies in Maxbot Training',
            'caption' => 'Unmatched real replies are the best evidence for improving prompts and keyword coverage.',
        ]],
    ],
    [
        'id' => 'projects',
        'title' => 'Projects',
        'body' => <<<'HTML'
            <p>A project is the deployment layer that connects an agent and conversation flow to a website location or supported channel.</p>
            <ol class="docs-steps">
                <li>Open <strong>Projects</strong> and select <strong>Add New Project</strong>.</li>
                <li>Enter a recognizable name.</li>
                <li>Select the conversation flow and agent.</li>
                <li>Configure the trigger and any applicable message or matching options.</li>
                <li>Select the website pages or channel location.</li>
                <li>Save, test in context, and enable the project.</li>
            </ol>
            <div class="docs-callout"><strong>Project conflicts are channel-aware.</strong> Website and add-on projects can coexist when they use their own applicable types, triggers, and locations.</div>
HTML,
        'media' => [[
            'src' => 'https://storage.app.guidde.com/v0/b/guidde-production.appspot.com/o/quickguiddeScreenshots%2FljkrEbGt9Zes1prWqdafa124pap1%2FpNBu4TvfWCcycFCsV2TNhW%2FsV1954tkeHqyfgWp1MPqMF_doc.png?alt=media&token=be813771-2b08-456b-b947-edf1a104552b',
            'alt' => 'Interact with a published Maxbot project on a website page',
            'caption' => 'After assigning the flow and pages, verify the published experience on the real frontend.',
        ]],
    ],
    [
        'id' => 'widget-triggers',
        'title' => 'Widget customization and triggers',
        'body' => <<<'HTML'
            <h3>Widget customization</h3>
            <ul>
                <li>Write a short greeting that explains what the assistant can do.</li>
                <li>Choose text and secondary colors with sufficient contrast.</li>
                <li>Select a layout and placement that do not cover important page controls.</li>
                <li>Keep the main launcher prominent and additional channel buttons smaller.</li>
                <li>Show secondary labels as tooltips rather than permanently covering the page.</li>
            </ul>
            <h3>Triggers</h3>
            <p>Only relevant triggers should appear. If the site has only a WhatsApp project, the floating interface should show only WhatsApp. If it has the core web chat, the native Maxbot launcher should open the assigned flow.</p>
HTML,
    ],
    [
        'id' => 'publish-checklist',
        'title' => 'Publish checklist',
        'body' => <<<'HTML'
            <ul>
                <li>The intended agent, topic, flow, and project are selected.</li>
                <li>All quick replies, cards, validations, shared continuations, and endings have been tested.</li>
                <li>Any optional typed-reply routes, fallbacks, and retries have also been tested.</li>
                <li>Variables render correctly and Users Data receives the intended fields.</li>
                <li>Placeholder content, sample data, broken links, and inaccessible media have been removed.</li>
                <li>The project is enabled only on the intended pages or channel.</li>
                <li>The widget is readable and usable on desktop and mobile.</li>
                <li>Privacy messaging, consent, access, and retention are appropriate for the captured data.</li>
                <li>The site and database have a current backup.</li>
            </ul>
HTML,
    ],
    [
        'id' => 'use-cases',
        'title' => 'Real use cases',
        'body' => <<<'HTML'
            <div class="docs-grid">
                <article class="docs-card"><h3>Lead generation</h3><p>Collect name, email, phone, service interest, budget, and project details through short validated questions.</p></article>
                <article class="docs-card"><h3>FAQ and help center</h3><p>Use guided categories, quick reply buttons, cards, links, and tutorials to lead users to the right answer.</p></article>
                <article class="docs-card"><h3>Product recommendation</h3><p>Use quick replies or cards to narrow preferences, save choices, and produce a personalized outcome.</p></article>
                <article class="docs-card"><h3>Support intake</h3><p>Classify the issue, capture identifiers and a description, link resources, and reduce manual back-and-forth.</p></article>
                <article class="docs-card"><h3>Booking or demo request</h3><p>Collect contact details, preferred service, date/time preferences, and a request summary.</p></article>
                <article class="docs-card"><h3>Documentation assistant</h3><p>Help users choose a subject, understand setup steps, and reach the correct guide, link, or video.</p></article>
            </div>
HTML,
    ],
    [
        'id' => 'best-practices',
        'title' => 'Best practices',
        'body' => <<<'HTML'
            <ul>
                <li><strong>Keep each topic focused:</strong> one main objective is easier to build, test, and improve.</li>
                <li><strong>Use guided choices when reliability matters:</strong> reserve free text for situations that need flexibility.</li>
                <li><strong>Write like a chat:</strong> use short bubbles, clear prompts, and one idea at a time.</li>
                <li><strong>Always provide a way forward:</strong> fallbacks should guide, retries should end, and every button should work.</li>
                <li><strong>Store data intentionally:</strong> save business-relevant values instead of creating a noisy dataset.</li>
                <li><strong>Review optional typed routing when used:</strong> unmatched replies reveal missing expressions or a step that would work better as guided choices.</li>
                <li><strong>Test frequently:</strong> the Flow Editor is for structure; the test widget and published page reveal the real experience.</li>
            </ul>
HTML,
    ],
    [
        'id' => 'integrations-addons',
        'title' => 'Integrations and add-ons',
        'body' => <<<'HTML'
            <p>Integrations connect Maxbot flows to additional channels or external systems. Add-ons are modular products that extend the core builder without forcing every advanced feature into the base plugin.</p>
            <p>Current add-ons may introduce another communication channel, while future directions can include broader automation, analytics, lead handling, premium content, or AI-assisted capabilities. Availability depends on the installed product and version.</p>
            <div class="docs-callout"><strong>Product boundary:</strong> this guide documents the earlier full builder. WhatsApp credentials, webhooks, production numbers, templates, and channel-specific troubleshooting are covered in the separate <a href="docs-whatsapp.php">WhatsApp Add-on documentation</a>.</div>
HTML,
    ],
    [
        'id' => 'backup-uninstall',
        'title' => 'Backup, updates, and uninstall',
        'body' => <<<'HTML'
            <ul>
                <li>Back up important projects, flows, configuration, and captured user data before an update or removal.</li>
                <li>Test updates on staging and complete an existing flow before moving the update to production.</li>
                <li>Do not treat plugin deactivation as a data backup.</li>
                <li>Review the supported uninstall or cleanup setting before deleting Maxbot when data should be removed.</li>
                <li>Use the supported cleanup path or product support instead of deleting unknown database records manually.</li>
                <li>Remove or reconfigure dependent add-ons before permanently removing Maxbot Core.</li>
            </ul>
HTML,
    ],
];

include __DIR__ . '/partials/docs-renderer.php';
