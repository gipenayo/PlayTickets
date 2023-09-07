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
<?php
    
    $mensaje = '';
    
 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
        $hashed_password = password_hash($password2, PASSWORD_DEFAULT);
       
        if ($password1 === $password2) {
            include_once "../models/functions.php";

            $ok =recovery($password1);
            
            if(!$ok)
            {
                echo "error registrando";
            }
            else
            {
                echo"se actualizo";
                
            }
            
        } else {
            $mensaje = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        }
    }
    ?>
<div class="login-container">
  <div class="login-box">
    <div class="logo-container">
      <img src="../assets/img/logo.png.png" alt="Icon">
    </div>
   
       <!--<form action="../controller/save_new.php" method="post">-->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="email">Nueva Password</label>
            <input type="password" id="password" name="password1" required><br>
            <label for="email">Confirmar Password</label>
            <input type="password" id="password" name="password2" required>
            
            <button type="submit">Cambiar contraseña</button>
            <p><?php echo $mensaje; ?></p>
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