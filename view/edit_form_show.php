<?php

include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
var_dump($show);

$genders = getGender();
$categorys= getCategory();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/edit_form_show.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png.png"><!--Icono en la pestaña-->
    <title>PlayTickets</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <h1>Editar show</h1>
            <form action="../controller/update_function.php" method="post">
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
                    <select class="form-control" id="id_gender" name="id_gender">
                        <?php foreach ($genders as $gender) { ?>
                        <option <?php
                            if ($genders === $show->id_gender) 
                            {
                                echo "selected";
                            } ?> value="<?php echo $id_gender ?>"><?php echo $id_gender ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_category">Calificaciones: </label><br>
                    <select class="form-control" id="id_category" name="id_category">
                        <?php foreach ($categorys as $category) { ?>
                        <option <?php
                            if ($categorys === $show->id_category) 
                            {
                                echo "selected";
                            } ?> value="<?php echo $id_category ?>"><?php echo $id_category ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
 </body>
</html>
