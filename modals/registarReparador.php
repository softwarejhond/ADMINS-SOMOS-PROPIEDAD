<?php
                        
                        if(isset($_POST['btnAddReparadores'])){
                           
                            $identificacion = mysqli_real_escape_string($con,(strip_tags($_POST["identificacion"],ENT_QUOTES)));//Escanpando caracteres 
                            $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
                            $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres  
                            $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
                            $profesion = mysqli_real_escape_string($con,(strip_tags($_POST["profesion"],ENT_QUOTES)));//Escanpando caracteres 
                            $estado = "ACTIVO";
                            $dataTime = date("Y-m-d H:i:s");
                            $cek = mysqli_query($con, "SELECT * FROM repairmen WHERE identificacion='$identificacion'");
                           
                            if(mysqli_num_rows($cek) == 0){
                                    $insert = mysqli_query($con, "INSERT INTO repairmen(identificacion, nombre, telefono,email,profesion,estado,fecha_creacion) VALUES 
                                    ('$identificacion','$nombre','$telefono','$email','$profesion','$estado','$dataTime')");
                                    if($insert){
                                        echo '
                                        <script>alert("Reparador registrado con éxito");</script>
                                        <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                        <div class="toast-header  ">
                                            <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                          
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="toast-body alert-success">
                                            <h5> <b>Barrio registrado con éxito</b></h5>
                                       
                                        </div>
                                    </div>
                                   ';
                                    } else{
                                        echo '<script>alert("Error al registar el reparador, intenta nuevamente");</script>
                                        <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                            <div class="toast-header  ">
                                                <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                              
                                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="toast-body alert-danger">
                                                <h5> <b>Hubo problemas en el registro del barrio, intenta nuevamente</b></h5>
                                           
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
    <div class=" modal fade" id="modalReparador" tabindex="-1" aria-labelledby="modalReparadorLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReparadorLabel">REGISTRO DE REPARADORES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <label style="color:#000" class="text-left">Identificación *</label><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-person-vcard"></i>
                        </span>
                    </div>
                    <input type="text" name="identificacion" class="form-control" placeholder="Identificación"
                        style="text-transform: capitalize;" required="true">

                </div>
                <label style="color:#000" class="text-left">Nombre completo *</label><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-person-fill-check"></i>
                        </span>
                    </div>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre completo"
                        style="text-transform: capitalize;" required="true">
                </div>
                <label style="color:#000" class="text-left">Teléfono *</label><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-telephone-fill"></i>
                        </span>
                    </div>
                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono"
                        style="text-transform: capitalize;" required="true">

                </div>
                <label style="color:#000" class="text-left">Correo electrónico *</label><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-envelope-at-fill"></i>
                        </span>
                    </div>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico"
                        required="true">

                </div>
                <label style="color:#000" class="text-left">Seleccione la profesión *</label><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-check-all"></i>
                        </span>
                    </div>
                    <select name="profesion" class="form-control form-select-lg custom-selec text-bg-dark"
                        required="true">
                        <option value="Aseo">Aseo</option>
                        <option value="Ayudante en casa">Ayudante en casa</option>
                        <option value="Electricista">Electricista</option>
                        <option value="Plomero">Plomero</option>
                        <option value="Maestro de obra">Maestro de obra</option>
                        <option value="Limpieza de muebles">Limpieza de muebles</option>
                        <option value="Limpieza de vidrios y ventanas">Limpieza de vidrios y ventanas</option>
                        <option value="Limpieza de colchones">Limpieza de colchones</option>
                        <option value="Limpieza de cortinas">Limpieza de cortinas</option>
                        <option value="Técnico en lavadoras">Técnico en lavadoras</option>
                        <option value="Técnico en neveras y refrigeradores">Técnico en neveras y refrigeradores</option>

                    </select>

                </div>
                <input type="submit" name="btnAddReparadores" class="btn btn-outline-success"
                    value="Registrar reparador" require>
                <input type="reset" class="btn btn-outline-danger" value="Cancelar">
            </div>

        </div>
    </div>
    </div>

</form>
