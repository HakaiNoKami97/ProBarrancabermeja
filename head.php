  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>ProBarrancabermeja</title>
  
  <meta content="Organizaci贸n empresarial y centro de desarrollo que trabaja por el crecimiento de Barrancabermeja y la regi贸n del Magdalena Medio." name="description">
  <meta content="Organizaci贸n empresarial y centro de desarrollo que trabaja por el crecimiento de Barrancabermeja y la regi贸n del Magdalena Medio." name="keywords">
  
  <!--META TAGS DE FACEBOOK-->
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  
  <script>
        // Función para actualizar los meta tags Open Graph
        function actualizarMetaTags(url, titulo, descripcion, imagen) {
            document.querySelector('meta[property="og:url"]').content = url;
            document.querySelector('meta[property="og:title"]').content = titulo;
            document.querySelector('meta[property="og:description"]').content = descripcion;
            document.querySelector('meta[property="og:image"]').content = imagen;
        }

        // Ejecutar la función cuando la página esté lista
        window.onload = function() {
            var urlActual = window.location.href;
            var tituloPagina = document.title;
            var descripcionPagina = document.querySelector('meta[name="description"]').getAttribute("content");
            var imagenPortada = window.location.href;

            // Actualizar los valores de los meta tags según la página actual
            actualizarMetaTags(urlActual, tituloPagina, descripcionPagina, imagenPortada);
        };
    </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v2.1.1
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->