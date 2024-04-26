<?php
require_once "templates/header.html";

session_start();

if(!isset($_SESSION['rol']['rolAdmin'])){
    header('location: logueo.php');
}
?>


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
                    <a href="productosAdm.php" class="w-25 button bg-dark rounded text-light d-inline-flex align-items-center justify-content-center p-2 text-decoration-none">
                        <i class="fas fa-arrow-left" style="font-size: 20px;"></i>
                    </a>
                    <button class="btn btn-success w-25 fs-5" id="btnEditar" type="button">Guardar</button>
                </div>
            </div>
        </form>

    </div>

    <script src="js/editarProducto.js"></script>

<?php
require_once "templates/footer.html";

?>
