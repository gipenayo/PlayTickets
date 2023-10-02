<?php
include_once "../models/functions.php";


$ok = updateUser($_POST["user_name"], $_POST["last_name"], $_POST["email"], $_POST["dni"], $_POST["phone"], $_POST["date_birth"], $_POST["street"], $_POST["height"],$_POST["id_user"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    /*echo "Actualizacion con exito";*/
    header("Location: ../index.php");
    exit;
}
?>