<?php
session_start();
include_once "../models/functions.php";
$id_user=$_SESSION["id_user"];
$ok=false;

if(isset($_SESSION["order"]))
{
    $conf="0";
    saveReserve($_SESSION["order"],$conf,$id_user);
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
