<?php require_once 'functions/conexion.php';
session_start();
$var1 =  $_SESSION['clave'];
$var1;
if ($var1 == NULL || $var1 = '') {
    header('location:functions/destruirSesion.php');
    die();
}
?>

<!doctype html>
<html lang="es-CO">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymou">
    <link rel="stylesheet" href="assets/css/verNoticias.css">
    <link href="assets/img/favicon.png" rel="icon">
    <title>Listado General de Noticias</title>

</head>

<body>
    <!-- NAVIGATION -->
    <header>
        <nav class="navbar navbar-expand-lg sticky-top ">
            <div class="row col-lg-12">
                <label class="alert text-white font-weight-bold col-lg-12 col-md-12 text-center">LISTADO GENERAL DE NOTCIAS PRO BARRANACBERMEJA</label>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <?php $consulta = mysqli_query($con, "SELECT * FROM noticias ORDER BY fecha_noticia DESC "); ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($consulta as $rnoticias) : ?>
                <?php $codigo = $rnoticias['id_noticia'] ?>
                <?php $foto = $rnoticias['img_noticia'] ?>
                <div class="card m-2" style="width: 18rem;">
                    <img class="" style="" width="100%" height="200" src="<?php echo " functions/$foto" ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo "$rnoticias[fecha_noticia]" ?></h5>
                        <p class="card-text"><?php echo $rnoticias['titulo_noticia']; ?></p>
                        <hr>
                        <?php echo "<a href='functions/eliminar_noticia.php?codigo=$codigo ' title='Eliminar'class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>"; ?>
                        <?php echo "<a href='editaNoticia.php?cdo=$codigo'  target='_blank' title='Editar' class='btn btn-warning'><i class='fas fa-edit text-white'></i></a>"; ?>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>