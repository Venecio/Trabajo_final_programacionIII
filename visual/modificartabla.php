<!DOCTYPE html>
<html lang="en">

<head>
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-------->
    <link rel="stylesheet" href="../estilos/estilotabla.css">
    <link rel="stylesheet" href="../estilos/estilosformularios.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1 class="titulos">Datos de la tabla seleccionada</h1>
    <table>
        <th id="bordes" class="columnas">ID</th>
        <th id="bordes" class="columnas">Nombre</th>
        <th id="bordes" class="columnas">Cantidad</th>
        <th id="bordes" class="columnas">Fecha caducidad</th>
        <th id="bordes" class="columnas">Precio</th>
        <th id="bordes" class="columnas">Estado</th>
        <?php
        $id = $_REQUEST['id'];
        require("../basededatos/conexion/conexion.php");
        $consulta = "SELECT * FROM pessio_producto WHERE producto_id = '$id'";
        $result = mysqli_query($conexion, $consulta);

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $row['producto_id'] ?></td>
                <td><?php echo $row['producto_nombre'] ?></td>
                <td><?php echo $row['producto_cantidad'] ?></td>
                <td><?php echo date("d-m-Y", strtotime($row['producto_fvencimiento'])) ?></td>
                <td><?php echo "$" . $row['producto_precio'] ?></td>
                <td class="testi"><?php echo $row['producto_estado'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>