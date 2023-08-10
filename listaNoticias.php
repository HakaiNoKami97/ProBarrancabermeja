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

        <div class="row">

          <div class="col-sm-4 mb-4">
            <div class="card cursor-pointer" style="height: 100%;" onclick="window.location='pdf/Boletín Informativo 01-2023 ProBarrancabermeja.pdf';">
              <img class="card-img-top" src="assets/img/Probarrancabermeja_Portadas_3.png">

              <div class="card-body">
                <h4 class="card-title" style="color:#39364e;margin-bottom: 15px;">Boletín Informativo 01-2023 PROBARRANCABERMEJA</h4>
              </div>
            </div>
          </div>

          <div class="col-sm-4 mb-4">
            <div class="card cursor-pointer" style="height: 100%;" onclick="window.location='pdf/Boletín informativo 002-2023 - ProBarrancabermeja.pdf';">
              <img class="card-img-top" src="assets/img/Probarrancabermeja_Portadas_3.png">

              <div class="card-body">
                <h4 class="card-title" style="color:#39364e;margin-bottom: 15px;">Boletín informativo 002-2023 - ProBarrancabermeja</h4>
              </div>
            </div>
          </div>

        </div>


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