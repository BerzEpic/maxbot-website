</main>

<footer class="foot">
    <div class="container">
        <div class="foot-cta">
            <div>
                <h2 class="h-2">Build the conversation once.<br>Let it answer every night.</h2>
                <p class="lede" style="margin-top:14px;max-width:52ch;">
                    Maxbot Core runs inside WordPress. Add the WhatsApp Integration when you want the same
                    flow answering on WhatsApp.
                </p>
            </div>
            <div class="btn-row" style="justify-content:flex-end;">
                <a class="btn btn--signal" href="<?php echo mb_e(MAXBOT_CORE_BUY_URL); ?>">
                    Get Maxbot Core <?php echo mb_icon('arrow-right'); ?>
                </a>
                <a class="btn btn--onink" href="<?php echo mb_e(mb_url('templates')); ?>">Browse templates</a>
            </div>
        </div>

        <div class="foot-grid">
            <div>
                <div class="foot-logo"><img src="<?php echo mb_e(mb_url('content/logo.png')); ?>" alt="Maxbot"></div>
                <p class="small" style="margin-top:16px;max-width:34ch;">
                    A native WordPress chatbot builder for guided conversations, quick replies, cards,
                    validated data capture, a website widget, and official WhatsApp Cloud API automation.
                </p>
            </div>

            <div>
                <h5>Product</h5>
                <ul>
                    <li><a href="<?php echo mb_e(mb_url('features')); ?>">Features</a></li>
                    <li><a href="<?php echo mb_e(mb_url('templates')); ?>">Templates</a></li>
                    <li><a href="<?php echo mb_e(mb_url('use-cases')); ?>">Use cases</a></li>
                    <li><a href="<?php echo mb_e(mb_url('features')); ?>#licensing">Licensing</a></li>
                </ul>
            </div>

            <div>
                <h5>Channels</h5>
                <ul>
                    <li><a href="<?php echo mb_e(mb_url('features')); ?>#widget">Website widget</a></li>
                    <li><a href="<?php echo mb_e(mb_url('whatsapp')); ?>">WhatsApp Integration</a></li>
                    <li><a href="<?php echo mb_e(mb_url('integrations')); ?>">Roadmap</a></li>
                </ul>
            </div>

            <div>
                <h5>Learn</h5>
                <ul>
                    <li><a href="<?php echo mb_e(mb_url('docs-core')); ?>">Core docs</a></li>
                    <li><a href="<?php echo mb_e(mb_url('docs-whatsapp')); ?>">WhatsApp docs</a></li>
                    <li><a href="<?php echo mb_e(mb_url('tutorials')); ?>">Tutorials</a></li>
                </ul>
            </div>
        </div>

        <div class="foot-bottom">
            <div>&copy; <?php echo mb_e(MAXBOT_YEAR); ?> <?php echo mb_e(MAXBOT_SITE_NAME); ?>. All rights reserved.</div>
        </div>
    </div>
</footer>

<?php //include __DIR__ . '/live-widget.php'; ?>
</body>
</html>
