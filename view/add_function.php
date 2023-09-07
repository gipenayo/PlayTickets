<?php

include_once "../models/functions.php";
$genders = getGender();
$categorys= getCategory();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/add_fuction.css">
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
    
    <form action="../controller/save_function.php" method="post">
        <div class="form-group">
            <label for="show_name">Nombre de la función:</label>
            <input required type="text" class="form-control" name="show_name" id="show_name">
        </div>
    
        <div class="form-group">
            <label for="monto">Descripción de la función:</label>
            <textarea id="show_description" name="show_description" rows="4" cols="50"></textarea><br><br>
        </div>
        <div class="form-group">
            <label for="show_date_time">Fecha y Hora:</label>
            <input type="datetime-local" class="form-control" id="show_date_time" name="show_date_time">
        </div>
        
        <div class="form-group">
            <label for="id_gender">Seleccione un genero:</label>
            <select class="form-control" id="id_gender" name="id_gender">
            <?php foreach ($genders as $gender) 
            { ?>
            <option value="<?php echo $gender->id_gender ?>"><?php echo $gender->gender ?></option>
            <?php 
            } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_category">Calificaciones: </label><br>
            <select class="form-control" id="id_category" name="id_category">
            <?php foreach ($categorys as $category) 
            { ?>
            <option value="<?php echo $category->id_category ?>"><?php echo $category->category ?></option>
            <?php 
            } ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
    <footer>
        <div class="footer-logo"></div> 
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Política de Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <div class="footer-copyright">&copy; 2023 PlayTickets</div>  
        </div>
    </footer>
    <script src="../assets/js/barnavfooter.js"></script>
</body>
</html>
<?php
?>