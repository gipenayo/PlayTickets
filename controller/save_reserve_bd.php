<?php
session_start();
include_once "../models/functions.php";

$ok=false;

if(isset($_SESSION["order"]))
{
    $conf="0";
    saveReserve($_SESSION["order"],$conf);
    $ok=true;
}
else
{
    header("Location: ../index.php");
}


if ($ok) {
    echo "<script>alert('¡Su reserva fue exitosa! Muchas gracias por elegirnos.');</script>";
    header("Location: ../index.php");
}
else
{
echo "<script>alert('No se pudo realizar la reserva. Por favor, inténtelo de nuevo más tarde.');</script>";
}
?>
