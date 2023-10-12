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
                    <li><a href="supplier.php">Ver Funciones</a></li>
                    <li><a href="view_users_supplier.php">Usuarios Registrados</a></li>
                    <li><a href="view_history.php">Historial de Compras</a></li>
                    <li><a href="../controller/logout.php">Cerrar Sesión</a></li> 
                </ul>
            </div>
        </div>
    </header>
        <div clas="register-container">
            <div class="register-box">
                <form action="../controller/save_function.php" method="post" enctype="multipart/form-data">
                    <div class="logo-container">
                        <h2 class="title-with-logo">AGREGA SHOW NUEVO</h2>
                    </div>
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
                            <?php foreach ($genders as $gender) { ?>
                                <option value="<?php echo $gender->id_gender ?>" required><?php echo $gender->gender ?></option><br>br
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <br><label for="id_category">Calificaciones: </label>
                        <select class="form-control" id="id_category" name="id_category">
                            <?php foreach ($categorys as $category) { ?>
                                <option value="<?php echo $category->id_category ?>" required><?php echo $category->category ?></option><br><br>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <br><label for="imagen">Imagen:</label><!--El valor maxlength se establece en bytes, por lo que 2000000 bytes equivalen a aproximadamente 2 MB.-->
                        <br><input type="file" name="picture" id="picture" maxlength="2000000" accept="image/jpeg, image/jpg, image/png" required><br><!--acepts determinado tipo de img accept="image/*"-->
                        <br><label for=""><b>(Valido .jpg, .png, .jpeg y no debe superar los 2MB)</b></label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
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