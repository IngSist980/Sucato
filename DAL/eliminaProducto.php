<?php

$idProducto = $_GET['idProducto'];
include 'conexion.php';
try {
    $response = EliminaDato($idProducto);
    $data = array(
        'idProducto' => $idProducto,
        'eliminado' => $response
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} catch (\Throwable $th) {
    echo json_encode(false, JSON_UNESCAPED_UNICODE);
    error_log('Error al eliminar producto' . $th);
}

?>