<div class="card text-center">
    <div class="card-header" style="background-color:#123960; color:#ffffff">
        <i class="fa fa-refresh" aria-hidden="true"></i> LISTA DE PROPIETARIOS PARA RENOVAR <i class="fa fa-refresh" aria-hidden="true"></i>
    </div>
    <div class="card-body">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="float-right p-3">
            <div class="form-group text-right">
                Seleccionar mes para buscar
                <br>
                <a href="#" class="btn btn-success btn-lg" onclick="tableToExcel('testTable', 'PropietariosRenovar')" title="Exportar base de datos a Excel"><i class="fa fa-file-excel"></i> Exportar a Excel</a>

                <button class="btn btn-success btn-lg"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                <select name="mes" id="mes" class="btn-lg text-center alert alert-warning">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>

        <table id="testTable" class=" table table-sm table-hover table-bordered table-lg table-responsive">
            <thead class="thead-dark">
                <tr>

                    <th class="w-10">Código</th>
                    <th class="w-25">Inmueble</th>
                    <th class="w-50">Propietario</th>
                    <th class="w-50">Inquilino</th>
                    <th class="w-50">E-mail Inquilino</th>
                    <th class="w-50">Teléfono Inquilino</th>
                    <th class="w-50">Mes</th>
                    <th class="w-50">Fecha creacion</th>
                    <th class="w-50"><i class="fa-solid fa-lock"></i> </th>
                    <th class="w-50"><i class="fa-solid fa-pen-to-square"></i></th>
                    <th class="w-50"><i class="fa-solid fa-percent"></i></th>
                    <th class="w-50"><i class="fa-solid fa-bell fa-shake"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryICP = mysqli_query($con, "SELECT * FROM porcentajeAumento WHERE id=1");
                while ($porcentajeAumentado = mysqli_fetch_array($queryICP)) {
                    $porcentaje = $porcentajeAumentado['porcentaje'];
                }
                // Obtener los valores del formulario
                $mes = $_POST["mes"];
                $buscar = $_POST["buscador"];
                $usaurio = htmlspecialchars($_SESSION["codigo"]);
                $fecha_actual = date("Y-m-d");
                $dias_transcurridos = date('j');  // Restamos 1 porque queremos el día actual menos el primer día del mes

                if ($filter) {
                    $sql = mysqli_query($con, "SELECT *
                    FROM proprieter
                    WHERE MONTH(DATE_ADD(fecha, INTERVAL 31 DAY)) = ($mes + 1) % 12 + 1  -- ? es el parámetro del mes seleccionado
                    AND estadoPropietario='ACTIVO' ORDER BY fecha DESC");
                } else {
                    $sql = mysqli_query($con, "SELECT *
                    FROM proprieter
                    WHERE MONTH(DATE_ADD(fecha, INTERVAL 31 DAY)) = ($mes + 1) % 12 + 1  -- ? es el parámetro del mes seleccionado
                    AND estadoPropietario='ACTIVO'  ORDER BY fecha DESC");
                }
                if (mysqli_num_rows($sql) == 0) {
                    echo '<tr><td colspan="8">No hay datos.</td></tr>';
                } else {
                    $no = 1;
                    $activo = "";

                    while ($row = mysqli_fetch_array($sql)) {
                        $id = $row['id'];
                        $ipc = $row['ipc'];
                        // Establecer el locale en español
                        setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'es');
                        $mes = $row['fecha'];
                        // Obtener el nombre del mes en español
                        $nombre_mes = strftime('%B', strtotime($mes));
                        //condicion para cambiar el color en la tabla segun el valor 
                        if ($row['estadoPropietario'] == "ACTIVO") {
                            $activo =  '<label class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="PROPIETARIO: ' . $row['estadoPropietario'] . '" ><i class="fa-solid fa-lock-open"></i></label>';
                        }
                        if ($row['estadoPropietario'] == "INACTIVO") {
                            $activo =  '<label class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="PROPIETARIO: ' . $row['estadoPropietario'] . '"><i class="fa-solid fa-lock"></i></label>';
                        }
                        if ($row['email_inquilino'] != "") {
                            $email =  '<a href="enviarRecordatorio.php?nik=' . $row['id'] . '" title="Enviar recordatorio" class="btn btn-outline-warning btn-sm" target="_blank"><i class="fa-solid fa-bell fa-shake"></i></a>';
                        }
                        if ($row['email_inquilino'] == "") {
                            $email =  '<button class="btn btn-outline-danger btn-sm" tittle="Acción bloqueada por no tener email"><i class="fa-solid fa-lock"></i></button>';
                        }
                        if ($row['tipoInmueble'] == "LOCAL") {
                            $porcentajes = '<td><a href="actualizarPorcentajeLocal.php?parametro=' . $id . '" data-toggle="tooltip" data-placement="top" title="ACTUALIZAR VALOR" class="btn morado btn-sm">' . $ipc . ' </a></td>';

                            $tipoPropiedad =  '<button data-toggle="tooltip" data-placement="top" title="TIPO PROPIEDAD: ' . $row['tipoInmueble'] . '" class="btn morado btn-sm w-100"><i class="fa-solid fa-shop"></i> ' . $row['tipoInmueble'] . '</button>';
                        } else {
                            $porcentajes = '<td><button data-toggle="tooltip" data-placement="top" title="PORCENTAJE IPC" class="btn naranja btn-sm">' . $ipc . ' </button></td>';

                            $tipoPropiedad =  '<button data-toggle="tooltip" data-placement="top" title="TIPO PROPIEDAD: ' . $row['tipoInmueble'] . '" class="btn naranja btn-sm w-100"><i class="fa-solid fa-house"></i> ' . $row['tipoInmueble'] . '</button>';
                        }


                        echo '

						  <tr style="font-size:12px">
						    
                            <td>' . $row['codigo'] . '</td>
                            <td>' . $tipoPropiedad . '</td>
                            <td>' . $row['nombre_propietario'] . '</td>
                            <td>' . $row['nombre_inquilino'] . '</td>
                            <td>' . $row['email_inquilino'] . '</td>
                            <td>' . $row['telefono_inquilino'] . '</td>
                            <td><label class="btn naranjas btn-sm text-uppercase" data-toggle="tooltip" data-placement="top" title="Mes: ' . $nombre_mes . '" >' . $nombre_mes . '</label></td>
                            <td>' . $row['fecha'] . '</td>
                            <td>' . $activo . '</td>
                            <td><a href="updatePropietario.php?nik=' . $row['id'] . '" title="Actualizar propietario" class="btn btn-outline-info btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            ' . $porcentajes . '
                            <td>' . $email . '</td>
                          
                          </tr>


						';
                        $no++;
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer " style="background-color:#123960; color:#ffffff">
        <i class="fas fa-clock"></i>
        <?php
        $DateAndTime = date('m-d-Y h:i:s a', time());
        echo "Actualizado $DateAndTime.";
        ?>
    </div>

</div>

<script>
    $(document).ready(function() {
        $(".toastPatient").toast('show');
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<!-- Codigo para exportar tablas a excel -->
<script type="text/javascript">
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,',
            template =
            '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
            base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {
                worksheet: name || 'Inmuebles',
                table: table.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
</script>