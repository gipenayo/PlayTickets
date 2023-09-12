<?php
include_once "models/functions.php";

$search = isset($_POST["search"]) ? $_POST["search"] : "";
$id_gender = isset($_POST["id_gender"]) ? $_POST["id_gender"] : "";
$id_category = isset($_POST["id_category"]) ? $_POST["id_category"] : "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $shows = getShow($search, $id_gender, $id_category);
} else {
    $shows = getShow();
}

$genders=getGender();
$categorys=getCategory();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/logo" href="assets/img/logo.png"><!--Icono en la pestaña-->
    <link rel="stylesheet" href="assets/css/barnavfooter.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="assets/css/main.css">
    <title>PlayTickets</title>
</head>
<body>
    <!-- inicio barra de navegacion-->
    <header>
    <div class="navbar">
        <h1 class="logo"><img src="assets/img/logo.png" alt="Logo" height="80px ">PLAYTICKETS</h1>
        <button class="accordion">Menú</button>
        <div class="panel">
            <ul>
                <li><a href="index.php">Cartelera</a></li>
                <li><a href="view/login.php">Ingresar</a></li>
                <li><a href="view/register.php">Registrarse</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
    </div>
    </header>
    <!-- fin barra de navegacion-->
    <!-- Inicio de carrusel -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/show_tini.jpeg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="assets/img/show_taylor.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="assets/img/show_granja.jpg" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Fin de carrusel -->
    <!-- Buscador/Filtros -->
    <div class="filtros">
    <form action="index.php" method="POST" class="row justify-content-between">
        <div class="col-lg-3">
            <input value="<?php echo isset($search) && !empty($search) ? $search : "" ?>" name="search" class="buscador" type="text" placeholder="NOMBRE DEL SHOW">
        </div>
        <div class="col-lg-1">
            <button type="submit" class="buscar btn">Buscar</button>
        </div>
        <div class="col-lg-4 d-flex"><!-- Filtrar por tipo -->
            <label for="id_gender">Género: </label>
            <select name="id_gender" id="id_gender">
                <option value=""></option>
                <?php foreach ($genders as $genders2) { ?>
                    <option value="<?php echo $genders2->id_gender ?>"><?php echo $genders2->gender ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-lg-4 d-flex"><!-- Filtrar por tipo -->
            <label for="id_category">Clasificación: </label>
            <select name="id_category" id="id_category">
                <option value=""></option>
                <?php foreach ($categorys as $categorys2) { ?>
                    <option value="<?php echo $categorys2->id_category ?>"><?php echo $categorys2->category ?></option>
                <?php } ?>
            </select>
        </div>
        <?php
        include "../TicketRun/controller/filter.php"
        ?>
    </form>
</div>
    <!--fin de buscador/filtros-->
    <!-- Cartelera -->
    <div class="cartelera row">
        <?php foreach ($shows as $show) { ?>
        <div class="col-lg-3"><!-- Card -->
            <div class="card">
                <img src="assets/img/images.jpeg" width="100%" height="250px">
                <div>
                    <a href="view/synopsis.php?id_show=<?php echo $show->id_show ?>"><button><?php echo $show->show_name?></button></a>
                </div>
            </div>
        </div><!-- Fin Card -->
        <?php }?>
    </div>    
    <footer>
        <div class="footer-logo"></div> 
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Política de Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <div class="footer-copyright">&copy; 2023 PlayTickets</div>  
        </div>
    </footer>
    <script src="../assets/js/barnavfooter.js"></script>
</body>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgr
