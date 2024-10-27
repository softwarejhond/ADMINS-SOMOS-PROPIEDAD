<?php
function getConn()
{
	$mysqli = mysqli_connect('148.113.168.25', 'inmobi43', '5)bj9mO2M]KK8z', "inmobi43_hablemos");
	if (mysqli_connect_errno($mysqli))
		echo "Error al Conectar la Base de Datos: " . mysqli_connect_error();
	$mysqli->set_charset('utf8');
	return $mysqli;
}
?>
