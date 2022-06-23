<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';

$archivo = isset($_POST['archivo']) && !empty($_POST['archivo']) ? intval($_POST['archivo']) : 0;
$user = isset($_POST['user']) && !empty($_POST['user']) ? intval($_POST['user']) : 0;

$response = [];

$sql = "INSERT INTO archivos_compartidos (archivo_id, receptor_id) VALUES ($archivo, $user)";
$rs = $cnn->query($sql);
if ($rs) {
?>
    <script>
        window.parent.$('#modal-header > button').click();
        //window.parent.cargaPagina('./pages/misArchivos.php', 'misArchivos', '');
    </script>
<?php
} else {
?>
    <script>
        window.parent.$('#alertaForm').html('<div class="alert alert-danger" role="alert">Error al compartir el archivo</div>');
        window.parent.$('#modal-footer').html('<button type="button" class="btn btn-success" onclick="enviarArchivo()">Guardar</button>');
    </script>
<?php
}
?>