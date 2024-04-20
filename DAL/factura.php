<?php 
require 'conexion.php';
session_start();

// Datos recibidos desde JS
$data = json_decode(file_get_contents("php://input"));

$response = array(); 

if ($data && is_array($data)) {
    $flag = false;

    // Si no inició sessión
    if(!isset($_SESSION['id_usuario'])){
        $response['flag'] = $flag; 
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }else{
        $idUsuario = $_SESSION['id_usuario'];
        $monto = 0;
    
        // Ciclo para sumar monto
        foreach ($data as $producto) {
            $precio = $producto->precio;
    
            // Monto de venta
            $monto += $precio;
        }
        // Generar factura
        $idFactura = ingresarFactura($idUsuario, $monto);
    
        $posiciones = array();
        $repetido = false;
        $length = count($data);
        for ($i = 0; $i < $length; $i++) {
            $producto = $data[$i];
            $idProducto = $producto->idProducto; 
            $nombre = $producto->nombre; 
            $precio = $producto->precio; 
    
            $cantidad = 1;
            // Si no se ha registrado ese código anteriormente.. ingresa
            if(!in_array($idProducto, $posiciones)){
                // Iterar sobre elementos del array para detectar duplicados
                for ($j = $i + 1; $j < $length; $j++) {
                    $otroProducto = $data[$j];
                
                    if ($idProducto == $otroProducto->idProducto) {
                        $cantidad += 1;
                        $posiciones[] = $idProducto;
                    }
                    
                }
                // Insertar venta asociada a la factura generada
                if ($idFactura) {
                    if (ingresarVenta($idFactura, $idProducto, $precio, $cantidad)) {
                        try{
                            actualizaStock($idProducto, $cantidad);
                            $flag = true;
                        }catch (\Throwable $th) {
                            error_log("Error al actualizar stock");
                        }
                    } else {
                        error_log("Error al ingresar la venta");
                    }
                } else {
                    error_log("Error al generar la factura");
                }
            }
        }
    } 
    
} else {
    error_log("No se recibieron datos válidos");
}
$response['monto'] = $monto;
$response['flag'] = $flag; 
$response['username'] = $_SESSION['username'];

echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>