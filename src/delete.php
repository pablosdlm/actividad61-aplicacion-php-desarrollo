<?php
include('config.php');
$conn->query("DELETE FROM clasificacion WHERE piloto_id={$_GET['id']}");
header("Location: home.php");
?>