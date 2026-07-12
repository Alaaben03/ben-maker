<?php
/**
 * ============================================================
 *  Quick-order endpoint (AJAX)
 *  Saves an order as a message in the admin inbox, then the
 *  front-end shows a "congrats" confirmation popup.
 * ============================================================
 */
require_once __DIR__ . '/includes/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

// CSRF check (token sent from the modal form).
if (empty($_POST['csrf']) || !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'])) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid request token.']);
    exit;
}

$name       = trim($_POST['name'] ?? '');
$phone      = trim($_POST['phone'] ?? '');
$product_id = isset($_POST['product_id']) && $_POST['product_id'] !== '' ? (int) $_POST['product_id'] : null;
$product    = trim($_POST['product'] ?? '');

$errors = [];
if ($name === '')  $errors[] = 'Please enter your name.';
if ($phone === '') $errors[] = 'Please enter your phone number.';

if ($errors) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'error' => implode(' ', $errors)]);
    exit;
}

// Confirm the product still exists (and get its name/price for the message).
$price_txt = '';
if ($product_id) {
    $p = get_product($product_id);
    if ($p) {
        $product   = $p['name'];
        $price_txt = ' (' . money($p['price']) . ')';
    }
}

$subject = 'NEW ORDER: ' . ($product !== '' ? $product : 'Product') . $price_txt;
$body    = "New order request from the shop.\n"
         . "Customer: {$name}\n"
         . "Phone: {$phone}\n"
         . "Product: " . ($product !== '' ? $product : 'N/A') . $price_txt . "\n"
         . "Please call the customer to confirm the order.";

// Email is required by the schema; store a placeholder since quick-order only collects a phone.
$email = 'order@phone-only.local';

$stmt = db()->prepare('INSERT INTO messages (name, email, phone, product_id, subject, body) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute([$name, $email, $phone, $product_id, $subject, $body]);

echo json_encode(['ok' => true]);
