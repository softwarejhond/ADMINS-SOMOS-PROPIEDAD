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
<style>
  .infoProp{
    color: black;
  }
    p{
        font-size: 18px; 
        color:orangered;
        text-transform: uppercase;
    }
    .img{
        max-width: 20%;
        height: auto;
        padding: 5px;
        float: left;
        min-width: 50%;
    }
    @media (max-width: 512px) {
    .img {
        width: 100%; /* Ocupa todo el ancho de la pantalla */
        height: auto; /* Mantiene la relación de aspecto original */
    }
}
</style>

<div class="container-fluid rounded">
    <div class="row" style="margin-top:5px">
        <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
            <div class="card border-info shadow p-3 mb-5 bg-white rounded">

                <div class="card-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 p-3">
                        <!--ACTUALIZAR DATOS USUARIO-->

                        <h2>FICHA TÉCNICA DE LA PROPIEDAD <a href="main.php" class="btn btn-outline-danger">
                                <div class="spinner-grow spinner-grow-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Regresar al listado de propietarios
                            </a>
                        </h2>

                        <?php
                        // escaping, additionally removing everything that could be (html/javascript-) code
                        $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));

                        $queryPropietario = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo='$nik'");
                          while ($infoPropiedad = mysqli_fetch_array($queryPropietario)) {
                                $v = $infoPropiedad['v'];
                                $codigo = $infoPropiedad['codigo'];
                                $tipo_vivienda = $infoPropiedad['tipoInmueble'];
                                $nivel_piso = $infoPropiedad['nivel_piso'];
                                $area = $infoPropiedad['area'];
                                $estrato = $infoPropiedad['estrato'];
                                $municipio_id = $infoPropiedad['id_municipio'];
                                $municipio_name = $infoPropiedad['municipio'];
                                $barrio = $infoPropiedad['Barrio'];
                                $terraza = $infoPropiedad['terraza'];
                                $ascensor = $infoPropiedad['ascensor'];
                                $patio =  $infoPropiedad['patio'];
                                $parqueadero = $infoPropiedad['parqueadero'];
                                $cuarto_util = $infoPropiedad['cuarto_util'];
                                $habitaciones = $infoPropiedad['alcobas'];
                                $closets = $infoPropiedad['closet'];
                                $sala = $infoPropiedad['sala'];
                                $sala_comedor = $infoPropiedad['sala_comedor'];
                                $comedor = $infoPropiedad['comedor'];
                                $cocina = $infoPropiedad['cocina'];
                                $servicios = $infoPropiedad['servicios'];
                                $cuartoServicios = $infoPropiedad['CuartoServicios'];
                                $zonaRopa = $infoPropiedad['ZonaRopa'];
                                $vista = $infoPropiedad['vista'];
                                $servicios_publicos =  $infoPropiedad['servicios_publicos'];
                                $otras_caracteristicas = $infoPropiedad['otras_caracteristicas'];
                                $direccion = $infoPropiedad['direccion'];
                                $telefonoInmueble = $infoPropiedad['TelefonoInmueble'];
                                $valor = $infoPropiedad['valor_canon'];
                                $identificacion_propietario = $infoPropiedad['doc_propietario'];
                                $nombre_propietario = $infoPropiedad['nombre_propietario'];
                                $telefono_propietario = $infoPropiedad['telefono_propietario'];
                                $banco = $infoPropiedad['banco'];
                                $tipoCuenta = $infoPropiedad['tipoCuenta'];
                                $numeroCuenta = $infoPropiedad['numeroCuenta'];
                                $diaPago = $infoPropiedad['diaPago'];
                                $identificacion_inquilino = $infoPropiedad['doc_inquilino'];
                                $nombre_inquilino = $infoPropiedad['nombre_inquilino'];
                                $telefono_inquilino = $infoPropiedad['telefono_inquilino'];
                                $email_inquilino =  $infoPropiedad['email_inquilino'];
                                $fecha = $infoPropiedad['fecha'];
                                $vigenciaContrato = $infoPropiedad['vigenciaContrato'];
                                $descuento = $infoPropiedad['descuento'];
                                $iva = $infoPropiedad['iva'];
                                $epm = $infoPropiedad['contrato_EPM'];
                                $comision = $infoPropiedad['comision'];
                                $catastro = $infoPropiedad['aval_catastro'];
                                $asistencia = $infoPropiedad['asistencia'];
                                $condicion = $infoPropiedad['condicion'];
                                $identificacion_codeudor_uno = $infoPropiedad['cc_codeudor_uno'];
                                $nombre_codeudor_uno = $infoPropiedad['nombre_codeudor_uno'];
                                $identificacion_codeudor_dos = $infoPropiedad['cc_codeudor_dos'];
                                $nombre_codeudor_dos = $infoPropiedad['nombre_codeudor_dos'];
                                $identificacion_codeudor_tres = $infoPropiedad['cc_codeudor_tres'];
                                $nombre_codeudor_tres = $infoPropiedad['nombre_codeudor_tres'];
                                $estados = $infoPropiedad['estadoPropietario'];
                                //cargamos las fotos
                                $foto1 = $infoPropiedad['foto1'];
                                $foto2 = $infoPropiedad['foto2'];
                                $foto3 = $infoPropiedad['foto3'];
                                $foto4 = $infoPropiedad['foto4'];
                                $foto5 = $infoPropiedad['foto5'];
                                $foto6 = $infoPropiedad['foto6'];
                                $foto7 = $infoPropiedad['foto7'];
                                $foto8 = $infoPropiedad['foto8'];
                                $foto9 = $infoPropiedad['foto9'];
                                $foto10 = $infoPropiedad['foto10'];
                                $valorFormateadoCard = number_format($infoPropiedad['valor_canon'], 0, '.', '.');
  
                            }


                        ?>


                        <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark" id="areaImprimir">
                        <div class="text-center">
                                        <br>
                                        <img src="images/logoColor.png" alt="logo" width="400px" height="auto">
                                        </div>
                            <div class="row">
                                <div class="col col-lg-6 col-md-12 col-sm-12 p-3 ">
                               
                                    <br>
                                    <p class="p-3" class="info">
                                        <b>Barbosa</b> <?php echo date('d-m-Y');?><br><br>
                                        <b class="infoProp"><i class="fa-solid fa-qrcode"></i> Código de la propiedad:</b> <?php echo $codigo ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-hand-pointer"></i> Tipo de propiedad:</b> <?php echo $tipo_vivienda ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-vihara"></i> Nivel de piso:</b> <?php echo $nivel_piso ?><br>
                                        <b class="infoProp"><i class="fa fa-area-chart" aria-hidden="true"></i> Área:</b> <?php echo $area ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-stairs"></i> Estrato:</b> <?php echo $estrato ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-location-dot"></i> Municipio:</b> <?php echo $municipio_name ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-location-dot"></i> Barrio:</b> <?php echo $barrio ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-tent-arrow-left-right"></i> terraza:</b> <?php echo $terraza ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-elevator"></i> ascensor:</b> <?php echo $ascensor ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-dumpster"></i> patio:</b> <?php echo $patio ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-square-parking"></i> parqueadero:</b> <?php echo $parqueadero ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-door-closed"></i> cuarto util:</b> <?php echo $cuarto_util ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-bed"></i> habitaciones:</b> <?php echo $habitaciones ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-shirt"></i> closets:</b> <?php echo $closets ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-chalkboard-user"></i> sala:</b> <?php echo $sala ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-utensils"></i> sala comedor:</b> <?php echo $sala_comedor ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-utensils"></i> comedor:</b> <?php echo $comedor ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-toilet"></i> Baños:</b> <?php echo $servicios ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-door-closed"></i> cuarto Servicios:</b> <?php echo $cuartoServicios ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-shirt"></i> zona Ropa:</b> <?php echo $zonaRopa ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-image"></i> vista:</b> <?php echo $vista ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-bolt-lightning"></i> servicios públicos:</b> <?php echo $servicios_publicos ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-envelopes-bulk"></i> direccion:</b> <?php echo $direccion ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-phone"></i> teléfono Inmueble:</b> <?php echo $telefonoInmueble ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-hand-holding-dollar"></i> valor:</b> <?php echo $valorFormateadoCard ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-id-card-clip"></i> identificación propietario:</b> <?php echo $identificacion_propietario ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-signature"></i> nombre propietario:</b> <?php echo $nombre_propietario ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-phone"></i> teléfono propietario:</b> <?php echo $telefono_propietario ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-building-columns"></i> banco:</b> <?php echo $banco ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-hand-pointer"></i> tipo Cuenta:</b> <?php echo $tipoCuenta ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-hashtag"></i> número Cuenta:</b> <?php echo $numeroCuenta ?><br>
                                        <b class="infoProp"><i class="fa-regular fa-calendar-check"></i> día dePago:</b> <?php echo $diaPago ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-id-card-clip"></i> identificación inquilino:</b> <?php echo $identificacion_inquilino ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-signature"></i> nombre inquilino:</b> <?php echo $nombre_inquilino ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-phone"></i> teléfono inquilino:</b> <?php echo $telefono_inquilino ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-at"></i> email inquilino:</b> <?php echo $email_inquilino ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-calendar-day"></i> vigencia Contrato:</b> <?php echo $vigenciaContrato ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-percent"></i> descuento:</b> <?php echo $descuento ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-money-bill-trend-up"></i> iva:</b> <?php echo $iva ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-file-signature"></i> Contrato epm:</b> <?php echo $epm ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-face-smile-wink"></i> comision:</b> <?php echo $comision ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-barcode"></i> catastro:</b> <?php echo $catastro ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-clipboard-user"></i> asistencia:</b> <?php echo $asistencia ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-check-double"></i> condición:</b> <?php echo $condicion ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-id-card-clip"></i> identificación codeudor uno:</b> <?php echo $identificacion_codeudor_uno ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-signature"></i> nombre codeudor uno:</b> <?php echo $nombre_codeudor_uno ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-id-card-clip"></i> identificación codeudor dos:</b> <?php echo $identificacion_codeudor_dos ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-signature"></i> nombre codeudor dos:</b> <?php echo $nombre_codeudor_dos ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-id-card-clip"></i> identificación codeudor tres:</b> <?php echo $identificacion_codeudor_tres ?><br>
                                        <b class="infoProp"><i class="fa-solid fa-signature"></i> nombre codeudor tres:</b> <?php echo $nombre_codeudor_tres ?><br>
                          

                                </p>
                                </div>
                                <div class="col col-lg-6 col-md-12 col-sm-12 p-3 ">
                                    <img src="<?php echo $foto1 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto2 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto3 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto4 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto5 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto6 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto7 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto8 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto9 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                    <img src="<?php echo $foto10 ?>" class="d-block img" alt="Sin más fotos por el momento">
                                </div>

                               
                               
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                                    <a onclick="jQuery('#areaImprimir').print()" class="btn btn-outline-info" style="border-radius: 0;"><i class="fa fa-print"></i> IMPRIMIR</a>
                                    <a href="main.php" class="btn btn-outline-danger" style="border-radius: 0;"><i class="fa fa-sync"></i> CANCELAR</a>
                                </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="js/jQuery.print.min.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->
    <script src="js/jQuery.print.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->