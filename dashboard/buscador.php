
<div class="row">
    <?php 
include './conexion.php';

    // Obtener los valores de los filtros
$tipo = $_POST['tipo'];
$ciudad = $_POST['ciudad'];
$precio = $_POST['precio'];

// Construir la consulta SQL con los filtros
$sql = "SELECT * FROM houses";
if (!empty($tipo)) {
    $sql .= " AND codigo = '$tipo'";
}
if (!empty($ciudad)) {
    $sql .= " AND tipoVivienda = '$ciudad'";
}
if (!empty($precio)) {
    $sql .= " AND municipio = '$precio'";
}

// Ejecutar la consulta
$resultado = mysqli_query($con, $sql);

// Mostrar los resultados
if(mysqli_num_rows($resultado) > 0){
    while($houses = mysqli_fetch_assoc($resultado)){
        // Mostrar los resultados como desees
        echo '    <div class="card col-md-3 shadow-sm p-3 bg-white rounded mt-0">
  
        <div class="img-container">
        <img src="'.$houses['img1'].'" alt="portada" width="100%"> 
          <h3 class="prop-state">'.$houses['tipoVivienda'].'</h3>
        </div>
        <div class="prop-info">
        <a href="main.php?aksi=delete&nik=' . $houses['codigo'] . '" title="Eliminar Vivienda" onclick="return confirm(\'Esta seguro de borrar la vivienda ' . $houses['nombre'] .'?\')" class="btn btn-outline-danger btn-md float-right m-1"><span class="fa fa-trash" aria-hidden="true"></span></a>
        <a href="updateHouses.php?nik=' . $houses['id'] . '" title="Actualizar Vivienda" class="btn btn-outline-warning btn-md float-right m-1"><span class="fa fa-edit" aria-hidden="true"></span></a>
         
          <h2 class="prop-title">'.$houses['nombre'].'</h2>
        <h3 class="prop-address">'.$houses['descripcion'].'</h3>
          <p class="prop-price">$'.$houses['valor'].'</p>
        </div>
        <div class="prop-aditional">
          <div class="additional-sec">
          <p class="prop-text"><img src="../images/icons/toilet.png" width="30px"></p>
          <p class="prop-text">Baños</p>
            <h4 class="prop-numb">'.$houses['banos'].'</h4>
            
          </div>
          <div class="additional-sec">
          <p class="prop-text"><img src="../images/icons/kitchen.png" width="30px"></p>
          <p class="prop-text">Cocina</p>
            <p class="prop-numb">'.$houses['cocina'].'</p>
          </div>
          <div class="additional-sec">
          <p class="prop-text"><img src="../images/icons/bed.png" width="30px"></p>
            <p class="prop-text">Alcobas</p> 
            <p class="prop-numb">'.$houses['dormitorios'].'</p>
          </div> 
          
        </div>
      </div>';
    }
} else{
    echo "<p>No se encontraron resultados</p>";
}
    ?>
</div>