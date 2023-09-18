
<?php
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$id_show = isset($_GET['id_show']) ? $_GET['id_show'] : null;
$tickets = getAmount($id_show);
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
    <main>
        <h1><?php echo $show->show_name ?></h1>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($show->picture); ?>" alt="Imagen del espectáculo">
        <p><?php echo $show->show_description ?></p>
        <p>Fecha disponible: <?php echo $show->show_date_time?></p>
        <?php if ($tickets < 100) { ?>
            <!-- Botón de reserva solo si hay entradas disponibles -->
            <button class="reservar-btn"><a href="../view/login.php">Reservar Entrada</a></button>
        <?php } else { ?>
            <!-- Mostrar un mensaje cuando no hay entradas disponibles -->
            <div class="alert-danger" role="alert">
                <p>Este espectáculo está AGOTADO.</p>
                <button class="back-btn"><a href="../index.php">Volver a la cartelera</a></button>
            </div>
        <?php } ?>
    </main>
</body>
</html>
