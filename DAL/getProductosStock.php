<?php

include 'conexion.php';
$sql = "SELECT * FROM producto WHERE activo = true";
$myArray = getProductos($sql);

return $myArray;

?>