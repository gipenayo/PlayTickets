<?php

date_default_timezone_set("America/Argentina");
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

function register ($first_name, $last_name,$email, $dni ,$phone,$date_birth,$street,$height,$departament,$id_rol,$_password,$user_state)
{
    $bd=database();
    $sentence=$bd->prepare("INSERT INTO users(user_name,last_name,email,dni,phone,date_birth,street,height,departament,id_rol,_password,user_state) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $sentence->execute([$first_name, $last_name,$email,$dni, $phone,$date_birth,$street,$height,$departament,$id_rol,$_password,$user_state]);
}
function addSeating($asientosSeleccionados, $idese)
{
    $bd = database();
    // Divide la cadena de asientos en un array de asientos individuales
    $asientosArray = explode(',', $asientosSeleccionados);
    
    // Elimina espacios en blanco alrededor de cada asiento y la coma final
    $asientosArray = array_map('trim', $asientosArray);
    $asientosArray = array_filter($asientosArray); // Elimina elementos vacíos

    // Itera a través de los asientos y ejecuta una inserción para cada uno
    foreach ($asientosArray as $asiento) {
        $sentence = $bd->prepare("INSERT INTO seatings(seating_number, id_show) VALUES (?, ?)");
        $result = $sentence->execute([$asiento, $idese]);

        // Verifica si hubo un error en la inserción
        if (!$result) {
            return false; // Retorna false si falla una inserción
        }
    }

    return true; // Retorna true si todas las inserciones son exitosas
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

function addShow($show_name, $show_description, $id_gender, $id_category, $picture, $state)
{
    $show_name = ucfirst(strtoupper($show_name));//mayuscula en la primera letra de cada palabra
    $show_description=ucfirst(strtolower($show_description));//primera letra en mayuscula y lo demas en minuscula
    $bd=database();
    $sente=$bd->prepare("INSERT INTO shows(show_name, show_description, id_gender, id_category, picture, show_state) VALUES (?,?,?,?,?,?)");
    return $sente->execute([$show_name, $show_description, $id_gender, $id_category , $picture,$state]);
}

function addShowDatetime($datetime_show, $datetime_state, $id_show)//agregamos la fecha de los shows;
{
    $bd=database();
    $sente=$bd->prepare("INSERT INTO shows_dates(datetime_show , datetime_state , id_show) VALUES (?,?,?)");
    return $sente->execute([$datetime_show, $datetime_state, $id_show]);
}

function getShowDatetime()
{
    $bd=database();
    $sentence = $bd->query("SELECT id_datetime , datetime_show , datetime_state, id_show FROM shows_dates");
    return $sentence->fetchAll();
}

function getShow($search = null, $id_gender = null, $id_category = null)
{
    $bd = database();
    $sql = "SELECT id_show, show_name, show_description, id_gender, id_category,picture ,show_state FROM shows WHERE 1";
    $parameters = [];
    if (!empty($search)) {
        // Si se proporciona un término de búsqueda, se agrega una condición a la consulta SQL
        $sql .= " AND show_name LIKE ?";
        $parameters[] = "%$search%";
    }

    if (!empty($id_gender)) {
        // Si se selecciona un género, se agrega una condición a la consulta SQL
        $sql .= " AND id_gender = ?";
        $parameters[] = $id_gender;
    }
    if (!empty($id_category)) {
        // Si se selecciona una categoría, se agrega una condición a la consulta SQL
        $sql .= " AND id_category = ?";
        $parameters[] = $id_category;
    }
    $sentence = $bd->prepare($sql);
    $sentence->execute($parameters);
    return $sentence->fetchAll();
}

function getReserver( $showId)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT seating_number, seating_state, id_show FROM seatings WHERE  id_show = :showId");
    $sentence->bindParam(':showId', $showId, PDO::PARAM_INT);
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_OBJ);
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

function getShowDetallShow()//devuelve el dettale del show para usar con la fecha
{
    $bd = database();
    $sentence = $bd->query("SELECT shows.id_show , shows.show_name FROM `shows_dates` JOIN shows on shows_dates.id_show=shows.id_show");
    return $sentence->fetchAll();
}

function searchShow($show_name)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT id_show, show_name, show_description, id_gender, id_category, picture, show_state FROM shows WHERE show_name LIKE ?");
    $sentence->execute(["%$show_name%"]);
    return $sentence->fetchAll();

}

function getShowForId($id_show)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT id_show, show_name, show_description, id_gender, id_category, picture , show_state FROM shows WHERE id_show = ?");
    $sentence->execute([$id_show]);
    return $sentence->fetchObject();
}

function getShowDatetimeForId($id_datetime)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT id_datetime , datetime_show , datetime_state , id_show FROM shows_dates WHERE id_datetime = ?");
    $sentence->execute([$id_datetime]);
    return $sentence->fetchObject();
}

function updateShow($show_name, $show_description, $id_gender, $id_category, $picture, $id_show)
{
    $show_name = ucfirst(strtoupper($show_name));//mayuscula en la primera letra de cada palabra
    $show_description=ucfirst(strtolower($show_description));//primera letra en mayuscula y lo demas en minuscula
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows SET show_name = ?, show_description = ?, id_gender = ?, id_category = ?, picture = ? WHERE id_show = ?");
    return $sentence->execute([$show_name, $show_description, $id_gender, $id_category, $picture, $id_show]);
}

function updateShowDatetime($datetime_show , $id_datetime)
{
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows_dates SET datetime_show = ? WHERE id_datetime = ?");
    $result = $sentence->execute([$datetime_show ,$id_datetime]);
    return $result;
}

function recovery($email, $_password)
{
    $bd = database();
    $sentence = $bd->prepare("UPDATE users SET _password = ? WHERE email = ?");
    return $sentence->execute([$_password, $email]);
}

function getUserInfo($email)
{
    $bd=database();
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $bd->prepare($query);
    $stmt->execute([$email]);
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user_info;
}

/*function deleteSHow($id_show)
{
    $bd = database();
    $sentence = $bd->prepare("DELETE FROM shows WHERE id_show = ?");
    return $sentence->execute([$id_show]);


}*//* ELIMINA EL SHOW POR COMPLETO DE LA BASE DE DATOS */
function deleteShow($id_show)
{
    $state_inactive = 2;
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows SET show_state = ? WHERE id_show = ?");
    $result = $sentence->execute([$state_inactive, $id_show]);
    return $result;
}

function deleteShowDatetime($id_datetime)
{
    $state_inactive = 2;
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows_dates SET datetime_state = ? WHERE id_datetime = ?");
    $result = $sentence->execute([$state_inactive, $id_datetime]);
    return $result;
}

function activeShowDatetime($id_datetime)
{
    $state_inactive = 1;
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows_dates SET datetime_state = ? WHERE id_datetime = ?");
    $result = $sentence->execute([$state_inactive, $id_datetime]);
    return $result;
}

function inactiveShowDatetime($id_datetime)
{
    $state_inactive = 0;
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows_dates SET datetime_state = ? WHERE id_datetime = ?");
    $result = $sentence->execute([$state_inactive, $id_datetime]);
    return $result;
}

 function login()
 {
    $bd=database();
    $sentence=$bd->query("SELECT email ,_password, id_rol,user_name,user_state FROM users");
    return $sentence->fetchAll();
 }

 function confMail($user_state, $id_user)
 {
    $bd=database();
    $sentence = $bd->prepare("UPDATE users SET user_state = ? WHERE id_user = ?");
    $sentence->execute([$user_state, $id_user]);
 }

 function getIdUser()
 {
    $bd=database();
    $sentence=$bd->query("SELECT id_user FROM users ORDER BY id_user DESC");
    return $sentence->fetch();
 }


 function getUser()
 {
    $bd = database();
    $sentence = $bd->query("SELECT id_user, user_name, last_name, email, phone, date_birth FROM users");
    return $sentence->fetchAll();
}

function searchUser($user_name)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT id_user, user_name, last_name, email, phone, date_birth FROM users WHERE user_name LIKE ?");
    $sentence->execute(["%$user_name%"]);
    return $sentence->fetchAll();
}

function getUserForId($id_user)
{
    $bd = database();
    $sentence = $bd->prepare("SELECT id_user, user_name, last_name, email, phone, date_birth FROM users WHERE id_user = ?");
    $sentence->execute([$id_user]);
    return $sentence->fetchObject();
}

function updateUser($user_name, $last_name , $email, $phone, $date_birth, $id_user)
{
    $user_name = ucfirst(strtolower($user_name));
    $last_name=ucfirst(strtolower($last_name));
    $bd = database();
    $sentence = $bd->prepare("UPDATE users SET user_name = ?, last_name = ?, email = ?, phone = ?, date_birth = ? WHERE id_user = ?");
    return $sentence->execute([$user_name, $last_name , $email, $phone, $date_birth, $id_user]);
}

 /*function getAmount($id_show)
 {

    $bd = database();
    $sentence = $bd->prepare("SELECT amount_ticket FROM shows WHERE id_show = ?");
    $sentence->execute([$id_show]);
    $result = $sentence->fetch(PDO::FETCH_ASSOC);;
    return $result['amount_ticket'];

 }*/

?>
