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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
                            <?php
                            require_once "conexion.php";
                            // Función para verificar la disponibilidad de la cita
                            function verificarDisponibilidad($fecha, $hora, $cnn)
                            {
                                $sql = "SELECT * FROM citas WHERE fecha = '$fecha' AND hora = '$hora'";
                                $result = $cnn->query($sql);
                                return $result->num_rows == 0; // Devuelve true si no hay citas en esa fecha y hora
                            }

                            // Procesar el formulario de reserva de cita
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $tipoCita = $_POST["tipoCita"];
                                $nombre = $_POST["nombre"];
                                $telefono = $_POST["telefono"];
                                $propiedad = $_POST["propiedad"];
                                $fecha = $_POST["fecha"];
                                $hora = $_POST["hora"];

                                // Verificar la disponibilidad de la cita
                                if (verificarDisponibilidad($fecha, $hora, $con)) {
                                    // Insertar la cita en la base de datos si está disponible
                                    $sql = "INSERT INTO citas (tipoCita, nombre, codigoPropiedad, telefono, fecha, hora, estado) VALUES ('$tipoCita', '$nombre', '$propiedad','$telefono', '$fecha', '$hora',0)";
                                    if ($con->query($sql) === TRUE) {
                                        echo '  <div class="toastCitas" style="position: absolute; top: 0; right: 0; z-index:99" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastCitas-body alert-success">
                                    <h5 class="p-3"> <b><i class="fa-regular fa-thumbs-up fa-bounce"></i> Cita Registrada Correctamente</b></h5>
                               
                                </div>
                            </div>';
                                    } else {
                                        echo "Error al reservar la cita: " . $con->error;
                                    }
                                } else {
                                    echo '  <div class="toastCitas" style="position: absolute; top: 0; right: 0;z-index:99" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastCitas-body alert-warning">
                                    <h5 class="p-3"> <b><i class="fa-solid fa-triangle-exclamation fa-bounce"></i> Lo sentimos, la fecha y hora seleccionadas<br>
                                     ya están ocupadas. Por favor, <br>elige otro horario.</b></h5>
                               
                                </div>
                            </div>';
                                }
                            }
                            ?>
                            <br>
                            <div class="row">
                                <div class="col col-lg-8 col-md-12 col-sm-12 px-2 mt-1 p-1">
                                    <div class="table-responsive">
                                        <table id="citas-table" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Fecha_Cita</th>
                                                    <th>Hora_Cita</th>
                                                    <th>Tipo Cita</th>
                                                    <th>Nombre</th>
                                                    <th>Propiedad</th>
                                                    <th>Teléfono</th>
                                                    <th>Estado</th>
                                                    <th class="text-center"><i
                                                            class="fa-solid fa-pen-to-square fa-bounce"></i>
                                                    </th>
                                                    <th class="text-center"><i
                                                            class="fa-solid fa-trash-can fa-bounce"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col col-lg-4 col-md-12 col-sm-12 px-2 mt-1 p-3">
                                    <h2>Añadir nueva cita</h2>
                                    <p>Complete este formulario para registrar cita, todos los campos son
                                        obligatorios.
                                    </p>
                                    <form method="post" class="was-validated"
                                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="form-group">
                                            <label for="tipoCita">Tipo de cita:</label>
                                            <select class="custom-select custom-select mb-3 " id="tipoCita"
                                                name="tipoCita" required>
                                                <option value="">SELECCIONAR</option>
                                                <option value="RECIBIR">RECIBIR</option>
                                                <option value="ENTREGAR">ENTREGAR</option>
                                                <option value="MOSTRAR">MOSTRAR</option>
                                                <option value="REPARACIONES">REPARACIONES</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Propiedad:</label>
                                            <input type="text" class="form-control is-invalid" id="propiedad"
                                                name="propiedad" placeholder="Ingrese el codigo de la propiedad"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control is-invalid" id="nombre" name="nombre"
                                                placeholder="Ingrese su nombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono:</label>
                                            <input type="tel" class="form-control is-invalid" id="telefono"
                                                placeholder="Ingrese su teléfono" name="telefono" minlength="7"
                                                maxlength="15" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha">Fecha:</label>
                                            <input type="date" class="form-control is-invalid" id="fecha" name="fecha"
                                                placeholder="Ingrese la fecha de la cita" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="hora">Hora:</label>
                                            <input type="time" class="form-control is-invalid" id="hora" name="hora"
                                                placeholder="Ingrese la hora de la cita" required>
                                        </div>
                                        <input type="submit" class="btn btn-outline-success" value="Reservar">
                                        <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $(".toastPaciente").toast('show');
        });
        </script>
    </section>
    <!-- Incluir jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Incluir Bootstrap JS importante para los TOAST -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!--MUY IMPORTANTE PARA EL TIEMPO REAL DE LAS CONSULTAS-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script>
    $(document).ready(function() {
        $('#citas-table').DataTable({
            "ajax": {
                "url": "APIS/citasView.php", // URL de tu script PHP que devuelve los datos de las citas
                "dataSrc": ""
            },
            "columns": [{
                    "data": "fecha",
                    "render": function(data, type, row) {
                        return '<button class="btn naranjas btn-sm w-100">' + data +
                            '</button>';
                    }
                },
                {
                    "data": "hora",
                    "render": function(data, type, row) {
                        // Dividir la cadena de hora en partes de hora y minutos
                        var [hour, minute] = data.split(':');

                        // Crear un objeto Date estableciendo las horas y minutos
                        var date = new Date();
                        date.setHours(parseInt(hour));
                        date.setMinutes(parseInt(minute));

                        // Obtener la hora en formato AM/PM
                        var hora12 = date.toLocaleTimeString('en-US', {
                            hour: 'numeric',
                            minute: 'numeric',
                            hour12: true
                        });


                        return '<button class="btn blue btn-sm w-100">' + hora12 + '</button>';
                    }
                },
                {
                    "data": "tipoCita"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "codigoPropiedad"
                },
                {
                    "data": "telefono"
                },
                {
                    "data": "estado",
                    "render": function(data, type, row) {
                        if (data == 0) {
                            return '<button class="btn naranjas p-1 w-100 btn-sm"><i class="fa-solid fa-hourglass-half fa-spin"></i> PENDIENTE</button>';
                        } else if (data == 1) {
                            return '<button class="btn verde p-1 w-100 btn-sm"><i class="fa-solid fa-circle-check fa-shake"></i> ATENDIDO</button>';
                        } else if (data == 2) {
                            return '<button class="btn red p-1 w-100 btn-sm"><i class="fa-solid fa-ban fa-flip"></i> CANCELADO</button>';
                        } else {
                            return data;
                        }

                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        var estadoOptions = `
          <select class="form-select custom-select text-center morado custom-select-sm"" onchange="actualizarEstado(${row.id}, this)">
    <option value="0" ${row.estado == 0 ? 'selected' : ''}>PENDIENTE</option>
    <option value="1" ${row.estado == 1 ? 'selected' : ''}>ATENDIDO</option>
    <option value="2" ${row.estado == 2 ? 'selected' : ''}>CANCELADO</option>
</select>

        `;
                        return estadoOptions;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        var eliminarButton = `
            <button class="btn red p-1 w-100 btn-sm" title="Eliminar Cita" onclick="eliminarCita(${row.id})">
                <i class="fa-solid fa-trash-can fa-bounce"></i>
            </button>
        `;
                        return eliminarButton;
                    }
                }

            ],
        });
    });

    function eliminarCita(id) {
        // Preguntar al usuario si está seguro de eliminar la cita
        if (confirm('¿Estás seguro de que deseas eliminar esta cita?')) {
            // Realizar una solicitud DELETE a la API para eliminar la cita
            fetch(`APIS/citasDelete.php?id=${id}`, {
                    method: 'DELETE',
                })
                .then(response => {
                    // Verificar si la solicitud fue exitosa
                    if (!response.ok) {
                        throw new Error('Ocurrió un problema al eliminar la cita.');
                    }
                    return response.json();
                })
                .then(data => {
                    // Procesar la respuesta si la eliminación fue exitosa
                    console.log(data.message); // Muestra un mensaje de éxito en la consola
                    // Actualizar los datos de la tabla
                    actualizarTabla();
                })
                .catch(error => {
                    console.error('Error:', error.message); // Muestra un mensaje de error en la consola
                });
        }
    }

    function actualizarEstado(id, selectElement) {
        // Obtener el nuevo estado seleccionado del select
        var nuevoEstado = selectElement.value;

        // Preguntar al usuario si está seguro de actualizar el estado de la cita
        if (confirm('¿Estás seguro de que deseas actualizar el estado de esta cita?')) {
            // Realizar una solicitud GET a la API para actualizar el estado de la cita
            fetch(`APIS/citasUpdate.php?id=${id}&estado=${nuevoEstado}`)
                .then(response => {
                    // Verificar si la solicitud fue exitosa
                    if (!response.ok) {
                        throw new Error('Ocurrió un problema al actualizar el estado de la cita.');
                    }
                    return response.json();
                })
                .then(data => {
                    // Procesar la respuesta si la actualización fue exitosa
                    console.log(data.message); // Muestra un mensaje de éxito en la consola
                    // Actualizar los datos de la tabla
                    alert(data.message);
                    actualizarTabla();
                    actualizarConteoCitas(); // este conteo es llamado desde el nav donde se creo
                })
                .catch(error => {
                    console.error('Error:', error.message); // Muestra un mensaje de error en la consola
                });
        }

    }

    function actualizarTabla() {
        // Recargar los datos de la tabla en tiempo real
        $('#citas-table').DataTable().ajax.reload();
    }
    </script>

    <script>
    $(document).ready(function() {
        $(".toastCitas").toast('show');
    });
    </script>

</body>

</html>