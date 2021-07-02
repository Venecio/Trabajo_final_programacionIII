<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../estilos/styleindex.css">
    <link rel="stylesheet" href="../../estilos/estilosecundario.css">
    <link rel="shortcut icon" href="../../recursos/favicon.png">
    <link rel="stylesheet" href="../../estilos/estilotabla.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-------->

    <title>Vista de tabla completa</title>
</head>

<body>
    <header>
        <nav class="menucompleto">
            <ul class="menu">
                <a href="../../index.html">
                    <img class="logo" src="../../recursos/Venecio.png" href="index.html" alt="logo">
                </a>
                <li><a href="../../index.html">Inicio</a></li>
                <li><a class="active">Base de datos</a></li>
                <li><a href="../../ejercicios/roman.php">Pasar a numero romano</a></li>
                <li><a href="../../ejercicios/fechacumple.php">Cuanto falta para mi cumpleaños?</a></li>
                <li><a href="">Calcular ▼</a>
                    <ul class="submenu">
                        <li><a href="../../ejercicios/promedionotas.php">Calcular promedios de notas</a></li>
                        <li><a href="../../ejercicios/calculos.php">Calculadora circulo</a></li>
                        <li><a href="../../ejercicios/plazofijo.php">Calcular plazo fijo</a></li>
                    </ul>
                </li>

                <li><a class="info" href="../../visual/contactoform.html"><i class="fa fa-fw fa-envelope "></i>Contacto</a></li>
                <a class="iconos" target="_blank" href="https://github.com/Venecio">
                    <img src="../../recursos/GitHub_Logo_White.png" width="50" height="25" />
                    <a class="iconos" target="_blank" href="https://www.unvime.edu.ar/">
                        <img src="../../recursos/logo-UNVIME-chico.png" width="70" height="40" />
                    </a>
            </ul>
        </nav>
    </header>
    <br>
    <h2 class="tituloprincipal">Estos son los datos que hay actualmente</h2>
    ­<table class="tabla" width="90%">
        <tr>
            <th id="bordes" colspan="10">Lista de productos</th>
        </tr>

        <tr>
            <th colspan="6"></th>
            <th id="bordes" colspan="3">Menu especial</th>

        </tr>
        <tr>

            <th width="10%"></th>
            <th width="10%"></th>
            <th width="10%"></th>
            <th width="10%"></th>
            <th width="10%"></th>
            <th width="10%"></th>
            <th> <a class="link" id="bordes" href="actualizar.php">Actualizar (*)</a></th>
            <th> <a class="link" id="bordes" href="export.php">Exportar (*)</a></th>
            <th>
                <a class="link" id="bordes" href="reset.php">Reset (*)</a>
            </th>

            <?php
            //defino array con los campos de la tabla
            $ordenar = array('producto_id', 'producto_nombre', 'producto_cantidad', 'producto_fvencimiento', 'producto_precio', 'producto_estado');
            $esAsc = isset($_GET['orden']) ? (bool) $_GET['orden'] : 1;
            ?>
        </tr>
        <tr>
            <th id="bordes" class="columnas"><a class="columnas" href="vertabla.php?ordenar=producto_id&orden=<?php echo isset($_GET['orden']) ? !$_GET['orden'] : 1; ?>">ID ▲▼</th>
            <th id="bordes" class="columnas"><a class="columnas" href="vertabla.php?ordenar=producto_nombre&orden=<?php echo isset($_GET['orden']) ? !$_GET['orden'] : 1; ?>">Nombre</th>
            <th id="bordes" class="columnas"><a class="columnas" href="vertabla.php?ordenar=producto_cantidad&orden=<?php echo isset($_GET['orden']) ? !$_GET['orden'] : 1; ?>">Cantidad</th>
            <th id="bordes" class="columnas"><a class="columnas" href="vertabla.php?ordenar=producto_fvencimiento&orden=<?php echo isset($_GET['orden']) ? !$_GET['orden'] : 1; ?>">Fecha caducidad</th>
            <th id="bordes" class="columnas"><a class="columnas" href="vertabla.php?ordenar=producto_precio&orden=<?php echo isset($_GET['orden']) ? !$_GET['orden'] : 1; ?>">Precio</th>
            <th id="bordes" class="columnas"><a class="columnas" href="vertabla.php?ordenar=producto_estado&orden=<?php echo isset($_GET['orden']) ? !$_GET['orden'] : 1; ?>">Estado</th>
            <th id="bordes" colspan="3">Acciones</th>
        </tr>
        <?php
        require("../conexion/conexion.php");
        $order = 'producto_id';
        if (isset($_GET['ordenar']) && in_array($_GET['ordenar'], $ordenar)) {
            $order = $_GET['ordenar'];
           
        }
        if ($_GET['orden']== 1) {
            $query = 'SELECT * FROM pessio_producto ORDER BY ' .  $order . ' ' .($esAsc?"ASC":"DESC");
         } else {
            $query = 'SELECT * FROM pessio_producto ORDER BY ' .  $order . ' ' .($esAsc?"ASC":"DESC");

         }
         $result = mysqli_query($conexion, $query);
        

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $row['producto_id']?></td>
                <td><?php echo $row['producto_nombre'] ?></td>
                <td><?php echo $row['producto_cantidad'] ?></td>
                <td><?php echo date("d-m-Y", strtotime($row['producto_fvencimiento'])) ?></td>
                <td><?php echo "$" . $row['producto_precio'] ?></td>
                <td><?php echo $row['producto_estado'] ?></td>
                <td><?php echo '<a class="modificar" href="' . htmlspecialchars("../../visual/modificarform.php?id=" . urlencode($row['producto_id']))
                        . '" >Modificar</a>' ?></td>
                <td><?php echo '<a class="eliminar" href="' . htmlspecialchars("eliminarproducto.php?id=" . urlencode($row['producto_id']))
                        . '" >Eliminar</a>' ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
<?php
