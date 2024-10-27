<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

// Obtener el ID y el nuevo valor de los parámetros GET
$id = $_GET['id'];
$nuevoValor = $_GET['nuevo_valor'];

$query = mysqli_query($con, "UPDATE proprieter SET ipc=$nuevoValor WHERE id=$id");
      
//$query="SELECT DISTINCT  * FROM proprieter INNER JOIN municipios ON proprieter.Municipio = municipios.id_municipio WHERE departamento_id=$id  AND estadoPropietario='ACTIVO' GROUP BY id_municipio";
if ($query) {
    echo "Actualización exitosa";
} else {
    echo "Error al actualizar: " . $con->error;
}
$response = "Actualización exitosa para ID: $id con nuevo valor: $nuevoValor";
echo $response;
?>