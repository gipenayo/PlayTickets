<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$id_show = isset($_GET['id_show']) ? $_GET['id_show'] : null;
$_SESSION["id"]=$id_show;
$name= $show->show_name;
$_SESSION["show"]=$name;
$datetime=getShowDatetime($_GET["id_datetime"]);
$id_date=isset($_GET["id_datetime"]) ? $_GET["id_datetime"] : null;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/synopsis.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PlayTickets</title>
</head>
<body>
<div class="main-content">

    <header>
        <div class="navbar">
            <h1 class="logo"> 
                <img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS </h1>
            <button class="accordion">Menú</button>
            <div class="panel">

                <ul>
                    <li><a href="../index.php">Cartelera</a></li>
                    <li><a href="../view/login.php">Ingresar</a></li>
                    <li><a href="../view/register.php">Registrarse</a></li>
                    <li><a href="../view/contact_page.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <h1><?php echo $show->show_name ?></h1>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($show->picture); ?>" alt="Imagen del espectáculo">
        <p><?php echo $show->show_description ?></p>

        <div class="form-container">
        <form action="../view/login.php" method="post">
            <label for="datetime_show">Fecha disponible:</label>
        <select name="datetime_show" id="datetime_show">
        <?php  
        foreach ($datetime as $datetime_show) { 
        if ($show->id_show === $datetime_show->id_show) { ?>
            <option value="<?php echo $datetime_show->datetime_show;?>" required><?php echo $datetime_show->datetime_show; ?></option>
            
        <?php $_SESSION["time"]=$datetime_show->datetime_show; } } ?>
        </select>
        <br><label for="cant_seating">Cantidad de asientos: </label>
        <input type="number" name="cant_seating" id="cant_seating">
        </div>
        
        
        <?php if ($tickets < 100) { ?>
            <!-- Botón de reserva solo si hay entradas disponibles -->
            <input class="reservar-btn" type="submit" value="Reservar">
           
        <?php } else { ?>
            </form>
            <!-- Mostrar un mensaje cuando no hay entradas disponibles -->
            <div class="alert-danger" role="alert">
                <p>Este espectáculo está AGOTADO.</p>
                <button class="back-btn"><a href="../index.php">Volver a la cartelera</a></button>
            </div>
        <?php } ?>
    </main>
    </div>
    <footer>
    <div class="footer-logo">
            </div>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Política de Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <div class="footer-copyright">
                &copy; 2023 PlayTickets
            </div>
        </div>
    </footer>
    <script src="../assets/js/barnavfooter.js"></script> 
</body>
</html>