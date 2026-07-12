<?php
require_once __DIR__ . '/auth.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$editing = $id > 0;
$product = $editing ? get_product($id) : null;
if ($editing && !$product) {
    redirect('products.php');
}

$errors = [];
$values = [
    'name'        => $product['name']        ?? '',
    'category'    => $product['category']    ?? '',
    'price'       => $product['price']       ?? '',
    'description' => $product['description'] ?? '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_csrf();
    $values['name']        = trim($_POST['name'] ?? '');
    $values['category']    = trim($_POST['category'] ?? '');
    $values['price']       = trim($_POST['price'] ?? '');
    $values['description'] = trim($_POST['description'] ?? '');

    if ($values['name'] === '') $errors[] = 'Product name is required.';
    if (!is_numeric($values['price']) || (float) $values['price'] < 0) $errors[] = 'Enter a valid price (numbers only).';

    $newImage = handle_image_upload('image');
    if (!empty($_FILES['image']['name']) && $newImage === null && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $errors[] = 'Image upload failed. Use JPG, PNG, WEBP or GIF up to 5 MB.';
    }

    if (!$errors) {
        if ($editing) {
            $image = $product['image'];
            if ($newImage) {
                if ($image && is_file(UPLOAD_DIR . $image)) @unlink(UPLOAD_DIR . $image);
                $image = $newImage;
            }
            $stmt = db()->prepare('UPDATE products SET name=?, category=?, price=?, description=?, image=? WHERE id=?');
            $stmt->execute([$values['name'], $values['category'] ?: 'General', (float) $values['price'], $values['description'], $image, $id]);
        } else {
            $stmt = db()->prepare('INSERT INTO products (name, category, price, description, image) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$values['name'], $values['category'] ?: 'General', (float) $values['price'], $values['description'], $newImage]);
        }
        redirect('products.php?saved=1');
    }
}

$admin_title = $editing ? 'Edit product' : 'Add product';
require __DIR__ . '/admin-header.php';
$currentImg = ($product['image'] ?? '') ? '../' . UPLOAD_URL . $product['image'] : '../assets/img/placeholder.png';
?>
<div class="page-actions">
    <a href="products.php" class="btn btn-ghost btn-sm">&larr; Back to products</a>
</div>

<?php if ($errors): ?>
    <div class="alert error"><ul><?php foreach ($errors as $er) echo '<li>' . e($er) . '</li>'; ?></ul></div>
<?php endif; ?>

<div class="card panel form-card">
    <form method="post" action="product-edit.php<?= $editing ? '?id=' . $id : '' ?>" enctype="multipart/form-data" class="form">
        <?= csrf_field() ?>
        <div class="edit-grid">
            <div>
                <div class="field">
                    <label for="name">Product name *</label>
                    <input id="name" name="name" type="text" required value="<?= e($values['name']) ?>">
                </div>
                <div class="two-col">
                    <div class="field">
                        <label for="price">Price (<?= e(CURRENCY) ?>) *</label>
                        <input id="price" name="price" type="number" step="0.01" min="0" required value="<?= e($values['price']) ?>">
                    </div>
                    <div class="field">
                        <label for="category">Category</label>
                        <input id="category" name="category" type="text" list="cats" value="<?= e($values['category']) ?>" placeholder="e.g. Toys">
                        <datalist id="cats">
                            <option value="Toys"><option value="Home Decor"><option value="Office"><option value="Gadgets"><option value="Custom">
                        </datalist>
                    </div>
                </div>
                <div class="field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="7" placeholder="Materials, sizes, colors, details…"><?= e($values['description']) ?></textarea>
                </div>
            </div>
            <div>
                <div class="field">
                    <label>Product image</label>
                    <div class="img-preview">
                        <img id="preview" src="<?= e($currentImg) ?>" alt="Preview">
                    </div>
                    <input id="image" name="image" type="file" accept="image/*" style="margin-top:.6rem">
                    <p class="muted small">JPG, PNG, WEBP or GIF · up to 5 MB.<?= $editing ? ' Leave empty to keep current image.' : '' ?></p>
                </div>
            </div>
        </div>
        <div class="cta-row">
            <button type="submit" class="btn btn-primary"><?= $editing ? 'Save changes' : 'Add product' ?></button>
            <a href="products.php" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<script>
document.getElementById('image').addEventListener('change', function (e) {
    var file = e.target.files[0];
    if (file) document.getElementById('preview').src = URL.createObjectURL(file);
});
</script>
<?php require __DIR__ . '/admin-footer.php'; ?>
