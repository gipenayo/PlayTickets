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
    <form action="login.php" method="post">
      <input type="text" name="username" placeholder="DNI o CUIT" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p>¿No está registrado? <a href="register.html">Registrate aquí</a></p>
    <p>¿Olvidaste tu contraseña? <a href="recovery_form.html">Haga click aqui</a></p>
  </div>
</div>
</body>
</html>