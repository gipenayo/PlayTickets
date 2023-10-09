<?php
include_once "../models/functions.php";
if (!isset($_GET["search"]) || empty($_GET["search"]))
{
    $shows = getShow();
} else {
    $shows = searchShow($_GET["search"]);
}
$get_category=getShowDetallCategory();
$get_gender=getShowDetallGender();

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
        <img src="../assets/img/logo.png" alt="Logo" height="80px ">
            <h1 class="logo">PLAYTICKETS</h1>
            <button class="accordion"><i class="fas fa-bars"></i></button>
            <div class="panel">
                <ul>
                    <li><a href="../index.php">Cartelera</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                    <li><a href="contact_page.php">Contacto</a></li>
                    <li><a href="add_function.php">Agregar Función</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-12">
            <form action="supplier.php" class="search-form">
                <div class="form-row align-items-center">
                    <div class="col-6 my-1">
                        <input value="<?php echo isset($_GET["search"]) && !empty($_GET["search"]) ?  $_GET["search"] : "" ?>" name="search" class="form-control" type="text" placeholder="NOMBRE DEL SHOW">
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
                        <th>Descripción</th>
                        <th>Género</th>
                        <th>Categoría</th>
                        <th>Fechas</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($shows as $show) { 
                        if ($show->show_state != 2) { ?>
                        <tr>
                            <td><?php echo $show->show_name ?></td>
                            <td><textarea name="show_description" id="show_description" cols="10" rows="6"><?php echo $show->show_description ?></textarea></td>
                            <td>
                                <?php
                                $opcion_gender = $show->id_gender;
                                foreach ($get_gender as $opcion_get_gender) {
                                    if ($opcion_get_gender->id_gender === $opcion_gender) 
                                    {
                                        echo $opcion_get_gender->gender;
                                        break;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                    <?php
                                    $opcion_category = $show->id_category;
                                    foreach ($get_category as $opcion_get_category) {
                                        if ($opcion_get_category->id_category === $opcion_category) {
                                            echo $opcion_get_category->category;
                                            break;
                                        }
                                    }
                                    ?>
                            </td>
                            <td><a class="btn btn-success mb-2" href="datetime_function.php?id_show=<?php echo $show->id_show?>">FECHAS</a></td>
                            <td><a class="btn btn-warning" href="edit_form_show.php?id_show=<?php echo $show->id_show?>">EDITAR</a></td>
                            <td><a class="btn btn-danger" href="warning_delete.php?id_show=<?php echo $show->id_show?>">ELIMINAR</a></td>  
                        </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <footer>
        <div class="footer-logo"></div> 
        <div class="footer-content">
            <div class="footer-links">
                <a href="politic_private.php">Política de Privacidad</a>
                <a href="termin_condiction.php">Términos y Condiciones</a>
                <a href="contact_page.php">Contacto</a>
            </div>
            <div class="footer-copyright">&copy;2023 PlayTickets</div>  
        </div>
    </footer>
    <script> document.addEventListener("DOMContentLoaded", function() {
        const accordion = document.querySelector(".accordion");
        const panel = document.querySelector(".panel");
        accordion.addEventListener("click", function() {panel.style.display = panel.style.display === "block" ? "none" : "block";
    });
    });
    </script>
    </body>
</html>