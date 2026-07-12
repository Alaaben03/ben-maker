<?php
require_once __DIR__ . '/auth.php';

// Actions: mark read / delete.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_csrf();
    $action = $_POST['action'] ?? '';
    $id = (int) ($_POST['id'] ?? 0);
    if ($action === 'delete') {
        db()->prepare('DELETE FROM messages WHERE id = ?')->execute([$id]);
        redirect('messages.php?deleted=1');
    } elseif ($action === 'toggle_read') {
        db()->prepare('UPDATE messages SET is_read = 1 - is_read WHERE id = ?')->execute([$id]);
        redirect('messages.php#m' . $id);
    }
}

$admin_title = 'Messages';
require __DIR__ . '/admin-header.php';
$messages = db()->query('SELECT m.*, p.name AS product_name FROM messages m LEFT JOIN products p ON p.id = m.product_id ORDER BY m.created_at DESC')->fetchAll();
?>
<?php if (isset($_GET['deleted'])): ?><div class="alert success">Message deleted.</div><?php endif; ?>

<div class="page-actions">
    <p class="muted"><?= count($messages) ?> message<?= count($messages) === 1 ? '' : 's' ?> · <?= unread_count() ?> unread</p>
</div>

<?php if (empty($messages)): ?>
    <div class="card panel"><p class="muted">No messages yet. Messages sent from the contact page will appear here.</p></div>
<?php else: ?>
<div class="message-list">
    <?php foreach ($messages as $m): ?>
        <article class="card message <?= $m['is_read'] ? '' : 'unread' ?>" id="m<?= (int) $m['id'] ?>">
            <div class="message-head">
                <div>
                    <strong><?= e($m['name']) ?></strong>
                    <?php if (!$m['is_read']): ?><span class="pill">new</span><?php endif; ?>
                    <div class="muted small">
                        <a href="mailto:<?= e($m['email']) ?>"><?= e($m['email']) ?></a>
                        <?php if ($m['phone']): ?> · <?= e($m['phone']) ?><?php endif; ?>
                    </div>
                </div>
                <span class="muted small"><?= e(date('d M Y, H:i', strtotime($m['created_at']))) ?></span>
            </div>
            <?php if ($m['subject']): ?><p class="msg-subject"><strong><?= e($m['subject']) ?></strong></p><?php endif; ?>
            <?php if ($m['product_name']): ?><p class="small muted">About product: <?= e($m['product_name']) ?></p><?php endif; ?>
            <p class="msg-body"><?= nl2br(e($m['body'])) ?></p>
            <div class="message-actions">
                <a href="mailto:<?= e($m['email']) ?>?subject=<?= rawurlencode('Re: ' . ($m['subject'] ?: 'Your message')) ?>" class="btn btn-ghost btn-sm">Reply by email</a>
                <form method="post" action="messages.php" class="inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="action" value="toggle_read">
                    <input type="hidden" name="id" value="<?= (int) $m['id'] ?>">
                    <button type="submit" class="btn btn-ghost btn-sm"><?= $m['is_read'] ? 'Mark unread' : 'Mark read' ?></button>
                </form>
                <form method="post" action="messages.php" class="inline" onsubmit="return confirm('Delete this message?');">
                    <?= csrf_field() ?>
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= (int) $m['id'] ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </article>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php require __DIR__ . '/admin-footer.php'; ?>
