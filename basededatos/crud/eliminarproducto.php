<?php
require "../conexion/conexion.php";
$id = $_REQUEST['id'];
mysqli_select_db($conexion, $bd_name) or die(mysqli_error($db_name));
mysqli_query($conexion, "DELETE FROM pessio_producto WHERE producto_id= '$id'");

header("Location: vertabla.php?ordenar=producto_id&orden=1");
?>