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

            saveTicket($_SESSION["time"], $_SESSION["id"], $seating, $_SESSION["id_user"],$_SESSION["order"]);
            addSeating($seating,$_SESSION["id"],$_SESSION["time"]);
            
        } else {
            header("Location: ../index.php");
        }
    }
} else {
    header("Location: ../index.php");
}

header("Location: ../controller/save_reserve_bd.php");
?>
