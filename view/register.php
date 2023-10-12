<?php
include_once "../models/functions.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">  
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><!--Icono de menu-->
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <title>PlayTickets</title>
</head>
<body onload="updateDate()">
  <div class="main-content">
  <?php if (isset($_GET['successfulRegistratio']) && $_GET['successfulRegistratio'] == 1): 
      echo '<script>alert("Registro exitoso! Gracias por registrarte en PlayTickets. Verifica tu correo electrónico para la confirmación.");</script>';
      echo '<script>window.location.href = "../index.php";</script>'; // Regresar a la página anterior>
     endif; ?>
    <header>
      <div class="navbar">
        <img src="../assets/img/logo.png" alt="Logo" height="80px">
        <h1 class="logo">PLAYTICKETS</h1>
        <button class="accordion"><i class="fas fa-bars"></i></button>
        <div class="panel">
          <ul>
            <li><a href="../index.php">Cartelera</a></li>
            <li><a href="contact_page.php">Contacto</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main>
      <div class="register-container">
        <div class="register-box">
          <div class="logo-container">
            <h2 class="title-with-logo">Registrate <img src="../assets/img/logo.png" alt=""></h2>
          </div>
          <form action="../controller/welcome_mail.php" method="post" onsubmit="return validarEdad()">
            <div class="form-row">
              <input type="text" name="first_name" id="first_name" placeholder="Nombre" required>
              <input type="text" name="last_name" id="last_name" placeholder="Apellido" required>
            </div>
            <div class="form-row">
              <input type="email" name="email" placeholder="Correo Electronico" required>
              <input type="password" name="_password" placeholder="Password" required>
            </div>
            <div class="form-row">
              <input type="street" name="street" id="street" placeholder="Calle" required>
              <input type="height" name="height" id="height" placeholder="Altura" required>
            </div>
            <div class="form-row">
              <input type="departament" name="departament" id="departament" placeholder="departamento">
              <input type="floor" name="floor" id="floor" placeholder="piso">
            </div>
            <div class="form-row">
              <input type="tel" name="phone" id="phone" placeholder="Teléfono" required>
              <input type="text" name ="dni" id="dni" placeholder="DNI" required>
            </div>
            
            <div class="form-row"> 
              <label for="formatted_date">Fecha de Nacimiento (Día/Mes/Año):</label>
              <input type="text" class="form-control" id="day" name="day" placeholder="Día" required pattern="^(0?[1-9]|[12][0-9]|3[01])$">
              <input type="text" class="form-control" id="month" name="month" placeholder="Mes" required pattern="^(0?[1-9]|1[0-2])$">
              <input type="text" class="form-control" id="year" name="year" placeholder="Año" required pattern="^\d{4}$">
              <!-- Campo oculto para almacenar la fecha en formato "año-mes-día" -->
              <input type="hidden" id="date_birth" name="date_birth" required>
            </div> 

            <button type="submit" id="register-button">Continuar</button>
            <p>¿Ya tienes una cuenta? <a href="../index.php">Iniciar sesión</a></p>
          </form>
        </div>
      </div>
    </main> 
  </div>    

  <footer>
    <div class="footer-logo"></div>
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
    // Escucha cambios en los campos de entrada de día, mes y año
    const dayInput = document.getElementById('day'); // Obtiene el campo de entrada de día
    const monthInput = document.getElementById('month'); // Obtiene el campo de entrada de mes
    const yearInput = document.getElementById('year'); // Obtiene el campo de entrada de año
    const datetimeShowInput = document.getElementById('date_birth'); // Obtiene el campo de entrada de fecha y hora

    dayInput.addEventListener('input', updateDate); // Agrega un listener de eventos al campo de día
    monthInput.addEventListener('input', updateDate); // Agrega un listener de eventos al campo de mes
    yearInput.addEventListener('input', updateDate); // Agrega un listener de eventos al campo de año

    function updateDate() {
      // Obtiene el valor actual de los campos de entrada de día, mes y año
      const day = dayInput.value.padStart(2, '0'); // Asegura que tenga al menos dos dígitos (01 en lugar de 1)
      const month = monthInput.value.padStart(2, '0'); // Asegura que tenga al menos dos dígitos (01 en lugar de 1)
      const year = yearInput.value;

      // Combina los valores en el formato "aaaa-mm-dd"
      const datetimeValue = `${year}-${month}-${day}`;

      // Asigna el valor al campo de entrada de fecha y hora
      datetimeShowInput.value = datetimeValue;
    }
  </script>
  <script>
    // Obtiene el campo de entrada del DNI
const dniInput = document.getElementById('dni');

// Agrega un evento de escucha para el evento 'input' en el campo DNI
dniInput.addEventListener('input', function() {
  // Elimina cualquier carácter que no sea un número del valor del campo DNI
  dniInput.value = dniInput.value.replace(/[^0-9]/g, '');

  // Limita la longitud del campo a 8 dígitos
  if (dniInput.value.length > 8) {
    dniInput.value = dniInput.value.slice(0, 8);
    alert("El DNI no puede contener más de 8 dígitos.");
  }
});

  </script>
  <script>
    // Obtiene el campo de entrada del número de teléfono
const phoneInput = document.getElementById('phone');
const firstNameInput = document.getElementById('first_name');
const lastNameInput = document.getElementById('last_name');
const streetInput = document.getElementById('street');
const heightInput = document.getElementById('height');

// Agrega un evento de escucha para el evento 'input' en el campo de teléfono
phoneInput.addEventListener('input', function() {
  // Elimina cualquier carácter que no sea un número del valor del campo de teléfono
  phoneInput.value = phoneInput.value.replace(/[^0-9]/g, '');

  // Limita la longitud del campo a 10 dígitos
  if (phoneInput.value.length > 10) {
    phoneInput.value = phoneInput.value.slice(0, 10);

    // Muestra una alerta cuando se ingresan más de 10 dígitos
    alert("El número de teléfono no puede contener más de 10 dígitos.");
  }
});
// Obtiene los campos de entrada de nombre y apellido


// Agrega un evento de escucha para el evento 'input' en los campos de nombre y apellido
firstNameInput.addEventListener('input', function() {
  // Elimina cualquier carácter que sea un número del valor del campo de nombre
  firstNameInput.value = firstNameInput.value.replace(/[0-9]/g, '');
});

lastNameInput.addEventListener('input', function() {
  // Elimina cualquier carácter que sea un número del valor del campo de apellido
  lastNameInput.value = lastNameInput.value.replace(/[0-9]/g, '');
  
});
streetInput.addEventListener('input', function() {
  // Elimina cualquier carácter que sea un número del valor del campo de apellido
  streetInput.value = streetInput.value.replace(/[0-9]/g, '');
  
});
heightInput.addEventListener('input', function() {
  // Elimina cualquier carácter que no sea un número del valor del campo de altura
  heightInput.value = heightInput.value.replace(/[^0-9]/g, '');
});
  </script>
</body>
</html>
