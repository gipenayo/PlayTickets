<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../models/functions.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $asientos = $_POST["asientos"];
    $conexion = database();
    foreach ($asientos as $asiento) 
    {
        $sql = "UPDATE asientos SET estado = 'reservado' WHERE numero_asiento = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1, $asiento, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>