<?php
session_start();
include_once "../models/functions.php";

if (isset($_SESSION["id"]) && isset($_SESSION["name"]) && isset($_SESSION["show"]) && isset($_SESSION["asiento"]) && isset($_SESSION["time"]) && isset($_SESSION["order"]))
 {
    $asientosString = $_SESSION["asiento"];
    $asientosArray = explode(',', $asientosString);

    foreach ($asientosArray as $seating) {
        $seating = trim($seating); // Elimina espacios en blanco adicionales, si los hay

        if (!empty($seating)) {
            saveReserve($_SESSION["time"], $_SESSION["id"], $seating, $_SESSION["name"],$_SESSION["order"]);
            
        } else {
            header("Location: ../index.php");
            exit; // Termina la ejecución después de redirigir
        }
    }
} else {
    header("Location: ../index.php");
}
?>
