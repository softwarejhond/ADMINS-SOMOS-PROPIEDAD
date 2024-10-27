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
                                <?php include './dashboard/cardFilter.php'; ?>
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

<?php else :?>
    <script LANGUAGE="javascript">
        location.href = "index.php";
    </script>
<?php endif;?>
  </html>