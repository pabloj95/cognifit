<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';

$archivo = isset($_POST['archivo']) && !empty($_POST['archivo']) ? intval($_POST['archivo']) : 0;
$estado = isset($_POST['estado']) && !empty($_POST['estado']) ? intval($_POST['estado']) : 0;
//var_dump($_POST);
$response = [];

$newEstado = !empty($estado) ? 0 : 1;
$sql = "UPDATE archivos SET privado = $newEstado WHERE id = $archivo";
$rs = $cnn->query($sql);
if($rs) {
    http_response_code(200);
    $response['status'] = 'OK';
} else {
    http_response_code(400);
    $response['status'] = 'KO';
}
echo json_encode($response);
?>