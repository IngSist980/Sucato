<?php
require_once "templates/header.html";

?>

    <?php $idProducto = $_REQUEST['idProducto'];?>

    <form method='POST' class="mb-5">
        <input name="idProducto" type="text" id="idProducto" value='<?php echo $idProducto ?>' hidden/>
        <div id="nombre-container" class="container my-4">
            <h2 id="nombre-producto" class="fw-bold"></h2>
        </div>
        <div class="container d-flex bg-white p-4 rounded-4 ">
            <div id="img-container" class="col-6 d-flex flex-column border-end border-4 align-items-center justify-content-center">
                <img id="img-producto" name="imagen" src="" alt="" style='max-width: 65%; max-height: 50vh;'>
            </div>
            <div id="info-container" class="col-6 text-center m-auto align-items-center justify-content-center">
            </div>
        </div>
    </form>


    <footer>
        <!-- <img src='imagenes/LOGOSU.jpg' class="imagen-footer"> -->
    </footer>

    <script src="js/productoDetalle.js"></script>

<?php
require_once "templates/footer.html";

?>
