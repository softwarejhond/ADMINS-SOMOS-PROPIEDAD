<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

<style>




.prop-state{
  margin: 0;
  display: inline;
  background: #008fb3;
  color:#ffffff;
  padding: .2em 1em;
  border-radius: 15px;
  position: absolute;
  top: 1em;
  left: 1em;
  
  -webkit-box-shadow: 2px 2px 4px 1px rgba(0,0,0,0.5);
  -moz-box-shadow: 2px 2px 4px 1px rgba(0,0,0,0.5);
  box-shadow: 2px 2px 4px 1px rgba(0,0,0,0.5);
}


.prop-title{
    margin: 0;
  font-size: 1.8em;
  font-weight: bold;
  color: #008fb3;
  margin: .4em 0;
}

.prop-address{
  font-size: 1.0em;
  margin: .5em 0;
}

.prop-price{
  font-size: 1.8em;
  font-weight: bold;
  color: #008fb3;
  margin: .4em 0;
}

.prop-aditional{
  display: flex;
  height: 
}

.additional-sec{
  width: 33%;
 // border: 1px solid #444444;
}

.prop-numb{
  margin: 0;
  text-align: center;
  font-size: 1.0em;
  font-weight: bold;
  color: #008fb3;
  margin: .4em 0;
}
.prop-text{
    margin: 0;
  text-align: center;
  font-size: 1.0em;
  font-weight: bold;
  color: #000;
  margin: .4em 0;
}
</style>
<div class="">
    <div class="card-header text-center" style="background-color:#FFD500">
        <i class="fas fa-home text-center"></i> LISTA DE VIVIENDAS DISPONIBLES <i class="fas fa-home"></i>
    </div>
    <br>
    <div class="row">
        <?php
        $query = mysqli_query($con,"SELECT * FROM houses");
        while ($houses = mysqli_fetch_array($query)) {
          echo '
    <div class="card col-lg-3 shadow-sm p-3 mb-5 bg-white rounded mr-md-1">
  
  <div class="img-container">
  <img src="'.$houses['img1'].'" alt="portada" width="100%"> 
    <h3 class="prop-state">'.$houses['tipoVivienda'].'</h3>
  </div>
  <div class="prop-info">
  <a href="main.php?aksi=delete&nik=' . $houses['codigo'] . '" title="Eliminar Vivienda" onclick="return confirm(\'Esta seguro de borrar la vivienda ' . $houses['nombre'] .'?\')" class="btn btn-outline-danger btn-md float-right "><span class="fa fa-trash" aria-hidden="true"></span></a>
   
    <h2 class="prop-title">'.$houses['nombre'].'</h2>
  <h3 class="prop-address">'.$houses['descripcion'].'</h3>
    <p class="prop-price">$'.$houses['valor'].'</p>
  </div>
  <div class="prop-aditional">
    <div class="additional-sec">
    <p class="prop-text"><img src="images/icons/toilet.png" width="30px"></p>
    <p class="prop-text">Baños</p>
      <h4 class="prop-numb">'.$houses['banos'].'</h4>
      
    </div>
    <div class="additional-sec">
    <p class="prop-text"><img src="images/icons/kitchen.png" width="30px"></p>
    <p class="prop-text">Cocina</p>
      <p class="prop-numb">'.$houses['cocina'].'</p>
    </div>
    <div class="additional-sec">
    <p class="prop-text"><img src="images/icons/bed.png" width="30px"></p>
      <p class="prop-text">Alcobas</p>
      <p class="prop-numb">'.$houses['dormitorios'].'</p>
    </div> 
    
  </div>
</div>';
                              }
                              
                                ?>

    </div>
    <div class="card-footer text-center" style="background-color:#FFD500">
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