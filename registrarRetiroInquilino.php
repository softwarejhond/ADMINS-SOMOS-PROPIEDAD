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


                        <div class="p-3">

                            <h2>Registrar fecha para futuro retiro de inquilino</h2>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                    <div class="card text-center">
                                        <div class="card-header" style=" background-color: #123960; color:#ffffff">
                                            <i class="fas fa-home"></i> BUSCAR PROPIEDAD <i class="fas fa-home"></i>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="GET">
                                                <div class="input-group input-group-lg mb-3">
                                                    <input type="number" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                            echo $_GET['search'];
                                                                                                        } ?>" class="form-control text-center " placeholder="CODIGO DE LA PROPIEDAD">
                                                    <button type="submit" class="btn btn-lg" style=" background-color: #123960; color:#ffffff" title="Buscar propiedad"><i class="fa fa-search"></i></button>
                                                </div>
                                            </form>
                                            <div class="col-md-12">
                                                <form method="POST">
                                                    <?php
                                                    //AQUI INICIA EL PROCESO PARA BUSCAR LA PROPIEDAD, EL PROCESO ES SECUENCIAL, ES DECIR PRIMERO BUSCO LA PROPIEDAD Y LUEGO PUEDO SABER 
                                                    //CUENTA CON INQUILINO PARA RETIRARLO

                                                    $fecha_actual = date('Y-m-d');
                                                    if (isset($_GET['search'])) {
                                                        $filtervalues = $_GET['search'];
                                                        $query = "SELECT * FROM proprieter WHERE codigo LIKE '%$filtervalues%' LIMIT 1 ";
                                                        $query_run = mysqli_query($con, $query);

                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $items) {
                                                                $codigo = $items["codigo"];
                                                                $propietario = $items["nombre_propietario"];
                                                                $docInquilinos = $items["doc_inquilino"];
                                                                $nombreInquilinos = $items["nombre_inquilino"];
                                                                $telefonoInquilinos = $items["telefono_inquilino"];
                                                                $emailInquilinos = $items["email_inquilino"];


                                                                echo '
                                                <div class="card" style="width: 100%; border:0; color:#123960;     border: 2px solid #123960;">
                                                  <div class="row no-gutters">
                                                     <div class="col-md-12 col-sm-12 col-lg-6 text-center">
                                                        <img src="' . $items['foto1'] . '" alt="avatar" style="width:400px; height:400px"> 
                                                     </div>
                                                     <div class="col-md-12 col-sm-12 col-lg-6">
                                                       <div class="card-body text-left">
                                                         <h3 class="card-title"><b>Código propiedad: ' . $codigo . '</b></h3>
                                                         <h5 class="card-text" style="text-transform: capitalize;">Propietario: ' . $propietario . '</h5>
                                                         <h5 class="card-text">Identificación inquilino: ' . $docInquilinos . '</h5>
                                                         <h5 class="card-text"  style="text-transform: capitalize;">Nombre inquilino: ' . $nombreInquilinos . '</h5>
                                                         <h5 class="card-text">Teléfono inquilino: ' . $telefonoInquilinos . '</h5>
                                                         <h5 class="card-text">Email inquilino: ' . $emailInquilinos . '</h5>
                                                         </br>
                                                      
                                                         <h5>Acciones a realizar</h5>
                                                         <label>Selecciona la futura fecha de retiro del inquilino</label>
                                                         <td><td><input type="date" name="fechaRetiro" class="form-control text-center" min="' . $fecha_actual . '"></td></td>
                                                        <td><button type="submit" name="btnAddRetido"  title="Retirar Inquilino" onclick="return confirm(\'Esta seguro de retirar el inquilino ' . $nombreInquilinos . '?\')" class="btn red btn-lg w-100"><i class="fa-solid fa-floppy-disk"></i> REGISTRAR LOS DATOS PARA PROGRAMAR EL RETIRO DEL INQUILINO</button></td>
                                                         </br>
                                                         <p class="card-text"><small class="text-muted">Fecha actual para el registro: ' . $fecha_actual . '</small></p>
                                                       </div>
                                                    </div>
                                                 
                                                </div>
                                              </div>
                      
                                              ';
                                                    ?>
                                                </form>
                                            <?php
                                                            }
                                                        } else {
                                            ?>

                                            <tr>
                                                <td colspan="4">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    Propiedad no encontrada
                                                </td>
                                            </tr>
                                    <?php
                                                        }
                                                    }
                                    ?>

                                    <?php
                                    //AQUI INICIA EL PROCESO PARA GUARDAR LOS DATOS DENTRO DE LAS VARIABLES DESPUES DE HABERLAS BUSCADO
                                    if (isset($_POST['btnAddRetido'])) {

                                        $codigoPropiedad = $codigo; //Escanpando caracteres  
                                        $IdInquilino = $docInquilinos; //Escanpando caracteres 
                                        $NombreInquilino = $nombreInquilinos; //Escanpando caracteres 
                                        $telefonoInquilino = $telefonoInquilinos; //Escanpando caracteres 
                                        $emailInquilino = $emailInquilinos; //Escanpando caracteres 
                                        $fechaRetiro = mysqli_real_escape_string($con, (strip_tags($_POST["fechaRetiro"], ENT_QUOTES))); //Escanpando caracteres desde el formulario, este campo no lo traemos de la base de datos 
                                        $fechaRegistro = date('Y-m-d H:i:s'); // fecha actual para saber el momento y hora en que se realizo

                                        // Crear un arreglo de caracteres alfanuméricos
                                        $caracteres = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
                                        // Mezclar el arreglo
                                        shuffle($caracteres);
                                        // Seleccionar los primeros 8 caracteres (o la longitud que desees)
                                        $codigoAleatorio = array_slice($caracteres, 0, 8);
                                        // Convertir el arreglo en una cadena
                                        $codigoAleatorioString = implode("", $codigoAleatorio);

                                        $registro = $codigoAleatorioString;
                                        $insert = mysqli_query($con, "INSERT INTO retiredTenants(codigoPropiedad, IdInquilino, NombreInquilino,telefonoInquilino,emailInquilino,fechaRetiro,fechaRegistro,registro) VALUES 
                                    ('$codigoPropiedad','$IdInquilino','$NombreInquilino','$telefonoInquilino','$emailInquilino','$fechaRetiro','$fechaRegistro','$registro')");
                                        if ($insert) {
                                            echo '
                                <div class="toastRetiro" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastRetiro-body alert-success">
                                    <h5 class="p-3"> <b>La fecha del futuro retiro fue registrada con éxito </b></h5>
                               
                                </div>
                            </div>
                                   ';
                                        } else {
                                            echo '  <div class="toastRetiro" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastRetiro-body alert-danger">
                                    <h5 class="p-3"> <b>Error al registrar el futuro retiro, intenta de nuevo</b></h5>
                               
                                </div>
                            </div>
                                   ';
                                        }
                                    }
                                    //FINALIZA LA INSTRUCCIÓN DE GUARDAR LOS DATOS EN LA TABLA
                                    ?>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $(".toastRetiro").toast('show');
                                                });
                                            </script>
    </section>

</body>

<footer class="footer">
    <?php include('footer.php'); ?>
</footer>

</html>