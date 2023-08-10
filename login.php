<!DOCTYPE html>
<html>

<head>
	<?php include("head.php"); ?>
	<title>INGRESO</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="assets/css/login.css">
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>

<body>
	<div class="container">
		<div class="row m-0 justify-content-center vh-100 align-items-center">
			<div class="card col-xs-12 col-sm-10 col-md-6 col-lg-5 d-flex p-3 mb-5">
				<h5 class="card-header">PANEL ADMINISTRATIVO</h5>
				<div class="card-body">
					<form id="formulario_login" method="POST">
						<div class="form-group ver">
							<label class="p-1 m-1 text-white" for="usuario">USUARIO</label>
							<input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp" placeholder="USUARIO"><i class="fas fa-user"></i>
						</div>
						<div class="form-group ver">
							<label class="p-1 m-1 text-white" for="clave">CONTRASEÑA</label>
							<input type="password" class="form-control " name="clave" id="clave" placeholder="CONTRASEÑA"><i class="fas fa-eye ft" arial-hidden="true" id="pass"></i>
						</div>
						<br>
						<div class="form-group p-1 m-1">
							<div id="validar"></div>
						</div>
						<hr>
						<div class="form-group p-1 m-1">
							<button type="button" id="enviar" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 btn  p-2 m-2 float-right bto">INGRESAR</button>
						</div>
					</form>

				</div>
			</div>


		</div>
	</div>
</body>
<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="assets/js/login.js"></script>

</html>