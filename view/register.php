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
          <form action="../controller/WelcomeMail.php" method="post"> 
            <div class="form-row">
              <input type="text" id="first-name" name="first-name" placeholder="Nombre">
              <input type="text" id="last-name" name="last-name" placeholder="Apellido">
            </div>
            <div class="form-row">
              <input type="text" id="dni" name="dni" placeholder="DNI">
              <input type="tel" id="phone" name="phone" placeholder="Teléfono">
            </div>
            <div class="form-row">
              <input type="email" id="email" name="email" placeholder="Correo Electrónico">
              <input type="number" id="age" name="age" placeholder="Edad">
            </div>
            <div class="form-row">
              <input type="text" id="street" name="street" placeholder="Calle">
              <input type="number" id="street-number" name="street-number" placeholder="Altura">
            </div>
            <div class="form-row">
              <input type="text" id="city" name="city" placeholder="Localidad">
            </div>
            <div class="form-row">
              <input type="password" id="password" name="password" placeholder="Contraseña">
              <input type="password" id="confirm-password" name="confirm-password" placeholder="Conf. Contraseña">
            </div>
            <button type="submit" id="register-button">Registrarse</button>
          </form> 
          <p>¿Ya tienes cuenta? <a href="login.html">Iniciar sesión</a></p>
        </div>
      </div>
</body>
</html>
