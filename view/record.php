<?php
     session_start();
     include_once "../models/functions.php";
     $user = $_SESSION["id_user"];
     $reservasArray=ReservationHistory($user);
     $get_show=getShow();
     $get_user=getUser();           
     $date_show = getShowDatetimeForId($_SESSION["time"]);
     

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
    $prevTicketID = null;  // Variable to track the previous ticket ID
    $seatingArr = array(); // Array to store seat numbers for the current ticket
    $displayedUser = false;  // Flag to track if user information has been displayed
    $selectedOrder = null;


    foreach ($reservasArray as $reservation) 
    {
        if ($reservation['reserve_order'] !== $prevTicketID) {
            // Display reservation information for a new ticket
            if (!empty($seatingArr)) {
                // Display seat numbers for the previous ticket within a border
                echo '<div class="reservation">';
                echo '<p>Número de Asientos: ' . implode(', ', $seatingArr) . '</p>';
                echo '</div>';
            }

            echo '<div class="reservation">';
            echo '<h3>Número de Reserva: ' . $reservation['reserve_order'] . '</h3>';

            if($selectedOrder<$reservasArray)
            {
            echo '<form action="../view/view_qr.php" method="post">';
            echo '<input type="hidden" name="reserve_order" value="' . $reservation['reserve_order'] . '">';
            echo '<input type="submit" value="Ver QR">';
            echo '</form>';

            $selectedOrder++;
            }

            if ($date_show) {
                $datetime = DateTime::createFromFormat('Y-m-d', $date_show->date_show);
                $formatted_date_show = $datetime->format('d/m/Y') . ' ' . $date_show->time_show;
                echo '<p>Fecha y Hora: ' . $formatted_date_show . '</p>';
            } 

            // Display show information
            foreach ($get_show as $show) {
                if ($reservation['id_show'] === $show->id_show) {
                    echo '<p>Show: ' . $show->show_name . '</p>';
                    break;
                }
            }

            // Reset the array for seat numbers and user display for the new ticket
            $seatingArr = array();
            $displayedUser = false;
            echo '</div>';
        }

        // If the ticket ID is the same, add seating to the array
        $seatingArr[] = $reservation['seating'];

        // Display user information only once per ticket
        if (!$displayedUser) {
            foreach ($get_user as $nameuser) {
                if ($reservation['id_user'] === $nameuser->id_user) {
                    echo '<p class="user-info">Usuario: ' . $nameuser->user_name . '</p>';
                    $displayedUser = true;  // Set the flag to true to indicate user display
                    break;
                }
            }
        }

        $prevTicketID = $reservation['reserve_order'];  // Update the previous ticket ID
    }


    // Display seat numbers for the last ticket within a border
    if (!empty($seatingArr)) {
        echo '<div class="reservation">';
        echo '<p>Número de Asientos: ' . implode(', ', $seatingArr) . '</p>';
        echo '</div>';
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