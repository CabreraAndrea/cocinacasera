<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$mensaje = $_POST['mensaje'];

$body = "Nombre: " . $nombre .  "<br>Correo: " . $correo . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

 

//mandar correo
       

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0 ;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'consultas@cocinacasera.website';                     //SMTP username
    $mail->Password   = 'Andrea0376#';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('consultas@cocinacasera.website', 'Mailer');
    $mail->addAddress('consultas@cocinacasera.website', 'Mailer');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Correo de contacto';
    $mail->Body    = 'Nombre: ' . $nombre . '<br/>Correo: ' . $correo . '<br/>' . $mensaje;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script> 
        alert ("El mensaje se envió con éxito");
        window.history.go(-1);
        </script>';

} catch (Exception $e) {
    echo 'Hubo un error: ' , $mail->ErrorInfo;}

?>