<?php
require("../conexion/conexion.php");
$consulta = "SELECT * FROM pessio_producto";
$result = mysqli_query($conexion, $consulta);
$i = 0;
$hoy = time();
while ($row = mysqli_fetch_array($result)) {

    $fechas[$i] = $row['producto_fvencimiento'];
    $ids[$i] = $row['producto_id'];
    if ($hoy >= strtotime($fechas[$i])) {
        mysqli_query($conexion, "UPDATE pessio_producto 
    SET producto_estado='Vencido'
    WHERE producto_id='$ids[$i]'");
    } else {
        mysqli_query($conexion, "UPDATE pessio_producto 
    SET producto_estado='Vigente'
    WHERE producto_id='$ids[$i]'");
    }
    $i++;
}
header('Location: vertabla.php?ordenar=producto_id&orden=1');
?>