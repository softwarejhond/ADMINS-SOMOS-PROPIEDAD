<?php
function connection()
{
    $db = 'database.php';
    return $db;
};
function json($js)
{
    $json = json_encode($js);
    echo $json;
};

function inventario($codigo, $fecha)
{
    try {
        require connection();
        $sql_cod = "SELECT * FROM propiedades WHERE codigo_propiedad = '$codigo';";
        $query_cod = mysqli_query($db, $sql_cod);
        if ($query_cod->num_rows > 0) { // si existe la propiedad
            $sql_num = "SELECT MAX(id_inventario) AS 'inventario' FROM inventario;";
            $query_num = mysqli_query($db, $sql_num);
            $id_inventario = mysqli_fetch_assoc($query_num)["inventario"] + 1;
            $sql = "INSERT INTO inventario (id_inventario,codigo_propiedad, fecha_inventario) VALUES ($id_inventario,'$codigo','$fecha') ;";
            mysqli_query($db, $sql);
            $respuesta = [
                "proceso" => true,
                "id_inventario" => $id_inventario
            ];
            return $respuesta;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function guardar($tabla, $id_inventario, $id_zona, $propiedades, $valores)
{
    try {
        require connection();
        $sql = "INSERT INTO $tabla (id_inventario,id_zona,$propiedades) VALUES ('$id_inventario','$id_zona',$valores);";
        $query = mysqli_query($db, $sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function eliminar($tablas, $id_inventario)
{
    try {
        require connection();
        $sql_inv = "SELECT * FROM inventario WHERE id_inventario = $id_inventario;";
        $query_inv = mysqli_query($db, $sql_inv);
        if ($query_inv->num_rows > 0) {
            foreach ($tablas as $key => $value) {
                $sql = "DELETE FROM $value WHERE id_inventario = $id_inventario;";
                mysqli_query($db, $sql);
            }
            $sql_inventario = "DELETE FROM inventario WHERE id_inventario = $id_inventario;";
            mysqli_query($db, $sql_inventario);
            $sql_invZon = "DELETE FROM inventario_zona WHERE id_inventario = $id_inventario;";
            mysqli_query($db, $sql_invZon);
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function buscar($codPropiedad)
{
    try {
        require connection();
        $sql_cod = "SELECT * FROM propiedades WHERE codigo_propiedad = '$codPropiedad';";
        $query_cod = mysqli_query($db, $sql_cod);
        if ($query_cod->num_rows > 0) {
            $sql = "SELECT * FROM inventario WHERE codigo_propiedad = '$codPropiedad';";
            $query = mysqli_query($db, $sql);
            $inventarios = array();
            if ($query->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $inventarios[] = [
                        "inventario" => $row["id_inventario"],
                        "fecha" => $row["fecha_inventario"]
                    ];
                };
                $respuesta = [
                    "proceso" => true,
                    "inventarios" => $inventarios
                ];
            } else {
                $respuesta = [
                    "proceso" => false,
                    "mensaje" => "Codigo de Propiedad no Tiene Inventarios"
                ];
            };
        } else {
            $respuesta = [
                "proceso" => false,
                "mensaje" => "Codigo de Propiedad no Existe"
            ];
        }
        return $respuesta;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function confirmar($id_inventario, $id_zona)
{
    try {
        require connection();
        $sql = "SELECT * FROM inventario_zona WHERE id_inventario = $id_inventario AND id_zona = $id_zona;";
        $query = mysqli_query($db, $sql);
        if ($query) {
            $filas = $query->num_rows;
        }
        return $filas;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function buscarEditar($tabla, $id_inventario, $id_zona)
{
    try {
        require connection();
        $sql = "SELECT * FROM $tabla WHERE id_zona = $id_zona AND id_inventario = $id_inventario;";
        $query = mysqli_query($db, $sql);

        $filas = array();
        if ($query->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $filas[] = $row;
            }
            $respuesta = [
                "proceso" => true,
                "filas" => $filas
            ];
        }else{
            // echo mysqli_error($db);
            $respuesta = [
                "proceso" => false
            ];
        }
        return $respuesta;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function editar($id,$tabla, $valores)
{
    try {
        require connection();
        $sql = "UPDATE $tabla SET $valores WHERE id = $id;";
        $query = mysqli_query($db, $sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function eliminarObjeto($tabla,$id){
    try {
        require connection();
        $sql = "DELETE FROM $tabla WHERE id = $id;";
        $query = mysqli_query($db, $sql);
        if($query){
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
function asociarInvtZona($id_inventario, $id_zona)
{
    try {
        require connection();
        $sql = "INSERT INTO inventario_zona (id_inventario,id_zona) VALUES ('$id_inventario','$id_zona');";
        $query = mysqli_query($db, $sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["funcion"])) {
        switch ($_POST["funcion"]) {
            case 1: //confirmar si existen zonas guardadas
                $id_inventario = $_POST["id_inventario"];
                $id_zona = $_POST["id_zona"];
                $confirmar = confirmar($id_inventario, $id_zona);
                json($confirmar);
                break;
            case 2: //Guardar formulario por cada zona
                $tabla = $_POST["tabla"];
                $id_inventario = $_POST["id_inventario"];
                $id_zona = $_POST["id_zona"];
                $propiedades = $_POST["propiedades"];

                $objeto = json_decode(json_encode($_POST["objeto"]));
                $array_obj = get_object_vars($objeto);

                $propiedades = array_keys($array_obj);
                $propiedades = implode(', ', $propiedades);

                $valores = array_map(function ($value) {
                    return "'" . $value . "'";
                }, $array_obj);
                $valores = implode(', ', $valores);

                $guardar = guardar($tabla, $id_inventario, $id_zona, $propiedades, $valores);
                json($guardar);
                break;
            case 3: //Crear nuevo inventario
                $codigo = $_POST["codigo"];
                $fecha = $_POST["fecha"];
                $num_invent = inventario($codigo, $fecha);
                json($num_invent);
                break;
            case 4: // eliminar inventario en todas las zonas y tambien de la 
                $tablas = $_POST["tablas"];
                $id_inventario = $_POST["id_inventario"];
                $eliminar = eliminar($tablas, $id_inventario);
                $respuesta = [
                    "proceso" => $eliminar
                ];
                json($respuesta);
                break;
            case 5: // consultar inventarios de una propiedad 
                $codPropiedad = $_POST["codPropiedad"];
                $buscar = buscar($codPropiedad);
                json($buscar);
                break;
            case 6: // confirmar informacion para editar
                $tabla = $_POST["tabla"];
                $id_inventario = $_POST["id_inventario"];
                $id_zona = $_POST["id_zona"];
                $buscarEditar = buscarEditar($tabla, $id_inventario, $id_zona);
                json($buscarEditar);
                break;
            case 7: // Guardar zona en inventario
                $id_inventario = $_POST["id_inventario"];
                $id_zona = $_POST["id_zona"];
                $asociarInvtZona = asociarInvtZona($id_inventario, $id_zona);
                json($asociarInvtZona);
                break;
            case 8: //editar
                $id = $_POST["id"];
                $tabla = $_POST["tabla"];
                $id_inventario = $_POST["id_inventario"];
                $id_zona = $_POST["id_zona"];
                $objeto = $_POST["objeto"];
                $valores = array();
                foreach($objeto as $key => $value){
                    $valores[] = "$key = '$value'";
                }
                $valores = implode(',',$valores);
                $guardar = editar($id,$tabla,$valores);
                json($guardar);
                break;
            case 9:
                $id = $_POST["id"];
                $tabla = $_POST["tabla"];
                $eliminar = eliminarObjeto($tabla,$id);
                json($eliminar);
                break;
        }
    }
}
