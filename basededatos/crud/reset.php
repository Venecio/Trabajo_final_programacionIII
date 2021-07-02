<?php
require("../conexion/conexion.php");
$borratabla= "DROP TABLE pessio_producto";
$result = mysqli_query($conexion, $borratabla);
$consulta = "CREATE TABLE pessio_producto 
								(producto_id int AUTO_INCREMENT PRIMARY KEY,
								producto_nombre varchar(32),
								producto_cantidad int(11),
								producto_fvencimiento date,
								producto_precio float,
                                producto_estado varchar(32)
                                )";
$result = mysqli_query($conexion, $consulta);


$archivo = "datos.csv";
if (!file_exists($archivo)) {
    echo "El archivo no existe..";
} else {

    $abrearchivo = fopen($archivo,"r");
    $contador = 0;
    while (!feof($abrearchivo)) {
        $lineacompleta = fgets($abrearchivo);
        if ($contador == 0) {
            $arreglo = explode(";", $lineacompleta);
            for ($i = 1; $i < count($arreglo); $i++) 
                if ($i == 1)
                    $tituloscampos = $arreglo[1];
                else
                    $tituloscampos = $tituloscampos . ", " . $arreglo[$i];
            
        } else {
            $arreglo2 = explode(";", $lineacompleta);
            for ($i = 1; $i < count($arreglo); $i++) {
                if ($i == 1)
                    $valores = "'" . $arreglo2[1] . "'";
                else
                    $valores = $valores . ", '" . $arreglo2[$i] . "'";
            }
            $consulta = "INSERT INTO pessio_producto (" . $tituloscampos . ") VALUES (" . $valores . ")";
            $resultado = mysqli_query($conexion, $consulta);
        }
        $contador++;
    }
    fclose($abrearchivo);
}
//Para que ordene apenas resetee
header('Location: vertabla.php?ordenar=producto_id&orden=1');
