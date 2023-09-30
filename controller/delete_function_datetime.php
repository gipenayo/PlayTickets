<?php

include_once "../models/functions.php";

$ok = deleteShowDatetime($_POST["id_datetime"]);
if (!$ok) {
    echo "Error eliminando";
} else {
    /*echo "Eliminado con exito";*/
    header("Location: ../view/supplier.php");
    exit;
}

?>