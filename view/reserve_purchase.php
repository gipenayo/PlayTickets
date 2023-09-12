<?php
include_once "../models/functions.php";
$conn=database();
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    if (isset($_POST["asientos"]) && is_array($_POST["asientos"])) 
    {
        $nombre = $_POST["nombre"]; 
        foreach ($_POST["asientos"] as $asiento) 
        {
            $sql = "INSERT INTO reservas (nombre, asiento, fecha_reserva) VALUES ('$nombre', '$asiento', NOW())";
            if ($conn->query($sql) !== TRUE) 
            {
                echo "Error al guardar la reserva: " ;
            }
        }
    }
}
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
    <link rel="stylesheet" href="../assets/css/selectseat.css">
    <title>PlayTickets</title>
</head>
<body>
<header>
        <div class="navbar">
            <h1 class="logotipo">
                <img src="../assets/img/logo.png.png" alt="Logo" height="80px ">PLAYTICKETS </h1>
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
            
            for ($i = 1; $i <= 100; $i++) {
                echo "<label class='asiento-label'><input type='checkbox' class='asiento-checkbox' name='asientos[]' value='$i'> Asiento $i</label>";
            }
            ?>
        </div>
        <input type="text" name="nombre" placeholder="Nombre del usuario">
        <input type="submit" value="Reservar">
    </form>
    <script>
        const seleccionarAsiento = (numero) => {
            const asientoCheckbox = document.querySelector(`input[name='asientos[]'][value='${numero}']`);
            asientoCheckbox.checked = !asientoCheckbox.checked;

            const asientoLabel = document.querySelector(`.asiento-label input[value='${numero}']`).parentElement;
            asientoLabel.classList.toggle('seleccionado');
        };

        const formularioReserva = document.getElementById('reserva-form');
        formularioReserva.addEventListener('submit', (event) => {
            const asientosSeleccionados = document.querySelectorAll('.asiento-label input:checked').length;
            if (asientosSeleccionados === 0) {
                alert('Por favor, selecciona al menos un asiento antes de reservar.');
                event.preventDefault(); // Evitar el envío del formulario si no hay asientos seleccionados
            }
        });
    </script>
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
