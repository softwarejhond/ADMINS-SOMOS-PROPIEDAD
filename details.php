<?php
include "conexion.php";
?>
<?
//iniciamos la sesion
session_start(); ?>
<?php if (isset($_SESSION['loggedin'])) : ?>
    <?php
    $filtro = htmlspecialchars($_SESSION["username"]);
    $query = mysqli_query($con, "SELECT nombre FROM users WHERE username like '%$filtro%'");
    while ($userLog = mysqli_fetch_array($query)) {
        $pacient = $userLog['nombre'];
    }

    $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
    $sqlPropiedad = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo='$nik'"); //muy importante el CROSS JOIN
    $casa = mysqli_fetch_assoc($sqlPropiedad);
    $valorFormateadoCard = number_format($casa['valor_canon'], 0, '.', '.');
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php include 'head.php'; ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <style>
            th {
                width: 100px;
            }
        </style>
        <script type="text/javascript" charset="utf8" src="js/dataTables.min.js">
        </script>
    </head>
    <?php include 'nav2.php'; ?>

    <body>
        <section class="home-section">
            <?php include 'nav.php'; ?>
            <h4 id="datos"></h4>
            <div class="container-fluid rounded">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 px-1 mt-1">
                        <div class="">
                            <?php //muy importante
                            include "txtBanner.php";
                            ?>
                            <div class="p-1 ">
                                <main id="main">

                                    <!-- ======= Breadcrumbs ======= -->
                                    <div class="breadcrumbs">
                                        <div class="page-header d-flex align-items-center" style="background-image: url('images/img/encabezado.png');">
                                            <div class="container position-relative">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-lg-6 text-center">
                                                        <h2>Detalles de la propiedad</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Breadcrumbs -->

                                    <!-- ======= Service Details Section ======= -->
                                    <section id="service-details" class="service-details">
                                        <div class="container" data-aos="fade-up">

                                            <div class="row gy-4">

                                                <div class="col-lg-4">
                                                    <div class="services-list">
                                                        <h3 class="alert alert-success"><?php echo $casa['condicion']; ?>
                                                            <?php echo $casa['tipoVivienda']; ?></h3>
                                                        <h3>$<?php echo $valorFormateadoCard; ?></h3>
                                                        <a href="#"><img src="images/icons/state.png" alt="dormitorios" width="30px"> Municipio =
                                                            <?php echo $casa['municipio']; ?></a>
                                                        <a href="#"><img src="images/icons/location.png" alt="municipio" width="30px"> Dirección =
                                                            <?php echo $casa['direccion']; ?></a>
                                                        <a href="#"><img src="images/icons/map.png" alt="dirreccion" width="30px"> Barrio =
                                                            <?php echo $casa['Barrio']; ?></a>
                                                        <a href="#"><img src="images/icons/bed.png" alt="dormitorios" width="30px"> Dormitorios =
                                                            <?php echo $casa['alcobas']; ?></a>
                                                        <a href="#"><img src="images/icons/kitchen.png" alt="kitchen" width="30px"> Cocina =
                                                            <?php echo $casa['cocina']; ?></a>
                                                        <a href="#"><img src="images/icons/toilet.png" alt="baño" width="30px"> Baños =
                                                            <?php echo $casa['servicios']; ?></a>
                                                        <a href="#"><img src="images/icons/playground.png" alt="playground" width="30px"> Vista
                                                            = <?php echo $casa['vista']; ?></a>
                                                        <a href="#"><img src="images/icons/signage.png" alt="playground" width="30px"> Parqueaderos
                                                            = <?php echo $casa['parqueadero']; ?></a>
                                                        <a href="#"><img src="images/icons/area.png" alt="playground" width="30px"> Área =
                                                            <?php echo $casa['area']; ?></a>
                                                        <br>
                                                        <p><?php echo $casa['descripcion']; ?>.</p>
                                                        <br>
                                                        <a href="https://wa.me/573508125688?text=¡Estoy+interesado+en+el+esta+propiedad!+código+de+la+propiedad=+'<?php echo $casa['codigo']; ?>'" type="button" target="_blank" class="btn btn-outline-success w-100"><i class="bi bi-whatsapp"></i> ¡Solicitar información ahora! <i class="bi bi-whatsapp"></i></a>
                                                        <a href="contact.php" type="button" class="btn btn-outline-warning w-100"><i class="bi bi-send"></i> ¡Solicitar información ahora! <i class="bi bi-send"></i></a>
                                                    </div>





                                                </div>

                                                <div class="col-lg-8">
                                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="<?php echo $casa['foto1']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto2']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto3']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto4']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto5']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto6']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto7']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto8']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto9']; ?>" class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo $casa['foto10']; ?>" class="d-block w-100" alt="...">
                                                            </div>

                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </button>
                                                    </div>

                                                    <script>
                                                        $(".slider").owlCarousel({
                                                            loop: true,
                                                            autoplay: true,
                                                            autoplayTimeout: 2000, //2000ms = 2s;
                                                            autoplayHoverPause: true,
                                                        });
                                                    </script>
                                                </div>

                                            </div>

                                        </div>
                                    </section><!-- End Service Details Section -->

                                </main><!-- End #main -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'footer.php';
            ?>
        </section>
        <!-- MENSAJE DE BIENVENIDA TOAST-->

    </body>

    <!-- Codigo para exportar tablas a excel -->
    <script type="text/javascript">
        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,',
                template =
                '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
                base64 = function(s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                },
                format = function(s, c) {
                    return s.replace(/{(\w+)}/g, function(m, p) {
                        return c[p];
                    })
                }
            return function(table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {
                    worksheet: name || 'Worksheet',
                    table: table.innerHTML
                }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>

<?php else : ?>
    <script LANGUAGE="javascript">
        location.href = "index.php";
    </script>
<?php endif; ?>

    </html>