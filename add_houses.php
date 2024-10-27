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

                        if (isset($_POST['addHouse'])) {
                            $tipoVivienda = mysqli_real_escape_string($con, (strip_tags($_POST["tipoVivienda"], ENT_QUOTES))); //Escanpando caracteres 
                            $codigo = mysqli_real_escape_string($con, (strip_tags($_POST["codigo"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES))); //Escanpando caracteres 
                            $valor = mysqli_real_escape_string($con, (strip_tags($_POST["valor"], ENT_QUOTES))); //Escanpando caracteres 
                            $ambientes = mysqli_real_escape_string($con, (strip_tags($_POST["ambientes"], ENT_QUOTES))); //Escanpando caracteres 
                            $banos = mysqli_real_escape_string($con, (strip_tags($_POST["banos"], ENT_QUOTES))); //Escanpando caracteres 
                            $dormitorios = mysqli_real_escape_string($con, (strip_tags($_POST["dormitorios"], ENT_QUOTES))); //Escanpando caracteres 
                            $cocina = mysqli_real_escape_string($con, (strip_tags($_POST["cocina"], ENT_QUOTES))); //Escanpando caracteres 
                            $parqueaderos = mysqli_real_escape_string($con, (strip_tags($_POST["parqueaderos"], ENT_QUOTES))); //Escanpando caracteres
                            $ropa = mysqli_real_escape_string($con, (strip_tags($_POST["ropa"], ENT_QUOTES))); //Escanpando caracteres 
                            $estrato = mysqli_real_escape_string($con, (strip_tags($_POST["estrato"], ENT_QUOTES))); //Escanpando caracteres 
                            $departamento = mysqli_real_escape_string($con, (strip_tags($_POST["departamento"], ENT_QUOTES))); //Escanpando caracteres 
                            $municipio = mysqli_real_escape_string($con, (strip_tags($_POST["municipio"], ENT_QUOTES))); //Escanpando caracteres 
                            $direccion = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES))); //Escanpando caracteres 
                            $barrio = mysqli_real_escape_string($con, (strip_tags($_POST["barrio"], ENT_QUOTES))); //Escanpando caracteres 
                            $area = mysqli_real_escape_string($con, (strip_tags($_POST["area"], ENT_QUOTES))); //Escanpando caracteres 
                            $descripcion = mysqli_real_escape_string($con, (strip_tags($_POST["descripcion"], ENT_QUOTES))); //Escanpando caracteres 
                            $video = mysqli_real_escape_string($con, (strip_tags($_POST["video"], ENT_QUOTES))); //Escanpando caracteres
                            $tour = mysqli_real_escape_string($con, (strip_tags($_POST["tour"], ENT_QUOTES))); //Escanpando caracteres  
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
                            $ruta10 = $ruta10 . "/" . $nombreimg6; ///images/nombre.jpg
                            move_uploaded_file($archivo10, $ruta10);

                            $dataTime = date("Y-m-d H:i:s");
                            $cek = mysqli_query($con, "SELECT * FROM houses WHERE codigo='$codigo'");
                            if (mysqli_num_rows($cek) == 0) {
                                $insert = mysqli_query($con, "INSERT INTO houses(tipoVivienda, 
                        codigo, nombre, valor, ambientes, banos, dormitorios,
                        cocina, parqueaderos, ropa, estrato,departamento,municipio,direccion,barrio, area,
                        descripcion,img1,img2,img3,img4,img5,img6,img7,img8,img9,img10,video,tour,fechaCreacionPatient) VALUES ('$tipoVivienda',
                        '$codigo','$nombre','$valor','$ambientes','$banos','$dormitorios','$cocina','$parqueaderos','$ropa',
                        '$estrato','$departamento','$municipio','$direccion','$barrio','$area','$descripcion','" . $ruta1 . "','" . $ruta2 . "','" . $ruta3 . "','" . $ruta4 . "',
                        '" . $ruta5 . "','" . $ruta6 . "','" . $ruta7 . "','" . $ruta8 . "','" . $ruta9 . "','" . $ruta10 . "','$video','$tour','$dataTime')");
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
                                    <h5> <b>Vivienda Registrada Correctamente</b></h5>
                               
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
                                    <h5> <b>Hubo problemas en el registro de la vivienda intenta nuevamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                                }
                            } else {
                                echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. el código de la vivienda ya existe!</div>';
                            }
                        }
                        ?>
                        <div class="container">
                            <br>
                            <h2>Añadir nueva propiedad</h2>
                            <p>Complete este formulario para registrar una nueva propiedad y publicarla. <br>
                                <b style="color:red">Todos los datos con * son obligatorios</b>
                            </p>

                            <form action="" method="post" class="was-validated" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">


                                        <div class="form-group">
                                            <label style="color:#000">Tipo de vivienda *</label>
                                            <select class="form-control" name="tipoVivienda" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="En Alquiler">En Alquiler</option>
                                                <option value="En Venta">En Venta</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#000">Código de la vivienda *</label>
                                            <input type="text" name="codigo" class="form-control" placeholder="Código de la propiedad" value="<?php echo $username; ?>" required="true">
                                            <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Titulo o nombre para la propiedad *</label>
                                            <input type="text" name="nombre" class="form-control" style="text-transform: capitalize;" placeholder="Nombre" required="true">
                                        </div>
                                        <label style="color:#000">Valor de la propiedad *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/house.png" width="24px" alt="price">
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="valor" placeholder="Valor de la propiedad" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>

                                        <label style="color:#000">Ambientes *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/playground.png" width="24px" alt="parque">
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="ambientes" placeholder="Ambientes" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Baños *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/toilet.png" width="24px" alt="cocina"> </span>
                                            </div>
                                            <input type="number" class="form-control" name="banos" placeholder="Baños" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Dormitorios *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/bed.png" width="24px" alt="dormitorio">
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="dormitorios" placeholder="Dormitorios" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Tipo de cocina *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/kitchen.png" width="24px" alt="cocina">
                                                </span>
                                            </div>
                                            <select class="form-control" name="cocina" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="Integral">Integral</option>
                                                <option value="Semi integral">Semi integral</option>
                                                <option value="No aplica">No aplica</option>
                                            </select>
                                        </div>
                                        <label style="color:#000">Parqueaderos *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/signage.png" width="24px" alt="parqueadero">
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="parqueaderos" placeholder="Parqueaderos" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Zona de ropa *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/ropa.png" width="24px" alt="Zona de ropa">
                                                </span>
                                            </div>
                                            <select class="form-control" name="ropa" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="Sí">Sí</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>

                                        <label style="color:#000">Estrato *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/level.png" width="24px" alt="estrato">
                                                </span>
                                            </div>
                                            <select class="form-control" name="estrato" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <label style="color:#000">Departamento *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/colombia.png" width="24px" alt="colombia">
                                                </span>
                                            </div>
                                            <select id="lista_departamento" name="departamento" class="form-control form-select-lg custom-selec text-bg-dark" required="true"></select>

                                        </div>
                                        <label style="color:#000">Municipio *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/map.png" width="24px" alt="mapa">
                                                </span>
                                            </div>
                                            <select id="municipios" name="municipio" class="form-control form-select-lg custom-selec text-bg-dark" required="true"></select>

                                        </div>
                                        <label style="color:#000">Dirección*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-map-marker" aria-hidden="true" style="font-size:24px"></i>

                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="direccion" placeholder="Dirección" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Barrio*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-globe" aria-hidden="true" style="font-size:24px"></i>

                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="barrio" placeholder="Barrio" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Área m² *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/area.png" width="24px" alt="area">
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="area" placeholder="Área m² " aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Descipción de la vivienda *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/description.png" width="24px" alt="parque">
                                                </span>
                                            </div>
                                            <textarea type="number" class="form-control" name="descripcion" placeholder="Descipción de la vivienda " aria-label="Username" aria-describedby="basic-addon1" required="true" rows="8"></textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">

                                        <label style="color:#000">Foto 1*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 2*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen2" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 3*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen3" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 4*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen4" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 5*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen5" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 6*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen6" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 7*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen7" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 8*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen8" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 9*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen9" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Foto 10*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen10" class="btn btn-info w-80" />
                                        </div>
                                        <label style="color:#000">Video *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-video-camera" aria-hidden="true" style="font-size:24px"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="video" placeholder="Video" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                        <label style="color:#000">Link del Tour 360 *</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-street-view" aria-hidden="true" style="font-size:24px"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="tour" placeholder="Tour 360" aria-label="Username" aria-describedby="basic-addon1" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">

                                        <div class="form-group">
                                            <input type="submit" name="addHouse" class="btn btn-outline-success" value="Registrar vivienda" require>
                                            <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                        </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        

    </section><footer class="footer">
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- === El siguiente script se ejecuta consumiendo servicios directamente de internet === -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script type="text/javascript" src="js/index.js"></script>

</html>