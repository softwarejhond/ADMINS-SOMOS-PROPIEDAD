    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

    <div class="card text-center">
        <div class="card-header" style="background-color:#123960; color:#ffffff">
            <i class="bi bi-people-fill"></i> LISTA DE PROPIETARIOS REGISTRADOS <i class="bi bi-people-fill"></i>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-success btn-lg" onclick="exportTableToXLSX('testTable', 'Inmuebles_Registrados')" title="Exportar base de datos a Excel">
                <i class="fa fa-file-excel"></i> Exportar a Excel
            </a>
            <table id="testTable" class=" table table-sm table-hover table-bordered table-lg table-responsive">
                <thead class="thead-dark">
                    <tr>

                        <th class="w-10">V</th>
                        <th class="w-10">Código</th>
                        <th class="w-25">Tipo Inmueble</th>
                        <th class="w-50">Nombre</th>
                        <th class="w-50">Nivel de piso</th>
                        <th class="w-50">Area</th>
                        <th class="w-50">Estrato</th>
                        <th class="w-50">Municipio</th>
                        <th class="w-50">Barrio</th>
                        <th class="w-50">Terraza</th>
                        <th class="w-50">Ascensor</th>
                        <th class="w-50">Patio</th>
                        <th class="w-50">Parqueadero</th>
                        <th class="w-50">Cuarto util</th>
                        <th class="w-50">Habitaciones</th>
                        <th class="w-50">Closet</th>
                        <th class="w-50">Sala</th>
                        <th class="w-50">Sala-comedor</th>
                        <th class="w-50">Comedor</th>
                        <th class="w-50">Cocina</th>
                        <th class="w-50">Baños</th>
                        <th class="w-50">Cuarto Servicios</th>
                        <th class="w-50">Zona ropa</th>
                        <th class="w-50">Tipo Vista</th>
                        <th class="w-50">Servicios Publico</th>
                        <th class="w-50">Otras Caracteristicas</th>
                        <th class="w-50">Direccion</th>
                        <th class="w-50">Telefono Inmueble</th>
                        <th class="w-50">Valor canon</th>
                        <th class="w-50">Identificacion propietario</th>
                        <th class="w-50">Nombre propietario</th>
                        <th class="w-50">Telefono propietario</th>
                        <th class="w-50">Banco</th>
                        <th class="w-50">Tipo cuenta</th>
                        <th class="w-50">Numero cuenta</th>
                        <th class="w-50">Día de pago</th>
                        <th class="w-50">Identificacion inquilino</th>
                        <th class="w-50">Nombre inquilino</th>
                        <th class="w-50">Telefono inquilino</th>
                        <th class="w-50">Email inquilino</th>
                        <th class="w-50">Fecha de ingreso</th>
                        <th class="w-50">Descuento</th>
                        <th class="w-50">IVA</th>
                        <th class="w-50">Contrato EPM</th>
                        <th class="w-50">Comision</th>
                        <th class="w-50">Aval catastro</th>
                        <th class="w-50">Asistencia</th>
                        <th class="w-50">Identificacion codeudor uno</th>
                        <th class="w-50">Nombre codeudor uno</th>
                        <th class="w-50">Identificacion codeudor uno</th>
                        <th class="w-50">Nombre codeudor dos</th>
                        <th class="w-50">Identificacion codeudor uno</th>
                        <th class="w-50">Nombre codeudor tres</th>
                        <th class="w-50">Estado</th>
                        <th class="w-50">Condición</th>
                        <th class="w-50">Ultima actualizacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $buscar = $_POST["buscador"];
                    $usaurio = htmlspecialchars($_SESSION["codigo"]);
                    if ($filter) {
                        //INNER JOING DEMASIADO IMPORTANTE PARA TRAER EL NOMBRE DEL MUNICIPIO
                        $sql = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo like '%$buscar%' AND estadoPropietario='ACTIVO'  ORDER BY nombre_propietario ASC");
                    } else {
                        $sql = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo like '%$buscar%' AND estadoPropietario='ACTIVO'  ORDER BY nombre_propietario ASC");
                    }
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                    } else {
                        $no = 1;
                        $activo = "";
                        //se crean las variables para dar formato a los valores motenarios con la funcion number_format
                        $decimales = 0; // número de decimales
                        $separador_decimal = '.'; // separador decimal
                        $separador_miles = '.'; // separador de miles
                        while ($row = mysqli_fetch_assoc($sql)) {
                            //condicion para cambiar el color en la tabla segun el valor 
                            if ($row['estadoPropietario'] == "ACTIVO") {
                                $activo =  '<label class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="PROPIETARIO: ' . $row['estadoPropietario'] . '" ><i class="fa-solid fa-lock-open"></i></label>';
                            }
                            if ($row['estadoPropietario'] == "INACTIVO") {
                                $activo =  '<label class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="PROPIETARIO: ' . $row['estadoPropietario'] . '"><i class="fa-solid fa-lock"></i></label>';
                            }

                            echo '

						  <tr style="font-size:12px">
						    
                            <td>' . $row['v'] . '</td>
                            <td>' . $row['codigo'] . '</td>
                            <td>' . $row['tipoInmueble'] . '</td>
                            <td>' . $row['nombre'] . '</td>
                            <td>' . $row['nivel_piso'] . '</td>
                            <td>' . $row['area'] . ' m²</td>
                            <td>' . $row['estrato'] . '</td>
                            <td>' . $row['municipio'] . '</td>
                            <td style="text-transform: uppercase;">' . $row['Barrio'] . '</td>
                            <td>' . $row['terraza'] . '</td>
                            <td>' . $row['ascensor'] . '</td>
                            <td>' . $row['patio'] . '</td>
                            <td>' . $row['parqueadero'] . '</td>
                            <td>' . $row['cuarto_util'] . '</td>
                            <td>' . $row['alcobas'] . '</td>
                            <td>' . $row['closet'] . '</td>
                            <td>' . $row['sala'] . '</td>
                            <td>' . $row['sala_comedor'] . '</td>
                            <td>' . $row['comedor'] . '</td>
                            <td>' . $row['cocina'] . '</td>
                            <td>' . $row['servicios'] . '</td>
                            <td>' . $row['CuartoServicios'] . '</td>
                            <td>' . $row['ZonaRopa'] . '</td>
                            <td>' . $row['vista'] . '</td>
                            <td>' . $row['servicios_publicos'] . '</td>
                            <td>' . $row['otras_caracteristicas'] . '</td>
                            <td>' . $row['direccion'] . '</td>
                            <td>' . $row['TelefonoInmueble'] . '</td>
                            <td>' . number_format($row['valor_canon'], $decimales, $separador_decimal, $separador_miles) . '</td>
                            <td>' . $row['doc_propietario'] . '</td>
                            <td>' . $row['nombre_propietario'] . '</td>
                            <td>' . $row['telefono_propietario'] . '</td>
                            <td>' . $row['banco'] . '</td>
                            <td>' . $row['tipoCuenta'] . '</td>
                            <td>' . $row['numeroCuenta'] . '</td>
                            <td>' . $row['diaPago'] . '</td>
                            <td>' . $row['doc_inquilino'] . '</td>
                            <td>' . $row['nombre_inquilino'] . '</td>
                            <td>' . $row['telefono_inquilino'] . '</td>
                            <td>' . $row['email_inquilino'] . '</td>
                            <td>' . $row['fecha'] . '</td>
                            <td>' . number_format($row['descuento'], $decimales, $separador_decimal, $separador_miles) . '</td>
                            <td>' . $row['iva'] . '</td>
                            <td>' . $row['contrato_EPM'] . '</td>
                            <td>' . $row['comision'] . '</td>
                            <td>' . $row['aval_catastro'] . '</td>
                            <td>' . $row['asistencia'] . '</td>
                            <td>' . $row['cc_codeudor_uno'] . '</td>
                            <td>' . $row['nombre_codeudor_uno'] . '</td>
                            <td>' . $row['cc_codeudor_dos'] . '</td>
                            <td>' . $row['nombre_codeudor_dos'] . '</td>
                            <td>' . $row['cc_codeudor_tres'] . '</td>
                            <td>' . $row['nombre_codeudor_tres'] . '</td>
                            <td>' . $row['estadoPropietario'] . '</td>
                            <td>' . $row['condicion'] . '</td>
                            <td>' . $row['fecha_creacion'] . '</td>
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
    <!-- Asegúrate de que la librería de XLSX esté cargada correctamente -->
    <script type="text/javascript">
        function exportTableToXLSX(tableId, filename) {
            var table = document.getElementById(tableId);
            if (!table) {
                console.error('No se encontró la tabla con el ID:', tableId);
                return;
            }

            // Convertir la tabla a un formato de hoja de cálculo
            var wb = XLSX.utils.table_to_book(table, {
                sheet: "Sheet1"
            });

            // Exportar el archivo
            XLSX.writeFile(wb, filename + '.xlsx');
        }
    </script>