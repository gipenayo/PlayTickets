<?php
session_start();
include_once "../models/functions.php";
$user = $_SESSION["id_user"];
$reservasArray=ReservationHistory($user);

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

    <header>
        <div class="navbar">
            <img src="../assets/img/logo.png" alt="Logo" height="80px">
            <h1 class="logo">PLAYTICKETS</h1>
        <button class="accordion"><i class="fas fa-bars"></i></button>
            <div class="panel">
            <ul>
                <li>Hola <?php echo $_SESSION["name"]?>!</li>
                <li><a href="record.php">Mis reservas</a></li>
                <hr class="hr">
                <li><a href="#">Cerrar Sesion</a></li>
            </ul>
        </div>
        </div>
    </header>

    <h2>Historial de Reservas</h2>

    <?php
if (empty($reservasArray)) {
    echo '<p>No hay historial de reservas.</p>';
} else {
    foreach ($reservasArray as $reservation) {
        echo '<h3>Número de Reserva: ' . $reservation['id_reserve'] . '</h3>';
        echo '<p>Cantidad: ' . $reservation['amount'] . '</p>';
        echo '<p>Número de Reserva: ' . $reservation['id_reserve'] . '</p>';
        echo '<p>Usuario: ' . $reservation['id_user'] . '</p>';
        echo '<p>Show: ' . $reservation['id_show'] . '</p>';
        echo '<p>Fecha y Hora: ' . $reservation['id_datetime'] . '</p>';

        // Mostrar fechas de espectáculo para esta reserva
        echo '<ul>';
        foreach ($reservation['shows_dates'] as $showDate) {
            echo '<li>Fecha y Hora del Show: ' . $showDate['datetime_show'] . '</li>';
        }
        echo '</ul>';

        echo '<hr>'; // Separador entre reservas
    }
}
?>

</div>

<footer>
    <div class="footer-logo"></div>
    <div class="footer-content">
        <div class="footer-links">
            <a href="politic_private.php">Política de Privacidad</a>
            <a href="termin_condiction.php">Términos y Condiciones</a>
            <a href="contact_page.php">Contacto</a>
        </div>
        <div class="footer-copyright">
            &copy; 2023 PlayTickets
        </div>
    </div>
</footer>
 <script> document.addEventListener("DOMContentLoaded", function() {
        const accordion = document.querySelector(".accordion");
        const panel = document.querySelector(".panel");
        accordion.addEventListener("click", function() {panel.style.display = panel.style.display === "block" ? "none" : "block";
    });
    });
    </script>
</body>
</html>