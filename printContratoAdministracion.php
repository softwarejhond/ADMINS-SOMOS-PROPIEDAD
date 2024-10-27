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
    <?php include('head.php');
    ?>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 12px;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        #areaImprimir {
            background-image: url(images/back.png);
            background-origin: content-box;
            background-size: 100%;
        }
    </style>
</head>
<?php include('nav2.php'); ?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                        include("txtBanner.php"); ?>
                        <div class="card-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                <!--ACTUALIZAR DATOS USUARIO-->

                                <h2>CONTRATO DE ADMINISTRACIÓN.
                                    <a href="viewPropietarios.php" class="btn btn-outline-danger">
                                        <div class="spinner-grow spinner-grow-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        Regresar al listado de propietarios
                                    </a>
                                </h2>

                                <?php
                                // escaping, additionally removing everything that could be (html/javascript-) code
                                $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
                                $code = mysqli_real_escape_string($con, (strip_tags($_GET["code"], ENT_QUOTES)));
                                $idReparador = mysqli_real_escape_string($con, (strip_tags($_GET["repairmen"], ENT_QUOTES)));

                                $queryPropietario = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                while ($infoPropietario = mysqli_fetch_array($queryPropietario)) {
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
                                    $date = date("d,m,Y");
                                }


                                ?>

                                <div class="row">


                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark" id="areaImprimir">
                                        <div class="row p-3">
                                            <div class="col col-lg-6 text-right p-3">
                                                <h2 class="float-left text-left p-3">CONTRATO <br>DE ADMINISTRACIÓN:</h2>
                                            </div>
                                            <div class="col col-lg-6 text-center p-3">
                                                <img src="images/logoColor.png" alt="logo" width="300px" class="text-right">
                                            </div>
                                        </div>
                                        <div class="ml-3 mt-n2 mr-2">
                                            <p class="p-3" style="font-size:15px; text-align: justify;">
                                                Entre los suscritos <b><?php echo $propietario; ?></b>,
                                                mayor (es) de edad y vecino (a) de esta ciudad, identificado (a) con la cedula de
                                                ciudadanía número <?php echo $id_propietario; ?>, Quien en este acto obra (n) en nombre propio,
                                                quien en adelante se denominará <b>EL(LOS) MANDANTE (S)</b> por una parte y por la otra
                                                <b>YOBANY A. AGUDELO ZAPATA</b>, mayor de edad y vecino de esta ciudad, identificado con
                                                la cedula de ciudadanía número 70140224 de Barbosa. Quien en este acto obra en nombre
                                                y representación de la INMOBILIARIA HABLEMOS DE NEGOCIOS S.A.S. con Nit No 900688095-7,
                                                y matricula de arrendamiento de vivienda urbana No 001 expedida por la Secretaria de
                                                Gobierno Municipal y matricula de arrendamiento Girardota 2022-001, quien en adelante se
                                                denominará <b>EL ADMINISTRADOR</b> hemos convenido
                                                celebrar el presente contrato de Administración regido por las disposiciones legales y
                                                por el contenido de las siguientes cláusulas:
                                                <br><br>
                                                <b> PRIMERA. OBJETO DEL NEGOCIO Y DESCRIPCIÓN DEL(LOS) BIEN(ES): EL(LOS) MANDANTE(S)</b>
                                                comisiona(n) AL ADMINISTRADOR para arrendar por cuenta y riesgo de EL (LOS) los MANDANTES el(los) siguientes(s) Inmueble (s):

                                            </p>
                                            <table class="table p-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">INMUEBLE</th>
                                                        <th scope="col">MATRICULA INMOBILIARIA</th>
                                                        <th scope="col">DIRECCIÓN</th>
                                                        <th scope="col">MUNICIPIO</th>
                                                        <th scope="col">LINEA TELEFONICA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><?php echo $tipo_inmueble; ?></th>
                                                        <td><input type="text" class="w-100" value="0" style="border: none;"></td>
                                                        <td><?php echo $direccion; ?></td>
                                                        <td><?php echo $municipio; ?></td>
                                                        <td><?php echo $telefono_vivienda; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="p-3" style="font-size:15px; text-align: justify;">
                                                Los linderos, identificación y la descripción del (de los) inmueble(s) dados en administración, aparecen en el anexo que firmado por las partes se agrega al presente contrato como parte integrante del mismo.
                                                <br>
                                                <b>SEGUNDA. OBLIGACIONES DE EL ADMINISTRADOR:</b> En desarrollo del objeto de éste contrato, <b>EL ADMINISTRADOR</b> asume las siguientes obligaciones:
                                                <br>1. Anunciar en arrendamiento el(los) bien(es) cuando lo considere necesario y por el medio que estime conveniente.
                                                <br>2. Celebrar en su nombre propio, pero por cuenta y riesgo de <b>EL(LOS) MANDANTE(S)</b> los contratos de arrendamiento respectivos.
                                                <br>3. Cobrar el arrendatario y/o arrendatarios el canon de arrendamiento, ya sea directamente o por intermedio de un profesional del derecho.
                                                <br>4. Cancelar por cuenta y riesgo de <b>EL(LOS) MANDANTE(S)</b>, durante la vigencia del contrato de arrendamiento, las reparaciones necesarias detalladas en el inventario debidamente autorizadas por el propietario o aquellas que una vez notificadas y cotizadas debidamente no se obtenga autorización o respuesta alguna en un plazo máximo de TRES días, con el fin de garantizarle a los ARRENDATARIOS el uso y goce del inmueble en condiciones de normalidad.
                                                <br>5. Luego de la notificación y no respuesta por parte de <b>EL(LOS) MANDANTE(S)</b> en un plazo máximo de TRES días calendario se realizarán por cuenta y riesgo del (EL) <b>EL(LOS) MANDANTE(S)</b> las reparaciones que LA ADMINISTRADORA, estime necesarias y requeridas para la conservación del inmueble, así como aquellas que sean ordenadas por las autoridades competentes.
                                                <br>6. Exigir la entrega del (los) inmueble(s) a <b>LOS ARRENDATARIOS</b> cuando se configure una causal legal y sean requeridos previamente por EL (LOS) MANDANTE (S) para tal efecto. En este caso, EL (LOS) MANDANTE (S), se obligan a cumplir con todas y cada una de las obligaciones, requisitos, cargas, deberes y procedimientos que se encuentran establecidos en la ley en cabeza del arrendador para la terminación y la no renovación o prórroga del contrato. También estará a cargo de EL (LOS) MANDANTE (S) el pago de las cauciones e indemnizaciones que se requieran para la terminación del contrato, su no renovación o prorroga.
                                                <br>7. Pagar durante el periodo del presente contrato y mientras el(los) inmueble(s) permanezca(n) arrendado(s), por cuenta de <b>EL(LOS) MANDANTE(S)</b> las cuotas de administración ordinarias que establezcan los reglamentos de copropiedad.
                                                <br>8. Informa <b>AL(LOS) MANDANTE(S)</b> de forma oportuna sobre las novedades que se presenten en el inmueble, para que sea resuelta.
                                                <br>9. Rendir cuentas <b>AL(LOS) MANDANTE(S)</b> de los aspectos relacionados con los contratos de arrendamiento celebrados por su cuenta y riesgo. Para tal efecto, EL (LOS) MANDANTES (S) deberán presentar solicitud escrita a EL ADMINISTRADOR con no menos de quince días hábiles de anticipación a la fecha en que se pretenda recibir la información.
                                                <br>10. Entregar <b>AL(LOS) MANDANTE(S)</b> en las oficinas de <b>EL ADMINISTRADOR</b> o consignar al quinto (5) día hábil después del cumplimiento de cada mensualidad en la cuenta de <b>EL(LOS) MANDANTE(S)</b>, el monto del arrendamiento, mientras el inmueble permanezca ocupado, previa deducción de los gastos que se hubieren presentado. De igual forma si <b>EL(LOS) MANDANTE(S)</b> solicita(n) <b>AL ADMINISTRADOR</b> la terminación del contrato de arrendamiento, amparados en una causal legal, <b>EL ADMINISTRADOR</b> continuará pagando <b>AL(LOS) MANDANTE(S)</b> el canon de arrendamiento a final del mes, a partir de la fecha de notificación a <b>LOS ARRENDATARIOS</b> hasta la fecha de entrega del inmueble. Si <b>EL ADMINISTRADOR</b> ha iniciado un proceso de restitución del inmueble por las vías legales por mora y/o cualquier otra causal solicitada por <b>EL(LOS) MANDANTE(S)</b>, <b>EL ADMINISTRADOR</b> reconocerá de igual forma el canon al final del mes hasta la restitución del inmueble a partir de la fecha de iniciación del proceso de restitución.
                                                <br>11. Responder por el canon de arrendamiento pactado.
                                                <br>12. Cubrir los honorarios de los abogados, cuando se requiera la restitución del bien arrendado cuando la causal de restitución consista en el incumplimiento de los arrendatarios en el pago del canon de arrendamiento y los servicios públicos. En los demás casos, el monto de los honorarios, costas, agencias en derecho, sanciones y en general cualquier erogación económica causados en el proceso jurídico, correrán por cuenta de <b>EL(LOS) MANDANTE(S)</b>.
                                                <br>13. Elaborar el inventario de entrega del inmueble al arrendatario y a su vez elaborar el inventario de recibo cuando se produzca la restitución o entrega del inmueble por parte de <b>LOS ARRENDATARIOS</b>. Una vez que EL <b>ADMINISTRADOR</b>, haya entregado el(los) inmueble(s) <b>AL(LOS) MANDANTE(S)</b> con el inventario señalado, éste no podrá hacerle cargo AL <b>ADMINISTRADOR</b> por hechos ocurridos después de la entrega.
                                                <br>14. Pagar por cuenta y riesgo de <b>EL(LOS) MANDANTE(S)</b>, una vez arrendado el(los) inmueble(s), los servicios públicos, cuotas de administración, y reparaciones locativas detalladas en el inventario a los nuevos <b>ARRENDATARIOS</b> con el objeto de garantizarle un normal servicio.
                                                <br>15. <b>EL ADMINISTRADOR</b> garantizará <b>AL(LOS) MANDANTE(S)</b>, el pago y la reconexión si fuere el caso, de los servicios públicos que <b>EL(LOS) ARRENDATARIO(S)</b>, dejare(n) de pagar oportunamente al momento de la restitución del inmueble.
                                                <br>
                                                <br>
                                                <b>TERCERA. AUTORIZACIONES: EL(LOS) MANDANTE(S)</b> autorizan(n) AL <b>ADMINISTRADOR</b> a:
                                                <br>
                                                <br>1. Efectuar por cuenta y riesgo de EL (LOS) MANDANTE(S) las reparaciones necesarias que EL ADMINISTRADOR juzgue convenientes para la conservación del inmueble o para facilitar su arrendamiento, así como aquellas que sean ordenadas por las autoridades. Para efecto de las reparaciones que el inmueble requiera y que afecten el normal uso y disfrute del mismo o de los servicios, cosas y usos conexos adicionales con los que se arrendó el inmueble, así como aquellas que pretendan evitar daños o perjuicios a bienes y personas LA ADMINISTRADORA se encuentra expresamente facultada por EL (LOS) MANDANTE (S) para sufragar su valor hasta un monto equivalente a dos cánones de arrendamiento. En caso de que el valor de las reparaciones supere el monto anteriormente descrito, LA ADMINISTRADORA comunicará esta situación a EL (LOS) MANDANTES, quienes deberán dar respuesta a más tardar dentro de los tres días comunes siguientes a la llamada o al envió de la comunicación, so pena de que se entiendan autorizadas bajo su cuenta y riesgo.
                                                <br>2. Pagar por cuenta de <b>EL(LOS) MANDANTE(S)</b> los servicios públicos y cuotas de administración pendientes de cancelar al momento de ser arrendado el(los) inmueble(s) con cargo al valor de los cánones de arrendamiento efectivamente recibidos por EL ADMINISTRADOR.
                                                <br>3. En caso de que se autorice el pago de las cuotas de administración por cuenta y riesgo de <b>EL(LOS) MANDANTE(S)</b> esta incluirá el valor que por concepto de cuotas extras debidamente decretadas por la Asamblea de Coopropietarios, siempre y cuando estas no superen el 10% del canon de arrendamiento.
                                                <br>4. Deducir del monto de los ingresos recaudados mensualmente por <b>EL ADMINISTRADOR:</b> a) El valor de la comisión, impuestos y gravámenes a cargo de <b>EL(LOS) MANDANTE(S)</b> tales como el IVA o retención en la fuente. Los cuales, serán deducidos directamente de los ingresos por cánones de arrendamiento con preferencia sobre cualquier otro gasto o concepto. b) El valor de las reparaciones o mejoras efectuadas en el(los) inmueble(s). c) El valor de los pagos de servicios públicos, cuotas de administración, impuestos, gravámenes y demás gastos que haya efectuado <b>EL ADMINISTRADOR</b> por cuenta y riesgo de <b>EL(LOS) MANDANTE(S)</b>.
                                                <br>5. <b>EL(LOS) MANDANTE(S)</b> autorizan expresamente, de manera libre y desde el momento mismo de la firma del contrato a la INMOBILIARIA HABLEMOS DE NEGOCIOS SAS para incorporar, reportar, procesar, consultar y divulgar en Bancos de Datos la información que se relacione con este contrato o que de él se derive, especialmente cualquier incumplimiento relativo a las obligaciones contraídas. Para efectos de esta autorización el arrendador puede actuar directamente o a través de su asesor jurídico. La misma autorización se extiende a cualquier eventual cesionario ò subrogatario de las obligaciones derivadas del contrato. Declaramos que hemos leído y comprendido a cabalidad el contenido de la presente autorización, y aceptamos la finalidad en ella descrita y las consecuencias que se derivan de ella (LEY 1266 de 2008). Con éstos mismos alcances, atributos y finalidad autorizamos expresamente para que tal información sea concernida y reportada en la base de Datos PROCREDITO, CIFIN, DATACREDITO y cualquier otra que mi acreedor considere necesaria.
                                                <br>6. Fijar el canon y sus reajustes teniendo en cuenta los cánones vigentes para inmuebles similares en el medio y las limitaciones de las normas vigentes.
                                                <br>7. Realizar cesión del contrato de arrendamiento a un nuevo <b>ARRENDATARIO</b>, en caso de que EL ADMINISTRADOR lo considere necesario, previo estudio de estos.
                                                <br>8. Definir libremente la vigencia de las prórrogas y/o renovaciones en los eventos en que esta sea diferente a la vigencia anterior y no se logre localizar EL(LOS) MANDANTE(S).
                                                <br>9. En el evento en que EL (LOS) MANDANTE (S) fallezca (n), EL ADMINISTRADOR, quedará facultado para retener el valor del canon de arrendamiento, hasta tanto los herederos acrediten el reconocimiento de tal calidad dentro del proceso de sucesión respectivo, o se acredite la condición del albacea que administrará los bienes de la sucesión o hasta tanto se le adjudique el bien inmueble objeto de este contrato a uno de los herederos del EL (LOS) MANDANTE (S), a quien se le haría entrega de los cánones de arrendamiento retenidos y del inmueble entregado en arrendamiento en caso que el contrato respectivo estuviere vigente, sin lugar al reconocimiento de intereses, ni ningún otro valor adicional.
                                                <br>
                                                <br>
                                                <b>CUARTA. COMISIÓN Y FORMA DE PAGO: EL(LOS) MANDANTE(S)</b> pagará(n) <b>AL ADMINISTRADOR</b> como remuneración por los servicios que presta, una comisión mensual del 10% + IVA del canon vigente de arrendamiento, la cual se descontará del canon de arrendamiento.
                                                <br>
                                                <br><b>QUINTA. OBLIGACIONES DEL(LOS) MANDANTE(S):</b> En desarrollo del objeto de éste contrato, EL(LOS) MANDANTE(S) asume(n) las siguientes obligaciones:
                                                <br>
                                                <br>1. Garantizar el buen estado de los bienes objeto de este contrato de administración.
                                                <br>2. Garantizar las condiciones físicas y jurídicas para que el bien objeto de administración pueda ser arrendado, evitando cualquier clase de perturbación a los posibles arrendatarios, ya sea de índole física o jurídica.
                                                <br>3. Encontrarse a paz y Salvo por concepto de impuestos, tasas, contribuciones, servicios públicos, cuotas de administración y/o cualquier otro concepto que pueda perjudicar el uso y goce del bien objeto de este contrato.
                                                <br>4. Asumir todos los gastos derivados de las reparaciones necesarias que requiera el inmueble, así como de las mejoras requeridas para garantizar el uso y goce del bien a los arrendatarios.
                                                <br>5. Reconocer y pagar <b>AL ADMINISTRADOR</b> los gastos que ésta efectúe sobre el(los) inmueble(s) arrendado(s) conforme a lo estipulado en la cláusula tercera, para tal efecto, EL (LOS) MANDANTE (S) autoriza expresamente a <b>EL ADMINISTRADOR</b> a descontar dichos gastos del monto de los cánones de arrendamiento recaudados. En caso de que no exista cánones de arrendamiento sobre los cuales se pueda realizar el descuento, EL (LOS) MANDANTE(S) se obliga a pagar su valor dentro de los 03 días hábiles siguientes a la notificación efectuada por EL ADMINISTRADOR.
                                                <br>6. El inmueble estará bajo la responsabilidad de <b>EL(LOS) MANDANTE(S)</b> cuando esté desocupado, aun siendo promocionado por <b>EL ADMINISTRADOR</b>. Por lo tanto, queda a cargo de <b>EL(LOS) MANDANTE(S)</b> la obligación de recoger y pagar las cuentas de servicios públicos, cuotas de administración y demás gravámenes que estén a su cargo. Igualmente queda a cargo de <b>EL(LOS) MANDANTE(S)</b> la custodia y vigilancia sobre el inmueble.
                                                <br>7. EL (LOS) MANDANTE (S) asume(n) toda responsabilidad por causa de reclamación, juicio, devoluciones o indemnización que se origine en el régimen legal de arrendamiento o en caso de responsabilidad civil contractual y extracontractual por perjuicios que sobrevengan en razón del mal estado del inmueble, daños y/o actos efectuados por trabajadores que EL (LOS) MANDANTE (S) haya contratado directamente para efectuar reparaciones y/o mejoras en el inmueble, caso en el cual - EL (LOS) MANDANTE (S) asumirán el costo de las reparaciones e indemnizaciones, de igual forma se producirá en caso(s) de fuerza mayor o caso(s) fortuito(s), o en general ante cualquier evento. Si por cualquier circunstancia a LA ADMINISTRADORA se le obliga a restituir excedente de los cánones de arrendamiento, penalizaciones, mantenimientos, cargos efectuados en los servicios públicos como financiaciones y/o pagos de Gasodomesticos, líneas telefónicas etc., que no se encuentren a cargo de los arrendatarios y/o cualquier otro concepto, EL (LOS) MANDANTE (S) deberá(n) pagarle dicha(s) suma(S) dentro de los cinco (5) días siguientes a la notificación que por escrito le haga LA ADMINISTRADORA.
                                                <br>8. Apoyar <b>AL ADMINISTRADOR</b> en su gestión ante las Compañías o personas que tengan a cargo la administración de la copropiedad tanto en el desarrollo normal de la relación como en la solución de posibles conflictos que puedan afectar el contrato de arrendamiento que se encuentre vigente sobre el(los) inmueble(s).
                                                <br>9. En caso de enajenación del(los) inmueble(s) durante la vigencia del contrato de arrendamiento, de prórrogas o renovaciones del mismo, <b>EL(LOS) MANDANTE(S)</b> se obligan(n) a imponer al adquiriente el deber de respetarlo hasta su vencimiento. En caso contrario asumirá el valor de los perjuicios que legalmente pueda(n) reclamar <b>EL(LOS) ARRENDATARIO(S)</b> AL <b>ADMINISTRADOR</b>.
                                                <br>10. Efectuar las gestiones necesarias para la legalización ante las empresas prestadoras de servicios públicos y entes similares en los casos que sea requisito para el buen funcionamiento del(los) inmueble(s) de acuerdo al uso y contrato para el cual fue arrendado.
                                                <br>11. En caso de incumplimiento de las obligaciones de <b>EL(LOS) MANDANTE(S)</b> que conlleve a que la <b>INMOBILIARIA HABLEMOS DE NEGOCIOS</b> incumpla AL<b>(LOS) ARRENDATARIO(S)</b> y que por consiguiente se genere sanciones e indemnizaciones de perjuicios por incumplimiento del contrato de arrendamiento, éstas serán de absoluta responsabilidad de <b>EL(LOS) MANDANTE(S)</b> y será éste quien responda con el pago AL<b>(LOS) ARRENDATARIO(S)</b>.
                                                <br>12. Devolver el IVA sobre el canon pagado en caso de que este no haya sido cancelado por <b>LOS ARRENDATARIOS</b> y se hubiese girado AL<b>(LOS) MANDANTE(S)</b>.
                                                <br>13. Si <b>EL(LOS) MANDANTE(S)</b>, decide(n) no arrendar el inmueble durante el tiempo que este desocupado, dando por terminado éste contrato, EL ADMINISTRADOR le cobrará por conceptos de incumplimiento, una suma equivalente al veinticinco por ciento (25%) del canon acordado, además de los gastos en que haya incurrido EL ADMINISTRADOR por concepto de reparaciones o mejoras, entre otros.
                                                <br>14. Entregar todos los documentos que sean necesarios para el arrendamiento del inmueble, así como los requeridos para adelantar los procesos judiciales de restitución de tenencia y ejecutivos.
                                                <br>15. Abstenerse de solicitar el inmueble en contravención a las disposiciones legales que tienden a la protección de los arrendatarios.
                                                <br><br>
                                                <b>SEXTA. EXENCIONES DE RESPONSABILIDAD: 1. EL ADMINISTRADOR</b> no asume:
                                                <br>
                                                <br> a) Daños, pérdidas y/o desvalorizaciones provenientes del uso y tiempo legítimos del inmueble. Igualmente, tampoco asume responsabilidad por el(los) bien(es) mueble(s) que se encontrasen en el(los) inmueble(s) que se detallen en el inventario que se anexa a éste contrato; asimismo no responderá por la destrucción total o parcial de(los) inmueble(s), de tal manera que haga imposible la continuidad del contrato de arrendamiento. Si se presentase algún o algunos de los anteriores eventos <b>EL(LOS) MANDANTE(S)</b> no podrá(n) exigirle <b>AL ADMINISTRADOR</b> ningún tipo de indemnización ni arreglo de los mismos.
                                                <br> b) Por el pago de todas las obligaciones que EL (LOS) MANDANTE (S) tiene relacionadas con el inmueble, como son impuesto predial, gravámenes por valorización, obligaciones hipotecarias, parabólica, T.V. Cable, etc. Se exceptúa el pago de la administración, siempre y cuando quede incluida en el canon de arrendamiento y sea <b>EL ADMINISTRADOR</b> quien efectúe el pago.
                                                <br> c) Por responsabilidad civil por los daños o perjuicios que sobrevengan en razón de mal estado del inmueble, vicios ocultos, casos de fuerza mayor o casos fortuito o por el engaño, omisión o falsedad de <b>EL(LOS) MANDANTE(S)</b> en el suministro cabal y oportuno de la información necesaria para que <b>EL ADMINISTRADOR</b> pueda cumplir sus funciones o en general ante cualquier evento.
                                                <br> d) <b>EL ADMINISTRADOR</b> No responderá por daños causados al(los) inmueble(s) <b>AL(LOS) MANDANTE(S)</b>, por siniestros de incendio, inundación, terremoto, asonadas, actos terroristas o eventualidad de cualquier naturaleza, ya que para tales efectos <b>EL(LOS) MANDANTE(S)</b> deberá(n) contar con una póliza que ampare el(los) inmueble(s) contra éstos riesgos.
                                                <br> e) <b>EL ADMINISTRADOR</b> No responderá por los daños de uso legítimo, deterior natural o de la acción del tiempo, como son desgaste de griferías, pintura del inmueble, tuberías taqueadas por acumulación de grasas, daños eléctricos.
                                                <br>
                                                <br>
                                                <b>SEPTIMA. VIGENCIA DEL CONTRATO</b>: El término de duración de este contrato será igual al del contrato de arrendamiento que se suscriba con los arrendatarios y se prorrogará en periodos iguales al contrato de arrendamiento inicial. <b>EL(LOS) MANDANTE(S)</b> se compromete a respetar los contratos de arrendamiento y prorrogas que <b>EL ADMINISTRADOR</b> haya pactado en el desarrollo del presente contrato. En el caso de que <b>EL(LOS) MANDANTE(S)</b> soliciten la terminación unilateral del Contrato de Administración y este decidiese asumir la administración directa o delgada del(os) inmueble(s,) con el mismo arrendatario, deberá <b>EL(LOS) MANDANTE(S)</b>: cancelar la indemnización de Un (50%) del precio mensual del arrendamiento que esté vigente en que tal inconveniente se presente, <b>EL ADMINISTRADOR</b> podrá dar por terminado el contrato de administración en cualquier tiempo siempre y cuando se encuentre a paz y salvo con los pagos del <b>EL(LOS) MANDANTE(S)</b>.
                                                Cumplidos los anteriores requisitos, <b>EL ADMINISTRADOR</b> cederá a favor de <b>EL(LOS) MANDANTE(S)</b> el contrato de arrendamiento vigente. Una vez cedido el contrato de arrendamiento por EL ADMINISTRADOR, <b>AL(LOS) MANDANTE(S)</b> cesarán todas sus obligaciones y no será responsable por hecho alguno que ocurra después de esta fecha.
                                                <br><b>OCTAVA. LIBERTAD DEL INMUEBLE: EL(LOS) MANDANTE(S)</b> manifiesta(n) que el(los) inmueble(s) de que trata(n) este contrato es (son) de su exclusiva propiedad y que está(n) libre(s) de embargos o pleitos pendientes y en general de cualquier limitación para ser arrendado(s).
                                                <br><b>NOVENA. SOLICITUD DEL INMUEBLE AL ARRENDATARIO: EL(LOS) MANDANTE(S)</b> se compromete(n) a notificar por escrito AL ADMINISTRADOR su solicitud de restitución del(los) inmueble(s) arrendado(s) al vencimiento de las prórrogas, con un plazo mínimo de tres (4) meses para vivienda urbana y seis (7) meses para comercio y profesiones liberales, ciñéndose a los términos que para estos casos estipula la Ley y dando un plazo prudencial AL ADMINISTRADOR para realizar las gestiones pertinentes. Asimismo, informará la causal legal aducida para solicitar la restitución y se compromete a dar estricto cumplimiento de lo ordenado por la Ley sobre cauciones, indemnizaciones y la futura destinación del inmueble.
                                                <br><b>DÉCIMA. AUTORIZACIÓN TÁCITA: EL(LOS) MANDANTE(S)</b> colaborará(n) al máximo con <b>EL ADMINISTRADOR</b> para el cumplimiento de sus obligaciones y en aquellos casos que se requiera de su consentimiento para tomar decisiones y no se obtenga una respuesta oportuna, faculta <b>AL ADMINISTRADOR</b> para actuar en conformidad con la Ley y la práctica comercial en la solución de los casos. Asimismo, <b>EL(LOS) MANDANTE(S)</b> autoriza(n) AL ADMINISTRADOR para aceptar la terminación anticipada del contrato de arrendamiento sin penalización por efectos de un acuerdo conciliatorio con LOS ARRENDATARIOS dentro de un proceso de lanzamiento y el cobro jurídico por mora.
                                                <br><b>DÉCIMA PRIMERA. CALIDAD DE EL ADMINISTRADOR EN EL CONTRATO DE ARRENDAMIENTO: EL ADMINISTRADOR</b>, obra en el contrato de arrendamiento como arrendador del inmueble objeto del contrato, como intermediario por cuenta y riesgo de <b>EL(LOS) MANDANTE(S)</b> en desarrollo de las facultades que este le confiere a través del contrato de administración. Como tal no adquiere la calidad de propietario ni de tenedor del inmueble y por ello está exento de cualquier responsabilidad civil con la copropiedad y/o el edificio de la cual hace parte el inmueble; no aplica para la <b>INMOBILIARIA HABLEMOS DE NEGOCIOS</b> la solidaridad de pago establecida en la Ley 675 de 2001 sobre régimen de Propiedad Horizontal, ya que esta es únicamente entre los MANDANTES, arrendatarios y usuarios o tenedores del inmueble, con el edificio o con la propiedad horizontal.
                                                <br><b>DÉCIMA SEGUNDA. DIRECCIÓN PARA CORRESPONDENCIA: EL(LOS) MANDANTE(S)</b> expresamente aceptan que para efectos de todo lo relacionado con los términos y notificaciones legales referentes al presente contrato, se entenderá como dirección de notificación judicial y contractual, la dirección fijada al pie de sus firmas o en su defecto la dirección del inmueble objeto del presente contrato. Igualmente se puede realizar notificaciones a su correo electrónico o número de celular mediante mensajes de texto o mensajes de whatsApp Asimismo, EL(LOS) MANDANTE(S) se obliga(n) con la firma ADMINISTRADORA a mantenerla informada por escrito de cualquier cambio de dirección de correspondencia y teléfonos con un lapso no inferior a un (1) mes de antelación al período de pago, así como del lugar y/o modificaciones a la cuenta y banco donde autorice pagarle.
                                                <br><b>DÉCIMA TERCERA. OBLIGACIÓN TRIBUTARIA DEL(LOS) MANDANTE(S): EL(LOS) MANDANTE(S)</b> se obliga(n) a suministrar <b>AL ADMINISTRADOR</b> la fotocopia del Rut, es decir, del Régimen Único Tributario al cual pertenece(n) (Simplificado o Común), en el evento de que el(los) inmueble(s) estén gravados con IVA. Así mismo el porcentaje de participación que cada uno de <b>LOS MANDANTES</b> posee sobre el(los) inmueble(s) objeto(s) del contrato de arrendamiento.
                                                <br><b>DÉCIMA CUARTA. AUTORIZACION: EL(LOS) MANDANTE(S)</b> autoriza al señor (a) <input type="text" value="NINGUNO" style="border: none;" oninput="ajustarAncho(this)"> Para entregar el inmueble al ADMINISTRADOR o recibirlo cuando lo desocupen, para cobrar el canon de arrendamiento o que le sea consignado a la cuenta bancaria.
                                                <b>CLUASULA ADICIONAL.
                                                    <br>
                                                    <input type="text" value="NINGUNO" style="border: none;" class="w-100" oninput="ajustarAncho(this)"></b>
                                                <br>
                                                <br>
                                                Para constancia se firma el presente documento, en dos (2) ejemplares del mismo tenor y valor por las partes, en el municipio de BARBOSA, Antioquia, <?php echo date('d-m-Y'); ?>.
                                                <br>

                                            </p>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="w-50 p-3">
                                                            
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM company");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<img src="images/firmas.png"  style="width:200px;fixed:left;float-top:" ><br>';

                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $empresaLog['nombre'] . '</label><br>';
                                                                    echo '<label class="card-text">EL ADMINISTRADOR </label><br>';
                                                                    echo '<label class="card-text">NIT: ' . $empresaLog['nit'] . '</label><br>';
                                                                    echo '<label class="card-text">DIRECCIÓN: ' . $empresaLog['direccion'] . '</label><br>';
                                                                 
                                                                    echo '<br>';
                                                                }
                                                                echo '</div>'; //inicia div de columnas 
                                                           
                                                                ?>
                                                            </h6>
                                                        </th>
                                                        <th scope="col" class="w-50">
                                                            <br>
                                                            <br>
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12 ">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $propietario . '</label><br>';
                                                                    echo '<label class="card-text">EL MANDANTE (S)</label><br>';
                                                                    echo '<label class="card-text">C.C ' . $id_propietario . '</label><br>';
                                                                    echo '<label class="card-text">TELÉFONO : ' . $telefonoPropietario . '</label><br>';
                                                                    echo '<label class="card-text">DIRECCIÓN: <input style="border:none" placeholder="Digite aquí" oninput="ajustarAncho(this)"></label> <br>';
                                                                    echo '<label class="card-text">E-MAIL: ' . $email_propietario . '</label><br>';
                                                                }
                                                                echo '</div>'; //inicia div de columnas 
                                                          
                                                                ?>
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div style="padding:5px">
                                         
                                            <?php

                                            $queryCompany = mysqli_query($con, "SELECT * FROM company");
                                            while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                echo '<p  class="text-center" style="font-size:11px">' . $empresaLog['direccion'] . ' - ' . $empresaLog['nombre'] . ' Teléfono ' . $empresaLog['telefono'] . ' <br>E-Mail: ' . $empresaLog['email'] . '<br> Sitio web: ' . $empresaLog['web'] . '</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    
                                    <div class="text-center">
                                        <a onclick="jQuery('#areaImprimir').print()" class="btn btn-outline-info" style="border-radius: 0;"><i class="fa fa-print"></i> IMPRIMIR</a>
                                        <a href="main.php" class="btn btn-outline-danger" style="border-radius: 0;"><i class="fa fa-sync"></i> CANCELAR</a>
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
    <script src="js/jQuery.print.min.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->
    <script src="js/jQuery.print.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->
    <script>
        function ajustarAncho(input) {
            input.style.width = input.value.length + "ch";
        }
    </script>

</body>

</html>