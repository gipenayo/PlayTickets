<?php
session_start();
include_once "../models/functions.php";
$email = $_SESSION["email"];
$reservas = ReservationHistory($email);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/record.css">
</head>
<body>
<div class="main-content">
    <!-- Contenido principal de la página aquí -->


    <header>
        <div class="navbar">
            <img src="../assets/img/logo.png" alt="Logo" height="80px">
            <h1 class="logo">PLAYTICKETS</h1>
            <button class="accordion"></button>
            <div class="panel">
                <ul>
                    <li><a href="index.php">Cartelera</a></li>
                    <li><a href="login.php">Ingresar</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                    <li><a href="contact_page.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>

    <h2>Historial de Reservas</h2>

    <?php
if ($reservas === false) 
{
    echo '<p>No se pudieron recuperar las reservas.</p>';
} 
else 
{
        echo '<table>';
        echo '<tr>';
        echo '<th>Reserva</th>';
        echo '<th>Numero de Ticket</th>';
        echo '<th>Confirmación</th>';
        echo '<th>Usuario</th>';
        echo '<th>Show</th>';
        echo '<th>Fecha y Hora</th>';
        echo '<th>Fecha de Reserva</th>';
        echo '</tr>';

        foreach ($reservas as $reserva) {
            echo '<tr>';
            echo '<td>' . $reserva['id_reserve'] . '</td>';
            echo '<td>' . $reserva['id_ticket'] . '</td>';
            echo '<td>' . $reserva['confirmation'] . '</td>';
            echo '<td>' . $reserva['id_user'] . '</td>';
            echo '<td>' . $reserva['id_show'] . '</td>';
            echo '<td>' . $reserva['id_datetime'] . '</td>';
            echo '<td>' . $reserva['reservation_date'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
}
?>
    </div>

    <footer>
        <div class="footer-logo"></div>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Política de Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="../view/contact_page.php">Contacto</a>
            </div>
            <div class="footer-copyright">
                &copy; 2023 PlayTickets
            </div>
        </div>
    </footer>
    <script src="../assets/js/barnavfooter.js"></script>
</body>
</html>
