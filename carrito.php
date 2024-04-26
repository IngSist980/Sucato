<?php
require_once "templates/header.html";
?>

<!-- Alertas -->
<div class="my-3">
    <div class="alertas container">
    </div>
</div>

<!-- Carrito de compras -->
<section class="h-100 h-custom" id="carrito-compras">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Productos en Carrito</h1>
                                        </div>
                                        <hr class="my-4">

                                        <!-- Listado productos -->
                                        <div id="contenedor-productos">
                                        </div>

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="productos.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Seguir comprando</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Total</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 id="cantidadArticulos" class="text-uppercase"></h5>
                                        </div>

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Monto Total</h5>
                                            <h5 id="montoFinal"></h5>
                                        </div>

                                        <div class="d-flex flex-column gap-3">
                                            <button type="button" id="btnFinalizar" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Finalizar Compra</button>
                                            <button type="button" id="btnEliminar" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block btn-lg" data-mdb-ripple-color="dark">Vaciar Carrito</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Factura generada     -->
<div class="modal" id="facturaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    </div>
</div>

<script src="js/carrito.js"></script>

<?php
require_once "templates/footer.html";
?>