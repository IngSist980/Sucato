<?php

include 'conexion.php';
$sql = "SELECT * FROM producto WHERE activo = true";
$myArray = getProductos($sql);

echo json_encode($myArray, JSON_UNESCAPED_UNICODE);


?>