<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>PlayTickets</title>
</head>
<body>
<div class="login-container">
  <div class="login-box">
    <div class="logo-container">
      <img src="../assets/img/img1.png" alt="Icon">
    </div>
        <form action="recuperar_contrasena.php" method="post">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Recuperar contraseña</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="login.html">Iniciar sesión</a></p>
  </div>
</div>
</body>
</html>