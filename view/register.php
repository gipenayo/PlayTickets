<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">  
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <title>PlayTickets</title>
</head>
<body>
  <div class="main-content">
    <?php if (isset($_GET['successfulRegistratio']) && $_GET['successfulRegistratio'] == 1): ?>
      <script src="../assets/js/successful_register.js"></script>
      <?php endif; ?>
      <header>
        <div class="navbar">
          <h1 class="logo"><img src="../assets/img/logo.png" alt="Logo" height="80px">PLAYTICKETS</h1>
          <button class="accordion"><i class="fas fa-bars"></i></button>
          <div class="panel">
            <ul>
              <li><a href="../index.php">Cartelera</a></li>
              <li><a href="../view/contact_page.php">Contacto</a></li>
            </ul>
          </div>
        </div>
      </header>

      <main>
        <div class="register-container">
          <div class="register-box">
            <div class="logo-container">
              <h2 class="title-with-logo">Registrate <img src="../assets/img/logo.png" alt="" ></h2>
            </div>
            <form action="../controller/welcome_mail.php" method="post">
              <div class="form-row">
                <input type="text" name="first_name" id="first_name"placeholder="Nombre" required>
                <input type="text" name="last_name" id="last_name"placeholder="Apellido" required>
              </div>
              <div class="form-row">
                <input type="email" name="email" placeholder="Correo Electronico" required>
                <input type="text" name ="dni" id="dni" placeholder="DNI" required>
              </div>
              <div class="form-row"> 
                <input type="tel" name="phone" id="phone" placeholder="Teléfono" required>
                <input type="date" name="date_birth" id="date_birth" required>
              </div> 
              <div class="form-row">
                <input type="street" name="street" id="street" placeholder="Calle">
                <input type="height" name="height" id="height" placeholder="Altura">
              </div>
                <div class="form-row">
                  <input type="departament" name="departament" id="departament" placeholder="departamento">
                  <input type="floor" name="floor" id="floor" placeholder="piso">
                </div>
                <div class="form-row">
                  <input type="cuil" name="cuil" id="cuil" placeholder="cuil">
                  <input type="password" name="_password" placeholder="Password" required>
                </div>
                <button type="submit" id="register-button">Continuar</button>
                <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
              </div>
            </form>
          </div>
        </div>
      </main> 
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
</body>
</html>