<div class="eyebrow">Choose your edition</div>
<h2 class="h-1">Three ways to build with Maxbot.</h2>
<p class="lede" style="margin:18px 0 28px;">Distribution and billing are shown below. Listings and checkouts will be linked when available.</p>
<div class="grid grid-3 edition-grid">
<?php foreach (mb_editions() as $key => $edition): ?>
    <article class="card edition-card">
        <span class="tag tag--core"><?php echo mb_e($edition['status']); ?></span>
        <h3 class="h-3"><?php echo mb_e($edition['name']); ?></h3>
        <p><strong><?php echo mb_e($edition['billing']); ?></strong></p>
        <p>Planned distribution: <?php echo mb_e($edition['channel']); ?>.</p>
        <?php if ($key !== 'pro'): ?><p>No product-license verification or per-project licensing.</p><?php endif; ?>
        <?php if ($key === 'free'): ?>
            <a class="btn btn--ghost" href="<?php echo mb_e(mb_url('docs-free')); ?>">Read the Free guide</a>
        <?php else: echo mb_edition_cta($key); endif; ?>
    </article>
<?php endforeach; ?>
</div>
<p class="small" style="margin-top:22px;">Lifetime access for Standard describes the purchase model; it does not promise lifetime support, updates or hosted services. Website allowances and marketplace terms are separate from project functionality. Free and Standard use the Free service; service authentication remains separate from product licensing.</p>
