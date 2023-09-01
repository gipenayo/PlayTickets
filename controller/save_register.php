<?php
include_once "../models/functions.php";
orm_show1
$ok =register($_POST ["first_name"],$_POST["last_name"],$_POST["dni"] ,$_POST["phone"],$_POST["date_birth"],$_POST["street"],$_POST["height"],$_POST["departament"],$_POST["floor"],$_POST["cuil"]);
ai
if(!$ok)
{
    echo "error registrando";
}
else
{
    echo("registro");
}
?>