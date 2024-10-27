<div class="col col-lg-3 col-md-6 col-sm-12">
    <div class="card border-warning mb-3 shadow rounded bg-transparent " style="max-width: 100%;">
        <div class="card-header text-center bg-warning text-black">Reparaciones pendientes</div>
        <div class="card-body text-warning text-center">
            <?php
            // Consulta MySQL para contar la cantidad de datos
            $sql = "SELECT COUNT(*) AS cantidad FROM report WHERE estadoReporte = 'PENDIENTE'";
            $resultado = mysqli_query($con, $sql);

            // Obtener el resultado de la consulta
            $fila = mysqli_fetch_assoc($resultado);
            $cantidad = $fila['cantidad'];

            // Mostrar la cantidad de datos
            echo "<h1 class='card-title'><i class='bi bi-exclamation-triangle-fill'></i> ".$cantidad."</h1>";
            ?>
         </div>
    </div>
</div>