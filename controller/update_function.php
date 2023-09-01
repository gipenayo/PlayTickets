<?php
include_once "../models/functions.php";

$ok = updateShow($_POST["show_name"], $_POST["show_description"], $_POST["show_date_time"], $_POST["id_gender"], $_POST["id_category"], $_POST["id_show"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    echo "Actualizacion con exito";
    header("Location: /view/supplier.php");
    exit;
}