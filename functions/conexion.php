<?php

$servidor = "localhost";
$database  = "pro_noticias";
$usuario = "technolo_pro";
$clave= "5}J6m4#ho(fJ";


//crear conexion
$con = mysqli_connect($servidor,$usuario,$clave,$database);

// mysqli_set_charset($con,'uft8');
mb_language('uni');
mb_internal_encoding('UTF-8');

//revisar conexion
if (!$con){ die('conexion fallida'.mysqli_connect_error());
}else{
    //echo"exito";
}