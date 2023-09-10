<?php
include_once "../models/functions.php";

/*$gender = $_FILES['picture'];
var_dump($gender);
exit;*/

$genders = getGender();
$categorys= getCategory();

$option_gender=$_POST["id_gender"];
foreach($genders as $genders2)
{
    if($genders2->gender === $option_gender)
    {
        $option_gender=$genders2->id_gender;//paso la palabra a id otra vez
        break;
    }
}

$option_category=$_POST["id_category"];
foreach ($categorys as $categorys2)
{
    if($categorys2->category === $option_category)
    {
        $option_category=$categorys2->id_category;//paso la palabra a id otra vez
        break;
    }
}

// Verificar si se ha enviado una imagen desde el formulario
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    // Obtener los datos binarios de la imagen
    $binary_picture = file_get_contents($_FILES['picture']['tmp_name']);

} else {
   
    echo "Error.";
}

$ok = updateShow($_POST["show_name"], $_POST["show_description"], $_POST["show_date_time"], $option_gender, $option_category, $binary_picture, $_POST["id_show"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    //echo "Actualizacion con exito";
    header("Location: ../view/supplier.php");
    exit;
}
?>

