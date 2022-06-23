<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';
$arrUsuarios = dameUsuarios($_SESSION['uid']);
?>
<form id="formFile" name="formFile" class="row g-3" action="./actions/compartirArchivo.php" target="ifr_carga" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $_POST['archivo']; ?>" name="archivo" />
    <div class="col-xl-12">
        <label for="user" class="form-label">Usuarios</label>
        <select class="form-select" id="user" name="user">
            <option value="0"></option>
            <?php
            foreach ($arrUsuarios as $idUsuario => $datos) {
                if($datos['favorito'] == $_SESSION['uid'])
                    echo "<option value='" . $idUsuario . "'>" . $datos['nombre'] . "</option>";
            }
            ?>
        </select>
        <div class="invalid-feedback">
            Seleccione un usuario
        </div>
    </div>
    <div class="col-xl-12" id="alertaForm"></div>
</form>