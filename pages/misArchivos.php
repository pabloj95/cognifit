<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';
$arrDirectorios = dameMisDirectorios($_SESSION['uid']);
?>
<div class="row">
    <div class="col-xs-12 tituloSeccion">
        Mis Archivos
    </div>
    <div class="col-xs-12 mb-2" style="text-align: center;">
        <button class="btn btn-link" type="button" onclick="newDirectorio()" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa-solid fa-plus"></i> Directorio</button>
        <button class="btn btn-link" type="button" onclick="newArchivo()" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa-solid fa-plus"></i> Archivo</button>
    </div>
    <div class="col-xs-12">
        <div class="accordion" id="accordionExample">
            <?php
            foreach ($arrDirectorios as $idDirectorio => $datos) {
                $arrArchivos = dameArchivosDirectorio($_SESSION['uid'], $idDirectorio);
            ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $idDirectorio; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $idDirectorio; ?>" aria-expanded="false" aria-controls="collapse<?php echo $idDirectorio; ?>">
                            <?php echo $datos['nombre']; ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $idDirectorio; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $idDirectorio; ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Archivo</th>
                                        <th style="text-align: center;">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($arrArchivos as $idArchivo => $datosFile) {
                                        echo '<tr>';
                                        echo '<td>';
                                        echo $datosFile['original'] . '<br />';
                                        echo '</td>';
                                        echo '<td class="opciones">';
                                            if($datosFile['privado'] == 1) {
                                                echo '<i class="fa-solid fa-eye-slash" title="privado" onclick="cambiarPrivado('.$idArchivo.', 1)"></i>';
                                            } else {
                                                echo '<i class="fa-solid fa-eye" title="público" onclick="cambiarPrivado('.$idArchivo.', 0)"></i>';
                                            }
                                            echo '<i class="fa-solid fa-trash" title="eliminar" onclick="eliminarArchivo('.$idArchivo.')"></i>';
                                            echo '<i class="fa-solid fa-folder" title="mover" onclick="moveArchivo('.$idArchivo.', '.$idDirectorio.')" data-bs-toggle="modal" data-bs-target="#modal"></i>';
                                            echo '<i class="fa-solid fa-share" title="compartir" onclick="compartirArchivo('.$idArchivo.')" data-bs-toggle="modal" data-bs-target="#modal"></i>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>