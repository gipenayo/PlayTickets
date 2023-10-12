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
                    <li><a href="add_function.php">Agregar Función</a></li>
                    <li><a href="view_users_supplier.php">Usuarios registrados</a></li>
                    <li><a href="view_history.php">Historial de Compras</a></li>
                    <li><a href="../controller/logout.php">Cerrar Sesion</a></li>    
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="advertencia">
            <h2>Advertencia</h2>
            <p>¿Seguro que desea volver a activar esta función?</p>
            <form action="../controller/active_function.php" method="post">
                <input type="hidden" name="id_datetime" value="<?php echo $datetime->id_datetime?>">
                <button type="submit" class="btn-eliminar">ACTIVAR</button>
            </form>
        </div>
    </main>
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
    <script> 
        document.addEventListener("DOMContentLoaded", function() {
        const accordion = document.querySelector(".accordion");
        const panel = document.querySelector(".panel");
        accordion.addEventListener("click", function() {panel.style.display = panel.style.display === "block" ? "none" : "block";
    });
    });
    </script>
</body>
</html>