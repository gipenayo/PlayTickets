<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../controller/vendor/autoload.php';


$email = $_POST["email"];
$conf=false;


function welcome($email)
{
$mail = new PHPMailer(true);

if (!empty($email)) {
    
    $mail->SMTPDebug = 0 ;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'Playtickets1@gmail.com';                     
    $mail->Password   = 'gxekfdrsttscsikn';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom('playtickets1@gmail.com', 'PlayTicket');
    $mail->addAddress($email);     

    $src_imagen = '../assets/img/logo.fondo.png';
    $mail->addEmbeddedImage($src_imagen, 'logo');

    $mail->isHTML(true);     
    $mail->CharSet='UTF-8';                      
    $mail->Subject = 'Bienvenido';
    $mail->Body = '
    <h1>¡Bienvenido a PlayTickets!</h1>
    <p>
    Estamos encantados de tenerte aquí.
    Explora y disfruta de todos nuestros servicios. 
    Si necesitas ayuda, no dudes en contactarnos.
    ¡Esperamos que tengas una experiencia increíble!</p>
    <img src="cid:logo">';

    
    $mail->send();
   return true;
}
}


function Confirmation($email) {
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0 ;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'Playtickets1@gmail.com';                     
    $mail->Password   = 'gxekfdrsttscsikn';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;   

    $mail->setFrom('playtickets1@gmail.com', 'PlayTicket');
    $mail->addAddress($email);
    
    $mail->isHTML(true);
    $mail->CharSet='UTF-8';  
    $mail->Subject = 'Confirmación de correo electrónico';
    $mail->Body =
        '<body>
            <h1>Bienvenido a PlayTickets</h1>
            <p>Gracias por registrarte con nosotros.</p>
            <p>Para confirmar tu correo electrónico, haz clic en el siguiente enlace:</p>
            <a href="register.php">Confirmar correo</a>
        </body>';

        $mail->send();
        return true;
        
}

if (welcome($email)&&Confirmation($email)==true) {
    header("Location: ../view/register.php");
    exit;
}
?>