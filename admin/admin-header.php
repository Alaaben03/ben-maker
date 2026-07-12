<?php
require_once __DIR__ . '/auth.php';
$current = basename($_SERVER['PHP_SELF']);
$unread = unread_count();
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($admin_title) ? e($admin_title) . ' · ' : '' ?>Admin · <?= e(SITE_NAME) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="admin.css">
    <script>(function(){var t=localStorage.getItem('theme');if(t)document.documentElement.setAttribute('data-theme',t);})();</script>
</head>
<body class="admin">
<div class="admin-shell">
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <span class="brand-mark"></span>
            <span><?= e(SITE_NAME) ?></span>
        </div>
        <nav class="sidebar-nav">
            <a href="index.php" class="<?= $current === 'index.php' ? 'active' : '' ?>">Dashboard</a>
            <a href="products.php" class="<?= in_array($current, ['products.php','product-edit.php']) ? 'active' : '' ?>">Products</a>
            <a href="messages.php" class="<?= in_array($current, ['messages.php','message-view.php']) ? 'active' : '' ?>">
                Messages <?php if ($unread): ?><span class="pill"><?= $unread ?></span><?php endif; ?>
            </a>
        </nav>
        <div class="sidebar-foot">
            <a href="../index.php" class="side-link">View website</a>
            <a href="logout.php" class="side-link danger">Log out</a>
        </div>
    </aside>

    <div class="admin-content">
        <header class="admin-topbar">
            <button class="icon-btn" id="sidebar-toggle" type="button" aria-label="Toggle menu">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
            </button>
            <h1 class="admin-title"><?= isset($admin_title) ? e($admin_title) : 'Dashboard' ?></h1>
            <div class="topbar-actions">
                <button class="icon-btn" id="theme-toggle" type="button" aria-label="Toggle dark mode">
                    <svg class="icon-sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
                    <svg class="icon-moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/></svg>
                </button>
                <span class="who muted">Hi, <?= e($_SESSION['admin_name'] ?? 'admin') ?></span>
            </div>
        </header>
        <div class="admin-body">
