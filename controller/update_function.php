<?php
include_once "../models/functions.php";

/*$gender = $_POST["id_gender"];
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

$ok = updateShow($_POST["show_name"], $_POST["show_description"], $_POST["show_date_time"], $option_gender, $option_category, $_POST["id_show"]);
if (!$ok) {
    echo "Error actualizando.";
} else {
    //echo "Actualizacion con exito";
    header("Location: ../view/supplier.php");
    exit;
}
?>