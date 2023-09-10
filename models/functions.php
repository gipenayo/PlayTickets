<?php

function database()
{
    $user_password = getenv("MYSQL_ROOT_PASSWORD");
    $user_name = getenv("MYSQL_PASSWORD");
    $databasename = getenv("MYSQL_DATABASE");
    $database = new PDO('mysql:host=db;dbname=' . $databasename, $user_name, $user_password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}

function register ($first_name, $last_name,$email, $dni ,$phone,$date_birth,$street,$height,$departament,$floor,$cuil,$_password)
{
    $bd=database();
    $sentence=$bd->prepare("INSERT INTO users(user_name,last_name,dni,email,phone,date_birth,street,height,_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $sentence->execute([$first_name, $last_name,$dni, $phone,$date_birth,$street,$height]);

}

function getGender()
{
    $bd = database();
    $sentence = $bd->query("SELECT id_gender , gender FROM genders");
    return $sentence->fetchAll();
}

function getCategory()
{
    $bd = database();
    $sentence = $bd->query("SELECT id_category , category FROM shows_categorys");
    return $sentence->fetchAll();
}

function addShow($show_name, $show_description, $show_date_time, $id_gender, $picture, $id_category, $state)
{
    $show_name = ucfirst(strtoupper($show_name));//mayuscula en la primera letra de cada palabra
    $show_description=ucfirst(strtolower($show_description));//primera letra en mayuscula y lo demas en minuscula
    $bd=database();
    $sente=$bd->prepare("INSERT INTO shows(show_name, show_description, show_date_time, id_gender, picture, id_category, show_state) VALUES (?,?,?,?,?,?,?)");
    return $sente->execute([$show_name, $show_description, $show_date_time, $id_gender, $picture, $id_category, $state]);
}

function getShow()
{
    $bd = database();
    $sentence = $bd->query("SELECT  id_show, show_name, show_description, show_date_time, id_gender, id_category, picture , show_state FROM shows");
    return $sentence->fetchAll();
}

function getShowDetallCategory()
{
    $bd = database();
    $sentence = $bd->query("SELECT shows_categorys.id_category , shows_categorys.category FROM `shows` JOIN shows_categorys on shows.id_category=shows_categorys.id_category");
    return $sentence->fetchAll();
}

function getShowDetallGender()
{
    $bd = database();
    $sentence = $bd ->query("SELECT genders.id_gender , genders.gender FROM `shows` JOIN genders on shows.id_gender=genders.id_gender");
    //$sentence = $bd->query("SELECT  genders.gender  FROM shows JOIN genders on shows.id_gender=genders.id_gender");
    return $sentence->fetchAll();
}

function searchShow($show_name)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT id_show, show_name, show_description, show_date_time, id_gender, id_category, picture, show_state FROM shows WHERE show_name LIKE ?");
    $sentence->execute(["%$show_name%"]);
    return $sentence->fetchAll();

}

function getShowForId($id_show)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT id_show, show_name, show_description, show_date_time, id_gender, id_category, picture , show_state FROM shows WHERE id_show = ?");
    $sentence->execute([$id_show]);
    return $sentence->fetchObject();
}

function updateShow($show_name, $show_description, $show_date_time, $id_gender, $id_category, $picture, $id_show)
{
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows SET show_name = ?, show_description = ?, show_date_time = ?, id_gender = ?, id_category = ?, picture = ? WHERE id_show = ?");
    return $sentence->execute([$show_name, $show_description, $show_date_time, $id_gender, $id_category, $picture, $id_show]);
}

/*function deleteSHow($id_show)
{
    $bd = database();
    $sentence = $bd->prepare("DELETE FROM shows WHERE id_show = ?");
    return $sentence->execute([$id_show]);
}*//* ELIMINA EL SHOW POR COMPLETO DE LA BASE DE DATOS */

function deleteShow($id_show)
{
    $state_inactive = 0;
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows SET show_state = ? WHERE id_show = ?");
    $result = $sentence->execute([$state_inactive, $id_show]);
    return $result;
}

function recovery($_password)
{
    $bd=database();
    $sentence=$bd->prepare("UPDATE users SET _password =?");
    return $sentence->execute([$_password]);
}

 function login ()
 {
    $bd=database();
    $sentence=$bd->query("SELECT email ,_password FROM users");
    return $sentence->fetchAll();
 }
?>
