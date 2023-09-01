<?php
include_once"../models/functions.php";

if (!isset($_GET["search"]) || empty($_GET["search"]))
{
    $shows = getShow();
} else {
    $shows = searchShow($_GET["search"]);
}
//$shows=getShow();
$get_gender=getGender();
$get_category=getCategory();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/supplier.css"> 
    <link rel="icon" type="img/logo" href="../assets/img/logo.png.png"><!--Icono en la pestaña-->
    <title>PlayTickets</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <h3>Shows</h3>
            <a href="../view/add_function.php" class="btn btn-success mb-2">Agregar</a>
            <form action="supplier.php" class="search-form">
                <div class="form-row align-items-center">
                    <div class="col-6 my-1">
                        <input value="<?php echo isset($_GET["search"]) && !empty($_GET["search"]) ?  $_GET["search"] : "" ?>" name="search" class="form-control" type="text" placeholder="Buscar show por nombre">
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha y Hora</th>
                        <th>Genero</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($shows as $show) { ?>
                        <tr>
                            <td><?php echo $show->show_name ?></td>
                            <td>
                                <textarea name="show_description" id="show_description" cols="10" rows="6"><?php echo $show->show_description ?>
                                </textarea>
                            </td>
                            <td><?php echo $show->show_date_time?></td>
                            <td><?php echo $show->id_gender ?></td>
                            <td><?php echo $show->id_category ?></td>
                            <td><a class="btn btn-warning" href="edit_form_show.php?id_show=<?php echo $show->id_show ?>">Editar</a></td>
                            <td><a class="btn btn-danger" href="../controller/delete_function.php?id_show=<?php echo $show->id_show ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>