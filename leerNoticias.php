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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>ProBarrancabermeja</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!--css propios-->
  <link rel="stylesheet" href="assets/css/leerNoticias.css">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<!-- As a link -->

<?php include("nav-menu.php"); ?>

<!-- ======= Hero Section ======= -->
<section id="">

</section><!-- End Hero -->


<body>
  <?php $cdo = $_GET['cdo']; ?>
  <?php $consulta  = mysqli_query($con, "SELECT * FROM noticias WHERE id_noticia = $cdo"); ?>
  <?php foreach ($consulta as $noticias) : ?>
    <div class="container">
      <div class="row">
        <img src="<?php echo "functions/$noticias[img_noticia]" ?>" style="height: 800px;width: 1380px;object-fit: cover;">
        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mt-5" style="text-align: justify;">
          <label class="text-center col-md-12 " style="font-size: 24px;" for=""> <strong> <?php echo " $noticias[titulo_noticia]" ?> </strong> </label><br>
          <p class="text-justify text-white"><?php echo " $noticias[descripcion_noticia]" ?></p> <br>
        </div>
      </div>
    </div>
  <?php endforeach ?>



  <div id="foo" class="center-block">
    <div class="addthis_inline_share_toolbox"></div>
  </div>

  <br>

  <?php $consulta = mysqli_query($con, "SELECT * FROM noticias ORDER BY RAND() DESC LIMIT 3 "); ?>
  <section>
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Más Noticias</h2>
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
    </div>
  </section>


  <?php include("footer.php"); ?>



  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-609eb2dfb0b9ed59"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>