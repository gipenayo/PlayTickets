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
    <div class="row">
        <div class="col-12">
            <form action="view_users_supplier.php" class="search-form">
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
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user->user_name ?></td>
                            <td><?php echo $user->last_name?></td>
                            <td><?php echo $user->email?></td>
                            <td><?php echo $user->phone?></td>
                            <th><?php echo $user->date_birth?></th>
                            <td><a class="btn btn-warning" href="edit_form_user_supplier.php?id_user=<?php echo $user->id_user ?>">EDITAR</a></td>
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