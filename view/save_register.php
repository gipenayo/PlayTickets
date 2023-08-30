<?php
include_once "../models/functions.php";
$ok =register($_POST ["first_name"],$_POST["last_name"],$_POST["dni"] ,$_POST["email"],$_POST["phone"],$_POST["date_birth"],$_POST["street"],$_POST["height"],$_POST["_password"]);
if(!$ok)
{
    echo "error registrando";
}
else
{
    echo("registro");
}
?>