<?php
ini_set('display_errors', 1);
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['peticion'])) {
        $peticion = $_POST['peticion'];
        require_once('../model/modelContacto.php');
        require_once('../libraries/rutas.php');
        switch ($peticion) {
            case 'sendFormContacto':
                // Obtenemos los datos de la peticion ajax y validamos la informacion
                $empresa = isset($_POST['empresa']) ? $_POST['empresa'] : NULL;
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
                $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
                $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
                $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : NULL;

                echo modelContacto::sendFormContacto($empresa, $nombre, $correo, $telefono, $mensaje);

                break;
            case 'sendFormExportaciones':
                // Obtenemos los datos de la peticion ajax y validamos la informacion
                $empresa = isset($_POST['empresa']) ? $_POST['empresa'] : NULL;
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
                $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
                $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
                $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : NULL;

                echo modelContacto::sendFormExportaciones($empresa, $nombre, $correo, $telefono, $mensaje);
                break;
            case 'sendFormContactanos':
                // Obtenemos los datos de la peticion ajax y validamos la informacion
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
                $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
                $asunto = isset($_POST['asunto']) ? $_POST['asunto'] : NULL;
                $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : NULL;

                echo modelContacto::sendFormContactanos($nombre, $correo, $asunto, $mensaje);

                break;
            default:
                echo json_encode("sin peticion");
                break;
        }
    } else {
        echo json_encode('Sin peticion 0_o');
    }
}
