<?php

require_once "../models/functions.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $id_state = 1;

    confMail($id_state, $id);

    header("Location: ../index.php");
    exit;
}
?>


?>