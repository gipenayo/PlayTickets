<?php

require_once "../models/functions.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $user_state = 1;

    confMail($user_state, $id);

    header("Location: ../index.php");
    exit;
}
?>


?>