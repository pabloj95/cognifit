<?php
$idioma = 'es';

if(session_id() === '')
    session_start();

$CONFIG = [
    'urlWeb' => 'http://localhost/cognifit/',
    'composer' => 'vendor',

    'host' => 'localhost',
    'usuario' => 'cognifit',
    'pass' => 'B7EFxgD421!MrCxS',
    'bbdd' => 'cognifit',

    //AMAZON
    'awsAccessKey' => 'AKIAYPE6R4SSUV4IAC6I',
    'awsSecretKey' => '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',
    'bucketName' => 'web-developer-auditions',
    'bucketUrl' => 'https://web-developer-auditions.s3.amazonaws.com',
];

$key = "Pru3B4c0Gn1FiT";

$cnn = mysqli_connect($CONFIG['host'], $CONFIG['usuario'], $CONFIG['pass'], $CONFIG['bbdd']);
require_once $_SERVER['DOCUMENT_ROOT'].'/cognifit/'.$CONFIG['composer'].'/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\AwsException;
$aws = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => $CONFIG['bucketUrl'],
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key'      => $CONFIG['awsAccessKey'],
        'secret'   => $CONFIG['awsSecretKey']
    ],
]);
// $aws = new S3Client([
//     'version'     => '2006-03-01',
//     'region'      => 'eu-west-2',
//     'endpoint'    => $CONFIG['bucketUrl'],
//     'credentials' => [
//         'key'      => $CONFIG['awsAccessKey'],
//         'secret'   => $CONFIG['awsSecretKey'],
//     ]
// ]);

require_once 'functions.php';
require_once 'datos.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/cognifit/langs/'.$idioma.'.php';

$compruebaLogado = isset($compruebaLogado) ? $compruebaLogado : true;
if($compruebaLogado && !compruebaLogado()) {
    header("Location: ".$CONFIG['urlWeb']."login.php");
}
