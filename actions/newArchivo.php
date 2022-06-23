<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';

//var_dump($_FILES);

$directorio = isset($_POST['directorio']) && !empty($_POST['directorio']) ? intval($_POST['directorio']) : 0;
$categoria = isset($_POST['categoria']) && !empty($_POST['categoria']) ? SqlValido($_POST['categoria']) : "";
$categorias = isset($_POST['categorias']) ? ($_POST['categorias']) : [];
$privado = isset($_POST['privado']) && !empty($_POST['privado']) ? intval($_POST['privado']) : 0;

$original = $_FILES['formFile']['name'];
$file = updateFile($_SERVER['DOCUMENT_ROOT'] . '\cognifit\temp/', 'formFile');

$codCategoria = 0;
if (!empty($categoria)) {
    $sql = "INSERT INTO categorias (nombre) VALUES ('$categoria')";
    $rs = $cnn->query($sql);
    if ($rs) {
        $codCategoria = dameUltimoCodigo('categorias', 'id');
        array_push($categorias, $codCategoria);
    }
}

$sql = "INSERT INTO archivos (propietario, original, archivo, directorio, privado) VALUES (" . $_SESSION['uid'] . ", '$original', '$file', $directorio, $privado)";
$rs = $cnn->query($sql);
if ($rs) {
    $archivo = dameUltimoCodigo('archivos', 'id');
    if (count($categorias) > 0) {
        for ($i = 0; $i < count($categorias); $i++) {
            $sql = "INSERT INTO archivos_categorias (archivo_id, categoria_id) VALUES ($archivo, " . intval($categorias[$i]) . ")";
            $rs = $cnn->query($sql);
        }
    }
}
?>
<script>
    window.parent.$('#modal-header > button').click();
    window.parent.cargaPagina('./pages/misArchivos.php', 'misArchivos', '');
</script>