<?php
include_once "../models/functions.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">
    <title>Registro</title>
</head>
<body>
    <div class="register-container">
        <div class="register-box">
          <div class="logo-container">
            <img src="../assets/img/img2.png" alt="Logo">
          </div>
          <form action="save_register.php" method="post">
          <div class="form-row">
            <input type="text" name="first_name" id="first_name"placeholder="Nombre">
            <input type="text" name="last_name" id="last_name"placeholder="Apellido">
          </div>
          <div class="form-row">
            <input type="text" name ="dni" id="dni" placeholder="DNI">
            <input type="email" name="email" id="email" placeholder="Correo Electrónico">
          </div>
          <div class="form-row">
          <input type="tel" name="phone" id="phone" placeholder="Teléfono">
            <input type="datetime-local" name="date_birth" id="date_birth">
          </div> 
          <div class="form-row">
          <input type="street" name="street" id="street" placeholder="Calle">
          <input type="height" name="height" id="height" placeholder="Altura">
          </div>
          <div class="form-row">
          <input type="password" name="_password" id="_password" placeholder="Contraseña">
          <input type="" name="" id="" placeholder="Confirmar contraseña">
          </div>
          <button type="submit" id="register-button">Registrarse</button>
          <p>¿Ya tienes cuenta? <a href="login.html">Iniciar sesión</a></p>
        </div>
        </form>
      </div>
</body>
</html>