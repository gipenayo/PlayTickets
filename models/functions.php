<?php
// GUARDAMOS TODAS LAS FUNCIONES QUE VAMOS A USAR
function database()
{
    $user_password = getenv("MYSQL_ROOT_PASSWORD");
    $user_name = getenv("MYSQL_PASSWORD");
    $databasename = "PlayTickets";
    $database = new PDO('mysql:host=db;dbname=' . $databasename, $user_name, $user_password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
function register ($first_name, $last_name, $dni ,$phone,$date_birth,$street,$height,$departament,$floor,$cuil)
{
    $bd=database();
    $sente=$bd->prepare("INSERT INTO users(user_name,last_name,dni,phone,date_birth,street,height,departament,floor,cuil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $sente->execute([$first_name, $last_name,$dni, $phone,$date_birth,$street,$height,$departament,$floor,$cuil]);

}

function add ($genero)
{
    $bd=database();
    $sente=$bd->prepare("INSERT INTO genders(gender) VALUES (?)");
    return $sente->execute([$genero]);
}
function recovery ($email)
{
    $bd=database();
    $sente=$bd->prepare("INSERT INTO recovery_tokens(token) VALUES (?)");
    return $sente->execute([$email]);
}
?>
