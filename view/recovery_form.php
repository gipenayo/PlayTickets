<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>PlayTickets</title>
    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">

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
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
<div class="login-container">
  <div class="login-box">
    <div class="logo-container">

    <h2 class="title-with-logo">Recupera tu cuenta<img src="../assets/img/logo.png.png" alt="" ></h2>
    </div>
    <form action="../controller/mail.php" method="post">
      <input type="email" name="email" placeholder="Correo Electronico" required><br><br>
      <button type="submit">Confirmar</button><br>

    </form>
    <p>¿No está registrado? <a href="../view/register.php">Registrate aquí</a></p>
    <p>¿Olvidaste tu contraseña? <a href="../view/recovery_form.php">Haga click aqui</a></p>
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
