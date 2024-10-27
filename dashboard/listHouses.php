<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

<style>
    .prop-state {
        margin: 0;
        display: inline;
        background: #123960;
        color: #ffffff;
        padding: .2em 1em;
        border-radius: 15px;
        position: absolute;
        top: 1em;
        left: 1em;

        -webkit-box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, 0.5);
        box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, 0.5);
    }


    .prop-title {
        margin: 0;
        font-size: 1.8em;
        font-weight: bold;
        color: #123960;
        margin: .4em 0;
    }

    .prop-address {
        font-size: 1.0em;
        margin: .5em 0;
    }

    .prop-price {
        font-size: 1.8em;
        font-weight: bold;
        color: #123960;
        margin: .4em 0;
    }

    .prop-aditional {
        display: flex;

    }

    .additional-sec {
        width: 33%;

    }

    .prop-numb {
        margin: 0;
        text-align: center;
        font-size: 1.0em;
        font-weight: bold;
        color: #123960;
        margin: .4em 0;
    }

    .prop-text {
        margin: 0;
        text-align: center;
        font-size: 1.0em;
        font-weight: bold;
        color: #000;
        margin: .4em 0;
    }
</style>
<!--libreria ajax y codigo para busqueda en tiempo real de php-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Manejar el evento de cambio en los filtros
        $("select").change(function() {
            // Obtener los valores de los filtros
            var tipo = $("#tipo").val();
            var ciudad = $("#ciudad").val();
            var precio = $("#precio").val();

            // Realizar la solicitud AJAX
            $.ajax({
                url: "dashboard/buscador.php",
                method: "POST",
                data: {
                    tipo: tipo,
                    ciudad: ciudad,
                    precio: precio
                },
                success: function(data) {
                    $("#result").html(data);
                }
            });
        });
    });
</script>

<div class="">
    <div class="card-header text-center" style="background-color:#123960;color:#ffffff">
        <i class="fas fa-home text-center"></i> LISTA DE VIVIENDAS DISPONIBLES <i class="fas fa-home"></i>
    </div>
    <div class="p-3">
       <!--  <div class="row">
            <div class="col col-md-12">
                <label for="tipo">Tipo:</label>
                <select id="tipo">
                    <option value="">Todos</option>
                    <option value="V2205">V2205</option>
                    <option value="apartamento">Apartamento</option>
                    <option value="terreno">Terreno</option>
                </select>
            </div>
            <div>
                <label for="ciudad">Ciudad:</label>
                <select id="ciudad">
                    <option value="">Todas</option>
                    <option value="En Venta">En Venta</option>
                    <option value="ciudad2">Ciudad 2</option>
                    <option value="ciudad3">Ciudad 3</option>
                </select>
            </div>
            <div>
                <label for="precio">Precio:</label>
                <select id="precio">
                    <option value="">Todos</option>
                    <option value="Barbosa">Barbosa</option>
                    <option value="100000-200000">100,000 - 200,000</option>
                    <option value="200000-300000">200,000 - 300,000</option>
                </select>
            </div>
        </div>
    </div>-->
    <!-- <input type="text" id="search" placeholder="Código propiedad" class="form-control text-center" style="font-size: 20px; text-transform: uppercase;">
--><br>
    <div id="result" class=""></div>
    <?php
    include 'dashboard/filterHouse.php';
    ?>
</div>

<div class="card-footer text-center" style="background-color:#123960;color:#ffffff">
    <i class="fas fa-clock"></i>
    <?php
    $DateAndTime = date('m-d-Y h:i:s a', time());
    echo "Actualizado $DateAndTime.";
    ?>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $(".toastPatient").toast('show');
    });
</script>