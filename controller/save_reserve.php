<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$_SESSION["show"];

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
   $ok = addSeating($asientosSeleccionados, $idese);
   
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
        if (is_array($_POST["asientos"])) {
            $mail->Body = 'Felicitaciones por su compra en los asientos: ' . implode(', ', $_POST["asientos"]). $_SESSION["show"];
        } else {
            // Manejar el caso en el que $_POST["asientos"] no es un array
            $mail->Body = 'Felicitaciones por su compra en los asientosssssssssssss: ' . $_POST["asientos"] . $_SESSION["show"];;
        }
        
    if (!$mail->send()) {
        echo 'Error al enviar el mensaje: ';
    } 
    
    else {
        echo 'Mensaje enviado correctamente';
    }
    
    
    }
    ?>
