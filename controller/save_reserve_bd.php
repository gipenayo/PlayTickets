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
    header("Location: ../controller/save_reserve.php");
}
?>
