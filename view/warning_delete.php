<?php

include_once "../models/functions.php";
$show = getShowForId($_GET["id_show"]);
/*var_dump($show);
exit;*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">   
    <link rel="stylesheet" href="../assets/css/warning_delete.css">
    <title>PlayTickets</title>
</head>
<body>
    <div class="advertencia">
        <h2>Advertencia</h2>
        <p>¿Seguro que desea eliminar este elemento?</p>
        <form action="../controller/delete_function.php" method="post">
            <input type="hidden" name="id_show" value="<?php echo $show->id_show?>">
            <button type="submit" class="btn-eliminar">Eliminar</button>
        </form>
    </div>
</body>
</html>
