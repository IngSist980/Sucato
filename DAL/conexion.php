<?php

function connectDB() {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "sucato";

    // 1. Establecer la conexión con MySQl(MSQLi)
    $conexion = mysqli_connect($server, $user, $password, $database);

    // 2. Verificar si la conexión se establecio
    if (!$conexion){
        echo "Ocurrió un error al establecer la conexión con la base de datos: " . mysqli_connect_error();
    }

    return $conexion;
}

function disconnectDB($conexion) {

    $close = mysqli_close($conexion);

    // 2. Verificar si la conexión se establecio
    if ($close){
        //echo "La desconexión de la base de datos fue exitosa";
    }

    return $close;
}


function getProductos($sql){
    $conexion = connectDB();

    mysqli_set_charset($conexion, "utf8");

    if(!$result = mysqli_query($conexion, $sql)) die();

    $rawdata = array();

    $i= 0;

    while($row = mysqli_fetch_array($result)){
        $rawdata[$i] = $row;
        $i++;
    }

    disconnectDB($conexion);

    return $rawdata;
}

/*
function InsertaDatos($pnombreAlumno, $pidProfesor, $pidDia, $phora, $pasunto) {
    $response = "";
    $conn = connectDB();

    mysqli_set_charset($conn, "utf8");

    $stmt = $conn->prepare("INSERT INTO tutoria (alumno, idprofesor, idDia, hora, asunto) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("siiis", $inombre, $iprofesor, $idia, $ihora, $iasunto);

    // Setear parámetros
    $inombre = $pnombreAlumno;
    $iprofesor = $pidProfesor;
    $idia = $pidDia;
    $ihora = $phora;
    $iasunto = $pasunto;

    $stmt->execute();

    $response = "Se almacenó la tutoria satisfactoriamente";

    $stmt->close();
    disconnectDB($conn);
   

    return $response;
}


function EliminaDato($pidTutoria) {
    $response = "";
    $conn = connectDB();

    $stmt = $conn->prepare("DELETE FROM tutoria WHERE id= ?");
    $stmt->bind_param("i", $idTutoria);

    // Setear parámetros
    $idTutoria = $pidTutoria;

    $stmt->execute();

    $response = "Se eliminó la tutoria correctamente";

    $stmt->close();
    disconnectDB($conn);
   

    return $response;
}


function actualizaDatos($pidTutoria, $pnombreAlumno, $pidProfesor, $pidDia, $phora, $pasunto) {
    $response = "";
    $conn = connectDB();

    mysqli_set_charset($conn, "utf8"); //formato datos

    $stmt = $conn->prepare("UPDATE tutoria 
                            SET alumno= ?,
                                idprofesor = ?,
                                idDia = ?,
                                hora = ?,
                                asunto = ?
                                WHERE id= ?");
    $stmt->bind_param("siiisi", $inombre, $iprofesor, $idia, $ihora, $iasunto, $itutoria);

    // Setear parámetros
    $inombre = $pnombreAlumno;
    $iprofesor = $pidProfesor;
    $idia = $pidDia;
    $ihora = $phora;
    $iasunto = $pasunto;
    $itutoria = $pidTutoria;

    $stmt->execute();

    $response = "Se actualizó la tutoría correctamente";

    $stmt->close();
    disconnectDB($conn);
   

    return $response;
}


function getObjeto($sql){
    $conn = connectDB();

    mysqli_set_charset($conn, "utf8"); //formato datos

    
    if(!$result = mysqli_query($conn, $sql)) die();

    $rawdata = null;

    $i = 0;

    while($row = mysqli_fetch_array($result)){
        $rawdata = $row;
        $i++;
    }

    disconnectDB($conn);

    return $rawdata;
}
*/
