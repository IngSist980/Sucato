<?php
//header
require_once "templates/header.html";
require_once "DAL/validaSesion.php";
?>

<!--Contenido principal-->
<main>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Bienvenidos a SUCATO TRADINGS</h2>
                    <p>Somos una empresa líder en la distribución de productos de alta calidad. Contamos con un amplio
                        catálogo de productos para satisfacer todas tus necesidades.</p>
                    
                    <?php if(isset($_SESSION['rol']['rolAdmin']) && $_SESSION['rol']['rolAdmin']): ?>
                        <form id="reporteForm">
                            <button class="btn btn-primary" type="button" id="generarReporte">Generar reporte de inventario</button>
                        </form>

                        <form id="reporteact">
                            <button class="btn btn-primary" type="button" id="generarReporteAct">Generar reporte de activos</button>
                        </form>

                    <script>
                        document.querySelector("#generarReporte").addEventListener("click", function (event) {
                            event.preventDefault();
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        alert(xhr.responseText);
                                    } else {
                                        alert("Error al generar el reporte de inventario.");
                                    }
                                }
                            };
                            xhr.open("POST", "reporteInventario.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.send();
                        });
                    </script>
                   
                    <script>
                        document.querySelector("#generarReporteAct").addEventListener("click", function (event) {
                            event.preventDefault();
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        alert(xhr.responseText);
                                    } else {
                                        alert("Error al generar el reporte de Stock.");
                                    }
                                }
                            };
                            xhr.open("POST", "reporteStock.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.send();
                        });
                    </script>
                    <?php endif; ?>

                    



                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>
</main>
</body>
<?php
// Footer
require_once "templates/footer.html";


?>