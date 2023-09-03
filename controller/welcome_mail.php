<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../controller/vendor/autoload.php';


$email = $_POST["email"];

$mail = new PHPMailer(true);

if (!empty($email)) {
    
    $mail->SMTPDebug = 0 ;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'Maldonado.germanman@gmail.com';                     
    $mail->Password   = 'eiyrqvnzqrnoctbr';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom('Maldonado.germanman@gmail.com', 'PlayTicket');
    $mail->addAddress($email);     

    $src_imagen = '../assets/img/logo.jpeg';
    $mail->addEmbeddedImage($src_imagen, 'img');

    $mail->isHTML(true);     
    $mail -> CharSet='UTF-8';                      
    $mail->Subject = 'Bienvenido';
    $mail->Body = '<h1>¡Bienvenido a PlayTickets!</h1>
    <p>
    Estamos encantados de tenerte aquí.
    Explora y disfruta de todos nuestros servicios. 
    Si necesitas ayuda, no dudes en contactarnos.
    ¡Esperamos que tengas una experiencia increíble!</p>
    <img src="cid:img">';

    
    $mail->send();
    $conf=1;
}

if ($conf==1) {
    header("Location: ../view/register.php");
    exit;
}
?>