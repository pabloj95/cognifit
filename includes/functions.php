<?php
function compruebaLogado()
{
    if (isset($_SESSION['uid']))
        return true;
    return false;
}

function encrypt($string, $key)
{
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}

function decrypt($string, $key)
{
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}

function formateaFechaBBDD($fecha, $formato = 'd/m/Y')
{
    $fechaFormateada = $fecha;
    $corte = explode(" ", $fecha);
    if (!empty($corte[1])) {
        list($anio, $mes, $dia) = explode("-", $corte[0]);
        list($hora, $min, $seg) = explode(":", $corte[1]);
        $fechaNum = mktime($hora, $min, $seg, $mes, $dia, $anio);
        $fechaFormateada = date($formato, $fechaNum);
    } else {
        if (strpos($fecha, "-")) {
            list($anio, $mes, $dia) = explode("-", $corte[0]);
            $fechaNum = mktime(0, 0, 0, $mes, $dia, $anio);
            $fechaFormateada = date($formato, $fechaNum);
        }
        if (strpos($fecha, "/")) {
            list($dia, $mes, $anio) = explode("/", $corte[0]);
            $fechaNum = mktime(0, 0, 0, $mes, $dia, $anio);
            $fechaFormateada = date($formato, $fechaNum);
        }
    }
    return $fechaFormateada;
}

function SqlValido($cadena)
{
    $cadena = str_replace("'", "´", $cadena);
    $cadena = str_replace("%", "[%]", $cadena);
    return $cadena;
}

function DeshacerSqlValido($cadena)
{
    $cadena = str_replace("´", "'", $cadena);
    $cadena = str_replace("[%]", "%", $cadena);
    return $cadena;
}

function dameUltimoCodigo($tabla, $campoCodigo, $cnnAux = '')
{
	global $cnn;
	
	$cnnFun = !empty($cnnAux) ? $cnnAux : $cnn;
	$codigo = 0;
	$sql = "SELECT $campoCodigo AS codigo FROM $tabla ORDER BY $campoCodigo DESC LIMIT 1";
	$rs = $cnn->query($sql);
	if($rs_dato = $rs->fetch_assoc())
		$codigo = $rs_dato['codigo'];
		
	return $codigo;
}

function dameExtension($archivo)
{
	$corte = explode(".", $archivo);
	$extension = "." . $corte[(count($corte)-1)];
	return strtolower($extension);
}

function updateFile($ruta, $nameFile, $allowedFiles = "",$contador = 0)
{
	global $CONFIG, $_FILES;
	$toReturn = false;
	$whiteList = empty($allowedFiles) ? array('ppt', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'pdf', 'rar', 'zip','txt', 'jpeg', 'jpg', 'png', 'gif', 'csv') : $allowedFiles;

	if(!empty($_FILES[$nameFile]['name']))
	{
		if(!is_dir($ruta))
			mkdir($ruta);
		
		$extension = substr(dameExtension($_FILES[$nameFile]['name']), 1);
		$valido = false;
		foreach($whiteList as $oV)                         
			if($oV == $extension)
				$valido = true;
		if($valido)
		{

			$id = date("yzGis");
			if(!empty($contador))
				$id .= ''.$contador;
			$nombreFile = $id . '.'. $extension;
			$nombre_archivo = $ruta. $nombreFile;
			if(move_uploaded_file($_FILES[$nameFile]['tmp_name'], $nombre_archivo))
			{		  
			   chmod($nombre_archivo,0644);
			   $toReturn = $nombreFile;
			}
		}
	}		   
	return $toReturn;
}