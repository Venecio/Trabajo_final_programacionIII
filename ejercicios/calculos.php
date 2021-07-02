<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <link rel="stylesheet" href="../estilos/estilosecundario.css">
    <link rel="shortcut icon" href="../recursos/favicon.png">
    <link rel="stylesheet" href="../estilos/estilosformularios.css">
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
                <li><a class="active">Calcular ▼</a>
                    <ul class="submenu">
                        <li><a href="../ejercicios/promedionotas.php">Calcular promedios de notas</a></li>
                        <li><a class="active">Calculadora circulo</a></li>
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
    <h1 class="titulos">Ingrese radio de circulo</h1>
    <form method="POST">
        <label>Ingrese numero</label><br>
        <input class="input"type="number" step="any" name="numero"><br>
        <input class="boton" type="submit" name="guardar" value="Enviar">
    </form>
    <footer>
        <p class="autor">Pagina realizada por Cristian Pessio - Analista de sistemas en información</p>
    </footer>

</body>
</html>
<?php
$numero = $_POST['numero'] ?? "";
function propiedadescirculo($numero)
{
    $diametro = 2 * $numero;
    $circunsferencia = pi() * $diametro;
    $superficie = (pi() * $numero) * $numero;
    echo "Radio = $numero<br>";
    echo "Diametro = $diametro<br>";
    echo "Circunsferencia = " . number_format($circunsferencia, 3) . "<br>";
    echo "Superficie = " . number_format($superficie, 3);
}
echo propiedadescirculo($numero);
?>