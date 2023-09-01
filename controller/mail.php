<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


    $mail = new PHPMailer;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'PlayTickets1@gmail.com';               
    $mail->Password   = 'gxekfdrsttscsikn';                     
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                    

    
    $mail->setFrom('PlayTickets1@gmail.com', 'PlayTickets');
    $mail->addAddress($_POST["email"], 'usuario');     
    $mail->isHTML(true);                                  
    $mail->Subject = 'Reestablecer Contraseña';
    $mail->Body    = 'http://localhost:8080/TicketRun/view/new_password.php';

if (!$mail->send()) {
    echo 'Error al enviar el mensaje: ';
} 

else {
    echo 'Mensaje enviado correctamente';
}
?>