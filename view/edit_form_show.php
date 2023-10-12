<?php
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
/*var_dump($show);
exit;*/
$genders = getGender();
$categorys= getCategory();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/function.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    <li><a href="add_function.php">Agregar Función</a></li>
                    <li><a href="view_users_supplier.php">Usuarios registrados</a></li>
                    <li><a href="view_history.php">Historial de Compras</a></li>
                    <li><a href="../controller/logout.php">Cerrar Sesion</a></li>    
                </ul>
            </div>
        </div>
    </header>
        <div clas="register-container">
            <div class="register-box">
                <form action="../controller/update_function.php" method="post" enctype="multipart/form-data">
                    <div class="logo-container">
                        <h2 class="title-with-logo">EDITAR SHOW </h2>
                    </div>
                    <input type="hidden" name="id_show" value="<?php echo $show->id_show ?>">
                    <div class="form-group">
                        <label for="show_name">Nombre de la función:</label>
                        <input value="<?php echo $show->show_name ?>" type="text" class="form-control" name="show_name" id="show_name">
                    </div>
                    <div class="form-group">
                        <label for="show_description">Descripción de la función:</label>
                        <textarea id="show_description" name="show_description" rows="10" cols="6"><?php echo $show->show_description ?></textarea><br><br>
                    </div>
                    <div class="form-group">
                        <label for="id_gender">Seleccione un genero:</label>
                        <select class="form-control" name="id_gender" id="id_gender">
                            <?php 
                            $opcion_gender=$show->id_gender;//le asigno el numero de id a la opcion
                            foreach ($genders as $option_get_gender) { ?>
                            <option <?php
                            if ($option_get_gender->id_gender === $opcion_gender)
                            {
                                echo "selected";
                            } ?> value="<?php echo $option_get_gender->gender ?>"><?php echo $option_get_gender->gender ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_category">Calificaciones: </label><br>
                        <select class="form-control" id="id_category" name="id_category">
                            <?php 
                            $opcion_category=$show->id_category;//le asigno el numero de id a la opcion
                            foreach ($categorys as $option_get_category) { ?>
                            <option <?php
                            if ($option_get_category->id_category === $opcion_category)
                            {
                                echo "selected";
                            } ?> value="<?php echo $option_get_category->category ?>"><?php echo $option_get_category->category ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label><br>
                        <input type="file" name="picture" id="picture" accept="image/*" value="<?php echo base64_encode($show->picture); ?>"><!--EL ACCEPT= ES PARA QUE ACEPTE CUALQUIER IMG-->
                        <br><label for=""><b>(No debe superar los 2MB y solo acepta .jpg, .png, .jpeg)</b></label>
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
