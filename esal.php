<!DOCTYPE html>
<html lang="es">

<head>
  <?php include("head.php"); ?>
</head>

<body>

  <?php include("nav-menu.php"); ?>

  <!-- ======= Hero Section ======= -->


  <main id="main">


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-socios">
      <div class="container mt-5" data-aos="fade-up">

        <div class="section-title">
          <h2>Documentación</h2>
        </div>

        <div class="row">
        <?php
        $servidor = "localhost";
        $database = "pro_noticias";
        $usuario = "technolo_pro";
        $clave = "5}J6m4#ho(fJ";
        
        $con = mysqli_connect($servidor, $usuario, $clave, $database);
        
        if (!$con) {
            die("Error al conectarse a la base de datos: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM rte_section";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-sm-3 mb-5">';
                echo '<div class="card card-docs" style="height: 100%;" data-aos="fade-up" data-aos-delay="400">';
                echo '<i class="fa-solid fa-file-pdf fa-8x text-danger card-img-top" style="height:10rem;text-align: center;padding:20px"></i>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title" style="color:#39364e;margin-bottom: 15px;">'. $row['nombre_rte'] .'</h5>';
                echo '</div>';
                echo '<div class="card-footer card-footer-pro export">';
                echo '<a href="' . $row['archivo_rte'] . '" target="_blank" class="export-btn scrollto">Descargar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No hay miembros disponibles.</p>";
        }
        
        mysqli_close($con);
        ?>

          

        </div>

      </div>
    </section><!-- End Doctors Section -->

  </main><!-- End #main -->

  <?php include("footer.php"); ?>
  <?php include("php/includes/scripts.php"); ?>

</body>

</html>