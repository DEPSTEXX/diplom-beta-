<?php
require_once __DIR__ . '/../init.php';
requireLogin();
requireAdmin();

$db = Database::getInstance();

// Статистика
$totalUsers   = $db->query('SELECT COUNT(*) FROM users')->fetchColumn();
$totalOrders  = $db->query('SELECT COUNT(*) FROM orders')->fetchColumn();
$totalRevenue = $db->query("SELECT COALESCE(SUM(total_amount),0) FROM orders WHERE status != 'cancelled'")->fetchColumn();
$pendingOrders = $db->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'")->fetchColumn();

// Последние 10 заказов
$recentOrders = $db->query(
    "SELECT o.id, o.status, o.total_amount, o.created_at,
            u.first_name, u.last_name, u.email
     FROM orders o
     JOIN users u ON o.user_id = u.id
     ORDER BY o.created_at DESC LIMIT 10"
)->fetchAll();

require_once __DIR__ . '/includes/admin_header.php';
?>

<div class="page-header">
    <h1>Дашборд</h1>
    <p>Обзор актуальных показателей</p>
</div>

<!-- Stat cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">👥</div>
        <div class="stat-value"><?= $totalUsers ?></div>
        <div class="stat-label">Пользователей</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">🛒</div>
        <div class="stat-value"><?= $totalOrders ?></div>
        <div class="stat-label">Заказов всего</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">⏳</div>
        <div class="stat-value"><?= $pendingOrders ?></div>
        <div class="stat-label">Ожидают обработки</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">💰</div>
        <div class="stat-value"><?= number_format($totalRevenue, 0, '', ' ') ?> ₽</div>
        <div class="stat-label">Выручка (всего)</div>
    </div>
</div>

<!-- Recent orders table -->
<div class="table-card">
    <div class="table-card-header">
        <h2>Последние заказы</h2>
        <a href="<?= site_url('admin/orders.php') ?>" class="add-btn">Все заказы →</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Клиент</th>
                <th>Email</th>
                <th>Статус</th>
                <th>Сумма</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recentOrders as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= htmlspecialchars(trim($order['first_name'] . ' ' . $order['last_name']) ?: '—') ?></td>
                <td><?= htmlspecialchars($order['email']) ?></td>
                <td>
                    <span class="badge badge-<?= $order['status'] ?>">
                        <?php $statuses = ['pending'=>'Ожидает','confirmed'=>'Подтвержден','completed'=>'Завершен','cancelled'=>'Отменен'];
                        echo $statuses[$order['status']] ?? $order['status']; ?>
                    </span>
                </td>
                <td><?= number_format($order['total_amount'], 0, '', ' ') ?> ₽</td>
                <td><?= date('d.m.Y H:i', strtotime($order['created_at'])) ?></td>
                <td>
                    <div class="btn-group">
                        <?php if($order['status'] === 'pending'): ?>
                            <a href="admin/orders.php?action=confirm&id=<?= $order['id'] ?>" class="btn btn-sm btn-confirm">✓</a>
                            <a href="admin/orders.php?action=cancel&id=<?= $order['id'] ?>" class="btn btn-sm btn-cancel">✗</a>
                        <?php else: ?>
                            <span style="color:#aaa; font-size:13px;">—</span>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($recentOrders)): ?>
                <tr><td colspan="7" style="text-align:center; padding:40px; color:#aaa;">Заказов пока нет</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
