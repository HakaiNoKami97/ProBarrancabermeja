<?php require_once 'functions/conexion.php'; ?>

<?php
function limitar_cadena($cadena, $limite, $sufijo)
{
  if (strlen($cadena) > $limite) {
    return substr($cadena, 0, $limite) . $sufijo;
  }

  return $cadena;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include("head.php"); ?>
  <link rel="stylesheet" href="assets/css/leerNoticias.css">
</head>

<body>

  <?php include("nav-menu.php"); ?>

  <!-- ======= Hero Section ======= -->
  <section id="">

  </section><!-- End Hero -->


  <main id="main">
    <!-- ======= Cta Section ======= -->
    <?php $consulta = mysqli_query($con, "SELECT * FROM noticias ORDER BY fecha_noticia DESC"); ?>
    <section>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Boletines</h2>
        </div>
        <!--BOLETIN-->
        <div class="row">
          <?php
          $servidor = "localhost";
          $database = "pro_noticias";
          $usuario = "technolo_pro";
          $clave = "5}J6m4#ho(fJ";
    
          $con = mysqli_connect($servidor, $usuario, $clave, $database);
    
          if ($con->connect_error) {
              die("Error al conectarse a la base de datos: " . $con->connect_error);
          }
    
          $sql = "SELECT * FROM boletin";
          $result = $con->query($sql);
    
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="col-sm-4 mb-4">';
                  echo '<div class="card cursor-pointer" style="height: 100%;" onclick="window.location=\''. $row['archivoboletin'] .'\';">';
                  echo '<img class="card-img-top" src="' . $row['imagenportada'] . '">';
                  echo '<div class="card-body">';
                  echo '<h4 class="card-title" style="color:#39364e;margin-bottom: 15px;">'. $row['tituloboletin'] .'</h4>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
              }
          } else {
              echo "<p>No hay miembros disponibles.</p>";
          }
    
          $con->close();
          ?>


        </div>
        <!-- END BOLETIN-->


        <div class="section-title">
          <h2>Noticias Recientes</h2>
        </div>

        <div class="row">
          <?php foreach ($consulta as $noticias) : ?>
            <?php $cdo = $noticias['id_noticia']; ?>
            <?php $codigos = $noticias['id_noticia']; ?>
            <?php $nota = $noticias['titulo_noticia']; ?>
            <?php $descripcion_corta = $noticias['descripcion_corta']; ?>
            <div class="col-sm-4 mb-4">
              <div class="card" style="height: 100%;">
                <img src="<?php echo "functions/$noticias[img_noticia]" ?>" class="card-img-top">
                <div class="card-body">
                  <h4 class="card-title" style="color:#39364e;margin-bottom: 15px;"><?php echo $nota ?></h4>
                  <p class="card-text" style="color:#696969;font-size: 16px;"><?php echo $descripcion_corta; ?></p>
                </div>
                <div class="card-footer card-footer-pro export"><?php echo "<a href='leerNoticias.php?cdo=$cdo' target='_blank' class='export-btn scrollto'>Ver enlace</a>"; ?></div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <?php include("footer.php"); ?>
  <?php include("php/includes/scripts.php"); ?>

</body>

</html>