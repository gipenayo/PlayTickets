<?php
include_once"../models/functions.php";



if (!isset($_GET["search"]) || empty($_GET["search"]))
{
    $shows = getShow();
} else {
    $shows = searchShow($_GET["search"]);
}ev
$get_category=getShowDetallCategory();
$get_gender=getShowDetallGender();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/supplier.css"> 
    <link rel="icon" type="img/logo" href="../assets/img/logo.png.png"><!--Icono en la pestaña-->

    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PlayTickets</title>
</head>
<body>
<header>
        <div class="navbar">
            <h1 class="logo"><img src="../assets/img/logo.png.png" alt="Logo" height="80px ">PLAYTICKETS</h1>
            <button class="accordion">Menú</button>
            <div class="panel">
                <ul>
                    <li><a href="index.php">Cartelera</a></li>
                    <li><a href="../view/login.php">Ingresar</a></li>
                    <li><a href="../view/register.php">Registrarse</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-12">
            <div class="header">
                <h3>SHOWS</h3>
                <a href="../view/add_function.php" class="btn btn-success mb-2">AGREGAR</a>
            </div>
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
                           <td>
                            <?php 
                            $opcion_gender = $show->id_gender; // Supongamos que $opcion es un número
                            foreach ($get_gender as $opcion_get_gender)//le asigno el valor 
                            {
                                if ($opcion_get_gender->id_gender === $opcion_gender) // Compara el ID del género
                                {
                                    echo $opcion_get_gender->gender; // Imprime el nombre del género (ajusta esto según tus datos)
                                    break;
                                }
                            }
                            ?>
                            </td>
                            <td>
                                <?php 
                                $opcion_category = $show->id_category; // Supongamos que $opcion es un número
                                foreach ($get_category as $opcion_get_category)//le asigno el valor 
                                {
                                    if ($opcion_get_category->id_category === $opcion_category) // Compara el ID del género
                                    {
                                        echo $opcion_get_category->category; // Imprime el nombre del género (ajusta esto según tus datos)
                                        break;
                                    }
                                }
                                ?>
                            </td>
                            <td><a class="btn btn-warning" href="edit_form_show.php?id_show=<?php echo $show->id_show ?>">EDITAR</a></td>
                            <td><a class="btn btn-danger" href="warning_delete.php?id_show=<?php echo $show->id_show ?>">ELIMINAR</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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