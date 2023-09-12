<?php
include_once "models/functions.php";

// Obtener los valores de búsqueda desde el formulario en "index.php" mediante el método POST
$search = isset($_POST["search"]) ? $_POST["search"] : "";
$id_gender = isset($_POST["id_gender"]) ? $_POST["id_gender"] : "";
$id_category = isset($_POST["id_category"]) ? $_POST["id_category"] : "";

// Comprobar si se ha enviado una solicitud POST desde el formulario de búsqueda
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Llamar a la función "getShow" con los valores de búsqueda para obtener los resultados filtrados
    $shows = getShow($search, $id_gender, $id_category);
} else {
    // Si no se ha enviado una solicitud POST, obtener todos los shows sin filtrar
    $shows = getShow();
}

// Obtener la lista de géneros y categorías para llenar los select en el formulario
$genders = getGender();
$categorys = getCategory();

// Los resultados filtrados (si los hubiera) se almacenan en la variable "$shows" y se mostrarán en "index.php"
?>