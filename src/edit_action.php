<?php
include('config.php');
$conn->query("UPDATE clasificacion SET puntos={$_POST['puntos']} WHERE piloto_id={$_POST['piloto_id']}");
header("Location: home.php");
?>