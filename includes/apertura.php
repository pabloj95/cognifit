<?php
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';
?>
<!DOCTYPE html>
<html lang="es">
<header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $CONFIG['composer']; ?>/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="<?php echo $CONFIG['urlWeb'] . '/includes/'; ?>fontawesome6/css/all.css" rel="stylesheet">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $CONFIG['composer']; ?>/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/functions.js"></script>

    <title>Cognifit</title>
</header>

<body>
    <div class="container-fluid">
        <div id="header" class="row shadow-sm">
            <div class="col-sm-6">
                <img src="<?php echo $CONFIG['urlWeb']; ?>/images/logo.png" alt="logo" class="logoHeader" />
            </div>
            <div class="col-sm-6 d-sm-flex justify-content-sm-end align-items-center">
                <i class="fa-solid fa-user"></i>
                <p class="userName"><?php echo $_SESSION['nombre']; ?></p>
                <i class="fa-solid fa-power-off" onclick="logout()"></i>
            </div>
        </div>