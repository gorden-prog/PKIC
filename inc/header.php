<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) . ' — EduPro' : 'EduPro — Онлайн-школа ИИ и Бизнес-аналитики' ?></title>
    <link rel="stylesheet" href="/assets/styles/styles.css">
</head>
<body>
    <header>
        <a onclick="openPage('main');">
            <img src="/assets/img/logo.png" class="logo" alt="EduPro">
        </a>
        <nav>
            <ul>
                <li><a onclick="openPage('courses');">Курсы</a></li>
                <li><a onclick="openPage('teachers');">Преподаватели</a></li>
                <li><a onclick="openPage('learning');">Как проходит обучение</a></li>
                <li><a onclick="openPage('main', true);">Контакты</a></li>
            </ul>
        </nav>
        <a href="/pages/admin/login.php" class="btn-login">Войти</a>
    </header>
