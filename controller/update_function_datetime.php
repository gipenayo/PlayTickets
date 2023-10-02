<?php
include_once "../models/functions.php";

$fecha_ingresada = $_POST["date_show"];// Obtén la fecha ingresada a través de $_POST

$fecha_actual = date("Y-m-d");// Obtiene la fecha actual

$fecha_manana = date("Y-m-d", strtotime("+1 day"));// Calcula la fecha de mañana

// Comprueba si la fecha ingresada es válida y no está en el pasado
if (strtotime($fecha_ingresada) >= strtotime($fecha_manana)) {
    
$ok = updateShowDatetime($_POST["date_show"],$_POST["time_show"], $_POST["id_datetime"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    /*echo "Actualizacion con exito";*/
    header("Location: ../view/supplier.php");
    exit;
}
} else {
    echo "La fecha ingresada no es valida.";
}
?>