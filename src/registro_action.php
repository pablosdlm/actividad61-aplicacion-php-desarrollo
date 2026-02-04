<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $contraseña = $_POST['contraseña'] ?? '';

    if ($nombre_usuario === '' || $correo === '' || $contraseña === '') {
        header('Location: registro.php?error=Campos+obligatorios');
        exit;
    }

    $hash = password_hash($contraseña, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, contraseña, correo, creacion) VALUES (?, ?, ?, CURDATE())');
        $stmt->execute([$nombre_usuario, $hash, $correo]);
        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        header('Location: registro.php?error=Usuario+o+correo+ya+existe');
        exit;
    }
} else {
    header('Location: registro.php');
    exit;
}
