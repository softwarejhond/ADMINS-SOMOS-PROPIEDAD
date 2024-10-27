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
$active = "active";
//Insert un nuevo producto
$imagen_demo = "demo.png";
$id_slide = intval($_GET['id']);
$sql = mysqli_query($con, "select * from slider where id='$id_slide' limit 0,1");
$count = mysqli_num_rows($sql);
if ($count == 0) {
    header("location: sliders.php");
    exit;
}
$rw = mysqli_fetch_array($sql);
$titulo = $rw['titulo'];
$descripcion = $rw['descripcion'];
$texto_boton = $rw['texto_boton'];
$url_boton = $rw['url_boton'];
$estilo_boton = $rw['estilo_boton'];
$url_image = $rw['url_image'];
$orden = intval($rw['orden']);
$estado = intval($rw['estado']);
$active_config = "active";
$active_slider = "active";
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


                        <div class="p-3">
                            <br>

                            <h2>Administrar carrusel de imagenes</h2>
                            <p>Tenga en cuenta que estas imagenes se modificaran en la pagina principal del sitio web</p>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">

                                    <div class="container">

                                        <!-- Main component for a primary marketing message or call to action -->
                                        <form class="form-horizontal" id="editar_slide">



                                            <div class="form-group">
                                                <label for="titulo" class="col-sm-3 control-label">Titulo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="titulo" value="<?php echo $titulo; ?>" required name="titulo">
                                                    <input type="hidden" class="form-control" id="id_slide" value="<?php echo intval($id_slide); ?>" name="id_slide">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " rows="5" id="descripcion" required name="descripcion"><?php echo $descripcion; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="texto_boton" class="col-sm-3 control-label">Texto del boton</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="texto_boton" name="texto_boton" value="<?php echo $texto_boton ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="url_boton" class="col-sm-3 control-label">URL del boton</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="url_boton" name="url_boton" value="<?php echo $url_boton; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="texto_boton" class="col-sm-3 control-label">Color del boton</label>
                                                <div class="col-sm-9">
                                                    <button type="button" class="btn btn-info btn-sm"><input type="radio" name="estilo" value="info" <?php if ($estilo_boton == "info") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>> </button>
                                                    <button type="button" class="btn btn-warning btn-sm"><input type="radio" name="estilo" value="warning" <?php if ($estilo_boton == "warning") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>> </button>
                                                    <button type="button" class="btn btn-primary btn-sm"><input type="radio" name="estilo" value="primary" <?php if ($estilo_boton == "primary") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>> </button>
                                                    <button type="button" class="btn btn-success btn-sm"><input type="radio" name="estilo" value="success" <?php if ($estilo_boton == "success") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>> </button>
                                                    <button type="button" class="btn btn-danger btn-sm"><input type="radio" name="estilo" value="danger" <?php if ($estilo_boton == "danger") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>> </button>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <label for="orden" class="col-sm-3 control-label">Orden</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="orden" name="orden" value="<?php echo $orden; ?>">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="estado" class="col-sm-3 control-label">Estado</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="estado" required name="estado">
                                                        <option value="0" <?php if ($estado == 0) {
                                                                                echo "selected";
                                                                            } ?>>Inactivo</option>
                                                        <option value="1" <?php if ($estado == 1) {
                                                                                echo "selected";
                                                                            } ?>>Activo</option>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div id='loader'></div>
                                                <div class='outer_div'></div>
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-success">Actualizar datos</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div><!-- /container -->

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
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
	function upload_image() {
		$(".upload-msg").text('Cargando...');
		var id_slide = $("#id_slide").val();
		var inputFileImage = document.getElementById("fileToUpload");
		var file = inputFileImage.files[0];
		var data = new FormData();
		data.append('fileToUpload', file);
		data.append('id', id_slide);

		$.ajax({
			url: "ajax/upload_slide.php", // Url to which the request is send
			type: "POST", // Type of request to be send, called as method
			data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false, // The content type used when sending data to the server.
			cache: false, // To unable request pages to be cached
			processData: false, // To send DOMDocument or non processed data file it is set to false
			success: function(data) // A function to be called if request succeeds
			{
				$(".upload-msg").html(data);
				window.setTimeout(function() {
					$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function() {
						$(this).remove();
					});
				}, 5000);
			}
		});

	}

	function eliminar(id) {
		var parametros = {
			"action": "delete",
			"id": id
		};
		$.ajax({
			url: 'ajax/upload2.php',
			data: parametros,
			beforeSend: function(objeto) {
				$(".upload-msg2").text('Cargando...');
			},
			success: function(data) {
				$(".upload-msg2").html(data);

			}
		})

	}
</script>
<script>
	$("#editar_slide").submit(function(e) {

		$.ajax({
			url: "ajax/editar_slide.php",
			type: "POST",
			data: $("#editar_slide").serialize(),
			beforeSend: function(objeto) {
				$("#loader").html("Cargando...");
			},
			success: function(data) {
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		});
		e.preventDefault();
	});
</script>

</html>