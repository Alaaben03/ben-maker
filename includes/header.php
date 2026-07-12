<?php
require_once __DIR__ . '/functions.php';
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? e($page_title) . ' · ' : '' ?><?= e(SITE_NAME) ?></title>
    <meta name="description" content="<?= e(SITE_NAME) ?> — <?= e(SITE_TAGLINE) ?>. Buy custom 3D printed products.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        // Apply saved theme before paint to avoid flash.
        (function () {
            var t = localStorage.getItem('theme');
            if (t) document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
</head>
<body>
<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="brand">
            <img src="assets/img/logo.jpg" alt="<?= e(SITE_NAME) ?> logo" class="brand-logo">
            <span class="brand-text"><?= e(SITE_NAME) ?></span>
        </a>

        <nav class="nav" id="nav" aria-label="Main navigation">
            <a href="index.php" class="<?= $current === 'index.php' ? 'active' : '' ?>"><?= t('nav_shop') ?></a>
            <a href="about.php" class="<?= $current === 'about.php' ? 'active' : '' ?>"><?= t('nav_about') ?></a>
            <a href="contact.php" class="<?= $current === 'contact.php' ? 'active' : '' ?>"><?= t('nav_contact') ?></a>
            <a href="admin/login.php" class="nav-admin"><?= t('nav_admin') ?></a>
        </nav>

        <div class="header-actions">
            <!-- Dark mode toggle -->
            <button class="icon-btn" id="theme-toggle" type="button" aria-label="Toggle dark mode" title="Toggle theme">
                <svg class="icon-sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
                <svg class="icon-moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/></svg>
            </button>

            <!-- Language switcher -->
            <div class="lang-switcher">
                <button class="icon-btn lang-toggle" id="langToggleBtn" type="button" aria-label="Switch language" title="Switch language">
                    <!-- Globe icon -->
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <span class="current-lang-label"><?= strtoupper(current_lang()) ?></span>
                </button>
                <ul class="lang-dropdown" id="langDropdown">
                    <?php foreach ($GLOBALS['LANGS'] as $code => $info): ?>
                        <li>
                            <a href="<?= lang_url($code) ?>" class="<?= $code === current_lang() ? 'active' : '' ?>">
                                <?= $info['label'] ?> · <?= $info['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Mobile menu toggle -->
            <button class="icon-btn menu-btn" id="menu-btn" type="button" aria-label="Open menu" aria-expanded="false">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
            </button>
        </div>
        
    </div>
</header>
<main class="site-main">