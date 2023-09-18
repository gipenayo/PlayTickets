<?php

include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
/*var_dump($show);
exit;*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/synopsis.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PLayTickets</title>
</head>
<body>
    <header>
        <div class="navbar">
            <h1 class="logo"> 
                <img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS </h1>
            <button class="accordion">Menú</button>
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
    <main>
        <h1><?php echo $show->show_name ?></h1>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($show->picture); ?>" alt="Imagen del espectáculo">
        <p><?php echo $show->show_description ?></p>
        <p>Fecha disponible: <?php echo $show->show_date_time?></p>
        <button class="reservar-btn"><a href="../view/login.php">Reservar Entrada</a><i class="fas fa-shopping-cart"></i></button>
    </main>
    <footer>
    <div class="footer-logo">
            </div>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Política de Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <div class="footer-copyright">
                &copy; 2023 PlayTickets
            </div>
        </div>
    </footer>
    <script src="../assets/js/barnavfooter.js"></script> 
</body>
</html>



