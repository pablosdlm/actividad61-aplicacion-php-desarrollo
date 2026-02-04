<?php require 'config.php'; ?>

<?php
$error = isset($_GET['error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - F1 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">

    <h1>Iniciar sesión</h1>

    <?php if ($error): ?>
        <p class="error">Correo o contraseña incorrectos.</p>
    <?php endif; ?>

    <form action="login_action.php" method="post">
        <label>Correo electrónico</label>
        <input type="email" name="correo" required>

        <label>Contraseña</label>
        <input type="password" name="contraseña" required>

        <button type="submit">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>

</div>
</body>
</html>
