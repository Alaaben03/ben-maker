<?php
/**
 * ============================================================
 *  ONE-CLICK INSTALLER
 * ============================================================
 *  Open http://localhost/YOUR_FOLDER/install.php once.
 *  It creates the database, tables, a default admin account,
 *  and a few sample products. DELETE this file afterwards.
 * ============================================================
 */
require_once __DIR__ . '/config.php';

$log = [];
try {
    // Connect without selecting a database first, so we can create it.
    $pdo = new PDO('mysql:host=' . DB_HOST . ';charset=utf8mb4', DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $pdo->exec('CREATE DATABASE IF NOT EXISTS `' . DB_NAME . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    $log[] = 'Database "' . DB_NAME . '" ready.';
    $pdo->exec('USE `' . DB_NAME . '`');

    // ---- Tables ----
    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    $log[] = 'Table "admins" ready.';

    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(150) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL DEFAULT 0,
        category VARCHAR(80) DEFAULT 'General',
        image VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    $log[] = 'Table "products" ready.';

    $pdo->exec("CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(120) NOT NULL,
        email VARCHAR(150) NOT NULL,
        phone VARCHAR(60),
        product_id INT NULL,
        subject VARCHAR(200),
        body TEXT NOT NULL,
        is_read TINYINT(1) NOT NULL DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    $log[] = 'Table "messages" ready.';

    // ---- Default admin (username: admin / password: admin123) ----
    $exists = $pdo->query('SELECT COUNT(*) FROM admins')->fetchColumn();
    if (!$exists) {
        $stmt = $pdo->prepare('INSERT INTO admins (username, password_hash) VALUES (?, ?)');
        $stmt->execute(['admin', password_hash('admin123', PASSWORD_DEFAULT)]);
        $log[] = 'Default admin created -> username: <b>admin</b>, password: <b>admin123</b> (change it!).';
    } else {
        $log[] = 'Admin account already exists, skipped.';
    }

    // ---- Sample products ----
    $count = $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
    if (!$count) {
        $samples = [
            ['Articulated Dragon', 'Fully articulated flexi dragon printed in premium PLA. Prints in one piece, no supports, moves realistically. Great desk companion or gift.', 2500, 'Toys', 'sample-dragon.png'],
            ['Spiral Vase', 'Modern spiral vase printed in matte white. Watertight liner available. Perfect for dried flowers or as a minimalist decor piece.', 1800, 'Home Decor', 'sample-vase.png'],
            ['Modular Desk Organizer', 'Stackable modular organizer for pens, tools and stationery. Customizable colors and sizes on request.', 3200, 'Office', 'sample-organizer.png'],
            ['Adjustable Phone Stand', 'Sturdy adjustable phone stand with multiple viewing angles. Fits all phone sizes. Available in several colors.', 1200, 'Gadgets', 'sample-stand.png'],
        ];
        $stmt = $pdo->prepare('INSERT INTO products (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)');
        foreach ($samples as $s) {
            $stmt->execute($s);
        }
        $log[] = count($samples) . ' sample products added.';
    } else {
        $log[] = 'Products already present, skipped seeding.';
    }

    $success = true;
} catch (PDOException $e) {
    $success = false;
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Installer &middot; <?= SITE_NAME ?></title>
<style>
    body{font-family:system-ui,Segoe UI,Roboto,sans-serif;background:#0b1120;color:#e2e8f0;margin:0;padding:40px}
    .card{max-width:640px;margin:0 auto;background:#111827;border:1px solid #1f2937;border-radius:16px;padding:32px}
    h1{margin-top:0;color:#2dd4bf}
    li{margin:6px 0;color:#cbd5e1}
    .ok{color:#34d399}.bad{color:#f87171}
    a.btn{display:inline-block;margin-top:20px;background:#2dd4bf;color:#03201d;padding:12px 20px;border-radius:10px;text-decoration:none;font-weight:600}
    code{background:#0b1120;padding:2px 6px;border-radius:6px}
</style>
</head>
<body>
<div class="card">
    <h1><?= SITE_NAME ?> &mdash; Installer</h1>
    <?php if (!empty($success)): ?>
        <p class="ok">Installation completed successfully.</p>
        <ul><?php foreach ($log as $line) echo '<li>' . $line . '</li>'; ?></ul>
        <p><strong>Important:</strong> delete <code>install.php</code> now, then log in and change your password.</p>
        <a class="btn" href="index.php">Go to the website</a>
        <a class="btn" href="admin/login.php" style="background:#334155;color:#e2e8f0">Admin login</a>
    <?php else: ?>
        <p class="bad">Installation failed:</p>
        <p><code><?= htmlspecialchars($error) ?></code></p>
        <p>Check your database settings in <code>config.php</code> and make sure MySQL is running.</p>
    <?php endif; ?>
</div>
</body>
</html>
