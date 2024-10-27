<?php

if (isset($_POST['btnAddBarrios'])) {

    $barrio = mysqli_real_escape_string($con, (strip_tags($_POST["txtBarrio"], ENT_QUOTES))); //Escanpando caracteres  
    $codigo_barrio = mysqli_real_escape_string($con, (strip_tags($_POST["codigoBarrio"], ENT_QUOTES))); //Escanpando caracteres 
    $codigo_municipio = mysqli_real_escape_string($con, (strip_tags($_POST["municipiosBarrios"], ENT_QUOTES))); //Escanpando caracteres 

    $cek = mysqli_query($con, "SELECT * FROM barrios WHERE codigo='$codigo_barrio'");

    if (mysqli_num_rows($cek) == 0) {
        $insert = mysqli_query($con, "INSERT INTO barrios(barrio, codigo, codigo_municipio) VALUES 
                                    ('$barrio','$codigo_barrio','$codigo_municipio')");
        if ($insert) {
            echo '
                                        <script>alert("Barrio registrado con éxito");</script>
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
        } else {
            echo '<script>alert("Error al registar el barrio, intenta nuevamente");</script>
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
    } else {
        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. el código de la vivienda ya existe!</div>';
    }
}

?>
<form class="was-validated" id="formulario">

    <!-- Modal register barrios -->
    <div class="modal fade" id="modalRetiro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE FUTURO RETIRO DE INQUILINO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="card text-center">
                        <div class="card-header" style=" background-color: #123960; color:#ffffff">
                            <i class="fas fa-user-injured"></i> BUSQUEDA DE PACIENTES <i class="fas fa-user-injured"></i>
                        </div>
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="input-group input-group-lg mb-3">
                                    <input type="number" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                            echo $_GET['search'];
                                                                                        } ?>" class="form-control text-center" placeholder="DOCUMENTO DE IDENTIDAD">
                                    <button type="submit" class="btn btn-lg" style=" background-color: #123960; color:#ffffff" title="Buscar paciente"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                            <div class="col-md-12">

                                <?php
                                if (isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT * FROM proprieter WHERE codigo LIKE '%$filtervalues%' LIMIT 1 ";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            echo '
                                                <div class="card" style="width: 100%; border:0; background-color: #123960; COLOR:#ffffff">
                                                  <div class="row no-gutters">
                                                     <div class="col-md-4 text-left">
                                                        <img src="images/doc.png" alt="avatar" style="width:100%"> 
                                                     </div>
                                                     <div class="col-md-8">
                                                       <div class="card-body text-left">
                                                         <h2 class="card-title"><b>' . $items['nombre'] . ' ' . $items['apellidos'] . '</b></h2>
                                                         <h4 class="card-text">Documento de identificación: ' . $items['numeroIdentificacion'] . '</h4>
                                                         <h4 class="card-text">Teléfono: ' . $items['telefonoCelular'] . '</h4>
                                                         </br>
                                                         <button class="btn btn-outline-danger btn-lg" title="Tipo de sangre"><b><i class="fa fa-dna"></i> ' . $items['rh'] . '</b></button>
                                                         <button class="btn btn-outline-info btn-lg" title="Fecha de nacimiento"><b><i class="fa fa-calendar"></i> ' . $items['fechaNacimiento'] . '</b></button>
                                                         </br>
                                                         <h5>Acciones a realizar</h5>
                                                         <td><a href="historiaClinica.php?nik=' . $items['numeroIdentificacion'] . '"title="Realizar historia clínica" class="btn btn-outline-success btn-lg"><span class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>
                                                         <td><a href="evolucionesClinicas.php?nik=' . $items['numeroIdentificacion'] . '" title="Realizar valoración clínica" class="btn btn-outline-info btn-lg"><span class="fa fa-feather-alt" aria-hidden="true"></span></a></td>
                                                         <td><a href="upd_paciente.php?nik=' . $items['numeroIdentificacion'] . '" title="Editar paciente" class="btn btn-outline-warning btn-lg"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                                                         <td><a href="main.php?aksi=delete&nik=' . $items['numeroIdentificacion'] . '" title="Eliminar paciente" onclick="return confirm(\'Esta seguro de borrar al paciente ' . $items['nombre'] . " " . $items['apellidos'] . '?\')" class="btn btn-outline-danger btn-lg"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
                                                         </br>
                                                         <p class="card-text"><small class="text-muted">Fecha de ingreso: ' . $items['dataTime'] . '</small></p>
                                                       </div>
                                                    </div>
                                                 
                                                </div>
                                              </div>
                      
                                              ';
                                ?>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">
                                                <div class="spinner-border" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                Paciente no encontrado
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                            </body>
                        </div>
                        <div class="card-footer " style=" background-color: #123960; color:#ffffff">
                            <i class="fas fa-clock"></i>
                            <?php
                            $DateAndTime = date('m-d-Y h:i:s a', time());
                            echo "Actualizado $DateAndTime.";
                            ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</form>
<script>
    $(document).ready(function() {
        $('#buscarPropiedadCodigo').on('input', function() {
            var valorBusqueda = $(this).val();

            $.ajax({
                type: 'POST',
                url: '../php/buscarInquilino.php',
                data: {
                    busqueda: valorBusqueda
                },
                dataType: 'json',
                success: function(datos) {
                    // Limpiar resultados anteriores
                    $('#resultados').empty();

                    // Mostrar nuevos resultados
                    $.each(datos, function(index, item) {
                        $('#resultados').append('<p>' + item.doc_inquilino + ' - ' + item.nombre_inquilino + '</p>');
                    });
                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX: ', error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".toastPaciente").toast('show');
    });
</script>