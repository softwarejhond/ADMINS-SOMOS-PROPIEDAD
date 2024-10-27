<div class="card text-center">
    <div class="card-header" style="background-color:#123960; color:#ffffff">
        <i class="bi bi-people-fill"></i> LISTA DE INQUILINOS RETIRADOS <i class="bi bi-people-fill"></i>
    </div>
    <div class="card-body">
        <a href="#" class="btn btn-success btn-lg" onclick="tableToExcel('testTable', 'Inquilinos Retirados')" title="Exportar base de datos a Excel"><i class="fa fa-file-excel"></i> Exportar a Excel</a>
<br>
        <table id="testTable" class=" table table-sm table-hover table-bordered table-lg table-responsive">
            <thead class="thead-dark">
                <tr>

                    <th style="width: 100px;">Código </th>
                    <th style="width: 150px;">Identificación</th>
                    <th style="width: 300px;">Nombre</th>
                    <th style="width: 200px;">Teléfono</th>
                    <th style="width: 300px;">Email</th>
                    <th style="width: 150px;">Fecha ingreso</th>
                    <th style="width: 150px;">Fecha retiro</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $buscar = $_POST["buscador"];
                $usaurio = htmlspecialchars($_SESSION["codigo"]);
                if ($filter) {
                    
                    $sql = mysqli_query($con, "SELECT * FROM tenant ORDER BY fechaRetiro DES"); 
                } else {
                    $sql = mysqli_query($con, "SELECT * FROM tenant ORDER BY fechaRetiro DES"); 
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
                            <td>' . $row['codigoPropiedad'] . '</td>
                            <td>' . $row['identificacionInquilino'] . '</td>
                            <td>' . $row['nombreInquilino'] . '</td>
                            <td>' . $row['telefonoInquilino'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['fechaIngreso'] . '</td>
                            <td>' . $row['fechaRetiro'] . '</td>
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
                worksheet: name || 'Retirados',
                table: table.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
</script>