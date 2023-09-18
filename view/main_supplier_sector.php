<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="../assets/css/main_supplier_sector.css">
    <title>PlayTickets</title>
</head>
<body>
    <header>
        <div class="navbar">
            <h1 class="logo"><img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS</h1>
            <button class="accordion">Menú</button>
            <div class="panel">
                <ul>
                    <li><a href="index.php">Cartelera</a></li>
                    <li><a href="../view/login.php">Ingresar</a></li>
                    <li><a href="../view/register.php">Registrarse</a></li>
                    <li><a href="../view/contact_page.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Agregar una nueva función.</button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><a href="add_function.php">Te permite ver la información sobre espectáculos futuros. Esto es esencial para mantener a tus visitantes informados sobre las próximas funciones y horarios disponibles en tu plataforma en línea. Facilita la gestión de eventos y la planificación de recursos.</a></div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">Ver funciones disponibles.</button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><a href="supplier.php">Permite acceder a información actualizada sobre los eventos, espectáculos o funciones que ofreces. Esta función facilita que ,odifiques o elimines  las próximas actividades y horarios , lo que mejora su experiencia al tomar decisiones informadas sobre qué eventos desean asistir.</a></div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Ver usaurios registrados.</button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><a href="view_users_supplier.php">Permite a los usuarios acceder a un registro detallado de los datos con los que se han realizado el procedimiento de registro previamente en tu sitio web. Esto les proporciona un historial completo de los datos del usuario.</a></div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">Ver historial de compra.</button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><a href="view_history.php">Permite a los administradores y usuarios autorizados acceder a un registro detallado de la actividad y datos de los usuarios registrados. Esto incluye información como fechas de registro, actividad reciente, preferencias de cuenta y otros datos relevantes. Esta característica es esencial para la gestión de usuarios y la personalización de la experiencia del usuario, ya que permite un seguimiento efectivo de las interacciones de los usuarios y la toma de decisiones informadas en función de sus perfiles y actividades.</a></div>
            </div>
        </div>
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
            <div class="footer-copyright">&copy;2023 PlayTickets</div>  
        </div>
    </footer>
    <script src="../assets/js/barnavfooter.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>