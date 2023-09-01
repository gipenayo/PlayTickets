<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">  
      <link rel="stylesheet" href="../assets/css/barnavfooter.css">

    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">

    <title>Registro</title>
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
<main>
    <div class="register-container">
        <div class="register-box">
          <div class="logo-container">
            <h2 class="title-with-logo">Registrate <img src="../assets/img/logo.png.png" alt="" ></h2>
           </div>
         
          
          <div class="form-row">
            <input type="email" id="email" placeholder="Correo Electrónico">
          </div>
         
          <div class="form-row"> 
          <input type="password" id="password" placeholder="Contraseña">

          </div>
          <div class="form-row">
            <input type="password" id="confirm-password" placeholder="Conf. Contraseña">
          </div>
          <button id="register-button">Registrarse</button>
          <p>¿Ya tienes cuenta? <a href="../view/login.php">Iniciar sesión</a></p>
        </div>
      </div>
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