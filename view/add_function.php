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
    <link rel="stylesheet" href="../assets/css/add_fuction.css">
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
    <main>
       <form action="../controller/save_function.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="show_name">Nombre:</label>
            <input required type="text" class="form-control" name="show_name" id="show_name" required><br><br>
        </div>
        <div class="form-group">
            <label for="monto">Descripción:</label>
            <textarea id="show_description" name="show_description" rows="4" cols="50" required></textarea><br><br>
        </div>
        <div class="form-group">
            <br><label for="id_gender">Seleccione un genero:</label>
            <select class="form-control" id="id_gender" name="id_gender">
            <?php foreach ($genders as $gender) 
            { ?>
            <option value="<?php echo $gender->id_gender ?>" required><?php echo $gender->gender ?></option><br>br
            <?php 
            } ?>
            </select>
        </div>
        <div class="form-group">
            <br><label for="id_category">Calificaciones: </label>
            <select class="form-control" id="id_category" name="id_category">
            <?php foreach ($categorys as $category) 
            { ?>
            <option value="<?php echo $category->id_category ?>" required><?php echo $category->category ?></option><br><br>
            <?php 
            } ?>
            </select>
        </div>
        <div class="form-group">
            <br><label for="imagen">Imagen:</label><!--El valor maxlength se establece en bytes, por lo que 2000000 bytes equivalen a aproximadamente 2 MB.-->
            <br><input type="file" name="picture" id="picture" maxlength="2000000" accept="image/jpeg, image/jpg, image/png" required><br><!--acepts determinado tipo de img accept="image/*"-->
            <br><label for=""><b>(No debe superar los 2MB y solo acepta .jpg, .png, .jpeg)</b></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form> 
    </main>
    
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