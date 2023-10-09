<?php
include_once "../models/functions.php";

$users = getUser();
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Total de Butacas</th>
                        <th>Disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user->user_name ?></td>
                            <td><?php echo $user->last_name?></td>
                            <td><?php echo $user->email?></td>
                        </tr>
                    <?php } ?>
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
        accordion.addEventListener("click", function() {panel.style.display = panel.style.display === "block" ? "none" : "block";
    });
    });
    </script>
</body>
</html>