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
    <?php include('head.php'); ?>
</head>
<?php include('nav2.php'); ?>

<body>
    <section class="home-section">
        <?php include('nav.php'); ?>
        <div class="container-fluid rounded">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                        include("txtBanner.php");
                        ?>
                        <?php
                        if (isset($_POST['updateProprieter'])) {
                            $nik_get = mysqli_real_escape_string($con, (strip_tags($_GET['nik'], ENT_QUOTES)));
                            $v = mysqli_real_escape_string($con, (strip_tags($_POST["v"], ENT_QUOTES))); //Escanpando caracteres 
                            $codigo = mysqli_real_escape_string($con, (strip_tags($_POST["codigo"], ENT_QUOTES))); //Escanpando caracteres 
                            $tipo_vivienda = mysqli_real_escape_string($con, (strip_tags($_POST["tipo_vivienda"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES))); //Escanpando caracteres 
                            $nivel_piso = mysqli_real_escape_string($con, (strip_tags($_POST["nivel_piso"], ENT_QUOTES))); //Escanpando caracteres
                            $area = mysqli_real_escape_string($con, (strip_tags($_POST["area"], ENT_QUOTES))); //Escanpando caracteres 
                            $estrato = mysqli_real_escape_string($con, (strip_tags($_POST["estrato"], ENT_QUOTES))); //Escanpando caracteres 
                            $municipio = mysqli_real_escape_string($con, (strip_tags($_POST["municipio"], ENT_QUOTES))); //Escanpando caracteres 
                            $barrio = mysqli_real_escape_string($con, (strip_tags($_POST["barrio"], ENT_QUOTES))); //Escanpando caracteres
                            $terraza = mysqli_real_escape_string($con, (strip_tags($_POST["terraza"], ENT_QUOTES))); //Escanpando caracteres
                            $ascensor = mysqli_real_escape_string($con, (strip_tags($_POST["ascensor"], ENT_QUOTES))); //Escanpando caracteres
                            $patio = mysqli_real_escape_string($con, (strip_tags($_POST["patio"], ENT_QUOTES))); //Escanpando caracteres 
                            $parqueadero = mysqli_real_escape_string($con, (strip_tags($_POST["parqueadero"], ENT_QUOTES))); //Escanpando caracteres 
                            $cuarto_util = mysqli_real_escape_string($con, (strip_tags($_POST["cuarto_util"], ENT_QUOTES))); //Escanpando caracteres 
                            $habitaciones = mysqli_real_escape_string($con, (strip_tags($_POST["habitaciones"], ENT_QUOTES))); //Escanpando caracteres
                            $closets = mysqli_real_escape_string($con, (strip_tags($_POST["closets"], ENT_QUOTES))); //Escanpando caracteres 
                            $sala = mysqli_real_escape_string($con, (strip_tags($_POST["sala"], ENT_QUOTES))); //Escanpando caracteres 
                            $sala_comedor = mysqli_real_escape_string($con, (strip_tags($_POST["sala_comedor"], ENT_QUOTES))); //Escanpando caracteres 
                            $comedor = mysqli_real_escape_string($con, (strip_tags($_POST["comedor"], ENT_QUOTES))); //Escanpando caracteres 
                            $cocina = mysqli_real_escape_string($con, (strip_tags($_POST["cocina"], ENT_QUOTES))); //Escanpando caracteres 
                            $servicios = mysqli_real_escape_string($con, (strip_tags($_POST["servicios"], ENT_QUOTES))); //Escanpando caracteres 
                            $cuartoServicios = mysqli_real_escape_string($con, (strip_tags($_POST["cuartoServicios"], ENT_QUOTES))); //Escanpando caracteres 
                            $ZonaRopa = mysqli_real_escape_string($con, (strip_tags($_POST["ZonaRopa"], ENT_QUOTES))); //Escanpando caracteres 
                            $vista = mysqli_real_escape_string($con, (strip_tags($_POST["vista"], ENT_QUOTES))); //Escanpando caracteres 
                            $servicios_publicos = mysqli_real_escape_string($con, (strip_tags($_POST["servicios_seleccionados"], ENT_QUOTES))); //Escanpando caracteres 
                            $otras_caracteristicas = mysqli_real_escape_string($con, (strip_tags($_POST["otras_caracteristicas"], ENT_QUOTES))); //Escanpando caracteres 
                            $direccion = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefonoInmueble = mysqli_real_escape_string($con, (strip_tags($_POST["telefonoInmueble"], ENT_QUOTES))); //Escanpando caracteres
                            $valor = mysqli_real_escape_string($con, (strip_tags($_POST["valor"], ENT_QUOTES))); //Escanpando caracteres
                            $identificacion_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_propietario"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_propietario"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefono_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_propietario"], ENT_QUOTES))); //Escanpando caracteres 
                            $email_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["email_propietario"], ENT_QUOTES))); //Escanpando caracteres     
                            $banco = mysqli_real_escape_string($con, (strip_tags($_POST["banco"], ENT_QUOTES))); //Escanpando caracteres 
                            $tipoCuenta = mysqli_real_escape_string($con, (strip_tags($_POST["tipoCuenta"], ENT_QUOTES))); //Escanpando caracteres 
                            $numeroCuenta = mysqli_real_escape_string($con, (strip_tags($_POST["numeroCuenta"], ENT_QUOTES))); //Escanpando caracteres 
                            $diaPago = mysqli_real_escape_string($con, (strip_tags($_POST["diaPago"], ENT_QUOTES))); //Escanpando caracteres 
                            $identificacion_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefono_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $email_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["email_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $fecha = mysqli_real_escape_string($con, (strip_tags($_POST["fecha"], ENT_QUOTES))); //Escanpando caracteres 
                            $vigenciaContrato = mysqli_real_escape_string($con, (strip_tags($_POST["vigenciaContrato"], ENT_QUOTES))); //Escanpando caracteres 
                            $descuento = mysqli_real_escape_string($con, (strip_tags($_POST["descuento"], ENT_QUOTES))); //Escanpando caracteres
                            $iva = mysqli_real_escape_string($con, (strip_tags($_POST["iva"], ENT_QUOTES))); //Escanpando caracteres
                            $epm = mysqli_real_escape_string($con, (strip_tags($_POST["epm"], ENT_QUOTES))); //Escanpando caracteres
                            $comision = mysqli_real_escape_string($con, (strip_tags($_POST["comision"], ENT_QUOTES))); //Escanpando caracteres
                            $catastro = mysqli_real_escape_string($con, (strip_tags($_POST["catastro"], ENT_QUOTES))); //Escanpando caracteres
                            $asistencia = mysqli_real_escape_string($con, (strip_tags($_POST["asistencia"], ENT_QUOTES))); //Escanpando caracteres
                            $condicion = mysqli_real_escape_string($con, (strip_tags($_POST["condicion"], ENT_QUOTES))); //Escanpando caracteres
                            $identificacion_codeudor_uno = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_codeudor_uno"], ENT_QUOTES))); //Escanpando caracteres
                            $nombre_codeudor_uno = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_codeudor_uno"], ENT_QUOTES))); //Escanpando caracteres
                            $email_codeudor_uno = mysqli_real_escape_string($con, (strip_tags($_POST["email_codeudor_uno"], ENT_QUOTES))); //Escanpando caracteres
                            $telefono_codeudor_uno = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_codeudor_uno"], ENT_QUOTES))); //Escanpando caracteres
                            $direccion_codeudor_uno = mysqli_real_escape_string($con, (strip_tags($_POST["direccion_codeudor_uno"], ENT_QUOTES))); //Escanpando caracteres
                
                            $identificacion_codeudor_dos = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_codeudor_dos"], ENT_QUOTES))); //Escanpando caracteres
                            $nombre_codeudor_dos = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_codeudor_dos"], ENT_QUOTES))); //Escanpando caracteres
                            $email_codeudor_dos = mysqli_real_escape_string($con, (strip_tags($_POST["email_codeudor_dos"], ENT_QUOTES))); //Escanpando caracteres
                            $telefono_codeudor_dos = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_codeudor_dos"], ENT_QUOTES))); //Escanpando caracteres
                            $direccion_codeudor_dos = mysqli_real_escape_string($con, (strip_tags($_POST["direccion_codeudor_dos"], ENT_QUOTES))); //Escanpando caracteres
                
                            $identificacion_codeudor_tres = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_codeudor_tres"], ENT_QUOTES))); //Escanpando caracteres
                            $nombre_codeudor_tres = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_codeudor_tres"], ENT_QUOTES))); //Escanpando caracteres
                            $email_codeudor_tres = mysqli_real_escape_string($con, (strip_tags($_POST["email_codeudor_tres"], ENT_QUOTES))); //Escanpando caracteres
                            $telefono_codeudor_tres = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_codeudor_tres"], ENT_QUOTES))); //Escanpando caracteres
                            $direccion_codeudor_tres = mysqli_real_escape_string($con, (strip_tags($_POST["direccion_codeudor_tres"], ENT_QUOTES))); //Escanpando caracteres
                

                            $estados = mysqli_real_escape_string($con, (strip_tags($_POST["estados"], ENT_QUOTES))); //Escanpando caracteres
                            //MUY IMPORTANTE EL CODIGO A CONTINUACION PARA SUBIR LAS IMAGENES EL FORM DEBE TENER enctype="multipart/form-data"
                            //carga de la imagen 1
                            $nombreimg1 = $_FILES['imagen']['name']; //obtiene el nombre
                            $archivo1 = $_FILES['imagen']['tmp_name']; //contiene el archivo
                            $ruta1 = "images/imagenesSubidas";
                            $ruta1 = $ruta1 . "/" . $nombreimg1; ///images/nombre.jpg

                            //carga de la imagen 2
                            $nombreimg2 = $_FILES['imagen2']['name']; //obtiene el nombre
                            $archivo2 = $_FILES['imagen2']['tmp_name']; //contiene el archivo
                            $ruta2 = "images/imagenesSubidas";
                            $ruta2 = $ruta2 . "/" . $nombreimg2; ///images/nombre.jpg

                            //carga de la imagen 3
                            $nombreimg3 = $_FILES['imagen3']['name']; //obtiene el nombre
                            $archivo3 = $_FILES['imagen3']['tmp_name']; //contiene el archivo
                            $ruta3 = "images/imagenesSubidas";
                            $ruta3 = $ruta3 . "/" . $nombreimg3; ///images/nombre.jpg

                            //carga de la imagen 4
                            $nombreimg4 = $_FILES['imagen4']['name']; //obtiene el nombre
                            $archivo4 = $_FILES['imagen4']['tmp_name']; //contiene el archivo
                            $ruta4 = "images/imagenesSubidas";
                            $ruta4 = $ruta4 . "/" . $nombreimg4; ///images/nombre.jpg

                            //carga de la imagen 5
                            $nombreimg5 = $_FILES['imagen5']['name']; //obtiene el nombre
                            $archivo5 = $_FILES['imagen5']['tmp_name']; //contiene el archivo
                            $ruta5 = "images/imagenesSubidas";
                            $ruta5 = $ruta5 . "/" . $nombreimg5; ///images/nombre.jpg

                            //carga de la imagen 6
                            $nombreimg6 = $_FILES['imagen6']['name']; //obtiene el nombre
                            $archivo6 = $_FILES['imagen6']['tmp_name']; //contiene el archivo
                            $ruta6 = "images/imagenesSubidas";
                            $ruta6 = $ruta6 . "/" . $nombreimg6; ///images/nombre.jpg

                            //carga de la imagen 7
                            $nombreimg7 = $_FILES['imagen7']['name']; //obtiene el nombre
                            $archivo7 = $_FILES['imagen7']['tmp_name']; //contiene el archivo
                            $ruta7 = "images/imagenesSubidas";
                            $ruta7 = $ruta7 . "/" . $nombreimg7; ///images/nombre.jpg

                            //carga de la imagen 8
                            $nombreimg8 = $_FILES['imagen8']['name']; //obtiene el nombre
                            $archivo8 = $_FILES['imagen8']['tmp_name']; //contiene el archivo
                            $ruta8 = "images/imagenesSubidas";
                            $ruta8 = $ruta8 . "/" . $nombreimg8; ///images/nombre.jpg

                            //carga de la imagen 9
                            $nombreimg9 = $_FILES['imagen9']['name']; //obtiene el nombre
                            $archivo9 = $_FILES['imagen9']['tmp_name']; //contiene el archivo
                            $ruta9 = "images/imagenesSubidas";
                            $ruta9 = $ruta9 . "/" . $nombreimg9; ///images/nombre.jpg

                            //carga de la imagen 10
                            $nombreimg10 = $_FILES['imagen10']['name']; //obtiene el nombre
                            $archivo10 = $_FILES['imagen10']['tmp_name']; //contiene el archivo
                            $ruta10 = "images/imagenesSubidas";
                            $ruta10 = $ruta10 . "/" . $nombreimg10; ///images/nombre.jpg

                            $dataTime = date("Y-m-d");
                            //condicion muy importante, me valida si los campos para las fotos estan vacios y asi no me borra las fotos
                            //actuales entonces se valida si los campos estan vacios y se llenan un nuevo valor se actualice las fotos
                            if (
                                !empty($_FILES['imagen']['name']) || !empty($_FILES['imagen2']['name']) || !empty($_FILES['imagen3']['name']) || !empty($_FILES['imagen4']['name'])
                                || !empty($_FILES['imagen5']['name']) || !empty($_FILES['imagen6']['name']) || !empty($_FILES['imagen7']['name']) || !empty($_FILES['imagen8']['name'])
                                || !empty($_FILES['imagen9']['name']) || !empty($_FILES['imagen10']['name'])
                            ) {
                                move_uploaded_file($archivo1, $ruta1);
                                move_uploaded_file($archivo2, $ruta2);
                                move_uploaded_file($archivo3, $ruta3);
                                move_uploaded_file($archivo4, $ruta4);
                                move_uploaded_file($archivo5, $ruta5);
                                move_uploaded_file($archivo6, $ruta6);
                                move_uploaded_file($archivo7, $ruta7);
                                move_uploaded_file($archivo8, $ruta8);
                                move_uploaded_file($archivo9, $ruta9);
                                move_uploaded_file($archivo10, $ruta10);
                                $update = mysqli_query($con, "UPDATE proprieter SET
            v='$v', codigo='$codigo', tipoInmueble='$tipo_vivienda', nombre='$nombre', nivel_piso='$nivel_piso', area='$area', estrato='$estrato', Municipio='$municipio', Barrio='$barrio', terraza='$terraza',
            ascensor='$ascensor', patio='$patio', parqueadero='$parqueadero', cuarto_util='$cuarto_util', alcobas='$habitaciones', closet='$closets', sala='$sala', sala_comedor='$sala_comedor', comedor='$comedor',
            cocina='$cocina', servicios='$servicios', CuartoServicios='$cuartoServicios',
            ZonaRopa='$ZonaRopa', vista='$vista', servicios_publicos='$servicios_publicos', otras_caracteristicas='$otras_caracteristicas', direccion='$direccion', TelefonoInmueble='$telefonoInmueble',
            valor_canon='$valor', doc_propietario='$identificacion_propietario', nombre_propietario='$nombre_propietario', telefono_propietario='$telefono_propietario', email_propietario='$email_propietario', banco='$banco', tipoCuenta='$tipoCuenta', numeroCuenta='$numeroCuenta', diaPago='$diaPago', doc_inquilino='$identificacion_inquilino',
            nombre_inquilino='$nombre_inquilino', telefono_inquilino='$telefono_inquilino', email_inquilino='$email_inquilino', vigenciaContrato='$vigenciaContrato', fecha='$fecha', descuento='$descuento', iva='$iva', contrato_EPM='$epm',
            comision='$comision', aval_catastro='$catastro', asistencia='$asistencia', cc_codeudor_uno='$identificacion_codeudor_uno', nombre_codeudor_uno='$nombre_codeudor_uno',email_codeudor_uno='$email_codeudor_uno',telefono_codeudor_uno='$telefono_codeudor_uno',direccion_codeudor_uno='$direccion_codeudor_uno',
            cc_codeudor_dos='$identificacion_codeudor_dos', nombre_codeudor_dos='$nombre_codeudor_dos',email_codeudor_dos='$email_codeudor_dos',telefono_codeudor_dos='$telefono_codeudor_dos',direccion_codeudor_dos='$direccion_codeudor_dos', cc_codeudor_tres='$identificacion_codeudor_tres', nombre_codeudor_tres='$nombre_codeudor_tres',email_codeudor_tres='$email_codeudor_tres',telefono_codeudor_tres='$telefono_codeudor_tres',direccion_codeudor_tres='$direccion_codeudor_tres', estadoPropietario='$estados', foto1='$ruta1',
            foto2='$ruta2', foto3='$ruta3', foto4='$ruta4', foto5='$ruta5', foto6='$ruta6', foto7='$ruta7', foto8='$ruta8', foto9='$ruta9', foto10='$ruta10', condicion='$condicion', fecha_creacion='$dataTime' WHERE id=$nik_get");
                                if ($update) {
                                    echo '
                               <div class="toastActualizado" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                   <div class="toast-header ">
                                       <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                               style=color:green></i> Notificación</strong>
                                     
                                       <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                           aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="toastActualizado-body alert-success">
                                   <h5 class="text-center p-3"><b><i class="fa fa-floppy-o" aria-hidden="true" style="font-size:50px"></i><br><br>Propietario actualizado<br>correctamente <br><br> 
                                   </div>
                               </div>
                          ';
                                } else {
                                    echo '
                               <div class="toastActualizado" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                   <div class="toast-header  ">
                                       <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                     
                                       <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                           aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="toast-body alert-danger">
                                       <h5> <b>Hubo problemas en la actualización del propietario, intenta nuevamente</b></h5>
                                  
                                   </div>
                               </div>
                          ';
                                }
                            } else { //sino se llenan fotos nuevas me conserva la informacion actual de las fotos sin perderlas pero actualizando la informacion de la propiedad
                                $update = mysqli_query($con, "UPDATE proprieter SET
                                v='$v',codigo='$codigo',tipoInmueble='$tipo_vivienda',nombre='$nombre',nivel_piso='$nivel_piso',area='$area',estrato='$estrato',Municipio='$municipio',Barrio='$barrio',terraza='$terraza',
                                ascensor='$ascensor',patio='$patio',parqueadero='$parqueadero',cuarto_util='$cuarto_util',alcobas='$habitaciones',closet='$closets',sala='$sala',sala_comedor='$sala_comedor',comedor='$comedor',
                                cocina='$cocina',servicios='$servicios',CuartoServicios='$cuartoServicios',
                                ZonaRopa='$ZonaRopa',vista='$vista',servicios_publicos='$servicios_publicos',otras_caracteristicas='$otras_caracteristicas',direccion='$direccion',TelefonoInmueble='$telefonoInmueble',
                                valor_canon='$valor',doc_propietario='$identificacion_propietario',nombre_propietario='$nombre_propietario',telefono_propietario='$telefono_propietario',email_propietario='$email_propietario',banco='$banco',tipoCuenta='$tipoCuenta',numeroCuenta='$numeroCuenta',diaPago='$diaPago',doc_inquilino='$identificacion_inquilino',
                                nombre_inquilino='$nombre_inquilino',telefono_inquilino='$telefono_inquilino',email_inquilino='$email_inquilino',vigenciaContrato='$vigenciaContrato',fecha='$fecha',descuento='$descuento',iva='$iva',contrato_EPM='$epm',
                                comision='$comision',aval_catastro='$catastro',asistencia='$asistencia',cc_codeudor_uno='$identificacion_codeudor_uno', nombre_codeudor_uno='$nombre_codeudor_uno',email_codeudor_uno='$email_codeudor_uno',telefono_codeudor_uno='$telefono_codeudor_uno',direccion_codeudor_uno='$direccion_codeudor_uno',
                                cc_codeudor_dos='$identificacion_codeudor_dos', nombre_codeudor_dos='$nombre_codeudor_dos',email_codeudor_dos='$email_codeudor_dos',telefono_codeudor_dos='$telefono_codeudor_dos',direccion_codeudor_dos='$direccion_codeudor_dos', cc_codeudor_tres='$identificacion_codeudor_tres', nombre_codeudor_tres='$nombre_codeudor_tres',email_codeudor_tres='$email_codeudor_tres',telefono_codeudor_tres='$telefono_codeudor_tres',direccion_codeudor_tres='$direccion_codeudor_tres',
                                estadoPropietario='$estados',condicion='$condicion',fecha_creacion='$dataTime' WHERE id=$nik_get");
                                if ($update) {
                                    echo '
                                <div class="toastActualizado" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                    <div class="toast-header ">
                                        <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                                style=color:green></i> Notificación</strong>
                                      
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="toastActualizado-body alert-success">
                                    <h5 class="text-center p-3"><b><i class="fa fa-floppy-o" aria-hidden="true" style="font-size:50px"></i><br><br>Propietario actualizado<br>correctamente <br><br> 
                                    </div>
                                </div>
                           ';
                                } else {
                                    echo '
                                <div class="toastActualizado" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                    <div class="toast-header  ">
                                        <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                      
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="toast-body alert-danger">
                                        <h5> <b>Hubo problemas en la actualización del propietario, intenta nuevamente</b></h5>
                                   
                                    </div>
                                </div>
                           ';
                                }
                            }
                        }

                        ?>
                        <?php
                        //CONSULTA PARA INSERTAR INQUILINO RETIRADO A LA TABLA TENANT 
                        if (isset($_POST['retirar'])) {
                            $codigoR = mysqli_real_escape_string($con, (strip_tags($_POST["codigo"], ENT_QUOTES))); //Escanpando caracteres 
                            $identificacion_inquilinoR = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre_inquilinoR = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefono_inquilinoR = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $email_inquilinoR = mysqli_real_escape_string($con, (strip_tags($_POST["email_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $fechaR = mysqli_real_escape_string($con, (strip_tags($_POST["fecha"], ENT_QUOTES))); //Escanpando caracteres 
                            $fechaRetiro = date("Y-m-d");
                            $retirado = mysqli_query($con, "INSERT INTO tenant (codigoPropiedad, identificacionInquilino, nombreInquilino,telefonoInquilino,email,fechaIngreso,fechaRetiro) VALUES ('$codigoR','$identificacion_inquilinoR','$nombre_inquilinoR','$telefono_inquilinoR','$email_inquilinoR','$fechaR','$fechaRetiro')");

                            if ($retirado) {
                                echo '
                                                                <div class="toastRetirado" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                                                    <div class="toast-header ">
                                                                        <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                                                                style=color:green></i> Notificación</strong>
                                                                      
                                                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="toastPaciente-body alert-success">
                                                                    <h5 class="text-center p-3"><b><i class="fa fa-trash" aria-hidden="true" style="font-size:50px"></i><br><br>Iquilino retirado correctamente,<br>ahora debe limpiar los campos <br><br>
                                                                    <input id="limpiarRetirado" onclick="limpiar()" class="btn btn-warning" data-toggle="modal" data-target="#mensajeRetirado" value="Guardar">
                                                                    <br>
                                                                    </b></h5>
                                                                   
                                                                    </div>
                                                                </div>
                                                           ';
                            } else {
                                echo '
                                                                <div class="toastRetirado" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                                                    <div class="toast-header  ">
                                                                        <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                                                      
                                                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="toast-body alert-danger">
                                                                        <h5 class="text-center p-3"> <i class="fa fa-exclamation" aria-hidden="true" style="font-size:50px"></i><br><br><b><i class="fa fa-exchange" aria-hidden="true"></i> Hubo problemas en el retiro del inquilino, intenta nuevamente</b></h5>
                                                                   
                                                                    </div>
                                                                </div>
                                                           ';
                            }
                        }
                        ?>
                        <div class="p-3">
                            <br>
                            <h2 class="text-center">Actualizar propietario</h2>
                            <p class="text-center">Complete este formulario para actualizar el propietario. <br>
                                <b style="color:red" class="text-center">Todos los datos con * son obligatorios </b><br>
                                <b style="color:#123960" class="text-center">TENGA EN CUENTA QUE LOS DATOS QUE ESTA
                                    VISUALIZANDO SON LOS DATOS ACTUALMENTE ALMACENADOS EN LA BASE DE DATOS</b>
                            </p>
                            <!--Cargo los datos de usuario en los input-->
                            <?php
                            $usaurio = htmlspecialchars($_SESSION["username"]);
                            $nik = mysqli_real_escape_string($con, (strip_tags($_GET['nik'], ENT_QUOTES)));
                            $query = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id=$nik;");
                            while ($datoPropietarioActualizar = mysqli_fetch_array($query)) {
                                $v = $datoPropietarioActualizar['v'];
                                $codigo = $datoPropietarioActualizar['codigo'];
                                $tipo_vivienda = $datoPropietarioActualizar['tipoInmueble'];
                                $nombre = $datoPropietarioActualizar['nombre'];
                                $nivel_piso = $datoPropietarioActualizar['nivel_piso'];
                                $area = $datoPropietarioActualizar['area'];
                                $estrato = $datoPropietarioActualizar['estrato'];
                                $municipio_id = $datoPropietarioActualizar['id_municipio'];
                                $municipio_name = $datoPropietarioActualizar['municipio'];
                                $barrio = $datoPropietarioActualizar['Barrio'];
                                $terraza = $datoPropietarioActualizar['terraza'];
                                $ascensor = $datoPropietarioActualizar['ascensor'];
                                $patio = $datoPropietarioActualizar['patio'];
                                $parqueadero = $datoPropietarioActualizar['parqueadero'];
                                $cuarto_util = $datoPropietarioActualizar['cuarto_util'];
                                $habitaciones = $datoPropietarioActualizar['alcobas'];
                                $closets = $datoPropietarioActualizar['closet'];
                                $sala = $datoPropietarioActualizar['sala'];
                                $sala_comedor = $datoPropietarioActualizar['sala_comedor'];
                                $comedor = $datoPropietarioActualizar['comedor'];
                                $cocina = $datoPropietarioActualizar['cocina'];
                                $servicios = $datoPropietarioActualizar['servicios'];
                                $cuartoServicios = $datoPropietarioActualizar['CuartoServicios'];
                                $zonaRopa = $datoPropietarioActualizar['ZonaRopa'];
                                $vista = $datoPropietarioActualizar['vista'];
                                $servicios_publicos = $datoPropietarioActualizar['servicios_publicos'];
                                $otras_caracteristicas = $datoPropietarioActualizar['otras_caracteristicas'];
                                $direccion = $datoPropietarioActualizar['direccion'];
                                $telefonoInmueble = $datoPropietarioActualizar['TelefonoInmueble'];
                                $valor = $datoPropietarioActualizar['valor_canon'];
                                $identificacion_propietario = $datoPropietarioActualizar['doc_propietario'];
                                $nombre_propietario = $datoPropietarioActualizar['nombre_propietario'];
                                $telefono_propietario = $datoPropietarioActualizar['telefono_propietario'];
                                $email_propietario = $datoPropietarioActualizar['email_propietario'];
                                $banco = $datoPropietarioActualizar['banco'];
                                $tipoCuenta = $datoPropietarioActualizar['tipoCuenta'];
                                $numeroCuenta = $datoPropietarioActualizar['numeroCuenta'];
                                $diaPago = $datoPropietarioActualizar['diaPago'];
                                $identificacion_inquilino = $datoPropietarioActualizar['doc_inquilino'];
                                $nombre_inquilino = $datoPropietarioActualizar['nombre_inquilino'];
                                $telefono_inquilino = $datoPropietarioActualizar['telefono_inquilino'];
                                $email_inquilino = $datoPropietarioActualizar['email_inquilino'];
                                $fecha = $datoPropietarioActualizar['fecha'];
                                $vigenciaContrato = $datoPropietarioActualizar['vigenciaContrato'];
                                $descuento = $datoPropietarioActualizar['descuento'];
                                $iva = $datoPropietarioActualizar['iva'];
                                $epm = $datoPropietarioActualizar['contrato_EPM'];
                                $comision = $datoPropietarioActualizar['comision'];
                                $catastro = $datoPropietarioActualizar['aval_catastro'];
                                $asistencia = $datoPropietarioActualizar['asistencia'];
                                $condicion = $datoPropietarioActualizar['condicion'];
                                $identificacion_codeudor_uno = $datoPropietarioActualizar['cc_codeudor_uno'];
                                $nombre_codeudor_uno = $datoPropietarioActualizar['nombre_codeudor_uno'];
                                $email_codeudor_uno=$datoPropietarioActualizar['email_codeudor_uno'];
                                $telefono_codeudor_uno=$datoPropietarioActualizar['telefono_codeudor_uno'];
                                $direccion_codeudor_uno=$datoPropietarioActualizar['direccion_codeudor_uno'];
                                $identificacion_codeudor_dos = $datoPropietarioActualizar['cc_codeudor_dos'];
                                $nombre_codeudor_dos = $datoPropietarioActualizar['nombre_codeudor_dos'];
                                $email_codeudor_dos = $datoPropietarioActualizar['email_codeudor_dos'];
                                $telefono_codeudor_dos = $datoPropietarioActualizar['telefono_codeudor_dos'];
                                $direccion_codeudor_dos = $datoPropietarioActualizar['direccion_codeudor_dos'];
                                $identificacion_codeudor_tres = $datoPropietarioActualizar['cc_codeudor_tres'];
                                $nombre_codeudor_tres = $datoPropietarioActualizar['nombre_codeudor_tres'];
                                $email_codeudor_tres = $datoPropietarioActualizar['email_codeudor_tres'];
                                $telefono_codeudor_tres = $datoPropietarioActualizar['telefono_codeudor_tres'];
                                $direccion_codeudor_tres = $datoPropietarioActualizar['direccion_codeudor_tres'];


                                $estados = $datoPropietarioActualizar['estadoPropietario'];
                                //cargamos las fotos
                                $foto1 = $datoPropietarioActualizar['foto1'];
                                $foto2 = $datoPropietarioActualizar['foto2'];
                                $foto3 = $datoPropietarioActualizar['foto3'];
                                $foto4 = $datoPropietarioActualizar['foto4'];
                                $foto5 = $datoPropietarioActualizar['foto5'];
                                $foto6 = $datoPropietarioActualizar['foto6'];
                                $foto7 = $datoPropietarioActualizar['foto7'];
                                $foto8 = $datoPropietarioActualizar['foto8'];
                                $foto9 = $datoPropietarioActualizar['foto9'];
                                $foto10 = $datoPropietarioActualizar['foto10'];
                            }
                            ?>
                            <form action="" method="post" class="was-validated" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                                    Vivienda
                                                </button>
                                                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                                    Caracteristicas
                                                </button>
                                                <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                                    Propietario e inquilino
                                                </button>
                                                <button class="nav-link" id="nav-otros-tab" data-toggle="tab" data-target="#nav-otros" type="button" role="tab" aria-controls="nav-otros" aria-selected="false">
                                                    Otros <span class="badge badge-success ">⭐️ </span>
                                                </button>
                                                <button class="nav-link" id="nav-codeudores-tab" data-toggle="tab" data-target="#nav-codeudores" type="button" role="tab" aria-controls="nav-codeudores" aria-selected="false">
                                                    Codeudores
                                                </button>
                                                <button class="nav-link" id="nav-fotos-tab" data-toggle="tab" data-target="#nav-fotos" type="button" role="tab" aria-controls="nav-fotos" aria-selected="false">
                                                    Cargar fotos <span class="badge badge-success ">⭐️ </span>
                                                </button>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">

                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="row">
                                                    <div class="col col-lg-6 col-md-6 col-sm-12">
                                                        <br>

                                                        <div class="form-group">
                                                            <label style="color:#000">V *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="v" required="true">
                                                                <option value="<?php echo $v; ?>"><?php echo $v; ?>
                                                                </option>
                                                                <option value="Y">Y</option>
                                                                <option value="H">H</option>
                                                                <option value="V">V</option>
                                                            </select>

                                                        </div>

                                                        <div class="form-group">
                                                            <label style="color:#000">Código de la vivienda *</label>
                                                            <input type="text" name="codigo" class="form-control" placeholder="Código de la propiedad" value="<?php echo $codigo; ?>" required="true" readonly>
                                                            <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Tipo de vivienda *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="tipo_vivienda" required="true">
                                                                <option value="<?php echo $tipo_vivienda; ?>">
                                                                    <?php echo $tipo_vivienda; ?></option>
                                                                <option value="Casa">Casa</option>
                                                                <option value="Apartamento">Apartamento</option>
                                                                <option value="Local">Local</option>
                                                                <option value="Apartaestudio">Apartaestudio</option>
                                                                <option value="Penthouse">Penthouse</option>
                                                                <option value="Finca">Finca</option>
                                                                <option value="Casa con local">Casa con local</option>
                                                                <option value="Lote">Lote</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Titulo o nombre para la propiedad
                                                                *</label>
                                                            <input type="text" name="nombre" class="form-control" style="text-transform: capitalize;" placeholder="Nombre" required="true" value="<?php echo $nombre; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nivel de piso *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="nivel_piso" required="true">
                                                                <option value="<?php echo $nivel_piso; ?>">
                                                                    <?php echo $nivel_piso; ?></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>

                                                        </div>
                                                        <label style="color:#000">Área m² *</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control" name="area" placeholder="Área m²" aria-label="Username" value="<?php echo $area; ?>" aria-describedby="basic-addon1" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Estrato *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="estrato" required="true">
                                                                <option value="<?php echo $estrato; ?>">
                                                                    <?php echo $estrato; ?></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="col col-lg-6 col-md-6 col-sm-12">
                                                        <br>

                                                        <label style="color:#000">Departamento, *</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/colombia.png" width="24px" alt="colombia">
                                                                </span>
                                                            </div>
                                                            <select id="lista_departamento" name="departamento" class="form-control form-select-lg custom-selec text-bg-dark" required="true">
                                                                <option value="<?php echo $estrato; ?>">
                                                                    <?php echo $estrato; ?></option>

                                                            </select>

                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/map.png" width="24px" alt="mapa">
                                                                </span>
                                                            </div>
                                                            <select id="municipios" name="municipio" class="form-control form-select-lg custom-selec text-bg-dark" required="true">
                                                                <option value="<?php echo $municipio_id; ?>">
                                                                    <?php echo $municipio_name; ?></option>

                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/playground.png" width="24px" alt="barrio">
                                                                </span>
                                                            </div>
                                                            <select id="barrios" name="barrio" class="form-control form-select-lg custom-selec text-bg-dark" required="true">
                                                                <option value="<?php echo $barrio; ?>">
                                                                    <?php echo $barrio; ?></option>

                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Terraza *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="terraza" required="true">
                                                                <option value="<?php echo $terraza; ?>">
                                                                    <?php echo $terraza; ?></option>
                                                                <option value="SÍ">SÍ</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Ascensor *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="ascensor" required="true">
                                                                <option value="<?php echo $ascensor; ?>">
                                                                    <?php echo $ascensor; ?></option>
                                                                <option value="SÍ">SÍ</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Patio *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="patio" required="true">
                                                                <option value="<?php echo $patio; ?>">
                                                                    <?php echo $patio; ?></option>
                                                                <option value="SÍ">SÍ</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Parqueadero *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="parqueadero" required="true">
                                                                <option value="<?php echo $parqueadero; ?>">
                                                                    <?php echo $parqueadero; ?></option>
                                                                <option value="Público">Público</option>
                                                                <option value="Privado">Privado</option>
                                                                <option value="Sin parqueadero">Sin parqueadero</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Cuarto útil *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="cuarto_util" required="true">
                                                                <option value="<?php echo $cuarto_util; ?>">
                                                                    <?php echo $cuarto_util; ?></option>
                                                                <option value="SÍ">SÍ</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--Caracteristicas-->
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <br>
                                                <div class="row">
                                                    <div class="col col-lg-4 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label style="color:#000">Habitaciones *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="habitaciones" required="true">
                                                                <option value="<?php echo $habitaciones; ?>">
                                                                    <?php echo $habitaciones; ?></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Closets *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="closets" required="true">
                                                                <option value="<?php echo $closets; ?>">
                                                                    <?php echo $closets; ?></option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Sala *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="sala" required="true">
                                                                <option value="<?php echo $sala; ?>">
                                                                    <?php echo $sala; ?></option>
                                                                <option value="Sí">Sí</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Comedor *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="comedor" required="true">
                                                                <option value="<?php echo $comedor; ?>">
                                                                    <?php echo $comedor; ?></option>
                                                                <option value="Sí">Sí</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Sala comedor *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="sala_comedor" required="true">
                                                                <option value="<?php echo $sala_comedor; ?>">
                                                                    <?php echo $sala_comedor; ?></option>
                                                                <option value="Sí">Sí</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col col-lg-4 col-md-12col-sm-12">
                                                        <br>
                                                        <div class="form-group">
                                                            <label style="color:#000">Cocina *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="cocina" required="true">
                                                                <option value="<?php echo $cocina; ?>">
                                                                    <?php echo $cocina; ?></option>
                                                                <option value="Integral">Integral</option>
                                                                <option value="Semi-integral">Semi-integral</option>
                                                                <option value="Enchapada">Enchapada</option>
                                                                <option value="Básica">Básica</option>
                                                                <option value="No aplica">No aplica</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Baños *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="servicios" required="true">
                                                                <option value="<?php echo $servicios; ?>">
                                                                    <?php echo $servicios; ?></option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Cuarto de servicios *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="cuartoServicios" required="true">
                                                                <option value="<?php echo $cuartoServicios; ?>">
                                                                    <?php echo $cuartoServicios; ?></option>
                                                                <option value="Sí">Sí</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Zona de ropa *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="ZonaRopa" required="true">
                                                                <option value="<?php echo $zonaRopa; ?>">
                                                                    <?php echo $zonaRopa; ?></option>
                                                                <option value="Sí">Sí</option>
                                                                <option value="No">No</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Tipo de vista *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="vista" required="true">
                                                                <option value="<?php echo $vista; ?>">
                                                                    <?php echo $vista; ?></option>
                                                                <option value="VENTANA">VENTANA</option>
                                                                <option value="VENTANAL">VENTANAL</option>
                                                                <option value="BALCÓN">BALCÓN</option>
                                                                <option value="APARTAMENTO INTERTO">APARTAMENTO INTERNO
                                                                </option>
                                                                <option value="SOTANO">SOTANO</option>
                                                                <option value="FINCA">FINCA</option>
                                                                <option value="LOTE">LOTE</option>
                                                                <option value="PUERTA GARAJE">PUERTA GARAJE</option>
                                                                <option value="PUERTA ENROLLABLE">PUERTA ENROLLABLE
                                                                </option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col col-lg-4 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label style="color:#000">Servicios públicos *</label><br>
                                                            <input class="form-control w-80" type="text" id="servicios_seleccionados" name="servicios_seleccionados" required="true" value="<?php echo $servicios_publicos; ?>">
                                                            <span>Servicios seleccionados</span><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="servicios_publicos" value="Energía" aria-label="...">
                                                                <label class="form-check-label" for="servicios">Energía</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="servicios_publicos" value="Agua" aria-label="...">
                                                                <label class="form-check-label" for="servicios">Agua</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="servicios_publicos" value="Gas" aria-label="...">
                                                                <label class="form-check-label" for="servicios">Gas</label>
                                                            </div>

                                                        </div>


                                                        <div class="form-group">
                                                            <label style="color:#000">Otras Caracteristicas
                                                                *</label><br>
                                                            <textarea name="otras_caracteristicas" rows="10" cols="50" required="true"><?php echo $otras_caracteristicas; ?></textarea>
                                                            <br>
                                                            <sub>Ingrese máximo 255 caracteres</sub>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--propietario-->
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <br>
                                                <div class="row">
                                                    <div class="col col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label style="color:#000">Dirección
                                                                *</label>
                                                            <input type="text" name="direccion" class="form-control" style="text-transform: uppercase;" placeholder="Dirección" required="true" value="<?php echo $direccion; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono del inmueble
                                                                *</label>
                                                            <input type="text" name="telefonoInmueble" class="form-control" placeholder="Teléfono del inmueble" minlength="10" maxlength="10" required="true" value="<?php echo $telefonoInmueble; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Valor canon
                                                                *</label>
                                                            <input type="text" name="valor" class="form-control" placeholder="Valor canon" required="true" value="<?php echo $valor; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación del propietario
                                                                *</label>
                                                            <input type="number" name="identificacion_propietario" class="form-control" style="text-transform: uppercase;" placeholder="Identificación del propietario" required="true" value="<?php echo $identificacion_propietario; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre del propietario *</label>
                                                            <input type="text" name="nombre_propietario" class="form-control" style="text-transform: capitalize;" placeholder="Nombre del propietario" required="true" value="<?php echo $nombre_propietario; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono del propietario *</label>
                                                            <input type="text" name="telefono_propietario" class="form-control" style="text-transform: capitalize;" placeholder="Teléfono del propietario" required="true" value="<?php echo $telefono_propietario; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Email del propietario *</label>
                                                            <input type="text" name="email_propietario" class="form-control" placeholder="Email del propietario" required="true" value="<?php echo $email_propietario; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Banco *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="banco">
                                                                <option value="<?php echo $banco; ?>">
                                                                    <?php echo $banco; ?></option>
                                                                <option value="Cooperativa Financiera de Antioquia">
                                                                    Cooperativa Financiera de Antioquia</option>
                                                                <option value="Cotrafa">Cotrafa</option>
                                                                <option value="Banco Agrario">Banco Agrario</option>
                                                                <option value="ITAU">ITAU</option>
                                                                <option value="Bancolombia">Bancolombia</option>
                                                                <option value="Nequi">Nequi</option>
                                                                <option value="Daviplata">Daviplata</option>
                                                                <option value="Banco de Bogotá">Banco de Bogotá</option>
                                                                <option value="Davivienda">Davivienda</option>
                                                                <option value="BBVA">BBVA</option>
                                                                <option value="Banco de Occidente">Banco de Occidente
                                                                </option>
                                                                <option value="Scotibank Colpatria">Scotibank Colpatria
                                                                </option>
                                                                <option value="Banco Itaú">Banco Itaú</option>
                                                                <option value="GNB Sudameris">GNB Sudameris</option>
                                                                <option value="Banco Agrario">Banco Agrario</option>
                                                                <option value="Banco Popular">Banco Popular</option>
                                                                <option value="Banco Caja Social">Banco Caja Social
                                                                </option>
                                                                <option value="Banco AV Villas">Banco AV Villas</option>
                                                                <option value="Banco Union">Banco Union</option>
                                                                <option value="Bancoomeva">Bancoomeva</option>
                                                                <option value="Banco Falabella">Banco Falabella</option>
                                                                <option value="Banco Pichincha">Banco Pichincha</option>
                                                                <option value="Banco W">Banco W</option>
                                                                <option value="Banco Finandina">Banco Finandina</option>
                                                                <option value="Bancamía">Bancamía</option>
                                                                <option value="Banco Credifinanciera">Banco
                                                                    Credifinanciera</option>
                                                                <option value="Banco Cooperativo Coopcentral">Banco
                                                                    Cooperativo Coopcentral</option>
                                                                <option value="Bancoldex">Bancoldex</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Tipo de cuenta *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="tipoCuenta">
                                                                <option value="<?php echo $tipoCuenta; ?>">
                                                                    <?php echo $tipoCuenta; ?></option>
                                                                <option value="Cuenta de ahorro">Cuenta de ahorro
                                                                </option>
                                                                <option value="Cuenta corriente">Cuenta corriente
                                                                </option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 col-sm-12">

                                                        <div class="form-group">
                                                            <label style="color:#000">Número de cuenta
                                                                *</label>
                                                            <input type="text" name="numeroCuenta" class="form-control" style="text-transform: capitalize;" placeholder="Número de cuenta bancaria" value="<?php echo $numeroCuenta; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Día de pago
                                                                *</label>
                                                            <input type="number" name="diaPago" class="form-control" value="<?php echo $diaPago; ?>" placeholder="Día de pago">
                                                        </div>
                                                        <!--inquilino-->
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación del inquilino
                                                                *</label>
                                                            <input type="text" name="identificacion_inquilino" id="identificacion_inquilino" class="form-control" style="text-transform: uppercase;" placeholder="Identificación del inquilino" value="<?php echo $identificacion_inquilino; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre del inquilino *</label>
                                                            <input type="text" name="nombre_inquilino" id="nombre_inquilino" class="form-control" style="text-transform: capitalize;" placeholder="Nombre del inquilino" value="<?php echo $nombre_inquilino; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono del inquilino *</label>
                                                            <input type="text" name="telefono_inquilino" id="telefono_inquilino" class="form-control" placeholder="Teléfono del inquilino" value="<?php echo $telefono_inquilino; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Email del inquilino *</label>
                                                            <input type="email" name="email_inquilino" id="email_inquilino" class="form-control" placeholder="Email del inquilino" value="<?php echo $email_inquilino; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Fecha de contrato *</label>
                                                            <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Vigencia del contrato *</label>
                                                            <select class="form-control" name="vigenciaContrato" id="vigenciaContrato">
                                                                <option value="<?php echo $vigenciaContrato; ?>">
                                                                    <?php echo $vigenciaContrato; ?></option>
                                                                <option value="SEIS MESES">SEIS MESES</option>
                                                                <option value="UN AÑO">UN AÑO</option>
                                                                <option value="SIN INQUILINO">SIN INQUILINO</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">

                                                            <form method="post">
                                                                <button type="button" id="activarBtn" class="btn btn-outline-primary "><i class="fa-solid fa-toggle-on"></i> Activar para
                                                                    retirar inquilino</button>
                                                                <input type="submit" name="retirar" id="retirarBtn" class="btn btn-outline-danger " disabled value="Retirar inquilino">
                                                            </form>

                                                            <script>
                                                                //Este script me activ el boton para retirar el inquilino
                                                                document.addEventListener("DOMContentLoaded", function() {
                                                                    var activarBtn = document.getElementById("activarBtn");
                                                                    var retirarBtn = document.getElementById("retirarBtn");
                                                                    activarBtn.addEventListener("click", function() {
                                                                        // Aquí podrías realizar validaciones y otras acciones
                                                                        // Si las validaciones son exitosas, habilitamos el botón de retirar
                                                                        alert('Acaba de activar el botón para retirar el inquilino, preste mucha atención a las acciones que vaya a realizar, TENGA EN CUENTA QUE ESTA ACCIÓN AL DARLE OK NO SE PUEDE DESHACER. ');
                                                                        retirarBtn.removeAttribute("disabled");

                                                                    });

                                                                });
                                                            </script>

                                                            <script type="text/javascript">
                                                                document.getElementById("activarBtn").addEventListener("click", function(event) {

                                                                    var respuesta = window.confirm("¿Está seguro de que desea eliminar el inquilino: TENGA EN CUENTA QUE ESTA ACCIÓN AL DARLE OK NO SE PUEDE DESHACER.");
                                                                    if (respuesta == true) {
                                                                        var button = document.getElementById("retirarBtn");
                                                                        button.click();

                                                                    } else {
                                                                        return;
                                                                    }

                                                                    function limpiar() {

                                                                        document.getElementById("fecha").value = "0000/00/00";
                                                                        document.getElementById("vigenciaContrato").value = "SIN INQUILINO";
                                                                        document.getElementById("identificacion_inquilino").value = "";
                                                                        document.getElementById("nombre_inquilino").value = "";
                                                                        document.getElementById("telefono_inquilino").value = "";
                                                                        document.getElementById("email_inquilino").value = "";
                                                                        document.getElementById("identificacion_codeudor_uno").value = "";
                                                                        document.getElementById("nombre_codeudor_uno").value = "";
                                                                        document.getElementById("identificacion_codeudor_dos").value = "";
                                                                        document.getElementById("nombre_codeudor_dos").value = "";
                                                                        document.getElementById("identificacion_codeudor_tres").value = "";
                                                                        document.getElementById("nombre_codeudor_tres").value = "";


                                                                    }


                                                                });

                                                                function limpiar() {

                                                                    document.getElementById("fecha").value = "0000/00/00";
                                                                    document.getElementById("vigenciaContrato").value = "SIN INQUILINO";
                                                                    document.getElementById("identificacion_inquilino").value = "";
                                                                    document.getElementById("nombre_inquilino").value = "";
                                                                    document.getElementById("telefono_inquilino").value = "";
                                                                    document.getElementById("email_inquilino").value = "";
                                                                    document.getElementById("identificacion_codeudor_uno").value = "";
                                                                    document.getElementById("nombre_codeudor_uno").value = "";
                                                                    document.getElementById("identificacion_codeudor_dos").value = "";
                                                                    document.getElementById("nombre_codeudor_dos").value = "";
                                                                    document.getElementById("identificacion_codeudor_tres").value = "";
                                                                    document.getElementById("nombre_codeudor_tres").value = "";


                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--propietario-->
                                            <div class="tab-pane fade" id="nav-otros" role="tabpanel" aria-labelledby="nav-otros-tab">
                                                <br>
                                                <div class="row">
                                                    <div class="col col-md-6 col-sm-12">

                                                        <div class="form-group">
                                                            <label style="color:#000">Descuento *</label>
                                                            <input type="text" name="descuento" class="form-control" placeholder="Descuento" required="true" value="<?php echo $descuento; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">IVA *</label>
                                                            <input type="number" name="iva" class="form-control" placeholder="IVA" required="true" value="<?php echo $iva; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Contrato EPM *</label>
                                                            <input type="number" name="epm" class="form-control" placeholder="Contrato EPM" required="true" value="<?php echo $epm; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Estado *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="estados" required="true">
                                                                <option value="<?php echo $estados; ?>">
                                                                    <?php echo $estados; ?></option>
                                                                <option value="ACTIVO">ACTIVO</option>
                                                                <option value="INACTIVO">INACTIVO</option>
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="col col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label style="color:#000">Comisión *</label>
                                                            <input type="text" name="comision" class="form-control" placeholder="Comisión" required="true" value="<?php echo $comision; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Aval Catastro *</label>
                                                            <input type="text" name="catastro" class="form-control" placeholder="Aval Catastro" required="true" value="<?php echo $catastro; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Asistencia *</label>
                                                            <input type="text" name="asistencia" class="form-control" placeholder="Asistencia" required="true" value="<?php echo $asistencia; ?>">
                                                        </div>
                                                        <label style="color:#000">Condición de la vivienda * <span class="badge badge-success ">⭐️ </span></label><br>
                                                        <div class="input-group">

                                                            <select name="condicion" class="form-control form-select-lg custom-selec text-bg-dark" required="true">
                                                                <option value="<?php echo $condicion; ?>">
                                                                    <?php echo $condicion; ?></option>
                                                                <option value="EN ALQUILER">EN ALQUILER</option>
                                                                <option value="EN VENTA">EN VENTA</option>
                                                                <option value="ALQUILER O VENTA">ALQUILER O VENTA
                                                                </option>
                                                            </select>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="nav-codeudores" role="tabpanel" aria-labelledby="nav-codeudores-tab">
                                                <br>
                                                <div class="row">
                                                    <div class="col col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación codeudor 1*</label>
                                                            <input type="text" name="identificacion_codeudor_uno" id="identificacion_codeudor_uno" class="form-control" placeholder="Identificación codeudor 1" value="<?php echo $identificacion_codeudor_uno; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre codeudor 1*</label>
                                                            <input type="text" name="nombre_codeudor_uno" id="nombre_codeudor_uno" class="form-control" placeholder="Nombre codeudor 1" style="text-transform: capitalize;" value="<?php echo $nombre_codeudor_uno; ?>">
                                                        </div>
      
                                                        <div class="form-group">
                                                            <label style="color:#000">E-mail codeudor 1*</label>
                                                            <input type="email" name="email_codeudor_uno" id="email_codeudor_uno" class="form-control" placeholder="Email codeudor 1" value="<?php echo $email_codeudor_uno; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono codeudor 1*</label>
                                                            <input type="text" name="telefono_codeudor_uno" id="telefono_codeudor_uno" class="form-control" placeholder="Teléfono codeudor 1" value="<?php echo $telefono_codeudor_uno; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Dirección codeudor 1*</label>
                                                            <input type="text" name="direccion_codeudor_uno" id="direccion_codeudor_uno" class="form-control" placeholder="Dirección codeudor 1" value="<?php echo $direccion_codeudor_uno; ?>">
                                                        </div>

                                                        <hr>
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación codeudor 2*</label>
                                                            <input type="text" name="identificacion_codeudor_dos" id="identificacion_codeudor_dos" class="form-control" placeholder="Identificación codeudor 2" value="<?php echo $identificacion_codeudor_dos; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre codeudor 2*</label>
                                                            <input type="text" name="nombre_codeudor_dos" id="nombre_codeudor_dos" class="form-control" placeholder="Nombre codeudor 2" style="text-transform: capitalize;" value="<?php echo $nombre_codeudor_dos; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">E-mail codeudor 2*</label>
                                                            <input type="email" name="email_codeudor_dos" id="email_codeudor_dos" class="form-control" placeholder="Email codeudor 2" value="<?php echo $email_codeudor_dos; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono codeudor 2*</label>
                                                            <input type="text" name="telefono_codeudor_dos" id="telefono_codeudor_dos" class="form-control" placeholder="Teléfono codeudor 2" value="<?php echo $telefono_codeudor_dos; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Dirección codeudor 2*</label>
                                                            <input type="text" name="direccion_codeudor_dos" id="direccion_codeudor_dos" class="form-control" placeholder="Dirección codeudor 2" value="<?php echo $direccion_codeudor_dos; ?>">
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación codeudor 3*</label>
                                                            <input type="text" name="identificacion_codeudor_tres" id="identificacion_codeudor_tres" class="form-control" placeholder="Identificación codeudor 3" value="<?php echo $identificacion_codeudor_tres; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre codeudor 3*</label>
                                                            <input type="text" name="nombre_codeudor_tres" id="nombre_codeudor_tres" class="form-control" placeholder="Nombre codeudor 3" style="text-transform: capitalize;" value="<?php echo $nombre_codeudor_tres; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">E-mail codeudor 3*</label>
                                                            <input type="email" name="email_codeudor_tres" id="email_codeudor_tres" class="form-control" placeholder="Email codeudor 3" value="<?php echo $email_codeudor_dos; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono codeudor 3*</label>
                                                            <input type="text" name="telefono_codeudor_tres" id="telefono_codeudor_tres" class="form-control" placeholder="Teléfono codeudor 3" value="<?php echo $telefono_codeudor_tres; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Dirección codeudor 3*</label>
                                                            <input type="text" name="direccion_codeudor_tres" id="direccion_codeudor_tres" class="form-control" placeholder="Dirección codeudor 3" value="<?php echo $direccion_codeudor_tres; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="nav-fotos" role="tabpanel" aria-labelledby="nav-fotos-tab">
                                                <br>
                                                <div class="row">
                                                    <h3 class="text-center text-danger p-3"><b>TENGA EN CUENTA QUE SI
                                                            USTED VA ACTUALIZAR ALGUNA FOTO, DEBE ACTUALIZAR LAS 10 EN
                                                            TOTAL POR MOTIVOS DE SEGURIDAD PARA EL SISTEMA</b></h3>

                                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1 p-3">
                                                        <label style="color:#000">Foto 1*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto1; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto1; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 2*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto2; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen2" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto2; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 3*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto3; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen3" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto3; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 4*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto4; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen4" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto4; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 5*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto5; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen5" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto5; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1 p-3">
                                                        <label style="color:#000">Foto 6*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto6; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen6" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto6; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 7*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto7; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen7" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto7; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 8*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto8; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen8" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto8; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 9*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto9; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen9" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto9; ?>" />
                                                        </div>
                                                        <label style="color:#000">Foto 10*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="<?php echo $foto10; ?>" width="100px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen10" class="btn  w-80" style="background-color: #123960; color:#ffffff;" value="<?php echo $foto10; ?>" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">

                                        <div class="form-group">
                                            <input type="submit" name="updateProprieter" class="btn btn-outline-success" id="updateProprieter" value="Actualizar propietario">
                                            <a href="viewPropietarios.php" class="btn btn-outline-danger">Cancelar</a>

                                        </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>

            <footer class="footer">
                <?php include('footer.php'); ?>
            </footer>
        </div>


    </section>

    <script>
        $(document).ready(function() {

            $(".toastRetirado").toast('show');

        });
    </script>
    <script>
        $(document).ready(function() {
            $(".toastActualizado").toast('show');
        });
    </script>

</body>
<!-- Button trigger modal -->


<style>
    .container-fluid {
        margin-top: 1em;
    }


    .login__label {
        display: block;
        padding-left: 1rem;
    }

    .login__label,
    .login__label--checkbox {
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        font-size: .75rem;
        margin-bottom: 1rem;
    }

    .login__label--checkbox {
        display: inline-block;
        position: relative;
        padding-left: 1.5rem;
        margin-top: 2rem;
        margin-left: 1rem;
        color: #ffffff;
        font-size: .75rem;
        text-transform: inherit;
    }

    .login__input {
        color: white;
        font-size: 1.15rem;
        width: 100%;
        padding: .5rem 1rem;
        border: 2px solid transparent;
        outline: none;
        border-radius: 1.5rem;
        background-color: rgba(255, 255, 255, 0.25);
        letter-spacing: 1px;
    }

    .login__input:hover,
    .login__input:focus {
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
        background-color: transparent;
    }

    .login__input+.login__label {
        margin-top: 1.5rem;
    }

    .login__input--checkbox {
        position: absolute;
        top: .1rem;
        left: 0;
        margin: 0;
    }

    .login__submit {
        color: #ffffff;
        font-size: 1rem;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 1rem;
        padding: .75rem;
        border-radius: 2rem;
        display: block;
        width: 100%;
        background-color: rgba(17, 97, 237, .75);
        border: none;
        cursor: pointer;
    }

    .login__submit:hover {
        background-color: rgba(17, 97, 237, 1);
    }

    .login__forgot {
        display: block;
        margin-top: 3rem;
        text-align: center;
        color: rgba(255, 255, 255, 0.75);
        font-size: .75rem;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }

    .login__forgot:hover {
        color: rgb(17, 97, 237);
    }
</style>

<script>
    $(document).ready(function() {
        $(".toastPaciente").toast('show');
    });
</script>

<script>
    //SCRIPT DE RADIO BUTONS PARA SELECCIONAR LOS SERVICIOS PUBLICOS
    const radioButtons = document.querySelectorAll(
        'input[name="servicios_publicos"]');
    const valorSeleccionado = document.getElementById(
        'servicios_seleccionados');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', () => {
            valorSeleccionado.value += " " + radio
                .value;
        });
    });
</script>

<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- === El siguiente script se ejecuta consumiendo servicios directamente de internet === -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script type="text/javascript" src="js/departamentos_municipios_barrios.js?v=0.0.1"></script>

</html>