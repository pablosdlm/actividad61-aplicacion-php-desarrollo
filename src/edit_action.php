<?php
require 'config.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $piloto_id = (int)($_POST['piloto_id'] ?? 0);
    $nombre = trim($_POST['nombre'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $dorsal = (int)($_POST['dorsal'] ?? 0);
    $puntos = (int)($_POST['puntos'] ?? 0);
    $escuderia = trim($_POST['escuderia'] ?? '');
    $nacionalidad = trim($_POST['nacionalidad'] ?? '');

    if ($piloto_id <= 0 || $nombre === '' || $apellidos === '' || $dorsal <= 0 || $escuderia === '' || $nacionalidad === '') {
        header('Location: home.php');
        exit;
    }

    $stmt = $pdo->prepare('UPDATE clasificacion
                           SET nombre = ?, apellidos = ?, dorsal = ?, puntos = ?, escuderia = ?, nacionalidad = ?
                           WHERE piloto_id = ?');
    $stmt->execute([$nombre, $apellidos, $dorsal, $puntos, $escuderia, $nacionalidad, $piloto_id]);

    header('Location: home.php');
    exit;
} else {
    header('Location: home.php');
    exit;
}
