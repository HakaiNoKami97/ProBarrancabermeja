<?php

if(isset($_POST['dejarenblanco'])){
    $dejarenblanco = $_POST['dejarenblanco'];
}
if(isset($_POST['nocambiar'])){
    $nocambiar = $_POST['nocambiar'];
}


if ($dejarenblanco == '' && $nocambiar == 'http://') {

$email = $_POST['email'];

$para = 'barrancabermejapro@gmail.com';
$asunto = 'Correo electrónico de usuario - Página Web';

$mensaje = "El correo electronico del usuario es: " . $email . "\r\n\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());


@mail($para, $asunto, $mensaje);

echo '<SCRIPT>window.location="../index.php";</SCRIPT>';

}

?>