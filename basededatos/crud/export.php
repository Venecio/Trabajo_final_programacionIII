<?php
require("../conexion/conexion.php"); 

$output = fopen("contenido.csv", "w");  
fputcsv($output, array('producto_id', 'producto_nombre', 'producto_cantidad', 'producto_fvencimiento', 'producto_precio', 'producto_estado'));  
$query = "SELECT * from pessio_producto";  
$result = mysqli_query($conexion, $query);  
while($row = mysqli_fetch_assoc($result))  
{  
     fputcsv($output, $row);  
}  

fclose($output);
header("Location: vertabla.php");  
header("Location: contenido.csv");
?>  