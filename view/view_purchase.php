<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$_SESSION["id"];
$_SESSION["name"];
/*var_dump($_SESSION["name"]);
exit;*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../assets/css/main.css">
    <!--<link rel="stylesheet" href="../assets/css/selectseat.css">-->
    <title>PlayTickets</title>
</head>
<body>
<body>
<header>
        <div class="navbar">
            <h1 class="logotipo">
                <img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS </h1>
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

<form action="../controller/save_reserve.php" method="POST">
    <div class="asientos">
    <?php
            $asientoOcupado = getReserver($show->id_show);
            if ($asientoOcupado !== false) {
                // Crea un array para almacenar los objetos de asientos ocupados
                $datosAsientos = [];
                // Recorre los resultados de la consulta y crea objetos para cada asiento ocupado
                foreach ($asientoOcupado as $fila) {
                    $asiento = new stdClass();
                    $asiento->seating_number = $fila->seating_number;
                    $datosAsientos[] = $asiento;
                }
                // Extrae los números de asiento de los objetos y almacénalos en un array
                $asientosOcupados = array_map(function ($obj) {
                    return $obj->seating_number;
                }, $datosAsientos);
            } else {
                // Si la consulta falló, maneja el error o muestra un mensaje adecuado
                echo "Error al obtener los datos de asientos ocupados desde la base de datos.";
            }

            for ($i = 1; $i <= 10; $i++) {
                $asientoOcupado = in_array($i, $asientosOcupados);
                $estadoAsiento = $asientoOcupado ? "ocupado" : "disponible";
                
                ?>
                <label class='asiento-label'>
                    <input type='checkbox' class='asiento-checkbox' name='asientos[]' value='<?php echo $i ?>' <?php echo $asientoOcupado ? 'disabled' : '' ?>>
                    <?php echo "Asiento $i ($estadoAsiento)" ?>
                </label>
                
                <?php
               
            }

        
?>

    </div>
    <?php echo "hola".$_SESSION["name"] ?>
    <input type="submit" value="Reservar">
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

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>