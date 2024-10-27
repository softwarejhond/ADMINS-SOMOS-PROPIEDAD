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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php');
    ?>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 12px;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        #areaImprimir {
            background-image: url(images/back.png);
            background-origin: content-box;
            background-size: 100%;
        }
    </style>
</head>
<?php include('nav2.php'); ?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                        include("txtBanner.php"); ?>
                        <div class="card-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                <!--ACTUALIZAR DATOS USUARIO-->

                                <h2>CARTA DE VIENVENIDA CLIENTES <a href="viewPropietarios.php" class="btn btn-outline-danger">
                                        <div class="spinner-grow spinner-grow-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        Regresar al listado de propietarios
                                    </a>
                                </h2>

                                <?php
                                // escaping, additionally removing everything that could be (html/javascript-) code
                                $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
                                $code = mysqli_real_escape_string($con, (strip_tags($_GET["code"], ENT_QUOTES)));
                                $idReparador = mysqli_real_escape_string($con, (strip_tags($_GET["repairmen"], ENT_QUOTES)));

                                $queryPropietario = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                while ($infoPropietario = mysqli_fetch_array($queryPropietario)) {
                                    $inquilino = $infoPropietario['nombre_inquilino'];
                                    $id_inquilino = $infoPropietario['doc_inquilino'];
                                    $direccion = $infoPropietario['direccion'];
                                    $telefono_inquilino = $infoPropietario['telefono_inquilino'];
                                    $municipio = $infoPropietario['municipio'];
                                    $valorArriendo = number_format($infoPropietario['valor_canon']);
                                    $diaPago = $infoPropietario['diaPago'];
                                    $fecha = $infoPropietario['fecha'];
                                    $vigenciaContrato = $infoPropietario['vigenciaContrato'];
                                    $cc_codeudor_uno = $infoPropietario['cc_codeudor_uno'];
                                    $nombre_codeudor_uno = $infoPropietario['nombre_codeudor_uno'];
                                    $cc_codeudor_dos = $infoPropietario['cc_codeudor_dos'];
                                    $nombre_codeudor_dos = $infoPropietario['nombre_codeudor_dos'];
                                    $cc_codeudor_tres = $infoPropietario['cc_codeudor_tres'];
                                    $nombre_codeudor_tres = $infoPropietario['nombre_codeudor_tres'];
                                }


                                ?>

                                <div class="row">


                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark" id="areaImprimir">
                                        <div class="text-center">
                                        <br>
                                        <img src="images/logoColor.png" alt="logo" width="400px">
                                        </div>
                                        <div class="ml-3 mt-n2 mr-2">
                                            <p class="p-3" style="font-size:18px; text-align: justify;">
                                                Barbosa, <?php echo date('d-m-Y');?>
                                                <br>
                                                <br>
                                                <br>
                                                Señor (a)<br>
                                                <?php echo $inquilino;?> <br>
                                                Arrendatario (a) <br>
                                                <?php echo $direccion;?> <br>
                                                <?php echo $municipio;?> <br>
                                                <br>
                                                <br>
                                                Para la Inmobiliaria Hablemos de Negocios SAS, es un placer contar con usted como nuevo cliente y darle las gracias por haber contratado su vivienda con nosotros.
                                                Somos un equipo humano capacitado y estamos a su entera disposición con el objetivo de colaborarle en cualquier inquietud.
                                                <br>
                                                <br>
                                                Le queremos dar algunas recomendaciones para tener en cuenta ya que desde la firma del contrato hasta la finalización del mismo Hablemos de Negocios y usted nos convertiremos en aliados con el principal objetivo de preservar en las mejores condiciones el inmueble.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i> Antes de trasladarse al inmueble usted puede realizar el cambio de la claves de la chapa de la puerta principal.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i> Cuando el asesor le esté entregando el inmueble verificar muy bien el inventario que se adjunta al contrato para evitar algún mal entendido. Si tiene alguna inquietud comuníquesela al asesor durante la entrega o máximo 10 días corrientes después de recibir el inmueble ya que en adelante; la propiedad y su correcto uso será estricta responsabilidad suya.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i> Toda anomalía presentada en el inmueble debe de ser reportada a la inmobiliaria para coordinar las reparaciones y evaluaciones pertinentes en cada caso particular. Si corresponde al residente o por el desgaste natural, este reporte lo puede hacer por la página www.hablemosdenegocios.com.co reporte de daños, o telefónicamente.
                                                <br>
                                                <br>
                                                <b>Nota:</b> Si el daño es una emergencia, fuga de agua, corto circuito o problema de alcantarillado; usted como arrendatario está autorizado y obligado a tomar medidas pertinentes para evitar un daño mayor a sus bienes y los de terceros. Después de esto debe reportar en el menor tiempo posible a Inmobiliaria para proceder a arreglar los elementos causantes de la falla.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i> Presente la primera cuenta de servicios públicos que llegue al inmueble para ser liquidada, verifique si hay algún cargo correspondiente al propietario e infórmelo en un plazo no menor a 60 días para ser reembolsado.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i> Si usted desea entregar el inmueble, debe notificarlo por escrito o al correo electrónico inmobiliariahdn@gmail.com Sólo basta con redactar una carta dirigida al departamento de arrendamientos notificando dicho deseo. Esta notificación deber realizarla 90 días antes de vencimiento de contrato, de lo contrario entenderemos que quiere renovar dicho contrato. Si desea abandonar el inmueble sin el preaviso antes mencionado por cualquier eventualidad, deberá cancelar la suma señalada en el contrato como Clausula Penal que usualmente corresponde a 3 canones de arrendamiento.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i> Si usted no notifica su deseo de dar por terminado el contrato de arrendamiento del inmueble, el contrato automáticamente se renovara por otro periodo igual. Si usted no sigue los procedimientos para la desocupación del inmueble y su estado no coincide con el del inventario no se podrá realizar entrega del mismo y el contrato continuara vigente plenamente con todo lo que esto conlleva, esto quiere decir que se puede renovar y para dar por terminado el contrato deberá pagar la cláusula penal señalada en el mismo.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i> Al momento de entregar el inmueble debe de presentar cuenta de servicios públicos cancelados, el inmueble aseado y a paz y salvo por todo concepto.
                                                <br>
                                                <br>
                                                <i class="fa fa-check" aria-hidden="true"></i><b>Adjunto entrego copia de su contrato original.</b>
                                                <br>
                                                <br>
                                                <b>Algunos concejos para conservar</b>
                                                <br>
                                                <br>
                                                • No haga perforaciones en superficies cerámicas.
                                                <br>
                                                <br>
                                                • Resane y pinte completamente donde haya realizado algún tipo de perforación, con el fin de no dejar parches.
                                                <br>
                                                <br>
                                                • No pinte las paredes de un color distinto al descrito en el inventario, en caso de hacerlo al finalizar el contrato deberá volverla a pintar con su color original.
                                                <br>
                                                <br>
                                                • Por último, si realiza algún tipo de acuerdo verbal con nosotros, exija una constancia por escrito de la aceptación de la modificación, reparación y sus términos como: a quien corresponden los costos o el reembolso de los mismos, permanencia de la modificación en el inmueble (definitiva o temporal) y todo lo pertinente que se deba dejar por sentado.
                                                <br>
                                                <br>
                                                Le agradecemos la confianza puesta en nosotros y esperamos establecer una sólida relación comercial con ustedes a largo plazo.
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                Cordialmente,
                                                <br>
                                                <img src="images/firmas.png" alt="firma" width="350px" style="position:absolute; z-index:2"><br>
                                               <br>
                                               <br>
                                               <br>
                                               <br>
                                               <br>
                                               <br>

                                            </p>
                                        </div>
                                        <div style="padding:10px">
                                            <div class="form-group">



                                                <?php
                                                $queryCompany = mysqli_query($con, "SELECT nombre,nit FROM company");
                                                while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                    echo ' <h5 class="text-center"">' . $empresaLog['nombre'] . '</h5>';
                                                }
                                                ?>

                                            </div>
                                            <?php

                                            $queryCompany = mysqli_query($con, "SELECT * FROM company");
                                            while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                echo '<p  class="text-center">' . $empresaLog['direccion'] . ' - ' . $empresaLog['nombre'] . ' Teléfono ' . $empresaLog['telefono'] . ' <br>E-Mail: ' . $empresaLog['email'] . '<br> Sitio web: ' . $empresaLog['web'] . '</p>';
                                            }
                                            ?>
                                            <br><br>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="text-center">
                                        <a onclick="jQuery('#areaImprimir').print()" class="btn btn-outline-info" style="border-radius: 0;"><i class="fa fa-print"></i> IMPRIMIR</a>
                                        <a href="main.php" class="btn btn-outline-danger" style="border-radius: 0;"><i class="fa fa-sync"></i> CANCELAR</a>
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
    <script src="js/jQuery.print.min.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->
    <script src="js/jQuery.print.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->

    <script>

    </script>

</body>

</html>