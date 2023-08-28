<?php
session_start();
include_once 'conexion.php';

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if (empty($usuario) || empty($clave)) {
        echo "
        <div class='alert alert-info text-center alert-dismissible fade show' role='alert'>
        <strong>Por favor, complete ambos campos.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
        exit();
    }

    $consulta = mysqli_prepare($con, "SELECT * FROM usuarios WHERE nombre_usuario = ?");
    mysqli_stmt_bind_param($consulta, "s", $usuario);
    mysqli_stmt_execute($consulta);
    $result = mysqli_stmt_get_result($consulta);
    mysqli_stmt_close($consulta);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($clave, $row['clave_usuario'])) {
            $_SESSION['clave'] = $clave;
            echo 1;
        } else {
            echo "
            <div class='alert alert-info text-center alert-dismissible fade show' role='alert'>
            <strong>Lo sentimos! Sus datos son incorrectos.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
        }
    } else {
        echo "
        <div class='alert alert-info text-center alert-dismissible fade show' role='alert'>
        <strong>Lo sentimos! Sus datos son incorrectos.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
mysqli_close($con);
?>
