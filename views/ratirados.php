<?php
if (isset($_POST['retirar'])) {
    $retirado = mysqli_query($con, "INSERT INTO tenant (codigoPropiedad, identificacionInquilino, nombreInquilino,telefonoInquilino,emailInquilino,fechaIngreso,fechaRetiro) VALUES ('$codigo','$identificacion_inquilino','$nombre_inquilino','$telefono_inquilino','$email_inquilino','$fecha','$dataTime')");
    if ($retirado) {
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
                                                                            <h5> <b>Inquilino retirado correctamente</b></h5>
                                                                       
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
                                                                            <h5> <b>Hubo problemas en retirar el inquilino, intenta nuevamente</b></h5>
                                                                       
                                                                        </div>
                                                                    </div>
                                                               ';
    }
}
