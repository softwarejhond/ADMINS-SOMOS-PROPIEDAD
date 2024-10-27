<div class="card text-center">
     <div class="card-header" style="background-color:#123960; color:#ffffff">
     <i class="fa-solid fa-business-time"></i> LISTA DE RETIROS PROGRAMADOS <i class="fa-solid fa-business-time"></i>
     </div>
     <div class="card-body">
         <table id="myTable" class=" table table-hover table-bordered table-lg table-responsive">
             <thead class="thead-dark">
                 <tr>
                     <th>#</th>
                     <th class="w-10">Codigo </th>
                     <th class="w-50">Propietario </th>
                     <th class="w-20">Identificación </th>
                     <th class="w-50">Nombre </th>
                     <th class="w-20">Teléfono </th>
                     <th class="w-50">Email </th>
                     <th class="w-50">Fecha programada</th>
                     <th class="w-50">Eliminar</th>
                 </tr>
             </thead>
             <tbody>
                 <?php

$buscar = $_POST["buscador"];
$usaurio = htmlspecialchars($_SESSION["identificacion"]);
if ($filter) {
    $sql = mysqli_query($con, "SELECT * FROM retiredTenants AS R INNER JOIN proprieter AS P ON R.codigoPropiedad = P.codigo WHERE codigoPropiedad like '%$buscar%' ORDER BY fechaRetiro ASC");
} else {
    $sql = mysqli_query($con, "SELECT * FROM retiredTenants AS R INNER JOIN proprieter AS P ON R.codigoPropiedad = P.codigo WHERE codigoPropiedad like '%$buscar%' ORDER BY fechaRetiro ASC");
}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '

						  <tr style="font-size:12px">
						    <td>' . $no . '</td>
                            <td>' . $row['codigoPropiedad'] . '</td>
                            <td>' . $row['nombre_propietario'] . '</td>
                            <td>' . $row['IdInquilino'] . '</td>
                            <td>' . $row['NombreInquilino'] . '</td>
                            <td>' . $row['telefonoInquilino'] . '</td>
                            <td>' . $row['emailInquilino'] . '</td>
                            <td>' . $row['fechaRetiro'] . '</td>
                            <td><a href="viewRetirosProgramados.php?aksi=delete&nik=' . $row['registro'] . '&cod='.$row['codigoPropiedad'].'" title="Eliminar fecha programada" onclick="return confirm(\'Esta seguro de borrar la fecha ' . $row['fechaRetiro'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>

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
            $(".toastNotification").toast('show');
        });
</script>
