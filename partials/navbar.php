<?php
$navCurrent = $navCurrent ?? '';

$navItem = static function (string $slug, string $label) use ($navCurrent): string {
    $active = $navCurrent === $slug ? ' is-active' : '';

    return '<a class="nav-link' . $active . '" href="' . mb_e(mb_url($slug)) . '">' . mb_e($label) . '</a>';
};
?>
<header class="nav" data-nav>
    <div class="container nav-inner">
        <a class="nav-logo" href="<?php echo mb_e(mb_url()); ?>" aria-label="Maxbot home">
            <img src="<?php echo mb_e(mb_url('content/logo.png')); ?>" alt="Maxbot"
                 style="filter: brightness(0) saturate(100%);">
        </a>

        <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-label="Open menu">
            <?php echo mb_icon('menu'); ?>
        </button>

        <div class="nav-panel">
        <nav class="nav-links" aria-label="Main">
            <?php echo $navItem('features', 'Features'); ?>
            <?php echo $navItem('templates', 'Templates'); ?>

            <div class="nav-drop">
                <a class="nav-link<?php echo in_array($navCurrent, ['whatsapp', 'integrations'], true) ? ' is-active' : ''; ?>"
                   href="<?php echo mb_e(mb_url('integrations')); ?>">
                    Channels <?php echo mb_icon('chevron-down'); ?>
                </a>
                <div class="nav-menu">
                    <a href="<?php echo mb_e(mb_url('whatsapp')); ?>">
                        <span class="mi"><?php echo mb_icon('whatsapp'); ?></span>
                        <span>
                            <strong>WhatsApp Integration</strong>
                            <span>Answer WhatsApp messages with a Maxbot flow, on the official Cloud API.</span>
                        </span>
                    </a>
                    <a href="<?php echo mb_e(mb_url('integrations')); ?>">
                        <span class="mi"><?php echo mb_icon('layers'); ?></span>
                        <span>
                            <strong>All channels</strong>
                            <span>What ships today, and what is on the roadmap.</span>
                        </span>
                    </a>
                </div>
            </div>

            <?php echo $navItem('use-cases', 'Use cases'); ?>

            <div class="nav-drop">
                <a class="nav-link<?php echo in_array($navCurrent, ['docs', 'tutorials'], true) ? ' is-active' : ''; ?>"
                   href="<?php echo mb_e(mb_url('docs')); ?>">
                    Learn <?php echo mb_icon('chevron-down'); ?>
                </a>
                <div class="nav-menu">
                    <a href="<?php echo mb_e(mb_url('docs-core')); ?>">
                        <span class="mi"><?php echo mb_icon('box'); ?></span>
                        <span>
                            <strong>Core documentation</strong>
                            <span>Install, build flows, capture data, publish the widget.</span>
                        </span>
                    </a>
                    <a href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">
                        <span class="mi"><?php echo mb_icon('whatsapp'); ?></span>
                        <span>
                            <strong>WhatsApp documentation</strong>
                            <span>Meta app, webhook, projects, production, templates.</span>
                        </span>
                    </a>
                    <a href="<?php echo mb_e(mb_url('tutorials')); ?>">
                        <span class="mi"><?php echo mb_icon('play'); ?></span>
                        <span>
                            <strong>Video tutorials</strong>
                            <span>Watch the build, step by step.</span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="nav-cta">
            <a class="btn btn--ghost btn--sm" href="<?php echo mb_e(mb_url('templates')); ?>">Browse templates</a>
            <a class="btn btn--primary btn--sm" href="<?php echo mb_e(MAXBOT_CORE_BUY_URL); ?>">Get Maxbot</a>
        </div>
        </div>
    </div>
</header>
<main id="main">
