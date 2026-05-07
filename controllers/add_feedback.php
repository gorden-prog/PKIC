<?php
include(__DIR__ . '/../function/connect.php');

$name   = trim($_POST['name'] ?? '');
$phone  = trim($_POST['tel-number'] ?? '');
$email  = trim($_POST['email'] ?? '');
$course = trim($_POST['course'] ?? '');

$stmt = $pdo->prepare('INSERT INTO feedback (name, phone, email, course) VALUES (?, ?, ?, ?)');
$stmt->execute([$name, $phone, $email, $course]);

header('Location: /pages/answer/');
exit;
