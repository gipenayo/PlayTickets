<?php
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);

$get_datetime_show=getShowDatetime();
/*$get_show=getShowDetallShow();
var_dump($get_datetime_show);
exit;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/supplier.css"> 
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PlayTickets</title>
</head>
<body>
    <header>
        <div class="navbar">
            <h1 class="logo"> 
                <img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS </h1>
            <button class="accordion">Menú</button>
            <div class="panel">

                <ul>
                    <li><a href="../index.php">Cartelera</a></li>
                    <li><a href="login.php">Ingresar</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                    <li><a href="contact_page.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="row">
        <div class="col-12">
            <div class="header">
                <h3>FECHAS DE LOS SHOWS DE <?php echo $show->show_name?></h3>
                <a href="add_datetime_function.php?id_show=<?php echo $show->id_show ?>" class="btn btn-success mb-2">AGREGAR</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Editar</th>
                        <th>Estado</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($get_datetime_show as $datetime_show) { 
                        if($datetime_show->datetime_state != 2) {
                        $id_show_get=$show->id_show;
                        $id_show_date=$datetime_show->id_show;
                       if ($id_show_get === $id_show_date) { ?>
                        <tr>
                            <td><?php echo $datetime_show->datetime_show?></td>
                            <td><a class="btn btn-warning" href="edit_form_show_datetime.php?id_datetime=<?php echo $datetime_show->id_datetime?>">EDITAR</a></td>
                            <td>
                                 <?php if ($datetime_show->datetime_state == 1) { ?>
                                    <a class="btn btn-primary" href="warning_inactive_function.php?id_datetime=<?php echo $datetime_show->id_datetime ?>">ACTIVO</a>
                                 <?php }else{?> 
                                    <a class="btn btn-success mb-2" href="warning_active_function.php?id_datetime=<?php echo $datetime_show->id_datetime ?>">INACTIVO</a>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-danger" href="warning_delete_datetime.php?id_datetime=<?php echo $datetime_show->id_datetime ?>">ELIMINAR</a></td>
                        </tr>
                    <?php }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    </main>
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