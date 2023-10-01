<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';
include_once "../models/functions.php";

// Obtén la fecha de nacimiento ingresada a través de $_POST
$fecha_nacimiento = $_POST["date_birth"];

// Calcula la fecha actual
$fecha_actual = date("Y-m-d");

// Calcula la edad en años
$edad = floor((strtotime($fecha_actual) - strtotime($fecha_nacimiento)) / (60 * 60 * 24 * 365.25));

// Comprueba si la edad es mayor o igual a 18 años
if ($edad >= 18) {

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
$id_rol="1";
$user_state="0";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$ok = register($first_name, $last_name, $email, $dni, $phone, $date_birth, $street, $height, $departament, $id_rol, $hashed_password,$user_state);

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

    $src_imagen = '../assets/img/logo.con.fondo.png';
    $mail->addEmbeddedImage($src_imagen, 'logo');

    $mail->isHTML(true);     
    $mail->CharSet='UTF-8';                      
    $mail->Subject = 'Bienvenido';
    $mail->Body = '
    <h1>¡Bienvenido a PlayTickets!</h1>
    <p>
    Bienvenido a PlayTickets!
    <br>
    Es un gran placer darte la bienvenida a PlayTickets, 
    tu destino número uno para disfrutar de los mejores eventos y espectáculos en línea.
    Estamos emocionados de tenerte como parte de nuestra comunidad y esperamos que te diviertas al máximo.
    <br>
    <br>
    En PlayTickets, nos apasiona brindarte acceso a una amplia variedad de eventos,
    desde conciertos emocionantes hasta proyecciones de películas exclusivas y experiencias teatrales inolvidables.
    Hemos diseñado este espacio pensando en ti, para que puedas explorar, reservar y disfrutar de tus espectáculos favoritos desde la comodidad de tu hogar.
    <br>
    <br>
    Te animamos a explorar nuestro sitio web y descubrir todas las sorpresas que hemos preparado para ti. Si tienes alguna pregunta, comentario o sugerencia,
    nuestro equipo de soporte siempre está dispuesto a ayudarte.
    Estamos aquí para garantizar que tu experiencia en PlayTickets sea excepcional.
    <br>
    ¡Bienvenido y disfruta de la magia de PlayTickets!
    <br>
    <br>
    Saludos cordiales,
    <br>
    Equipo PlayTickets</p>
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

} else {
    echo "La persona es menor de 18 años y no puede registrarse.";
}
?>