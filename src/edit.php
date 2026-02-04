<?php
require 'config.php';
require_login();

$piloto_id = isset($_GET['piloto_id']) ? (int)$_GET['piloto_id'] : 0;
$stmt = $pdo->prepare('SELECT * FROM clasificacion WHERE piloto_id = ?');
$stmt->execute([$piloto_id]);
$piloto = $stmt->fetch();

if (!$piloto) {
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar piloto - F1 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Editar piloto</h1>
    <form action="edit_action.php" method="post">
        <input type="hidden" name="piloto_id" value="<?php echo $piloto['piloto_id']; ?>">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($piloto['nombre']); ?>" required>
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo htmlspecialchars($piloto['apellidos']); ?>" required>
        <label>Dorsal</label>
        <input type="number" name="dorsal" value="<?php echo (int)$piloto['dorsal']; ?>" required>
        <label>Puntos</label>
        <input type="number" name="puntos" value="<?php echo (int)$piloto['puntos']; ?>" required>
        <label>Escudería</label>
        <input type="text" name="escuderia" value="<?php echo htmlspecialchars($piloto['escuderia']); ?>" required>
        <label>Nacionalidad</label>
        <input type="text" name="nacionalidad" value="<?php echo htmlspecialchars($piloto['nacionalidad']); ?>" required>
        <button type="submit">Actualizar</button>
        <a class="btn" href="home.php">Volver</a>
    </form>
</div>
</body>
</html>
