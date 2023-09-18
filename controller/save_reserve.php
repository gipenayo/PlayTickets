<?php
session_start();
include_once "../models/functions.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/autoload.php';
$idese=$_SESSION["id"];
if (isset($_POST["asientos"]) && is_array($_POST["asientos"])) { 
    foreach ($_POST["asientos"] as $asiento) {
 $ok = addSeating($asiento,$idese);
    }
if(!$ok)
{
    echo "no";
}
else{
    echo "se guardo";
        $mail = new PHPMailer;                     
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'PlayTickets1@gmail.com';               
        $mail->Password   = 'gxekfdrsttscsikn';                     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                    
    
        
        $mail->setFrom('PlayTickets1@gmail.com', 'PlayTickets');
        $mail->addAddress($_SESSION["email"], 'usuario');     
        $mail->isHTML(true);   
        $mail->CharSet='UTF-8';                               
        $mail->Subject = 'Compra exitosa';
        $mail->Body = 'Felicitaciones por su compra en los asientos: ' . implode(', ', $_POST["asientos"]);
    
    if (!$mail->send()) {
        echo 'Error al enviar el mensaje: ';
    } 
    
    else {
        echo 'Mensaje enviado correctamente';
    }
    
    }
    }
    ?>
