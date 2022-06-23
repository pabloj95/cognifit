<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';

$archivo = isset($_POST['archivo']) && !empty($_POST['archivo']) ? intval($_POST['archivo']) : 0;
$directorio = isset($_POST['directorio']) && !empty($_POST['directorio']) ? intval($_POST['directorio']) : 0;
//var_dump($_POST);
$response = [];

$sql = "UPDATE archivos SET directorio = $directorio WHERE id = $archivo";
$rs = $cnn->query($sql);
if ($rs) {
?>
    <script>
        window.parent.$('#modal-header > button').click();
        window.parent.cargaPagina('./pages/misArchivos.php', 'misArchivos', '');
    </script>
<?php
} else {
?>
    <script>
        window.parent.$('#alertaForm').html('<div class="alert alert-danger" role="alert">Error al mover el archivo</div>');
        window.parent.$('#modal-footer').html('<button type="button" class="btn btn-success" onclick="moverArchivo()">Guardar</button>');
    </script>
<?php
}
?>