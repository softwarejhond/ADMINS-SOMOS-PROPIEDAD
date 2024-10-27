<?php
// Conecta a la base de datos (ajusta según tu configuración)
include './conexion.php';
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Recibe los valores desde el cliente
$nuevoValor = $_POST['nuevoValor'];
$parametroAdicional = $_POST['parametroAdicional'];

// Actualiza el campo en la base de datos utilizando el parámetro adicional (ajusta según tu esquema de base de datos)
$sql = "UPDATE proprieter SET ipc = '$nuevoValor' WHERE id = '$parametroAdicional';";

if ($con->query($sql) === TRUE) {
    echo "Actualización exitosa";
} else {
    echo "Error al actualizar: " ;
}

?>
