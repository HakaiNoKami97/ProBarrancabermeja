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
    <link rel="stylesheet" href="assets/css/viewhero.css">
    <title>REGISTRAR BANNER PROBARRANCABERMEJA</title>
</head>
<body>
    <div class="content">
        <div class="container">
            <h2>Registrar Banner</h2>
            
            <!-- Formulario para agregar/editar registros -->
            <form action="functions/add_hero.php" method="post" enctype="multipart/form-data">
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

                    $sql = "SELECT * FROM hero_section WHERE id = $edit_id";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<h3>Editar Miembros</h3>";
                        echo '<form action="functions/add_hero.php" method="post" enctype="multipart/form-data">';
                        echo 'Titulo: <input type="text" name="titulo" value="' . $row['title'] . '"><br>';
                        echo 'URL: <input type="text" name="url" value="' . $row['link_url'] . '"><br>';
                        echo 'Imagen Actual: <img src="' . $row['image_url']. '" alt="Imagen del Banner" width="100"><br>';
                        echo 'Nueva Imagen: <input type="file" name="imagen" accept="image/*"><br>';
                        echo '<input type="hidden" name="edit_id" value="' . $edit_id . '">';
                        echo '<input type="submit" name="update" value="Actualizar">';
                        echo '</form>';
                    } else {
                        echo "No se encontraron datos para editar.";
                    }

                    $con->close();
                } else {
                    // Si no estamos editando, mostrar campos vacíos
                    echo 'Titulo: <input type="text" name="titulo"><br>';
                    echo 'URL: <input type="text" name="url"><br>';
                    echo 'Imagen: <input type="file" name="imagen" accept="image/*"><br>';
                    echo '<input type="submit" name="save" value="Guardar">';
                }
                ?>
            </form>

            <h2>Sobre Nosotros</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>URL</th>
                    <th>IMAGEN</th>
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
                $sql = "SELECT * FROM hero_section";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['link_url'] . "</td>";
                        echo "<td><img src='" . $row['image_url'] . "' alt='Imagen del Banner' width='100'></td>";
                        echo '<td><a href="view_hero.php?edit_id=' . $row['id'] . '">Editar</a></td>';
                        echo '<td><a href="functions/add_hero.php?delete_id=' . $row['id'] . '">Eliminar</a></td>';
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