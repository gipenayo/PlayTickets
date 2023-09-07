<?php
include_once "../models/functions.php";ev

$ok = deleteShow($_POST["id_show"]);

ai
if (!$ok) {
    echo "Error eliminando";
} else {
    //echo "Eliminado con exito";
v
   header("Location: ../view/supplier.php");
   exit;
}

?>

