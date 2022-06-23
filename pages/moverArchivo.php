<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';
$arrDirectorios = dameMisDirectorios($_SESSION['uid']);
?>
<form id="formFile" name="formFile" class="row g-3" action="./actions/moverArchivo.php" target="ifr_carga" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $_POST['archivo']; ?>" name="archivo" />
    <div class="col-xl-12">
        <label for="directorio" class="form-label">Directorio actual: <?php echo $arrDirectorios[$_POST['directorio']]['nombre']; ?></label>
    </div>
    <div class="col-xl-12">
        <label for="directorio" class="form-label">Directorio nuevo</label>
        <select class="form-select" id="directorio" name="directorio">
            <option value="0"></option>
            <?php
            foreach ($arrDirectorios as $idDirectorio => $datos) {
                echo "<option value='" . $idDirectorio . "'>" . $datos['nombre'] . "</option>";
            }
            ?>
        </select>
        <div class="invalid-feedback">
            Seleccione un directorio
        </div>
    </div>
    <div class="col-xl-12" id="alertaForm"></div>
</form>