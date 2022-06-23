<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\apertura.php';
//var_dump($aws->listBuckets());
?>
<div class="row">
    <div id="misArchivos" class="col-sm-6 col-md-4 secciones">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\pages\misArchivos.php';
        ?>
    </div>
    <div id="listado" class="col-sm-6 col-md-8 secciones">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\pages\listado.php';
        ?>
    </div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\cierre.php';


//echo crearBucket($CONFIG['bucketName']);
