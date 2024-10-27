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
require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <?php include('head.php');
    ?>
</head>
<?php include('nav2.php');
?>

<body>
    <section class='home-section'>
        <?php include('nav.php');
        ?>
        <div class='container-fluid rounded'>
            <div class='row'>
                <div class='col-lg-12 col-md-12 col-sm-12 px-2 mt-1'>
                    <div class='card border-info shadow p-3 mb-5 bg-white rounded'>
                        <?php //muy importante
                        include('txtBanner.php');
                        ?>
                        <div class='container'>
                            <br>
                            <h2>Actualizar porcentaje para actualizar el IPC del local seleccionado</h2>
                         
                            </p>
                            <?php
                            // escaping, additionally removing everything that could be ( html/javascript- ) code
                            $nik_get = mysqli_real_escape_string($con, (strip_tags($_GET['parametro'], ENT_QUOTES)));
                            $sql = mysqli_query($con, "SELECT * FROM proprieter WHERE id='$nik_get'");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $porcentajeActual=$row['ipc'];
                            }
                            ?>
                            <?php
                            $usaurio = htmlspecialchars($_SESSION['username']);
                            if (isset($_POST['updPorcentajeLocal'])) {
                                $ipc = mysqli_real_escape_string($con, (strip_tags($_POST['porcentaje'], ENT_QUOTES)));

                                $update = mysqli_query($con, "UPDATE proprieter SET ipc='$ipc' WHERE id=$nik_get");
                                if ($update) {
                                    header("Location: " . $_SERVER['REQUEST_URI']);
                                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido actualizado con éxito. actualiza la página paara cargar de nuevo los valores.</div>';
                                  
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                                }
                            }
                            ?>
                            <form method='POST' class='was-validated'>
                                <div class='row'>
                                    <div class='col-lg-12 col-md-12 col-sm-12 px-2 mt-1'>

                                        <div class='form-group text-center'>
                                            <label style='color:#000'>Porcentaje actual</label>
                                            <input type='number' name='porcentaje' class='form-control text-center' style='font-size:50px' step="any" placeholder='Porcentaje actual' value="<?php echo $porcentajeActual; ?>" required='true'>
                                        </div>


                                        <div class='form-group text-center'>
                                            <input type='submit' name='updPorcentajeLocal' class='btn btn-outline-success' value='Actualizar porcentaje para el local' require>
                                            <input type='reset' class='btn btn-outline-danger' value='Cancelar'>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

        </div>
        </div>
        <footer class='footer'>
            <?php include('footer.php');
            ?>
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

</html>