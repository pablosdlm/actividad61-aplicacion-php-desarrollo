<?php
include('config.php');
$pass = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$sql = "INSERT INTO usuarios (nombre_usuario, contrasena, correo) VALUES ('{$_POST['nombre_usuario']}', '$pass', '{$_POST['correo']}')";
if ($conn->query($sql)) header("Location: login.php");
?>