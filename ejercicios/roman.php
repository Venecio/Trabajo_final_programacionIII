<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <link rel="stylesheet" href="../estilos/estilosecundario.css">
    <link rel="shortcut icon" href="../recursos/favicon.png">
    <link rel="stylesheet" href="../estilos/estilosformularios.css">
    <link rel="stylesheet" href="../estilos/estilosresultados.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasar a numero romano</title>
</head>

<body>
    <header>
        <nav class="menucompleto">
            <ul class="menu">
                <a href="../index.html">
                    <img class="logo" src="../recursos/Venecio.png" href="index.html" alt="logo">
                </a>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../basededatos/crud/vertabla.php?ordenar=producto_id&orden=1">Base de datos</a></li>
                <li><a class="active">Pasar a numero romano</a></li>
                <li><a href="../ejercicios/fechacumple.php">Cuanto falta para mi cumpleaños?</a></li>
                <li><a href="">Calcular ▼</a>
                    <ul class="submenu">
                        <li><a href="../ejercicios/promedionotas.php">Calcular promedios de notas</a></li>
                        <li><a href="../ejercicios/calculos.php">Calculadora circulo</a></li>
                        <li><a href="../ejercicios/plazofijo.php">Calcular plazo fijo</a></li>
                    </ul>
                </li>

                <li><a class="info" href="../visual/contactoform.php"><i class="fa fa-fw fa-envelope "></i>Contacto</a></li>
                <a class="iconos" target="_blank" href="https://github.com/Venecio">
                    <img src="../recursos/GitHub_Logo_White.png" width="50" height="25" />
                    <a class="iconos" target="_blank" href="https://www.unvime.edu.ar/">
                        <img src="../recursos/logo-UNVIME-chico.png" width="70" height="40" />
                    </a>
            </ul>
        </nav>
    </header>
    <footer>
        <p class="autor">Pagina realizada por Cristian Pessio - Analista de sistemas en información</p>

    </footer>
    </header>
    <h1 class="titulos">Ingrese <span class="span">número</span> a convertir</h1>
    <form method="POST" action="">
        <input class="input" type="number" name="numero" max="3999"><br>
        <input class="boton" type="submit" value="Enviar">
    </form>
</body>

</html>
<?php
$numero = intval($_POST['numero'] ?? "");
$unidad = $numero % 10;$numero = $numero / 10;
$decena = $numero % 10;$numero = $numero / 10;
$centena = $numero % 10;$numero = $numero / 10;
$millar = $numero % 10;$numero = $numero / 10;
switch ($millar) {
    case 1:
        echo '<div class="resultadosphproman">M</div>';
        break;
    case 2:
        echo '<div class="resultadosphproman">MM</div>';
        break;
    case 3:
        echo '<div class="resultadosphproman">MMM</div>';
        break;
}
switch ($centena) {
    case 1:
        echo '<div class="resultadosphproman">C</div>';
        break;
    case 2:
        echo '<div class="resultadosphproman">C</div>';
        break;
    case 3:
        echo '<div class="resultadosphproman">CCC</div>';
        break;
    case 4:
        echo '<div class="resultadosphproman">CD</div>';
        break;
    case 5:
        echo '<div class="resultadosphproman">D</div>';
        break;
    case 6:
        echo '<div class="resultadosphproman">DC</div>';
        break;
    case 7:
        echo '<div class="resultadosphproman">DCC</div>';
        break;
    case 8:
        echo '<div class="resultadosphproman">DCCC</div>';
        break;
    case 9:
        echo '<div class="resultadosphproman">CM</div>';
        break;
}
switch ($decena) {
    case 1:
        echo '<div class="resultadosphproman">X</div>';
        break;
    case 2:
        echo '<div class="resultadosphproman">XX</div>';
        break;
    case 3:
        echo '<div class="resultadosphproman">XXX</div>';
        break;
    case 4:
        echo '<div class="resultadosphproman">XL</div>';
        break;
    case 5:
        echo '<div class="resultadosphproman">L</div>';
        break;
    case 6:
        echo '<div class="resultadosphproman">LX</div>';
        break;
    case 7:
        echo '<div class="resultadosphproman">LXX</div>';
        break;
    case 8:
        echo '<div class="resultadosphproman">LXXX</div>';
        break;
    case 9:
        echo '<div class="resultadosphproman">XC</div>';
        break;
}
switch ($unidad) {
    case 1:
        echo '<div class="resultadosphproman">I</div>';
        break;
    case 2:
        echo '<div class="resultadosphproman">II</div>';
        break;
    case 3:
        echo '<div class="resultadosphproman">III</div>';
        break;
    case 4:
        echo '<div class="resultadosphproman">IV</div>';
        break;
    case 5:
        echo '<div class="resultadosphproman">V</div>';
        break;
    case 6:
        echo '<div class="resultadosphproman">VI</div>';
        break;
    case 7:
        echo '<div class="resultadosphproman">VII</div>';
        break;
    case 8:
        echo '<div class="resultadosphproman">VIII</div>';
        break;
    case 9:
        echo '<div class="resultadosphproman">IX</div>';
        break;
}
?>