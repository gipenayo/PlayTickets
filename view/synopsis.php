<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$_SESSION["id"]=$_GET["id_show"];
/*var_dump($show);
exit;*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/synopsis.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PLayTickets</title>
</head>
<body>
    <main>
        <h1><?php echo $show->show_name ?></h1>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($show->picture); ?>" alt="Imagen del espectáculo">
        <p><?php echo $show->show_description ?></p>
        <p>Fecha disponible: <?php echo $show->show_date_time?></p>
        <button class="reservar-btn"><a href="../view/login.php">Reservar Entrada</a><i class="fas fa-shopping-cart"></i></button>
    </main>
</body>
</html>



