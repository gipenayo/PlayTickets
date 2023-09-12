<?php

include_once "../models/functions.php";

$ok = deleteShow($_POST["id_show"]);


if (!$ok) {
    echo "Error eliminando";
} else {
    
    //echo "Eliminado con exito";


    header("Location: ../view/supplier.php");
    exit;

}
?>