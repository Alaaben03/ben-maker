<?php
require_once __DIR__ . '/includes/functions.php';
$page_title = 'Contact';

$errors = [];
$sent = false;

// Pre-fill subject if arriving from a product.
$prefill = isset($_GET['product']) ? trim($_GET['product']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_csrf();
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $body    = trim($_POST['body'] ?? '');

    if ($name === '')  $errors[] = 'Please enter your name.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
    if ($body === '')  $errors[] = 'Please write a message.';

    if (!$errors) {
        $stmt = db()->prepare('INSERT INTO messages (name, email, phone, subject, body) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$name, $email, $phone, $subject, $body]);
        $sent = true;
    }
}

require __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container contact-grid">
        <div class="contact-info">
            <span class="eyebrow">Contact</span>
            <h1>Let's make something</h1>
            <p class="lead">Have a question about a product or a custom idea? Send me a message and I'll get back to you.</p>
            <ul class="contact-list">
                <li><strong>Email</strong><span><?= e(CONTACT_EMAIL) ?></span></li>
                <li><strong>Phone</strong><span><?= e(CONTACT_PHONE) ?></span></li>
                <li><strong>Location</strong><span><?= e(CONTACT_CITY) ?></span></li>
            </ul>
        </div>

        <div class="card contact-card">
            <?php if ($sent): ?>
                <div class="alert success">
                    <h3>Message sent!</h3>
                    <p>Thanks — your message has been received. I'll reply as soon as possible.</p>
                    <a href="index.php" class="btn btn-primary">Back to shop</a>
                </div>
            <?php else: ?>
                <?php if ($errors): ?>
                    <div class="alert error">
                        <ul><?php foreach ($errors as $er) echo '<li>' . e($er) . '</li>'; ?></ul>
                    </div>
                <?php endif; ?>
                <form method="post" action="contact.php" class="form" novalidate>
                    <?= csrf_field() ?>
                    <div class="field">
                        <label for="name">Your name *</label>
                        <input id="name" name="name" type="text" required value="<?= e($_POST['name'] ?? '') ?>">
                    </div>
                    <div class="two-col">
                        <div class="field">
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="email" required value="<?= e($_POST['email'] ?? '') ?>">
                        </div>
                        <div class="field">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" type="text" value="<?= e($_POST['phone'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="field">
                        <label for="subject">Subject</label>
                        <input id="subject" name="subject" type="text" value="<?= e($_POST['subject'] ?? ($prefill !== '' ? 'Order: ' . $prefill : '')) ?>">
                    </div>
                    <div class="field">
                        <label for="body">Message *</label>
                        <textarea id="body" name="body" rows="6" required><?= e($_POST['body'] ?? '') ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send message</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
