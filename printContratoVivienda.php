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

                                <h2>CONTRATO DE ARRENDAMIENTO DE VIVIENDA URBANA <a href="viewPropietarios.php" class="btn btn-outline-danger">
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
                                    $inquilino = $infoPropietario['nombre_inquilino'];
                                    $id_inquilino = $infoPropietario['doc_inquilino'];
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
                                    $email_codeudor_uno = $infoPropietario['email_codeudor_uno'];
                                    $telefono_codeudor_uno = $infoPropietario['telefono_codeudor_uno'];
                                    $direccion_codeudor_uno = $infoPropietario['direccion_codeudor_uno'];

                                    $cc_codeudor_dos = $infoPropietario['cc_codeudor_dos'];
                                    $nombre_codeudor_dos = $infoPropietario['nombre_codeudor_dos'];
                                    $email_codeudor_dos = $infoPropietario['email_codeudor_dos'];
                                    $telefono_codeudor_dos = $infoPropietario['telefono_codeudor_dos'];
                                    $direccion_codeudor_dos = $infoPropietario['direccion_codeudor_dos'];

                                    $cc_codeudor_tres = $infoPropietario['cc_codeudor_tres'];
                                    $nombre_codeudor_tres = $infoPropietario['nombre_codeudor_tres'];
                                    $email_inquilino = $infoPropietario['email_inquilino'];
                                    $email_codeudor_tres = $infoPropietario['email_codeudor_tres'];
                                    $telefono_codeudor_tres = $infoPropietario['telefono_codeudor_tres'];
                                    $direccion_codeudor_tres = $infoPropietario['direccion_codeudor_tres'];
                                }


                                ?>

                                <div class="row">


                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark" id="areaImprimir">
                                        <div class="row p-3">
                                            <div class="col col-lg-6 text-right p-3">

                                                <h4 class="float-left text-left p-3">CONTRATO DE ARRENDAMIENTO <br>DE VIVIENDA URBANA:</h4>


                                            </div>
                                            <div class="col col-lg-6 text-center p-3">

                                                <img src="images/logoColor.png" alt="logo" width="300px" class="text-right">


                                            </div>
                                        </div>
                                        <div class="ml-3 mt-n2 mr-2">
                                            <p class="p-3" style="font-size:15px; text-align: justify;">
                                                Entre los suscritos <b><?php echo $inquilino; ?></b>,
                                                mayor de edad y vecino (a) de esta ciudad,
                                                identificado (a) con la cedula de Ciudadanía número <b><?php echo $id_inquilino; ?></b>. Quien en este acto obra en
                                                nombre propio, y en adelante se denominará EL <b>ARRENDATARIO</b> por una parte y por la otra
                                                <b>YOBANY A. AGUDELO ZAPATA</b>, mayor de edad y vecino de esta ciudad, identificado con la cedula
                                                de ciudadanía número <b>70140224</b>. Quien en este acto obra en nombre y representación de la
                                                INMOBILIARIA HABLEMOS DE NEGOCIOS S.A.S. con Nit # <b>900688095-7</b>, y matricula de arrendamiento
                                                de vivienda urbana No 001 expedida por la Secretaria de Gobierno Municipal y matricula de arrendamiento Girardota 2022-001, quien en adelante
                                                se denominará <b>EL ARRENDADOR</b> hemos convenido celebrar el presente contrato de arrendamiento de
                                                inmueble destinado a vivienda urbana que regiré especialmente por las disposiciones legales
                                                contempladas en la Ley 820 de 2003 y demás disposiciones que para tal fin regule el Código Civil.
                                                Según lo consignado y voluntariamente acordado en las siguientes cláusulas:
                                                <br><br>
                                                <b>1ª. OBJETO DEL CONTRATO:</b> Mediante el presente contrato el arrendador concede al arrendatario el uso y el goce del inmueble para vivienda urbana que más adelante se identifica por su dirección y linderos, de acuerdo con el inventario que hace parte integrante de este contrato y que las partes firman por separado.<br>
                                                <b>2ª. DIRECCIÓN DEL INMUEBLE:</b> Ubicado en la <b><?php echo $direccion; ?></b> del municipio de <b><?php echo $municipio; ?></b> Los linderos se identifican en la correspondiente escritura del propietario. Para tal efecto se hace entrega real y material.<br>
                                                <b>3ª. DESTINACIÓN:</b> El arrendatario se compromete a destinar este inmueble exclusivamente para vivienda familiar. No pudiendo darle otra destinación sin el consentimiento expreso del arrendador.<br>
                                                <b>4ª. PRECIO DEL ARRENDAMIENTO:</b> <b style="text-transform: uppercase;"><?php echo $numeroLetra; ?> </b> <b>$<?php echo $valorArriendo; ?> PESOS M.L.</b> mensuales, pagaderos dentro de los tres (03) días de cada periodo mensual, por anticipado, al arrendador o a su orden. En el evento de cancelar algunos días para ajustar los pagos con los meses calendario, la cancelación del canon seguirá siendo en forma anticipada dentro de los 3 primeros días. La mera tolerancia del arrendador en recibir la cancelación del canon de arrendamiento fuera del plazo expresamente pactado, no se tendrá como ánimo modificatorio del contrato en esta cláusula específica.<br>
                                                <b>5ª. INCREMENTO DEL PRECIO:</b> Vencido el primer año de vigencia de este contrato y así sucesivamente cada doce (12) mensualidades, en caso de prórroga tácita o expresa, en forma automática y sin necesidad de requerimiento alguno entre las partes, el precio mensual del arrendamiento se incrementará en una proporción igual al 100% del incremento que haya tenido el índice de precios al consumidor en el año calendario inmediatamente anterior a aquél en que se efectué el incremento. Al suscribir este contrato el arrendatario y los deudores solidarios quedan plenamente notificados de todos los reajustes automáticos pactados en este contrato y que han de operar durante la vigencia del mismo.<br>
                                                <b>6ª. LUGAR PARA EL PAGO:</b> Salvo pacto expreso entre las partes, el arrendatario pagará el precio del arrendamiento en la oficina del arrendador.<br>
                                                <b>7ª. VIGENCIA DEL CONTRATO:</b> <?php echo $vigenciaContrato; ?> que comienzan a contarse el día <b><?php echo $fecha; ?>.</b><br>
                                                <b>8ª. PRÓRROGAS:</b> Este contrato se entenderá prorrogado en iguales condiciones y por el mismo término inicial, siempre que cada una de las partes haya cumplido con las obligaciones a su cargo y, que el arrendatario, se avenga a los reajustes de la renta pactados en la cláusula quinta y autorizados en la Ley 820 de 2003.<br>
                                                <b>9ª. SERVICIOS PUBLICOS:</b> El Arrendatario pagará oportuna y totalmente los servicios públicos del Inmueble desde la fecha en que comience el arrendamiento hasta la restitución del Inmueble. Parágrafo 1: El incumplimiento del Arrendatario en el pago oportuno de los servicios públicos del Inmueble se tendrá como incumplimiento del contrato y por ende es una causal para la terminación de este. Parágrafo 2: Los arrendatarios y deudores solidarios manifestamos que hemos recibido junto con el inmueble, los contadores de servicios públicos (energía eléctrica, acueducto y gas en su caso), calibrados y con todos los sellos y seguridades. En consecuencia, los arrendatarios y deudores solidarios, asumimos todas las responsabilidades inherentes al buen mantenimiento de dichos contadores según las normas vigentes y que responderá por daños y/o violaciones de los reglamentos de las correspondientes empresas de servicios públicos. Parágrafo 3: El Arrendatario reconoce que el Arrendador en ningún caso y bajo ninguna circunstancia es responsable por la interrupción o deficiencia en la prestación de cualquiera de los servicios públicos del Inmueble. En caso de la prestación deficiente o suspensión de cualquiera de los servicios públicos del Inmueble, el Arrendatario reclamará de manera directa a las empresas prestadoras del servicio y no al Arrendador. Parágrafo 4: El Inmueble se entrega en arrendamiento con la línea telefónica número <?php echo $telefono_vivienda ?> El costo del servicio de discado local y de larga distancia nacional e internacional, así como el acceso y uso de otras redes de telecomunicaciones, será asumido en su totalidad por el Arrendatario.<br>
                                                <b>10ª. EXENCION DE RESPONSABILIDADES:</b> Queda claramente definido que EL ARRENDADOR no tiene a su cargo ni la vigilancia ni el control sobre el inmueble arrendado, ni injerencia alguna sobre la administración, si el inmueble estuviere sujeto a ella, y en consecuencia, se exonera de toda responsabilidad en caso de incendio, inundación, asonadas, robo, pérdida o daños a las personas o a las cosas que puedan ocurrir dentro del inmueble arrendado, sea que en tales eventos intervengan o no la mano del hombre y que con ellos se perjudique directamente o indirectamente al ARRENDATARIO. De la misma manera, no será responsable por los deterioros que sufran los muebles y enseres en el inmueble, por causas no imputables directamente a su voluntad, no obstante, el ARRENDATARIO se responsabiliza de asegurar el contenido (muebles, enseres, electrodomésticos, mercancía y demás) del inmueble contra todo riesgo. PARÁGRAFO: En caso de enajenación del bien arrendado, EL ARRENDADOR no asume responsabilidad por los perjuicios que pueda sufrir EL ARRENDATARIO.<br>
                                                <b>11ª. CLÁUSULA PENAL:</b> El incumplimiento o el cumplimiento tardío de cualquiera de las obligaciones que contrae EL ARRENDATARIO por este documento, le acarreará, por ese solo incumplimiento o por el cumplimiento tardío, el pago de una suma igual a tres (3) meses del arrendamiento vigente al momento del incumplimiento o del cumplimiento tardío, a título de pena, exigible sin necesidad de los requerimientos previos ni constitución en mora de que tratan los artículos 1594 y 1595 del Código Civil o cualquier otra disposición que así los contemple, derechos estos a los que renuncia expresamente EL ARRENDATARIO, y sin que su cobro implique la extinción de la obligación principal o de cualquiera de las obligaciones derivadas del contrato y sin perjuicio del cobro de las demás indemnizaciones que ese incumplimiento o el cumplimiento tardío, causen. Este contrato será prueba sumaria suficiente para el cobro de esta pena y el arrendatario o sus deudores solidarios renuncian expresamente a cualquier requerimiento privado o judicial para constituirlos en mora del pago de esta o cualquier otra obligación derivada del contrato. PARÁGRAFO: Si el arrendatario restituye el inmueble objeto de este contrato antes del vencimiento del término del duración inicialmente pactado, o de sus prórrogas y/o renovaciones, sin mediar expresa autorización escrita del arrendador para tal entrega, deberá pagar como indemnización no la indicada en esta cláusula, sino el valor de los cánones de arrendamiento equivalentes al tiempo que faltare para cumplir el vencimiento del término inicial del contrato o el de su prorroga o renovación, según el caso.<br>
                                                <b>12ª. OBLIGACIONES DE LAS PARTES.</b> – Son obligaciones del arrendador, las contenidas en el artículo 8 de la ley 820 de 2003. Son obligaciones del arrendatario las contenidas en el artículo 9 de la ley 820 de 2003 y el libro 4 del código civil.<br>
                                                <b>13ª. RENUNCIAS: EL ARRENDATARIO Y EL(os) CODEUDOR(es) SOLIDARIO(s)</b> que al final del contrato se citan renuncian expresamente a los siguientes derechos: a) Al derecho de retención que en algunos casos consagran las leyes a su favor. b) A exigir indemnización o prestación alguna por razón de las reparaciones y/o mejoras puestas en el inmueble sin consentimiento expreso y escrito de EL ARRENDADOR, c) Renuncian expresamente a los requerimientos de que tratan los Artículos 2007 del C.C. y 424 del C. de P.C., y en general a los que consagre cualquier norma sustancial o procesal para efectos de la constitución en mora.<br>
                                                <b>14ª. PREAVISOS PARA LA ENTREGA:</b> El Arrendatario podrá dar por terminado unilateralmente el contrato de arrendamiento a la fecha de vencimiento del término inicial o de sus prórrogas, siempre y cuando de previo aviso escrito al arrendador a través del servicio postal autorizado, con una antelación no menor de tres (03) meses a la referida fecha de vencimiento. La terminación unilateral por parte del arrendatario en cualquier otro momento sólo se aceptará previo el pago de una indemnización equivalente al precio de tres meses de arrendamiento que esté vigente en el momento de entrega del inmueble.<br>
                                                <b>15ª. CAUSALES DE TERMINACIÓN:</b> Son causales de terminación del contrato en forma unilateral, por parte del Arrendador las previstas por el artículo 22 de la ley 820 de 2003; y por parte del Arrendatario las consagradas en el artículo 24 de la misma ley y las siguientes: a) La cesión o subarriendo. b) El cambio de destinación del inmueble. c) El no pago del precio dentro del término previsto en este contrato. d) La destinación del inmueble para fines ilícitos o contrario a las buenas costumbres, o que representen peligro para el inmueble o la salubridad de sus habitantes. e) La realización de mejoras, cambios o ampliaciones del inmueble, sin expresa autorización del arrendador. f) La no cancelación de los servicios públicos a cargo del arrendatario siempre que origine la desconexión o pérdida del servicio. g) La no-cancelación del valor de las cuotas de administración, dentro del término pactado. h) Las demás previstas en la ley Parágrafo. – No obstante, las partes en cualquier tiempo y de común acuerdo podrán dar por terminado el presente contrato (L. 820/2003, Art. 21).<br>
                                                <b>16ª. CESIÓN Y SUBARRIENDO</b> EL ARRENDATARIO no podrá sub-arrendar totalmente o parcialmente el inmueble sin previa autorización y por escrito del EL ARRENDADOR. Para la cesión del presente contrato, por parte de EL ARRENDATARIO necesitará también autorización previa y por escrito de EL ARRENDADOR. PARAGRAFO CESIÓN DE CONTRATO POR PARTE DEL ARRENDADOR: En cualquier momento podrá EL ARRENDADOR ceder libremente sus derechos que emanen de este contrato en los términos de los Artículos 1960 y siguientes del Código Civil. Tal cesión producirá efectos respecto del Arrendatario a partir de la fecha de la comunicación certificada en que a estos se comunique.<br>
                                                <b>17ª. RECIBO Y ESTADO:</b> El arrendatario declara que ha recibido el inmueble objeto de este contrato en buen estado, conforme al inventario que hace parte del mismo, y que en el mismo estado lo restituirá al arrendador a la terminación del arrendamiento, o cuando este haya de cesar por alguna de las causales previstas, salvo el deterioro proveniente del tiempo y del uso legítimo.<br>
                                                <b>18ª. DEVOLUCIÓN DEL INMUEBLE AL ARRENDADOR:</b> Las partes convienen que el arrendador no aceptará como restituido el inmueble sin el cumplimiento de los siguientes requisitos por parte del (los) arrendatario(S) hasta el día de la entrega, inclusive: 1) constancia del pago de los últimos recibos de arrendamiento causados. 2) pago de penalización o indemnización en el caso que hubiere lugar a ella. 3) realización de las reparaciones locativas necesarias por los daños que durante el arrendamiento se hubieren causado al inmueble(S), o el pago de la cotización que para el efecto presente el arrendador. 4) paz y salvo de cuotas de administración cuando estas estén a su cargo. 5) constancia de pago del último periodo de facturación de servicios públicos domiciliarios, telecomunicaciones o televisión o demás empaquetamientos que hayan contratado con empresas prestadoras de servicios públicos; cuando estén a su cargo. Así mismo deberá el(los) arrendatario(S) gestionar y presentar la documentación que acredite el traslado o des empaquetamiento de los servicios que hubiere(N) asociado al inmueble, así como las demás cuentas que estuviesen a su cargo.<br>
                                                <b>19ª. MEJORAS:</b> No podrá el arrendatario ejecutar en el inmueble mejoras de ninguna especie, excepto las reparaciones locativas, sin el permiso escrito del arrendador. Si se ejecutaren accederán al propietario del inmueble sin indemnización para quien las efectuó. El arrendatario renuncia expresamente a descontar de la renta el valor de las reparaciones indispensables, a que se refiere el artículo 27 de la Ley 820 de 2003. PARAGRAFO: Los daños que se ocasionen al Inmueble por el Arrendatario(S), por responsabilidad suya o de sus dependientes, serán reparados y cubiertos sus costos de reparación en su totalidad por el Arrendatario. Por ello, deberán: 1) conservar la integridad interior y exterior de las paredes, techos, reponiendo las tejas que durante el arrendamiento se quiebren o desencajen, pisos, canoas, bajantes y cañerías, efectuando el mantenimiento y la limpieza periódica. 2). Reponer los cristales quebrados en las ventanas puertas y tabiques; reponiendo los que durante el arrendamiento se quiebren o desencajen. 3) mantener en buen estado y servicio las ventanas, puertas y cerraduras. 4). Conservar las llaves de agua, arreglo de grifos o salida de acueducto, baños e instalaciones sanitarias y de todos los accesorios, muebles y aditamentos que ellos contengan. 5). Dar el manejo adecuado a los servicios, cosas y usos conexos y/o adicionales que le sean entregados. 6) Mantener los tonos y/o colores originales en que le fueron entregados el (los) inmueble(s); ya que los cambios de color en la pintura no autorizados expresamente por escrito por el arrendador serán considerados como un daño en el inmueble.<br>
                                                <b>20ª. ABANDONO DEL INMUEBLE:</b> Al suscribir este contrato EL ARRENDATARIO faculta expresamente al ARRENDADOR para penetrar en el inmueble y recuperar su tenencia, con el solo requisito de la presencia de dos testigos, en procura de evitar el deterioro o desmantelamiento de tal inmueble, siempre que por cualquier circunstancia el mismo permanezca abandonado o deshabitado por el término de treinta (30) días y que la exposición al riesgo sea tal que amenace la integridad física del bien o la seguridad del vecindario. La misma facultad tendrán los deudores solidarios en caso de abandono del inmueble para efectos de restituirlo al arrendador.<br>
                                                <b>21ª. AUTORIZACIÓN PARA EL TRATAMIENTO Y RECOLECCIÓN DE DATOS PERSONALES. EL ARRENDATARIO Y EL(os) DEUDOR (es) SOLIDARIO(s)</b> por medio del presente contrato, manifestamos que LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, me ha informado que los datos personales que he incluido en los formularios para tomar en arrendamiento, los que he aportado como soporte y los que se insertaron en el presente contrato, serán utilizados y conocidos por LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, a quien ella delegue, a quien represente sus derechos, a quien en un futuro se le cedan sus derechos u ostente la misma posición contractual de ARRENDADOR, para los siguientes fines: A) actualización, consulta, y reporte en centrales de información. B) campañas comerciales y de mercadeo sobre productos y servicios relacionados e integrados afines. C) medir el nivel de satisfacción respecto de los productos y servicios. D) realizar investigaciones de mercadeo. E) análisis de información tendiente al control y prevención del fraude. F) el envío de SMS y MMS relativo al estado de mis obligaciones.
                                                En este orden de ideas, declaramos que conocemos nuestros derechos sobre nuestros datos personales incluidos en la Lay 1581 de 2012 y el decreto 1377 de 2013, los cuales podré ejercitar a través del siguiente canal: Correo físico enviado a la carrera 17 No 11 35 piso 2, dirigido a la Dirección Administrativa. Hemos sido informados acerca de la existencia del aviso de privacidad y la política de tratamiento de datos de LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, Habiendo sido informados de todo lo anterior, AUTORIZAMOS a LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, o a quien ella delegue, a quien represente sus derechos, a quien en un futuro se le cedan sus derechos u ostente la misma posición contractual de ARRENDADOR, para recolectar y administrar mis datos personales, comerciales y financieros, conforme a los fines ya descritos y en los términos aquí indicados. Esta autorización tendrá la misma duración que en su momento tenga el presente contrato de arrendamiento.<br>
                                                <b>22ª. DEUDORES SOLIDARIOS: Los suscritos:</b> <?php echo $nombre_codeudor_uno; ?> identificado con cedula No <?php echo $cc_codeudor_uno; ?>, <?php echo $nombre_codeudor_dos; ?> identificado con cedula No <?php echo $cc_codeudor_dos; ?>, <?php echo $nombre_codeudor_tres; ?> identificado con cedula No <?php echo $cc_codeudor_tres; ?>. Por medio del presente documento nos declaramos deudores del ARRENDADOR en forma solidaria e indivisible junto con el Arrendatario <?php echo $inquilino; ?> de todas las cargas y obligaciones contenidas en el presente contrato, tanto durante el término inicialmente pactado como durante sus prórrogas y/o renovaciones expresas o tácitas y hasta la restitución real del inmueble al arrendador, por concepto de: Arrendamientos, servicios públicos, indemnizaciones, daños en el inmueble, cuotas de administración, cláusulas penales, costas procesales y cualquier otra derivada del contrato, las cuales podrán ser exigidas por el arrendador a cualquiera de los obligados, por la vía ejecutiva, sin necesidad de requerimientos privados o judiciales a los cuales renunciamos expresamente, sin que por razón de esta solidaridad asumamos el carácter de fiadores, ni arrendatarios del inmueble objeto del presente contrato, pues tal calidad la asume exclusivamente <?php echo $inquilino; ?> y sus respectivos causa habitantes. Todo lo anterior sin perjuicio de que en caso de abandono del inmueble cualquiera de los deudores solidarios pueda hacer entrega válidamente del inmueble al arrendador o a quien este señale, bien sea judicial o extrajudicialmente. Para este exclusivo efecto el arrendatario otorga poder amplio y suficiente a los deudores solidarios en este mismo acto y al suscribirse el presente contrato. PARAGRAFO: CESIÓN DEL CONTRATO. Aceptamos desde ahora, cualquier Cesión que el ARRENDADOR haga respecto del presente contrato y aceptamos expresamente que la notificación de que trata el artículo 1960 del Código Civil se surta con el envío por correo certificado y a la dirección que registramos al lado de nuestra firma, de la copia de la respectiva nota de cesión acompañada de la copia simple del contrato.<br>
                                                <b>23ª. MERITO EJECUTIVO:</b> EL ARRENDATARIO y deudores solidarios declaran de manera expresa que reconoce y acepta que este Contrato presta mérito ejecutivo para exigir del Arrendatario o deudores solidarios y a favor del Arrendador el pago de (i) los cánones de arrendamiento causados y no pagados por el Arrendatario, (ii) las multas y sanciones que se causen por el incumplimiento del Arrendatario de cualquiera de las obligaciones a su cargo en virtud de la ley o de este Contrato, (iii) las sumas causadas y no pagadas por el Arrendatario por concepto de servicios públicos del Inmueble, cuotas de administración y cualquier otra suma de dinero que por cualquier concepto deba ser pagada por el Arrendatario; para lo cual bastará la sola afirmación de incumplimiento del Arrendatario hecha por el Arrendador, afirmación que solo podrá ser desvirtuada por el Arrendatario con la presentación de los respectivos recibos de pago.<br>
                                                <b>24ª.</b> En caso de contravención por parte de EL ARRENDATARIO a alguna o algunas de las cláusulas contempladas en éste contrato, o a la violación de las disposiciones legales que en materia de arrendamientos regula la legislación colombiana, EL ARRENDADOR podrá dar por terminado el contrato de arrendamiento y exigir la entrega del inmueble sin perjuicio de la sanción por incumplimiento.<br>
                                                <b>25ª. CORRESPONDENCIA Y NOTIFICACION DE EL ARRENDATARIO Y DEUDORES SOLIDARIOS.</b> EL ARRENDATARIO Y LOS DEUDORES SOLIDARIOS autorizan expresamente a EL ARRENDADOR a enviar comunicaciones, llamadas telefónicas, circulares e información en general vía correo electrónico y/o a través de mensajes de texto a celulares o WhatsApp como medio válido de notificaciones Judiciales y extrajudiciales relacionadas directas o indirectamente con el contrato de Arrendamiento. Para estos efectos y con plena validez, se adjunta al pie de las respectivas firmas la dirección de correspondencia, la dirección de correo electrónico y el número de celular y/o fijo. Dichas direcciones conservarán plena validez para todos los efectos legales, hasta tanto no sea informado por correo certificado a la otra parte del contrato, el cambio de la misma.<br>
                                                <b>26ª. GESTION DE COBRANZA:</b> Serán a cargo de los arrendatarios y deudores solidarios, por aquellas acciones judiciales o administrativas o extrajudiciales que se instauren por culpa o incumplimiento de estos que hagan de algunas cláusulas de este contrato e igualmente reconocerán los honorarios profesionales que se generen hasta en un 20% extrajudicial y en un 25% judicialmente en donde intervenga abogado en la gestión del arrendador y las costas.<br>
                                                <b>27ª.</b> Se entienden incorporadas a este contrato todas las disposiciones legales vigentes de preferencia a la ley 820 de 2003 y demás normas concordantes del código civil y el código del procedimiento civil.<br>
                                                <b>28ª.</b> Si el(los) inmueble(s) arrendado(s) está(n) sometido(s) a régimen de Propiedad Horizontal, EL ARRENDATARIO deben observar en todas sus partes el reglamento de copropiedad, en especial lo pertinente a convivencia, dicho reglamento debe ser solicitado al administrador del edificio.<br>
                                                <b>29ª. CALIDAD DEL ARRENDADOR:</b> Obra en este contrato como intermediario, es decir en nombre y representación del propietario del inmueble en desarrollo de las facultades que le confiere el contrato de mandato que le ha sido encomendado. Las decisiones y autorizaciones que se den en relación con el presente contrato deben ser efectuadas solo por las partes, EL ARRENDATARIO y EL ARRENDADOR.<br>
                                                <b>30ª. VISITAS AL INMUEBLE:</b> El arrendador o la persona que este autorice, podrá visitar el inmueble materia de arrendamiento cuando lo estime conveniente a efectos de comprobar su uso, destino, conservación y otros, sin previo aviso para ello y se hará en el término de duración del contrato y en sus renovaciones y/o prórrogas.<br>
                                                <b>31ª. INTERESES:</b> Las sumas que a cualquier título en razón del presente contrato resultasen a cargo de EL ARRENDATARIO y que no hubiesen sido pagadas oportunamente, serán pagadas por éste con intereses a una tasa igual a la tasa máxima autorizada por las disposiciones vigentes, liquidadas desde la fecha de la causación hasta la fecha en que se efectúe el pago.<br>
                                                <b>32ª. SARLAFT LAVADO DE ACTIVOS Y FINANCIACION ALTERRORISMO:</b> Las partes garantizan que ni ellas, ni sus socios, accionistas, ni vinculados o beneficiarios reales: (i) han estado, se encuentran, o temen ser incluidos en alguna de las listas que administra la Oficina de Control de Activos del Departamento del Tesoro de los Estados Unidos de América; (ii) no tienen investigaciones en curso, ni han sido sindicados o condenados por narcotráfico, financiación al terrorismo, ni lavado de activos; y, (iii) sus bienes, negocios y los recursos con los que cumplirán el presente Contrato, al igual que los de sus accionistas, si aplica, provienen de actividades lícitas. Cada una de las partes se obliga a notificar de inmediato a su contraparte cualquier cambio a las situaciones declaradas en el presente numeral, informando las medidas que tomará para mitigar los daños que ello pueda causar. No obstante, lo anterior, en el evento en que alguna de las partes, o cualquiera de sus socios, accionistas, vinculados o beneficiarios reales sean incluidos por cualquier causa en dichos listados, o se encuentren bajo cualquier tipo de investigación que razonablemente pueda conducir a ello, su contraparte podrá terminar anticipadamente este contrato sin que ello genere multa o indemnización alguna.
                                                <br>
                                                <b>CLAUSULAS ADICIONALES:</b> las infracciones de orden policivo y delictivo en las que incurrieren los arrendatarios objeto de este contrato, son de absoluta y total responsabilidad de los deudores solidarios.
                                                <br>
                                                <textarea cols="20" rows="3" class="w-100 p-2" style="border:none" placeholder="Digite aquí"></textarea>
                                                Para constancia se firma por las partes y cada uno de los firmantes declara haber recibido del arrendador, copia del contrato de arriendo en referencia con firmas originales el día <?php echo $fecha; ?>.

                                            </p>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <br>
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12" style="font-size:11px">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM company");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $empresaLog['nombre'] . '</label><br>';
                                                                    echo '<label class="card-text">ARRENDADOR </label><br>';
                                                                    echo '<label class="card-text">NIT: ' . $empresaLog['nit'] . '</label><br>';
                                                                    echo '<label class="card-text">DIRECCIÓN: ' . $empresaLog['direccion'] . '</label><br>';
                                                                    echo '<label class="card-text">TELÉFONO: ' . $empresaLog['telefono'] . '</label><br>';
                                                                  
                                                                }
                                                          
                                                                ?>
                                                            </h6>
                                                        </th>
                                                        <th scope="col">
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12" style="font-size:11px">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $inquilino . '</label><br>';
                                                                    echo '<label class="card-text">ARRENDATARIO</label><br>';
                                                                    echo '<label class="card-text">C.C o NIT No ' . $id_inquilino . '</label><br>';
                                                                    echo '<label class="card-text">TELÉFONO FIJO O CELULAR: ' . $telefono_inquilino . '</label><br>';
                                                                    echo '<label class="card-text">E-MAIL: ' . $email_inquilino . '</label><br>';
                                                                }
                                                                echo '</div>'; //inicia div de columnas 
                                                           
                                                                ?>
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12" style="font-size:11px">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $nombre_codeudor_uno . '</label><br>';
                                                                    echo '<label class="card-text">DEUDOR SOLIDARIO (1)</label><br>';
                                                                    echo '<label class="card-text">C.C o NIT No ' . $cc_codeudor_uno . '</label><br>';
                                                                    echo '<label class="card-text">DIRECCION RESIDENCIA: ' . $direccion_codeudor_uno . '</label><br>';
                                                                    echo '<label class="card-text">TEL FIJO Y CELULAR:' . $telefono_codeudor_uno . '</label><br>';
                                                                    echo '<label class="card-text">E-MAIL:' . $email_codeudor_uno . '</label><br>';
                                                                }
                                                                echo '</div>'; //inicia div de columnas 
                                                         
                                                                ?>
                                                            </h6>
                                                        </th>
                                                        <th scope="col">
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12" style="font-size:11px">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $nombre_codeudor_dos . '</label><br>';
                                                                    echo '<label class="card-text">DEUDOR SOLIDARIO (2)</label><br>';
                                                                    echo '<label class="card-text">C.C o NIT No ' . $cc_codeudor_dos . '</label><br>';
                                                                    echo '<label class="card-text">DIRECCION RESIDENCIA: ' . $direccion_codeudor_dos . '</label><br>';
                                                                    echo '<label class="card-text">TEL FIJO Y CELULAR:' . $telefono_codeudor_dos . '</label><br>';
                                                                    echo '<label class="card-text">E-MAIL:' . $email_codeudor_dos . '</label><br>';
                                                                }
                                                                echo '</div>'; //inicia div de columnas 
                                                           
                                                                ?>
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-6" style="font-size:11px">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $nombre_codeudor_tres . '</label><br>';
                                                                    echo '<label class="card-text">DEUDOR SOLIDARIO (3)</label><br>';
                                                                    echo '<label class="card-text">DIRECCION RESIDENCIA: ' . $direccion_codeudor_tres . '</label><br>';
                                                                    echo '<label class="card-text">TEL FIJO Y CELULAR:' . $telefono_codeudor_tres . '</label><br>';
                                                                    echo '<label class="card-text">E-MAIL:' . $email_codeudor_tres . '</label><br>';
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
                                            <div class="form-group">


                                            </div>
                                            <?php

                                            $queryCompany = mysqli_query($con, "SELECT * FROM company");
                                            while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                                                echo '<p  class="text-center" style="font-size:11px">' . $empresaLog['direccion'] . ' - ' . $empresaLog['nombre'] . ' Teléfono ' . $empresaLog['telefono'] . ' <br>E-Mail: ' . $empresaLog['email'] . '<br> Sitio web: ' . $empresaLog['web'] . '</p>';
                                            }
                                            ?>
                                            
                                        </div>
                                    </div>

                                    <br><br>

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

    </script>

</body>

</html>