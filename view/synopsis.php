<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$id_show = isset($_GET['id_show']) ? $_GET['id_show'] : null;
$_SESSION["seating"] = $_SESSION["seating"] + 1;
$_SESSION["id"] = $id_show;
$name = $show->show_name;
$_SESSION["show"] = $name;
$datetime = getShowDatetime();
$whole= 100;
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
            <h1 class="logo"><img src="../assets/img/logo.png" alt="Logo" height="80px ">
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
            
            
            <?php
            // Verificar si se han vendido todos los asientos
            $asientoOcupado = getReserver($show->id_show);
            if ($asientoOcupado !== false) {
                $datosAsientos = array_map(function ($fila) {
                    $asiento = new stdClass();
                    $asiento->seating_number = $fila->seating_number;
                    return $asiento;
                }, $asientoOcupado);

                $asientosOcupados = array_map(function ($obj) {
                    return $obj->seating_number;
                }, $datosAsientos);

                // Calcular la disponibilidad restando los asientos ocupados del total
                $disponibilidad = $whole - count($asientosOcupados);

                if ($disponibilidad <= 0) {
                    // Todos los asientos han sido vendidos
                    echo '<div class="alert-danger" role="alert">';
                    echo '<p>SOLD OUT</p>';
                    echo '</div>';
                } else {
                    // Todavía hay asientos disponibles, mostrar el formulario
                    ?>
                    <form action="../controller/seating_verifier.php?id_show=<?php echo $id_show; ?>" method="post">
                        <div class="form-container">
                            <label for="datetime_show">Fecha y hora disponibles:</label>
                            <select name="datetime_show" id="datetime_show" id="disponibilidad">
                                <?php
                                foreach ($datetime as $datetime_show) {
                                    if ($show->id_show === $datetime_show->id_show && $datetime_show->datetime_state == 1) {
                                ?>
                                        <option value="<?php echo $datetime_show->id_datetime; ?>">
                                            <?php echo date('d/m/Y', strtotime($datetime_show->date_show)) . ' - ' . $datetime_show->time_show . ' - Disponibilidad: ' . $disponibilidad; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <br>
                            <label for="cant_seating">Cantidad de asientos (máximo 6): </label>
                            <input type="number" name="cant_seating" id="cant_seating" min="1" max="6" required>
                        </div>

                        <?php
                        // Mueve los campos ocultos fuera del bucle
                        foreach ($datetime as $datetime_show) {
                            if ($show->id_show === $datetime_show->id_show && $datetime_show->datetime_state == 1) {
                        ?>
                                <input type="hidden" name="time" value="<?php echo $datetime_show->id_datetime; ?>">
                                <input type="hidden" name="data" value="<?php echo $datetime_show->time_show; ?>">
                                <input type="hidden" name="day" value="<?php echo $datetime_show->date_show; ?>">
                        <?php
                            }
                        }
                        ?>
                        <input type="hidden" name="total_asientos" value="<?php echo $totalidadascientos; ?>">
                        <input type="hidden" name="disponibilidad" value="<?php echo $disponibilidad; ?>">

                        <!-- Botón de Reservar -->
                        <input class="reservar-btn" type="submit" value="Reservar">
                    </form>
                <?php
                }
            } else {
                echo "Error al obtener los datos de asientos ocupados desde la base de datos.";
            }
            ?>
        <?php }?>
    </main>
</div>
<footer>
    <div class="footer-logo">
    </div>
    <div class="footer-content">
        <!-- ... -->
    </div>
</footer>
<script src="../assets/js/barnavfooter.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var cantSeatingInput = document.getElementById("cant_seating");
        cantSeatingInput.addEventListener("change", function () {
            if (parseInt(this.value) > 6) {
                alert("La cantidad máxima de asientos es 6");
                this.value = 6;
            }
        });
    });
</script>
</body>
</html>