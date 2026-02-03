<?php include('config.php'); if(!isset($_SESSION['user'])) header("Location: index.php"); ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="styles.css"><title>Admin F1</title></head>
<body>
    <h1>Panel de Control - F1 2025</h1>
    <p>Bienvenido, <?php echo $_SESSION['user']; ?> | <a href="logout.php">Salir</a></p>
    <a href="add.php" class="btn">Añadir Piloto</a>
    <table>
        <tr><th>Piloto</th><th>Puntos</th><th>Acciones</th></tr>
        <?php
        $res = $conn->query("SELECT * FROM clasificacion ORDER BY puntos DESC");
        while($f = $res->fetch_assoc()) {
            echo "<tr>
                <td>{$f['nombre']} {$f['apellidos']}</td>
                <td>{$f['puntos']}</td>
                <td>
                    <a href='edit.php?id={$f['piloto_id']}' class='btn'>Editar</a>
                    <a href='delete.php?id={$f['piloto_id']}' class='btn btn-del'>Eliminar</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>