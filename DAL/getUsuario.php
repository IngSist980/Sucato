<?php

$idUsuario = $_GET['id_usuario'];
include 'conexion.php';
$elSQL = "select id_usuario, username, password, nombre, primer_apellido, segundo_apellido, correo, telefono, activo, tipoRol
 from usuario U, rol R where U.id_usuario =R.id_usuario and U.id_usuario= $idUsuario";

$myArray = getUsuario($elSQL);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);

?>