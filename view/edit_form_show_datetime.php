<?php
include_once "../models/functions.php";
$datetime=getShowDatetimeForId($_GET["id_datetime"]);
/*var_dump($datetime);
exit;*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/edit_form_show.css">
    <link rel="icon" type="img/logo" href="../assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">
    <title>PlayTickets</title>
</head>
<body>
    <main>
        <div class="row">
            <div class="col-12">
                <h1>Editar show</h1>
                <form action="../controller/update_function_datetime.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_datetime" value="<?php echo $datetime-> id_datetime ?>">
                    <div class="form-group">
                        <label for="datetime_show">Fecha y Hora:</label>
                        <input value="<?php echo $datetime->datetime_show ?>" required type="datetime-local" class="form-control" name="datetime_show" id="datetime_show">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>
