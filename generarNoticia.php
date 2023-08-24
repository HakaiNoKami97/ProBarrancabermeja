<?php
    require_once 'functions/conexion.php';
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
    <link rel="stylesheet" href="assets/css/generadorNoticias.css">
    <link href="assets/img/favicon.png" rel="icon">
    <title>GENERADOR DE NOTICIAS</title>
</head>

<body>
    <!-- NAVIGATION -->
    <nav class="navbar  sticky-top " style="height:130px;">
        <div class="row col-lg-12">
            <label class="navbar-brand alert text-white font-weight-bold col-lg-12 col-md-12 text-center">GENERADOR DE NOTCIAS PROBARRANACBERMEJA</label>
        </div>
        <div class="row justify-content-center col-lg-12">
            <a href="verNoticias.php" target="__black" class="btn btn-primary" type="button"> EDITAR NOTICIAS</a>
            <a href="view_miembros.php" target="__black" class="btn btn-primary" type="button"> EDITAR MIEMBROS</a>
            <a href="functions/destruirSesion.php" class="btn btn-danger" button="">CERRAR SESION </a>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-11 shadow p-3 mb-5 bg-white rounded formulario-noticias" action="functions/guardar_noticia.php" method="POST" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <label class="text-center">GENERADOR DE NOTICIAS PRO-BARRANCABERMEJA</label>
                </div>
                <hr>
                <div class="form-row mt-3 from-group p-2 m-2">
                    <div class="col-sm-12 col-md-3">
                        <label for="fecha">FECHA DE PUBLICACION</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="" required>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <label for="autor">AUTOR DE LA NOTICIA</label>
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="" required>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <label for="titulo">TIUTLO DE LA NOTICIA</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="" required>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <label for="titulo">CLASIFICACION DE LA NOTICIA</label>
                        <select class="custom-select" id="clasificacion" name="clasificacion">
                            <option class="d-none" selected></option>
                            <option value="GENERAL">GENERAL</option>
                            <option value="INVERSION">INVERSIÓN</option>
                            <option value="EXPORTACION">EXPORTACIÓN</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group p-2 m-2">
                    <span class="btn btn-primary btn-file">
                        SELECCIONA UNA IMAGEN PARA LA PORTADA DE LA NOTICIA:<input type="file" class="form-control-file" name="imagen" id="imagen" required>
                    </span>
                    <img id="photo" class="photo" width="300px" style="margin-left:10%; margin-top:2%;">
                </div>
                <hr>
                <div class="form-group p-2 m-2">
                    <label for="noticia">DESCRIPCION DE LA NOTICIA</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="100%" rows="10" max-rows="13" min-rows="8" required></textarea>
                </div>
                <hr>
                <div class="form-group p-2 m-2">
                    <button name="generar" id="generar" type="submit" class="btn btn-primary">Generar Noticia</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!--libreria para editar texto
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    -->
    <script src="plugins/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('descripcion');
    </script>
    <script>
        const photo = document.querySelector('#photo');
        const camera = document.querySelector('#imagen');
        camera.addEventListener('change', function(e) {
             photo.src = URL.createObjectURL(e.target.files[0]);
        });
    </script>
</body>
</html>