<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';
$arrDirectorios = dameMisDirectorios($_SESSION['uid']);
$arrCategorias = dameCategorias();
?>
<form id="formFile" name="formFile" class="row g-3" action="./actions/newArchivo.php" target="ifr_carga" method="POST" enctype="multipart/form-data">
    <div class="col-xl-12">
        <label for="formFile" class="form-label">Archivo</label>
        <input class="form-control" type="file" id="formFile" name="formFile" accept="image/*, .pdf">
    </div>
    <div class="col-xl-12">
        <label for="directorio" class="form-label">Directorio</label>
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
    <div class="col-xl-12">
        <label class="form-label">Categorías</label> <button class="btn btn-link" type="button" onclick="newCategoria()"><i class="fa-solid fa-plus"></i> Categoría</button><br />
        <div id="newCategoria">

        </div>
        <?php
        foreach ($arrCategorias as $idCategoria => $datos) {
        ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="<?php echo $idCategoria; ?>" id="categoria<?php echo $idCategoria; ?>" name="categorias[]" />
                <label class="form-check-label" for="categoria<?php echo $idCategoria; ?>">
                    <?php echo $datos['nombre']; ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="col-xl-12">
        <label for="directorio" class="form-label">Privacidad</label><br />
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