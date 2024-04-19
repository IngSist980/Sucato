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
$primer_apellido = recoge('primerApellido');
$segundo_apellido = recoge('segundoApellido');
$correo = recoge('correo');
$telefono = recoge('telefono');
// $tipoRol = recoge('tipoRol');

$errores = [];

// Validación de datos
if (empty($username)) {
    $errores[] = "No anotó un nombre de usuario válido";
}

if (empty($password)) {
    $errores[] = "No anotó una contraseña";
}

if (empty($nombre)) {
    $errores[] = "No ingresó el nombre";
}

if (empty($primer_apellido)) {
    $errores[] = "No ingresó el primer apellido";
}

if (empty($segundo_apellido)) {
    $errores[] = "No ingresó el segundo apellido";
}

// Si hay errores, imprimirlos y salir
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p class='aviso'>$error</p>";
    }
    exit;
}

// Hash de la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "sucato");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
    
}
//Enviar el dato a la tabla usuario
// Preparar la consulta SQL para insertar los datos en la tabla
$consultaUsuario = $conexion->prepare("INSERT INTO usuario (username, password, nombre, primer_apellido, segundo_apellido, correo, telefono, activo) VALUES (?, ?, ?, ?, ?, ?, ?, 1)");

// Vincular parámetros y ejecutar la consulta
$consultaUsuario->bind_param("sssssss", $username, $hashed_password, $nombre, $primer_apellido, $segundo_apellido, $correo, $telefono);
$consultaUsuario->execute();

// Verificar si se insertaron los datos correctamente. Si se realizó, entonces va y guarda el tipoRol
if ($consultaUsuario->affected_rows > 0) {
    // Obtener el ID del usuario insertado
    $idUsuario = $conexion->insert_id;

    // Preparar la consulta SQL para insertar el rol del usuario en la tabla de rol
    $consultaRol = $conexion->prepare("INSERT INTO rol (tipoRol, id_usuario) VALUES ('Cliente', ?)");

    // Vincular parámetros y ejecutar la consulta para la tabla de rol
    $consultaRol->bind_param("i", $idUsuario);
    $consultaRol->execute();

    // Verificar si se insertaron los datos correctamente en la tabla de rol
    if ($consultaRol->affected_rows > 0) {
        // echo "Registro exitoso.
        echo json_encode(["success" => true, "message" => "Registro exitoso."]);
    } else {
        // echo "Error al registrar el rol del usuario.
        echo json_encode(["success" => false, "message" => "Error al registrar el usuario."]);
    }
} else {
    echo "Error al registrar el usuario.";
}



// Cerrar la conexión y liberar los recursos
$consultaUsuario->close();
$consultaRol->close();
$conexion->close();
?>
