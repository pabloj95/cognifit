<?php
include $_SERVER['DOCUMENT_ROOT'].'\cognifit\includes\config.php';
session_destroy();
$response['error'] = 'OK';
echo json_encode($response);
?>