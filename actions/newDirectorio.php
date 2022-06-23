<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';

//var_dump($_POST);

$nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? SqlValido($_POST['nombre']) : "";
$privado = isset($_POST['privado']) && !empty($_POST['privado']) ? intval($_POST['privado']) : 0;

$sql = "INSERT INTO  directorios (nombre, propietario, privado) VALUES ('$nombre', " . $_SESSION['uid'] . ", $privado)";
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
        window.parent.$('#alertaForm').html('<div class="alert alert-danger" role="alert">Error al crear el directorio</div>');
        window.parent.$('#modal-footer').html('<button type="button" class="btn btn-success" onclick="guardarDirectorio()">Guardar</button>');
    </script>
<?php
}
?>