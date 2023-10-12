<?php
include_once "../models/functions.php";

$history = GeneralHistory();
$get_show = getShow();

if (!isset($_GET["search"]) || empty($_GET["search"]))
{
    $get_user= getUser();
} else {
    $get_user= searchUserGi($_GET["search"]);
}

function getUserName($userId, $users) {
    foreach ($users as $user) {
        if ($user->id_user === $userId) {
            return $user->user_name;
            
        }
    }
    //return 'Usuario no encontrado';
    //exit();
}
function getUserLastName($userId, $users) {
    foreach ($users as $user_lastname) {
        if ($user_lastname->id_user === $userId) {
            return $user_lastname->last_name;
            
        }
    }
    //return 'Usuario no encontrado';
}

function getShowName($showId, $shows) {
    foreach ($shows as $show) {
        if ($show->id_show === $showId) {
            return $show->show_name;
        }
    }
    return 'Show no encontrado';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/supplier.css"> 
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->

    <title>PlayTickets</title>
</head>
<body>
<div class="main-content">
    <header>
        <div class="navbar">
            <img src="../assets/img/logo.png" alt="Logo" height="80px ">
            <h1 class="logo">PLAYTICKETS</h1>
            <button class="accordion"><i class="fas fa-bars"></i></button>
            <div class="panel">
                <ul>
                    <li><a href="../index.php">Cartelera</a></li>
                    <li><a href="../view/login.php">Ingresar</a></li>
                    <li><a href="../view/register.php">Registrarse</a></li>
                    <li><a href="../view/contact_page.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-12">
            <form action="view_history.php" class="search-form">
                <div class="form-row align-items-center">
                    <div class="col-6 my-1">
                        <input value="<?php echo isset($_GET["search"]) && !empty($_GET["search"]) ?  $_GET["search"] : "" ?>" name="search" class="form-control" type="text" placeholder="NOMBRE DEL USUARIO">
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">BUSCAR</button>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Número de orden</th>
                        <th>Show</th>
                        <th>Asientos</th>
                        <th>Fecha y hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $prevOrder = null; // Variable para almacenar el número de orden anterior
                    $seatingArr = array(); // Array para almacenar los asientos

                    foreach ($history as $historys) { 
                        if ($historys->reserve_order !== $prevOrder) {
                            // Nueva fila para un nuevo número de orden
                            echo '<tr>';
                            echo '<td>' . getUserName($historys->id_user, $get_user) . ' ' .getUserLastName($historys->id_user, $get_user). '</td>';
                            echo '<td>' . $historys->reserve_order . '</td>';
                            echo '<td>' . getShowName($historys->id_show, $get_show) . '</td>';
                            echo '<td>' . implode(', ', $seatingArr) . '</td>';
                            echo '<td>' . $historys->datetime_hour . '</td>';
                            echo '</tr>';
                            
                            // Reiniciar el array de asientos para el nuevo número de orden
                            $seatingArr = array();
                           
                        } else {
                            // Continuación de la fila para el mismo número de orden
                            $seatingArr[] = $historys->seating; // Acumular los asientos
                        }
                        $prevOrder = $historys->reserve_order; // Actualizar el número de orden anterior
                        
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer>
    <div class="footer-logo"></div> 
    <div class="footer-content">
        <div class="footer-links">
            <a href="politic_private.php">Política de Privacidad</a>
            <a href="termin_condiction.php">Términos y Condiciones</a>
            <a href="contact_page.php">Contacto</a>
        </div>
        <div class="footer-copyright">&copy;2023 PlayTickets</div>  
    </div>
</footer>
<script> document.addEventListener("DOMContentLoaded", function() {
    const accordion = document.querySelector(".accordion");
    const panel = document.querySelector(".panel");
    accordion.addEventListener("click", function() {
        panel.style.display = panel.style.display === "block" ? "none" : "block";
    });
});
</script>
</body>
</html>
