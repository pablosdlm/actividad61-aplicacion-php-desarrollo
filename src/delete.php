<?php
require 'config.php';
require_login();

$piloto_id = isset($_GET['piloto_id']) ? (int)$_GET['piloto_id'] : 0;

if ($piloto_id > 0) {
    $stmt = $pdo->prepare('DELETE FROM clasificacion WHERE piloto_id = ?');
    $stmt->execute([$piloto_id]);
}

header('Location: home.php');
exit;
