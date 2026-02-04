<?php
require 'config.php';
require_login();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir piloto - F1 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Añadir piloto</h1>
    <form action="add_action.php" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre" required>
        <label>Apellidos</label>
        <input type="text" name="apellidos" required>
        <label>Dorsal</label>
        <input type="number" name="dorsal" required>
        <label>Puntos</label>
        <input type="number" name="puntos" value="0" required>
        <label>Escudería</label>
        <input type="text" name="escuderia" required>
        <label>Nacionalidad</label>
        <input type="text" name="nacionalidad" required>
        <button type="submit">Guardar</button>
        <a class="btn" href="home.php">Volver</a>
    </form>
</div>
</body>
</html>
