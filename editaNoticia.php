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
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/generadorNoticias.css">
    <link href="assets/img/favicon.png" rel="icon">
    <title>Editor de Noticias</title>

</head>

<body>
    <!-- NAVIGATION -->
    <nav class="navbar  sticky-top " style="height:130px;">
        <div class="row col-lg-12">
            <label class="navbar-brand alert text-white font-weight-bold col-lg-12 col-md-12 text-center">EDITOR DE NOTCIAS PRO BARRANACBERMEJA</label>
        </div>
    </nav>
    <br>
    <?php $cdo = $_GET['cdo']; ?>
    <?php $consultaeditar = mysqli_query($con, "SELECT * FROM noticias WHERE id_noticia = $cdo"); ?>
    <?php foreach ($consultaeditar as $editar) : ?>

        <div class="container">
            <div class="row justify-content-center">
                <form class="col-md-11 shadow p-3 mb-5 bg-white rounded formulario-noticias" action="functions/enviarupdate.php" method="post" enctype="multipart/form-data">

                    <div class="form-group text-center">
                        <label class="text-center">EDITAR DE NOTICIAS</label> <br>
                        <label for=""><?php echo "$editar[titulo_noticia]" ?></label>
                    </div>
                    <hr>
                    <div class="col-sm-12 col-md-3">
                        <input type="text" class="form-control d-none" name="codigonoticia" id="codigonoticia" <?php echo "value='$editar[id_noticia]'"; ?>>
                    </div>

                    <div class="form-row mt-3 from-group p-2 m-2">
                        <div class="col-sm-12 col-md-3">
                            <label for="fecha">FECHA DE PUBLICACION</label>
                            <input type="date" class="form-control" name="edfecha" id="edfecha" <?php echo "value='$editar[fecha_noticia]'" ?>>
                        </div>

                        <div class="col-sm-12 col-md-3">
                            <label for="autor">AUTOR DE LA NOTICIA</label>
                            <input type="text" class="form-control" name="edautor" id="edautor" <?php echo "value='$editar[autor_noticia]'"; ?>>
                        </div>

                        <div class="col-sm-12 col-md-3">
                            <label for="titulo">TITULO DE LA NOTICIA</label>
                            <input type="text" class="form-control" name="edtitulo" id="edtitulo" <?php echo "value='$editar[titulo_noticia]'"; ?>>
                        </div>
                        <div class="col-sm-12 col-md-3">
                        <label for="titulo">CLASIFICACION DE LA NOTICIA</label>
                        <select class="custom-select" id="clasificacion" name="clasificacion" <?php echo "value='$editar[clasificacion]'"; ?>  >
                            <option value="GENERAL">GENERAL</option>
                            <option value="INVERSION">INVERSIÓN</option>
                            <option value="EXPORTACION">EXPORTACIÓN</option>
                        </select>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group p-2 m-2">
                        <span class="btn btn-primary btn-file">
                            SELECCIONA UNA IMAGEN PARA LA PORTADA DE LA NOTICIA:<input type="file" class="form-control-file" name="edimagen" id="edimagen">
                        </span>
                        <img src="<?php echo "functions/$editar[img_noticia]" ?>" class="col-md-5" alt="" height="auto" width="150">
                    </div>
                    <hr>
                    <div class="form-group p-2 m-2">
                        <label for="noticia">DESCRIPCIÓN DE LA NOTICIA</label>
                        <textarea class="form-control" name="eddescripcion" id="eddescripcion" cols="100%" rows="10" max-rows="13" min-rows="8"> <?php echo " $editar[descripcion_noticia]" ?> </textarea>
                    </div>
                    <hr>


                    <div class="form-group p-2 m-2">
                        <button name="editargenerar" id="editargenerar" type="submit" class="btn btn-primary">ACTUALIZAR NOTICIA</button>
                        <a href="verNoticias.php" onclick="window.close()" type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                    </div>

                </form>

            </div>
        </div>
    <?php endforeach ?>

    <script>
        function valores() {

            var codigo = document.getElementById('codigonoticia').value;
            var fecha = document.getElementById('edfecha').value;
            var autor = document.getElementById('edautor').value;
            var titulo = document.getElementById('edtitulo').value;
            var img = document.getElementById('edimagen').value;
            var descipcion = document.getElementById('eddescripcion').value;

            alert(codigo);
            alert(fecha);
            alert(autor);
            alert(titulo);
            alert(img);
            alert(descipcion);
        }
    </script>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!--libreria para editar texto-->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('eddescripcion');
    </script>
</body>

</html>