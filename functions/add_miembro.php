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
    $descripcion = $_POST['url'];
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];

    if (empty($nombre)) {
        echo "<script>
                Swal.fire('Advertencia', 'Por favor, completa todos los campos antes de enviar el formulario.', 'warning').then(function() {
                    window.location.href = '../view_miembros.php';
                });
              </script>";
        exit();
    }

    // Verificar si los campos contienen solo espacios en blanco
    if (empty($nombre)) {
        echo "<script>
                Swal.fire('Advertencia', 'Por favor, completa todos los campos antes de enviar el formulario.', 'warning').then(function() {
                    window.location.href = '../view_miembros.php';
                });
              </script>";
        exit();
    }

    // Subir imagen al servidor
    $imagen_ruta = "../assets/img/asociados/" . $imagen_nombre;
    move_uploaded_file($imagen_tmp, $imagen_ruta);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO miembros_section (titulo_miembro, url_miembro, img_miembro)
            VALUES ('$nombre', '$descripcion', '$imagen_ruta')";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                Swal.fire('Éxito', 'Registro de miembro exitoso.', 'success').then(function() {
                    window.location.href = '../view_miembros.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire('Error', 'Error al registrar miembro: " . $con->error . "', 'error').then(function() {
                    window.location.href = '../view_miembros.php';
                });
              </script>";
    }
}  elseif (isset($_POST['update'])) {
    $edit_id = $_POST['edit_id'];
    $nombre = trim($_POST['titulo']);
    $descripcion = $_POST['url'];

    if (empty($nombre)) {
        echo "<script>
                    Swal.fire('Advertencia', 'Por favor, completa todos los campos antes de enviar el formulario.', 'warning').then(function() {
                        window.location.href = '../view_miembros.php';
                    });
                </script>";
        exit();
    }

    // Verificar si se cargó una nueva imagen
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];

        // Ruta donde se guardarán las imágenes
        $imagen_ruta = "../assets/img/asociados/" . $imagen_nombre;

        // Subir nueva imagen al servidor
        move_uploaded_file($imagen_tmp, $imagen_ruta);

        // Actualizar detalles del desarrollo en la base de datos, incluyendo la imagen
        $sql = "UPDATE miembros_section SET
                titulo_miembro = '$nombre',
                url_miembro = '$descripcion',
                img_miembro = '$imagen_ruta'
                WHERE id = $edit_id";

    } else {
        // Actualizar detalles del desarrollo en la base de datos sin cambiar la imagen
        $sql = "UPDATE miembros_section SET
                titulo_miembro = '$nombre',
                url_miembro = '$descripcion'
                WHERE id = $edit_id";
    }

    if ($con->query($sql) === TRUE) {
        echo "<script>
                    Swal.fire('Éxito', 'Actualización de miembro exitosa', 'success').then(function() {
                        window.location.href = '../view_miembros.php';
                    });
                </script>";
    } else {
        echo "<script>
                    Swal.fire('Error', 'Error al actualizar miembro: " . $con->error . "', 'error').then(function() {
                        window.location.href = '../view_miembros.php';
                    });
                </script>";
    }
} elseif (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM miembros_section WHERE id = $delete_id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                    Swal.fire('Éxito', 'Registro eliminado exitosamente', 'success').then(function() {
                        window.location.href = '../view_miembros.php';
                    });
                </script>";
    } else {
        echo "<script>
                    Swal.fire('Error', 'Error al eliminar registro: " . $con->error . "', 'error').then(function() {
                        window.location.href = '../view_miembros.php';
                    });
                </script>";
    }
}

header("Location: ../view_miembros.php");
exit();

$con->close();
?>
</body>
</html>