<?php
$admin_title = 'Dashboard';
require __DIR__ . '/admin-header.php';

$productCount = (int) db()->query('SELECT COUNT(*) FROM products')->fetchColumn();
$messageCount = (int) db()->query('SELECT COUNT(*) FROM messages')->fetchColumn();
$unreadCount  = unread_count();
$recent = db()->query('SELECT * FROM messages ORDER BY created_at DESC LIMIT 5')->fetchAll();
$latestProducts = db()->query('SELECT * FROM products ORDER BY created_at DESC LIMIT 5')->fetchAll();
?>
<div class="stat-grid">
    <div class="card stat">
        <span class="stat-label">Products</span>
        <span class="stat-value"><?= $productCount ?></span>
        <a href="products.php" class="stat-link">Manage products</a>
    </div>
    <div class="card stat">
        <span class="stat-label">Total messages</span>
        <span class="stat-value"><?= $messageCount ?></span>
        <a href="messages.php" class="stat-link">View inbox</a>
    </div>
    <div class="card stat">
        <span class="stat-label">Unread messages</span>
        <span class="stat-value"><?= $unreadCount ?></span>
        <a href="messages.php" class="stat-link">Read now</a>
    </div>
    <div class="card stat highlight">
        <span class="stat-label">Quick action</span>
        <a href="product-edit.php" class="btn btn-primary" style="margin-top:.6rem">+ Add new product</a>
    </div>
</div>

<div class="two-panel">
    <section class="card panel">
        <div class="panel-head">
            <h2>Recent messages</h2>
            <a href="messages.php" class="stat-link">All</a>
        </div>
        <?php if (empty($recent)): ?>
            <p class="muted">No messages yet.</p>
        <?php else: ?>
            <ul class="mini-list">
                <?php foreach ($recent as $m): ?>
                    <li>
                        <div>
                            <strong><?= e($m['name']) ?></strong>
                            <?php if (!$m['is_read']): ?><span class="pill">new</span><?php endif; ?>
                            <div class="muted small"><?= e(mb_strimwidth($m['subject'] ?: $m['body'], 0, 48, '…')) ?></div>
                        </div>
                        <a href="messages.php" class="btn btn-ghost btn-sm">Open</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>

    <section class="card panel">
        <div class="panel-head">
            <h2>Latest products</h2>
            <a href="products.php" class="stat-link">All</a>
        </div>
        <?php if (empty($latestProducts)): ?>
            <p class="muted">No products yet. <a href="product-edit.php">Add one</a>.</p>
        <?php else: ?>
            <ul class="mini-list">
                <?php foreach ($latestProducts as $p): ?>
                    <li>
                        <div>
                            <strong><?= e($p['name']) ?></strong>
                            <div class="muted small"><?= e(money($p['price'])) ?> · <?= e($p['category']) ?></div>
                        </div>
                        <a href="product-edit.php?id=<?= (int) $p['id'] ?>" class="btn btn-ghost btn-sm">Edit</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
</div>
<?php require __DIR__ . '/admin-footer.php'; ?>
