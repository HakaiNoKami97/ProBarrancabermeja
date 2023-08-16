<?php require_once 'functions/conexion.php' ?>

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

  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

  <?php include("nav-menu.php"); ?>

  <!-- ======= Hero Section ======= -->
  <section id="">
    <!-- Slide 1 -->
    <a href="https://www.colombiatrade.com.co/inicio" target="_blank">
      <div class="carousel-item active">
        <br>
        <br>
        <img class="responsive" src="assets/img/slide/bannerexportar.png" alt="">
        <div class="layer" style="display: flex; justify-content: center; text-align: center;">
        </div>
      </div>
    </a>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>CENTRO DE INFORMACIÓN PROCOLOMBIA</h2>
          <p>ProBarrancabermeja en alianza con ProColombia, tiene a su disposición un Centro de Información, mediante el cual capacita de manera práctica a los empresarios, proporcionando las herramientas necesarias para dar inicio al proceso de internacionalización, minimizando riesgos y optimizando las capacidades y habilidades de la empresa.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <a href="https://www.colombiatrade.com.co/inicio" target="_blank">
              <img src="assets/img/exportacion-1.png" class="img-fluid" alt="">
            </a>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Desde nuestro centro de información brindamos:</h3>
            <ul>
              <li><i class="icofont-check-circled"></i> Información para el desarrollo en su estrategia exportadora.</li>
              <li><i class="icofont-check-circled"></i> Capacitaciones.</li>
              <li><i class="icofont-check-circled"></i> Asesorías personalizadas en temas de comercio exterior.</li>
              <li><i class="icofont-check-circled"></i> Herramientas prácticas.</li>
              <li><i class="icofont-check-circled"></i> Acompañamiento en el proceso de exportación.</li>
              <li><i class="icofont-check-circled"></i> Identificación de oportunidades en los mercados internacionales.</li>
              <li><i class="icofont-check-circled"></i> Actividades de promoción comercial.</li><br>
              <a class="about-btn scrollto" href="https://procolombia.co/" target="_blank">Descubre los programas de formación de ProColombia</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <?php include("php/includes/exportaciones.php"); ?>


    <?php $clase = "exportacion"; ?>

    <?php $consulta = mysqli_query($con, "SELECT * FROM noticias ORDER BY RAND() DESC LIMIT 3 "); ?>

    <section>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Noticias Recientes</h2>
        </div>
        <div class="row">
          <?php foreach ($consulta as $noticias) : ?>
            <?php $cdo = $noticias['id_noticia']; ?>
            <?php $codigos = $noticias['id_noticia']; ?>
            <?php $nota = $noticias['titulo_noticia']; ?>
            <?php $descripcion_corta = $noticias['descripcion_corta']; ?>
            <div class="col-sm-4">
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
        <div class="row align-items-stretch justify-content-center mt-5 export" style="z-index: 1">
          <a class="export-btn scrollto" href="listaNoticias.php" style="z-index: 1">Ver Más Noticias</a>
        </div>
      </div>
    </section>



  </main><!-- End #main -->

  <?php include("footer.php"); ?>
  <?php include("php/includes/scripts.php"); ?>
</body>

</html>