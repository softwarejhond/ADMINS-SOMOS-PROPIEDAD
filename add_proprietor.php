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
                    <?php //muy importante
                    include("txtBanner.php");
                    ?>
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">

                        <?php
                        if (isset($_POST['addProprieter'])) {
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
                            $zonaRopa = mysqli_real_escape_string($con, (strip_tags($_POST["zonaRopa"], ENT_QUOTES))); //Escanpando caracteres 
                            $vista = mysqli_real_escape_string($con, (strip_tags($_POST["vista"], ENT_QUOTES))); //Escanpando caracteres 
                            $servicios_publicos = mysqli_real_escape_string($con, (strip_tags($_POST["servicios_seleccionados"], ENT_QUOTES))); //Escanpando caracteres 
                            $otras_caracteristicas = mysqli_real_escape_string($con, (strip_tags($_POST["otras_caracteristicas"], ENT_QUOTES))); //Escanpando caracteres 
                            $direccion = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefonoInmueble = mysqli_real_escape_string($con, (strip_tags($_POST["telefonoInmueble"], ENT_QUOTES))); //Escanpando caracteres
                            $valor = mysqli_real_escape_string($con, (strip_tags($_POST["valor"], ENT_QUOTES))); //Escanpando caracteres
                            $identificacion_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_propietario"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_propietario"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefono_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_propietario"], ENT_QUOTES))); //Escanpando caracteres 
                            $banco = mysqli_real_escape_string($con, (strip_tags($_POST["banco"], ENT_QUOTES))); //Escanpando caracteres 
                            $tipoCuenta = mysqli_real_escape_string($con, (strip_tags($_POST["tipoCuenta"], ENT_QUOTES))); //Escanpando caracteres 
                            $numeroCuenta = mysqli_real_escape_string($con, (strip_tags($_POST["numeroCuenta"], ENT_QUOTES))); //Escanpando caracteres 
                            $diaPago = mysqli_real_escape_string($con, (strip_tags($_POST["diaPago"], ENT_QUOTES))); //Escanpando caracteres 
                            $identificacion_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefono_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["telefono_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $email_inquilino = mysqli_real_escape_string($con, (strip_tags($_POST["email_inquilino"], ENT_QUOTES))); //Escanpando caracteres 
                            $fecha = mysqli_real_escape_string($con, (strip_tags($_POST["fecha"], ENT_QUOTES))); //Escanpando caracteres 
                            $descuento = mysqli_real_escape_string($con, (strip_tags($_POST["descuento"], ENT_QUOTES))); //Escanpando caracteres
                            $iva = mysqli_real_escape_string($con, (strip_tags($_POST["iva"], ENT_QUOTES))); //Escanpando caracteres
                            $epm = mysqli_real_escape_string($con, (strip_tags($_POST["epm"], ENT_QUOTES))); //Escanpando caracteres
                            $comision = mysqli_real_escape_string($con, (strip_tags($_POST["comision"], ENT_QUOTES))); //Escanpando caracteres
                            $catastro = mysqli_real_escape_string($con, (strip_tags($_POST["catastro"], ENT_QUOTES))); //Escanpando caracteres
                            $asistencia = mysqli_real_escape_string($con, (strip_tags($_POST["asistencia"], ENT_QUOTES))); //Escanpando caracteres
                            $condicion = mysqli_real_escape_string($con, (strip_tags($_POST["condicion"], ENT_QUOTES))); //Escanpando caracteres
                            $identificacion_codeudor_uno = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_codeudor_uno"], ENT_QUOTES))); //Escanpando caracteres
                            $nombre_codeudor_uno = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_codeudor_uno"], ENT_QUOTES))); //Escanpando caracteres
                            $identificacion_codeudor_dos = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_codeudor_dos"], ENT_QUOTES))); //Escanpando caracteres
                            $nombre_codeudor_dos = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_codeudor_dos"], ENT_QUOTES))); //Escanpando caracteres
                            $identificacion_codeudor_tres = mysqli_real_escape_string($con, (strip_tags($_POST["identificacion_codeudor_tres"], ENT_QUOTES))); //Escanpando caracteres
                            $nombre_codeudor_tres = mysqli_real_escape_string($con, (strip_tags($_POST["nombre_codeudor_tres"], ENT_QUOTES))); //Escanpando caracteres
                            $estado = "ACTIVO";
                            //MUY IMPORTANTE EL CODIGO A CONTINUACION PARA SUBIR LAS IMAGENES EL FORM DEBE TENER enctype="multipart/form-data"
                            //carga de la imagen 1
                            $nombreimg1 = $_FILES['imagen']['name']; //obtiene el nombre
                            $archivo1 = $_FILES['imagen']['tmp_name']; //contiene el archivo
                            $ruta1 = "images/imagenesSubidas";
                            $ruta1 = $ruta1 . "/" . $nombreimg1; ///images/nombre.jpg
                            move_uploaded_file($archivo1, $ruta1);
                            //carga de la imagen 2
                            $nombreimg2 = $_FILES['imagen2']['name']; //obtiene el nombre
                            $archivo2 = $_FILES['imagen2']['tmp_name']; //contiene el archivo
                            $ruta2 = "images/imagenesSubidas";
                            $ruta2 = $ruta2 . "/" . $nombreimg2; ///images/nombre.jpg
                            move_uploaded_file($archivo2, $ruta2);
                            //carga de la imagen 3
                            $nombreimg3 = $_FILES['imagen3']['name']; //obtiene el nombre
                            $archivo3 = $_FILES['imagen3']['tmp_name']; //contiene el archivo
                            $ruta3 = "images/imagenesSubidas";
                            $ruta3 = $ruta3 . "/" . $nombreimg3; ///images/nombre.jpg
                            move_uploaded_file($archivo3, $ruta3);
                            //carga de la imagen 4
                            $nombreimg4 = $_FILES['imagen4']['name']; //obtiene el nombre
                            $archivo4 = $_FILES['imagen4']['tmp_name']; //contiene el archivo
                            $ruta4 = "images/imagenesSubidas";
                            $ruta4 = $ruta4 . "/" . $nombreimg4; ///images/nombre.jpg
                            move_uploaded_file($archivo4, $ruta4);
                            //carga de la imagen 5
                            $nombreimg5 = $_FILES['imagen5']['name']; //obtiene el nombre
                            $archivo5 = $_FILES['imagen5']['tmp_name']; //contiene el archivo
                            $ruta5 = "images/imagenesSubidas";
                            $ruta5 = $ruta5 . "/" . $nombreimg5; ///images/nombre.jpg
                            move_uploaded_file($archivo5, $ruta5);
                            //carga de la imagen 6
                            $nombreimg6 = $_FILES['imagen6']['name']; //obtiene el nombre
                            $archivo6 = $_FILES['imagen6']['tmp_name']; //contiene el archivo
                            $ruta6 = "images/imagenesSubidas";
                            $ruta6 = $ruta6 . "/" . $nombreimg6; ///images/nombre.jpg
                            move_uploaded_file($archivo6, $ruta6);
                            //carga de la imagen 7
                            $nombreimg7 = $_FILES['imagen7']['name']; //obtiene el nombre
                            $archivo7 = $_FILES['imagen7']['tmp_name']; //contiene el archivo
                            $ruta7 = "images/imagenesSubidas";
                            $ruta7 = $ruta7 . "/" . $nombreimg7; ///images/nombre.jpg
                            move_uploaded_file($archivo7, $ruta7);
                            //carga de la imagen 8
                            $nombreimg8 = $_FILES['imagen8']['name']; //obtiene el nombre
                            $archivo8 = $_FILES['imagen8']['tmp_name']; //contiene el archivo
                            $ruta8 = "images/imagenesSubidas";
                            $ruta8 = $ruta8 . "/" . $nombreimg8; ///images/nombre.jpg
                            move_uploaded_file($archivo8, $ruta8);
                            //carga de la imagen 9
                            $nombreimg9 = $_FILES['imagen9']['name']; //obtiene el nombre
                            $archivo9 = $_FILES['imagen9']['tmp_name']; //contiene el archivo
                            $ruta9 = "images/imagenesSubidas";
                            $ruta9 = $ruta9 . "/" . $nombreimg9; ///images/nombre.jpg
                            move_uploaded_file($archivo9, $ruta9);
                            //carga de la imagen 10
                            $nombreimg10 = $_FILES['imagen10']['name']; //obtiene el nombre
                            $archivo10 = $_FILES['imagen10']['tmp_name']; //contiene el archivo
                            $ruta10 = "images/imagenesSubidas";
                            $ruta10 = $ruta10 . "/" . $nombreimg10; ///images/nombre.jpg
                            move_uploaded_file($archivo10, $ruta10);
                            $dataTime = date("Y-m-d");

                            $cek = mysqli_query($con, "SELECT * FROM proprieter WHERE codigo='$codigo'");
                            if (mysqli_num_rows($cek) == 0) {
                                $insert = mysqli_query(
                                    $con,
                                    "INSERT INTO proprieter(
                            v,codigo,tipoInmueble,nombre,nivel_piso,area,estrato,Municipio,Barrio,terraza,ascensor,patio,parqueadero,cuarto_util,alcobas,closet,sala,sala_comedor,comedor,cocina,servicios,CuartoServicios,
                            ZonaRopa,vista,servicios_publicos,otras_caracteristicas,direccion,TelefonoInmueble,valor_canon,doc_propietario,nombre_propietario,telefono_propietario,banco,tipoCuenta,numeroCuenta,diaPago,doc_inquilino,
                            nombre_inquilino,telefono_inquilino,email_inquilino,fecha,descuento,iva,contrato_EPM,comision,aval_catastro,asistencia,
                            cc_codeudor_uno,nombre_codeudor_uno,cc_codeudor_dos,nombre_codeudor_dos,cc_codeudor_tres,nombre_codeudor_tres,estadoPropietario,foto1,foto2,foto3,foto4,foto5,foto6,foto7,foto8,foto9,foto10,condicion,fecha_creacion
                        ) VALUES (
                            '$v','$codigo','$tipo_vivienda','$nombre','$nivel_piso','$area','$estrato','$municipio','$barrio','$terraza','$ascensor','$patio','$parqueadero','$cuarto_util','$habitaciones','$closets','$sala',
                            '$sala_comedor','$comedor','$cocina','$servicios','$cuartoServicios','$zonaRopa','$vista','$servicios_publicos','$otras_caracteristicas','$direccion','$telefonoInmueble','$valor',
                            '$identificacion_propietario','$nombre_propietario','$telefono_propietario','$banco','$tipoCuenta','$numeroCuenta','$diaPago','$identificacion_inquilino',
                            '$nombre_inquilino','$telefono_inquilino','$email_inquilino','$fecha','$descuento','$iva','$epm','$comision',
                            '$catastro','$asistencia','$identificacion_codeudor_uno','$nombre_codeudor_uno','$identificacion_codeudor_dos',
                            '$nombre_codeudor_dos','$identificacion_codeudor_tres','$nombre_codeudor_tres','$estado','" . $ruta1 . "','" . $ruta2 . "','" . $ruta3 . "','" . $ruta4 . "',
                        '" . $ruta5 . "','" . $ruta6 . "','" . $ruta7 . "','" . $ruta8 . "','" . $ruta9 . "','" . $ruta10 . "','$condicion','$dataTime')"

                                );
                                if ($insert) {
                                    echo '
                            <div class="toastPaciente" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastPaciente-body alert-success">
                                    <h5> <b>Propietario Registrado Correctamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                                } else {
                                    echo '
                            <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header  ">
                                    <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body alert-danger">
                                    <h5> <b>Hubo problemas en el registro del propietario, intenta nuevamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                                }
                            } else {
                                echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Error. El código de la vivienda ya existe!</b></div>';
                            }
                        }
                        ?>
                        <div class="p-3">
                            <br>
                            <h2>Añadir nuevo propietario</h2>
                            <p>Complete este formulario para registrar una nuevo propietario. <br>
                                <b style="color:red">Todos los campos en rojo son obligatorios</b>
                            </p>

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
                                                    Otros
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
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="v" id="y" value="Y" required="true">
                                                                <label class="form-check-label" for="y">Y</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="v" id="h" value="H" required="true">
                                                                <label class="form-check-label" for="h">H</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="v" id="v" value="V" required="true">
                                                                <label class="form-check-label" for="v">V</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label style="color:#000">Código de la vivienda *</label>
                                                            <input type="text" name="codigo" class="form-control" placeholder="Código de la propiedad" value="<?php echo $username; ?>" required="true">
                                                            <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Tipo de vivienda *</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Casa" value="Casa" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Casa">Casa</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Apartamento" value="Apartamento" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Apartamento">Apartamento</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Local" value="Local" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Local">Local</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Local" value="Apartaestudio" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Local">Apartaestudio</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Local" value="Penthouse" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Local">Penthouse</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Local" value="Finca" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Local">Finca</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Local" value="Casa con local" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Local">Casa con local</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipo_vivienda" id="Local" value="LOTE" style="text-transform: capitalize;" required="true">
                                                                <label class="form-check-label" for="Local">Lote</label>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Titulo o nombre para la propiedad
                                                                *</label>
                                                            <input type="text" name="nombre" class="form-control" style="text-transform: capitalize;" placeholder="Nombre" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nivel de piso *</label>

                                                            <select multiple class="form-control" id="exampleFormControlSelect2" name="nivel_piso" required="true">
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
                                                        <label style="color:#000">Área m² *</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control" name="area" placeholder="Área m² " aria-label="Username" aria-describedby="basic-addon1" required="true">
                                                        </div>

                                                        <div class="form-group">
                                                            <label style="color:#000">Estrato *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="estrato" id="1" value="1" required="true">
                                                                <label class="form-check-label" for="1">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="estrato" id="2" value="2" required="true">
                                                                <label class="form-check-label" for="2">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="estrato" id="3" value="3" required="true">
                                                                <label class="form-check-label" for="3">3<label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="estrato" id="4" value="4" required="true">
                                                                <label class="form-check-label" for="4">4</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="estrato" id="5" value="5" required="true">
                                                                <label class="form-check-label" for="5">5</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="estrato" id="6" value="6" required="true">
                                                                <label class="form-check-label" for="6">6</label>
                                                            </div>
                                                        </div>
                                                        <label style="color:#000">Departamento, *</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/colombia.png" width="24px" alt="colombia">
                                                                </span>
                                                            </div>
                                                            <select id="lista_departamento" name="departamento" class="form-control form-select-lg custom-selec text-bg-dark" required="true"></select>

                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/map.png" width="24px" alt="mapa">
                                                                </span>
                                                            </div>
                                                            <select id="municipios" name="municipio" class="form-control form-select-lg custom-selec text-bg-dark" required="true"></select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/playground.png" width="24px" alt="barrio">
                                                                </span>
                                                            </div>
                                                            <select id="barrios" name="barrio" class="form-control form-select-lg custom-selec text-bg-dark" required="true"></select>

                                                        </div>
                                                        <div class="form-group">
                                                            <!--Terraza-->
                                                            <label style="color:#000">Terraza: *</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="terraza" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="terraza" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                            <!--Ascensor-->
                                                            <label style="color:#000">Ascensor: *</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="ascensor" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="ascensor" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                            <!--patio-->
                                                            <label style="color:#000">Patio: *</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="patio" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="patio" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <!--Parqueadero-->
                                                            <label style="color:#000">Parqueadero: *</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="parqueadero" id="Privado" value="Privado" required="true">
                                                                <label class="form-check-label" for="Privado">Privado</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="parqueadero" id="Publico" value="Público" required="true">
                                                                <label class="form-check-label" for="Publico">Público</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="parqueadero" id="No" value="Sin parqueadero" required="true">
                                                                <label class="form-check-label" for="No">Sin parqueadero</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <!--Cuarto util-->
                                                            <label style="color:#000">Cuarto útil: *</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cuarto_util" id="Si" value="Sí" required="true">
                                                                <label class="form-check-label" for="Si">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cuarto_util" id="NO" value="NO" required="true">
                                                                <label class="form-check-label" for="NO">NO</label>
                                                            </div>
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
                                                            <label style="color:#000">Habitaciones *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="0" value="0" required="true">
                                                                <label class="form-check-label" for="0">0</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="1" value="1" required="true">
                                                                <label class="form-check-label" for="1">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="2" value="2" required="true">
                                                                <label class="form-check-label" for="2">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="3" value="3" required="true">
                                                                <label class="form-check-label" for="3">3<label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="4" value="4" required="true">
                                                                <label class="form-check-label" for="4">4</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="5" value="5" required="true">
                                                                <label class="form-check-label" for="5">5</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="6" value="6" required="true">
                                                                <label class="form-check-label" for="6">6</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="7" value="7" required="true">
                                                                <label class="form-check-label" for="67">7</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="8" value="8" required="true">
                                                                <label class="form-check-label" for="8">8</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="9" value="9" required="true">
                                                                <label class="form-check-label" for="9">9</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="habitaciones" id="10" value="10" required="true">
                                                                <label class="form-check-label" for="10">10</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Closets *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="0" value="0" required="true">
                                                                <label class="form-check-label" for="0">0</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="1" value="1" required="true">
                                                                <label class="form-check-label" for="1">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="2" value="2" required="true">
                                                                <label class="form-check-label" for="2">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="3" value="3" required="true">
                                                                <label class="form-check-label" for="3">3<label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="4" value="4" required="true">
                                                                <label class="form-check-label" for="4">4</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="5" value="5" required="true">
                                                                <label class="form-check-label" for="5">5</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="6" value="6" required="true">
                                                                <label class="form-check-label" for="6">6</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="7" value="7" required="true">
                                                                <label class="form-check-label" for="67">7</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="8" value="8" required="true">
                                                                <label class="form-check-label" for="8">8</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="9" value="9" required="true">
                                                                <label class="form-check-label" for="9">9</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="closets" id="10" value="10" required="true">
                                                                <label class="form-check-label" for="10">10</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Sala *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sala" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sala" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Comedor *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="comedor" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="comedor" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Sala comedor *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sala_comedor" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sala_comedor" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-lg-4 col-md-12col-sm-12">
                                                        <br>
                                                        <div class="form-group">
                                                            <label style="color:#000">Cocina *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cocina" id="integral" value="Integral" required="true">
                                                                <label class="form-check-label" for="integral">Integral</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cocina" id="semi-integral" value="Semi-integral" required="true">
                                                                <label class="form-check-label" for="semi-integral">Semi-integral</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cocina" id="enchapada" value="Enchapada" required="true">
                                                                <label class="form-check-label" for="enchapada">Enchapada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cocina" id="basica" value="Basica" required="true">
                                                                <label class="form-check-label" for="basica">Basica</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cocina" id="Noaplica" value="No aplica" required="true">
                                                                <label class="form-check-label" for="Noaplica">No
                                                                    aplica</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Baños *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="servicios" id="1" value="1" required="true">
                                                                <label class="form-check-label" for="1">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="servicios" id="2" value="2" required="true">
                                                                <label class="form-check-label" for="2">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="servicios" id="3" value="3" required="true">
                                                                <label class="form-check-label" for="3">3</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="servicios" id="4" value="4" required="true">
                                                                <label class="form-check-label" for="4">4</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="servicios" id="5" value="5" required="true">
                                                                <label class="form-check-label" for="5">5</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Cuarto de servicios *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cuartoServicios" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="cuartoServicios" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Zona de ropa *</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zonaRopa" id="si" value="SÍ" required="true">
                                                                <label class="form-check-label" for="si">SÍ</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zonaRopa" id="no" value="NO" required="true">
                                                                <label class="form-check-label" for="no">NO</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Tipo de vista *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="vista" required="true">
                                                                <option value="">Seleccionar opción</option>
                                                                <option value="VENTANA">VENTANA</option>
                                                                <option value="VENTANAL">VENTANAL</option>
                                                                <option value="BALCÓN">BALCÓN</option>
                                                                <option value="APARTAMENTO INTERTO">APARTAMENTO INTERNO</option>
                                                                <option value="SOTANO">SOTANO</option>
                                                                <option value="FINCA">FINCA</option>
                                                                <option value="LOTE">LOTE</option>
                                                                <option value="PUERTA GARAJE">PUERTA GARAJE</option>
                                                                <option value="PUERTA ENROLLABLE">PUERTA ENROLLABLE</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col col-lg-4 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label style="color:#000">Servicios públicos *</label><br>
                                                            <input class="form-control w-100" type="text" id="servicios_seleccionados" name="servicios_seleccionados" required="true">
                                                            <span>Servicios seleccionados</span>
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
                                                            <textarea name="otras_caracteristicas" rows="10" cols="50" required="true"></textarea>
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
                                                            <input type="text" name="direccion" class="form-control" style="text-transform: capitalize;" placeholder="Dirección" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono del inmueble
                                                                *</label>
                                                            <input type="text" name="telefonoInmueble" class="form-control" placeholder="Teléfono del inmueble" minlength="10" maxlength="10" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Valor canon
                                                                *</label>
                                                            <input type="text" name="valor" class="form-control" placeholder="Valor canon" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación del propietario
                                                                *</label>
                                                            <input type="number" name="identificacion_propietario" class="form-control" style="text-transform: uppercase;" placeholder="Identificación del propietario" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre del propietario *</label>
                                                            <input type="text" name="nombre_propietario" class="form-control" style="text-transform: capitalize;" placeholder="Nombre del propietario" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono del propietario *</label>
                                                            <input type="text" name="telefono_propietario" class="form-control" placeholder="Teléfono del propietario" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Banco *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="banco">
                                                                <option value="">Seleccionar opción</option>
                                                                <option value="Cooperativa Financiera de Antioquia">Cooperativa Financiera de Antioquia</option>
                                                                <option value="Cotrafa">Cotrafa</option>
                                                                <option value="Banco Agrario">Banco Agrario</option>
                                                                <option value="ITAU">ITAU</option>
                                                                <option value="Bancolombia">Bancolombia</option>
                                                                <option value="Nequi">Nequi</option>
                                                                <option value="Daviplata">Daviplata</option>
                                                                <option value="Banco de Bogotá">Banco de Bogotá</option>
                                                                <option value="Davivienda">Davivienda</option>
                                                                <option value="BBVA">BBVA</option>
                                                                <option value="Banco de Occidente">Banco de Occidente</option>
                                                                <option value="Scotibank Colpatria">Scotibank Colpatria</option>
                                                                <option value="Banco Itaú">Banco Itaú</option>
                                                                <option value="GNB Sudameris">GNB Sudameris</option>
                                                                <option value="Banco Agrario">Banco Agrario</option>
                                                                <option value="Banco Popular">Banco Popular</option>
                                                                <option value="Banco Caja Social">Banco Caja Social</option>
                                                                <option value="Banco AV Villas">Banco AV Villas</option>
                                                                <option value="Banco Union">Banco Union</option>
                                                                <option value="Bancoomeva">Bancoomeva</option>
                                                                <option value="Banco Falabella">Banco Falabella</option>
                                                                <option value="Banco Pichincha">Banco Pichincha</option>
                                                                <option value="Banco W">Banco W</option>
                                                                <option value="Banco Finandina">Banco Finandina</option>
                                                                <option value="Bancamía">Bancamía</option>
                                                                <option value="Banco Credifinanciera">Banco Credifinanciera</option>
                                                                <option value="Banco Cooperativo Coopcentral">Banco Cooperativo Coopcentral</option>
                                                                <option value="Bancoldex">Bancoldex</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 col-sm-12">

                                                        <div class="form-group">
                                                            <label style="color:#000">Tipo de cuenta *</label>

                                                            <select class="form-control" id="exampleFormControlSelect2" name="tipoCuenta">
                                                                <option value="">Seleccionar opción</option>
                                                                <option value="Cuenta de ahorro">Cuenta de ahorro</option>
                                                                <option value="Cuenta corriente">Cuenta corriente</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Número de cuenta
                                                                *</label>
                                                            <input type="number" name="numeroCuenta" class="form-control" placeholder="Número de cuenta bancaria">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Día de pago
                                                                *</label>
                                                            <input type="number" name="diaPago" class="form-control" placeholder="Día de pago">
                                                        </div>
                                                        <!--inquilino-->
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación del inquilino
                                                                *</label>
                                                            <input type="text" name="identificacion_inquilino" class="form-control" style="text-transform: uppercase;" placeholder="Identificación del inquilino">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre del inquilino *</label>
                                                            <input type="text" name="nombre_inquilino" class="form-control" style="text-transform: capitalize;" placeholder="Nombre del inquilino">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Teléfono del inquilino *</label>
                                                            <input type="text" name="telefono_inquilino" class="form-control" placeholder="Teléfono del inquilino">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Email del inquilino *</label>
                                                            <input type="email" name="email_inquilino" class="form-control" placeholder="Email del inquilino">
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
                                                            <label style="color:#000">Fecha *</label>
                                                            <input type="date" name="fecha" class="form-control" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Descuento *</label>
                                                            <input type="text" name="descuento" class="form-control" placeholder="Descuento" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">IVA *</label>
                                                            <input type="number" name="iva" class="form-control" placeholder="IVA" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Contrato EPM *</label>
                                                            <input type="number" name="epm" class="form-control" placeholder="Contrato EPM" required="true">
                                                        </div>

                                                    </div>
                                                    <div class="col col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label style="color:#000">Comisión *</label>
                                                            <input type="text" name="comision" class="form-control" placeholder="Comisión" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Aval Catastro *</label>
                                                            <input type="text" name="catastro" class="form-control" placeholder="Aval Catastro" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Asistencia *</label>
                                                            <input type="text" name="asistencia" class="form-control" placeholder="Asistencia" required="true">
                                                        </div>
                                                        <label style="color:#000">Condición de la vivienda *</label><br>
                                                        <div class="input-group">

                                                            <select name="condicion" class="form-control form-select-lg custom-selec text-bg-dark" required="true">
                                                                <option value="">SELECCIONAR</option>
                                                                <option value="EN ALQUILER">EN ALQUILER</option>
                                                                <option value="EN VENTA">EN VENTA</option>
                                                                <option value="ALQUILER O VENTA">ALQUILER O VENTA</option>
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
                                                            <input type="text" name="identificacion_codeudor_uno" class="form-control" placeholder="Identificación codeudor 1" style="text-transform: uppercase;">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre codeudor 1*</label>
                                                            <input type="text" name="nombre_codeudor_uno" class="form-control" placeholder="Nombre codeudor 1" style="text-transform: capitalize;">
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación codeudor 2*</label>
                                                            <input type="text" name="identificacion_codeudor_dos" class="form-control" placeholder="Identificación codeudor 2" style="text-transform: uppercase;">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre codeudor 2*</label>
                                                            <input type="text" name="nombre_codeudor_dos" class="form-control" placeholder="Nombre codeudor 2" style="text-transform: capitalize;">
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label style="color:#000">Identificación codeudor 3*</label>
                                                            <input type="text" name="identificacion_codeudor_tres" class="form-control" placeholder="Identificación codeudor 3" style="text-transform: uppercase;">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:#000">Nombre codeudor 3*</label>
                                                            <input type="text" name="nombre_codeudor_tres" class="form-control" placeholder="Nombre codeudor 3" style="text-transform: capitalize;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="nav-fotos" role="tabpanel" aria-labelledby="nav-fotos-tab">
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1 p-3">

                                                        <label style="color:#000">Foto 1*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 2*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen2" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 3*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen3" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 4*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen4" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 5*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen5" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1 p-3">
                                                        <label style="color:#000">Foto 6*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen6" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 7*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen7" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 8*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen8" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 9*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen9" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>
                                                        <label style="color:#000">Foto 10*</label><br>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                                </span>
                                                            </div>
                                                            <input type="file" name="imagen10" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">

                                            <div class="form-group">
                                                <input type="submit" name="addProprieter" class="btn btn-outline-success" value="Registrar propietario">
                                                <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                            </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

        </div>


    </section>
    <footer class="footer">
        <?php include('footer.php'); ?>
    </footer>
</body>
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