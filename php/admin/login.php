<?php
session_start();

$env = parse_ini_file(__DIR__ . '/../../.env');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['login'] === $env['ADMIN_LOGIN'] && $_POST['password'] === $env['ADMIN_PASS']) {
        $_SESSION['admin'] = true;
        header('Location: /php/admin/index.php');
        exit;
    }
    $error = 'Неверный логин или пароль';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход — EduPro Admin</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<header>
    <a href="/index.html"><img src="/assets/img/logo.png" class="logo" alt="EduPro"></a>
</header>

<section class="login">
    <div class="login__form">
        <h2>Вход в админ-панель</h2>
        <?php if ($error): ?>
            <p class="login__error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="login" placeholder="Логин" required autofocus>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="submit" value="ВОЙТИ">
        </form>
    </div>
</section>

</body>
</html>
