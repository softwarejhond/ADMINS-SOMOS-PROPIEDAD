<?php
include "conexion.php";

//iniciamos la sesion
session_start();

?>

<?php if (isset($_SESSION['loggedin'])) : ?>
    <?php
    $admin = htmlspecialchars($_SESSION["username"]);
    //consulta para verificar si el usuario logueado es administrador o no
    $query = mysqli_query($con, "SELECT * FROM users WHERE username like '%$admin%'");
    $activo = "block";
    while ($userLog = mysqli_fetch_array($query)) {
        $rol = $userLog['dependencia'];
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: #123960;">
        <a class="navbar-brand" href="main.php"><img src="images/logSIVP.png" width="90px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="main.php"><i class="fa fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="perfil.php"><i class="fa fa-user"></i> Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="company.php"><i class="fa fa-building"></i> Institución</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel-fill"></i> Filtros
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="viewPropietarios.php">Gestión de inmuebles</a>
                        <a class="dropdown-item" href="viewReparadores.php">Lista de reparadores</a>
                        <a class="dropdown-item" href="viewReparaciones.php">Lista de reparaciones</a>
                        <a class="dropdown-item" href="viewBarrios.php">Lista de barrios</a>
                        <a class="dropdown-item" href="viewRetirosProgramados.php">Lista de retiros programados</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewInquilinosRetirados.php"><i class="bi bi-exclamation-diamond-fill"></i>
                        Inquilinos retirados </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="viewRenovaciones.php"><i class="fa fa-birthday-cake" aria-hidden="true"></i>
                        Renovaciones </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-hand-holding-dollar"></i> IPC
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#actualizarPrecio">IPC </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#actualizarPrecioLocales">IPC LOCALES</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="addApoiment.php"><i class="fa fa-address-book" aria-hidden="true"></i> Agenda
                        <span class="badge badge-success ">⭐️</span>
                    </a>
                </li>
                <?php
                //Condicion de php para validar si el usuario es administrador o no y asi mostrar los botones
                if ($rol === "Ingeniero") {
                    echo '
        
            <li class="nav-item">
                <a class="nav-link" href="updateSMTP.php" ><i class="fa-solid fa-screwdriver-wrench"></i> SMTP </a>
            </li>';
                }
                ?>

            </ul>
            <?php

            // Calcular la fecha después de 15 días
            $fecha15Dias = date('Y-m-d', strtotime($fechaActual . ' + 15 days'));

            // Consulta SQL para contar los registros en los próximos 15 días
            $sql = "SELECT COUNT(*) AS total_registros FROM retiredTenants WHERE fechaRetiro BETWEEN 'fechaRetiro' AND '$fecha15Dias'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalRegistros = $row['total_registros'];
            } else {
                echo $totalRegistros = 0;
            }

            ?>

            <!--<div class="dropdown p-1">
                <button class="btn">
                    <link rel="stylesheet" href="aplicationsGoogle/styleNavigation.css">
                    <?php include 'aplicationsGoogle/aplicationMenu.php'; ?>
                    <script src="aplicationsGoogle/scriptNavigation.js?v=1.1"></script>
                </button>-->
            </div>
            <div class="dropdown p-1">
                <button class="btn btn-warning dropdown-toggle" tooltip="Citas pendientes" flow="left" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill bell"></i> <span class="badge badge-light badge-citas-pendientes" id="citas-pendientes">0</span>

                </button>
            </div>

            <div class="dropdown p-2">
                <button class="btn btn-warning dropdown-toggle" tooltip="Retiros cercanos" flow="left" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill bell"></i> <span class="badge badge-light"><?php echo $totalRegistros ?></span>

                </button>
                <div class="dropdown-menu">
                    <?php
                    // Obtener la fecha actual
                    $fecha_actual = date("Y-m-d");
                    $dias_transcurridos = date('j');  // Restamos 1 porque queremos el día actual menos el primer día del mes
                    // Calcular la fecha después de 15 días
                    $fecha15Dias = date('Y-m-d', strtotime($fechaActual . ' + 15 days'));
                    // Consulta SQL para contar los registros en los próximos 15 días
                    $sql = "SELECT *  FROM retiredTenants WHERE fechaRetiro BETWEEN 'fechaRetiro' AND '$fecha15Dias'";
                    $resultado = mysqli_query($con, $sql);
                    if (mysqli_num_rows($resultado) > 0) {
                        // Mostrar los datos de las personas cercanas a cumplir años
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            //gracias a la clase dopdown-item mostramos en lista desplegable los usuarios que se acercan a la fecha
                            echo '<a class="dropdown-item" href="registrarRetiroInquilino.php" tooltip="Código propiedad: ' . $fila["codigoPropiedad"] . '" flow="left"> ' . $fila["NombreInquilino"] . '</a>';
                        }
                    } else {
                        echo "<label class='p-2'>No hay inquilinos por retirar</label>";
                    }
                    ?>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle p-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <img src="vista.php?id='<?php echo '9' ?>'" alt='Perfil' class="rounded-circle p-1" width="40 px" height="40px" />
                    <?php
                    $usaurio = htmlspecialchars($_SESSION["username"]);
                    $query = mysqli_query($con, "SELECT nombre FROM users WHERE username like '%$usaurio%'");
                    while ($userLog = mysqli_fetch_array($query)) {
                        echo '<span  class="card-text px-2 mt-1">' . $userLog['nombre'] . '</span>';
                    }
                    ?>
                    <div class="spinner-grow text-success spinner-grow-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="company.php">Institución</a>
                    <a class="dropdown-item" href="perfil.php">Perfil</a>
                    <a class="dropdown-item" href="logout.php">Cerrar</a>
                </div>
            </div>
        </div>


    </nav>
<?php else :
?>
    <script LANGUAGE="javascript">
        location.href = "index.php";
    </script>
<?php endif;
?>
<script>
    function actualizarConteoCitas() {
        // Hacer una solicitud AJAX para obtener el número de citas pendientes
        $.ajax({
            url: 'APIS/contarCitas.php',
            type: 'GET',
            success: function(response) {
                // Actualizar el badge con el número de citas pendientes
                $('.badge-citas-pendientes').text(response);
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener las citas pendientes:', error);
            }
        });
    }

    // Llamar a la función cuando el documento esté listo
    $(document).ready(function() {
        actualizarConteoCitas();
    });
</script>
<script>
    $(document).ready(function() {
        var dropdownOpen = false;
        $('#filtrosDropdown').on('click', function(e) {
            e.preventDefault();
            if (dropdownOpen) {
                $(this).parent().find('.dropdown-menu').slideUp(150);
            } else {
                $(this).parent().find('.dropdown-menu').slideDown(150);
            }
            dropdownOpen = !dropdownOpen;
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nav-item.dropdown').length) {
                $('.dropdown-menu').slideUp(150);
                dropdownOpen = false;
            }
        });
    });
</script>
<style>
    /* START TOOLTIP STYLES */
    [tooltip] {
        position: relative;
        /* opinion 1 */
    }

    /* Applies to all tooltips */
    [tooltip]::before,
    [tooltip]::after {
        text-transform: none;
        /* opinion 2 */
        font-size: .9em;
        /* opinion 3 */
        line-height: 1;
        user-select: none;
        pointer-events: none;
        position: absolute;
        display: none;
        opacity: 0;
    }

    [tooltip]::before {
        content: '';
        border: 5px solid transparent;
        /* opinion 4 */
        z-index: 1001;
        /* absurdity 1 */
    }

    [tooltip]::after {
        content: attr(tooltip);
        /* magic! */

        /* most of the rest of this is opinion */
        font-family: Helvetica, sans-serif;
        text-align: center;

        /* 
    Let the content set the size of the tooltips 
    but this will also keep them from being obnoxious
    */
        min-width: 3em;
        max-width: 21em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 1ch 1.5ch;
        border-radius: .3ch;
        box-shadow: 0 1em 2em -.5em rgba(0, 0, 0, 0.35);
        background: #333;
        color: #fff;
        z-index: 1000;
        /* absurdity 2 */
    }

    /* Make the tooltips respond to hover */
    [tooltip]:hover::before,
    [tooltip]:hover::after {
        display: block;
    }

    /* don't show empty tooltips */
    [tooltip='']::before,
    [tooltip='']::after {
        display: none !important;
    }

    /* FLOW: LEFT */
    [tooltip][flow^="left"]::before {
        top: 50%;
        border-right-width: 0;
        border-left-color: #333;
        left: calc(0em - 5px);
        transform: translate(-.5em, -50%);
    }

    [tooltip][flow^="left"]::after {
        top: 50%;
        right: calc(100% + 5px);
        transform: translate(-.5em, -50%);
    }


    /* KEYFRAMES */
    @keyframes tooltips-vert {
        to {
            opacity: .9;
            transform: translate(-50%, 0);
        }
    }

    @keyframes tooltips-horz {
        to {
            opacity: .9;
            transform: translate(0, -50%);
        }
    }

    /* FX All The Things */
    [tooltip]:not([flow]):hover::before,
    [tooltip]:not([flow]):hover::after,
    [tooltip][flow^="up"]:hover::before,
    [tooltip][flow^="up"]:hover::after,
    [tooltip][flow^="down"]:hover::before,
    [tooltip][flow^="down"]:hover::after {
        animation: tooltips-vert 300ms ease-out forwards;
    }

    [tooltip][flow^="left"]:hover::before,
    [tooltip][flow^="left"]:hover::after,
    [tooltip][flow^="right"]:hover::before,
    [tooltip][flow^="right"]:hover::after {
        animation: tooltips-horz 300ms ease-out forwards;
    }


    /* INICIA ANIMACION PARA LA CAMPANA */
    .bell {
        display: inline-block;
        -webkit-animation: ring 4s .7s ease-in-out infinite;
        -webkit-transform-origin: 50% 4px;
        -moz-animation: ring 4s .7s ease-in-out infinite;
        -moz-transform-origin: 50% 4px;
        animation: ring 4s .7s ease-in-out infinite;
        transform-origin: 50% 4px;
    }

    @keyframes ring {
        0% {
            transform: rotate(0);
        }

        1% {
            transform: rotate(30deg);
        }

        3% {
            transform: rotate(-28deg);
        }

        5% {
            transform: rotate(34deg);
        }

        7% {
            transform: rotate(-32deg);
        }

        9% {
            transform: rotate(30deg);
        }

        11% {
            transform: rotate(-28deg);
        }

        13% {
            transform: rotate(26deg);
        }

        15% {
            transform: rotate(-24deg);
        }

        17% {
            transform: rotate(22deg);
        }

        19% {
            transform: rotate(-20deg);
        }

        21% {
            transform: rotate(18deg);
        }

        23% {
            transform: rotate(-16deg);
        }

        25% {
            transform: rotate(14deg);
        }

        27% {
            transform: rotate(-12deg);
        }

        29% {
            transform: rotate(10deg);
        }

        31% {
            transform: rotate(-8deg);
        }

        33% {
            transform: rotate(6deg);
        }

        35% {
            transform: rotate(-4deg);
        }

        37% {
            transform: rotate(2deg);
        }

        39% {
            transform: rotate(-1deg);
        }

        41% {
            transform: rotate(1deg);
        }

        43% {
            transform: rotate(0);
        }

        100% {
            transform: rotate(0);
        }
    }

    /* TERMINA ANIMACION DE LA CAMPANA */
</style>