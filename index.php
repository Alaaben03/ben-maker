<?php
require_once __DIR__ . '/includes/functions.php';
$page_title = 'Shop';

// Optional category filter + search.
$category = isset($_GET['cat']) && $_GET['cat'] !== '' ? $_GET['cat'] : null;
$search = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($search !== '') {
    $stmt = db()->prepare('SELECT * FROM products WHERE name LIKE ? OR description LIKE ? ORDER BY created_at DESC');
    $stmt->execute(['%' . $search . '%', '%' . $search . '%']);
    $products = $stmt->fetchAll();
} else {
    $products = get_products($category);
}

// Distinct categories for the filter chips.
$categories = db()->query('SELECT DISTINCT category FROM products WHERE category IS NOT NULL AND category <> "" ORDER BY category')->fetchAll(PDO::FETCH_COLUMN);

require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="container hero-inner">
        <div class="hero-copy">
            <span class="eyebrow">3D Printed · Made to order</span>
            <h1>Unique things, printed layer by layer.</h1>
            <p class="lead"><?= e(SITE_TAGLINE) ?>. Browse the collection and message me to order any piece — custom colors and sizes welcome.</p>
            <div class="hero-actions">
                <a href="#shop" class="btn btn-primary">Browse products</a>
                <a href="contact.php" class="btn btn-ghost">Request a custom print</a>
            </div>
        </div>
    </div>
</section>

<section class="section" id="shop">
    <div class="container">
        <div class="section-head">
            <h2>Products</h2>
            <form class="search" method="get" action="index.php" role="search">
                <input type="search" name="q" placeholder="Search products…" value="<?= e($search) ?>" aria-label="Search products">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>

        <?php if (!empty($categories)): ?>
        <div class="chips">
            <a href="index.php" class="chip <?= !$category && $search === '' ? 'active' : '' ?>">All</a>
            <?php foreach ($categories as $c): ?>
                <a href="index.php?cat=<?= urlencode($c) ?>" class="chip <?= $category === $c ? 'active' : '' ?>"><?= e($c) ?></a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (empty($products)): ?>
            <p class="muted empty">No products found. Please check back soon.</p>
        <?php else: ?>
        <div class="grid products">
            <?php foreach ($products as $p): ?>
                <?php
                    $img = $p['image'] ? UPLOAD_URL . $p['image'] : 'assets/img/placeholder.png';
                ?>
                <article class="card product-card"
                         tabindex="0"
                         role="button"
                         aria-label="View details for <?= e($p['name']) ?>"
                         data-id="<?= (int) $p['id'] ?>"
                         data-name="<?= e($p['name']) ?>"
                         data-price="<?= e(money($p['price'])) ?>"
                         data-category="<?= e($p['category']) ?>"
                         data-image="<?= e($img) ?>"
                         data-description="<?= e($p['description']) ?>">
                    <div class="product-thumb">
                        <img src="<?= e($img) ?>" alt="<?= e($p['name']) ?>" loading="lazy">
                        <?php if ($p['category']): ?><span class="badge"><?= e($p['category']) ?></span><?php endif; ?>
                    </div>
                    <div class="product-body">
                        <h3><?= e($p['name']) ?></h3>
                        <p class="price"><?= e(money($p['price'])) ?></p>
                        <span class="view-link">View details</span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Product detail modal -->
<div class="modal" id="product-modal" aria-hidden="true">
    <div class="modal-backdrop" data-close></div>
    <div class="modal-dialog" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <button class="modal-close" type="button" data-close aria-label="Close">&times;</button>
        <div class="modal-grid">
            <div class="modal-media">
                <img id="modal-image" src="" alt="">
            </div>
            <div class="modal-info">
                <span class="badge" id="modal-category"></span>
                <h2 id="modal-title"></h2>
                <p class="price big" id="modal-price"></p>
                <p class="modal-desc" id="modal-description"></p>

                <form class="order-form" id="order-form" autocomplete="on">
                    <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                    <input type="hidden" name="product_id" id="order-product-id" value="">
                    <input type="hidden" name="product" id="order-product-name" value="">
                    <p class="order-hint">Leave your name and phone — we&apos;ll call you to confirm.</p>
                    <div class="two-col">
                        <div class="field">
                            <label for="order-name">Your name</label>
                            <input id="order-name" name="name" type="text" required>
                        </div>
                        <div class="field">
                            <label for="order-phone">Phone</label>
                            <input id="order-phone" name="phone" type="tel" required>
                        </div>
                    </div>
                    <p class="order-error" id="order-error" hidden></p>
                    <button type="submit" class="btn btn-primary btn-block" id="order-submit">Order now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Order confirmation popup -->
<div class="modal" id="success-modal" aria-hidden="true">
    <div class="modal-backdrop" data-close-success></div>
    <div class="modal-dialog success-dialog" role="dialog" aria-modal="true" aria-labelledby="success-title">
        <div class="success-body">
            <div class="success-check" aria-hidden="true">
                <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            </div>
            <h2 id="success-title">Congratulations!</h2>
            <p>Your order has been sent successfully. We&apos;ll call you soon to confirm the details.</p>
            <button class="btn btn-primary" type="button" data-close-success>Great, thanks!</button>
        </div>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
