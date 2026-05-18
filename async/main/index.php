<?php
include(__DIR__ . '/../../function/connect.php');

$stmt = $pdo->query('SELECT * FROM index_page ORDER BY id');
foreach ($stmt as $item) {
    echo $item['content'];
}
?>
