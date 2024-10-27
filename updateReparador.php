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
</head>
<?php include('nav2.php');?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 ">
                <?php //muy importante
                    include("txtBanner.php");?>
                    <div class="p-3">
                    
                        <div class="">

                            <!--ACTUALIZAR DATOS USUARIO-->
                            <?php
          $usaurio= htmlspecialchars($_SESSION["username"]);
			if(isset($_POST['btnUpdateReparadores'])){
                $identificacion = mysqli_real_escape_string($con,(strip_tags($_POST["identificacion"],ENT_QUOTES)));//Escanpando caracteres 
                $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
                $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres  
                $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
                $profesion = mysqli_real_escape_string($con,(strip_tags($_POST["profesion"],ENT_QUOTES)));//Escanpando caracteres 
                $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres

                              $update = mysqli_query($con, "UPDATE repairmen SET identificacion='$identificacion',
                               nombre='$nombre', telefono='$telefono', email='$email', profesion='$profesion',
                               estado='$estado' WHERE identificacion=$identificacion");
                              if ($update) {
                                  echo '<div class="alert alert-success alert-dismissable text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos se han actualizado y guardado con éxito.<br> <a href="viewReparadores.php" type="button" class="alert alert-warning"><i class="bi bi-skip-backward-fill"></i> REGRESAR AL LISTADO DE REPARADORES</a></div>';
                                  header("location: viewReparadores.php");
                              } else {
                                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
                              }
                      }
			                ?>

                            <h2 class="text-center"><i class="fa-solid fa-pen-to-square"></i> Actualizar información del reparador</h2>
                            <p class="text-center text-danger"><b>La identificación de esta reparación no se puede actualziar por motivos segurdidad con la información</b></p>

                            <div >
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 ">
                                    <div class="row text-center">

                                        <div class="col-lg-12 col-md-8 col-sm-12 px-2 mt-1 d-flex justify-content-center align-items-center">

                                            <!--Actualizar datos usuario-->
                                            <?php
                                             $usaurio= htmlspecialchars($_SESSION["username"]);
                                             $nik = mysqli_real_escape_string( $con, ( strip_tags( $_GET['nik'], ENT_QUOTES ) ) );
                                             $query = mysqli_query($con,"SELECT * FROM repairmen WHERE identificacion=$nik");
                                             while ($userLog = mysqli_fetch_array($query)) {
                                              $identificacion= $userLog['identificacion'];
                                              $nombre= $userLog['nombre'];
                                              $telefono= $userLog['telefono'];
                                              $email= $userLog['email'];
                                              $profesion= $userLog['profesion'];
                                              $estado= $userLog['estado'];
                                              }
                                            ?>
                                            <form method="POST" class="was-validated">
                                                <div class="modal-body text-left bg-light shadow p-3 mb-5 bg-white rounded">
                                                    <label style="color:#000" class="text-left">Identificación *<br>
                                                      </label><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="bi bi-person-vcard"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="identificacion" class="form-control"
                                                            placeholder="Identificación"
                                                            style="text-transform: capitalize;"
                                                            value="<?php echo $identificacion;?>" required="true" readonly>

                                                    </div>
                                                    <label style="color:#000" class="text-left">Nombre completo
                                                        *</label><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="bi bi-person-fill-check"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="nombre" class="form-control"
                                                            placeholder="Nombre completo"
                                                            style="text-transform: capitalize;"
                                                            value="<?php echo $nombre;?>" required="true" >
                                                    </div>
                                                    <label style="color:#000" class="text-left">Teléfono *</label><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="bi bi-telephone-fill"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="telefono" class="form-control"
                                                            placeholder="Teléfono" value="<?php echo $telefono;?>"
                                                            style="text-transform: capitalize;" required="true" >

                                                    </div>
                                                    <label style="color:#000" class="text-left">Correo electrónico
                                                        *</label><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" value="<?php echo $email;?>"
                                                                id="basic-addon1">
                                                                <i class="bi bi-envelope-at-fill"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            placeholder="Correo electrónico"
                                                            value="<?php echo $email;?>" required="true" >

                                                    </div>
                                                    <label style="color:#000" class="text-left">Seleccione la profesión
                                                        *</label><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="bi bi-wrench-adjustable"></i>
                                                            </span>
                                                        </div>
                                                        <select name="profesion"
                                                            class="form-control form-select-lg custom-selec text-bg-dark"
                                                            required="true" >
                                                            <option value="<?php echo $profesion;?>">
                                                                <?php echo $profesion;?></option>
                                                            <option value="Aseo">Aseo</option>
                                                            <option value="Ayudante en casa">Ayudante en casa</option>
                                                            <option value="Electricista">Electricista</option>
                                                            <option value="Plomero">Plomero</option>
                                                            <option value="Maestro de obra">Maestro de obra</option>
                                                            <option value="Limpieza de muebles">Limpieza de muebles
                                                            </option>
                                                            <option value="Limpieza de vidrios y ventanas">Limpieza de
                                                                vidrios y ventanas</option>
                                                            <option value="Limpieza de colchones">Limpieza de colchones
                                                            </option>
                                                            <option value="Limpieza de cortinas">Limpieza de cortinas
                                                            </option>
                                                            <option value="Técnico en lavadoras">Técnico en lavadoras
                                                            </option>
                                                            <option value="Técnico en neveras y refrigeradores">Técnico
                                                                en neveras y refrigeradores</option>

                                                        </select>

                                                    </div>
                                                    <label style="color:#000" class="text-left">Estado
                                                        actual*</label><br>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="bi bi-stoplights-fill"></i>
                                                            </span>
                                                        </div>

                                                        <select name="estado"
                                                            class="form-control form-select-lg custom-selec text-bg-dark"
                                                            required="true" >
                                                            <option value="<?php echo $estado;?>"><?php echo $estado;?>
                                                            </option>
                                                            <option value="ACTIVO">ACTIVO</option>
                                                            <option value="INACTIVO">INACTIVO</option>


                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                    <input type="submit" class="btn btn-outline-success"
                                                        value="Actualizar datos" name="btnUpdateReparadores" >
                                                    <a class="btn btn-outline-danger" href="viewReparadores.php">Cancelar</a>
                                                </div>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>
    </section>
</body>

</html>