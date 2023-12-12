<?php
session_start();
include_once "../models/functions.php";
$datetime_hour=$_SESSION["time"];
if (isset($_SESSION["id"]) && isset($_SESSION["id_user"]) && isset($_SESSION["show"]) && isset($_SESSION["asiento"]) && isset($datetime_hour) && isset($_SESSION["order"])&& isset($_SESSION["unique_code"]))
 {
    $asientosString = $_SESSION["asiento"];
    $asientosArray = explode(',', $asientosString);

    foreach ($asientosArray as $seating) {
        $seating = trim($seating); // Elimina espacios en blanco adicionale, si los hay
        
        if (!empty($seating)) {

            saveTicket($datetime_hour, $_SESSION["id"], $seating,$_SESSION["order"],$_SESSION["id_user"], $_SESSION["unique_code"]);
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
