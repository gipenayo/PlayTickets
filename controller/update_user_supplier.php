<?php
include_once "../models/functions.php";

$ok = updateUser($_POST["user_name"], $_POST["last_name"], $_POST["email"], $_POST["phone"], $_POST["date_birth"], $_POST["id_user"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    //echo "Actualizacion con exito";
    header("Location: ../view/view_users_supplier.php");
    exit;
}
?>