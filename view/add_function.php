<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/agregar_funcion.css">
    <link rel="icon" type="img/logo" href="Controllers/img/logo.jpeg"><!--Icono en la pestaña-->
    <link rel="icon" type="img/logo" href="Controllers/img/logo-removebg-preview.png">
    <title>Document</title>
</head>
<body>
    <nav><img src="Controllers/img/logo.jpeg" alt="" width="103" height="104">
        <h2 href="#" class="logo">PLAYTICKETS</h2>

        <div class="parts"><!-- div de las opciones a mostrar en la barra de navegacion-->
            <ul class="opcions">
                <li><a href="#">Cartelera</a></li>
                <li><a href="#">Eventos</a></li>
                <li><a href="#">Ingresar</a></li>
                <li><a href="#">Registrarse</a></li>
            </ul>
        </div>
    </nav>
                    <form action="/procesar_formulario" method="post">
                        <label for="nombre">Nombre de la funcion:</label>
                        <input type="text" id="nombre" name="nombre"><br><br>
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha"><br><br>
                        <label for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora"><br><br>
                        <label for="opcion">Seleccione la capacidad:</label>
                        <select id="opcion" name="opcion">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                        <option value="opcion4">Opción 4</option>
                        </select><br><br>
                        <label for="genero">Seleccione el genero:</label>
                        <select id="genero" name="genero">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                        <option value="opcion4">Opción 4</option>
                        </select><br><br>
                        <input type="radio" id="ATP" name="fav_language" value="ATP">
                        <label for="ATP">ATP</label><br>
                        <input type="radio" id="+13" name="fav_language" value="+13">
                        <label for="+13">+13</label><br>
                        <input type="radio" id="+16" name="fav_language" value="+16">
                        <label for="+16">+16</label><br>
                        <input type="radio" id="+18" name="fav_language" value="+18">
                        <label for="+18">+18</label><br>
                        <label for="Descripcion">Descripcion</label><br>
                        <textarea id="Descripcion" name="Descripcion" rows="4" cols="50"></textarea><br><br>
                        
                       <h5>FALTA PONER SECTORES Y PRECIO DE SECTORES</h5>
                        <input type="submit" value="Enviar">
                    </form>
    <!--cierra acordeon-->
      <footer>
        <div class="containerFooter">
            <div class="cont_footer">
                <div class="descrip">
                    <div class="logo_area">
                        <img src="/img/logo.png" alt="" width="160" height="150">
                        <span class="logo_name">PLAYTICKETS</span>
                    </div>
                </div>

                <div class="service_area">
                    <ul class="area_service">
                        <li class="service_name"> Area de Consultas</li>
                        <li> <a href="">consultas</a></li>
                        <li><a href="">nosotros</a></li>
                        <li><a href="">eventos</a></li>
                    </ul>

                    <ul class="area_service">
                        <li class="service_name"> Area de Compra</li>
                        <li> <a href="">consultas</a></li>
                        <li><a href="">nosotros</a></li>
                        <li><a href="">eventos</a></li>
                    </ul>

                    <ul class="area_service">
                        <li class="service_name"> Area de Funciones</li>
                        <li><a href="">consultas</a></li>
                        <li><a href="">nosotros</a></li>
                        <li><a href="">eventos</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="footer__bottom">
                <div class="lastSentence">
                    <span>2023 PLAYTICKETS</span>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>