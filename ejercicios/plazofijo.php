<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <link rel="stylesheet" href="../estilos/estilosecundario.css">
    <link rel="shortcut icon" href="../recursos/favicon.png">
    <link rel="stylesheet" href="../estilos/estilosformularios.css">
    <link rel="stylesheet" href="../estilos/estilosresultados.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plazo fijo</title>
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
                <li><a href="../ejercicios/fechacumple.php">Cuanto falta para mi cumpleaños?</a></li>
                <li><a href="" class="active">Calcular ▼</a>
                    <ul class="submenu">
                        <li><a href="../ejercicios/promedionotas.php">Calcular promedios de notas</a></li>
                        <li><a href="../ejercicios/calculos.php">Calculadora circulo</a></li>
                        <li><a class="active">Calcular plazo fijo</a></li>
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
    <form method="POST">
        <label> Ingrese su capital</label>
        <input class="input" type="number" name="capital" placeholder="$$">
        <label> Ingrese el interes (sin %)</label>
        <input class="input" type="number" name="interes">
        <label> Ingrese el plazo</label>
        <input class="input" type="number" name="plazo" min=7 max=90 placeholder="7/30/60 o 90 dias">
        <input class="boton" type="submit" name="enviar" value="Calcular">
    </form>
    <footer>
        <p class="autor">Pagina realizada por Cristian Pessio - Analista de sistemas en información</p>

    </footer>

</body>

</html>
<?php
date_default_timezone_set('America/Argentina/San_Luis');
if (isset($_POST['enviar'])) {
    $capital = $_POST['capital'] ?? "";
    $interes = $_POST['interes'] / 100 ?? "";
    $plazo = $_POST['plazo'] ?? "";
    function plazofijo($capital, $interes, $plazo)
    {
        $hoy = time();
        $segundosxdia = 60 * 60 * 24;
        $diaUnix = $plazo * $segundosxdia;
        $fechavencimiento = $hoy + $diaUnix;
        $fvenc = date("d-m-Y", $fechavencimiento);
        $interesganado = $capital * ($interes * $plazo / 365);
        $montototal = intval($interesganado + $capital);
        $nfvenc = date("w", $fechavencimiento); //numero de semana que termine la fecha de vencimiento 0D,1L,2M,3M,4J,5V,6S
        if ($nfvenc == 0) {
            $nfvenc = $fechavencimiento + $segundosxdia;
            $fecha = date("d-m-Y", $nfvenc);
            $arreglo = array(
                'capital_total' => "$montototal",
                'interes_aplicado' => "$interes",
                'vencimiento' => "$fecha"
            );
            $interes=$arreglo["interes_aplicado"] * 100; //para imprimir valor completo
            echo '<div class="plazofijo" style="font-size: 1.2rem">Capital total: ' . '<span class="valores">' . "$" . $arreglo["capital_total"] . '</span>' . '</div>'."<br>";
            echo '<div class="plazofijo" style="font-size: 1.2rem">Interes: ' . '<span class="valores">' . $interes ."%". '</span>' . '</div>'."<br>";
            echo '<div class="plazofijo" style="font-size: 1.2rem">Fecha vencimiento: ' . '<span class="valores">' . $arreglo["vencimiento"] . '</span>' . '</div>';
        } elseif ($nfvenc == 6) {
            $nfvenc = $fechavencimiento + 2 * $segundosxdia;
            $fecha = date("d-m-Y", $nfvenc);
            $arreglo = array(
                'capital_total' => "$montototal",
                'interes_aplicado' => "$interes",
                'vencimiento' => "$fecha" //fecha vencimiento
            );
            $interes=$arreglo["interes_aplicado"] * 100;
            echo '<div class="plazofijo" style="font-size: 1.2rem">Capital total: ' . '<span class="valores">' ."$". $arreglo["capital_total"] . '</span>' . '</div>'."<br>";
            echo '<div class="plazofijo" style="font-size: 1.2rem">Interes: ' . '<span class="valores">' . $interes ."%". '</span>' . '</div>'."<br>";
            echo '<div class="plazofijo" style="font-size: 1.2rem">Fecha vencimiento: ' . '<span class="valores">' . $arreglo["vencimiento"] . '</span>' . '</div>';
        } else {
            $arreglo = array(
                'capital_total' => "$montototal",
                'interes_aplicado' => "$interes",
                'vencimiento' => "$fvenc"
            );
            $interes=$arreglo["interes_aplicado"] * 100;
            echo '<div class="plazofijo" style="font-size: 1.2rem">Capital total: ' . '<span class="valores">' ."$". $arreglo["capital_total"] . '</span>' . '</div>'."<br>";
            echo '<div class="plazofijo" style="font-size: 1.2rem">Interes: ' . '<span class="valores">' . $interes ."%". '</span>' . '</div>'."<br>";
            echo '<div class="plazofijo" style="font-size: 1.2rem">Fecha vencimiento: ' . '<span class="valores">' . $arreglo["vencimiento"] . '</span>' . '</div>';
        }
    }
    echo plazofijo($capital, $interes, $plazo);
}
