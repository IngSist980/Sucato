<?php
require_once "templates/header.html";

?>

    
    <!-- Listado Productos -->
    <div class="container mt-3">
        <div id="contenedor-principal" class="d-flex my-5 justify-content-between font-weight-bold">
            <h2>Listado Productos</h2>
            <a href="addProducto.php" class="button bg-success rounded text-light d-inline-flex align-items-center p-2 text-decoration-none">
                <i class="fas fa-plus mx-2"></i> NUEVO PRODUCTO
            </a>
        </div>
        <table id="tabla" class="table table-striped table-hover">
            <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Peso</th>
                    <th>Activo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="fila">

            </tbody>

        </table>
    </div>



<?php
require_once "templates/footer.html";
?>