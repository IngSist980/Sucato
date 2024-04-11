<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto | Detalle</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Estilos/estilos.css">
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/jquery-ui-1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="js/jquery-ui-1.13.2/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

    <!-- Elemento de diálogo para información -->
    <div id="pnlInfo" style="display: none;">
        <div id="blInfo"></div>
    </div>

    <!-- Elemento de diálogo para mensajes de error -->
    <div id="pnlMensaje" style="display: none;">
        <div id="blMensaje"></div>
    </div>

    <!-- Editar producto -->
    <div class="container d-flex justify-content-center align-items-center gap-5 my-5">
        <div class="col-md-3 font-weight-bold border-end border-4">
            <h2>Editar Producto</h2>
        </div>
    
        <div class="col-md-9">
            <form class="d-flex flex-column" id="crearProducto" method="POST"  enctype="multipart/form-data">
                <div class="mb-3">
                    <input name="idProducto" type="text" id="idProducto" value='<?php echo $idProducto ?>' hidden/>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Producto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea type="text" class="form-control" id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (gr)</label>
                    <input type="number" class="form-control" id="peso" name="peso" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required>
                </div>
                <div class="mb-3">
                    <label for="existencias" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="existencias" name="existencias" required>
                </div>
                <div class="my-4">
                    <select class="form-select" id="activo" name="activo">
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
                    </select>
                </div>
                <div class="contenedor-imagen">
                    <img id="imagenProducto" src="" alt="Imagen del producto">
                </div>
                <div class="mb-3">
                    <label for="fileInput" class="form-label">Imagen del Producto</label>
                    <input type="file" class="form-control" id="ruta_imagen" name="ruta_imagen" accept="image/*" onchange="cargaIMG(this);" required>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <a href="/Sucato/productosAdmin.html" class="w-25 button bg-dark rounded text-light d-inline-flex align-items-center justify-content-center p-2 text-decoration-none">
                        <i class="fas fa-arrow-left" style="font-size: 20px;"></i>
                    </a>
                    <button class="btn btn-success w-25 fs-5" id="btnEditar" type="button">Guardar</button>
                </div>
            </div>
        </form>

    </div>


    <footer>
        <!-- <img src='imagenes/LOGOSU.jpg' class="imagen-footer"> -->
    </footer>

    <script src="js/editarProducto.js"></script>

</body>
</html>
