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
    <link rel="stylesheet" href="../assets/css/edit_form_show.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PlayTickets</title>
</head>
<body>
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
            <h1>Editar show</h1>
            <form action="../controller/update_function.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_show" value="<?php echo $show->id_show ?>">
                <div class="form-group">
                    <label for="show_name">Nombre de la función:</label>
                    <input value="<?php echo $show->show_name ?>" required type="text" class="form-control" name="show_name" id="show_name">
                </div>
                <div class="form-group">
                    <label for="show_description">Descripción de la función:</label>
                    <textarea id="show_description" name="show_description" rows="10" cols="6"><?php echo $show->show_description ?></textarea><br><br>
                </div>
                <div class="form-group">
                    <label for="show_date_time">Fecha y Hora:</label>
                    <input value="<?php echo $show->show_date_time ?>" required type="datetime-local" class="form-control" name="show_date_time" id="show_date_time">
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
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($show->picture); ?>" ><br>
                    <br><input type="file" name="picture" id="picture" accept="image/*" required value="<?php echo base64_encode($show->picture); ?>"><!--EL ACCEPT= ES PARA QUE ACEPTE CUALQUIER IMG-->
                    <br><label for=""><b>(No debe superar los 2MB y solo acepta .jpg, .png, .jpeg)</b></label>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
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
