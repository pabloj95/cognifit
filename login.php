<?php include './includes/aperturaLogin.php'; ?>
<div id="fondoLogin" class="fondoLogin">
    <div id="login" class="login shadow">
        <p class="tiutloLogin">Login</p>
        <form id="formLogin" name="formLogin" class="row g-3" action="./actions/login.php" target="ifr_carga" method="POST" enctype="multipart/form-data">
            <div class="col-xl-12">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <div class="invalid-feedback">
                    Inserte un correo válido
                </div>
            </div>
            <div class="col-xl-12">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass">
                <div class="invalid-feedback">
                    Inserte una contraseña
                </div>
            </div>
            <div class="col-xl-12" id="alertaLogin"></div>
            <div class="col-xl-6">
                <button type="button" class="btn btn-primary" onclick="login()">Acceder</button>
            </div>
            <div class="col-xl-6 d-sm-flex justify-content-sm-end">
                <button class="btn btn-link" type="button" onclick="cambia('registro')">Registro</button>
            </div>
        </form>
    </div>
    <div id="registro" class="registro shadow inactivo">
        <p class="tiutloLogin">Registro</p>
        <form id="formRegistro" name="formRegistro" class="row g-3" action="./actions/registro.php" target="ifr_carga" method="POST" enctype="multipart/form-data">
            <div class="col-xl-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                <div class="invalid-feedback">
                    Inserte un nombre
                </div>
            </div>
            <div class="col-xl-12">
                <label for="emailReg" class="form-label">Correo</label>
                <input type="email" class="form-control" id="emailReg" name="email" placeholder="name@example.com">
                <div class="invalid-feedback">
                    Inserte un correo válido
                </div>
            </div>
            <div class="col-xl-12">
                <label for="passReg" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="passReg" name="pass">
                <div class="invalid-feedback">
                    Inserte una contraseña
                </div>
            </div>
            <div class="col-xl-12" id="alertaRegistro"></div>
            <div class="col-xl-6">
                <button type="button" class="btn btn-primary" onclick="registro()">Registrarse</button>
            </div>
            <div class="col-xl-6 d-md-flex justify-content-md-end">
                <button class="btn btn-link" type="button" onclick="cambia('login')">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>
<?php include './includes/cierre.php'; ?>