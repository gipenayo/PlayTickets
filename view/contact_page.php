<?php
$id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"> <!--!icono pestaña-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->
    <title>PlayTickets</title>
</head>
<body>
    <div class="main-content">
        <header>
            <div class="navbar">
                <img src="../assets/img/logo.png" alt="Logo" height="80px ">
                <h1 class="logo"> PLAYTICKETS </h1>
                <button class="accordion"><i class="fas fa-bars"></i></button>
                <div class="panel">
                    <ul>
                        <li><a href="../index.php">Cartelera</a></li>
                        <li><a href="register.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="contact-container">
            <div class="company-info">
                <div class="company-logo">
                    <img src="../assets/img/logo.png" alt="Logo de la empresa">
                </div>
                <div class="company-details">
                    <h3>¡Nuestro Contacto!</h3>
                    <p>Dirección: Colón 600, Merlo, Buenos Aires.</p>
                    <p>Teléfono: 0220-483-2403</p>
                    <p>Correo Electrónico: Playtikets1@gmail.com</p>
                </div>
            </div>
            <div class="contact-form">
                <h2>Tus Datos:</h2>
                <form action="../controller/contact_mail.php" method="post">
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Nombre y Apellido" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="affair" name="affair" placeholder="Asunto" required>
                    </div>
                    <div class="form-group">
                        <textarea id="comment" name="comment" placeholder="Comentarios"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Enviar</button>
                    </div>
                </form>
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
            <div class="footer-copyright">
                &copy; 2023 PlayTickets
            </div>
        </div>
    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const accordion = document.querySelector(".accordion");
    const panel = document.querySelector(".panel");
        accordion.addEventListener("click", function()
        {
            panel.style.display = panel.style.display === "block" ? "none" : "block";
        });
    });
    </script>

</body>
</html>
