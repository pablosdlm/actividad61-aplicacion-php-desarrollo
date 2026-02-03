<?php
include('config.php');
$user = $_POST['nombre_usuario'];
$pass = $_POST['contrasena'];
$res = $conn->query("SELECT * FROM usuarios WHERE nombre_usuario='$user'");
if ($u = $res->fetch_assoc()) {
    if (password_verify($pass, $u['contrasena'])) {
        $_SESSION['user'] = $user;
        header("Location: home.php");
    }
}
echo "Error de acceso";
?>