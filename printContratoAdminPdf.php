<?php
include "conexion.php";
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// Iniciamos la sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}

$nik = mysqli_real_escape_string($con, strip_tags($_GET["nik"], ENT_QUOTES));
$code = mysqli_real_escape_string($con, strip_tags($_GET["nik"], ENT_QUOTES));

// Crear el objeto FPDF
require('fpdf/fpdf/fpdf.php');
require('fpdf/fpdf_protection.php');
$pdf = new FPDF_Protection(); // Instancia de FPDF con protección

// Consulta de datos del propietario
$queryPropietario = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
if ($infoPropietario = mysqli_fetch_array($queryPropietario)) {
    $tipo_inmueble = $infoPropietario['tipoInmueble'];
    $telefonoPropietario = $infoPropietario['telefono_propietario'];
    $propietario = $infoPropietario['nombre_propietario'];
    $id_propietario = $infoPropietario['doc_propietario'];
    $direccion = $infoPropietario['direccion'];
    $telefono_inquilino = $infoPropietario['telefono_inquilino'];
    $municipio = $infoPropietario['municipio'];
    $valorArriendo = number_format($infoPropietario['valor_canon']);
    $diaPago = $infoPropietario['diaPago'];
    $fecha = $infoPropietario['fecha'];
    $telefono_vivienda = $infoPropietario['TelefonoInmueble'];
    $vigenciaContrato = $infoPropietario['vigenciaContrato'];
    $cc_codeudor_uno = $infoPropietario['cc_codeudor_uno'];
    $nombre_codeudor_uno = $infoPropietario['nombre_codeudor_uno'];
    $cc_codeudor_dos = $infoPropietario['cc_codeudor_dos'];
    $nombre_codeudor_dos = $infoPropietario['nombre_codeudor_dos'];
    $cc_codeudor_tres = $infoPropietario['cc_codeudor_tres'];
    $nombre_codeudor_tres = $infoPropietario['nombre_codeudor_tres'];
    $email_propietario = $infoPropietario['email_propietario'];
} else {
    die('No se encontraron datos del propietario.');
}

// Definir la ruta de la imagen y el texto
$logo = 'images/logoColor.png';  // Cambia esto a la ruta de tu imagen
$txtNumero = '12345';         // Asegúrate de definir o asignar el valor correcto

// Crear el PDF
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
        // Ruta de la imagen de la marca de agua
        $marcaDeAgua = $logo;
        $anchoPagina = $pdf->GetPageWidth();
        $altoPagina = $pdf->GetPageHeight();
        // Obtener el ancho y alto de la imagen de la marca de agua
        list($anchoMarca, $altoMarca) = getimagesize($marcaDeAgua);

        // Calcular la posición centrada de la marca de agua
        $xMarca = ($anchoPagina - $anchoMarca) / 2;
        $yMarca = ($altoPagina - $altoMarca) / 2;

        // Obtener dimensiones de la página

        $pdf->Image($marcaDeAgua, 10, 100, 200, 100); // x,y, ancho img, alto img
        $transparencia = 0.5;
        // Dimensiones de la imagen
        $anchoImagen = 85;  // Cambia esto al ancho real de tu imagen
        $altoImagen = 25;    // Cambia esto al alto real de tu imagen
        // Calcular coordenadas para centrar la imagen
        $centroX = ($anchoPagina - $anchoImagen) / 2;
        $centroY = ($altoPagina - $altoImagen) / 10;
        $imagenPath = $logo;
     

// Dimensiones de la imagen
$anchoImagen = 80;
$altoImagen = 30;

// Calcular coordenadas para el logo y el texto
$logoX = $anchoPagina - $anchoImagen - 10; // 10 unidades desde el borde derecho
$logoY = 10;

// Ajustar la posición del texto
$textoX = 10; // Margen izquierdo
$textoY = 10;

// Agregar imagen desde un archivo local
if (!empty($logo) && file_exists($logo)) {
    $pdf->Image($logo, $logoX, $logoY, $anchoImagen, $altoImagen, 'PNG');
}

// Agregar el título del documento
$pdf->SetXY($textoX, $textoY);
$pdf->Cell(0, 10, utf8_decode("CONTRATO DE ADMINISTRACIÓN:"), 0, 1, 'L');
$pdf->Cell(0, 10, utf8_decode($txtNumero), 0, 1, 'L');
$pdf->Ln(20); // Espacio debajo del título

// Línea horizontal debajo del título
$pdf->Line(10, $pdf->GetY(), $anchoPagina - 10, $pdf->GetY());

// Generar el PDF
$pdfContent = $pdf->Output('', 'S');
file_put_contents('./contratos/Admin/' . $code . '.pdf', $pdfContent);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
</head>

<body>
    <?php include('nav2.php'); ?>
    <section class="home-section">
        <?php include 'nav.php'; ?>
        <h4 id="datos"></h4>
        <div class="container-fluid rounded">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 px-1 mt-1">
                    <div class="">
                        <?php include "txtBanner.php"; ?>
                        <br>
                    </div>
                    <?php

        echo '<div class="jumbotron alert-success text-center">
    <h1 class="display-4"><b>¡EL ARCHIVO HA SIDO GENERADO CON ÉXITO!</b></h1>
    <p class="lead">Ahora haz clic en enviar para enviar una copia al correo registrado del asociado.</p>
    <hr class="my-4">
    <a href="contratos/Admin/' . $code . '.pdf" download class="btn btn-outline-warning btn-lg" title="Descargar archivo"><i class="fa fa-download"></i> DESCARGAR</a>
</div>';
                    ?>
                </div>
            </div>
        </div>
        <br><br>
        <?php include 'footer.php'; ?>
    </section>
</body>

</html>