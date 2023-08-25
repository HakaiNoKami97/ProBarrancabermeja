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
<html lang="es-CO">

<head>
  <?php include("head.php"); ?>
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
  <?php include("nav-menu.php"); ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 4 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/inversion.png)" onclick="window.location='https://forms.gle/Q4nZrAKZ7WVKhgbo9';">
        </div>

        <!-- Slide 1 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="layer" style="display: flex; justify-content: center;">
            <h2 style="position: absolute; top: 50%;">PROBARRANCABERMEJA</h2>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="layer" style="display: flex; justify-content: center;">
            <h2 style="position: absolute; top: 50%;">PROBARRANCABERMEJA</h2>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="layer" style="display: flex; justify-content: center;">
            <h2 style="position: absolute; top: 50%;">PROBARRANCABERMEJA</h2>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>

  </section>
  <!-- End Hero -->

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-md-4 col-lg-4 mb-5 mb-lg-0">
          <div class="panel-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="panel-inner">
              <div class="panel-block panel-block-front">
                <i class="icofont-globe"></i>
                <h3>Integra</h3>
              </div>
              <div class="panel-block panel-block-back">
                <p class="description">Convocamos a los diferentes actores de la región para analizar de forma interdisciplinaria y participativa temas de interés de la ciudad y región.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 mb-5 mb-lg-0">
          <div class="panel-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="panel-inner">
              <div class="panel-block panel-block-front">
                <i class="icofont-dashboard-web"></i>
                <h3>Planea</h3>
              </div>
              <div class="panel-block panel-block-back">
                <p class="description">Estructuramos de forma estratégica propuestas concretas con alto potencial de impactar positivamente a la ciudad y región en el tiempo.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 mb-5 mb-lg-0">
          <div class="panel-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="panel-inner">
              <div class="panel-block panel-block-front">
                <i class="icofont-gears"></i>
                <h3>Ejecuta</h3>
              </div>
              <div class="panel-block panel-block-back">
                <p class="description">Movilizamos esfuerzos conjuntos para creación de acciones conjuntas a largo plazo.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Featured Services Section -->

  <main id="main">
    <!-- ======= Cta Section ======= -->
    <?php $consulta = mysqli_query($con, "SELECT * FROM noticias ORDER BY fecha_noticia DESC LIMIT 3 "); ?>

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

    <section id="export" class="export">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-md-6 col-lg-6 align-items-stretch mb-5 mb-lg-0">
            <div class="section-title">
              <h2>Síguenos en Youtube</h2>
            </div>

            <div class="video-responsive">
              <iframe src="https://www.youtube.com/embed/mISg4vYcA0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-md-6 col-lg-6 align-items-stretch mb-5 mb-lg-0">
            <div class="section-title">
              <h2>Internacionalízate con nosotros</h2>
            </div>

            <div class="text-center">
              <p class="text-justify">ProBarrancabermeja en alianza con ProColombia, tiene a su disposición un servicio de asesorías y programas mediante el cual capacita de manera práctica a los empresarios, proporcionando las herramientas necesarias para dar inicio al proceso de internacionalización, minimizando riesgos y optimizando las capacidades y habilidades de la empresa.</p>
              <a class="export-btn scrollto" href="exportacion.php">Conocer Más</a>
            </div>
          </div>
        </div>

      </div>
    </section>



    <section>
      <div class="container" data-aos="zoom-in">
        <div class="section-title">
          <h2>Nuestras Redes</h2>
        </div>

        <div class="row justify-content-center">

          <!--twitter-->
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div style="background-color: #fff;">
              <a class="twitter-timeline" data-height="418" style="min-height: 418px;" href="https://twitter.com/PROBARRANCABJA?ref_src=twsrc%5Etfw">Tweets by PROBARRANCABJA</a>
              <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
              </script>
              <p></p>
            </div>
          </div>
          <!--facebook-->
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="d-flex justify-content-center">
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FProBarrancabermeja&tabs=timeline&width=500&height=418&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="500" height="418" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
              <p></p>
            </div><br>
          </div>
          <!--instgraan-->
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CZhbkYhrpA6/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:auto; min-width:auto; max-height:418px; padding:0; width:99.375%; height:200; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
              <div style="padding:16px;"> <a href="https://www.instagram.com/p/CZhbkYhrpA6/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                  <div style=" display: flex; flex-direction: row; align-items: center;">
                    <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                    </div>
                  </div>
                  <div style="padding: 19% 0;"></div>
                  <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                          <g>
                            <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                          </g>
                        </g>
                      </g>
                    </svg></div>
                  <div style="padding-top: 8px;">
                    <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Ver esta publicación en Instagram</div>
                  </div>
                  <div style="padding: 12.5% 0;"></div>
                  <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                    <div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div>
                      <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div>
                    </div>
                    <div style="margin-left: 8px;">
                      <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div>
                      <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                    </div>
                    <div style="margin-left: auto;">
                      <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div>
                      <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div>
                      <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                    </div>
                  </div>
                  <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div>
                  </div>
                </a>

              </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
          </div>

        </div>

      </div>
    </section>

    <?php include("php/includes/contacto.php"); ?>


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Nuestros Miembros</h2>
        </div>
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
        </div>
      </div>
    </section>
    <!-- End Gallery Section -->

  </main><!-- End #main -->

  <?php include("footer.php"); ?>
  <?php include("php/includes/scripts.php"); ?>
</body>

</html>