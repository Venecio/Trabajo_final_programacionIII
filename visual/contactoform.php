<?php
if (isset($_GET['alerta'])) {
    $mensaje=$_GET['alerta'];
    echo "<script type='text/javascript'>alert('$mensaje');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <link rel="stylesheet" href="../estilos/estilosecundario.css">
    <link rel="shortcut icon" href="../recursos/favicon.png">
    <link rel="stylesheet" href="../estilos/estiloFormularioEmail.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Email</title>
</head>

<body>
    <header>
        <nav class="menucompleto">
            <ul class="menu">
                <a href="../index.html">
                    <img class="logo" src="../recursos/Venecio.png" href="../index.html" alt="logo">
                </a>
                <li><a href="../index.html">Inicio</a></li>
                <li><a id="testo" href="../basededatos/crud/vertabla.php?ordenar=producto_id&orden=1">Base de datos</a>
                </li>
                <li><a href="../basededatos/crud/export.php">Pasar a numero romano</a></li>
                <li><a href="../ejercicios/fechacumple.php">Cuanto falta para mi cumpleaños?</a></li>
                <li><a href="">Calcular ▼</a>
                    <ul class="submenu">
                        <li><a href="../ejercicios/promedionotas.php">Calcular promedios de notas</a></li>
                        <li><a href="../ejercicios/calculos.php">Calculadora circulo</a></li>
                        <li><a href="../ejercicios/plazofijo.php">Calcular plazo fijo</a></li>
                    </ul>
                </li>

                <li><a class="active" href="../visual/contactoform.html"><i class="fa fa-fw fa-envelope "></i>Contacto</a>
                </li>
                <a class="iconos" target="_blank" href="https://github.com/Venecio">
                    <img src="../recursos/GitHub_Logo_White.png" width="50" height="25" />
                    <a class="iconos" target="_blank" href="https://www.unvime.edu.ar/">
                        <img src="../recursos/logo-UNVIME-chico.png" width="70" height="40" />
                    </a>
            </ul>
        </nav>
    </header>
    <h3 class="titulo">Enviar un <span class="titulomail">correo</span></h3>
    <div class="contenido">
        <div class="formulario">
            <form action="../ejercicios/enviaremail.php" enctype="multipart/form-data" method="POST">
                <p>
                    <label>Nombre</label>
                    <input class="inputs" type="text" name="nombre" required>
                </p>
                <p>
                    <label>Su correo</label>
                    <input class="inputs" type="email" name="email" required>
                </p>
                <p class="block">
                    <label>Enviar a:</label><br>
                    <label>Cristian:</label>
                    <input class="inputs" type="checkbox" name="correo_cristian">
                    <label>Otro:</label>
                    <input class="inputs" type="checkbox" name="otrocorreo">
                    <input class="inputs" type="email" name="otroemail" placeholder="Si selecciono Otro ingrese correo acá">
                </p>
                <p class="block">
                    <label>Asunto</label>
                    <input class="inputs" type="text" name="asunto" required>
                </p>
                <p class="block">
                    <label>Subir archivo</label>
                    <input type="file" name="file" required>
                </p>
                <p class="block">
                    <label>Mensaje</label>
                    <textarea name="mensaje" required></textarea>
                </p>

                <p class=boton>
                    <input type="submit" name="enviar" value="Enviar">
                </p>
            </form>
        </div>
    </div>

</body>

</html>