<?php

function connectDB()
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "sucato";

    // 1. Establecer la conexión con MySQl(MSQLi)
    $conexion = mysqli_connect($server, $user, $password, $database);

    // 2. Verificar si la conexión se establecio
    if (!$conexion) {
        echo "Ocurrió un error al establecer la conexión con la base de datos: " . mysqli_connect_error();
    }

    return $conexion;
}

function disconnectDB($conexion)
{

    $close = mysqli_close($conexion);

    // 2. Verificar si la conexión se establecio
    if ($close) {
        //echo "La desconexión de la base de datos fue exitosa";
    }

    return $close;
}


function getProductos($sql)
{
    $conexion = connectDB();

    mysqli_set_charset($conexion, "utf8");

    if (!$result = mysqli_query($conexion, $sql))
        die();

    $rawdata = array();

    $i = 0;

    while ($row = mysqli_fetch_array($result)) {
        $rawdata[$i] = $row;
        $i++;
    }

    disconnectDB($conexion);

    return $rawdata;
}

function getProducto($sql)
{
    $retorno = null;

    try {
        $oConexion = connectDB();

        //formato utf8
        if (mysqli_set_charset($oConexion, "utf8")) {

            if (!$result = mysqli_query($oConexion, $sql))
                die();

            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
            }
        }

    } catch (\Throwable $th) {
        //throw $th;
        // Almacenar en bitacora el error (Apache)
        echo $th;
    } finally {
        disconnectDB($oConexion);
    }

    return $retorno;
}


function InsertaDatos($pIdCategoria, $pNombre, $pDescripcion, $pPeso, $pPrecio, $pExistencias, $pRutaImagen, $pActivo)
{
    $response = "";
    $conn = connectDB();

    mysqli_set_charset($conn, "utf8");

    $stmt = $conn->prepare("INSERT INTO producto (id_categoria, nombre, descripcion, peso, precio, existencias, ruta_imagen, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issiiisi", $iIdCategoria, $iNombre, $iDescripcion, $iPeso, $iPrecio, $iExistencias, $iRutaImagen, $iActivo);

    // Setear parámetros
    $iIdCategoria = $pIdCategoria;
    $iNombre = $pNombre;
    $iDescripcion = $pDescripcion;
    $iPeso = $pPeso;
    $iPrecio = $pPrecio;
    $iExistencias = $pExistencias;
    $iRutaImagen = $pRutaImagen;
    $iActivo = $pActivo;

    $stmt->execute();

    $response = "Producto almacenado correctamente";

    $stmt->close();
    disconnectDB($conn);

    return $response;
}


function EliminaDato($pidProducto)
{
    $conn = connectDB();

    $stmt = $conn->prepare("DELETE FROM producto WHERE id_producto= ?");

    // Setear parámetros
    $idProducto = $pidProducto;

    $stmt->bind_param("i", $idProducto);

    $response = $stmt->execute();

    $stmt->close();
    disconnectDB($conn);

    return $response;
}


function actualizaDatos($pIdProducto, $pNombre, $pDescripcion, $pPeso, $pPrecio, $pExistencias, $pRutaImagen, $pActivo)
{
    $response = "";
    $conn = connectDB();

    mysqli_set_charset($conn, "utf8");

    $stmt = $conn->prepare("UPDATE producto 
                            SET nombre= ?,
                                descripcion = ?,
                                peso = ?,
                                precio = ?,
                                existencias = ?,
                                ruta_imagen = ?,
                                activo = ?
                                WHERE id_producto= ?");
    $stmt->bind_param("ssiiisii", $iNombre, $iDescripcion, $iPeso, $iPrecio, $iExistencias, $iRutaImagen, $iActivo, $iIdProducto);

    // Setear parámetros
    $iIdProducto = $pIdProducto;
    $iNombre = $pNombre;
    $iDescripcion = $pDescripcion;
    $iPeso = $pPeso;
    $iPrecio = $pPrecio;
    $iExistencias = $pExistencias;
    $iRutaImagen = $pRutaImagen;
    $iActivo = $pActivo;

    $stmt->execute();

    $response = "Producto actualizado correctamente";

    $stmt->close();
    disconnectDB($conn);


    return $response;
}

//Para usuarios
function getUsuario($sql)
{
    $retorno = null;

    try {
        $oConexion = connectDB();

        //formato utf8
        if (mysqli_set_charset($oConexion, "utf8")) {

            if (!$result = mysqli_query($oConexion, $sql))
                die();

            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
            }
        }

    } catch (\Throwable $th) {

        echo $th;
    } finally {
        disconnectDB($oConexion);
    }

    return $retorno;
}