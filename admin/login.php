<?php
require_once __DIR__ . '/../includes/functions.php';

if (is_logged_in()) {
    redirect('index.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_csrf();
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = db()->prepare('SELECT * FROM admins WHERE username = ?');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['username'];
        redirect('index.php');
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login · <?= e(SITE_NAME) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body class="admin-auth">
    <div class="auth-card card">
        <div class="brand" style="justify-content:center;margin-bottom:1.2rem">
            <span class="brand-mark"></span>
            <span class="brand-text"><?= e(SITE_NAME) ?></span>
        </div>
        <h1 style="text-align:center;font-size:1.4rem">Admin sign in</h1>
        <?php if ($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?>
        <form method="post" action="login.php" class="form">
            <?= csrf_field() ?>
            <div class="field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" required autofocus>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
        <p class="muted" style="text-align:center;margin-top:1rem;font-size:.85rem">
            <a href="../index.php">&larr; Back to website</a>
        </p>
    </div>
</body>
</html>
