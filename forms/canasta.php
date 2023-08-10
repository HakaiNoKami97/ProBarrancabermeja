<?php
error_reporting(0);

if (isset($_POST['dejarenblanco'])) {
    $dejarenblanco = $_POST['dejarenblanco'];
}
if (isset($_POST['nocambiar'])) {
    $nocambiar = $_POST['nocambiar'];
}


if ($dejarenblanco == '' && $nocambiar == 'http://') {

    $name = $_POST['nombre_fetch'];
    $empresa = $_POST['empresa_fetch'];
    $email = $_POST['correo_fetch'];
    $number = $_POST['numero_fetch'];
    $idea = $_POST['idea_fetch'];

    $para = "probarrancabermeja.comunica100@gmail.com";
    $asunto = "Formulario de canasta de soluciones - Página Web";

    $mensaje = "Este mensaje fue enviado por: " . $name . " \r\n\n";
    $mensaje = "Empresa: " . $empresa . " \r\n\n";
    $mensaje .= "Su correo electronico es: " . $email . " \r\n\n";
    $mensaje .= "Numero Telefonico: " . $number . " \r\n\n";
    $mensaje .= "Mensaje: " . $idea . " \r\n\n";
    $mensaje .= "Enviado el " . date('d/m/Y', time());


    @mail($para, $asunto, $mensaje);
    //echo '<SCRIPT>window.location="./miembros.php";</SCRIPT>';
    echo json_encode(array('success' => 1));
}else{
    echo json_encode(array('success' => 0));
}
