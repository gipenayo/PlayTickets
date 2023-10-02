<?php
include_once "../models/functions.php";

$ok = updateShowDatetime($_POST["date_show"],$_POST["time_show"], $_POST["id_datetime"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    /*echo "Actualizacion con exito";*/
    header("Location: ../view/supplier.php");
    exit;
}
?>