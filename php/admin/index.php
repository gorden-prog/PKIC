<?php
session_start();
if (empty($_SESSION['admin'])) {
    header('Location: /php/admin/login.php');
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /php/admin/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    require_once __DIR__ . '/../config.php';
    $stmt = $pdo->prepare('DELETE FROM applications WHERE id = ?');
    $stmt->execute([(int) $_POST['delete_id']]);
    header('Location: /php/admin/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки — EduPro Admin</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<header>
    <a href="/index.html"><img src="/assets/img/logo.png" class="logo" alt="EduPro"></a>
    <nav>
        <ul>
            <li><a href="/index.html">Главная</a></li>
            <li><a href="/courses.html">Курсы</a></li>
            <li><a href="/teachers.html">Преподаватели</a></li>
            <li><a href="/learning.html">Как проходит обучение</a></li>
        </ul>
    </nav>
</header>

<?php
require_once __DIR__ . '/../config.php';

$stmt = $pdo->query('SELECT * FROM applications ORDER BY created_at DESC');
$rows = $stmt->fetchAll();
?>

<section class="admin">
    <div class="content">
        <div class="admin__header">
            <h2>Заявки на обучение (<?= count($rows) ?>)</h2>
            <a href="?logout" class="btn-logout">Выйти</a>
        </div>

        <?php if (empty($rows)): ?>
            <p>Заявок пока нет.</p>
        <?php else: ?>
        <div class="admin__table-wrap">
        <table class="admin__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Курс</th>
                    <th>Дата</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['email'] ?? '—') ?></td>
                    <td>
                        <?php if ($row['course']): ?>
                            <span class="badge"><?= htmlspecialchars($row['course']) ?></span>
                        <?php else: ?>—<?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                    <td>
                        <form method="post" onsubmit="return confirm('Удалить заявку?')">
                            <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn-delete">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php endif; ?>
    </div>
</section>

<footer>
    <div class="content">
        <div class="footer__main">
            <div class="footer__info">
                <p>Онлайн-школа<br>«EduPro»</p>
                <p>ИП Кузьменко С.Ю.</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
