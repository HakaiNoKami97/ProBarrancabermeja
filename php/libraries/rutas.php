<?php
$URL = $_SERVER['SERVER_NAME'];

define('DS', DIRECTORY_SEPARATOR);
define('PUERTO', $_SERVER["SERVER_PORT"]);
//if( PUERTO != "") $URL.=':'.PUERTO.'/';

$ssl   = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
$proto = strtolower($_SERVER['SERVER_PROTOCOL']);
$proto = substr($proto, 0, strpos($proto, '/')) . ($ssl ? 's' : '' );

define('urlBase', $proto.'://'.$URL.'/');//devuelve http://localhost:81/

$rutaBase = substr(dirname(__DIR__), 0, -3);//devuelve /%ruta%/icosalud_web/
define('rutaBase', $rutaBase);

// function url_completa($forwarded_host = false) {
//     $ssl   = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
//     $proto = strtolower($_SERVER['SERVER_PROTOCOL']);
//     $proto = substr($proto, 0, strpos($proto, '/')) . ($ssl ? 's' : '' );
//     if ($forwarded_host && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
//         $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
//     } else {
//         if (isset($_SERVER['HTTP_HOST'])) {
//             $host = $_SERVER['HTTP_HOST'];
//         } else {
//             $port = $_SERVER['SERVER_PORT'];
//             $port = ((!$ssl && $port=='80') || ($ssl && $port=='443' )) ? '' : ':' . $port;
//             $host = $_SERVER['SERVER_NAME'] . $port;
//         }
//     }
//     $request = $_SERVER['REQUEST_URI'];
//     $url = $proto.'://'.$host.$request;

//     return $url;
// }
?>