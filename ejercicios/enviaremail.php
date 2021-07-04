<?php
if (isset($_POST['nombre']) && !empty($_POST['nombre']) && (isset($_POST['apellido']) && !empty($_POST['apellido']) && (isset($_POST['email']) && !empty($_POST['email'])&& (isset($_POST['asunto']) && !empty($_POST['asunto'])&& (isset($_POST['mensaje']) && !empty($_POST['mensaje'])))))) {
$to='cristianpessio11@gmail.com';
$subject=$_POST['asunto'];
$message=$_POST['mensaje'];
$headers=$_POST['email'];
mail($to, $subject, $message, $headers);

} else {
    echo "Algo se rompio";
}
?>