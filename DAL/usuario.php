<?php
require_once "conexion.php";

function getUsuarioByUsername($username)
{
    $conn = connectDB();

    $stmt = $conn->prepare("SELECT id, username, password FROM usuario WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    $stmt->close();
    disconnectDB($conn);

    return $userData;
}
?>
