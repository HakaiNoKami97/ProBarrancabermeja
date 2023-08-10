<?php

require_once 'conexion.php';

$codigo = $_GET['codigo'];

if (isset($_GET['codigo'])) {

    if ($resultado = mysqli_query($con,"DELETE  FROM noticias WHERE id_noticia='$codigo' ")) {
        echo'<script type="text/javascript">
        alert("NOTICIA ELIMINADA DE MANERA EXITOSA");
        window.location.href="../verNoticias.php";
        </script>';
    }else{
        echo "ERROR AL INTENTAR ELIMINAR ESTA NOTICIA";
        echo'<script type="text/javascript">
        alert("ERROR AL INTENTAR ELIMINAR ESTA NOTICIA");
        window.location.href="../verNoticias.php";
        </script>';
    }
}

mysqli_close($con);
