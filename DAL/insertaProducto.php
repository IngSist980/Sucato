<?php

function recoge ($var, $m = ""){
    if(!isset($_REQUEST[$var])){
        $tmp = (is_array($m)) ? [] : "";
    }elseif (!is_array($_REQUEST[$var])){
        $tmp = trim (htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    }else{
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UFT-8"));
        });
    }
    return $tmp;
}

$imagen = recoge('imagen');
$idCategoria = recoge('idCategoria');
$nombre = recoge('nombre');
$descripcion = recoge('descripcion');
$peso =recoge('peso');
$precio = recoge('precio');
$existencias   = recoge('existencias');
$activo   = recoge('activo');

$idCategoriaOk = false;
$nombreOk = false;
$descripcionOk = false;
$imagenOk  = false;
$pesoOk = false;
$precioOk = false;
$existenciasOk   = false;
$activoOk   = false;


// Código validación de datos
if($idCategoria == ""){
    print "<p class=\"aviso\">El dato no es válido</p>\n";
    print "\n";
}elseif(!is_numeric($idCategoria)){
    print "<p class=\"aviso\">El dato no es válido.</p>\n";
    print "\n";
}else {
    $idCategoriaOk = true;
}


if($nombre == ""){
    print "<p class=\"aviso\">No ha escrito el nombre del producto.</p>\n";
    print "\n";
}else {
    $nombreOk = true;
}


if($descripcion == ""){
    print "<p class=\"aviso\">No ha escrito la descripción del producto.</p>\n";
    print "\n";
}else {
    $descripcionOk = true;
}


if($imagen == ""){
    print "<p class=\"aviso\">Imagen no encontrada</p>\n";
    print "\n";
}else {
    $imagenOk = true;
}


if($peso == ""){
    print "<p class=\"aviso\">El peso no es válido</p>\n";
    print "\n";
}elseif(!is_numeric($peso)){
    print "<p class=\"aviso\">El peso no es válido.</p>\n";
    print "\n";
}else {
    $pesoOk = true;
}


if($precio == ""){
    print "<p class=\"aviso\">El precio no es válido</p>\n";
    print "\n";
}elseif(!is_numeric($precio)){
    print "<p class=\"aviso\">El precio no es válido.</p>\n";
    print "\n";
}else {
    $precioOk = true;
}


if($existencias == ""){
    print "<p class=\"aviso\">Ingrese las existencias</p>\n";
    print "\n";
}elseif(!is_numeric($existencias)){
    print "<p class=\"aviso\">Ingrese las existencias</p>\n";
    print "\n";
}else {
    $existenciasOk = true;
}


if($activo == ""){
    print "<p class=\"aviso\">Debe indicar si está activo o inactivo</p>\n";
    print "\n";
}elseif(!is_numeric($activo)){
    print "<p class=\"aviso\">Debe indicar si está activo o inactivo</p>\n";
    print "\n";
}else {
    $activoOk = true;
}


// Directorio de imágenes
$uploads_dir = '../Imagenes/';

// Código cargar imagen en carpeta Imagenes/
if (isset($_FILES['imagenArchivo']) && $_FILES['imagenArchivo']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['imagenArchivo']['tmp_name'];
    $name = $_FILES['imagenArchivo']['name'];

    // Nombre único de archivo
    $unique_name = uniqid() . '_' . $name;

    if (move_uploaded_file($tmp_name, $uploads_dir . $unique_name)) {
        //echo 'Imagen almacenada';
        // Sí todo está correcto, ingresa a DB
        if($idCategoriaOk && $nombreOk && $descripcionOk && $precioOk && $pesoOk && $imagenOk && $existenciasOk && $activoOk){
            include 'conexion.php';
            echo json_encode(InsertaDatos($idCategoria, $nombre, $descripcion, $peso, $precio, $existencias, $unique_name, $activo));  
        }
        exit;
    } else {
        echo 'Error al mover el archivo';
    }
} else {
    echo 'Error en la carga del archivo';
}




?>