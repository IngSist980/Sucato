<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_POST['existencias'] < 1){
        $response = array(
            'success' => false
        );
    }else{
        $producto = array(
            'idProducto'  => $_POST['idProducto'],
            'imagen'  => $_POST['imagen'],
            'nombre'  => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'existencias'   => $_POST['existencias']
        );
    
        // Validar array existente
        if (!isset($_SESSION['productos'])) {
            $_SESSION['productos'] = array();
        }
    
        // Inserción nuevo producto en array
        $_SESSION['productos'][] = $producto;
    
        $_myArray = $_SESSION['productos'];
    
        $response = array(
            'success' => true,
            'data' => $_myArray
        );
    }

    //print_r($_SESSION);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    //session_unset();
}





?>