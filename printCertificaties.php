<?php
// Initialize the session
session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 86400;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
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
        background-image: url('./images/fondoFactura.png');
        background-origin: content-box;
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
    </style>
</head>
<?php include('nav2.php');?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                        include("txtBanner.php");?>
                        <div class="card-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                <!--ACTUALIZAR DATOS USUARIO-->
                               
                                <h2 >Recibo de cobro por mantenimiento   <a href="viewReparaciones.php" class="btn btn-outline-danger">
                                    <div class="spinner-grow spinner-grow-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div> 
                                    Regresar al listado de reparaciones
                                </a>
                           </h2>
                              
                                <?php
			            // escaping, additionally removing everything that could be (html/javascript-) code
			         $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                     $code = mysqli_real_escape_string($con,(strip_tags($_GET["code"],ENT_QUOTES)));
                     $reparacion = mysqli_real_escape_string($con,(strip_tags($_GET["reparacion"],ENT_QUOTES)));
                     $idReparador = mysqli_real_escape_string($con,(strip_tags($_GET["repairmen"],ENT_QUOTES)));
                     $sqlPaciente = mysqli_query($con, "SELECT * FROM estudents WHERE numeroIdentificacion='$nik'");//muy importante el CROSS JOIN
			         if(mysqli_num_rows($sqlPaciente) == 0){
				     header("Location: index.php");
			         }else{
			    	    $rowPaciente = mysqli_fetch_assoc($sqlPaciente);
                      header("./vistaFirmaHistoria.php?proceso=$nik");
			           }

			            ?>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark"
                                        id="areaImprimir">
                                        <div class="text-left">
                                            <?php
                                            $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                                             while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                echo '<p class="text-right px-5" style="font-size:8px;color:#ffffff">'.$empresaLog['nombre'].'</p>';
                                                }
                                        ?>
                                            <div class="row">
                                                <div class="col col-md-6 col-sm-12 text-white ml-3 mt-n2 mr-2"><b>Fecha
                                                        de
                                                        impresión:</b>
                                                    <?php echo date('d-m-Y');?>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <?php
                                             echo '<div class="row">';//inicia div de columnas 
                                             $queryCompany = mysqli_query($con,"SELECT * FROM company");
                                             while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                 echo '<div class="col col-md-6 col-sm-12" style="font-size:12px">'; //se crea la primera columna
                                                 echo '<br>';
                                                 echo '<label class="card-text ml-3 mt-n2 float-left">'.$empresaLog['nombre'].'</label><br>';
                                                 echo '<label class="card-text ml-3 mt-n2 float-left">NIT: '.$empresaLog['nit'].'</label><br>';
                                                 echo '<label class="card-text ml-3 mt-n2 float-left">Teléfono: '.$empresaLog['telefono'].'</label><br>';
                                                 echo '<label class="card-text ml-3 mt-n2 float-left">Correo electrónico: '.$empresaLog['email'].'</label><br>';
                                                 echo '<label class="card-text ml-3 mt-n2 float-left">Dirección: '.$empresaLog['direccion'].'</label><br>';
                                                 echo '</div>'; //finaliza la primera columna
                                             }
                                           
                                             ?>
                                            <?php
                                             $queryReport = mysqli_query($con,"SELECT * FROM report INNER JOIN proprieter ON proprieter.codigo = report.codigo_propietario WHERE numeroReporte=$reparacion ");
                                             while ($queryReporte = mysqli_fetch_assoc($queryReport)) {
                                                 echo '<div class="col col-md-6 col-sm-12" style="font-size:12px">'; //se crea la segunda columna
                                                 echo '<br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left"># Factura: '.$queryReporte['numeroReporte'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Código: '.$queryReporte['codigoReporte'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Código propiedad: '.$queryReporte['codigo_propietario'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Fecha del reporte: '.$queryReporte['fechaReporte'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left text-capitalize">Propietario: '.$queryReporte['nombre_propietario'].'</label><br>';
                                                 echo '</div>'; //finaliza la segunda columna
                                              }
                                        
                                            ?>
                                            <?php
                                             $queryInquilino = mysqli_query($con,"SELECT * FROM proprieter INNER JOIN report ON report.codigo_propietario = proprieter.codigo WHERE codigo=$code LIMIT 1");
                                             while ($queryReporteInquilino = mysqli_fetch_assoc($queryInquilino)) {
                                                 echo '<div class="col col-md-6 col-sm-12 " style="font-size:12px">'; //se crea la tercera columna
                                                 echo '<br>';
                                                 echo '<label  class="card-text ml-3 mt-n3 float-left"><u>Datos del inquilino:</u></label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Cc : '.$queryReporteInquilino['doc_inquilino'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left text-capitalize">Nombre: '.$queryReporteInquilino['nombre_inquilino'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Teléfono: '.$queryReporteInquilino['telefono_inquilino'].'</label><br>';
                                                 echo '</div>'; //finaliza la tercera columna
                                            }
                                            ?>
                                            <?php
                                             $queryReparador = mysqli_query($con,"SELECT * FROM report r CROSS JOIN repairmen f WHERE  r.id_reparador=$idReparador AND f.identificacion=$idReparador LIMIT 1" );
                                             while ($queryReporteReparador = mysqli_fetch_assoc($queryReparador)) {
                                                 echo '<div class="col col-md-6 col-sm-12" style="font-size:12px">'; //se crea la cuarta columna
                                                 echo '<br>';
                                                 echo '<label  class="card-text ml-3 mt-n3 float-left"><u>Datos del reparador:</u></label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Cc : '.$queryReporteReparador['identificacion'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left text-capitalize">Nombre: '.$queryReporteReparador['nombre'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Teléfono: '.$queryReporteReparador['telefono'].'</label><br>';
                                                 echo '<label  class="card-text ml-3 mt-n2 float-left">Fecha de reparación: '.$queryReporteReparador['fechaReporte'].'</label><br>';
                                                 echo '</div>'; //finaliza la cuarta columna
                                            }
                                        
                                              echo '</div>';// finaliza el div de clase row 
                                            ?>

                                        </div>

                                        <br>
                                        <h6 class="text-left ml-3 mt-n2 mr-2">INFORMACIÓN DE FACTURA:</h6>

                                        <br>
                                        <div class="ml-3 mt-n2 mr-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <h6><i class="bi bi-question-diamond-fill"></i> Daño o
                                                                reporte</h6>
                                                        </th>
                                                        <th scope="col">
                                                            <h6><i class="bi bi-wrench-adjustable"></i> Solución</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                             $queryReportePrint = mysqli_query($con,"SELECT * FROM report INNER JOIN proprieter ON proprieter.codigo = report.codigo_propietario WHERE numeroReporte=$reparacion");
                                             while ($queryReporteImpreso = mysqli_fetch_assoc($queryReportePrint)) {
                                                 echo '<td><label style="font-size:14px">'.$queryReporteImpreso['situacionReportada'].'</label></td>';
                                                 echo '<td><label style="font-size:14px">'.$queryReporteImpreso['solucion'].'</label></td>';
                                            
                                            }
                                            ?>
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <h6><i class="bi bi-currency-dollar"></i> Valor Factura</h6>
                                                        </th>
                                                        <th scope="col">
                                                            <h6><i class="bi bi-currency-dollar"></i> Valor Servicio
                                                            </h6>
                                                        </th>
                                                        <th scope="col">
                                                            <h6><i class="bi bi-currency-dollar"></i> Total a pagar</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                             $queryReportePrint = mysqli_query($con,"SELECT * FROM report INNER JOIN proprieter ON proprieter.codigo = report.codigo_propietario WHERE numeroReporte=$reparacion");
                                             //se crean las variables para dar formato a los valores motenarios con la funcion number_format
                                             $decimales = 0; // número de decimales
                                             $separador_decimal = '.'; // separador decimal
                                             $separador_miles = '.'; // separador de miles
                                             while ($queryReporteImpreso = mysqli_fetch_assoc($queryReportePrint)) {
                                                //convertimos los valores monetarios en un formato de precio real ejemplo: 1000000 se transformaria en 1.000.000
                                              $valorFactura = number_format($queryReporteImpreso['valorFactura'], $decimales, $separador_decimal, $separador_miles);
                                              $valorServicio = number_format($queryReporteImpreso['valorServicio'], $decimales, $separador_decimal, $separador_miles);
                                              $totalPagar = number_format($queryReporteImpreso['totalPagar'], $decimales, $separador_decimal, $separador_miles);

                                              echo '<td class="text-right"><b><label style="font-size:16px">'.$valorFactura.'</label></b></td>';
                                              echo '<td class="text-right"><b><label style="font-size:16px">'.$valorServicio.'</label></b></td>';
                                              echo '<td class="text-right"><b><label style="font-size:16px">'.$totalPagar.'</label></b></td>';
                                             }
                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="padding:10px">
                                            <div class="form-group">



                                                <?php
                                                $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                                                while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                  echo ' <h5 class="text-center"">'.$empresaLog['nombre'].'</h5>';
                                                 }
                                                ?>

                                            </div>
                                            <?php
                              
                                            $queryCompany = mysqli_query($con,"SELECT * FROM company");
                                             while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                              echo '<p  class="text-center">'.$empresaLog['direccion'].' - '.$empresaLog['nombre'].' Teléfono '.$empresaLog['telefono'].' <br>E-Mail: '.$empresaLog['email'].'<br> Sitio web: '.$empresaLog['web'].'</p>';
                                             }
                                          ?>
                                            <br><br>
                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="text-center">
                                        <a onclick="jQuery('#areaImprimir').print()" class="btn btn-outline-info"
                                            style="border-radius: 0;"><i class="fa fa-print"></i> IMPRIMIR</a>
                                        <a href="main.php" class="btn btn-outline-danger" style="border-radius: 0;"><i
                                                class="fa fa-sync"></i> CANCELAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('reloj.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('calendar.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('soporte.php');?>
                    </div>
                </div>

            </div>
            <footer class="footer">
                <?php include('footer.php');?>
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