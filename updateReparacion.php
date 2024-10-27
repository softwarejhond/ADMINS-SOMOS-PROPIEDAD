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
</head>
<?php include('nav2.php'); ?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 ">
                <?php //muy importante
                        include("txtBanner.php"); ?>
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded ">
                     
                        <div class="card-body ">

                            <!--ACTUALIZAR DATOS USUARIO-->
                            <?php
                            $usaurio = htmlspecialchars($_SESSION["username"]);
                            $niks = mysqli_real_escape_string($con, (strip_tags($_GET['niks'], ENT_QUOTES)));
                            if (isset($_POST['btnUpdateReparacion'])) {
                                $codigoReporte = mysqli_real_escape_string($con, (strip_tags($_POST["codigoReporte"], ENT_QUOTES))); //Escanpando caracteres
                                $fechaReporte = mysqli_real_escape_string($con, (strip_tags($_POST["fechaReporte"], ENT_QUOTES))); //Escanpando caracteres
                                $numeroReporte = mysqli_real_escape_string($con, (strip_tags($_POST["numeroReporte"], ENT_QUOTES))); //Escanpando caracteres
                                $codigo_propietario = mysqli_real_escape_string($con, (strip_tags($_POST["codigo_propietario"], ENT_QUOTES))); //Escanpando caracteres
                                $valorFactura = mysqli_real_escape_string($con, (strip_tags($_POST["valorFactura"], ENT_QUOTES))); //Escanpando caracteres
                                $valorServicio = mysqli_real_escape_string($con, (strip_tags($_POST["valorServicio"], ENT_QUOTES))); //Escanpando caracteres
                                $totalPagar = mysqli_real_escape_string($con, (strip_tags($_POST["totalPagar"], ENT_QUOTES))); //Escanpando caracteres
                                $situacionReportada = mysqli_real_escape_string($con, (strip_tags($_POST["situacionReportada"], ENT_QUOTES))); //Escanpando caracteres
                                $solucion = mysqli_real_escape_string($con, (strip_tags($_POST["solucion"], ENT_QUOTES))); //Escanpando caracteres
                                $EstadoReporte = mysqli_real_escape_string($con, (strip_tags($_POST["EstadoReporte"], ENT_QUOTES))); //Escanpando caracteres
                                $id_reparador = mysqli_real_escape_string($con, (strip_tags($_POST["id_reparador"], ENT_QUOTES))); //Escanpando caracteres

                                $update = mysqli_query($con, "UPDATE report SET fechaReporte='$fechaReporte',numeroReporte='$numeroReporte',
                               codigo_propietario='$codigo_propietario',valorFactura='$valorFactura',valorServicio='$valorServicio',totalPagar='$totalPagar',
                               situacionReportada='$situacionReportada',solucion='$solucion',EstadoReporte='$EstadoReporte',id_reparador='$id_reparador' WHERE numeroReporte=$niks");
                                if ($update) {
                                    echo '<div class="alert alert-success alert-dismissable text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos se han actualizado y guardado con éxito.<br> <a href="viewReparaciones.php" type="button" class="alert alert-warning"><i class="bi bi-skip-backward-fill"></i> REGRESAR AL LISTADO DE REPARACIONES</a></div>';
                                    header("location: viewReparaciones.php");
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
                                }
                            }
                            ?>

                            <h2 class="text-center"><i class="fa-sharp fa-solid fa-pen-to-square"></i> Actualizar
                                reparación registrada</h2>
                            <p class="text-center">El código de esta reparación no se puede actualziar por motivos
                                segurdidad con la información</p>

                            <div>
                                <div class="col-lg-12 col-md-12 col-sm-12 ">
                                    <div class="row text-center">

                                        <div class="col-lg-12 col-md-8 col-sm-12 ">

                                            <!--Cargo los datos de usuario en los input-->
                                            <?php
                                            $usaurio = htmlspecialchars($_SESSION["username"]);
                                            $nik = mysqli_real_escape_string($con, (strip_tags($_GET['niks'], ENT_QUOTES)));
                                            $query = mysqli_query($con, "SELECT * FROM report WHERE numeroReporte=$nik;");
                                            while ($datoReparacionActuralizar = mysqli_fetch_array($query)) {
                                                $codigoReporte = $datoReparacionActuralizar['codigoReporte'];
                                                $fechaReporte = $datoReparacionActuralizar['fechaReporte'];
                                                $numeroReporte = $datoReparacionActuralizar['numeroReporte'];
                                                $codigo_propietario = $datoReparacionActuralizar['codigo_propietario'];
                                                $valorFactura = $datoReparacionActuralizar['valorFactura'];
                                                $valorServicio = $datoReparacionActuralizar['valorServicio'];
                                                $totalPagar = $datoReparacionActuralizar['totalPagar'];
                                                $situacionReportada = $datoReparacionActuralizar['situacionReportada'];
                                                $solucion = $datoReparacionActuralizar['solucion'];
                                                $EstadoReporte = $datoReparacionActuralizar['EstadoReporte'];
                                                $id_reparador = $datoReparacionActuralizar['id_reparador'];
                                            }
                                            ?>

                                            <form method="POST" class="was-validated">
                                                <div class="modal-body text-left bg-light shadow p-3 mb-5 bg-white rounded">
                                                    <div class="row">
                                                        <div class="col col-md-6 col-sm-12">
                                                            <label style="color:#000" class="text-left">Codigo del
                                                                reporte *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-qr-code"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="codigoreporte" id="codigoReporte" class="form-control" placeholder="Codigo del reporte" value="<?php echo $codigoReporte ?>" required="true" readonly>

                                                            </div>
                                                            <label style="color:#000" class="text-left">Fecha Reporte
                                                                *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-calendar-date-fill"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="date" name="fechaReporte" class="form-control" placeholder="Fecha Reporte" required="true" value="<?php echo $fechaReporte ?>">
                                                            </div>
                                                            <label style="color:#000" class="text-left">Número Reporte
                                                                *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-123"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="numeroReporte" class="form-control" placeholder="Número Reporte" value="<?php echo $numeroReporte ?>" required="true" readonly>

                                                            </div>
                                                            <label style="color:#000" class="text-left">Identificación
                                                                del reparador *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-person-vcard-fill"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="number" name="id_reparador" id="id_reparador" class="form-control" placeholder="Identificación del reparador" value="<?php echo $id_reparador ?>" required="true">

                                                            </div>
                                                            <label style="color:#000" class="text-left">Código
                                                                propietario *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-regex"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="number" name="codigo_propietario" id="codigo_propietario" class="form-control" placeholder="Código propietario" value="<?php echo $codigo_propietario ?>" required="true">

                                                            </div>
                                                            <label style="color:#000" class="text-left">Valor factura
                                                                *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-currency-dollar"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="number" name="valorFactura" id="valorFacturas" onchange="sumas()" class="form-control" placeholder="Valor factura" value="<?php echo $valorFactura ?>" required="true">

                                                            </div>
                                                            <label style="color:#000" class="text-left">Valor del
                                                                servicio *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-currency-dollar"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="number" name="valorServicio" id="valorServicios" onchange="sumas()" class="form-control" placeholder="Valor del servicio" value="<?php echo $valorServicio ?>" required="true">

                                                            </div>
                                                            <label style="color:#000" class="text-left">Total a pagar
                                                                *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-currency-dollar"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="number" name="totalPagar" id="totalPaga" class="form-control" value="<?php echo $totalPagar ?>" placeholder="Total a pagar" required="true">

                                                            </div>
                                                        </div>
                                                        <div class="col col-md-6 col-sm-12">

                                                            <label style="color:#000" class="text-left">Situación
                                                                reportada *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-chat-left-text-fill"></i>
                                                                    </span>
                                                                </div>
                                                                <textarea name="situacionReportada" id="situacionReportada" cols="10" rows="10" class="form-control" placeholder="Situación reportada" required="true"><?php echo $situacionReportada ?></textarea>

                                                            </div>
                                                            <label style="color:#000" class="text-left">Solución
                                                                *</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <i class="bi bi-chat-left-text-fill"></i>
                                                                    </span>
                                                                </div>
                                                                <textarea name="solucion" id="solucion" cols="10" rows="10" class="form-control" placeholder="Solución" required="true"><?php echo $solucion ?></textarea>

                                                            </div>
                                                            <select id="EstadoReporte" name="EstadoReporte" class="form-control form-select-lg custom-selec text-bg-dark" required="true">
                                                                <option value="<?php echo $EstadoReporte ?>">
                                                                    <?php echo $EstadoReporte ?></option>
                                                                <option value="PENDIENTE">PENDIENTE</option>
                                                                <option value="ATENDIDO">ATENDIDO</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-outline-success" value="Actualizar reparación" name="btnUpdateReparacion">
                                                        <a class="btn btn-outline-danger" href="viewReparaciones.php">Cancelar</a>
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
                <script>
                    function sumas() {
                        let valorFacturas = parseInt(document.getElementById('valorFacturas').value);
                        let valorServicios = parseInt(document.getElementById('valorServicios').value);
                        let total = valorFacturas + valorServicios;
                        document.getElementById('totalPaga').value = total;
                    }
                </script>
            </div>
        </div>
        <footer class="footer">
            <?php include('footer.php'); ?>
        </footer>
    </section>

</body>

</html>