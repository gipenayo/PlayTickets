<?php
include_once "../models/functions.php";
$ok =register($_POST ["first_name"],$_POST["last_name"]);
if(!$ok)
{
    echo "error registrando";
}
else
{
    echo("registro");
}
?>