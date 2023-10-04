<?php
session_start();

$_SESSION['order']
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavlog.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/qr.css">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>PlayTickets</title>
</head>
<body>
<div class="main-content">

    <header>
        <div class="navbar">
        <img src="../assets/img/logo.png" alt="Logo" height="80px ">
        <h1 class="logotipo">PLAYTICKETS </h1>
        <button class="accordion"><i class="fas fa-bars"></i></button>
        <div class="panel">
            <ul>
                <li>Hola <?php echo $_SESSION["name"]?>!</li>
                <li><a href="record.php">Mis reservas</a></li>
                <hr class="hr">
                <li><a href="#">Cerrar Sesion</a></li>
            </ul>
        </div>
        </div>
    </header>

<div class="qr-container">
    <h1>Deberá enseñar este QR en el mostrador.</h1>
    <img src="../controller/generate_qr.php" id="qr">
    <button onclick="downQR()">descargar QR</button>
    <br><br>
</div>


<script type="text/javascript">
/*
	la funcion de JS descarga la imagen
*/
	function downQR() {
		var source = document.getElementById('qr').src;
		var a = document.createElement('a');

		a.download = true;
		a.target = '_blank';
		a.href = source;

		a.click();
	}
</script>
</div>
<footer>

    <div class="footer-logo"></div> 
    <div class="footer-content">
        <div class="footer-links">
            <a href="politic_private.php">Política de Privacidad</a>
            <a href="termin_condiction.php">Términos y Condiciones</a>
            <a href="contact_page.php">Contacto</a>
        </div>
        <div class="footer-copyright">&copy; 2023 PlayTickets</div>  
    </div>
</footer>

<script src="../assets/js/barnavfooter.js"></script>
</body>
</html>