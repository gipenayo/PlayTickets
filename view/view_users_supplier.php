<?php
include_once "../models/functions.php";

if (!isset($_GET["search"]) || empty($_GET["search"]))
{
    $users = getUser();
} else {
    $users = searchUser($_GET["search"]);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/supplier.css"> 
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->
    <title>PlayTickets</title>
</head>
<body>
<div class="main-content">
    <header>
        <div class="navbar">
            <h1 class="logo"> 
                <img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS</h1>
            <button class="accordion"><i class="fas fa-bars"></i></button>
            <div class="panel">
                <ul>
                    <li><a href="../index.php">Cartelera</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                    <li><a href="add_function.php">Agregar Función</a></li>
                    <li><a href="supplier.php">Funciones Disponibles</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-12">
            <form action="view_users_supplier.php" class="search-form">
                <div class="logo-container">
                        <h2 class="title-with-logo">USUARIOS REGISTRADOS EN PLAYTICKETS</h2>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-6 my-1">
                        <input value="<?php echo isset($_GET["search"]) && !empty($_GET["search"]) ?  $_GET["search"] : "" ?>" name="search" class="form-control" type="text" placeholder="NOMBRE DEL USUARIO">
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">BUSCAR</button>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user->user_name ?></td>
                            <td><?php echo $user->last_name?></td>
                            <td><?php echo $user->email?></td>
                            <td><?php echo $user->phone?></td>
                            <td><?php echo date('d/m/Y', strtotime($user->date_birth))?></td>
                            <td><?php echo $user->street . ' - ' . $user->height; ?></td>



                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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