<?php
session_start();
require_once "templates/header.html";
require_once "functions/recoge.php";

?>
<main>

    <?php
    // require_once "include/templates/manejoErrores.php";
    ?>

    <div class="container py-4">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Actualizar datos personales</h2>
                        <form id="editarUsuario">

                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div>
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="username" class="form-control" />
                                            <label class="form-label" for="username">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="nombre" class="form-control" />
                                        <label class="form-label" for="nombre">Nombre</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="primerApellido" class="form-control" />
                                        <label class="form-label" for="primerApellido">Primer apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="segundoApellido" class="form-control" />
                                        <label class="form-label" for="segundoApellido">Segundo apellido</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="email" id="correo" class="form-control" />
                                        <label class="form-label" for="correo">Correo</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="telefono" class="form-control" />
                                        <label class="form-label" for="telefono">Teléfono</label>
                                    </div>
                                </div>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="password" class="form-control" />
                                <label class="form-label" for="password">Contraseña</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" id="btnEditar">
                                Actualizar datos
                            </button>           <!-- No agarra el id-->
                            <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['id_usuario']; ?>">

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

    </section>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/jquery-ui-1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="js/jquery-ui-1.13.2/jquery-ui.css">
<script src="js/editUsuario.js"></script>
<?php
require_once "templates/footer.html";
?>