<?php
// Contenido dinámico para la sección "Hero"
$servidor = "localhost";
$database = "pro_noticias";
$usuario = "technolo_pro";
$clave = "5}J6m4#ho(fJ";

$con = mysqli_connect($servidor, $usuario, $clave, $database);

if ($con->connect_error) {
    die("Error al conectarse a la base de datos: " . $con->connect_error);
}

$sql = "SELECT * FROM hero_section";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';
    echo '<div class="carousel-inner">';
    
    // Para controlar la clase "active" en el primer elemento
    $active = true;
    
    while ($row = $result->fetch_assoc()) {
        $itemClasses = $active ? "carousel-item active" : "carousel-item";
        
        echo '<div class="' . $itemClasses . '" style="background-image: url(\'' . $row['image_url'] . '\');" onclick="window.location=\'' . $row['link_url'] . '\';">';
        echo '<div class="layer" style="display: flex; justify-content: center;">';
        echo '<h2 style="position: absolute; top: 50%;">' . $row['titulo'] . '</h2>';
        echo '</div>';
        echo '</div>';
        
        $active = false;
    }
    
    echo '</div>';
    echo '</div>';
} else {
    echo "<p>No hay banners disponibles.</p>";
}

$con->close();
?>
