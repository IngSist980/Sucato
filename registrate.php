<?php
require_once "templates/headerInicio.html";

?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/addUsuario.js"></script>


<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
    </style>

    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist" style="height: 10px;">
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-pill-init href="logueo.php" role="tab"
                aria-controls="pills-register" aria-selected="true">Logueo</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-pill-init href="registrate.php" role="tab"
                aria-controls="pills-login" aria-selected="false">Registro</a>
        </li>
    </ul>





    <!-- Jumbotron -->
    <div class="container py-4">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Registro</h2>
                        <form id="formularioRegistrarse">
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
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-block mb-4" id="btnRegistrarse">
                                Registrarse
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
                    alt="" />
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->


<?php

require_once "templates/footer.html";
?>