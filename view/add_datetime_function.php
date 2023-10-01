<?php 
include_once "../models/functions.php";

$show = getShowForId($_GET["id_show"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/function.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->
    <title>PlayTickets</title>
    
</head>
<body>
    <div class="main-content">
        <header>
            <div class="navbar">
                <h1 class="logo"><img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS</h1>
                <button class="accordion"><i class="fas fa-bars"></i></button>
                <div class="panel">
                    <ul>
                        <li><a href="../index.php">Cartelera</a></li>
                        <li><a href="register.php">Registrarse</a></li>
                        <li><a href="add_function.php">Agregar Función</a></li>
                        <li><a href="supplier.php">Funciones Disponibles</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="register-container">
            <div class="register-box">
                <form action="../controller/save_datetime_function.php" method="post">
                    <div class="logo-container">
                        <h2 class="title-with-logo">AGREGA NUEVA FECHA</h2>
                    </div>
                    <div class="form-group">
                        <label for="show_name">Seleccione el nombre del show:</label>
                        <select class="form-control" id="id_show" name="id_show">
                            <option value="<?php echo $show->id_show ?>" required><?php echo $show->show_name ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formatted_date">Fecha (Día/Mes/Año):</label>
                        <input type="text" class="form-control" id="day" name="day" placeholder="Día" required>
                        <input type="text" class="form-control" id="month" name="month" placeholder="Mes" required>
                        <input type="text" class="form-control" id="year" name="year" placeholder="Año" required>
                        <!-- Campo oculto para almacenar la fecha en formato "año-mes-día" -->
                        <input type="hidden" id="date_show" name="date_show" required>
                    </div>
                    <div class="form-group">
                        <label for="show_date_time">Hora:</label>
                        <input type="time" class="form-control" id="time_show" name="time_show" required><br><br>
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
    <script>
    // Escucha cambios en los campos de entrada de día, mes y año
    const dayInput = document.getElementById('day'); // Obtiene el campo de entrada de día
    const monthInput = document.getElementById('month'); // Obtiene el campo de entrada de mes
    const yearInput = document.getElementById('year'); // Obtiene el campo de entrada de año
    const datetimeShowInput = document.getElementById('date_show'); // Obtiene el campo de entrada de fecha y hora

    dayInput.addEventListener('input', updateDate); // Agrega un listener de eventos al campo de día
    monthInput.addEventListener('input', updateDate); // Agrega un listener de eventos al campo de mes
    yearInput.addEventListener('input', updateDate); // Agrega un listener de eventos al campo de año

    function updateDate() {
        // Obtiene el valor actual de los campos de entrada de día, mes y año
        const day = dayInput.value.padStart(2, '0'); // Asegura que tenga al menos dos dígitos (01 en lugar de 1)
        const month = monthInput.value.padStart(2, '0'); // Asegura que tenga al menos dos dígitos (01 en lugar de 1)
        const year = yearInput.value;

        // Combina los valores en el formato "dd/mm/aaaa"
        const datetimeValue = `${day}-${month}-${year}`;

        // Asigna el valor al campo de entrada de fecha y hora
        datetimeShowInput.value = datetimeValue;
    }
    </script>
</body>
</html>
