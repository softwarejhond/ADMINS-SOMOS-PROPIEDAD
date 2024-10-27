<div class="card text-center">
    <div class="card-header" style="background-color:#123960; color:#ffffff">
        <i class="bi bi-people-fill"></i> LISTA DE PROPIETARIOS RETIRADOS <i class="bi bi-people-fill"></i>
    </div>
    <div class="card-body">
        <table id="myTableR" class=" table table-sm table-hover table-bordered table-lg table-responsive">
            <thead class="thead-dark">
                <tr>
                    
                    <th class="w-10">V</th>
                    <th class="w-10">Código</th>
                    <th class="w-25">Fecha Ingreso</th>
                    <th class="w-25">Fecha Retiro</th>
                    <th class="w-25">Propietario</th>
                    <th class="w-25">Teléfono</th>
                    <th class="w-25">Municipio</th>
                    <th class="w-25">Barrio</th>
                    <th class="w-25">Dirección</th>
                    <th class="w-10"></th>
                    <th class="w-10"></th>
                </tr>
            </thead>
            <tbody>
                <?php

$buscar = $_POST["buscador"];
$usaurio = htmlspecialchars($_SESSION["codigo"]);
if ($filter) {
    //INNER JOING DEMASIADO IMPORTANTE PARA TRAER EL NOMBRE DEL MUNICIPIO
    $sql = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo like '%$buscar%' AND estadoPropietario='INACTIVO'  ORDER BY fecha_creacion DESC"); 
} else {
    $sql = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE codigo like '%$buscar%' AND estadoPropietario='INACTIVO' ORDER BY fecha_creacion DESC");
}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    $activo="";
    while ($row = mysqli_fetch_assoc($sql)) {
        //condicion para cambiar el color en la tabla segun el valor 
        if ($row['estadoPropietario']=="ACTIVO"){
           $activo=  '<label class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="PROPIETARIO: '.$row['estadoPropietario'].'" ><i class="fa-solid fa-lock-open"></i></label>';
        }
        if ($row['estadoPropietario']=="INACTIVO"){
            $activo=  '<label class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="PROPIETARIO: '.$row['estadoPropietario'].'"><i class="fa-solid fa-lock"></i></label>';
         }

        echo '

						  <tr style="font-size:12px">
						    
                            <td>' . $row['v'] . '</td>
                            <td>' . $row['codigo'] . '</td>
                            <td>' . $row['fecha'] . '</td>
                            <td>' . $row['fecha_creacion'] . '</td>
                            <td>' . $row['nombre_propietario'] . '</td>
                            <td>' . $row['telefono_propietario'] . '</td>
                            <td>' . $row['municipio'] . '</td>
                            <td style="text-transform: uppercase;">' . $row['Barrio'] . '</td>
                            <td>' . $row['direccion'] . '</td>
                            <td>' . $activo. '</td>
                            <td><a href="updatePropietario.php?nik='.$row['id'].'" title="Actualizar propietario" class="btn btn-outline-info btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            
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