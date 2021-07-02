<?php
if (isset($_POST['nombre']) && !empty($_POST['nombre']) && (isset($_POST['apellido']) && !empty($_POST['apellido']) && (isset($_POST['email']) && !empty($_POST['email'])&& (isset($_POST['asunto']) && !empty($_POST['asunto'])&& (isset($_POST['mensaje']) && !empty($_POST['mensaje'])))))) {
$to= 'cristianpessio11@gmail.com';
$subject=$_POST['asunto'];
$message=$_POST['mensaje'];
$headers=$_POST['email']."X.Mailer:PHP/".phpversion();

mail($to, $subject, $message, $headers);




} else {
    
    echo "Algo se rompio";
    
    
}












/*
$to = "destinatario@email.com, destinatario2@email.com, destinatario3@email.com";
$subject = "Asunto del email";
$message = "Este es mi primer envío de email con PHP";
$headers = "From: mi@cuentadeemail.com" . "\r\n" . "CC: destinatarioencopia@email.com";

mail($to, $subject, $message, $headers);
1
2
3
4
5
6
$to = "destinatario@email.com, destinatario2@email.com, destinatario3@email.com";
$subject = "Asunto del email";
$message = "Este es mi primer envío de email con PHP";
$headers = "From: mi@cuentadeemail.com" . "\r\n" . "CC: destinatarioencopia@email.com";
 
mail($to, $subject, $message, $headers);*/