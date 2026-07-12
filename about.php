<?php
require_once __DIR__ . '/includes/functions.php';
$page_title = 'About';
require __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container narrow">
        <span class="eyebrow">About</span>
        <h1>What I do</h1>
        <p class="lead">Hi, I'm the maker behind <?= e(SITE_NAME) ?>. I design and 3D print original, functional and decorative objects — from articulated toys and home decor to practical desk gadgets and fully custom pieces.</p>

        <div class="prose">
            <p>Every item you see here is printed by me on my own machines, using quality PLA and PETG filaments. I care about clean layers, strong parts and finishes that feel good in the hand.</p>
            <p>Need something specific? I take custom orders — send me your idea, a reference image, the colors and the size, and I'll print it for you.</p>
        </div>

        <div class="grid features">
            <div class="card feature">
                <h3>Custom colors</h3>
                <p class="muted">Choose the filament color and finish that fits your space or gift.</p>
            </div>
            <div class="card feature">
                <h3>Made to order</h3>
                <p class="muted">Each piece is printed fresh when you order, no mass production.</p>
            </div>
            <div class="card feature">
                <h3>Local &amp; fast</h3>
                <p class="muted">Based in <?= e(CONTACT_CITY) ?>, quick to respond and ship.</p>
            </div>
        </div>

        <div class="cta-row">
            <a href="index.php" class="btn btn-primary">See the shop</a>
            <a href="contact.php" class="btn btn-ghost">Get in touch</a>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
