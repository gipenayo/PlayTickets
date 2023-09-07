<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/logo" href="../assets/img/logo.jpeg"><!--Icono en la pestaña-->
    <link rel="icon" type="img/logo" href="../assets/img/logo-removebg-preview.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/selectSeat.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <title> Play Tickets </title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <h1> Seleccione su butaca </h1>
            </div>
            <hr>
            <div class="row">
                <form class="col-lg-10 seats" action="../controllers/selectSeat.php" method="post">
                    <table>
                        <tr class="row">
                            <p class="escenario col-lg-3">Escenario</p>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="a1" id="a1"></td>
                            <td><input type="checkbox" name="a2" id="a2"></td>
                            <td><input type="checkbox" name="a3" id="a3"></td>
                            <td><input type="checkbox" name="a4" id="a4"></td>
                            <td><input type="checkbox" name="a5" id="a5"></td>
                            <td><input type="checkbox" name="a6" id="a6"></td>
                            <td><input type="checkbox" name="a7" id="a7"></td>
                            <td><input type="checkbox" name="a8" id="a8"></td>
                            <td><input type="checkbox" name="a9" id="a9"></td>
                            <td><input type="checkbox" name="a10" id="a10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="b1" id="b1"></td>
                            <td><input type="checkbox" name="b2" id="b2"></td>
                            <td><input type="checkbox" name="b3" id="b3"></td>
                            <td><input type="checkbox" name="b4" id="b4"></td>
                            <td><input type="checkbox" name="b5" id="b5"></td>
                            <td><input type="checkbox" name="b6" id="b6"></td>
                            <td><input type="checkbox" name="b7" id="b7"></td>
                            <td><input type="checkbox" name="b8" id="b8"></td>
                            <td><input type="checkbox" name="b9" id="b9"></td>
                            <td><input type="checkbox" name="b10" id="b10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="c1" id="c1"></td>
                            <td><input type="checkbox" name="c2" id="c2"></td>
                            <td><input type="checkbox" name="c3" id="c3"></td>
                            <td><input type="checkbox" name="c4" id="c4"></td>
                            <td><input type="checkbox" name="c5" id="c5"></td>
                            <td><input type="checkbox" name="c6" id="c6"></td>
                            <td><input type="checkbox" name="c7" id="c7"></td>
                            <td><input type="checkbox" name="c8" id="c8"></td>
                            <td><input type="checkbox" name="c9" id="c9"></td>
                            <td><input type="checkbox" name="c10" id="c10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="d1" id="d1"></td>
                            <td><input type="checkbox" name="d2" id="d2"></td>
                            <td><input type="checkbox" name="d3" id="d3"></td>
                            <td><input type="checkbox" name="d4" id="d4"></td>
                            <td><input type="checkbox" name="d5" id="d5"></td>
                            <td><input type="checkbox" name="d6" id="d6"></td>
                            <td><input type="checkbox" name="d7" id="d7"></td>
                            <td><input type="checkbox" name="d8" id="d8"></td>
                            <td><input type="checkbox" name="d9" id="d9"></td>
                            <td><input type="checkbox" name="d10" id="d10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="e1" id="e1"></td>
                            <td><input type="checkbox" name="e2" id="e2"></td>
                            <td><input type="checkbox" name="e3" id="e3"></td>
                            <td><input type="checkbox" name="e4" id="e4"></td>
                            <td><input type="checkbox" name="e5" id="e5"></td>
                            <td><input type="checkbox" name="e6" id="e6"></td>
                            <td><input type="checkbox" name="e7" id="e7"></td>
                            <td><input type="checkbox" name="e8" id="e8"></td>
                            <td><input type="checkbox" name="e9" id="e9"></td>
                            <td><input type="checkbox" name="e10" id="e10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="f1" id="f1"></td>
                            <td><input type="checkbox" name="f2" id="f2"></td>
                            <td><input type="checkbox" name="f3" id="f3"></td>
                            <td><input type="checkbox" name="f4" id="f4"></td>
                            <td><input type="checkbox" name="f5" id="f5"></td>
                            <td><input type="checkbox" name="f6" id="f6"></td>
                            <td><input type="checkbox" name="f7" id="f7"></td>
                            <td><input type="checkbox" name="f8" id="f8"></td>
                            <td><input type="checkbox" name="f9" id="f9"></td>
                            <td><input type="checkbox" name="f10" id="f10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="g1" id="g1"></td>
                            <td><input type="checkbox" name="g2" id="g2"></td>
                            <td><input type="checkbox" name="g3" id="g3"></td>
                            <td><input type="checkbox" name="g4" id="g4"></td>
                            <td><input type="checkbox" name="g5" id="g5"></td>
                            <td><input type="checkbox" name="g6" id="g6"></td>
                            <td><input type="checkbox" name="g7" id="g7"></td>
                            <td><input type="checkbox" name="g8" id="g8"></td>
                            <td><input type="checkbox" name="g9" id="g9"></td>
                            <td><input type="checkbox" name="g10" id="g10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="h1" id="h1"></td>
                            <td><input type="checkbox" name="h2" id="h2"></td>
                            <td><input type="checkbox" name="h3" id="h3"></td>
                            <td><input type="checkbox" name="h4" id="h4"></td>
                            <td><input type="checkbox" name="h5" id="h5"></td>
                            <td><input type="checkbox" name="h6" id="h6"></td>
                            <td><input type="checkbox" name="h7" id="h7"></td>
                            <td><input type="checkbox" name="h8" id="h8"></td>
                            <td><input type="checkbox" name="h9" id="h9"></td>
                            <td><input type="checkbox" name="h10" id="h10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="i1" id="i1"></td>
                            <td><input type="checkbox" name="i2" id="i2"></td>
                            <td><input type="checkbox" name="i3" id="i3"></td>
                            <td><input type="checkbox" name="i4" id="i4"></td>
                            <td><input type="checkbox" name="i5" id="i5"></td>
                            <td><input type="checkbox" name="i6" id="i6"></td>
                            <td><input type="checkbox" name="i7" id="i7"></td>
                            <td><input type="checkbox" name="i8" id="i8"></td>
                            <td><input type="checkbox" name="i9" id="i9"></td>
                            <td><input type="checkbox" name="i10" id="i10"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="j1" id="j1"></td>
                            <td><input type="checkbox" name="j2" id="j2"></td>
                            <td><input type="checkbox" name="j3" id="j3"></td>
                            <td><input type="checkbox" name="j4" id="j4"></td>
                            <td><input type="checkbox" name="j5" id="j5"></td>
                            <td><input type="checkbox" name="j6" id="j6"></td>
                            <td><input type="checkbox" name="j7" id="j7"></td>
                            <td><input type="checkbox" name="j8" id="j8"></td>
                            <td><input type="checkbox" name="j9" id="j9"></td>
                            <td><input type="checkbox" name="j10" id="j10"></td>
                        </tr>
                    </table>

                    <input type="submit" value="Selecionar">
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="containerFooter">
            <div class="cont_footer">
                <div class="descrip">
                    <div class="logo_area">
                        <img src="assets/img/logo.jpeg" alt="" width="160" height="150">
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
</html>

<?php

?>