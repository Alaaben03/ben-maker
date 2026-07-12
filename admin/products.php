<?php
require_once __DIR__ . '/auth.php';

// Handle delete (POST for safety + CSRF).
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    check_csrf();
    $id = (int) ($_POST['id'] ?? 0);
    $product = get_product($id);
    if ($product) {
        if ($product['image'] && is_file(UPLOAD_DIR . $product['image'])) {
            @unlink(UPLOAD_DIR . $product['image']);
        }
        $stmt = db()->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$id]);
    }
    redirect('products.php?deleted=1');
}

$admin_title = 'Products';
require __DIR__ . '/admin-header.php';
$products = get_products();
?>
<div class="page-actions">
    <p class="muted"><?= count($products) ?> product<?= count($products) === 1 ? '' : 's' ?></p>
    <a href="product-edit.php" class="btn btn-primary">+ Add product</a>
</div>

<?php if (isset($_GET['deleted'])): ?><div class="alert success">Product deleted.</div><?php endif; ?>
<?php if (isset($_GET['saved'])): ?><div class="alert success">Product saved.</div><?php endif; ?>

<?php if (empty($products)): ?>
    <div class="card panel"><p class="muted">No products yet. Click “Add product” to create your first one.</p></div>
<?php else: ?>
<div class="card table-wrap">
    <table class="table">
        <thead>
            <tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th class="ta-right">Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
                <?php $img = $p['image'] ? '../' . UPLOAD_URL . $p['image'] : '../assets/img/placeholder.png'; ?>
                <tr>
                    <td><img class="row-thumb" src="<?= e($img) ?>" alt="<?= e($p['name']) ?>"></td>
                    <td><strong><?= e($p['name']) ?></strong></td>
                    <td><?= e($p['category']) ?></td>
                    <td class="nowrap"><?= e(money($p['price'])) ?></td>
                    <td class="ta-right nowrap">
                        <a href="product-edit.php?id=<?= (int) $p['id'] ?>" class="btn btn-ghost btn-sm">Edit</a>
                        <form method="post" action="products.php" class="inline" onsubmit="return confirm('Delete this product? This cannot be undone.');">
                            <?= csrf_field() ?>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= (int) $p['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<?php require __DIR__ . '/admin-footer.php'; ?>
