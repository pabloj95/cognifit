<?php
function crearBucket($name)
{
    global $aws;
    try {
        $result = $aws->createBucket([
            'Bucket' => $name,
        ]);
        return 'The bucket\'s location is: ' .
            $result['Location'] . '. ' .
            'The bucket\'s effective URI is: ' .
            $result['@metadata']['effectiveUri'];
    } catch (AwsException $e) {
        return 'Error: ' . $e->getAwsErrorMessage();
    }
}

function dameUsuarios($usuario) {
    global $cnn;
    $arrDatos = [];
    $sql = "SELECT u.*, f.usuario_id FROM usuarios u LEFT JOIN usuarios_favoritos f ON f.favorito_id = u.id AND f.usuario_id = $usuario WHERE u.id != $usuario ORDER BY u.nombre";
    $rs = $cnn->query($sql);
    while($row = $rs->fetch_assoc()) {
        $arrDatos[$row['id']] = [
            "nombre" => $row['nombre'],
            "correo" => $row['correo'],
            "favorito" => $row['usuario_id']
        ];
    }
    return $arrDatos;
}

function dameMisDirectorios($usuario) {
    global $cnn;
    $arrDatos = [];
    $sql = "SELECT * FROM directorios WHERE propietario = $usuario";
    $rs = $cnn->query($sql);
    while($row = $rs->fetch_assoc()) {
        $arrDatos[$row['id']] = [
            "nombre" => $row['nombre'],
            "privado" => $row['privado']
        ];
    }
    return $arrDatos;
}
function dameArchivosDirectorio($usuario, $directorio = 0) {
    global $cnn;
    $filtro = "";
    if(!empty($directorio))
        $filtro .= " AND directorio = $directorio";
    $arrDatos = [];
    $sql = "SELECT * FROM archivos WHERE propietario = $usuario $filtro";
    $rs = $cnn->query($sql);
    while($row = $rs->fetch_assoc()) {
        $arrDatos[$row['id']] = [
            "original" => $row['original'],
            "archivo" => $row['archivo'],
            "privado" => $row['privado'],
            "fecha" => $row['fecha']
        ];
    }
    return $arrDatos;
}
function dameOtrosArchivos($usuario) {
    global $cnn;
    $sql = "SELECT a.* FROM archivos a INNER JOIN directorios d ON a.directorio = d.id AND d.privado = 0 WHERE a.propietario != $usuario AND a.privado = 0";
    $arrDatos = [];
    $rs = $cnn->query($sql);
    while($row = $rs->fetch_assoc()) {
        $arrDatos[$row['id']] = [
            "original" => $row['original'],
            "archivo" => $row['archivo'],
            "privado" => $row['privado'],
            "fecha" => $row['fecha']
        ];
    }
    return $arrDatos;
}
function dameArchivosRecividos($usuario) {
    global $cnn;
    $sql = "SELECT a.* FROM archivos a INNER JOIN archivos_compartidos c ON c.archivo_id = a.id AND c.receptor_id = $usuario WHERE a.propietario != $usuario";
    $arrDatos = [];
    $rs = $cnn->query($sql);
    while($row = $rs->fetch_assoc()) {
        $arrDatos[$row['id']] = [
            "original" => $row['original'],
            "archivo" => $row['archivo'],
            "privado" => $row['privado'],
            "fecha" => $row['fecha']
        ];
    }
    return $arrDatos;
}
function dameCategorias() {
    global $cnn;
    $arrDatos = [];
    $sql = "SELECT * FROM categorias";
    $rs = $cnn->query($sql);
    while($row = $rs->fetch_assoc()) {
        $arrDatos[$row['id']] = [
            "nombre" => $row['nombre']
        ];
    }
    return $arrDatos;
}
?>