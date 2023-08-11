<?php
require_once 'conexion.php';

if (isset($_POST['editargenerar'])) {

    $codigo = $_POST['codigonoticia'];
    $fecha = $_POST['edfecha'];
    $autor = $_POST['edautor'];
    $titulo = $_POST['edtitulo'];
    $clase = $_POST['clasificacion'];
    $imagen = $_FILES['edimagen']['name'];
    $temporal = $_FILES['edimagen']['tmp_name'];
    $tipo = $_FILES['edimagen']['type'];
    $ruta = "";
    $descripcion = $_POST['eddescripcion'];

    if (empty($fecha) || empty($autor) || empty($titulo) || empty($imagen) || empty($descripcion) || empty($clase)) {
        echo'<script type="text/javascript">
        alert("todos los acmpos deben ser llenados");
        </script>';
    } elseif (strlen($autor) > 100) {
        echo'<script type="text/javascript">
        alert("el campo autor tiene mas de 100 caracteres");
        </script>';
    } elseif (strlen($titulo) > 100) {
        echo'<script type="text/javascript">
        alert("el campo titulo tiene mas de 100 caracteres");
        </script>';
    } elseif (strlen($descripcion) > 6000) {
        echo'<script type="text/javascript">
        alert("el campo descipcion tiene mas de 6000 caracteres");
        </script>';
    }else{
        if (file_exists('imagen_noticias')) {
            //mkdir('imagen_noticias', 0777, true);
            $ruta = 'imagen_noticias/' . $imagen;
            move_uploaded_file($temporal,$ruta);
            mysqli_query($con," UPDATE noticias SET id_noticia='$codigo',fecha_noticia='$fecha',autor_noticia='$autor',titulo_noticia='$titulo',clasificacion = '$clase',img_noticia='$ruta',descripcion_noticia='$descripcion' WHERE  id_noticia = $codigo");
            echo'<script type="text/javascript">
            alert("NOTICIA ACTUALIZADA DE MANERA EXITOSA");
            window.location.href="../verNoticias.php";
            </script>';
        }

    }
}
mysqli_close($con);
