<div class="card text-center">
     <div class="card-header" style="background-color:#123960; color:#ffffff">
     <i class="bi bi-tools"></i> LISTA DE REPARADORES REGISTRADOS <i class="bi bi-tools"></i>
     </div>
     <div class="card-body">
         <table id="myTable" class=" table table-hover table-bordered table-lg table-responsive">
             <thead class="thead-dark">
                 <tr>
                     <th>#</th>
                     <th>Identificacion</th>
                     <th class="w-25">Nombre</th>
                     <th class="w-10">Teléfono</th>
                     <th class="w-50">Email</th>
                     <th class="w-50">Profesión</th>
                     <th class="w-50">Estado</th>
                     <th class="w-50">Creado</th>
                     <th class="w-50"> </th>
                     <th class="w-50"> </th>
                 </tr>
             </thead>
             <tbody>
                 <?php

$buscar = $_POST["buscador"];
$usaurio = htmlspecialchars($_SESSION["identificacion"]);
if ($filter) {
    $sql = mysqli_query($con, "SELECT * FROM repairmen WHERE identificacion like '%$buscar%' ORDER BY id ASC");
} else {
    $sql = mysqli_query($con, "SELECT * FROM repairmen WHERE identificacion like '%$buscar%' ORDER BY id ASC");
}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '

						  <tr style="font-size:12px">
						    <td>' . $no . '</td>
                            <td>' . $row['identificacion'] . '</td>
                            <td>' . $row['nombre'] . '</td>
                            <td>' . $row['telefono'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['profesion'] . '</td>
                            <td>' . $row['estado'] . '</td>
                            <td>' . $row['fecha_creacion'] . '</td>
                            <td><a href="updateReparador.php?nik='.$row['identificacion'].'" title="Actualizar reparador" class="btn btn-outline-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            <td><a href="viewReparadores.php?aksi=delete&nik=' . $row['identificacion'] . '" title="Eliminar reparador" onclick="return confirm(\'Esta seguro de borrar a ' . $row['nombre'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>

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
</script>
