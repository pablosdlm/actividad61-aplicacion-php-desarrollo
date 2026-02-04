<?php
require 'config.php';

$stmt = $pdo->query('SELECT * FROM clasificacion ORDER BY puntos DESC, nombre ASC');
$pilotos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clasificación F1 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <header class="topbar">
        <h1>Clasificación F1 2025</h1>
        <div>
            <?php if (is_logged_in()): ?>
                <span>Hola, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></span>
                <a class="btn" href="add.php">Añadir piloto</a>
                <a class="btn" href="logout.php">Cerrar sesión</a>
            <?php else: ?>
                <a class="btn" href="login.php">Iniciar sesión</a>
                <a class="btn" href="registro.php">Registrarse</a>
            <?php endif; ?>
        </div>
    </header>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Piloto</th>
            <th>Dorsal</th>
            <th>Puntos</th>
            <th>Escudería</th>
            <th>Nacionalidad</th>
            <?php if (is_logged_in()): ?>
                <th>Acciones</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($pilotos as $index => $p): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($p['nombre'] . ' ' . $p['apellidos']); ?></td>
                <td><?php echo (int)$p['dorsal']; ?></td>
                <td><?php echo (int)$p['puntos']; ?></td>
                <td><?php echo htmlspecialchars($p['escuderia']); ?></td>
                <td><?php echo htmlspecialchars($p['nacionalidad']); ?></td>
                <?php if (is_logged_in()): ?>
                    <td>
                        <a href="edit.php?piloto_id=<?php echo $p['piloto_id']; ?>">Editar</a> |
                        <a href="delete.php?piloto_id=<?php echo $p['piloto_id']; ?>"
                           onclick="return confirm('¿Seguro que quieres eliminar este piloto?');">Eliminar</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
