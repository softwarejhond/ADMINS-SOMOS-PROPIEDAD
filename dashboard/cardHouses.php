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
        font-size: 1.4em;
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

    .colorTexto {
        color: #123960;
    }

    .fa-eagle-software {
        display: inline-block;
        width: 24px;
        height: 24px;
        background-image: url('../images/icons/eagle.png');
        background-size: cover;
    }

    .grid-item {
        width: 25%;
    }

    .grid-item--width2 {
        width: 50%;
    }
</style>
<div class=" p-3">
                <?php include 'contadores/panelContadores.php'; ?>
            
        </div>
<div class="">
    <div class="card-header text-center" style="background-color:#123960;color:#ffffff">
        <i class="fas fa-home text-center"></i> LISTA DE VIVIENDAS DISPONIBLES <i class="fas fa-home"></i>
    </div>

    <div class="p-3">

       
            <div class="col-lg-3 col-md-6 col-sm-12">

                <form action="" method="get" class="mb-3" id="busquedaForm">
                    <div class="card  mb-3" style="max-width: 100%;">
                        <div class="card-header text-center" style="color: #FFFFFF; background-color:#123960"><b><i class="fa-solid fa-folder-tree"></i> Buscar propiedades</b></div>
                        <div class="card-body" style="color: #123960 ;">
                            <h5 class="card-title"><i class="fa fa-key"></i> Código de la propiedad</h5>
                            <div class="input-group card-text">
                                <input type="text" name="busqueda" id="codigo" class="form-control text-center w-100" placeholder="CÓDIGO PROPIEDAD ">
                                <br><br>
                                <h5 class="card-title"><i class="fa fa-home"></i> Tipo de vivienda</h5>
                                <select name="condicion" id="tipoVivienda" class="form-control form-select-lg text-center  custom-selec text-bg-dark w-100">
                                    <option value="">SELECCIONAR</option>
                                    <option value="EN ALQUILER">EN ALQUILER</option>
                                    <option value="EN VENTA">EN VENTA</option>
                                    <option value="ALQUILER O VENTA">ALQUILER O VENTA</option>
                                </select>
                                <br><br>
                                <h5 class="card-title"><i class="fa fa-location"></i> Departamento</h5>
                                <select id="lista_departamento" name="departamento" class="form-control form-select-lg custom-selec text-bg-dark w-100"></select>
                                <br><br>
                                <h5 class="card-title"><i class="fa fa-map-marker"></i> Municipio</h5>
                                <select id="municipios" name="municipioSelect" class="form-control form-select-lg custom-selec text-bg-dark w-100"></select>
                                <br><br>
                                <h5 class="card-title"><i class="fa fa-bed"></i> Habitaciones</h5>
                                <select name="habitaciones" class="form-control form-select-lg custom-selec text-bg-dark w-100">
                                    <option value="">SELECCIONAR</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <br><br>


                                <div class="input-group text-center ">
                                    <button type="submit" class="btn w-100" style="background-color:#123960;color:#ffffff"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer  border-colorTextos text-center" style="color: #FFFFFF; background-color:#123960">
                            <i class="fa-eagle-software"></i>Made by Agencia de Desarrollo <br>Eagle Software</b>
                        </div>
                    </div>

                </form>

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
              

                <div class="grid">
                    <?php
                    include 'dashboard/filterHouse.php';
                    ?>
                </div>
            </div>
        </div>
        <!--ESTE ES EL CODIGO HTML PARA EL PAGINADOR DE LAS TARJETAS CON RESPONSIVE INCLUIDO-->
        <div class="row mt-3">

            <div class="col col-md-12">
                <ul class="pagination justify-content-end ">
                    <?php
                    $numPaginasMostradas = 9; // Cambia esto según tus preferencias
                    $mitadNumPaginasMostradas = floor($numPaginasMostradas / 2);
                    $paginaInicial = max($paginaActual - $mitadNumPaginasMostradas, 1);
                    $paginaFinal = min($paginaInicial + $numPaginasMostradas - 1, $totalPaginas);
                    ?>
                    <?php if ($paginaActual > 1) { ?>
                        <li class="page-item ">
                            <a class="page-link" href="?pagina=1">
                                << </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?php echo $paginaActual - 1; ?>">
                                < </a>
                        </li>
                    <?php } ?>

                    <?php for ($i = $paginaInicial; $i <= $paginaFinal; $i++) { ?>
                        <li class="page-item <?php if ($i == $paginaActual) echo 'active'; ?>">
                            <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>

                    <?php if ($paginaActual < $totalPaginas) { ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?php echo $paginaActual + 1; ?>">></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?php echo $totalPaginas; ?>">>></a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <!--AQUI FINALIZA EL CODIGO HTML PARA EL PAGINADOR DE LAS TARJETAS-->
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


<!--EL SIGUIENTE ESCRIPT TE CARGA LA LISTA DE LOS DEPARTAMENTOS Y MUNICIPIOS-->
<script type="text/javascript" src="js/departamentos_municipios_barrios.js"></script>
<!--libreria ajax y codigo para busqueda en tiempo real de php-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Manejar el evento de cambio en los filtros
        $("busquedaForm").change(function() {
            // Obtener los valores de los filtros
            var codigo = $("#codigo").val();
            var tipoVivienda = $("#tipoVivienda").val();
            var municipios = $("#municipios").val();

            // Realizar la solicitud AJAX
            $.ajax({
                url: "./buscador.php",
                method: "POST",
                data: {
                    codigo: codigo,
                    tipoVivienda: tipoVivienda,
                    municipios: municipios
                },
                success: function(response) {
                    $('#resultados').html(response);
                }
            });
        });
    });
</script>

<sc