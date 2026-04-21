<?php
require_once __DIR__ . '/../init.php';
requireLogin();
requireAdmin();

$db = Database::getInstance();

// Make admin
if (isset($_GET['make_admin']) && (int)$_GET['make_admin'] > 0) {
    $db->prepare("UPDATE users SET role = 'admin' WHERE id = ?")->execute([(int)$_GET['make_admin']]);
    header('Location: ' . site_url('admin/users.php?updated=1'));
    exit;
}

// Remove admin
if (isset($_GET['remove_admin']) && (int)$_GET['remove_admin'] > 0) {
    $db->prepare("UPDATE users SET role = 'customer' WHERE id = ?")->execute([(int)$_GET['remove_admin']]);
    header('Location: ' . site_url('admin/users.php?updated=1'));
    exit;
}

$users = $db->query('SELECT id, email, first_name, last_name, phone, role, created_at FROM users ORDER BY created_at DESC')->fetchAll();

require_once __DIR__ . '/includes/admin_header.php';
?>

<div class="page-header">
    <h1>Пользователи</h1>
    <p>Список всех зарегистрированных пользователей</p>
</div>

<?php if(isset($_GET['updated'])): ?>
<div style="background:#d1e7dd; color:#0f5132; padding:14px 20px; border-radius:8px; margin-bottom:20px; font-weight:600;">
    ✓ Роль пользователя обновлена
</div>
<?php endif; ?>

<div class="table-card">
    <div class="table-card-header">
        <h2>Пользователи (<?= count($users) ?>)</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Роль</th>
                <th>Дата регистрации</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars(trim($user['first_name'] . ' ' . $user['last_name']) ?: '—') ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['phone'] ?: '—') ?></td>
                <td>
                    <span class="badge" style="background:<?= $user['role'] === 'admin' ? '#cfe2ff' : '#f8f9fa' ?>; color:<?= $user['role'] === 'admin' ? '#0a367a' : '#555' ?>;">
                        <?= $user['role'] === 'admin' ? '👑 Администратор' : 'Клиент' ?>
                    </span>
                </td>
                <td><?= date('d.m.Y', strtotime($user['created_at'])) ?></td>
                <td>
                    <?php if($user['role'] !== 'admin'): ?>
                        <a href="?make_admin=<?= $user['id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm('Назначить администратором?')">Сделать админом</a>
                    <?php else: ?>
                        <a href="?remove_admin=<?= $user['id'] ?>" class="btn btn-sm btn-cancel" onclick="return confirm('Снять права администратора?')">Снять права</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
