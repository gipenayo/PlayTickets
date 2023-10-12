<?php
include_once "../models/functions.php";

$genders = getGender();
$categorys = getCategory();

$option_gender = $_POST["id_gender"];
foreach ($genders as $genders2) {
    if ($genders2->gender === $option_gender) {
        $option_gender = $genders2->id_gender; // Paso la palabra a id otra vez
        break;
    }
}

$option_category = $_POST["id_category"];
foreach ($categorys as $categorys2) {
    if ($categorys2->category === $option_category) {
        $option_category = $categorys2->id_category; // Paso la palabra a id otra vez
        break;
    }
}

$option_category = $_POST["id_category"];

// Verifica si se cargó una nueva imagen
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    $binary_picture = file_get_contents($_FILES['picture']['tmp_name']); // Obtiene los datos binarios de la nueva imagen
} else {
    // No se cargó una nueva imagen, obtén la imagen actual de la base de datos
    $currentPicture = getCurrentPicture($_POST["id_show"]); // Implementa esta función para obtener la imagen actual
    $binary_picture = $currentPicture;
}

$ok = updateShow(
    $_POST["show_name"],
    $_POST["show_description"],
    $option_gender,
    $option_category,
    $binary_picture, // Se pasará la nueva imagen o la imagen actual
    $_POST["id_show"]
);

if (!$ok) {
    echo "Error actualizando.";
} else {
    /*echo "Actualizacion con exito";*/
    header("Location: ../view/supplier.php");
    exit;
}
?>
