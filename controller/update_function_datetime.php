<?php
include_once "../models/functions.php";

$ok = updateShowDatetime($_POST["datetime_show"], $_POST["id_datetime"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    /*echo "Actualizacion con exito";*/
    header("Location: ../view/datetime_function.php");
    exit;
}
?>