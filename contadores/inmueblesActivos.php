<div class="col col-lg-3 col-md-6 col-sm-12">
    <div class="card border-success mb-3 shadow rounded bg-transparent" style="max-width: 100%;">
        <div class="card-header text-center bg-success text-white">Inmuebles activos</div>
        <div class="card-body text-success text-center">
            <?php
            // Consulta MySQL para contar la cantidad de datos
            $sql = "SELECT COUNT(*) AS cantidad FROM proprieter WHERE estadoPropietario = 'ACTIVO'";
            $resultado = mysqli_query($con, $sql);

            // Obtener el resultado de la consulta
            $fila = mysqli_fetch_assoc($resultado);
            $cantidad = $fila['cantidad'];

            // Mostrar la cantidad de datos
            echo "<h1 class='card-title'><i class='bi bi-house-check-fill'></i> ".$cantidad."</h1>";
            ?>
         </div>
    </div>
</div>