<?php
session_start();
   include_once "../models/functions.php";
   $comp=login();
   /*var_dump($comp);
   exit;*/
$logged_in = false;
$adm="admin@admin.com";
$pwd="admin123";
if(($_POST["email"]===$adm)&&($_POST["_password"]===$pwd))
{
   echo "administrador";
}
else
{
   foreach($comp as $compara)//lopez no lo entenderias YO ENCONTRE VARIABLES EN ESPAÑOL EN TU CODIGO SALU2
   {
      if (($compara->email === $_POST["email"]) && (password_verify($_POST["_password"], $compara->_password)))

     {
      $logged_in = true;
         break;
     }
   }
   if ($logged_in) 
   {
      echo "¡Has iniciado sesión con éxito!";
   } 
   else 
   {
      echo "Usuario o contraseña incorrectos.";
   }    
}
?>

