<div class="row">
  <?php
  include '../conexion.php';

  //aqui inicia en crear la paginacion para las tarjetas

  $tarjetasPorPagina = 6; // Cambia esto según tu preferencia
  $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
  $inicio = ($paginaActual - 1) * $tarjetasPorPagina;
  $tipoVivienda = $_POST['condicion'];
  if (isset($_GET['busqueda'])) {


    $busqueda = $_GET['busqueda'] ?? '';
    $condicion = $_GET['condicion'] ?? '';
    $departamento = $_GET['departamento'] ?? '';
    $municipioSelect = $_GET['municipioSelect'] ?? '';
    $municipio = $_GET['municipioSelect'] ?? '';
    $habitaciones = $_GET['habitaciones'] ?? '';
    $where = array();

    /*if (!empty($busqueda)) {
      $where[] = "codigo LIKE '%$busqueda%' AND nombre_inquilino='' AND estadoPropietario='ACTIVO' LIMIT $inicio, $tarjetasPorPagina ";
    }

    if (!empty($condicion)) {
      $where[] = "condicion LIKE '%$condicion%' AND nombre_inquilino='' AND estadoPropietario='ACTIVO' LIMIT $inicio, $tarjetasPorPagina ";
    }
    if (!empty($municipioSelect)) {
      $where[] = "id_municipio LIKE '%$municipioSelect%' AND nombre_inquilino='' AND estadoPropietario='ACTIVO' LIMIT $inicio, $tarjetasPorPagina  ";
    }
    if (!empty($habitaciones)) {
      $where[] = "alcobas LIKE '%$habitaciones%' AND nombre_inquilino='' AND estadoPropietario='ACTIVO' LIMIT $inicio, $tarjetasPorPagina  ";
    }*/
    $sql = "SELECT * FROM proprieter p INNER JOIN municipios m ON p.Municipio = m.id_municipio  WHERE 1=1 AND nombre_inquilino='' AND estadoPropietario='ACTIVO'";
    if (!empty($busqueda)) {
      $sql .= " AND codigo = '$busqueda'";
    }
    if (!empty($condicion)) {
      $sql .= " AND condicion = '$condicion'";
    }
    if (!empty($municipioSelect)) {
      $sql .= " AND id_municipio = '$municipioSelect'";
    }
    if (!empty($habitaciones)) {
      $sql .= " AND alcobas = '$habitaciones'";
    }

    $sql .= " LIMIT $inicio, $tarjetasPorPagina";
    $resultado = mysqli_query($con, $sql);

    // Consulta para obtener los datos filtrados por el término de búsqueda
    //$sql = "SELECT * FROM proprieter WHERE codigo LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR condicion LIKE '%condicion%'";
    $result = $con->query($sql);

    // Obtener el número total de tarjetas para la paginación
    $totalTarjetas = "SELECT COUNT(*) as total FROM proprieter WHERE codigo  LIKE '%$busqueda%' OR condicion LIKE '%$condicion%'  OR Municipio LIKE '%$municipio%' OR alcobas LIKE '%$habitaciones%'  AND nombre_inquilino='' AND estadoPropietario='ACTIVO' LIMIT $inicio, $tarjetasPorPagina  ";
    $totalResult = $con->query($totalTarjetas);
    $totalRow = $totalResult->fetch_assoc();
    $totalPaginas = ceil($totalRow['total'] / $tarjetasPorPagina);
  }
  //aqui finaliza en crear la paginacion para las tarjetas


  // Mostrar los resultados
  while ($houses = mysqli_fetch_assoc($result)) {
    echo '    <div class="card col-md-6 shadow-sm p-3 bg-white rounded mt-0">
            <div class="img-container">
            <img src="' . $houses['foto1'] . '" alt="portada" class="text-center" width="100%" height="300px">
             
              <h3 class="prop-state">' . $houses['condicion'] . ' 
                <div class="spinner-grow text-success r float-right spinner-grow-sm " role="status">
                 <span class="sr-only text-right">Loading...</span>
                </div>
              </h3>
            </div>
            <div class="prop-info">
              <h2 class="prop-title">' . $houses['tipoInmueble'] . ' - ' . $houses['codigo'] . '</h2>
              <h2 class="prop-title">' . $houses['municipio'] . '</h2>
              <h3 class="prop-address">' . $houses['otra_caracteristicas'] . '</h3>
              <p class="prop-price">$' . $houses['valor_canon'] . '</p>
            </div>
            <div class="prop-aditional">
              <div class="additional-sec">
              <p class="prop-text"><img src="../images/icons/toilet.png" width="30px"></p>
              <p class="prop-text">Baños</p>
                <h4 class="prop-numb">' . $houses['servicios'] . '</h4>
                
              </div>
              <div class="additional-sec">
              <p class="prop-text"><img src="../images/icons/kitchen.png" width="30px"></p>
              <p class="prop-text">Cocina</p>
                <p class="prop-numb">' . $houses['cocina'] . '</p>
              </div>
              <div class="additional-sec">
              <p class="prop-text"><img src="../images/icons/bed.png" width="30px"></p>
                <p class="prop-text">Alcobas</p> 
                <p class="prop-numb">' . $houses['alcobas'] . '</p>
              </div> 
              
            </div>
          </div>';
  }

  ?>
</div>
