<?php

if(isset($_POST['dejarenblanco'])){
    $dejarenblanco = $_POST['dejarenblanco'];
}
if(isset($_POST['nocambiar'])){
    $nocambiar = $_POST['nocambiar'];
}


if ($dejarenblanco == '' && $nocambiar == 'http://') { 

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$name_empresa = $_POST['name_empresa'];
$message = $_POST['message'];

$para = "barrancabermejapro@gmail.com";
$asunto = "Empresa quiere ser parte de ProBarrancabermeja";

$mensaje = "Este mensaje fue enviado por: " . $name . " \r\n\n";
$mensaje .= "Su correo electronico es: " . $email . " \r\n\n";
$mensaje .= "Su correo numero de contacto es: " . $phone . " \r\n\n";
$mensaje .= "El nombre de la empresa es: " . $name_empresa . " \r\n\n";
$mensaje .= "Mensaje: " . $_POST['message'] . " \r\n\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());


@mail($para, $asunto, $mensaje);
echo '<SCRIPT>window.location="../index.php";</SCRIPT>';

}

?>