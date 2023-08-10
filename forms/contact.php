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
$subject = $_POST['subject'];
$message = $_POST['message'];

$para = "barrancabermejapro@gmail.com";
$asunto = "Formulario de contacto - Página Web";

$mensaje = "Este mensaje fue enviado por: " . $name . " \r\n\n";
$mensaje .= "Su correo electronico es: " . $email . " \r\n\n";
$mensaje .= "Asunto: " . $_POST['subject'] . " \r\n\n";
$mensaje .= "Mensaje: " . $_POST['message'] . " \r\n\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());


@mail($para, $asunto, $mensaje);
echo '<SCRIPT>window.location="./contacto.php";</SCRIPT>';

}

?>
