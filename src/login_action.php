<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $correo = $_POST['correo'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Buscar usuario por correo
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE correo = ?');
    $stmt->execute([$correo]);
    $user = $stmt->fetch();

    // Verificar password
    if ($user && password_verify($contrasena, $user['contrasena'])) {
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
