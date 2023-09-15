<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>PlayTickets</title>
    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="../assets/css/front_seat.css">
</head>
<body>
<header>
    <div class="navbar">
        <h1 class="logo">
            <img src="../assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS </h1>
        <button class="accordion">Menú</button>
        <div class="panel">
            <ul>
                <li><a href="index.php">Cartelera</a></li>
                <li><a href="../view/login.php">Ingresar</a></li>
                <li><a href="../view/register.php">Registrarse</a></li>
                <li><a href="../view/contact_page.php">Contacto</a></li>
            </ul>
        </div>
    </div>
</header>

<div id="seating-chart-container">
    <div id="stage-title">Escenario</div>
    <div class="stage"></div> <!-- Raya ovalada para simular el escenario -->
    <div id="seating-chart"></div>

    <div id="legend">
        <div class="legend-item">
            <div class="seat unavailable">
                <i class="fas fa-chair"></i>
            </div>
            <span>No Disponible</span>
        </div>
        <div class="legend-item">
            <div class="seat selected">
                <i class="fas fa-chair"></i>
            </div>
            <span>Seleccionado</span>
        </div>
        <div class="legend-item">
            <div class="seat available">
                <i class="fas fa-chair"></i>
            </div>
            <span>Disponible</span>
        </div>
    </div>
</div>
<br>
<button id="reservation-button" disabled>Confirmar</button>
<br>
<footer>
    <div class="footer-logo"></div>
    <div class="footer-content">
        <div class="footer-links">
            <a href="#">Política de Privacidad</a>
            <a href="#">Términos y Condiciones</a>
            <a href="../view/contact_page.php">Contacto</a>
        </div>
        <div class="footer-copyright">
            &copy; 2023 PlayTickets
        </div>
    </div>
</footer>
<script src="../assets/js/barnavfooter.js"></script>
<script>
    // Obtén el elemento div donde mostrarás los asientos.
    const seatingChart = document.getElementById('seating-chart');

    // Número de filas y columnas.
    const rows = 10;
    const columns = 10;

    // Asientos comprados y seleccionados (puedes personalizar esto según tus necesidades).
    const seatsUnavailable = ['A1', 'C3', 'D5', 'F7'];
    const seatsSelected = [];

    // Función para crear la selección de asientos.
    function createSeating() {
        for (let row = 1; row <= rows; row++) {
            for (let col = 1; col <= columns; col++) {
                const seat = document.createElement('div');
                seat.className = 'seat';
                const seatLabel = String.fromCharCode(64 + row) + col;
                seat.textContent = seatLabel;

                // Verificar si el asiento está comprado, seleccionado o disponible.
                if (seatsUnavailable.includes(seatLabel)) {
                    seat.classList.add('unavailable');
                    seat.disabled = true;
                } else if (seatsSelected.includes(seatLabel)) {
                    seat.classList.add('selected');
                    seat.textContent += ' (Seleccionado)';
                } else {
                    seat.classList.add('available');
                    seat.addEventListener('click', () => {
                        // Verificar si ya se seleccionaron cuatro asientos.
                        if (seatsSelected.length <= 5) {
                            // Cambiar el estado del asiento (seleccionar o deseleccionar).
                            toggleSeat(seat);
                        } else {
                            alert('Ya has seleccionado el máximo de asientos por compra.');
                        }
                    });
                }

                seatingChart.appendChild(seat);
            }
            seatingChart.appendChild(document.createElement('br')); // Salto de línea después de cada fila.
        }
    }

    // Función para cambiar el estado del asiento (seleccionar o deseleccionar).
    function toggleSeat(seat) {
        const seatLabel = seat.textContent;
        if (seatsSelected.includes(seatLabel)) {
            // El asiento ya está seleccionado, deselecciónalo.
            const index = seatsSelected.indexOf(seatLabel);
            if (index !== -1) {
                seatsSelected.splice(index, 1);
            }
            seat.classList.remove('selected');
            seat.classList.add('available');
        } else {
            // El asiento no está seleccionado, selecciónalo si no se supera el límite.
            seatsSelected.push(seatLabel);
            seat.classList.remove('available');
            seat.classList.add('selected');
        }
    }

    // Llama a la función para crear la selección de asientos al cargar la página.
    createSeating();
</script>
</body>
</html>
