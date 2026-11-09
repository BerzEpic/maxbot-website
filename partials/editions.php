<div class="eyebrow">Choose your edition</div>
<h2 class="h-1">Choose the Maxbot edition that fits your project.</h2>
<p class="lede" style="margin:18px 0 28px;">Free is separate from Maxbot Pro. The Professional plan is sold through secure Freemius Checkout.</p>
<div class="grid grid-2 edition-grid">
<?php foreach (mb_editions() as $key => $edition): ?>
    <article class="card edition-card">
        <span class="tag tag--core"><?php echo mb_e($edition['status']); ?></span>
        <h3 class="h-3"><?php echo mb_e($edition['name']); ?></h3>
        <p><strong><?php echo mb_e($edition['billing']); ?></strong></p>
        <p>Distribution: <?php echo mb_e($edition['channel']); ?>.</p>
        <?php if ($key !== 'pro'): ?><p>No product-license verification or per-project licensing.</p><?php endif; ?>
        <?php if ($key === 'free'): ?>
            <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('docs-free')); ?>">Read the Free guide</a>
        <?php else: echo mb_edition_cta($key); endif; ?>
    </article>
<?php endforeach; ?>
</div>
<p class="small" style="margin-top:22px;">Maxbot Free uses its separate Free service. Maxbot Pro Professional uses Freemius licensing for WordPress installations. Sandbox purchases are for testing only; plan availability, billing and final price are confirmed in checkout.</p>
