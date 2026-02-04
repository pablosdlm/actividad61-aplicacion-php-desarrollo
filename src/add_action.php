<?php
require 'config.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $dorsal = (int)($_POST['dorsal'] ?? 0);
    $puntos = (int)($_POST['puntos'] ?? 0);
    $escuderia = trim($_POST['escuderia'] ?? '');
    $nacionalidad = trim($_POST['nacionalidad'] ?? '');

    if ($nombre === '' || $apellidos === '' || $dorsal <= 0 || $escuderia === '' || $nacionalidad === '') {
        header('Location: add.php');
        exit;
    }

    $stmt = $pdo->prepare('INSERT INTO clasificacion (nombre, apellidos, dorsal, puntos, escuderia, nacionalidad)
                           VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nombre, $apellidos, $dorsal, $puntos, $escuderia, $nacionalidad]);

    header('Location: home.php');
    exit;
} else {
    header('Location: add.php');
    exit;
}
