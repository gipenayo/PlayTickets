<?php
include_once "../models/functions.php";

// Obtén la fecha ingresada a través de $_POST
$fecha_ingresada = $_POST["date_show"];

// Obtiene la fecha actual
$fecha_actual = date("Y-m-d");

// Calcula la fecha de mañana
$fecha_manana = date("Y-m-d", strtotime("+1 day"));

// Comprueba si la fecha ingresada es válida y no está en el pasado
if (strtotime($fecha_ingresada) >= strtotime($fecha_manana)) {
    $state_active=1;//le asigno el valor a el estado.
$ok = addShowDatetime($_POST["date_show"],$_POST["time_show"], $state_active ,$_POST["id_show"] );
if (!$ok) {
    echo "Error registrando.";
} else {
    //echo "REGISTRO EXITOSO";
    header("Location: ../view/supplier.php");
    exit;

}

} else {
    echo "La fecha ingresada no es valida.";
}
?>



