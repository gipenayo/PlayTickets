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
      <img src="../assets/img/logo.png.png" alt="Icon">
    </div>
        <form action="../controller/mail.php" method="post">
            <label for="email">Nueva Password</label>
            <input type="email" id="email" name="email" required><br>
            <label for="email">Confirmar Password</label>
            <input type="email" id="email" name="email_1" required>
            
            <button type="submit">Cambiar contraseña</button>
        </form>
  </div>
</div>
</body>
</html>