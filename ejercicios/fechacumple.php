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
                <li><a href="../ejercicios/roman.php">Pasar a numero romano</a></li>
                <li><a class="active">Cuanto falta para mi cumpleaños?</a></li>
                <li><a href="">Calcular ▼</a>
                    <ul class="submenu">
                        <li><a href="../ejercicios/promedionotas.php">Calcular promedios de notas</a></li>
                        <li><a href="../ejercicios/calculos.php">Calculadora circulo</a></li>
                        <li><a href="../ejercicios/plazofijo.php">Calcular plazo fijo</a></li>
                    </ul>
                </li>

                <li><a class="info" href="#"><i class="fa fa-fw fa-envelope "></i>Contacto</a></li>
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
    <h1 class="titulos">Ingrese fecha de su cumpleaños</h1>
    <form method="POST">
        <input class="input"type="date" name="fecha" placeholder="yyyy/mm/dd"><br>
        <input class="boton"type="submit" name="enviar" value="Enviar">
    </form>

</body>

</html>
<?php
date_default_timezone_set('America/Argentina/San_Luis');
$fechaingresada = $_POST['fecha'] ?? "";;

$hoy = date("Y-m-d");

function diferenciafechas($hoy, $fechaingresada)
{
    if ($hoy >= $fechaingresada) {
        $segundosxdia = 60 * 60 * 24;
        $diferencia = strtotime($hoy) - strtotime($fechaingresada);
        $dias = intval($diferencia / $segundosxdia);
        echo '<div class="resultadosphpcumple">Ya pasó tu cumpleaños, fue hace ' . $dias . ' dia/s :(</div>';
    } else {
        $segundosxdia = 60 * 60 * 24;
        $diferencia = strtotime($fechaingresada) - strtotime($hoy);
        $dias = intval($diferencia / $segundosxdia);
        echo "¡¡Faltan " . $dias . " dia/s para tu cumpleaños!! <br>";
    }
}
if (isset($_POST['enviar']) && !empty($_POST['fecha'])){
    echo diferenciafechas($hoy, $fechaingresada);
}
