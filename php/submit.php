<?php
require_once __DIR__ . '/config.php';

$name   = trim($_POST['name'] ?? '');
$phone  = trim($_POST['tel-number'] ?? '');
$email  = trim($_POST['email'] ?? '') ?: null;
$course = trim($_POST['course'] ?? '') ?: null;

$stmt = $pdo->prepare('INSERT INTO applications (name, phone, email, course) VALUES (?, ?, ?, ?)');
$stmt->execute([$name, $phone, $email, $course]);

header('Location: /answer.html');
exit;
