<?php
$nombre = $_POST["nombre"]; 
$correo = $_POST["correo"]; 
$telefono = $_POST["telefono"]; 
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Telefono" . $telefono . "<br>Mensaje: " . $mensaje ;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

https://github.com/PHPMailer/PHPMailer/tree/master/src
require 'https://github.com/PHPMailer/PHPMailer/tree/master/src/Exception.php';
require 'https://github.com/PHPMailer/PHPMailer/tree/master/src/PHPMailer.php';
require 'https://github.com/PHPMailer/PHPMailer/tree/master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'amdrd2015@gmail.com';                     //SMTP username
    $mail->Password   = 'Desafio2019';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('amdrd2015@gmail.com', $nombre);
    $mail->addAddress('amdrd2015@gmail.com');     //Add a recipient
    $mail->setFrom('radrgtt@hotmail.com', $nombre);
    $mail->addAddress('radrgtt@hotmail.com');     //Add a recipient    
 


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'envío';
    $mail->Body    = $body;
    $mail->CharSet  = 'UTF-8';
   
    $mail->send();
    echo '<script>
        alert("El mensaje se envio correctamente");
              window.history.go(-1);
              </script>';
} catch (Exception $e) {
    echo 'Hubo un error al enviar el mensaje: ',$mail->ErrorInfo;
}
