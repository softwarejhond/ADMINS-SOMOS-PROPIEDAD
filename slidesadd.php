<?php
// Initialize the session
session_start();
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 86400;
// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactividad) {
        header("location: main.php");
        exit;
    }
}
// El siguiente key se crea cuando se inicia sesión
$_SESSION["timeout"] = time();
// Include config file
require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
</head>
<?php include('nav2.php'); ?>

<body>

    <section class="home-section">
        <?php include('nav.php'); ?>
        <div class="container-fluid rounded">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    <?php //muy importante
                    include("txtBanner.php");
                    ?>
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">


                        <div class="container">
                            <br>
                            <?php

                            if (isset($_POST['guardarImg'])) {
                                //carga de la imagen 1
                                $nombreimg1 = $_FILES['imagen']['name']; //obtiene el nombre
                                $archivo1 = $_FILES['imagen']['tmp_name']; //contiene el archivo
                                $ruta1 = "./images/img/slider";
                                $ruta1 = $ruta1 . "/" . $nombreimg1; ///images/nombre.jpg
                                move_uploaded_file($archivo1, $ruta1);
                                $insert = mysqli_query($con, "INSERT INTO slider (url_image, estado) VALUES ('" . $nombreimg1 . "','0')");

                                if ($insert) {
                                    echo '
<div class="toastPaciente" style="position: absolute; top: 0; right: 0;" data-delay="4000">
<div class="toast-header ">
    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
            style=color:green></i> Notificación</strong>
  
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
        aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="toastPaciente-body alert-success">
    <h5> <b>Imgen Registrada Correctamente</b></h5>

</div>
</div>
';
                                } else {
                                    echo '
<div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
<div class="toast-header  ">
    <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
  
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
        aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="toast-body alert-danger">
    <h5> <b>Hubo problemas en el registro de la imagen, intenta nuevamente</b></h5>

</div>
</div>
';
                                }
                            }
                            ?>
                            <h2>Añadir nueva imagen al slider</h2>
                            <p>Tenga en cuenta que esta imagen se presentará en la pagina principal del sitio web.</p>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                    <form  method="post" enctype="multipart/form-data" class="was-validated">
                                        <label style="color:#000">Foto 1*</label><br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="images/icons/picture.png" width="24px" alt="picture">
                                                </span>
                                            </div>
                                            <input type="file" name="imagen" class="btn  w-100" style="background-color: #123960; color:#ffffff;" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="guardarImg" class="btn btn-outline-success" value="Registrar">
                                            <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <?php include('footer.php'); ?>
        </footer>

    </section>
</body>
<style>
    .container-fluid {
        margin-top: 1em;
    }


    .login__label {
        display: block;
        padding-left: 1rem;
    }

    .login__label,
    .login__label--checkbox {
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        font-size: .75rem;
        margin-bottom: 1rem;
    }

    .login__label--checkbox {
        display: inline-block;
        position: relative;
        padding-left: 1.5rem;
        margin-top: 2rem;
        margin-left: 1rem;
        color: #ffffff;
        font-size: .75rem;
        text-transform: inherit;
    }

    .login__input {
        color: white;
        font-size: 1.15rem;
        width: 100%;
        padding: .5rem 1rem;
        border: 2px solid transparent;
        outline: none;
        border-radius: 1.5rem;
        background-color: rgba(255, 255, 255, 0.25);
        letter-spacing: 1px;
    }

    .login__input:hover,
    .login__input:focus {
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
        background-color: transparent;
    }

    .login__input+.login__label {
        margin-top: 1.5rem;
    }

    .login__input--checkbox {
        position: absolute;
        top: .1rem;
        left: 0;
        margin: 0;
    }

    .login__submit {
        color: #ffffff;
        font-size: 1rem;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 1rem;
        padding: .75rem;
        border-radius: 2rem;
        display: block;
        width: 100%;
        background-color: rgba(17, 97, 237, .75);
        border: none;
        cursor: pointer;
    }

    .login__submit:hover {
        background-color: rgba(17, 97, 237, 1);
    }

    .login__forgot {
        display: block;
        margin-top: 3rem;
        text-align: center;
        color: rgba(255, 255, 255, 0.75);
        font-size: .75rem;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }

    .login__forgot:hover {
        color: rgb(17, 97, 237);
    }
</style>
<script>
    $(document).ready(function() {
        $(".toast").toast('show');
    });
</script>

</html>