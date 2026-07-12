<?php
/**
 * ============================================================
 *  SITE & DATABASE CONFIGURATION
 * ============================================================
 *  Edit the values below to match your hosting / brand.
 *  On local XAMPP the defaults usually work as-is.
 * ============================================================
 */

// ---- Database credentials (phpMyAdmin / MySQL) ----
define('DB_HOST', 'localhost');
define('DB_NAME', 'ben_maker');
define('DB_USER', 'root');          // XAMPP default user
define('DB_PASS', '');              // XAMPP default password is empty

// ---- Brand / site info (edit freely) ----
define('SITE_NAME', 'Ben Maker Studio');
define('SITE_TAGLINE', 'Custom 3D Printed Creations');
define('CURRENCY', 'DZD');

// ---- Contact details shown on the site (edit with your real info) ----
define('CONTACT_EMAIL', 'contact@benmaker.dz');
define('CONTACT_PHONE', '+213 000 00 00 00');
define('CONTACT_CITY', 'Algiers, Algeria');

// ---- Paths ----
define('UPLOAD_DIR', __DIR__ . '/uploads/');   // where product images are stored
define('UPLOAD_URL', 'uploads/');              // public URL to images

/**
 * PDO database connection (shared across the app).
 */
function db() {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die('Database connection failed. Did you run <a href="install.php">install.php</a>? Error: ' . htmlspecialchars($e->getMessage()));
        }
    }
    return $pdo;
}
