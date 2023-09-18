<?php

include_once "../models/functions.php";
$datetime=getShowDatetimeForId($_GET["id_datetime"]);
/*var_dump($datetime);
exit;*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">   
    <link rel="stylesheet" href="../assets/css/warning.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <title>PlayTickets</title>
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
        <div class="advertencia">
            <h2>Advertencia</h2>
            <p>¿Seguro que desea eliminar el horario: <?php echo $datetime->datetime_show ?>?</p>
            <form action="../controller/delete_function_datetime.php" method="post">
                <input type="hidden" name="id_datetime" value="<?php echo $datetime->id_datetime?>">
                <button type="submit" class="btn-eliminar">Eliminar</button>
            </form>
        </div>
    </main>
    
    <footer>
        <div class="footer-logo"></div>
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
