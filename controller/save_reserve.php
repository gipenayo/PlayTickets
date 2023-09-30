<?php
session_start();
include_once "../models/functions.php";
require_once "../libs/QR/qrcode.class.php";

$show = getShowForId($_GET["id_show"]);
$_SESSION["show"];
$time=$_SESSION["time"];
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/autoload.php';
$idese=$_SESSION["id"];

/*var_dump($_SESSION["idese"]);
   exit;*/
   $_POST["asientos"];
   
   /*var_dump($_POST["asientos"]);
   exit();*/
   $asientosSeleccionados = $_POST["asientos"];
   $ok = addSeating($asientosSeleccionados, $idese,$time);

   
if($ok)
{

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
        if (is_array($_POST["asientos"])) {
            $mail->Body = 'Felicitaciones por su compra en los asientos: ' . implode(', ', $_POST["asientos"]). $_SESSION["show"].$time;
        } else {
            // Manejar el caso en el que $_POST["asientos"] no es un array
            $mail->Body = 'Felicitaciones por su compra en los asientos: ' . $_POST["asientos"] . $_SESSION["show"].$time;;
        }
        
    if ($mail->send()) {
        header("Location: ../view/view_qr.php");
    } 
    
    else {
        header("Location: ../index.php");
    }
    
    
    }
    ?>
