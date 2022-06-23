<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';

$yo = isset($_POST['yo']) && !empty($_POST['yo']) ? intval($_POST['yo']) : 0;
$user = isset($_POST['user']) && !empty($_POST['user']) ? intval($_POST['user']) : 0;

$response = [];

$sql = "SELECT * FROM usuarios_favoritos WHERE usuario_id = $yo AND favorito_id = $user";
$rs = $cnn->query($sql);
if ($rs->num_rows > 0) {
    $sql = "DELETE FROM usuarios_favoritos WHERE usuario_id = $yo AND favorito_id = $user";
    $rs = $cnn->query($sql);
    if ($rs) {
        http_response_code(200);
        $response['status'] = 'OK';
    } else {
        http_response_code(400);
        $response['status'] = 'KO';
    }
} else {
    $sql = "INSERT INTO usuarios_favoritos (usuario_id, favorito_id) VALUES ($yo, $user)";
    $rs = $cnn->query($sql);
    if ($rs) {
        http_response_code(200);
        $response['status'] = 'OK';
    } else {
        http_response_code(400);
        $response['status'] = 'KO';
    }
}
