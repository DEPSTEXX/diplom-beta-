<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель — Ярко Парк</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; background: #f0f2f5; display: flex; }

        /* Sidebar */
        .sidebar {
            width: 250px; min-height: 100vh; background: #1a1a2e;
            display: flex; flex-direction: column; position: fixed; left: 0; top: 0;
        }
        .sidebar-logo {
            padding: 25px 20px; font-size: 20px; font-weight: 700;
            color: white; letter-spacing: 1px; border-bottom: 1px solid rgba(255,255,255,0.1);
            text-decoration: none; display: block;
        }
        .sidebar-logo span { color: #4e9fff; }
        .sidebar-nav { padding: 15px 0; flex: 1; }
        .nav-item {
            display: flex; align-items: center; gap: 12px; padding: 13px 20px;
            color: rgba(255,255,255,0.7); text-decoration: none;
            transition: all 0.2s; font-size: 15px;
        }
        .nav-item:hover, .nav-item.active {
            background: rgba(78,159,255,0.15); color: white;
            border-left: 3px solid #4e9fff;
        }
        .nav-item .icon { font-size: 20px; width: 24px; text-align: center; }
        .sidebar-footer { padding: 20px; border-top: 1px solid rgba(255,255,255,0.1); }
        .logout-btn {
            display: block; text-align: center; padding: 10px;
            background: #c62828; color: white; text-decoration: none;
            border-radius: 6px; font-weight: 600; transition: background 0.2s;
        }
        .logout-btn:hover { background: #b71c1c; }

        /* Main content */
        .main-content { margin-left: 250px; flex: 1; padding: 30px; }
        .page-header { margin-bottom: 30px; }
        .page-header h1 { font-size: 28px; color: #1a1a2e; }
        .page-header p { color: #777; margin-top: 5px; }

        /* Stat Cards */
        .stats-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px; margin-bottom: 30px;
        }
        .stat-card {
            background: white; border-radius: 12px; padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06); display: flex;
            flex-direction: column; gap: 10px;
        }
        .stat-card .stat-icon { font-size: 36px; }
        .stat-card .stat-value { font-size: 36px; font-weight: 700; color: #1a1a2e; }
        .stat-card .stat-label { font-size: 14px; color: #888; }

        /* Table */
        .table-card { background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); overflow: hidden; margin-bottom: 30px; }
        .table-card-header { padding: 20px 25px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
        .table-card-header h2 { font-size: 18px; color: #1a1a2e; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px 20px; text-align: left; border-bottom: 1px solid #f0f2f5; font-size: 14px; }
        th { background: #f8f9fb; font-weight: 600; color: #555; text-transform: uppercase; font-size: 12px; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background: #fafbff; }

        /* Badges */
        .badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge-pending { background: #fff3cd; color: #856404; }
        .badge-confirmed { background: #d1e7dd; color: #0f5132; }
        .badge-completed { background: #cff4fc; color: #055160; }
        .badge-cancelled { background: #f8d7da; color: #842029; }

        /* Buttons */
        .btn { padding: 7px 14px; border: none; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: 600; text-decoration: none; display: inline-block; transition: opacity 0.2s; }
        .btn:hover { opacity: 0.85; }
        .btn-confirm { background: #2e7d32; color: white; }
        .btn-cancel { background: #c62828; color: white; }
        .btn-primary { background: #2979ff; color: white; }
        .btn-sm { padding: 5px 10px; font-size: 12px; }
        .btn-group { display: flex; gap: 5px; }
        .add-btn { background: #2979ff; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600; }
    </style>
</head>
<body>
<div class="sidebar">
    <a href="<?= site_url('admin/index.php') ?>" class="sidebar-logo">Ярко <span>Парк</span> | Admin</a>
    
    <nav class="sidebar-nav">
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        $currentDir = basename(dirname($_SERVER['PHP_SELF']));
        function navItem($url, $icon, $label, $page) {
            $active = (strpos($_SERVER['PHP_SELF'], $page) !== false) ? 'active' : '';
            echo "<a href='$url' class='nav-item $active'><span class='icon'>$icon</span> $label</a>";
        }
        ?>
        <?php navItem(site_url('admin/index.php'), '📊', 'Дашборд', 'admin/index'); ?>
        <?php navItem(site_url('admin/orders.php'), '🛒', 'Заказы', 'admin/orders'); ?>
        <?php navItem(site_url('admin/products.php'), '🎟️', 'Услуги', 'admin/products'); ?>
        <?php navItem(site_url('admin/users.php'), '👥', 'Пользователи', 'admin/users'); ?>
    </nav>

    <div class="sidebar-footer">
        <a href="<?= site_url('profile.php?logout=1') ?>" class="logout-btn">Выйти</a>
    </div>
</div>

<div class="main-content">
