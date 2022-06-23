<?php
$compruebaLogado = false;
include $_SERVER['DOCUMENT_ROOT'] . '\cognifit\includes\config.php';

$nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : "";
$email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : "";
$pass = isset($_POST['pass']) && !empty($_POST['pass']) ? $_POST['pass'] : "";

$passEncrypt = encrypt($pass, $key);

$sql = "SELECT * FROM usuarios WHERE correo LIKE '$email'";
$rs = $cnn->query($sql);
if ($rs->num_rows > 0) {
?>
    <script>
        //window.parent.$('#formRegistro').trigger("reset");
        window.parent.$('#alertaRegistro').html('<div class="alert alert-danger" role="alert">El correo introducido ya está en uso.</div>');
    </script>
    <?php
} else {
    $sql = "INSERT INTO  usuarios (nombre, correo, password) VALUES ('$nombre', '$email', '$passEncrypt')";
    $rs = $cnn->query($sql);
    if ($rs) {
    ?>
        <script>
            window.parent.$('#formRegistro').trigger("reset");
            window.parent.$('#alertaRegistro').html('<div class="alert alert-success" role="alert">Usuario creado correctamente</div>');
            setTimeout(function() {
                window.parent.$('#alertaRegistro').html('');
            }, 2000);
        </script>
    <?php
    } else {
    ?>
        <script>
            //window.parent.$('#formRegistro').trigger("reset");
            window.parent.$('#alertaRegistro').html('<div class="alert alert-danger" role="alert">Error al crear al usuario</div>');
        </script>
    <?php
    }
}
?>