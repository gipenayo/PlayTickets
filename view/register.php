<?php
include_once "../models/functions.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/register.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png.png">

    <title>Registro</title>
</head>
<body>

    <div class="register-container">
        <div class="register-box">
          <div class="logo-container">
            <img src="../assets/img/logo.png.png" alt="Logo">
          </div>
          <form action="../controller/save_register.php" method="post">
          <div class="form-row">
            <input type="text" name="first_name" id="first_name"placeholder="Nombre">
            <input type="text" name="last_name" id="last_name"placeholder="Apellido">
          </div>
          <div class="form-row">
            <input type="text" name ="dni" id="dni" placeholder="DNI">
            <input type="tel" name="phone" id="phone" placeholder="Teléfono">
          </div>
          <div class="form-row"> 
            <input type="date" name="date_birth" id="date_birth">
            <input type="street" name="street" id="street" placeholder="Calle">
          </div> 
          <div class="form-row">
          <input type="height" name="height" id="height" placeholder="Altura">
          <input type="departament" name="departament" id="departament" placeholder="departamento">
          </div>
          <div class="form-row">
          <input type="floor" name="floor" id="floor" placeholder="piso">
          <input type="cuil" name="cuil" id="cuil" placeholder="cuil">
          </div>

          <button id="register-button">Registrarse</button>
          <p>¿Ya tienes cuenta? <a href="../view/login.php">Iniciar sesión</a></p>
        </div>
        </form>
      </div>
</body>
</html>