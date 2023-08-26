<?php
// Contenido dinámico para la sección "Gallery"
$servidor = "localhost";
$database = "pro_noticias";
$usuario = "technolo_pro";
$clave = "5}J6m4#ho(fJ";

$con = mysqli_connect($servidor, $usuario, $clave, $database);

if ($con->connect_error) {
    die("Error al conectarse a la base de datos: " . $con->connect_error);
}

$sql = "SELECT * FROM miembros_section";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="owl-carousel gallery-carousel" data-aos="fade-up" data-interval="2000">';
    while ($row = $result->fetch_assoc()) {
        echo '<img src="' . $row['img_miembro'] . '" class="img-fluid" alt="">';
    }
    echo '</div>';
} else {
    echo "<p>No hay miembros disponibles.</p>";
}

$con->close();
?>
