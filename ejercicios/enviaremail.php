<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['nombre']) && !empty($_POST['nombre']) && (isset($_POST['email']) && !empty($_POST['email']) && (isset($_POST['asunto']) && !empty($_POST['asunto']) && (isset($_POST['mensaje']) && !empty($_POST['mensaje']))))) {
    require '../recursos/phpmailer/Exception.php';
    require '../recursos/phpmailer/PHPMailer.php';
    require '../recursos/phpmailer/SMTP.php';

    $nombre = $_POST['nombre'];
    $from = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $mail = new PHPMailer(true);

    try {
        //Server settings
       // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('cjpuniversidad@gmail.com', $nombre);

        if (isset($_POST['correo_cristian']) && !empty($_POST['correo_cristian']) && (isset($_POST['otrocorreo']) && !empty($_POST['otrocorreo']))) {
            $emailcristian = "@correoaenviar";
            $correosecundario = $_POST['otroemail'];
            $mail->addAddress($emailcristian, 'Cristian');
            $mail->addAddress($correosecundario);
        } elseif (isset($_POST['correo_cristian']) && !empty($_POST['correo_cristian'])) {
            $emailcristian = "@correoaenviar";
            $mail->addAddress($emailcristian, 'Cristian');
        } elseif (isset($_POST['otrocorreo']) && !empty($_POST['otrocorreo']) && !empty($_POST['otroemail'])) {
            $correosecundario = $_POST['otroemail'];
            $mail->addAddress($correosecundario);
        }


        //Attachments 
        $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body = $mensaje . "<br>" . "<br>" . "<br>" . $from;

        if($mail->send()){
            $mensaje="Correo enviado!";
            $mensaje = urlencode($mensaje);
            header("Location:../visual/contactoform.php?alerta=$mensaje");
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
