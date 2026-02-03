<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="styles.css"><title>F1 2025</title></head>
<body>
    <h1>Clasificación F1 2025</h1>
    <a href="login.php" class="btn">Login</a> <a href="registro.php" class="btn">Registro</a>
    <table>
        <tr><th>Piloto</th><th>Dorsal</th><th>Escudería</th><th>Puntos</th></tr>
        <?php
        $res = $conn->query("SELECT * FROM clasificacion ORDER BY puntos DESC");
        while($f = $res->fetch_assoc()) echo "<tr><td>{$f['nombre']} {$f['apellidos']}</td><td>{$f['dorsal']}</td><td>{$f['escuderia']}</td><td>{$f['puntos']}</td></tr>";
        ?>
    </table>
</body>
</html>