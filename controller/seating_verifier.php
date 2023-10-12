<?php
session_start();
include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
$id_show = isset($_GET['id_show']) ? $_GET['id_show'] : null;
$_SESSION["id"] = $id_show;
$name = $show->show_name;
$_SESSION["show"] = $name;
$datetime = getShowDatetime($_GET["id_datetime"]);
$id_date = isset($_GET["id_datetime"]) ? $_GET["id_datetime"] : null;
$time=$_SESSION["time"];
$_SESSION["seating"] = $_POST["cant_seating"];


  if (isset($_POST['cant_seating'])) {
      $selectedSeats = intval($_POST['cant_seating']);
      $id_show = $_SESSION['id'];
      $id_date = $_POST["datetime_show"];
      $seating_reserved = intval(getAmount($id_show, $id_date));// Obtén la cantidad de asientos reservados desde la base de datos
      $totalSelectedSeats = $selectedSeats + $seating_reserved; // Total de asientos seleccionados y reservados

      if ($totalSelectedSeats > 100 && $seating_reserved > 100)
      {
          // No se pueden reservar más de 100 asientos, muestra una alerta
          echo "<script>alert('No puedes reservar más de 100 asientos.'); window.location.href = '../view/synopsis.php?id_show=" . $id_show . "';</script>";
      } else if ($totalSelectedSeats >= $seating_reserved && $totalSelectedSeats > 100) {
          // No hay suficientes asientos disponibles, muestra una alerta
          echo "<script>alert('No hay asientos disponibles para la cantidad seleccionada.'); window.location.href = '../view/synopsis.php?id_show=" . $id_show . "';</script>";
      } else {
          // Hay asientos disponibles, redirige al usuario a otra vista
          header('Location: ../view/login.php');
      }
    } else {
        // En caso de que no se haya enviado la cantidad de asientos, redirige al usuario de vuelta a la página anterior
        header('Location: ../view/synopsis.php?id_show=' . $id_show);
    }
    ?>