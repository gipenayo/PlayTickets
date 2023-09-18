<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


include_once "../models/functions.php";


$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$dni = $_POST["dni"];
$phone = $_POST["phone"];
$date_birth = $_POST["date_birth"];
$street = $_POST["street"];
$height = $_POST["height"];
$departament = $_POST["departament"];
$floor = $_POST["floor"];
$cuil = $_POST["cuil"];
$password = $_POST["_password"];
$id_rol=1;
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$ok = register($first_name, $last_name, $email, $dni, $phone, $date_birth, $street, $height, $departament, $id_rol, $hashed_password);
$idObject = getIdUser();
$id = $idObject->id_user;
$confirmationLink = 'http://localhost:8080/TicketRun/controller/confirmation.php?id=' . $id;

if (!$ok) {
    echo "Error registrando.";
} 
else {
    $_SESSION["nombre"] = $first_name;
}



    
$email = $_POST["email"];

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


function Confirmation($email,$confirmationLink) 
{  

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
            <a href="'.$confirmationLink.'">Confirmar correo</a>
        </body>';

        $mail->send();
        return true;
        
}



if (welcome($email)&&Confirmation($email,$confirmationLink)==true) {

    header("Location: ../view/register.php?successfulRegistratio=1");


}
?>