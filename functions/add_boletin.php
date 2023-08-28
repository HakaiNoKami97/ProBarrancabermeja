<!DOCTYPE html>
<html>
<head>
    <title>Tu formulario</title>
    <!-- Incluir las bibliotecas de SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</head>
<body>
<?php
$servidor = "localhost";
$database  = "pro_noticias";
$usuario = "technolo_pro";
$clave= "5}J6m4#ho(fJ";

$con = mysqli_connect($servidor,$usuario,$clave,$database);

if ($con->connect_error) {
    die("Error al conectarse a la base de datos: " . $con->connect_error);
}

if (isset($_POST['save'])) {
    $nombre = trim($_POST['titulo']);
    $archivo_nombre = $_FILES['archivo']['name'];
    $archivo_tmp = $_FILES['archivo']['tmp_name'];
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];

    if (empty($nombre)) {
        echo "<script>
                Swal.fire('Advertencia', 'Por favor, completa todos los campos antes de enviar el formulario.', 'warning').then(function() {
                    window.location.href = '../view_boletin.php';
                });
              </script>";
        exit();
    }

    // Verificar si los campos contienen solo espacios en blanco
    if (empty($nombre)) {
        echo "<script>
                Swal.fire('Advertencia', 'Por favor, completa todos los campos antes de enviar el formulario.', 'warning').then(function() {
                    window.location.href = '../view_boletin.php';
                });
              </script>";
        exit();
    }

    // Subir imagen al servidor
    $imagen_ruta = "../assets/img/" . $imagen_nombre;
    move_uploaded_file($imagen_tmp, $imagen_ruta);
    
    // Subir archivo al servidor
    $archivo_ruta = "../pdf/" . $archivo_nombre;
    move_uploaded_file($archivo_tmp, $archivo_ruta);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO boletin (tituloboletin, archivoboletin, imagenportada)
            VALUES ('$nombre', '$archivo_ruta', '$imagen_ruta')";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                Swal.fire('Éxito', 'Registro de BOLETIN exitoso.', 'success').then(function() {
                    window.location.href = '../view_boletin.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire('Error', 'Error al registrar BOLETIN: " . $con->error . "', 'error').then(function() {
                    window.location.href = '../view_boletin.php';
                });
              </script>";
    }
}  elseif (isset($_POST['update'])) {
    $edit_id = $_POST['edit_id'];
    $nombre = trim($_POST['titulo']);
    if (empty($nombre)) {
        echo "<script>
                    Swal.fire('Advertencia', 'Por favor, completa todos los campos antes de enviar el formulario.', 'warning').then(function() {
                        window.location.href = '../view_boletin.php';
                    });
                </script>";
        exit();
    }
    // Verificar si se cargó una nueva imagen
    if ($_FILES['imagen']['error']['archivo']['error'] === UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $archivo_nombre = $_FILES['archivo']['name'];
        $archivo_tmp = $_FILES['archivo']['tmp_name'];

        // Ruta donde se guardarán las imágenes
        $imagen_ruta = "../assets/img/" . $imagen_nombre;
        $archivo_ruta = "../pdf/" . $archivo_nombre;

        // Subir nueva imagen al servidor
        move_uploaded_file($imagen_tmp, $imagen_ruta);
        move_uploaded_file($archivo_tmp, $archivo_ruta); 
        
        // Actualizar detalles del desarrollo en la base de datos, incluyendo la imagen y el archivo
        $sql = "UPDATE boletin SET
                tituloboletin = '$nombre',
                archivoboletin = '$archivo_ruta',
                imagenportada = '$imagen_ruta'
                WHERE id = $edit_id";
        
        // Verificar si se cargó un nuevo archivo
    } elseif ($_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $archivo_nombre = $_FILES['archivo']['name'];
        $archivo_tmp = $_FILES['archivo']['tmp_name'];

        // Ruta donde se guardarán los archivos
        $archivo_ruta = "../pdf/" . $archivo_nombre;

        // Subir nuevo archivo al servidor
        move_uploaded_file($archivo_tmp, $archivo_ruta);    

        // Actualizar detalles del desarrollo en la base de datos, incluyendo el archivo dejando la imagen
        $sql = "UPDATE boletin SET
                tituloboletin = '$nombre',
                archivoboletin = '$archivo_ruta'
                WHERE id = $edit_id";

    } elseif ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];

        // Ruta donde se guardarán las imagenes
        $imagen_ruta = "../assets/img/" . $imagen_nombre;

        // Subir nueva imagen al servidor
        move_uploaded_file($imagen_tmp, $imagen_ruta);    

        // Actualizar detalles del desarrollo en la base de datos, incluyendo la imagen dejando el archivo
        $sql = "UPDATE boletin SET
                tituloboletin = '$nombre',
                imagenportada = '$imagen_ruta'
                WHERE id = $edit_id";

    }else {
        // Actualizar detalles del desarrollo en la base de datos sin cambiar la imagen o el archivo
        $sql = "UPDATE boletin SET
                tituloboletin = '$nombre'
                WHERE id = $edit_id";
    }

    if ($con->query($sql) === TRUE) {
        echo "<script>
                    Swal.fire('Éxito', 'Actualización de BOLETIN exitosa', 'success').then(function() {
                        window.location.href = '../view_boletin.php';
                    });
                </script>";
    } else {
        echo "<script>
                    Swal.fire('Error', 'Error al actualizar BOLETIN: " . $con->error . "', 'error').then(function() {
                        window.location.href = '../view_boletin.php';
                    });
                </script>";
    }
} elseif (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM boletin WHERE id = $delete_id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                    Swal.fire('Éxito', 'Registro eliminado exitosamente', 'success').then(function() {
                        window.location.href = '../view_boletin.php';
                    });
                </script>";
    } else {
        echo "<script>
                    Swal.fire('Error', 'Error al eliminar registro: " . $con->error . "', 'error').then(function() {
                        window.location.href = '../view_boletin.php';
                    });
                </script>";
    }
}

header("Location: ../view_boletin.php");
exit();

$con->close();
?>
</body>
</html>