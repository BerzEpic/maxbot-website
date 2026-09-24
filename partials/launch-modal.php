<dialog id="launch-dialog" class="launch-dialog" aria-labelledby="launch-title" aria-describedby="launch-description">
    <div class="launch-inner">
        <button class="launch-close" type="button" data-launch-close aria-label="Close launch notification form">&times;</button>
        <p class="eyebrow" id="launch-edition-label">Maxbot Pro · Coming soon</p>
        <h2 id="launch-title" class="h-2" tabindex="-1">Be first to know when Maxbot Pro launches</h2>
        <p id="launch-description">Maxbot Pro is on the way. Leave your email and we’ll let you know as soon as it’s available.</p>
        <form id="launch-form" action="<?php echo mb_e(mb_url('api/launch-interest.php')); ?>" method="post" novalidate>
            <input type="hidden" name="edition" value="pro">
            <label for="launch-email">Email address</label>
            <input id="launch-email" name="email" type="email" autocomplete="email" maxlength="254" required placeholder="you@example.com" aria-describedby="launch-email-error">
            <p id="launch-email-error" class="launch-field-error"></p>
            <label class="launch-consent" for="launch-consent">
                <input id="launch-consent" name="consent" type="checkbox" required aria-describedby="launch-consent-error">
                <span id="launch-consent-copy">I agree to receive emails about the Maxbot Pro launch.</span>
            </label>
            <p id="launch-consent-error" class="launch-field-error"></p>
            <p class="small">Read our <a class="textlink" href="<?php echo mb_e(mb_url('privacy-policy')); ?>" target="_blank" rel="noopener">privacy policy<span class="sr-only"> (opens in a new tab)</span></a>. This request covers the selected edition’s launch only.</p>
            <div class="btn-row">
                <button class="btn btn--primary" type="submit" id="launch-submit">Notify me at launch</button>
                <button class="btn btn--ghost" type="button" data-launch-close>Not now</button>
            </div>
        </form>
        <p id="launch-result" class="launch-result" role="status" aria-live="polite" aria-atomic="true"></p>
    </div>
</dialog>
<noscript><div class="container callout">Launch notification forms need JavaScript. Enable it to use the notification buttons. You can still read all documentation.</div></noscript>
