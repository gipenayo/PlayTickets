<?php  
include_once "../models/functions.php";

$id_order = $_GET['id'];

// Genera el número único alternativo
$uniqueNumber = mt_rand(100000, 999999);

// Actualiza la base de datos con el número único alternativo
$success = saveUniqueCode($id_order, $uniqueNumber);

if ($success) {
    // Confirma la reserva
    $ok = confirmReservation($id_order);

    if ($ok) {
        // Redirige a la página con el código QR
        header("Location: http://192.168.0.153:8080/PlayTickets/view/conf_qr.php?id=$id_order&unique=$uniqueNumber");
        exit();
    } else {
        // Manejar el caso de confirmación fallida
        echo "Error al confirmar la reserva";
    }
} else {
    // Manejar el caso de falla al guardar el número único en la base de datos
    echo "Error al guardar el número único en la base de datos";
}
?>