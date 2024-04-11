<?php

$idProducto = $_GET['idProducto'];
include 'conexion.php';
//$elSQL = "select id_producto, nombre, descripcion, peso, precio, existencias, ruta_imagen from producto where id_producto = $idProducto";
$elSQL = "select nombre, descripcion, peso, precio, existencias, ruta_imagen, activo from producto where id_producto = $idProducto";

$myArray = getProducto($elSQL);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);

?>