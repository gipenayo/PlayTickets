<?php

include_once "../models/functions.php";

$ok=activeShowDatetime($_POST["id_datetime"]);
/*var_dump($ok);
exit;*/
if (!$ok) {
    
    echo "error de activacion";
} else {
    /*echo "activo con exito";*/
    header("Location: ../view/supplier.php");
    exit;
}
?>