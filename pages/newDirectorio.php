<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';
?>
<form id="formDir" name="formDir" class="row g-3" action="./actions/newDirectorio.php" target="ifr_carga" method="POST" enctype="multipart/form-data">
    <div class="col-xl-12">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
        <div class="invalid-feedback">
            Inserte un nombre
        </div>
    </div>
    <div class="col-xl-12">
        <div class="form-check">
            <input type="hidden" name="privado" value="0" />
            <input class="form-check-input" type="checkbox" value="1" id="privado" name="privado">
            <label class="form-check-label" for="privado">
                Privado
            </label>
        </div>
    </div>
    <div class="col-xl-12" id="alertaForm"></div>
</form>