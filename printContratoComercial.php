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

                                <h2>CONTRATO DE ARRENDAMIENTO PARA INMUEBLES
                                    CON DESTINACIÓN COMERCIAL
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
                                    $email_codeudor_uno= $infoPropietario['email_codeudor_uno'];
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

                                                <h4 class="float-left text-left p-3">CONTRATO DE ARRENDAMIENTO <br>PARA INMUEBLES
                                                    CON DESTINACIÓN COMERCIAL
                                                    :</h4>


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
                                                INMOBILIARIA HABLEMOS DE NEGOCIOS S.A.S. con Nit # <b>900688095-7</b>, matricula de arrendamiento
                                                de vivienda urbana No 001 expedida por la Secretaria de Gobierno Municipal y matricula de arrendamiento Girardota 2022-001, quien en adelante
                                                se denominará <b>EL ARRENDADOR</b> hemos convenido celebrar el presente contrato de arrendamiento para inmuebles con
                                                destinación comercial que se rige por la legislación comercial colombiana, además de las anteriores estipulaciones,
                                                las partes de común acuerdo convienen las siguientes cláusulas:
                                                <br><br>
                                                <b>1ª. OBJETO:</b> EL ARRENDADOR da en arrendamiento a EL ARRENDATARIO y este toma en arrendamiento un local comercial ubicado en <?php echo $direccion; ?>, del Municipio de <?php echo $municipio; ?>, inmueble identificado con el folio de matrícula inmobiliaria No <input style="border:none" placeholder="Digite aquí" oninput="ajustarAncho(this)">. los linderos son los que corresponden a la escrituras de compra del propietario. <b>PARÁGRAFO PRIMERO: DESTINACIÓN DEL INMUEBLE: EL ARRENDATARIO</b> se compromete a destinar el inmueble exclusivamente para <input style="border:none" placeholder="Digite aquí" oninput="ajustarAncho(this)"> <b>PARÁGRAFO SEGUNDO: EL ARRENDATARIO</b> deja claramente establecido que previamente ha solicitado los permisos para el uso que le dará al inmueble y el certificado de ubicación ante los organismos de control para este tipo de trámites, manifestando que estos son favorables para el uso que requiere dar, por lo tanto exoneran al ARRENDADOR y al PROPIETARIO del inmueble ante cualquier responsabilidad que se le quiera imputar sobre estos permisos.
                                                <br><b>2ª. TÉRMINO:</b> El término del arrendamiento es de <?php echo $vigenciaContrato; ?>, contados a partir del día <?php echo $fecha; ?>. Si ninguna de las partes manifiesta su intención de terminarlo, mediante aviso escrito dirigido a la otra parte con una antelación de seis meses, el contrato se entenderá renovado por vigencias de <?php echo $vigenciaContrato; ?> en <?php echo $vigenciaContrato; ?> y así sucesivamente, siempre que EL ARRENDATARIO haya cumplido las obligaciones a su cargo y pagado los reajustes del canon acordados entre las partes.
                                                <br><b>3ª. PRECIO:</b> El precio de arrendamiento es de <?php echo $valorArriendo; ?>, el cual deberá ser pagado por <b>EL ARRENDATARIO</b> en la oficina del <b>ARRENDADOR</b> o mediante consignación a la cuenta de ahorros de Bancolombia No 65117985355, propiedad del <b>ARRENDADOR</b> dentro de los tres (3) primeros días de cada periodo, El comprobante de transferencia o consignación deberá ser remitido al correo electrónico: inmobiliariahdn@hotmail.com, a más tardar el día hábil siguiente de haberse efectuado el pago. La presente instrucción solamente podrá ser revocada con la autorización escrita del ARRENDADOR y los pagos realizados en contravención a dicha instrucción, no se considerarán válidos <b>PARAGRAFO PRIMERO</b>. - Si EL ARRENDATARIO no paga el canon de arrendamiento en los términos señalados en esta cláusula, incurrirá en mora y la mera tolerancia de EL ARRENDADOR en aceptar el pago con posterioridad, no se entenderá como ánimo de modificar el término establecido para el pago. Tendrá EL ARRENDADOR la facultad de cobrar por mora, el máximo interés mensual autorizado por la Superintendencia Financiera o la entidad que haga sus veces, sin necesidad de requerimiento alguno para ser constituido en mora, al cual renuncia desde ya EL ARRENDATARIO. La mora y/o retardo en el pago de uno o más cánones de arrendamiento o el incumplimiento de EL ARRENDATARIO, de alguna, algunas o todas las obligaciones contraídas en virtud de la Ley y de este contrato, facultará a EL ARRENDADOR para dar por terminado el mismo y exigir, la inmediata restitución del local o demandar su cumplimiento. <b>PARÁGRAFO SEGUNDO</b> En cualquier evento de mora y/o retardo en el cumplimiento de las obligaciones a cargo del <b>ARRENDATARIO, EL ARRENDADOR</b> queda facultado para exigir de aquel el pago de los honorarios de Abogado y demás gastos de cobranza judicial o extrajudicial. <b>PARÁGRAFO TERCERO</b> Cualquier pago que llegase a efectuar <b>EL ARRENDATARIO</b> en forma extemporánea o a través de un medio sin la referencia establecida por <b>EL ARRENDADOR</b>, estará sujeto a verificación y aceptación por parte del <b>ARRENDADOR</b>, previa presentación del documento que acredite dicho pago por parte de <b>EL ARRENDATARIO</b>.
                                                <br><b>4ª. REAJUSTE:</b> Convienen las partes cada doce (12) meses de ejecución del contrato, se modificará el canon mensual, reajustándose automáticamente en un porcentaje igual al <input style="border:none" placeholder="Digite aquí" value="10%" oninput="ajustarAncho(this)">.
                                                <br><b>5ª. SERVICIOS PUBLICOS:</b> El Arrendatario pagará oportuna y totalmente los servicios públicos del Inmueble desde la fecha en que comience el arrendamiento hasta la restitución del Inmueble. <b>Parágrafo 1</b> El incumplimiento del Arrendatario en el pago oportuno de los servicios públicos del Inmueble se tendrá como incumplimiento del contrato y por ende es una causal para la terminación de este. <b>Parágrafo 2:</b> Los arrendatarios y deudores solidarios manifestamos que hemos recibido junto con el inmueble, los contadores de servicios públicos (energía eléctrica, acueducto y gas en su caso), calibrados y con todos los sellos y seguridades. En consecuencia, los arrendatarios y deudores solidarios, asumimos todas las responsabilidades inherentes al buen mantenimiento de dichos contadores según las normas vigentes y que responderá por daños y/o violaciones de los reglamentos de las correspondientes empresas de servicios públicos. <b>Parágrafo 3</b>: El Arrendatario reconoce que el Arrendador en ningún caso y bajo ninguna circunstancia es responsable por la interrupción o deficiencia en la prestación de cualquiera de los servicios públicos del Inmueble. En caso de la prestación deficiente o suspensión de cualquiera de los servicios públicos del Inmueble, el Arrendatario reclamará de manera directa a las empresas prestadoras del servicio y no al Arrendador. <b>Parágrafo 4</b>: El Inmueble se entrega en arrendamiento con la línea telefónica número <?php echo $telefono_vivienda ?>. El costo del servicio de discado local y de larga distancia nacional e internacional, así como el acceso y uso de otras redes de telecomunicaciones, será asumido en su totalidad por el Arrendatario.
                                                <br><b>6ª. RECIBO Y RESTITUCIÓN DEL INMUEBLE:</b> EL ARRENDATARIO declara que en la fecha ha recibido en perfecto estado el inmueble arrendado. Además, se obliga a devolverlo en el mismo estado, salvo los deterioros naturales producidos por el goce legítimo del inmueble arrendado, desocupándolo enteramente y poniendo a disposición de EL ARRENDADOR y entregándole las llaves correspondientes.
                                                <br><b>7ª.</b> Están a cargo de <b>EL ARRENDATARIO</b> las reparaciones locativas, o sea mantener el inmueble en el estado en que lo recibió. Así mismo deberá: 1) Conservar la integridad interior de las paredes, techos, pavimentos y cañerías, reponiendo las que durante el arrendamiento se quiebren o se desencajen. 2) Reponer los cristales quebrados en las ventanas, puertas y tabiques. 3) Mantener en buen estado de servicio las ventanas, puertas y cerraduras, pisos y las demás partes interiores y exteriores del inmueble. 4.) Mantener el inmueble debidamente aseado. 5) Conservar y arreglar las llaves de agua, grifos, salidas de acueducto, baños, instalaciones sanitarias, etc. 6) Dar el manejo adecuado a los servicios, cosas y usos conexos y/o adicionales que le sean entregados. 7) Mantener los tonos y/o colores de pintura original en que fue entregado el inmueble, y en general, los que se produzcan por hecho, descuido o culpa de <b>EL ARRENDATARIO</b> o de sus dependientes. Tampoco podrán realizar reparaciones y/o mejoras útiles o voluntarias salvo el caso de que <b>EL ARRENDADOR</b> hubiere autorizado por escrito con la obligación de cubrir su importe. Si las ejecutaren sin consentimiento de <b>EL ARRENDADOR</b>, éste no estará obligado a reembolsar a <b>EL ARRENDATARIO</b> el costo de ellas y, por ende, beneficiarán al Propietario del inmueble, sin que haya lugar al derecho de retención o de indemnización alguna a favor de <b>EL ARRENDATARIO</b> quien no podrá separar los materiales del inmueble a menos que <b>EL ARRENDADOR</b> así lo exija, evento en el cual deberán retirarlos dejando el inmueble en el estado en que le fue entregado. <b>PARÁGRAFO</b> Las partes acuerdan un término, correspondiente a los QUINCE (15) primeros días de vigencia del presente contrato para verificar el funcionamiento de todos y cada uno de los servicios del bien inmueble, debiéndose dentro del mismo término comunicar por escrito al <b>ARRENDADOR</b> las observaciones o deficiencias al respecto, para que igualmente sean verificadas y corregidas, según se hayan hecho constar como observaciones dentro del inventario. <b>PARAGRAFO 2</b> Toda reparación que soliciten las autoridades Municipales, departamentales o nacionales para el buen uso del establecimiento de comercio, estará a cargo del <b>ARRENDATARIO</b>.
                                                <br><b>8ª. OTRAS OBLIGACIONES DE EL ARRENDATARIO:</b> EL ARRENDATARIO se obliga además a: a) Avisar a EL ARRENDADOR con no menos de tres (6) meses de antelación al vencimiento del término pactado inicial o de las renovaciones y/o prórrogas, su intención de desocupar el inmueble, permitiendo durante este periodo las visitas y arreglos que efectúe EL ARRENDADOR, para el posterior arrendamiento o venta del bien, b) A no destinar el inmueble a usos diferentes al señalado en la Cláusula primera, c) a no dar al inmueble destinación con fines ilícitos tales como los contemplados en el literal b) del parágrafo del artículo 3 del decreto 180 de 1988 y el artículo 34 de la ley 30 de 1986, y en consecuencia EL ARRENDATARIO se obliga a no utilizar el inmueble objeto de este contrato, para ocultar o como depósito de armas o explosivos o dineros de grupos terroristas o artículos de contrabando o para que en él se elaboren o almacenen, vendan o usen drogas estupefacientes o sustancias alucinógenas y afines. d) A no guardar ni conservar en el inmueble sustancias inflamables, explosivas o antihigiénicas. Si se incumpliere esta obligación y se causare perjuicios, EL ARRENDATARIO y los DEUDORES SOLIDARIOS deberá responder, inclusive por los daños causados a terceros, e) Someterse a asumir los gastos que impliquen las disposiciones presentes o futuras de las autoridades de Policía e higiene en relación con el inmueble arrendado, f) No utilizar la fachada exterior del inmueble para pintar sobre ella avisos publicitarios o de cualquier otro tipo. Si la hicieren, serán responsables en todo caso, por el valor de reposición de la fachada a su estado actual, g) Reconocer a EL ARRENDADOR el valor de los servicios públicos que queden pendientes cuando se verifique la restitución del inmueble y que se hubiere causado mientras el inmueble estaba en manos de EL ARRENDATARIO, h) Reconocer a EL ARRENDADOR intereses, por razón de cualquier suma que quede a deber al finalizar este contrato, a la tasa de mora máxima anual autorizada por la Superintendencia Financiera, desde el día en que se constituya en mora y hasta la fecha del pago efectivo, i) EL ARRENDATARIO autoriza expresamente a EL ARRENDADOR para que éste agregue al presente documento unilateralmente y con plena validez y para todos los efectos legales, los cambios de nomenclatura que se pueden presentar, lo mismo que los linderos del bien arrendado, i). A no hacerse sustituir por otras personas en la relación tenencial, bien sea mediante cesión de este contrato o por otro medio cualquiera que tenga como efecto la mutación de las personas que ocuparán el inmueble.
                                                <br><b>9ª. GASTOS DE ADMINISTRACIÓN:</b> Estarán a cargo de EL ARRENDATARIO los gastos por concepto de cuotas de administración ordinaria y extraordinaria más el Impuesto al Valor Agregado (IVA), de las cuotas de administración que se deban pagar en la copropiedad en la cual se encuentra ubicado el inmueble arrendado. Dichas cuotas serán facturadas con el respectivo canon de arrendamiento.
                                                <br><b>10ª. GOOD WILL:</b> EL ARRENDATARIO se obliga a que, bajo ninguna circunstancia, pretenderá cobrar ni al <b>ARRENDADOR</b>, ni al <b>PROPIETARIO</b> del inmueble, suma alguna por conceptos tales como haber logrado una buena clientela, haber acreditado y posicionado el establecimiento, primas, buen nombre o “Good Will” o similares, por lo tanto, renuncia a cualquier tipo de reclamo judicial y/o extrajudicial por dicho concepto. Igualmente, EL ARRRENDATARIO manifiesta que no han pagado suma alguna por concepto de Good – Will o prima por el(los) inmueble(s) dado(s) en arrendamiento y en consecuencia no podrá cobrar ningún dinero por estos conceptos al ARRENDADOR ni al PROPIETARIOS a la terminación del contrato. En caso de enajenación del establecimiento de comercio, es voluntad de las partes establecer que el contrato de arrendamiento NO hará parte integral del bloque que conforma la venta del establecimiento de comercio y por tanto queda a criterio del El (los) ARRENDADOR(ES) la aprobación del adquiriente para la celebración de un nuevo contrato.
                                                <br><b>11ª. CESIÓN Y SUBARRIENDO:</b> EL ARRENDATARIO no podrá sub-arrendar totalmente o parcialmente el inmueble sin previa autorización y por escrito del EL ARRENDADOR. Para la cesión del presente contrato, por parte de EL ARRENDATARIO necesitará también autorización previa y por escrito de EL ARRENDADOR
                                                <br><b>12ª. RENUNCIA A REQUERIMIENTOS:</b> El incumplimiento de una cualquiera de las cláusulas estipuladas u obligaciones del contrato a cargo de <b>EL ARRENDATARIO</b> dará derecho al <b>ARRENDADOR</b> para dar por terminado el presente contrato sin previo aviso y sin necesidad de requerimiento de ninguna clase, al cual renuncia <b>EL ARRENDATARIO. EL ARRENDADOR</b> podrá además pedir la restitución del inmueble arrendado por la mora en el pago del precio del arrendamiento, el inicial o el que resulte de aplicar los reajustes, sin que para ello sean necesarias las reconvenciones previstas en el artículo 2007, 2035 del Código Civil. El arrendatario y los deudores solidarios que suscriben este contrato, renuncian expresamente a los requerimientos para ser constituidos en mora, ya sea que encuentre consagrados en cualquier norma sustancial o procesal.
                                                <br><b>13ª. EXENCIÓN DE RESPONSABILIDAD:</b> Queda claramente definido que EL ARRENDADOR no tiene a su cargo ni la vigilancia ni el control sobre el inmueble arrendado, ni injerencia alguna sobre la administración, si el inmueble estuviere sujeto a ella, y en consecuencia, se exonera de toda responsabilidad en caso de robo, pérdida o daños a las personas o a las cosas que puedan ocurrir dentro del inmueble arrendado, sea que en tales eventos intervengan o no la mano del hombre y que con ellos se perjudique directamente o indirectamente al ARRENDATARIO. De la misma manera, no será responsable por los deterioros que sufran las mercancías depositadas en el inmueble, por causas no imputables directamente a su voluntad, no obstante, el ARRENDATARIO se responsabiliza de asegurar el contenido (muebles, enseres, electrodomésticos, mercancía y demás) del inmueble contra todo riesgo. <b>PARÁGRAFO</b> En caso de enajenación del bien arrendado, EL ARRENDADOR no asume responsabilidad por los perjuicios que pueda sufrir EL ARRENDATARIO.
                                                <br><b>14ª. DEVOLUCIÓN DEL INMUEBLE AL ARRENDADOR:</b> Las partes convienen que el arrendador no aceptará como restituido el inmueble sin el cumplimiento de los siguientes requisitos por parte del (los) arrendatario(S) hasta el día de la entrega, inclusive: 1) constancia del pago de los últimos recibos de arrendamiento causados. 2) pago de penalización o indemnización en el caso que hubiere lugar a ella. 3) realización de las reparaciones locativas necesarias por los daños que durante el arrendamiento se hubieren causado al inmueble(S), o el pago de la cotización que para el efecto presente el arrendador. 4) paz y salvo de cuotas de administración cuando estas estén a su cargo. 5) constancia de pago del último periodo de facturación de servicios públicos domiciliarios, telecomunicaciones o televisión o demás empaquetamientos que hayan contratado con empresas prestadoras de servicios públicos; cuando estén a su cargo. Así mismo deberá el(los) arrendatario(S) gestionar y presentar la documentación que acredite el traslado o des empaquetamiento de los servicios que hubiere(N) asociado al inmueble, así como las demás cuentas que estuviesen a su cargo.
                                                <br><b>15ª. OTRAS CAUSALES DE TERMINACION:</b> EL ARRENDADOR además podrá dar por terminado el presente contrato por los siguientes motivos: 1) Cuando el no pago de los servicios públicos cause la suspensión, desconexión o pérdida del servicio. 2) Cuando <b>EL ARRENDATARIO</b> reiteradamente afecta la tranquilidad de los vecinos o destinen el inmueble para actos delictivos o que impliquen contravención. 3) Por mutuo acuerdo; 4) Por incumplimiento de cualquiera de las obligaciones contractuales del arrendatario; 5) Por vencimiento del término. 6) Las demás previstas por la ley. Si <b>EL ARRENDATARIO</b> desocupare el inmueble antes del vencimiento del término principal o de las prórrogas y/o renovaciones del presente contrato, se dará aplicación al artículo 2003 del Código Civil.
                                                <br><b>16ª. CESIÓN:</b> CESIÓN DE CONTRATO POR PARTE DEL ARRENDADOR: En cualquier momento podrá EL ARRENDADOR ceder libremente sus derechos que emanen de este contrato en los términos de los Artículos 1960 y siguientes del Código Civil. Tal cesión producirá efectos respecto del Arrendatario a partir de la fecha de la comunicación certificada en que a estos se comunique.
                                                <br><b>17ª. INTERESES:</b> Las sumas que a cualquier título en razón del presente contrato resultasen a cargo de <b>EL ARRENDATARIO</b> y que no hubiesen sido pagadas oportunamente, serán pagadas por éste con intereses a una tasa igual a la tasa máxima autorizada por las disposiciones vigentes, liquidadas desde la fecha de la causación hasta la fecha en que se efectúe el pago.
                                                <br><b>18ª. CLÁUSULA PENAL:</b> El incumplimiento o el cumplimiento tardío de cualquiera de las obligaciones que contrae <b>EL ARRENDATARIO</b> por este documento, le acarreará, por ese solo incumplimiento o por el cumplimiento tardío, el pago de una suma igual a tres (3) meses del arrendamiento vigente al momento del incumplimiento o del cumplimiento tardío, a título de pena, exigible sin necesidad de los requerimientos previos ni constitución en mora de que tratan los artículos 1594 y 1595 del Código Civil o cualquier otra disposición que así los contemple, derechos estos a los que renuncia expresamente <b>EL ARRENDATARIO</b>, y sin que su cobro implique la extinción de la obligación principal o de cualquiera de las obligaciones derivadas del contrato y sin perjuicio del cobro de las demás indemnizaciones que ese incumplimiento o el cumplimiento tardío, causen. Este contrato será prueba sumaria suficiente para el cobro de esta pena y el arrendatario o sus deudores solidarios renuncian expresamente a cualquier requerimiento privado o judicial para constituirlos en mora del pago de esta o cualquier otra obligación derivada del contrato. <b>PARÁGRAFO</b> Si el arrendatario restituye el inmueble objeto de este contrato antes del vencimiento del término del duración inicialmente pactado, o de sus prórrogas y/o renovaciones, sin mediar expresa autorización escrita del arrendador para tal entrega, deberá pagar como indemnización no la indicada en esta cláusula, sino el valor de los cánones de arrendamiento equivalentes al tiempo que faltare para cumplir el vencimiento del término inicial del contrato o el de su prorroga o renovación, según el caso.
                                                <br><b>19ª. MERITO EJECUTIVO:</b> EL ARRENDATARIO y deudores solidarios declaran de manera expresa que reconoce y acepta que este Contrato presta mérito ejecutivo para exigir del Arrendatario o deudores solidarios y a favor del Arrendador el pago de (i) los cánones de arrendamiento causados y no pagados por el Arrendatario, (ii) las multas y sanciones que se causen por el incumplimiento del Arrendatario de cualquiera de las obligaciones a su cargo en virtud de la ley o de este Contrato, (iii) las sumas causadas y no pagadas por el Arrendatario por concepto de servicios públicos del Inmueble, cuotas de administración y cualquier otra suma de dinero que por cualquier concepto deba ser pagada por el Arrendatario; para lo cual bastará la sola afirmación de incumplimiento del Arrendatario hecha por el Arrendador, afirmación que solo podrá ser desvirtuada por el Arrendatario con la presentación de los respectivos recibos de pago.
                                                <br><b>20ª. AUTORIZACIÓN PARA EL TRATAMIENTO Y RECOLECCIÓN DE DATOS PERSONALES. EL ARRENDATARIO Y EL(os) DEUDOR (es) SOLIDARIO(s)</b> por medio del presente contrato, manifestamos que LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, me ha informado que los datos personales que he incluido en los formularios para tomar en arrendamiento, los que he aportado como soporte y los que se insertaron en el presente contrato, serán utilizados y conocidos por LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, a quien ella delegue, a quien represente sus derechos, a quien en un futuro se le cedan sus derechos u ostente la misma posición contractual de <b>ARRENDADOR</b>, para los siguientes fines: <b>A)</b> actualización, consulta, y reporte en centrales de información. <b>B)</b> campañas comerciales y de mercadeo sobre productos y servicios relacionados e integrados afines. <b>C)</b> medir el nivel de satisfacción respecto de los productos y servicios. <b>D)</b> realizar investigaciones de mercadeo. <b>E)</b> análisis de información tendiente al control y prevención del fraude. <b>F)</b> el envío de SMS y MMS relativo al estado de mis obligaciones.
                                                En este orden de ideas, declaramos que conocemos nuestros derechos sobre nuestros datos personales incluidos en la Lay 1581 de 2012 y el decreto 1377 de 2013, los cuales podré ejercitar a través del siguiente canal: Correo físico enviado a la carrera 17 No 11 35 piso 2, dirigido a la Dirección Administrativa. Hemos sido informados acerca de la existencia del aviso de privacidad y la política de tratamiento de datos de LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, Habiendo sido informados de todo lo anterior, <b>AUTORIZAMOS</b> a LA INMOBILIARIA HABLEMOS DE NEGOCIOS SAS, o a quien ella delegue, a quien represente sus derechos, a quien en un futuro se le cedan sus derechos u ostente la misma posición contractual de ARRENDADOR, para recolectar y administrar mis datos personales, comerciales y financieros, conforme a los fines ya descritos y en los términos aquí indicados. Esta autorización tendrá la misma duración que en su momento tenga el presente contrato de arrendamiento.
                                                <br><b>21ª. VISITAS AL INMUEBLE:</b> El arrendador o la persona que este autorice, podrá visitar el inmueble materia de arrendamiento cuando lo estime conveniente a efectos de comprobar su uso, destino, conservación y otros, sin previo aviso para ello y se hará en el término de duración del contrato y en sus renovaciones y/o prórrogas.
                                                <br><b>22ª.</b> Si el(los) inmueble(s) arrendado(s) está(n) sometido(s) a régimen de Propiedad Horizontal, <b>EL ARRENDATARIO</b> deben observar en todas sus partes el reglamento de copropiedad, en especial lo pertinente a convivencia y comercio dicho reglamento debe ser solicitado al administrador del edificio.
                                                <br><b>23ª. CALIDAD DEL ARRENDADOR:</b> Obra en este contrato como intermediario, es decir en nombre y representación del propietario del inmueble en desarrollo de las facultades que le confiere el contrato de mandato que le ha sido encomendado. Las decisiones y autorizaciones que se den en relación con el presente contrato deben ser efectuadas solo por las partes, <b>EL ARRENDATARIO y EL ARRENDADOR</b>.
                                                <br><b>24ª. ABANDONO DEL INMUEBLE:</b> Al suscribir este contrato <b>EL ARRENDATARIO</b> faculta expresamente al <b>ARRENDADOR</b> para penetrar en el inmueble y recuperar su tenencia, con el solo requisito de la presencia de dos testigos, en procura de evitar el deterioro o desmantelamiento de tal inmueble, siempre que por cualquier circunstancia el mismo permanezca abandonado o deshabitado por el término de treinta (30) días y que la exposición al riesgo sea tal que amenace la integridad física del bien o la seguridad del vecindario. La misma facultad tendrán los deudores solidarios en caso de abandono del inmueble para efectos de restituirlo al arrendador.
                                                <br><b>25ª. DEUDORES SOLIDARIOS:</b> Los suscritos: <?php echo $nombre_codeudor_uno ?> identificado con cedula No <?php echo $cc_codeudor_uno ?>, <?php echo $nombre_codeudor_dos ?> identificado con cedula No <?php echo $cc_codeudor_dos ?>, <?php echo $nombre_codeudor_tres ?> identificado con cedula No <?php echo $cc_codeudor_tres ?>, Por medio del presente documento nos declaramos deudores del ARRENDADOR en forma solidaria e indivisible junto con el Arrendatario <?php echo $inquilino ?> de todas las cargas y obligaciones contenidas en el presente contrato, tanto durante el término inicialmente pactado como durante sus prórrogas y/o renovaciones expresas o tácitas y hasta la restitución real del inmueble al arrendador, por concepto de: Arrendamientos, servicios públicos, indemnizaciones, daños en el inmueble, cuotas de administración, cláusulas penales, costas procesales y cualquier otra derivada del contrato, las cuales podrán ser exigidas por el arrendador a cualquiera de los obligados, por la vía ejecutiva, sin necesidad de requerimientos privados o judiciales a los cuales renunciamos expresamente, sin que por razón de esta solidaridad asumamos el carácter de fiadores, ni arrendatarios del inmueble objeto del presente contrato, pues tal calidad la asume exclusivamente <?php echo $inquilino ?> y sus respectivos causa habitantes. Todo lo anterior sin perjuicio de que en caso de abandono del inmueble cualquiera de los deudores solidarios pueda hacer entrega válidamente del inmueble al arrendador o a quien este señale, bien sea judicial o extrajudicialmente. Para este exclusivo efecto el arrendatario otorga poder amplio y suficiente a los deudores solidarios en este mismo acto y al suscribirse el presente contrato. <b>PARAGRAFO CESIÓN DEL CONTRATO</b>. Aceptamos desde ahora, cualquier Cesión que el ARRENDADOR haga respecto del presente contrato y aceptamos expresamente que la notificación de que trata el artículo 1960 del Código Civil se surta con el envío por correo certificado y a la dirección que registramos al lado de nuestra firma, de la copia de la respectiva nota de cesión acompañada de la copia simple del contrato.
                                                Autorizamos <b>AL ARRENDADOR</b> o a quien represente sus derechos u ostente en el futuro la calidad de acreedor, para que en los mismos términos señalados en la cláusula <b>20ª</b>. De este contrato, se incorporen nuestros datos personales.
                                                <br><b>26ª. COPIA DEL CONTRATO:</b> EL ARRENDATARIO manifiesta que ha recibido copia del presente contrato a satisfacción.
                                                <br><b>27ª. GESTION DE COBRANZA:</b> Serán a cargo de los arrendatarios y deudores solidarios, por aquellas acciones judiciales o administrativas o extrajudiciales que se instauren por culpa o incumplimiento de estos que hagan de algunas cláusulas de este contrato e igualmente reconocerán los honorarios profesionales que se generen hasta en un 20% extrajudicial y en un 25% judicialmente en donde intervenga abogado en la gestión del arrendador y las costas.
                                                <br><b>28ª.</b> En caso de contravención por parte de <b>EL ARRENDATARIO</b> a alguna o algunas de las cláusulas contempladas en éste contrato, o a la violación de las disposiciones legales que en materia de arrendamientos regula la legislación colombiana, <b>EL ARRENDADOR</b> podrá dar por terminado el contrato de arrendamiento y exigir la entrega del inmueble sin perjuicio de la sanción por incumplimiento.
                                                <br><b>29ª. CORRESPONDENCIA Y NOTIFICACION DE EL ARRENDATARIO Y DEUDORES SOLIDARIOS.</b> EL ARRENDATARIO Y LOS DEUDORES SOLIDARIOS autorizan expresamente a EL ARRENDADOR a enviar comunicaciones, llamadas telefónicas, circulares e información en general vía correo electrónico y/o a través de mensajes de texto a celulares o whatsApp como medio válido de notificaciones Judiciales y extrajudiciales relacionadas directas o indirectamente con el contrato de Arrendamiento. Para estos efectos y con plena validez, se adjunta al pie de las respectivas firmas la dirección de correspondencia, la dirección de correo electrónico y el número de celular y/o fijo. Dichas direcciones conservarán plena validez para todos los efectos legales, hasta tanto no sea informado por correo certificado a la otra parte del contrato, el cambio de la misma.
                                                <br><b>30ª. SEGURO:</b> EL ARRENDATARIO pagara póliza por daños ocasionados a la mercancía o enseres que tenga dentro del inmueble; igualmente por daños a terceros.
                                                <br><b>31ª. RENUNCIAS:</b> <b>EL ARRENDATARIO Y EL(os) CODEUDOR(es) SOLIDARIO(s)</b> que al final del contrato se citan renuncian expresamente a los siguientes derechos: <b>a)</b> Al derecho de retención que en algunos casos consagran las leyes a su favor. <b>b)</b> A exigir indemnización o prestación alguna por razón de las reparaciones y/o mejoras puestas en el inmueble sin consentimiento expreso y escrito de <b>EL ARRENDADOR, c)</b> A exigir suma alguna por concepto de <b>PRIMA COMERCIAL O "GOOD WILL"</b>, a la terminación del presente contrato de arrendamiento. No podrá cobrar ninguna suma por este concepto a terceras personas y menos a EL ARRENDADOR, d) Renuncian expresamente a los requerimientos de que tratan los Artículos 2007 del C.C. y 424 del C. de P.C., y en general a los que consagre cualquier norma sustancial o procesal para efectos de la constitución en mora.
                                                <br><b>32ª. SARLAFT LAVADO DE ACTIVOS Y FINANCIACION ALTERRORISMO:</b> Las partes garantizan que ni ellas, ni sus socios, accionistas, ni vinculados o beneficiarios reales: (i) han estado, se encuentran, o temen ser incluidos en alguna de las listas que administra la Oficina de Control de Activos del Departamento del Tesoro de los Estados Unidos de América; (ii) no tienen investigaciones en curso, ni han sido sindicados o condenados por narcotráfico, financiación al terrorismo, ni lavado de activos; y, (iii) sus bienes, negocios y los recursos con los que cumplirán el presente Contrato, al igual que los de sus accionistas, si aplica, provienen de actividades lícitas. Cada una de las partes se obliga a notificar de inmediato a su contraparte cualquier cambio a las situaciones declaradas en el presente numeral, informando las medidas que tomará para mitigar los daños que ello pueda causar. No obstante, lo anterior, en el evento en que alguna de las partes, o cualquiera de sus socios, accionistas, vinculados o beneficiarios reales sean incluidos por cualquier causa en dichos listados, o se encuentren bajo cualquier tipo de investigación que razonablemente pueda conducir a ello, su contraparte podrá terminar anticipadamente este contrato sin que ello genere multa o indemnización alguna.
                                                <br><b>CLAUSULAS ADICIONALES</b>
                                                <br>
                                                Las infracciones de orden policivo y delictivo en las que incurrieren los arrendatarios objeto de este contrato, son de absoluta y total responsabilidad de los deudores solidarios.
                                                <br>
                                                <textarea cols="20" rows="3" class="w-100 p-2" style="border: none;" placeholder="Digite aquí"></textarea>
                                                <br>
                                                Para constancia se firma por las partes y cada uno de los firmantes declara haber recibido del arrendador, copia del contrato de arriendo en referencia con firmas originales el día <?php echo $fecha; ?>.

                                            </p>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12">'; //inicia div de columnas 
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
                                                                echo '</div>'; //inicia div de columnas 
                                                            
                                                                ?>
                                                            </h6>
                                                        </th>
                                                        <th scope="col">
                                                            <br>
                                                            <br>
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $inquilino . '</label><br>';
                                                                    echo '<label class="card-text">ARRENDATARIO</label><br>';
                                                                    echo '<label class="card-text">C.C o NIT No ' . $id_inquilino . '</label><br>';
                                                                    echo '<label class="card-text">TELÉFONO FIJO O CELULAR: ' . $telefono_inquilino . '</label><br>';
                                                                    echo '<label class="card-text">E-MAIL: ' . $email_inquilino . '</label><br>';
                                                                    echo '<br>';
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
                                                            <br>
                                                            <br>
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $nombre_codeudor_uno . '</label><br>';
                                                                    echo '<label class="card-text">DEUDOR SOLIDARIO (1)</label><br>';
                                                                    echo '<label class="card-text">C.C o NIT No ' . $cc_codeudor_uno . '</label><br>';
                                                                    echo '<label class="card-text">DIRECCION RESIDENCIA: '.$direccion_codeudor_uno.'</label><br>';
                                                                    echo '<label class="card-text">TEL FIJO Y CELULAR:'.$telefono_codeudor_uno.'</label><br>';
                                                                    echo '<label class="card-text">E-MAIL:' . $email_codeudor_uno . '</label><br>';
                                                                }
                                                                echo '</div>'; //inicia div de columnas 
                                                             
                                                                ?>
                                                            </h6>
                                                        </th>
                                                        <th scope="col">
                                                            <br>
                                                            <br>
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
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
                                                            <br>
                                                            <br>
                                                            <h6>
                                                                <?php
                                                                echo '<div class="row">'; //inicia div de columnas 
                                                                echo '<div class="col col-md-12">'; //inicia div de columnas 
                                                                $queryCompany = mysqli_query($con, "SELECT * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE id='$nik'");
                                                                while ($empresaLog = mysqli_fetch_assoc($queryCompany)) {
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<br>';
                                                                    echo '<label class="card-text">-------------------------------------</label><br>';
                                                                    echo '<label class="card-text text-uppercase">' . $nombre_codeudor_tres . '</label><br>';
                                                                    echo '<label class="card-text">DEUDOR SOLIDARIO (3)</label><br>';
                                                                    echo '<label class="card-text">C.C o NIT No ' . $cc_codeudor_tres . '</label><br>';
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
        function ajustarAncho(input) {
            input.style.width = input.value.length + "ch";
        }
    </script>

</body>

</html>