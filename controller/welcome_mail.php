<?php
function SendMail($name, $mail) {
    $affair = "Bienvenido a PlayTickets";
    $message = "
        <html>
        <head>
            <title>Bienvenido a PlayTickets</title>
        </head>
        <body>
            <h1>Bienvenido a PlayTickets, $name</h1>
            <p>Gracias por registrarte en PlayTickets. ¡Esperamos que disfrutes de nuestros servicios!</p>
            <img src='../assets/img/logo.jpeg' alt='Logo de PlayTickets'>
        </body>
        </html>
    ";

    $header = "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $header .= 'From: PlayTickets@mail.com' . "\r\n";


    if (mail($mail, $affair, $message, $header)) {
        echo "Correo de bienvenida enviado a $mail";
    } else {
        echo "Hubo un problema al enviar el correo.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userName = $_POST["first-name"];
    $userMail = $_POST["email"]; 

    SendMail($userName, $userMail);
}
?>