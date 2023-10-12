<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$id_show = isset($_GET['id_show']) ? $_GET['id_show'] : null;

$_SESSION["id"] = $id_show;
$name = $show->show_name;
$_SESSION["show"] = $name;
$datetime = getShowDatetime();
//$_SESSION["tim"]=$datetime;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/synopsis.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->
    <title>PlayTickets</title>
</head>
<body>
<div class="main-content">

    <header>
        <div class="navbar">
         <h1 class="logo">    <img src="../assets/img/logo.png" alt="Logo" height="80px ">
            
                PLAYTICKETS </h1>
            <button class="accordion"><i class="fas fa-bars"></i></button>
            <div class="panel">

                <ul>
                    <li><a href="../index.php">Cartelera</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                    <li><a href="contact_page.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>

        <?php if ($show->show_state != 2) { ?>
            <h1><?php echo $show->show_name ?></h1>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($show->picture); ?>">
            <p><?php echo $show->show_description ?></p>
            <form action="../controller/seating_verifier.php?id_show=<?php echo $id_show; ?>" method="post">
                <div class="form-container">
                    <label for="datetime_show">Fecha y hora disponibles:</label>
                    <select name="datetime_show" id="datetime_show">
                        <?php  foreach ($datetime as $datetime_show) { 
                            if ($show->id_show === $datetime_show->id_show && $datetime_show->datetime_state == 1) { ?>
                            <option value="<?php echo $datetime_show->id_datetime; ?>">
                            <?php echo date('d/m/Y', strtotime($datetime_show->date_show)) . ' - ' . $datetime_show->time_show; ?>
                            </option>
                        <?php } 
                        } ?>
                         <?php $_SESSION["time"]=$datetime_show->id_datetime;   ?>
                    </select>
                    <br>
                    <label for="cant_seating">Cantidad de asientos (máximo 6): </label>
                    <input type="number" name="cant_seating" id="cant_seating" min="1" max="6">
                </div>
        <?php } ?>
        <?php if ($tickets < 100) { ?>
            <input class="reservar-btn" type="submit" value="Reservar">
            <?php } else { ?>
            </form>

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
               <a href="politic_private.php">Política de Privacidad</a>
                <a href="termin_condiction.php">Términos y Condiciones</a>
                <a href="contact_page.php">Contacto</a>
        </div>
        <div class="footer-copyright">
            &copy; 2023 PlayTickets
        </div>
    </div>
</footer>
<script src="../assets/js/barnavfooter.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var cantSeatingInput = document.getElementById("cant_seating");
        cantSeatingInput.addEventListener("change", function() {
            if (parseInt(this.value) > 6) {
                alert("La cantidad máxima de asientos es 6");
                this.value = 6;
            }
        });
    });
</script>
</body>
</html>
