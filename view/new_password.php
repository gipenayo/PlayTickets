<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>PlayTickets</title>
    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->

</head>
<body>
<div class="main-content">

<header>
        <div class="navbar">
            <img src="../assets/img/logo.png" alt="Logo" height="80px ">
            <h1 class="logo">PLAYTICKETS </h1>
           
        </div>
    </header>
    <br><br>
<?php
    include_once "../models/functions.php";
    $mensaje = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ver=$_SESSION["email"];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $user_info = getUserInfo($ver);
        if ($password1 === $password2) {
            $hashed_password1 = password_hash($password1, PASSWORD_DEFAULT);
            $ok =recovery($ver,$hashed_password1);
            if (!$ok) {
                echo  '<script>alert("la contraseña no se actualizo");</script>';
                
                
                
            } else {
                echo '<script>alert("La contraseña se actualizo correctamente");</script>';
                echo '<script>window.location.href = "../index.php";</script>';
                
            }
        } else {
            $mensaje = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        }
    }


    ?>
<div class="login-container">
  <div class="login-box">
    
      <img src="../assets/img/logo.fondo.png" alt="Icon" height="120px" width="120px">
    
   
       <!--<form action="../controller/save_new.php" method="post">-->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="email">Nueva Password</label>
            <input type="password" id="password" name="password1" required><br>
            <label for="email">Confirmar Password</label>
            <input type="password" id="password" name="password2" required><br><br>
            
            <button type="submit">Cambiar contraseña</button>
            <p><?php echo $mensaje; ?></p>
        </form>
        
  </div>
</div>
</div>
<footer>
    <div class="footer-logo">
            </div>
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
    <script src="../assets/js/barnavfooter.js"></script>
</body>
</html>