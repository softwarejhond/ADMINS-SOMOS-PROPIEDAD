<?php
                        
                        if(isset($_POST['btnAddReportes'])){
                           
                            $codigoReporte = mysqli_real_escape_string($con,(strip_tags($_POST["codigoReporte"],ENT_QUOTES)));//Escanpando caracteres 
                            $fechaReporte = mysqli_real_escape_string($con,(strip_tags($_POST["fechaReporte"],ENT_QUOTES)));//Escanpando caracteres 
                            $numeroReporte = mysqli_real_escape_string($con,(strip_tags($_POST["numeroReporte"],ENT_QUOTES)));//Escanpando caracteres  
                            $id_reparador = mysqli_real_escape_string($con,(strip_tags($_POST["id_reparador"],ENT_QUOTES)));//Escanpando caracteres  
                            $codigo_propietario = mysqli_real_escape_string($con,(strip_tags($_POST["codigo_propietario"],ENT_QUOTES)));//Escanpando caracteres 
                            $valorFactura = mysqli_real_escape_string($con,(strip_tags($_POST["valorFactura"],ENT_QUOTES)));//Escanpando caracteres 
                            $valorServicio = mysqli_real_escape_string($con,(strip_tags($_POST["valorServicio"],ENT_QUOTES)));//Escanpando caracteres 
                            $totalPagar = mysqli_real_escape_string($con,(strip_tags($_POST["totalPagar"],ENT_QUOTES)));//Escanpando caracteres 
                            $situacionReportada = mysqli_real_escape_string($con,(strip_tags($_POST["situacionReportada"],ENT_QUOTES)));//Escanpando caracteres 
                            $solucion = mysqli_real_escape_string($con,(strip_tags($_POST["solucion"],ENT_QUOTES)));//Escanpando caracteres 
                            $estadoReporte = "PENDIENTE";
                            $dataTime = date("Y-m-d H:i:s");
                            $cek = mysqli_query($con, "SELECT * FROM report WHERE codigoReporte='$codigoReporte'");
                           
                            if(mysqli_num_rows($cek) == 0){
                                    $insert = mysqli_query($con, "INSERT INTO report(codigoReporte,fechaReporte,numeroReporte,codigo_propietario,
                                    valorFactura,valorServicio,totalPagar,situacionReportada,solucion,estadoReporte,id_reparador,fechaCreacion
                                    ) VALUES 
                                    ('$codigoReporte','$fechaReporte','$numeroReporte','$codigo_propietario',
                                    '$valorFactura','$valorServicio','$totalPagar','$situacionReportada','$solucion','$estadoReporte','$id_reparador','$dataTime')");
                                    if($insert){
                                        echo '
                                        <script>alert("Reporte registrado con éxito");</script>
                                        <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                        <div class="toast-header  ">
                                            <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                          
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="toast-body alert-success">
                                            <h5> <b>Reporte registrado con éxito</b></h5>
                                       
                                        </div>
                                    </div>
                                   ';
                                    } else{
                                        echo '<script>alert("Error al registar el Reporte, intenta nuevamente");</script>
                                        <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                            <div class="toast-header  ">
                                                <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                              
                                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="toast-body alert-danger">
                                                <h5> <b>Hubo problemas en el registro del Reporte, intenta nuevamente</b></h5>
                                           
                                            </div>
                                        </div>
                                   ';
                                        
                                    }
                                 
                            }else{
                                echo '<div class="alert alert-danger alert-dismissable text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. El reparador que deseas registar ya existe!</div>';
                            }
                        }

                       
                        ?>
<form method="post" class="was-validated"">

    <!-- Modal register barrios -->
    <div class=" modal fade" id="modalReporte" tabindex="-1" aria-labelledby="modalReporteLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalReporteLabel"><i class="bi bi-tools"></i> REGISTRO DE REPORTES Y DAÑOS
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col col-md-6 col-sm-12">
                        <label style="color:#000" class="text-left">Codigo del reporte *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-qr-code"></i>
                                </span>
                            </div>
                            <input type="text" name="codigoReporte" id="codigoReporte" class="form-control"
                                placeholder="Codigo del reporte"  required="true">

                        </div>
                        <label style="color:#000" class="text-left">Fecha Reporte *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-calendar-date-fill"></i>
                                </span>
                            </div>
                            <input type="date" name="fechaReporte" class="form-control" placeholder="Fecha Reporte"
                                required="true">
                        </div>
                        <label style="color:#000" class="text-left">Número Reporte *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-123"></i>
                                </span>
                            </div>
                            <input type="text" name="numeroReporte" id="numeroReporte" class="form-control" placeholder="Número Reporte"
                                 required="true" readonly>

                        </div>
                        <label style="color:#000" class="text-left">Identificación del reparador *</label><br>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </span>
                            </div>
                        <select id="id_reparador" list="id_reparador" name="id_reparador" required="true"  class="form-control">
                            <?php  $reparador = "SELECT * FROM repairmen";
                        $resultado_reparador = mysqli_query($con, $reparador);
                        while($fila = mysqli_fetch_array($resultado_reparador)) {
                            echo "<option value='".$fila['identificacion']."'>".$fila['nombre']."</option>";
                          }
                          ?>
                        </select>

                        </div>
                        <label style="color:#000" class="text-left">Código propietario *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-regex"></i>
                                </span>
                            </div>
                            <input type="number" name="codigo_propietario" id="codigo_propietario" class="form-control"
                                placeholder="Código propietario" required="true">

                        </div>
                        <label style="color:#000" class="text-left">Valor factura *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-currency-dollar"></i>
                                </span>
                            </div>
                            <input type="number" name="valorFactura" id="valorFactura" onchange="suma()"
                                class="form-control" placeholder="Valor factura" required="true">

                        </div>
                        <label style="color:#000" class="text-left">Valor del servicio *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-currency-dollar"></i>
                                </span>
                            </div>
                            <input type="number" name="valorServicio" id="valorServicio" onchange="suma()"
                                class="form-control" placeholder="Valor del servicio" required="true">

                        </div>
                        <label style="color:#000" class="text-left">Total a pagar *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-currency-dollar"></i>
                                </span>
                            </div>
                            <input type="number" name="totalPagar" id="totalPagar" class="form-control"
                                placeholder="Total a pagar" required="true">

                        </div>
                    </div>
                    <div class="col col-md-6 col-sm-12">

                        <label style="color:#000" class="text-left">Situación reportada *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-chat-left-text-fill"></i>
                                </span>
                            </div>
                            <textarea name="situacionReportada" id="situacionReportada" cols="10" rows="10"
                                class="form-control" placeholder="Situación reportada" required="true"></textarea>

                        </div>
                        <label style="color:#000" class="text-left">Solución *</label><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-chat-left-text-fill"></i>
                                </span>
                            </div>
                            <textarea name="solucion" id="solucion" cols="10" rows="10" class="form-control"
                                placeholder="Solución" required="true"></textarea>

                        </div>

                    </div>
                </div>


                <input type="submit" name="btnAddReportes" class="btn btn-outline-success" value="Registrar reporte"
                    require>
                <input type="reset" class="btn btn-outline-danger" value="Cancelar">
            </div>

        </div>
    </div>
    </div>

</form>
<script>
function suma() {
    let valorFactura = parseInt(document.getElementById('valorFactura').value);
    let valorServicio = parseInt(document.getElementById('valorServicio').value);
    let total = valorFactura + valorServicio;
    document.getElementById('totalPagar').value = total;
}
</script>
<script>
function genRandonString(length) {
    var chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
    var charLength = chars.length;
    var result = '';
    for (var i = 0; i < length; i++) {
        result += chars.charAt(Math.floor(Math.random() * charLength));
    }
    return result;
}
let random = genRandonString(12);
document.getElementById('codigoReporte').value = random;

</script>
<script>
function genRandonNumer(length) {
    var chars = '1234567890';
    var charLength = chars.length;
    var result = '';
    for (var i = 0; i < length; i++) {
        result += chars.charAt(Math.floor(Math.random() * charLength));
    }
    return result;
}
let randomNumber = genRandonNumer(12);
document.getElementById('numeroReporte').value = randomNumber;

</script>