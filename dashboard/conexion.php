<?php
/*Datos de conexion a la base de datos*/
$db_host = "148.113.168.25";
$db_user = "inmobi43";
$db_pass = "5)bj9mO2M]KK8z";
$db_name = "inmobi43_hablemos";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
date_default_timezone_set('America/Bogota');
mysqli_set_charset($con, 'utf8'); //Muy importante esta linea, guardara el contenido que contenga acentos de manera correcta configurando la bd con el UTF-8 spanis ci
if (mysqli_connect_errno()) {
    echo 'No se pudo conectar a la base de datos : ' . mysqli_connect_error();
}
