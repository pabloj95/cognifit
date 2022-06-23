<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';
$arrOtrosArchivos = dameOtrosArchivos($_SESSION['uid']);
$arrArchivosRecividos = dameArchivosRecividos($_SESSION['uid']);
$arrUsuarios = dameUsuarios($_SESSION['uid']);
//var_dump($arrUsuarios);
?>
<div class="row">
    <div class="col-xs-12" style="display: block;">
        <div class="contentUsers">
            <div class="listUsers collapse collapseExample" id="collapseExample">
                <?php
                foreach ($arrUsuarios as $idUsuario => $datosUsuario) {
                    $fav = $datosUsuario['favorito'] == $_SESSION['uid'] ? 'fa-solid fa-star' : 'fa-regular fa-star';
                ?>
                    <div class="mb-2">
                        <?php echo '<i class="' . $fav . '" onclick="cambiaFav(' . $_SESSION['uid'] . ', ' . $idUsuario . ')"></i> ' . $datosUsuario['nombre']; ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="titleUsers" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Usuarios
            </div>
        </div>
    </div>
    <div class="col-xs-12 tituloSeccion mb-3">
        Recividos
    </div>
    <div class="col-xs-12 mb-3">
        <div class="row">
            <?php
            if (count($arrArchivosRecividos) > 0) {
                foreach ($arrArchivosRecividos as $idArchivo => $datosFile) {
                    $extension = dameExtension($datosFile['archivo']);
                    $img = $extension == '.pdf' ? $CONFIG['urlWeb'] . "/images/pdf.png" : $CONFIG['urlWeb'] . "/images/imagen.png";
                    $url = $CONFIG['urlWeb'] . '/temp/' . $datosFile['archivo'];
            ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 text-center mb-4">
                        <img class="imgArchivo" src="<?php echo $img; ?>" onclick="abrirArchivo('<?php echo $url; ?>')" />
                        <div>
                            <?php echo $datosFile['original']; ?>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-sm-12 text-center">No has recivido ningún archivo</div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="col-xs-12 tituloSeccion mb-5">
        Listado
    </div>
    <div class="col-xs-12 mb-5">
        <div class="row">
            <?php
            foreach ($arrOtrosArchivos as $idArchivo => $datosFile) {
                $extension = dameExtension($datosFile['archivo']);
                $img = $extension == '.pdf' ? $CONFIG['urlWeb'] . "/images/pdf.png" : $CONFIG['urlWeb'] . "/images/imagen.png";
                $url = $CONFIG['urlWeb'] . '/temp/' . $datosFile['archivo'];
            ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 text-center mb-4">
                    <img class="imgArchivo" src="<?php echo $img; ?>" onclick="abrirArchivo('<?php echo $url; ?>')" />
                    <div>
                        <?php echo $datosFile['original']; ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>