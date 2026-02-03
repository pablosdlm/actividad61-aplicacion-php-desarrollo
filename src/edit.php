<?php 
include('config.php');
$id = $_GET['id'];
$p = $conn->query("SELECT * FROM clasificacion WHERE piloto_id=$id")->fetch_assoc();
?>
<form action="edit_action.php" method="POST">
    <input type="hidden" name="piloto_id" value="<?php echo $id; ?>">
    <input type="number" name="puntos" value="<?php echo $p['puntos']; ?>">
    <button type="submit" class="btn">Actualizar Puntos</button>
</form>