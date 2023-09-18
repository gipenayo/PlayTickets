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

function register ($first_name, $last_name,$email, $dni ,$phone,$date_birth,$street,$height,$departament,$id_rol,$_password)
{
    $bd=database();
    $sentence=$bd->prepare("INSERT INTO users(user_name,last_name,email,dni,phone,date_birth,street,height,departament,id_rol,_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $sentence->execute([$first_name, $last_name,$email,$dni, $phone,$date_birth,$street,$height,$departament,$id_rol,$_password]);


}
function addSeating($asientos,$idese)
{
    $bd=database();
    $sentence=$bd->prepare("INSERT INTO seatings(seating_number,id_show) VALUES (?,?)");
    return $sentence->execute([$asientos,$idese]);
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

function addShow($show_name, $show_description, $show_date_time, $id_gender, $id_category, $picture, $state)
{
    $show_name = ucfirst(strtoupper($show_name));//mayuscula en la primera letra de cada palabra
    $show_description=ucfirst(strtolower($show_description));//primera letra en mayuscula y lo demas en minuscula
    $bd=database();
    $sente=$bd->prepare("INSERT INTO shows(show_name, show_description, show_date_time, id_gender, id_category, picture, show_state) VALUES (?,?,?,?,?,?,?)");
    return $sente->execute([$show_name, $show_description, $show_date_time, $id_gender, $id_category , $picture,$state]);
}

function getShow($search = null, $id_gender = null, $id_category = null)
{
    $bd = database();
    $sql = "SELECT id_show, show_name, show_description, show_date_time, id_gender, id_category,picture ,show_state FROM shows WHERE 1";
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

function getUser()
{
    $bd = database();
    $sentence = $bd->query("SELECT user_name,last_name,email,phone,date_birth FROM users");
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
    $show_name = ucfirst(strtoupper($show_name));//mayuscula en la primera letra de cada palabra
    $show_description=ucfirst(strtolower($show_description));//primera letra en mayuscula y lo demas en minuscula
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows SET show_name = ?, show_description = ?, show_date_time = ?, id_gender = ?, id_category = ?, picture = ? WHERE id_show = ?");
    return $sentence->execute([$show_name, $show_description, $show_date_time, $id_gender, $id_category, $picture, $id_show]);
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
    $state_inactive = 0;
    $bd = database();
    $sentence = $bd->prepare("UPDATE shows SET show_state = ? WHERE id_show = ?");
    $result = $sentence->execute([$state_inactive, $id_show]);
    return $result;
}
 function login()
 {
    $bd=database();
    $sentence=$bd->query("SELECT email ,_password, id_rol,user_name FROM users");
    return $sentence->fetchAll();
 }

 function confMail($id_state, $id_user)
 {
    $bd=database();
    $sentence = $bd->prepare("UPDATE users SET id_state = ? WHERE id_user = ?");
    $sentence->execute([$id_state, $id_user]);
 }

 function getIdUser()
 {
    $bd=database();
    $sentence=$bd->query("SELECT id_user FROM users ORDER BY id_user DESC");
    return $sentence->fetch();
 }

?>
