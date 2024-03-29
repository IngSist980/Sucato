<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto | Detalle</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="estilos/estilos.css">
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/jquery-ui-1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="js/jquery-ui-1.13.2/jquery-ui.css">
</head>

<body>
    <!-- Header -->
    <header class="header py-2">
        <nav class="navbar">
            <div class="container d-flex flex-column ">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="index.html"> <img class="navbar-brand" src='imagenes/LOGOBE.jpg'> </a>
                    <h1 >BY SUCATO TRADINGS CR </h1>
                </div>
                <div class="mt-3">
                    <ul class="navbar-nav d-flex flex-row">
                        <li class="nav-item bg-warning rounded mx-4"> 
                            <a class="nav-link text-white p-2 text-uppercase" href="productos.html">Productos</a>
                        </li>
                        <li class="nav-item bg-warning rounded mx-4">
                            <a class="nav-link text-white p-2 text-uppercase" href="contacto.html">Contacto</a>
                        </li>
                        <li class="nav-item bg-warning rounded mx-4">
                            <a class="nav-link text-white p-2 text-uppercase" href="quienes_somos.html">Quiénes Somos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php $idProducto = $_REQUEST['idProducto'];?>
    <input name="idProducto" type="text" id="idProducto" value='<?php echo $idProducto ?>' hidden/>

    <div class="container my-4">
        <h2 id="nombre-producto" class="fw-bold"></h2>
    </div>
    <div class="container d-flex bg-white p-4 rounded-4">
        <div id="img-container" class="col-6 d-flex flex-column border-end border-4">
            <img id="img-producto" src="" alt="" class="w-75" style='height: 50vh;'>
            <a href='#' class='btn btn-success rounded-0 text-uppercase w-75 mt-2'>Agregar al Carrito</a>
        </div>
        <div id="info-container" class="text-center col-6 m-auto align-items-center justify-content-center">
        </div>
    </div>

    
    <footer>
        <!-- <img src='imagenes/LOGOSU.jpg' class="imagen-footer"> -->
    </footer>

    <script src="js/productoDetalle.js"></script>

</body>
</html>

