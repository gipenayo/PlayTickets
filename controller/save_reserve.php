<?php
session_start();
include_once "../models/functions.php";
require_once "../libs/QR/qrcode.class.php";
$show = getShowForId($_GET["id_show"]);
$_SESSION["show"];
$_SESSION["data"];
$_SESSION["asiento"];
$time=$_SESSION["time"];
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/autoload.php';
$idese=$_SESSION["id"];
$time=$_SESSION["time"];
/*var_dump($time);
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
    $mensaje = '
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    padding: 20px;
                }
                .container {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                }
                h1 {
                    color: #007bff;
                }
                p {
                    color: #333;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Felicitaciones por su compra</h1>
                <p>Ha adquirido entradas para la función de: ' . $_SESSION["show"] . '</p>
                <p>Fecha de la función: ' . $_SESSION["day"] . '</p>
                <p>Asientos seleccionados: ' . implode(', ', $_SESSION["asiento"]) . '</p>
                <p>Horario de la función: ' . $_SESSION["data"] . '</p>
            </div>
        </body>
        </html>
    ';
} else {
    // Manejar el caso en el que $_POST["asientos"] no es un array
    $mensaje = '
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    padding: 20px;
                }
                .container {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                }
                h1 {
                    color: #007bff;
                }
                p {
                    color: #333;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Felicitaciones por su compra</h1>
                <p>Ha adquirido entradas para la función de: ' . $_SESSION["show"] . '</p>
                <p>Fecha de la función: ' . $_SESSION["day"] . '</p>
                <p>Asiento seleccionado: ' . $_SESSION["asiento"] . '</p>
                <p>Horario de la función: ' . $_SESSION["data"] . '</p>
            </div>
        </body>
        </html>
    ';
}

$mail->IsHTML(true);
$mail->Body = $mensaje;


    if ($mail->send()) {
        header("Location: ../view/view_qr.php");
    } 
    
    else {
        header("Location: ../index.php");
    }
    
    
    }
    ?>
