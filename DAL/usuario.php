<?php
require_once "conexion.php";

function getUsuarioByUsername($username)
{
    $conn = connectDB();

    $stmt = $conn->prepare("SELECT id_usuario, username, password FROM usuario WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    $stmt->close();
    disconnectDB($conn);

    return $userData;
}

// Función retorna roles
function getRol($idUsuario){ 
    try {
        $elSQL = "select id_rol, tipoRol from rol where id_usuario = $idUsuario  AND tipoRol = 'Admin'";
        $result = rolAdmin($elSQL);
        if ($result === null) {
            error_log("Rol no encontrado");
            return null;
        }
        return $result;
    } catch (\Throwable $th) {
        $mensaje_error = "Error: " . $th->getMessage();
        error_log($mensaje_error);
    }
}

?>
