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
                                <?php include './views/informationHouse.php'; ?>
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

<?php else :?>
    <script LANGUAGE="javascript">
        location.href = "index.php";
    </script>
<?php endif;?>
  </html>