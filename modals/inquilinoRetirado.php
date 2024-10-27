    <!-- Modal de mensaje retirados-->
    <div class="modal fade " id="mensajeRetirado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AVISO IMPORTANTE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">¡Muy bien!
                        <br>
                        Acabas de limpiar los campos del inquilino, ahora debes actualizar el Propietario
                        para guardar los cambios. <br>Gracias.
                    </h4>
                </div>
                <div class="modal-footer">
                    
                <button onclick="presionarBoton()" class="btn btn-outline-success w-100" >Actualizar propietario</button>
                                           
            </div>
            </div>
        </div>
    </div>
    <script>
        //despues de limpiar los campos del inquilino la siguiente funcion presiona el boton verde de actualizar
    function presionarBoton() {
  document.getElementById("updateProprieter").click();
}</script>