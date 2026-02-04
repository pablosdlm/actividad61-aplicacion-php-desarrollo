<?php
session_start();

$host = 'mariadb'; // o 'localhost' según tu contenedor
$db   = 'motorsport';
$user = 'usuarioPaSa';
$pass = 'PabloSainz@2006'; // ajusta a tu configuración
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

function is_logged_in() {
    return isset($_SESSION['usuario_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}
