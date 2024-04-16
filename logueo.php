<?php
require_once "templates/header.html";

?>


<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-mdb-pill-init href="logueo.php" role="tab"
            aria-controls="pills-login" aria-selected="true">Logueo</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-register" data-mdb-pill-init href="registrate.php" role="tab"
            aria-controls="pills-register" aria-selected="false">Registro</a>
    </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form>
            <div class="text-center mb-3">
                <p>Puedes ingresar sesión con tu red social:</p>
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>

            <p class="text-center">O bien, ingresa tu correo y contraseña</p>

            <div class="logueo text-center">
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4 d-inline-block">
                    <input type="text" id="username" class="form-control" />
                    <label class="form-label" for="loginName">Username</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4 d-inline-block">
                    <input type="password" id="contraseña" class="form-control" />
                    <label class="form-label" for="loginPassword">Contraseña</label>
                </div>
            </div>

            <!-- 2 column grid layout -->
            <div class="container">
                <div class="row mb-8">
                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="#!">¿Olvidó su contraseña?</a>
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <div class="container d-flex justify-content-center align-items-center" style="height: 10px;">
                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                    class="btn btn-primary mb-4" id="btnIngresar">Ingresar</button>
            </div>
            <!-- Register buttons -->
            <div class="text-center">
                <p>¿No eres miembro? <a href="registrate.php">Regístrate</a></p>
            </div>
        </form>
    </div>

</div>
<!-- Pills content -->




<?php
require_once "templates/footer.html";

?>