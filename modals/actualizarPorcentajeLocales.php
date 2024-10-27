<?php
$ipc = mysqli_query($con, "SELECT * FROM porcentajeAumento WHERE id=2");
while ($ipcActual = mysqli_fetch_array($ipc)) {
    $ipcActuals = $ipcActual['porcentaje'];
}
if (isset($_POST['updateIPC'])) {
    $porcentajeNuevo = $_POST["nuevoIPC"]; //Escanpando caracteres 
    $sqlPorcentaje = "UPDATE porcentajeAumento SET porcentaje = '$porcentajeNuevo' WHERE id = 2";
    $sqlPorcentajeEnPropieter = "UPDATE proprieter SET ipc = '$porcentajeNuevo' WHERE tipoInmueble = 'LOCAL'";
    if ($con->query($sqlPorcentaje) === TRUE) {
        if ($con->query($sqlPorcentajeEnPropieter) === TRUE) {
            echo '<script>
        $(document).ready(function() {
            $("#ipcUpdate").modal();
        });
        </script>';
        }
    } else {
        echo '<script>
        $(document).ready(function() {
            $("#ipcUpdateError").modal();
        });
        </script>';
    }
}
?>
<form method="post" class="was-validated"">

    <!-- Modal register barrios -->
    <div class=" modal fade" id="actualizarPrecioLocales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background:#123960;">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-percent"></i> ACTUALIZACIÓN DE IPC DE EN LOCALES</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label style="color:#000" class="text-left">IPC actual <i class="fa-solid fa-percent"></i>*</label><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-percent"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="nuevoIPC" value="<?php echo $ipcActuals; ?>" maxlength="5" require>

                </div>

                <input type="submit" name="updateIPC" class="btn btn-success" value="Actualizar porcentaje" require>
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div>

        </div>
    </div>
    </div>

</form>

<!-- Modal satisfactorio -->
<div class="modal fade" id="ipcUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background:#123960;">
                <h5 class="modal-title" id="exampleModalLabel">Notificación </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="reiniciar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">

                <h1> <i class="fa fa-refresh w-100" aria-hidden="true"></i><br>Porcentaje actualizado con éxito.</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reiniciar()"><i class="fa fa-exit"></i> <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal erro -->
<div class="modal fade" id="ipcUpdateError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background:#123960;">
                <h5 class="modal-title" id="exampleModalLabel">Aviso <i class="fa-solid fa-triangle-exclamation"></i></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="reiniciar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">

                <h1> <i class="fa-solid fa-bug"></i><br>Error al actualizar <?php echo $con->error; ?></h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reiniciar()"><i class="fa fa-exit"></i> <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function reiniciar() {
        // Redirige a la misma página actual
        window.location.href = window.location.href;

    }
</script>