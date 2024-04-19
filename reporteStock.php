<?php
try {
    $myArray = require_once 'DAL/getProductosStock.php';
 
    $archivo = fopen("archivos/stock.txt", "a");
    // escribe datos en el txt
    foreach ($myArray as $producto) {
        fwrite($archivo, json_encode($producto) . PHP_EOL);
    }
 
    fclose($archivo);
    echo "El archivo de stock se ha generado correctamente.";
} catch (\Throwable $th) {
    error_log($th);
    echo("Error al generar el archivo de stock: " . $th->getMessage());
}
 
 
?>