<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">

    <title>Contacto</title>
</head>
<body>
<header>
        <div class="navbar">
            <h1 class="logo"> 
                <img src="../assets/img/logo.png.png" alt="Logo" height="80px ">PLAYTICKETS </h1>
            <button class="accordion">Menú</button>
            <div class="panel">

                <ul>
                    <li><a href="index.php">Cartelera</a></li>
                    <li><a href="../view/login.php">Ingresar</a></li>
                    <li><a href="../view/register.php">Registrarse</a></li>
                    <li><a href="../view//contact_page.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="contact-container">
        <div class="company-info">
            <div class="company-logo">
                <img src="../assets/img/logo.png.png" alt="Logo de la empresa">
            </div>
            <div class="company-details">
                <h3>¡Nuestro Contacto!</h3>
                <p>Dirección: Dirección de tu empresa</p>
                <p>Teléfono: +123 456 789</p>
                <p>Correo Electrónico: Playtikets1@gmail.com</p>
            </div>
        </div>
        <div class="contact-form">
            <h2>Tus Datos:</h2>
            <form>
                <div class="form-group">
                    <input type="text" id="nombre" placeholder="Nombre y Apellido" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group">
                    <input type="text" id="asunto" placeholder="Asunto" required>
                </div>
                <div class="form-group">
                    <textarea id="comentarios" placeholder="Comentarios"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
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
