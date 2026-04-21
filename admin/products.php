<?php
require_once __DIR__ . '/../init.php';
requireLogin();
requireAdmin();

$db = Database::getInstance();

// Обработка действий
$action = $_GET['action'] ?? '';
$id = (int)($_GET['id'] ?? 0);

if ($action === 'delete' && $id > 0) {
    $db->prepare('DELETE FROM products WHERE id = ?')->execute([$id]);
    header('Location: ' . site_url('admin/products.php?deleted=1'));
    exit;
}

if ($action === 'toggle' && $id > 0) {
    $db->prepare('UPDATE products SET is_active = NOT is_active WHERE id = ?')->execute([$id]);
    header('Location: ' . site_url('admin/products.php?updated=1'));
    exit;
}

// Сохранение нового/редактирование
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid     = (int)($_POST['product_id'] ?? 0);
    $name    = trim($_POST['name'] ?? '');
    $desc    = trim($_POST['description'] ?? '');
    $price   = (float)($_POST['price'] ?? 0);
    $slug    = strtolower(preg_replace('/[^a-z0-9]+/', '-', transliterator_transliterate('Russian-Latin/BGN', $name)));

    if ($pid > 0) {
        $db->prepare('UPDATE products SET name=?, description=?, price=? WHERE id=?')
            ->execute([$name, $desc, $price, $pid]);
    } else {
        $db->prepare('INSERT INTO products (name, slug, description, price) VALUES (?,?,?,?)')
            ->execute([$name, $slug ?: uniqid('p'), $desc, $price]);
    }
    header('Location: ' . site_url('admin/products.php?updated=1'));
    exit;
}

// Для редактирования
$editProduct = null;
if ($action === 'edit' && $id > 0) {
    $stmt = $db->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    $editProduct = $stmt->fetch();
}

$products = $db->query('SELECT * FROM products ORDER BY id DESC')->fetchAll();

require_once __DIR__ . '/includes/admin_header.php';
?>

<div class="page-header">
    <h1>Услуги и товары</h1>
    <p>Управление каталогом</p>
</div>

<?php if(isset($_GET['updated']) || isset($_GET['deleted'])): ?>
<div style="background:#d1e7dd; color:#0f5132; padding:14px 20px; border-radius:8px; margin-bottom:20px; font-weight:600;">
    ✓ <?= isset($_GET['deleted']) ? 'Товар удалён' : 'Данные сохранены' ?>
</div>
<?php endif; ?>

<!-- Форма добавления / редактирования -->
<div class="table-card" style="padding: 25px;">
    <h2 style="margin-bottom:20px; font-size:18px;"><?= $editProduct ? 'Редактировать услугу' : 'Добавить новую услугу' ?></h2>
    <form method="POST" action="">
        <?php if($editProduct): ?>
            <input type="hidden" name="product_id" value="<?= $editProduct['id'] ?>">
        <?php endif; ?>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
            <div>
                <label style="display:block; font-weight:600; margin-bottom:6px;">Название *</label>
                <input type="text" name="name" required value="<?= htmlspecialchars($editProduct['name'] ?? '') ?>"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:15px;">
            </div>
            <div>
                <label style="display:block; font-weight:600; margin-bottom:6px;">Цена (₽) *</label>
                <input type="number" name="price" required value="<?= htmlspecialchars($editProduct['price'] ?? '') ?>"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:15px;" min="0" step="0.01">
            </div>
        </div>
        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:600; margin-bottom:6px;">Описание</label>
            <textarea name="description" rows="3"
                style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:15px;"><?= htmlspecialchars($editProduct['description'] ?? '') ?></textarea>
        </div>
        <div style="display:flex; gap:10px;">
            <button type="submit" class="btn btn-primary">💾 <?= $editProduct ? 'Сохранить изменения' : 'Добавить услугу' ?></button>
            <?php if($editProduct): ?>
                <a href="<?= site_url('admin/products.php') ?>" class="btn" style="background:#eee; color:#333;">Отмена</a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Таблица продуктов -->
<div class="table-card">
    <div class="table-card-header">
        <h2>Каталог (<?= count($products) ?>)</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['name']) ?></td>
                <td><?= number_format($p['price'], 0, '', ' ') ?> ₽</td>
                <td>
                    <span class="badge" style="background:<?= $p['is_active'] ? '#d1e7dd' : '#f8d7da' ?>; color:<?= $p['is_active'] ? '#0f5132' : '#842029' ?>;">
                        <?= $p['is_active'] ? 'Активен' : 'Скрыт' ?>
                    </span>
                </td>
                <td>
                    <div class="btn-group">
                        <a href="?action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-primary">✏️ Edit</a>
                        <a href="?action=toggle&id=<?= $p['id'] ?>" class="btn btn-sm" style="background:#ff8f00; color:white;">
                            <?= $p['is_active'] ? 'Скрыть' : 'Показать' ?>
                        </a>
                        <a href="?action=delete&id=<?= $p['id'] ?>" class="btn btn-sm btn-cancel" onclick="return confirm('Удалить «<?= htmlspecialchars($p['name']) ?>»?')">🗑️</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($products)): ?>
                <tr><td colspan="5" style="text-align:center; padding:40px; color:#aaa;">Услуг нет. Добавьте первую!</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
