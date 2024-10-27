<?php 
function getConn(){
	$mysqli = mysqli_connect('190.8.176.35', 'hablemos', '4Ee8-63@Ha', "hablemos_real_estate");
	if (mysqli_connect_errno($mysqli))
		echo "Error al Conectar la Base de Datos: " . mysqli_connect_error();
	$mysqli->set_charset('utf8');
	return $mysqli;
}
?>