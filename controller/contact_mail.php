<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

$name = $_POST["name"];
$email = $_POST["email"];
$comment = $_POST["comment"];
$affair = $_POST["affair"];

function Contact_mail($name,$email,$comment,$affair)
{ 

    $mail = new PHPMailer(true);

if(!empty($name) && !empty($email) && !empty($comment) && !empty($affair))
{

    $mail->SMTPDebug = 0 ;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'Playtickets1@gmail.com';                     
    $mail->Password   = 'gxekfdrsttscsikn';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom('playtickets1@gmail.com', 'PlayTicket');
    $mail->addAddress('playtickets1@gmail.com');     

    $mail->isHTML(true);
    $mail->CharSet='UTF-8';                      
    $mail->Subject = $affair;
    $mail->Body = 
    '<p>
    El usuario: '.$name.'
    <br>
    <br>
    Con el mail: '.$email.'
    <br>
    <br>
    Mando el siguiente comentario:<br> '.$comment.'
    </p>';

    $mail->send();
    return true;
} 
}

if(Contact_mail($name,$email,$comment,$affair)==true)
{
    echo '<script>alert("Mensaje enviado con exito.");</script>';
    echo '<script>window.location.href = "../index.php";</script>'; // Regresar a la página anterior
    //header("Location: ../index.php");
    exit;
}


?>