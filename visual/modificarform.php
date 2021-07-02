<?php
require("modificartabla.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../estilos/estilotabla.css">
    <link rel="stylesheet" href="../estilos/estilosformularios.css">
    <title>Modificar un campo</title>
</head>

<body>
    <div class="div">
        <form action="../basededatos/crud/modificarproducto.php" method="POST">
            <input type="number" name="id" value="<?php echo $id = $_REQUEST['id'] ?>" hidden><br>
            <label>Nombre </label><br>
            <input class="input" type="text" name="nombre"><br>
            <label>Cantidad </label><br>
            <input class="input" type="text" name="cantidad"><br>
            <label>Fecha de vencimiento </label><br>
            <input class="input" type="date" name="fvencimiento"><br>
            <label>Precio </label><br>
            <input class="input" type="number" min=1 step="0.01" name="precio"><br>
            <label>Estado de producto </label><br>
            <input class="input" type="text" name="estado"><br>
            <input class="boton" type="submit" name="enviar" value="Aplicar">
            <button class="boton" href="../basededatos/crud/vertabla.php">Volver </button>
        </form>
    </div>
</body>
</html>