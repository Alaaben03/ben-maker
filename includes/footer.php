</main>
<footer class="site-footer">
    <div class="container footer-inner">
        <div>
            <div class="brand">
                <img src="assets/img/logo.jpg" alt="<?= e(SITE_NAME) ?> logo" class="brand-logo">
                <span class="brand-text"><?= e(SITE_NAME) ?></span>
            </div>
            <p class="muted"><?= e(SITE_TAGLINE) ?></p>
            <div class="footer-social">
                <a href="https://www.facebook.com/profile.php?id=61590539163131" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Facebook">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22 12.06C22 6.48 17.52 2 11.94 2 6.36 2 1.88 6.48 1.88 12.06c0 5.02 3.68 9.19 8.49 9.94v-7.03H7.83v-2.91h2.54V9.85c0-2.5 1.49-3.89 3.78-3.89 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.91h-2.34V22c4.81-.75 8.5-4.92 8.5-9.94z"/></svg>
                </a>
                <a href="https://www.instagram.com/ben__maker?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Instagram">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/></svg>
                </a>
                <a href="https://www.tiktok.com/@ben_maker?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="TikTok">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16.6 5.82a4.28 4.28 0 0 1-1.01-2.82h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5 2.59 2.59 0 0 1 0-5.18c.27 0 .53.04.77.12v-3.16a5.7 5.7 0 0 0-.77-.05 5.72 5.72 0 1 0 5.72 5.72V9.01a7.35 7.35 0 0 0 4.29 1.37V7.29a4.28 4.28 0 0 1-3.32-1.47z"/></svg>
                </a>
            </div>
        </div>
        <div class="footer-links">
            <a href="index.php">Shop</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="footer-contact muted">
            <p><?= e(CONTACT_EMAIL) ?></p>
            <p><?= e(CONTACT_PHONE) ?></p>
            <p><?= e(CONTACT_CITY) ?></p>
        </div>
    </div>
    <div class="container footer-bottom muted">
        <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All rights reserved.</p>
    </div>
</footer>
<script src="assets/js/main.js"></script>
</body>
</html>
