<?php
// Initialize the session
session_start();
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 86400;
// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactividad) {
        header("location: main.php");
        exit;
    }
}
// El siguiente key se crea cuando se inicia sesión
$_SESSION["timeout"] = time();
// Include config file
require_once "conexion.php";
$active="active";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
</head>
<?php include('nav2.php'); ?>

<body>

    <section class="home-section">
        <?php include('nav.php'); ?>
        <div class="container-fluid rounded">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    <?php //muy importante
                    include("txtBanner.php");
                    ?>
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">


                        <div class="p-3">
                            <br>

                            <h2>Administrar carrusel de imagenes</h2>
                            <p>Tenga en cuenta que estas imagenes se modificaran en la pagina principal del sitio web</p>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">

                                    <ol class="breadcrumb">
                                        <li><a href="sliderslist.php">Slider</a></li>
                                        <li class="active"> Listado</li>
                                    </ol>
                                    <div class="col-xs-12 text-right">
                                        <a href='slidesadd.php' class="btn" style="background-color: #123960;color:#ffffff"><span class="glyphicon glyphicon-plus"></span><i class="fa-solid fa-folder-plus"></i> Agregar Slide</a>


                                    </div>

                                    <br>
                                    <div id="loader" class="text-center"> <span><img src="./images/ajax-loader.gif"></span></div>
                                    <div class="outer_div"></div><!-- Datos ajax Final -->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <?php include('footer.php'); ?>
        </footer>

    </section>
</body>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</body>

</html>
<script>
    $(document).ready(function() {
        load(1);
    });

    function load(page) {
        var parametros = {
            "action": "ajax",
            "page": page
        };
        $.ajax({
            url: 'ajax/slider_ajax.php',
            data: parametros,
            beforeSend: function(objeto) {
                $("#loader").html("<img src='./images/ajax-loader.gif'>");
            },
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');
                $("#loader").html("");
            }
        })
    }

    function eliminar_slide(id) {
        page = 1;
        var parametros = {
            "action": "ajax",
            "page": page,
            "id": id
        };
        if (confirm('Esta acción  eliminará de forma permanente el slide \n\n Desea continuar?')) {
            $.ajax({
                url: 'ajax/slider_ajax.php',
                data: parametros,
                beforeSend: function(objeto) {
                    $("#loader").html("<img src='./images/ajax-loader.gif'>");
                },
                success: function(data) {
                    $(".outer_div").html(data).fadeIn('slow');
                    $("#loader").html("");
                }
            })
        }
    }
</script>

</html>