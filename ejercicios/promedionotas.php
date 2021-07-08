<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <link rel="stylesheet" href="../estilos/estilosecundario.css">
    <link rel="stylesheet" href="../estilos/estilosformularios.css">
    <link rel="stylesheet" href="../estilos/estilosresultados.css">
    <link rel="shortcut icon" href="../recursos/favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular promedio de notas</title>
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
                        <li><a class="active">Calcular promedios de notas</a></li>
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
    <h1 class="titulos">Ingrese <span class="span">notas</span> separadas por un espacio</h1>
    <form method="POST">
        
        <input class="inputnotas" type="text" name="notas" placeholder="00 0 0,0 00"><br>
        <input class="boton"  type="submit" name="enviar" value="Calcular">
    </form>
    <footer>
        <p class="autor">Pagina realizada por Cristian Pessio - Analista de sistemas en información</p>

    </footer>

</body>

</html>
<?php
if (isset($_POST['enviar']) && !empty($_POST['notas'])){
$notas = $_POST['notas'] ?? "";
$arreglo = array();
for ($i = 0; $i <= count($arreglo); $i++) {
    $arreglo = explode(" ", $notas);
}

$tamanioarray = count($arreglo);
$dividepromedio = array_sum($arreglo) / $tamanioarray;
$dosdecimales = number_format($dividepromedio, 2);
echo '<div class="resultadosphppromedio">Suma de las notas ingresadas = ' . '<span class"notacolor">'.array_sum($arreglo).'<span>' . '</div>'."<br>"."<br>";
echo '<div class="resultadosphppromedio">El promedio es = ' . $dosdecimales . '</div>';
}