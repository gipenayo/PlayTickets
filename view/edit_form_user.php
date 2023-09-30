<?php
session_start();
include_once "../models/functions.php";
$user = getUserForId($_GET["id_user"]);

$_SESSION["id_user"];
/*var_dump();
exit;*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/function.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PlayTickets</title>
</head>
<body>
<div class="main-content">

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
    <div clas="register-container">
            <div class="register-box">
            <form action="../controller/update_user_supplier.php" method="post">
                <div class="logo-container">
                    <h2 class="title-with-logo">MIS DATOS:</h2>
                </div>
                <input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">
                <div class="form-group">
                    <label for="show_name">Nombre:</label>
                    <input value="<?php echo $user->user_name ?>" type="text" class="form-control" name="user_name" id="user_name">
                </div>
                <div class="form-group">
                    <label for="show_description">Apellido:</label>
                    <input value="<?php echo $user->last_name ?>" type="text" class="form-control" name="last_name" id="last_name">
                </div>
                <div class="form-group">
                    <label for="show_date_time">Email:</label>
                    <input value="<?php echo $user->email ?>" type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input value="<?php echo $user->dni ?>" type="text" class="form-control" name="dni" id="dni">
                </div>
                <div class="form-group">
                    <label for="id_gender">Telefono:</label>
                    <input value="<?php echo $user->phone ?>" type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="date_birth">Fecha de Nacimiento:</label>
                    <input value="<?php echo $user->date_birth ?>" type="text" class="form-control" name="date_birth" id="date_birth">
                </div>
                <div class="form-group">
                    <label for="street">Domicilio:</label>
                    <input value="<?php echo $user->last_name ?>" type="text" class="form-control" name="street" id="street">
                </div>
                <div class="form-group">
                    <label for="height">Altura:</label>
                    <input value="<?php echo $user->height ?>" type="text" class="form-control" name="height" id="height">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
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
            <div class="footer-copyright">&copy;2023 PlayTickets</div>  
        </div>
    </footer>
    <scrip src="../assets/js/barnavfooter.js"></script>
 </body>
</html>