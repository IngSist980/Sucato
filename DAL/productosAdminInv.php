<?php
 
include 'conexion.php';
$sql = "SELECT * FROM producto";
$myArray = getProductos($sql);
 
return $myArray;
 
?>