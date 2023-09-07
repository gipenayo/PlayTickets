<?php
include_once "../models/functions.php";

$ok = AddShow($_POST["show_name"],$_POST["show_description"],$_POST["show_date_time"], $_POST["id_gender"], $_POST["id_category"]);
if (!$ok) {
    echo "Error registrando.";
} else {
    //echo "REGISTRO EXITOSO";
    header("Location: ../view/supplier.php");
    exit;
}
?>