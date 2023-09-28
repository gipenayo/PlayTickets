<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$_SESSION["id"];
$_SESSION["show"];
/*var_dump($_SESSION["id"]);
exit();*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->
</head>
<body>
    <div class="main-content">
        <header>
            <div class="navbar">
                <h1 class="logo"><img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS</h1>
                <button class="accordion"><i class="fas fa-bars"></i></button>
                <div class="panel">
                    <ul>
                        <li><a href="../index.php">Cartelera</a></li>
                        <li><a href="../view/register.php">Registrarse</a></li>
                        <li><a href="../view/contact_page.php">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </header>
        
        <div class="login-container">
            <div class="login-box">
                <div class="logo-container">
                    <h2 class="title-with-logo"> Login<img src="../assets/img/logo.png" alt="" ></h2>
                </div>
                <form action="../controller/save_login.php" method="post">
                    <input type="email" name="email" placeholder="Correo Electronico" required>
                    <input type="password" name="_password" placeholder="Password" required><br><br>
                    <button type="submit">Confirmar</button>
                </form>
                <p>¿No está registrado? <a href="../view/register.php">Registrate aquí</a></p>
                <p>¿Olvidaste tu contraseña? <a href="../view/recovery_form.php">Haga click aqui</a></p>
            </div>
        </div>
    </div>
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
   <!-- Script para mostrar una alerta -->
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');    
        if (error === '1') {
            alert('Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.');
        }
    </script>
</body>
</html>
