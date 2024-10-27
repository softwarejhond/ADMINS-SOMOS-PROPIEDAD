<div class="row">
    <div class="col col-md-12 col-sm-12">
        <div class="card text-center">
            <div class="card-header" style="background-color:#123960; color:#ffffff">
            <i class="bi bi-pin-map-fill"></i> LISTA DE BARRIOS REGISTRADOS <i class="bi bi-pin-map-fill"></i>
            </div>
            <div class="card-body">
                <table id="myTable" class=" table table-hover table-bordered table-lg table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th class="w-25">Código</th>
                            <th class="w-50">Nombre del Barrio</th>

                            <th class="w-25"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$buscar = $_POST["buscador"];
$usaurio = htmlspecialchars($_SESSION["identificacion"]);
if ($filter) {
    $sql = mysqli_query($con, "SELECT * FROM barrios WHERE codigo like '%$buscar%' ORDER BY barrio ASC");
} else {
    $sql = mysqli_query($con, "SELECT * FROM barrios WHERE codigo like '%$buscar%' ORDER BY barrio ASC");
}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '

						  <tr style="font-size:12px">
						    <td>' . $no . '</td>
                            <td>' . $row['codigo'] . '</td>
                            <td>' . $row['barrio'] . '</td>
                            <td><a href="viewBarrios.php?aksi=delete&nik=' . $row['codigo'] . '" title="Eliminar Vivienda" onclick="return confirm(\'Esta seguro de borrar el barrio ' . $row['barrio'] .'?\')" class="btn btn-outline-danger btn-md float-right "><span class="fa fa-trash" aria-hidden="true"></span></a>
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
        </script>
    </div>
</div>