<?php
// Inicializar la sesión
session_start();

// Establecer tiempo de vida de la sesión en segundos (24 horas)
$inactividad = 86400;

// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactividad) {
        // Redirigir al usuario a main.php si la sesión ha expirado
        header("location: main.php");
        exit;
    }
}

// Actualizar el tiempo de timeout de la sesión
$_SESSION["timeout"] = time();

// Incluir archivo de configuración
require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>
</head>

<body>
    <?php include('nav2.php'); ?>

    <section class="home-section">
        <?php include('nav.php'); ?>
        <div class="container-fluid rounded p-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    <?php include("txtBanner.php"); ?>
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <div class="p-1">
                            <br>
                            <div class="row">
                                <div class="col col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                    <main class="p-1">
                                        <nav class="nav">
                                            <aside class="code_pro">
                                                <label for="code_pro">Código Propiedad</label>
                                                <input type="text" class="form-control w-100" name="code_pro" id="code_pro">
                                            </aside>
                                            <aside class="num_invent">
                                                <label for="num_invent">Número Inventario</label>
                                                <input type="number" class="form-control 2-100" name="num_invent" id="num_invent">
                                            </aside>
                                            <aside class="buttons">
                                                <button type="button" class="btn btn-danger disabled" id="eliminar">
                                                    <span class="spinner-border" id="loader_eliminar"></span>Eliminar
                                                </button>
                                                <button type="button" class="btn btn-warning disabled" id="buscar">
                                                    <span class="spinner-border" id="loader_buscar"></span>Buscar
                                                </button>
                                                <button type="button" class="btn btn-success disabled" id="nuevo">Nuevo</button>
                                            </aside>
                                        </nav>
                                        <ul class="nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active">General</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">Sala</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">Cocina</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">Baño</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">Alcoba</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">Patio</a>
                                            </li>
                                        </ul>
                                        <form class="forms" name="General" id="gen_desc">
                                            <aside class="buttons">
                                                <button class="btn btn-primary" type="button" name="cancelar" id="cancelar">Cancelar</button>
                                                <button class="btn btn-primary disabled" type="submit" name="guardar" id="guardar">
                                                    <span class="spinner-border" id="loader_guardar"></span>Guardar
                                                </button>
                                                <button class="btn btn-primary" type="submit" name="editar" id="editar" hidden>
                                                    <span class="spinner-border" id="loader_editar"></span>Editar
                                                </button>
                                            </aside>
                                        </form>
                                    </main>
                                    <section>
                                        <aside class="contenedor-toast position-fixed bottom-0 right-0 p-3" style="z-index: 999; right: 0; bottom: 0;">
                                        </aside>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-modal" data-toggle="modal" data-target="#staticBackdrop" hidden data-backdrop="false">
                                            Launch static backdrop modal
                                        </button>
                                        <!-- Modal -->
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/template.js?v=1.0"></script>
    <footer class="footer">
        <?php include('footer.php'); ?>
    </footer>


    <script>
        $(document).ready(function() {
            $(".toast").toast('show');
        });
    </script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

     

        input,
        label {
            height: 20px;
            width: 100%;
        }

        input[type="radio"],
        label,
        select {
            cursor: pointer;
        }

        input[type="color"] {
            width: 4rem;
            height: 2.5rem;
        }

        legend {
            pointer-events: none;
        }

        textarea {
            width: 100%;
            padding: 2px 5px;
        }

        aside {
            display: flex;
        }

        /* UTILIDADES */
        .disabled {
            pointer-events: none;
        }

        .contenedor-toast {
            display: flex;
            flex-direction: column;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            border-bottom: 1px solid #155724;
        }

        .alert {
            margin-bottom: 0;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            text-align: center;
        }

        .toast {
            width: 30rem;
            font-size: 1.5rem;
            flex-basis: 0;
        }

        .toast-body p::first-letter {
            text-transform: uppercase;
        }

        .spinner-border {
            width: 1.5rem;
            height: 1.5rem;
            display: none;
        }

        .custom-control-input {
            left: 15px;
        }

        .modal-body {
            margin: 0 auto;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
        }

    

        #form-filas {
            display: flex;
            gap: 1rem;
        }

        /* GENERAL */
        .nav {
            justify-content: space-between;
            align-items: flex-end;
            gap: 1rem;
            margin-top: 1rem;
        }

        #code_pro {
            text-transform: uppercase;
        }

        .nav .code_pro,
        .nav .num_invent {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .buttons {
            gap: 1rem;
        }

        .btn {
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .nav-tabs {
            margin-top: 2rem;
            margin-bottom: 0;
            display: flex;
            border-bottom: none;
        }

        .nav-tabs li {
            list-style: none;
        }

    

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            position: relative;
            z-index: 1;
        }

        .forms {
            border: 1px solid gainsboro;
            position: relative;
            bottom: 1px;
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-bottom: 5rem;
            border-radius: 0 0 1rem 1rem;
        }

        .forms .buttons {
            order: 1;
            display: flex;
            justify-content: flex-end;
            margin-right: 2rem;
            margin-bottom: 2rem;
        }

        .object {
            display: flex;
            flex-direction: column;
            padding-bottom: 2rem;
        }

        .disabled {
            opacity: 0.7;
        }

        .content-object {
            /* display: grid;
    grid-template-columns: repeat(5, 1fr); */
            flex-wrap: wrap;
            /*justify-content: flex-start; */
            /* max-width: 70%; */
            width: 100%;
            margin: 0 auto;
            gap: 1rem;
        }

        .custom-switch {
            scale: 1.8;
            width: 0;
        }

        .custom-switch .custom-control-label::after {
            left: -1rem;
            cursor: pointer;
        }

        .custom-switch .custom-control-label::before {
            left: -1.2rem;
            cursor: pointer;
        }

        fieldset {
            border: 1px solid gray;
            margin: 2rem;
            margin-top: 1rem;
            border-radius: 1rem;
        }

        legend {
            padding: 0 5px;
            width: fit-content;
            text-align: center;
            text-transform: capitalize;
        }

        .object>legend {
            font-weight: bold;
        }

        fieldset .atributo {
            margin: 0 1rem;
            margin-top: 1rem;
        }

        .atributo {
            display: flex;
            padding: 1rem;
            justify-content: space-around;
            min-width: 13rem;
            background-color: rgb(243, 243, 243);
        }

        .atributo aside {
            flex-direction: row;
            align-items: center;
            gap: 5px;
        }

        @media (max-width: 910px) {
            /* .content-object{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    } */
        }

        @media (max-width: 750px) {
            /* .content-object{
        grid-template-columns: repeat(3, 1fr);
    } */
        }

        @media (max-width: 650px) {
            .nav {
                justify-content: center;
            }
        }

        @media (max-width: 585px) {

            /* .content-object{
        grid-template-columns: repeat(2, 1fr);
    } */
            aside .buttons {
                margin-top: 1rem;
                width: 100%;
                margin-left: 26rem;
            }
        }

        @media (max-width: 426px) {
            .nav {
                flex-direction: column;
                align-items: center;
            }

            .buttons {
                margin-top: 1rem;
            }

            /* .content-object{
        grid-template-columns: 80%;
        justify-content: center;
    } */
        }
    </style>
</body>

</html>