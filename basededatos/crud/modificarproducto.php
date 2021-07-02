<?php
require "../conexion/conexion.php";

if (isset($_POST['enviar'])) {
    $id = $_POST['id'] ?? "";
    $pr_nombre = $_POST['nombre'] ?? ""; //pr = producto 
    $pr_cantidad = $_POST['cantidad'] ?? "";
    $pr_fvencimiento = $_POST['fvencimiento'] ?? "";
    $pr_precio = $_POST['precio'] ?? "";
    $pr_estado = $_POST['estado'] ?? "";
    mysqli_query($conexion, "UPDATE pessio_producto 
    SET producto_nombre = '$pr_nombre',producto_cantidad = '$pr_cantidad',producto_fvencimiento='$pr_fvencimiento',producto_precio='$pr_precio',producto_estado='$pr_estado'
    WHERE producto_id= '$id'");
}
header('Location: vertabla.php?ordenar=producto_id&orden=1');