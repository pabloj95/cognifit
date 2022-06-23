<?php
$compruebaLogado = false;
include $_SERVER['DOCUMENT_ROOT'].'\cognifit\includes\config.php';

$email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : "";
$pass = isset($_POST['pass']) && !empty($_POST['pass']) ? $_POST['pass'] : "";

$passEncrypt = encrypt($pass, $key);

$sql = "SELECT * FROM usuarios WHERE correo LIKE '$email' AND password LIKE '$passEncrypt'";
$rs = $cnn->query($sql);
if($rs->num_rows > 0) {
    $row = $rs->fetch_assoc();
    $_SESSION['uid'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    ?>
    <script>
        //window.parent.$('#formLogin').trigger("reset");
        window.parent.location.href = '<?php echo $CONFIG['urlWeb']; ?>';
    </script>
    <?php
} else {
    ?>
    <script>
        //window.parent.$('#formLogin').trigger("reset");
        window.parent.$('#alertaLogin').html('<div class="alert alert-danger" role="alert">Email o contraseña incorrectos</div>');
    </script>
    <?php
}
?>