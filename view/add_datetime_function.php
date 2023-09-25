<?php 
include_once "../models/functions.php";

/*$getShow = getShow();
var_dump($getShow)
exit;*/
//$get_show=getShowDetallShow();
$show = getShowForId($_GET["id_show"]);
?>
<!DOCTYPE html>
<html lang="en">
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
        <h1 class="logo"><img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS</h1>
        <button class="accordion">Menú</button>
        <div class="panel">
            <ul>
                <li><a href="index.php">Cartelera</a></li>
                <li><a href="login.php">Ingresar</a></li>
                <li><a href="register.php">Registrarse</a></li>
                <li><a href="contact_page.php">Contacto</a></li>
            </ul>
        </div>
    </div>
    </header>
    <form action="../controller/save_datetime_function.php" method="post">
        <div class="form-group">
            <label for="show_name">Seleccione el nombre del show:</label>
            <select class="form-control" id="id_show" name="id_show">
            <option value="<?php echo $show->id_show ?>" required><?php echo $show->show_name ?></option><br>
            </select>
        </div>
        <div class="form-group">
            <label for="show_date_time">Fecha y Hora:</label>
            <input type="datetime-local" class="form-control" id="datetime_show" name="datetime_show" required><br><br>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</body>
</html>