<?php
session_start();
include_once 'conexion.php';
// Obtengo los datos cargados en el formulario de login.

if (isset($_POST['usuario'])) {


    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if (empty($usuario)) {
        echo "
    <div class='alert alert-info text-center alert-dismissible fade show' role='alert'>
    <strong>Lo sentimos! El campo usuario esta vacio.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
        return false;
    }
    if (empty($clave)) {
        echo "
    <div class='alert alert-info text-center alert-dismissible fade show' role='alert'>
    <strong>Lo sentimos! El campo contraseña esta vacio.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
        return false;
    }
    $consulta = mysqli_prepare($con, "SELECT * FROM usuarios WHERE nombre_usuario = ? AND clave_usuario = ? ");
    mysqli_stmt_bind_param($consulta, "ss", $usuario, $clave);
    mysqli_stmt_execute($consulta);
    $result = mysqli_stmt_get_result($consulta);
    mysqli_stmt_close($consulta);


    if (mysqli_num_rows($result) > 0) {
        // Guardo en la sesión del usuario.
        $_SESSION['clave'] = $clave;
        if (isset($_SESSION['clave'])) {
            echo 1;
        } else {
            echo "";
        }
    } else {
        echo "
    <div class='alert alert-info text-center alert-dismissible fade show' role='alert'>
    <strong>Lo sentimos! sus datos son incorrectos.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
        return false;
    }
}
mysqli_close($con);
