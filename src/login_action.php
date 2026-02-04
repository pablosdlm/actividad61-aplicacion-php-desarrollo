<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $correo = $_POST['correo'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    // Buscar usuario por correo
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE correo = ?');
    $stmt->execute([$correo]);
    $user = $stmt->fetch();

    // Verificar contraseña
    if ($user && password_verify($contraseña, $user['contraseña'])) {
        $_SESSION['usuario_id'] = $user['usuario_id'];
        $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
        $_SESSION['correo'] = $user['correo'];

        header('Location: home.php');
        exit;
    } else {
        header('Location: login.php?error=1');
        exit;
    }

} else {
    header('Location: login.php');
    exit;
}
