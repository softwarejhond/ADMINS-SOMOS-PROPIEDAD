<div class="card text-center">
    <div class="card-header" style="background-color:#123960; color:#ffffff">
    <i class="bi bi-houses-fill"></i> LISTA DE PROPIEDADES DISPONIBLES <i class="bi bi-houses-fill"></i>
    </div>
    <div class="card-body">
        <table id="myTableD" class=" table table-sm table-hover table-bordered table-lg table-responsive">
            <thead class="thead-dark">
                <tr>

                    <th class="w-10">V</th>
                    <th class="w-10">Cd</th>
                    <th style="width: 150px;">Inmueble</th>
                    <th style="width: 350px;">Propietario</th>
                    <th style="width: 100px;">Teléfono</th>
                    <th style="width: 100px;">Municipio</th>
                    <th style="width: 300px;">Barrio</th>
                    <th style="width: 350px;">Dirección</th>
                    <th style="width: 100px;">Día pago</th>
                    <th style="width: 350px;">Inquilino</th>
                    <th style="width: 100px;">Teléfono</th>
                    <th style="width: 80px;"></th>
                    <th style="width: 80px;"></th>
                    <th style="width: 80px;"></th>
                </tr>
            </thead>
            <tbody style="height: 300px;">
                <?php

                $buscar = $_POST["buscador"];
                $usaurio = htmlspecialchars($_SESSION["codigo"]);
                if ($filter) {
                    //INNER JOING DEMASIADO IMPORTANTE PARA TRAER EL NOMBRE DEL MUNICIPIO
                    $sql = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo like '%$buscar%' AND nombre_inquilino='' AND estadoPropietario='ACTIVO' ORDER BY nombre_propietario ASC");
                } else {
                    $sql = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo like '%$buscar%' AND nombre_inquilino='' AND estadoPropietario='ACTIVO' ORDER BY nombre_propietario ASC");
                }
                if (mysqli_num_rows($sql) == 0) {
                    echo '<tr><td colspan="8">No hay datos.</td></tr>';
                } else {
                    $no = 1;
                    $activo = "";
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
                            <td>' . $row['nombre_propietario'] . '</td>
                            <td>' . $row['telefono_propietario'] . '</td>
                            <td>' . $row['municipio'] . '</td>
                            <td style="text-transform: uppercase;">' . $row['Barrio'] . '</td>
                            <td>' . $row['direccion'] . '</td>
                            <td>' . $row['diaPago'] . '</td>
                            <td>' . $row['nombre_inquilino'] . '</td>
                            <td>' . $row['telefono_inquilino'] . '</td>
                            <td>' . $activo . '</td>
                            <td><a href="updatePropietario.php?nik=' . $row['id'] . '" title="Actualizar propietario" class="btn btn-outline-info btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            <td>
                            <div class="btn-group dropleft">
                            <button class="btn btn-outline-danger dropdown-toggle "  data-placement="top" title="Documentación" type="button" data-toggle="dropdown" aria-expanded="false"></button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="printCartaVienvenida.php?nik=' . $row['id'] . '">Carta de bienvenida</a>
                              <a class="dropdown-item" href="printContratoVivienda.php?nik=' . $row['id'] . '">Contrato de vivienda urbana</a>
                              <a class="dropdown-item" href="printContratoComercial.php?nik=' . $row['id'] . '">Contrato comercial</a>
                              <a class="dropdown-item" href="printContratoAdministracion.php?nik=' . $row['id'] . '">Contrato de administración</a>
                              <a class="dropdown-item" href="viewInformation.php?nik=' . $row['codigo'] . '">Ficha técnica ⭐️</a>
                           
                              </div>
                          </div>
                          </td>
                            
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