<?php
include_once "functions.php";
$ok =add($_POST ["genero"]);
if(!$ok)
{
    echo "error registrando";
}
else
{
    echo("registro");
}
?>