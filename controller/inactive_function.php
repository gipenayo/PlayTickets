<?php

include_once "../models/functions.php";

$ok = inactiveShowDatetime($_POST["id_datetime"]);
if (!$ok) {
    echo "Error";
} else {
    /*echo "inactivo con exito";*/
    header("Location: ../view/supplier.php");
    exit;
}
?>