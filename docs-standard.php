<?php
$docVersion = 'Edition guide';
$docKind = 'Maxbot Standard';
$docRoute = 'docs-standard';
$pageTitle = 'Maxbot Standard | Edition and installation guide';
$pageDescription = 'Understand Maxbot Standard: planned CodeCanyon distribution, one-time purchase, lifetime access and no per-project licensing.';
$heroTitle = 'Get to know Maxbot Standard.';
$heroText = 'The one-time purchase edition, planned for CodeCanyon. Start with its commercial model and installation preparation while edition-specific feature documentation is being finalized.';
$heroBadges = ['Standard edition', 'One-time purchase', 'Planned for CodeCanyon'];
$nextPage = ['href' => 'docs.php', 'label' => 'Return to all edition guides'];
$docGroups = [['title' => 'Standard essentials', 'items' => [
    ['id' => 'overview', 'title' => 'Edition and availability'],
    ['id' => 'licensing', 'title' => 'Purchase and service access'],
    ['id' => 'installation', 'title' => 'Installation preparation'],
    ['id' => 'guides', 'title' => 'Choose applicable instructions'],
]]];
$docSections = [
    ['id' => 'overview', 'title' => 'Edition and availability', 'body' => '<p>Maxbot Standard is planned for distribution through CodeCanyon as a one-time purchase with lifetime access. It is distinct from Maxbot Free and from the monthly Maxbot Pro subscription planned for this website using Freemius.</p><p>The website does not currently link to a Standard checkout. Use a Standard launch-notification button for Standard availability updates. Pro launch requests are separate.</p>'],
    ['id' => 'licensing', 'title' => 'Purchase and service access', 'body' => '<p>Standard uses maxbot-saas-rest-api-free, without product-license verification or per-project licensing. You do not need purchase-code authorization to use Standard. Legitimate service authentication may still be required by its API connection.</p><p>The one-time purchase model does not specify website allowances or promise lifetime support, updates or hosted-service availability. Consult the terms supplied with the release. Do not use the old Regular/Extended project-quota table to decide what this edition permits.</p>'],
    ['id' => 'installation', 'title' => 'Installation preparation', 'body' => '<ol class="docs-steps"><li>Obtain an official Standard release when available and check its included WordPress/PHP requirements. Do not infer them from an older guide or another edition.</li><li>Back up your WordPress files and database and prepare a staging site.</li><li>Locate the installable plugin ZIP inside the download. In WordPress, use Plugins → Add New Plugin → Upload Plugin, install that ZIP and activate it.</li><li>Confirm the active plugin name and version, then use the instructions bundled with that release for configuration, saving, testing and publishing.</li></ol><p>Detailed feature instructions will accompany the Standard release.</p>'],
    ['id' => 'guides', 'title' => 'Choose applicable instructions', 'body' => '<p>The earlier full-builder reference is retained at the established docs-core URL. Its screenshots and advanced screens describe that earlier interface, not a confirmed Standard or Pro feature list. Use it only for screens that match your installed release.</p><p>If you are using the simplified Free interface, choose the dedicated Maxbot Free guide. For WhatsApp, use the separate add-on guide and check compatibility with your installed versions. This guide does not establish add-on pricing or entitlement.</p>'],
];
include __DIR__ . '/partials/docs-renderer.php';
