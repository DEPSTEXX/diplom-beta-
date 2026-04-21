<?php
require_once __DIR__ . '/../init.php';
requireLogin();
requireAdmin();

$db = Database::getInstance();

// Обработка действий (подтвердить/отменить/завершить)
$action = $_GET['action'] ?? '';
$id = (int)($_GET['id'] ?? 0);

if ($id > 0 && in_array($action, ['confirm', 'cancel', 'complete'])) {
    $map = ['confirm' => 'confirmed', 'cancel' => 'cancelled', 'complete' => 'completed'];
    $stmt = $db->prepare('UPDATE orders SET status = ? WHERE id = ?');
    $stmt->execute([$map[$action], $id]);
    header('Location: ' . site_url('admin/orders.php?updated=1'));
    exit;
}

// Получаем ВСЕ заказы
$orders = $db->query(
    "SELECT o.id, o.status, o.total_amount, o.created_at,
            u.first_name, u.last_name, u.email
     FROM orders o
     JOIN users u ON o.user_id = u.id
     ORDER BY o.created_at DESC"
)->fetchAll();

require_once __DIR__ . '/includes/admin_header.php';
?>

<div class="page-header">
    <h1>Заказы</h1>
    <p>Управление всеми заказами</p>
</div>

<?php if(isset($_GET['updated'])): ?>
<div style="background:#d1e7dd; color:#0f5132; padding:14px 20px; border-radius:8px; margin-bottom:20px; font-weight:600;">
    ✓ Статус заказа обновлен
</div>
<?php endif; ?>

<div class="table-card">
    <div class="table-card-header">
        <h2>Все заказы (<?= count($orders) ?>)</h2>
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
            <?php foreach($orders as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= htmlspecialchars(trim($order['first_name'] . ' ' . $order['last_name']) ?: '—') ?></td>
                <td><?= htmlspecialchars($order['email']) ?></td>
                <td>
                    <span class="badge badge-<?= $order['status'] ?>">
                        <?php $s = ['pending'=>'Ожидает','confirmed'=>'Подтвержден','completed'=>'Завершен','cancelled'=>'Отменен'];
                        echo $s[$order['status']] ?? $order['status']; ?>
                    </span>
                </td>
                <td><?= number_format($order['total_amount'], 0, '', ' ') ?> ₽</td>
                <td><?= date('d.m.Y H:i', strtotime($order['created_at'])) ?></td>
                <td>
                    <div class="btn-group">
                        <?php if($order['status'] === 'pending'): ?>
                            <a href="?action=confirm&id=<?= $order['id'] ?>" class="btn btn-sm btn-confirm" onclick="return confirm('Подтвердить заказ?')">Подтвердить</a>
                            <a href="?action=cancel&id=<?= $order['id'] ?>" class="btn btn-sm btn-cancel" onclick="return confirm('Отменить заказ?')">Отменить</a>
                        <?php elseif($order['status'] === 'confirmed'): ?>
                            <a href="?action=complete&id=<?= $order['id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm('Завершить заказ?')">Завершить</a>
                        <?php else: ?>
                            <span style="color:#aaa;">—</span>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($orders)): ?>
                <tr><td colspan="7" style="text-align:center; padding:40px; color:#aaa;">Заказов нет</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
