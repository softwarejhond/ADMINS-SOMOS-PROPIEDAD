<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('./fpdf/fpdf/fpdf.php');
require('./fpdf/fpdf_protection.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require 'vendor/autoload.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MiPDF extends FPDF
{

    function Footer()
    {
        // Pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}
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
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
}

$meses = array(
    'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
    'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
);

$fecha_actual = new DateTime();
$dia = $fecha_actual->format('d');
$mes = $meses[(int)$fecha_actual->format('m') - 1]; // Restamos 1 porque los índices de array comienzan en 0
$anio = $fecha_actual->format('Y');
$fecha_formateada = "$dia de $mes de $anio";

//-------------------------------------------------------------------------------------
//EL COMANDO RIGHT EQUIVALE A QUE SE SEÑALAN LOS DOS ULTIMOS VALORES DE LA CEDULA 
$queryAsociados = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio=municipios.id_municipio WHERE id=$nik");
$querySMTP = mysqli_query($con, "SELECT * FROM smtpConfig WHERE id=1");
while ($smtpConfig = mysqli_fetch_array($querySMTP)) {
    $host = $smtpConfig['host'];
    $emailSmtp = $smtpConfig['email'];
    $password = $smtpConfig['password'];
    $port = $smtpConfig['port'];
    $nameBody = $smtpConfig['nameBody'];
    $Subject = $smtpConfig['Subject'];
    $body = $smtpConfig['body'];
    $nameFile = $smtpConfig['nameFile'];
    $urlpicture = $smtpConfig['urlpicture'];
    $logo = $smtpConfig['logoEncabezado'];
    $fondo = $smtpConfig['fondo'];
    $firma = $smtpConfig['firma'];
    $emailCompany = $smtpConfig['emailCompany'];
}
while ($infoAsociados = mysqli_fetch_assoc($queryAsociados)) {
    $DNI = $infoAsociados['doc_inquilino'];
    $nombre = strtoupper($infoAsociados['nombre_inquilino']);
    $email = $infoAsociados['email_inquilino'];
    $direccion = strtoupper($infoAsociados['direccion']);
    $ciudad = $infoAsociados['municipio'];
    $iva = $infoAsociados['iva'];
    $valorCanon = $infoAsociados['valor_canon'];
    $ipc = $infoAsociados['ipc'];
    //se crean las variables para dar formato a los valores motenarios con la funcion number_format
    $decimales = 0; // número de decimales
    $separador_decimal = '.'; // separador decimal
    $separador_miles = '.'; // separador de miles
    $fecha = $infoAsociados['fecha'];
    // Convierte la fecha de inicio del contrato a un objeto DateTime
    $fechaInicioObjeto = DateTime::createFromFormat('Y-m-d', $fecha);

    // Obtiene el año actual y le suma 1
    $anoActual = date("Y");
    $anoRenovacion = $anoActual ;

    // Ajusta el año de la fecha de inicio del contrato al año de renovación
    $fechaInicioObjeto->setDate($anoRenovacion, $fechaInicioObjeto->format('m'), $fechaInicioObjeto->format('d'));

    // Obtén la fecha de renovación en formato deseado (YYYY-MM-DD)
    $fechaRenovacionFormateada = $fechaInicioObjeto->format('Y-m-d');

    //generar codigos aleatorios
    function generarCodigoAleatorio($longitud = 12)
    {
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $codigo = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $codigo . uniqid(); // Agregar parte única basada en el tiempo
    }
    // Uso
    $longitudCodigo = 12;
    $codigoAleatorio = generarCodigoAleatorio($longitudCodigo);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    // Crear instancia de FPDF
    $pdf = new FPDF();
    // Crear instancia de FPDF con protección
    $pdf = new FPDF_Protection();
    $contraseña = $DNI;
    //$pdf->SetProtection(array(), $contraseña);

    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    // Ruta de la imagen de la marca de agua
    $marcaDeAgua = $fondo;
    $anchoPagina = $pdf->GetPageWidth();
    $altoPagina = $pdf->GetPageHeight();
    // Obtener el ancho y alto de la imagen de la marca de agua
    list($anchoMarca, $altoMarca) = getimagesize($marcaDeAgua);

    // Calcular la posición centrada de la marca de agua
    $xMarca = ($anchoPagina - $anchoMarca) / 2;
    $yMarca = ($altoPagina - $altoMarca) / 2;

    // Obtener dimensiones de la página

    $pdf->Image($marcaDeAgua, 10, 30, 200, 200); // x,y, ancho img, alto img
    $transparencia = 0.5;
    // Dimensiones de la imagen
    $anchoImagen = 85;  // Cambia esto al ancho real de tu imagen
    $altoImagen = 25;    // Cambia esto al alto real de tu imagen

    // Calcular coordenadas para centrar la imagen
    $centroX = ($anchoPagina - $anchoImagen) / 2;
    $centroY = ($altoPagina - $altoImagen) / 10;
    $imagenPath = $logo;
    // Agregar imagen desde un archivo local
    $pdf->Image($imagenPath, $centroX, 10, $anchoImagen, $altoImagen, 'PNG');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Ln(40);
    $pdf->Cell(10, 7, utf8_decode("Barbosa, ") . $fecha_formateada, 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->Cell(10, 7, utf8_decode("Señor (a):"), 0, 1, 'L');
    $pdf->Cell(10, 7, utf8_decode($nombre), 0, 1, 'L');
    $pdf->Cell(10, 7, utf8_decode($direccion), 0, 1, 'L');
    $pdf->Cell(10, 7, utf8_decode($email), 0, 1, 'L');
    $pdf->Cell(10, 7, utf8_decode($ciudad), 0, 1, 'L');
    $pdf->Ln(10);
    $pdf->Cell(10, 7, utf8_decode("Apreciado Señor (a):"), 0, 1, 'L');
    $pdf->Ln(5);
    $valorCanon = $infoAsociados['valor_canon'];
    $valorActual = floatval(str_replace(['.', '.'], '', $valorCanon)); // Convierte la cadena formateada a un valor numérico
    $porcentajeActual = $valorActual * ($ipc / 100);
    $porcentajeFormateado = number_format($porcentajeActual, 3, '.', ''); // 3 decimales, punto como separador
    $valorTotals = $valorActual + $porcentajeFormateado;
     //Redondeamos las cifras
     $precision = 1000;
    $porcentajeRedondeado =floor($porcentajeActual / $precision) * $precision;//floor Devuelve el siguiente valor de tipo integer (como float), redondeando value si fuera necesario.
    $totalRedondeado = floor($valorTotals / $precision) * $precision; // floor Devuelve el siguiente valor de tipo integer (como float), redondeando value si fuera necesario.
    // Formatea solo para mostrar al usuario, esto agrega los puntos a las cifras decimales y decenas
    $valorActualFormateado = number_format($valorActual, 0, '.', '.'); // Sin decimales, coma como separador de miles
    $porcentajeFormateado = number_format($porcentajeRedondeado, 0, ',', '.'); // Sin decimales, coma como separador de miles
    $valorTotalsFormateado = number_format($totalRedondeado, 0, '.', '.'); // Sin decimales, coma como separador de miles

 

    $pdf->MultiCell(0, 7, utf8_decode("La Inmobiliaria Hablemos de Negocios le informa que el próximo " . $fechaRenovacionFormateada . " cumple un año el contrato de arrendamiento firmado entre las partes, del inmueble ubicado en la " . $direccion . ".  Por este motivo su canon de arrendamiento será incrementado de acuerdo con lo estipulado por el gobierno, en $" . $porcentajeFormateado . " sobre el canon de arrendamiento actual. "));
    $pdf->Ln(7);
    $pdf->Cell(10, 7, utf8_decode("Canon actual: $") . $valorActualFormateado, 0, 1, 'L');
    $pdf->Cell(10, 7, utf8_decode("Aumento: $") . $porcentajeFormateado, 0, 1, 'L');
    $pdf->Cell(10, 7, utf8_decode("IVA: $") . $iva, 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 7, utf8_decode("Total a pagar: $") . $valorTotalsFormateado, 0, 1, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Ln(7);
    $pdf->Cell(10, 7, utf8_decode("Cordialmente. "), 0, 1, 'L');
    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Image($firma, 20, 200, 35, 35, 'PNG');
    $pdf->Cell(0, 7, utf8_decode("YOBANY AGUDELO ZAPATA"), 0, 1, 'L');
    $pdf->Cell(0, 6, utf8_decode("Gerente"), 0, 1, 'L');

    $pdf->Ln(7);
    $pdf->SetFont('Arial', 'B', 10);
    $txtPie = "Expedido en la ciudad de Barbosa, " . $fecha_formateada;
    $pdf->Cell(0, 10, utf8_decode($txtPie), 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 6, utf8_decode("Calle 13 # 17 33 INT 201 Barbosa - Calle 5 B # 14 27 INT 200 Girardota"), 0, 1, 'C');
    $pdf->Cell(0, 6, utf8_decode("E-mail: inmobiliariahdn@gmail.com Telefonos: 604 2004010 - 3508125688"), 0, 1, 'C');
    $pdf->Cell(0, 6, utf8_decode("www.hablemosdenegocios.com.co"), 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetTextColor(181, 178, 178);
    $pdf->Ln(5);
    $pdf->Cell(0, 6, utf8_decode($codigoAleatorio), 0, 1, 'C');

    // Generar el PDF
    $pdfContent = $pdf->Output('', 'S');
    // Guardar el contenido en un archivo
    file_put_contents('./PDFS/' . $DNI . '.pdf', $pdfContent);
    try {
        //Server settings

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $emailSmtp;                     //SMTP username
        $mail->Password   = $password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $port;
        //Recipients
        $mail->setFrom($emailSmtp, $nameBody);
        $mail->addAddress($email);     //Add a recipient
        $mail->addAddress($emailSmtp);
        $mail->addAddress($emailCompany);
        //Attachments
        $mail->addAttachment('./PDFS/' . $DNI . '.pdf');         //Add attachments

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $Subject . ' ' . $nombre;
        $mail->Body    = $body . ' '  . '<br><br>Este correo se ha generado de manera automatica por el sistema SIVP<br> <b>Sistema desarrollado por la Agencia de Desarrollo Eagle Software <br><img src="cid:cuerpo" width="400px"></b>';
        // Ruta de la imagen en el sistema de archivos
        $imagenPath = $urlpicture;

        // Agregar la imagen al correo como recurso embebido
        $mail->addEmbeddedImage($imagenPath, 'cuerpo');


        $mail->send();


        $update = mysqli_query($con, "UPDATE proprieter SET valor_canon='$totalRedondeado' WHERE id='$nik'");
        echo '  <div class="jumbotron alert-success text-center">
        <h1 class="display-4"><b><i class="fa-solid fa-circle-check"></i></b></h1><br>
<h1 class="display-4"><b>¡LA NOTIFICACIÓN HA SIDO ENVIADA CON ÉXITO!</b></h1>
<p class="lead text-center"><b>El inquilino ' . $nombre . ' ha recibido con éxito la notificación al correo: ' . $email . '</b></p>
<hr class="my-4">

<a href="main.php?"id="send" name="enviar" title="Enviar certificado al correo" class="btn btn-outline-success btn-lg"><span class="fa fa-home" aria-hidden="true"></span> REGRESAR AL INICIO</a>
    
</div>
';
    } catch (Exception $e) {
        echo '
        
                                <div class="jumbotron alert-danger text-center">
                                <h1 class="display-4"><b><i class="fa-solid fa-triangle-exclamation"></i></b></h1><br>
                                <h1 class="display-4"><b>¡NO SE HAN PODIDO ENVIAR!</b></h1>
                                <p class="lead">SICA no ha podido enviar el correo a esta dirección <br> ERROR: ' . $email . '</p>
                                <hr class="my-4">
                                <a class="btn btn-lg" href="main.php" role="button" style="color: #ffffff; background: #123960;">Regresar</a>
                             </div>';
    }
}
