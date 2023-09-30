<?php
include_once "../models/functions.php";

$state_active=1;//le asigno el valor a el estado.
$ok = addShowDatetime($_POST["date_show"],$_POST["time_show"], $state_active ,$_POST["id_show"] );
if (!$ok) {
    echo "Error registrando.";
} else {
    //echo "REGISTRO EXITOSO";
    header("Location: ../view/supplier.php");
    exit;

}
?>