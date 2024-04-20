<?php
function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

$username = recoge('username');
$password = recoge('password');
$nombre = recoge('nombre');
$primer_apellido = recoge('apellido1');
$segundo_apellido = recoge('apellido2');
$correo = recoge('correo');
$telefono = recoge('telefono');
$id_usuario = recoge('id');

$errores = [];

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sucato");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Actualizar los datos del usuario en la tabla
$consultaEditarUsuario = $conexion->prepare("UPDATE usuario SET username = ?, password = ?, nombre = ?, primer_apellido = ?, segundo_apellido = ?, correo = ?, telefono = ? WHERE id_usuario = ?");

// Hash de la contraseña solo si se proporciona una nueva contraseña
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
} else {
    // Obtener la contraseña actual del usuario
    $consultaPassword = $conexion->prepare("SELECT password FROM usuario WHERE id = ?");
    $consultaPassword->bind_param("i", $id_usuario);
    $consultaPassword->execute();
    $consultaPassword->bind_result($hashed_password);
    $consultaPassword->fetch();
    $consultaPassword->close();
}

// Vincular parámetros y ejecutar la consulta
$consultaEditarUsuario->bind_param("sssssssi", $username, $hashed_password, $nombre, $primer_apellido, $segundo_apellido, $correo, $telefono, $id_usuario);
$consultaEditarUsuario->execute();

// Verificar si se actualizó el usuario correctamente
if ($consultaEditarUsuario->affected_rows > 0) {
    echo json_encode(["success" => true, "message" => "Usuario actualizado correctamente."]);
} else {
    echo json_encode(["success" => false, "message" => "Error al actualizar el usuario."]);
}

// Cerrar la conexión y liberar los recursos
$consultaEditarUsuario->close();
$conexion->close();
?>
