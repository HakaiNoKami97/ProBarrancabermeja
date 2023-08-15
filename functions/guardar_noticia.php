<?php
ini_set('display_error',1);
 include_once 'conexion.php';

if (isset($_POST['generar'])) {

    $fecha = $_POST['fecha'];
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $clase = $_POST['clasificacion'];
    $imagen = $_FILES['imagen']['name'];
    $temporal = $_FILES['imagen']['tmp_name'];
    $tipo = $_FILES['imagen']['type'];
    $ruta = "";
    $descripcion = $_POST['descripcion'];
    $descripcion_corta = $_POST['descripcion'];
 
    if (empty($fecha) || empty($autor) || empty($titulo) || empty($imagen) || empty($descripcion) || empty($clase)) {
        echo'<script type="text/javascript">
        alert("todos los campos deben ser llenados");
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
        alert("el campo descripcion tiene mas de 2000 caracteres");
        </script>';
    }else{
        if (!is_dir('imagen_noticias')) {
            mkdir('imagen_noticias', 0777, true);
            $ruta = 'imagen_noticias/' . $imagen;
            move_uploaded_file($temporal, 'imagen_noticias/', $ruta);
            $consulta = mysqli_query($con,"INSERT INTO noticias(fecha_noticia,autor_noticia,titulo_noticia,clasificacion,img_noticia,descripcion_noticia,descripcion_corta)
            VALUES ('$fecha','$autor','$titulo','$clase','$ruta','$descripcion','$descripcion_corta')");
            if($consuta = false){
                echo "Error de la consulta:" . mysqli_error($con);
            }else{
                echo'<script type="text/javascript">
                alert("NOTICIA AGREGADA DE MANERA EXITOSA");
                window.location.href="../generarNoticia.php";
                </script>';
            }
        } else {
            
            $ruta = 'imagen_noticias/'. $imagen;
            move_uploaded_file($temporal, $ruta);
            $nueva = mysqli_query($con,"INSERT INTO noticias(fecha_noticia,autor_noticia,titulo_noticia,clasificacion,img_noticia,descripcion_noticia,descripcion_corta)
            VALUES ('$fecha','$autor','$titulo','$clase','$ruta','$descripcion','$descripcion_corta')");
            if ($nueva ==  false){
                echo "Error de la consulta:" . mysqli_error($con);
            }else{
                echo"<script type='text/javascript'>
                alert('NOTICIA AGREGADA DE MANERA EXITOSA');
                window.location.href='../generarNoticia.php';
                </script>";
            }

        }

    }
    mysqli_close($con);
}else{
    echo"<script type='text/javascript'>
                alert('error');
                </script>";
}

