<div class="card text-center">
     <div class="card-header" style="background-color:#123960; color:#ffffff">
     <i class="bi bi-tools"></i> LISTA DE REPARACIONES ATENDIDAS  <i class="bi bi-tools"></i>
     </div>
     <div class="card-body">
         <table id="myTable" class=" table table-hover table-bordered table-lg table-responsive">
             <thead class="thead-dark">
                 <tr class="align-middle">
                     <th class="w-20"><i class="fa-solid fa-qrcode" title="Código"></i> Código</th>
                     <th style="width: 100px;"><i class="fa-solid fa-calendar-days" title="Fecha"></i> Fecha</th>
                     <th style="width: 300px;">Propietario</th>
                     <th style="width: 300px;">Dirección</th>
                     <th style="width: 200px;">Teléfono Propietario</th>
                     <th style="width: 300px;">Inquilino</th>
                     <th style="width: 200px;">Teléfono Inquilino</th>
                     <th style="width: 100px;"><i class="fa-solid fa-dollar-sign"></i> Valor factura</th>
                     <th style="width: 100px;"><i class="fa-solid fa-dollar-sign"></i> Valor Servicio</th>
                     <th style="width: 100px;"><i class="fa-solid fa-dollar-sign"></i> Total</th>
                     <th style="width: 100px;"><i class="fa-solid fa-triangle-exclamation"></i>Estado</th>
                     <th style="width: 70px;"><i class="fa-solid fa-person-digging" title="Reparadores"></i></th>
                     <th style="width: 70px;"><i class="fa-solid fa-print" title="Imprimir certificado"></i></th>
                     <th style="width: 70px;"><i class="fa-solid fa-pen-to-square" title="Editar reparación"></i></th>
                 </tr>
             </thead>
             <tbody>
                 <?php

$buscar = $_POST["buscador"];
$usaurio = htmlspecialchars($_SESSION["identificacion"]);
if ($filter) {
    //union de 3 tablas para mostrar el nombre del propietario, inquilino, y en el boton con el ojo ver el nombre del reparador
    $sql = mysqli_query($con, "SELECT * FROM report INNER JOIN proprieter ON report.codigo_propietario = proprieter.codigo INNER JOIN repairmen ON report.id_reparador=repairmen.identificacion WHERE EstadoReporte='ATENDIDO'"); 
} else {
    $sql = mysqli_query($con, "SELECT * FROM report INNER JOIN proprieter ON report.codigo_propietario = proprieter.codigo INNER JOIN repairmen ON report.id_reparador=repairmen.identificacion WHERE EstadoReporte='ATENDIDO'"); 

}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {

      
    $no = 1;
    while ($row = mysqli_fetch_assoc($sql)) {
        
        echo '

						  <tr style="font-size:12px">
                            <td>' . $row['codigo'] . '</td>
                            <td>' . $row['fechaReporte'] . '</td>
                            <td>' . $row['nombre_propietario'] . '</td>
                            <td>' . $row['direccion'] . '</td>
                            <td>' . $row['telefono_propietario'] . '</td>
                            <td>' . $row['nombre_inquilino'] . '</td>
                            <td>' . $row['telefono_inquilino'] . '</td>
                            <td>' . $row['valorFactura'] . '</td>
                            <td>' . $row['valorServicio'] . '</td>
                            <td>' . $row['totalPagar'] . '</td>
                            <td>' . $row['EstadoReporte'] . '</td>
                            <td><a href="verReparador.php?nik='.$row['id_reparador'].'" data-toggle="tooltip" data-placement="top" title="REPORTE: '.$row['situacionReportada'].'" class="btn btn-outline-danger btn-sm"><i class="bi bi-eye-fill"></i> </a></td>
                            <td><a href="printCertificaties.php?nik=' .$row['id'].'&code='.$row['codigo_propietario'].'&repairmen='.$row['id_reparador'].'&reparacion='.$row['numeroReporte'].'"id="send" title="Imprimir certificado" class="btn btn-outline-success btn-sm"><span class="fa fa-print" aria-hidden="true"></span></a></td>
                            <td><a href="updateReparacion.php?niks='.$row['numeroReporte'].'" title="Actualizar reparación" class="btn btn-outline-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            
                          </tr>


						';
        $no++;
    }
}
?>
             </tbody>
         </table>
     </div>
     <div class="card-footer "style="background-color:#123960; color:#ffffff">
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

        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
