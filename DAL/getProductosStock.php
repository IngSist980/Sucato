<?php

include 'conexion.php';
$sql = "SELECT * FROM producto WHERE activo = true";
$myArray = getProductos($sql);

$stock=json_encode($myArray, JSON_UNESCAPED_UNICODE);

return($stock);

?>