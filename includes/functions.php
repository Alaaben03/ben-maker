<?php
require_once __DIR__ . '/../config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load translations and resolve the active language.
require_once __DIR__ . '/lang.php';
init_lang();

/** Escape output for safe HTML rendering. */
function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Format a price with the configured currency (DZD). */
function money($amount) {
    return number_format((float) $amount, 2, '.', ' ') . ' ' . CURRENCY;
}

/** Is an admin currently logged in? */
function is_logged_in() {
    return !empty($_SESSION['admin_id']);
}

/** Redirect helper. */
function redirect($url) {
    header('Location: ' . $url);
    exit;
}

/** Require login for admin pages, otherwise send to login. */
function require_login() {
    if (!is_logged_in()) {
        redirect('login.php');
    }
}

/** CSRF token helpers. */
function csrf_token() {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_field() {
    return '<input type="hidden" name="csrf" value="' . csrf_token() . '">';
}

function check_csrf() {
    if (empty($_POST['csrf']) || !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'])) {
        die('Invalid request (CSRF token mismatch). Please go back and try again.');
    }
}

/** Fetch all products (optionally by category). */
function get_products($category = null) {
    if ($category) {
        $stmt = db()->prepare('SELECT * FROM products WHERE category = ? ORDER BY created_at DESC');
        $stmt->execute([$category]);
    } else {
        $stmt = db()->query('SELECT * FROM products ORDER BY created_at DESC');
    }
    return $stmt->fetchAll();
}

/** Fetch a single product by id. */
function get_product($id) {
    $stmt = db()->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

/** Count unread messages (for the admin badge). */
function unread_count() {
    return (int) db()->query('SELECT COUNT(*) FROM messages WHERE is_read = 0')->fetchColumn();
}

/**
 * Handle an uploaded product image. Returns the stored filename or null.
 * Accepts jpg/png/webp/gif up to 5 MB.
 */
function handle_image_upload($fileKey) {
    if (empty($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }
    $file = $_FILES[$fileKey];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    if ($file['size'] > 5 * 1024 * 1024) {
        return null;
    }
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!isset($allowed[$mime])) {
        return null;
    }
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0775, true);
    }
    $name = 'product_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $allowed[$mime];
    if (move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $name)) {
        return $name;
    }
    return null;
}
