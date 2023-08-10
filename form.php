<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>GENERADOR DE NOTICIAS</title>
</head>

<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>

<body>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-10 shadow p-3 mb-5 bg-white rounded" action="functions/guardar_noticia.php" method="POST" enctype="multipart/form-data">

                <div class="form-group text-center">
                    <label class="text-center">GENERADOR DE NOTICIAS PRO-BARRANCABERMEJA</label>
                </div>

                <div class="form-row mt-2 from-group p-2 m-2">
                    <div class="col-sm-12 col-md-6">
                        <label for="fecha">FECHA DE LA NOTICIA</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="">
                    </div>

                    <div class="col-sm-12 col-md-6 ">
                        <label for="autor">AUTOR DE LA NOTICIA</label>
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="">

                    </div>
                </div>


                <div class="form-group p-2 m-2">
                    <label for="titulo">TIUTLO DE LA NOTICIA</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="">

                </div>
                <div class="form-group p-2 m-2">

                    <span class="btn btn-primary btn-file">
                        SELCCIONA UNA IMAGEN PARA LA NOTICIA.....<input type="file" class="form-control-file" name="imagen" id="imagen">
                    </span>

                </div>
                <div class="form-group p-2 m-2">
                    <label for="noticia">DESCIPCION DE LA NOTICIA</label>
                    <textarea class="form-control" name="descipcion" id="descipcion" cols="100%" rows="10" max-rows="13" min-rows="8"></textarea>
                </div>

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
    <!--libreria para editar texto-->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('descipcion');
    </script>

</body>

</html>