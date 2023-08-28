<?php
    session_start();
    $var1 =  $_SESSION['clave'];
    $var1;
    if ($var1 == NULL || $var1 = '') {
        header('location:functions/destruirSesion.php');
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/viewboletin.css">
    <title>REGISTRO BOLETIN PROBARRANCABERMEJA</title>
</head>
<body>
    <div class="content">
        <div class="container">
            <h2>Registrar BOLETIN</h2>
            
            <!-- Formulario para agregar/editar registros -->
            <form action="functions/add_boletin.php" method="post" enctype="multipart/form-data">
                <?php
                if (isset($_GET['edit_id'])) {
                    $edit_id = $_GET['edit_id'];
                    $servidor = "localhost";
                    $database  = "pro_noticias";
                    $usuario = "technolo_pro";
                    $clave= "5}J6m4#ho(fJ";

                    $con = mysqli_connect($servidor,$usuario,$clave,$database);

                    if ($con->connect_error) {
                        die("Error al conectarse a la base de datos: " . $con->connect_error);
                    }

                    $sql = "SELECT * FROM boletin WHERE id = $edit_id";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<h3>Editar Miembros</h3>";
                        echo '<form action="functions/add_boletin.php" method="post" enctype="multipart/form-data">';
                        echo 'Titulo Boletin: <input type="text" name="titulo" value="' . $row['tituloboletin'] . '" required><br>';
                        echo 'Archivo Actual: <img src="' . $row['archivoboletin']. '" alt="Archivo Boletin" width="100"><br>';
                        echo 'Nuevo Archivo: <input type="file" name="archivo" accept=".pdf"><br>';
                        echo 'Portada Actual: <img src="' . $row['imagenportada']. '" alt="Imagen Portada" width="100"><br>';
                        echo 'Nueva Portada: <input type="file" name="imagen" accept="image/*"><br>';
                        echo '<input type="hidden" name="edit_id" value="' . $edit_id . '">';
                        echo '<input type="submit" name="update" value="Actualizar">';
                        echo '</form>';
                    } else {
                        echo "No se encontraron datos para editar.";
                    }

                    $con->close();
                } else {
                    // Si no estamos editando, mostrar campos vacíos
                    echo 'Titulo Boletin: <input type="text" name="titulo" required><br>';
                    echo 'Archivo Boletin: <input type="file" name="archivo" accept=".pdf"><br>';
                    echo 'Imagen Portada Boletin: <input type="file" name="imagen" accept="image/*"><br>';
                    echo '<input type="submit" name="save" value="Guardar">';
                }
                ?>
            </form>

            <h2>Sobre Nosotros</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>TITULO BOLETIN</th>
                    <th>ARCHIVO BOLETIN</th>
                    <th>IMAGEN PORTADA BOLETIN</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>
                
                <?php
                $servidor = "localhost";
                $database  = "pro_noticias";
                $usuario = "technolo_pro";
                $clave= "5}J6m4#ho(fJ";

                $con = mysqli_connect($servidor,$usuario,$clave,$database);

                if ($con->connect_error) {
                    die("Error al conectarse a la base de datos: " . $con->connect_error);
                }

                // Realizar consulta a la tabla "empresa"
                $sql = "SELECT * FROM boletin";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['tituloboletin'] . "</td>";
                        echo "<td><img src='" . $row['archivoboletin'] . "' alt='Archivo Boletin' width='100'></td>";
                        echo "<td><img src='" . $row['imagenportada'] . "' alt='Imagen Portada' width='100'></td>";
                        echo '<td><a href="view_boletin.php?edit_id=' . $row['id'] . '">Editar</a></td>';
                        echo '<td><a href="functions/add_boletin.php?delete_id=' . $row['id'] . '">Eliminar</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay registros disponibles</td></tr>";
                }

                $con->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>