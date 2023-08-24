<!DOCTYPE html>
<html lang="es">

<head>
  <?php include("head.php"); ?>
</head>

<body>

  <?php include("nav-menu.php"); ?>

  <!-- ======= Hero Section ======= -->
  <section id="">

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-socios">
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
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="col-lg-3 col-md-4 col-6 d-flex align-items-stretch">';
                  echo '<div class="member member-text" data-aos="fade-up" data-aos-delay="100">';
                  echo '<div class="member-img">';
                  echo '<a href="' . $row['url_miembro'] . '" target="_blank">';
                  echo '<img src="' . $row['img_miembro'] . '" class="img-fluid" alt="">';
                  echo '</div></a>';
                  echo '<a href="' . $row['url_miembro'] . '" target="_blank">';
                  echo '<div class="member-info member-text">';
                  echo '<h4>' . $row['titulo_miembro'] . '</h4>';
                  echo '</div>';
                  echo '</a>';
                  echo '</div>';
                  echo '</div>';
              }
          } else {
              echo "<p>No hay miembros disponibles.</p>";
          }
    
          $con->close();
          ?>
        </div>
      </div>
        <!-- ======= End Miembros Section ======= -->

        <div class="section-titlecanasta">
          <h2>
            Canasta de Soluciones
            <a class="canasta-btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="icofont-basket"></i></a>
          </h2>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <form id="formulario_email">
                <h4>
                  ¡Tu opinión nos importa, ayúdanos a mejorar!
                </h4>
                <p class="text-justify">
                  Canasta de soluciones es creada para que los miembros de <strong>PROBARRANCABERMEJA</strong> puedan presentar sus propuestas,
                  recomendaciones, ideas, quejas concretas y felicitaciones que consideren oportunas a través de este medio de
                  participación activa, ya que la entidad está dispuesta a la aplicación de propuestas que faciliten el cumplimiento
                  de los objetivos de la organización.
                </p>
                <hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4"><b>Nombre<a class="text-danger">*</a></b></label>
                    <input type="text" id="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4"><b>Empresa <a class="text-danger">*</a></b></label>
                    <input type="text" id="empresa" class="form-control" placeholder="Ingrese el nombre de la empresa" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4"><b>Correo electrónico<a class="text-danger">*</a></b></label>
                    <input type="email" id="correo" class="form-control" placeholder="ejemplo@correo.com" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputPassword4"><b>Número de contácto<a class="text-danger">*</a></b></label>
                    <input type="number" id="numero" class="form-control" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputCity"><b>Idea o propuesta<a class="text-danger">*</a></b></label>
                    <textarea id="idea" class="form-control" id="inputCity" cols="30" rows="3" required></textarea>
                  </div>
                </div>
                <div id="deletealert"></div>
                <button type="submit" class="btn btn-info">Enviar <i class="icofont-send-mail"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End Doctors Section -->


  </main><!-- End #main -->

  <?php include("footer.php"); ?>
  <?php include("php/includes/scripts.php"); ?>

</body>

</html>