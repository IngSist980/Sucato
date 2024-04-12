<?php

$idProducto = $_GET['idProducto'];
include 'conexion.php';
try {
    $response = EliminaDato($idProducto);

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
} catch (\Throwable $th) {
    echo json_encode(false, JSON_UNESCAPED_UNICODE);
    error_log('Error al eliminar producto' . $th);
}

?>