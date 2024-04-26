<?php
require_once "templates/header.html";
session_start();
?>
<script src="js/productos.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="pic-ctn">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/chocolate-piña.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Mango.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/meriendasaludable1.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/mix frutas.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/piña empacada.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Chocolate-banano.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/piña.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/Tropical-mixto.jpg" alt="" class="pic estiloimagen">
    <img src="Imagenes/productos varios.jpg" alt="" class="pic estiloimagen">
</div>

<!-- Productos -->
<main class="pt-4 principal-cont">
    <form method="POST">
        <div class="d-flex justify-content-between">
            <div id="contenedor-principal" class="productos-titulo col-md-6">
                <h2>Nuestros Productos</h2>
                <p>Snacks saludables a base de frutas</p>
            </div>
            <div class="d-flex align-items-center justify-content-center col-md-2">
            <?php if(isset($_SESSION['rol']['rolAdmin']) && $_SESSION['rol']['rolAdmin']): ?>
                <a href="productosAdm.php" class="button bg-dark rounded text-light d-inline-flex align-items-center justify-content-center p-2 text-decoration-none">
                    <i class="fa-solid fa-gear" style="font-size: 20px;"></i>
                </a>
            <?php endif; ?>
            </div>

        </div>

        <div id="productos" class="container mb-5">
            <div class="row">
            </div>
        </div>
    </form>
</main>

<?php
require_once "templates/footer.html";
?>