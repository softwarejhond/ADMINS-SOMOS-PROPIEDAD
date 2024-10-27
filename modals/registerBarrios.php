<?php
                        
                        if(isset($_POST['btnAddBarrios'])){
                           
                            $barrio = mysqli_real_escape_string($con,(strip_tags($_POST["txtBarrio"],ENT_QUOTES)));//Escanpando caracteres  
                            $codigo_barrio = mysqli_real_escape_string($con,(strip_tags($_POST["codigoBarrio"],ENT_QUOTES)));//Escanpando caracteres 
                            $codigo_municipio = mysqli_real_escape_string($con,(strip_tags($_POST["municipiosBarrios"],ENT_QUOTES)));//Escanpando caracteres 
                            
                            $cek = mysqli_query($con, "SELECT * FROM barrios WHERE codigo='$codigo_barrio'");
                           
                            if(mysqli_num_rows($cek) == 0){
                                    $insert = mysqli_query($con, "INSERT INTO barrios(barrio, codigo, codigo_municipio) VALUES 
                                    ('$barrio','$codigo_barrio','$codigo_municipio')");
                                    if($insert){
                                        echo '
                                        <script>alert("Barrio registrado con éxito");</script>
                                        <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                        <div class="toast-header  ">
                                            <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                          
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="toast-body alert-success">
                                            <h5> <b>Barrio registrado con éxito</b></h5>
                                       
                                        </div>
                                    </div>
                                   ';
                                    } else{
                                        echo '<script>alert("Error al registar el barrio, intenta nuevamente");</script>
                                        <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                            <div class="toast-header  ">
                                                <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                              
                                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="toast-body alert-danger">
                                                <h5> <b>Hubo problemas en el registro del barrio, intenta nuevamente</b></h5>
                                           
                                            </div>
                                        </div>
                                   ';
                                        
                                    }
                                 
                            }else{
                                echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. el código de la vivienda ya existe!</div>';
                            }
                        }
                        ?>
<form method="post" class="was-validated">

    <!-- Modal register barrios -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE BARRIO NUEVO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <label style="color:#000" class="text-left">Seleccione el departamento *</label><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="images/icons/colombia.png"
                                    width="24px" alt="colombia">
                            </span>
                        </div>
                        <select id="lista_departamentoBarrio" name="addDepartamento"
                            class="form-control form-select-lg custom-selec text-bg-dark" required="true"></select>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="images/icons/map.png"
                                    width="24px" alt="mapa">
                            </span>
                        </div>
                        <select id="municipiosBarrios" name="municipiosBarrios"
                            class="form-control form-select-lg custom-selec text-bg-dark" required="true"></select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="images/icons/playground.png"
                                    width="24px" alt="barrio">
                            </span>
                        </div>
                        <input type="text" name="txtBarrio" class="form-control" placeholder="Nombre del barrio"
                            style="text-transform: capitalize;" required="true">

                    </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="images/icons/playground.png"
                                    width="24px" alt="barrio">
                            </span>
                        </div>
                        <input type="text" name="codigoBarrio" id="codigoBarrio" class="form-control" placeholder="Codigo del barrio"
                            style="text-transform: capitalize;" required="true">

                    </div>
                    <input type="submit" name="btnAddBarrios" class="btn btn-outline-success"
                        value="Registrar Barrio" require>
                    <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                </div>

            </div>
        </div>
    </div>

</form>
<script type="text/javascript" src="js/add-barrios.js?v=0.0.2"></script>
<script>
$(document).ready(function() {
    $(".toastPaciente").toast('show');
});
</script>
<script>
    let abecedario =['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];
function codigoAleatorio() {
  let cd='';
  for(i = 1; i<=15;i++){
    cd += abecedario[(Math.random()*(abecedario.length-1)).toFixed(0)];
  }
  document.getElementById('codigoBarrio').value=cd;
}
codigoAleatorio();
</script>
