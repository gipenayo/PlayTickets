<?php
include_once "../models/functions.php";

// Verificar si se ha enviado una imagen desde el formulario
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    // Obtener los datos binarios de la imagen
    $binary_picture = file_get_contents($_FILES['picture']['tmp_name']);

} else {
   
    echo "Error.";
}

$state_active=1;//le asigno el valor a el estado.

$ok = AddShow($_POST["show_name"],$_POST["show_description"], $_POST["id_gender"],  $_POST["id_category"],$binary_picture, $state_active);
if (!$ok) {
    echo "Error registrando.";
} else {
    //echo "REGISTRO EXITOSO";
    header("Location: ../view/supplier.php");
    exit;

}
?>