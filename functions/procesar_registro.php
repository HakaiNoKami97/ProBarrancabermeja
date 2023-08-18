<?php
session_start();
include_once 'conexion.php';

    // Obtener datos del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Validación de usuario existente
    $consulta_usuario_existente = mysqli_prepare($con, "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = '$usuario'");
    mysqli_stmt_execute($consulta_usuario_existente);
    mysqli_stmt_store_result($consulta_usuario_existente);

    if ($consulta_usuario_existente === $usuario) {
        echo "El nombre de usuario ya está en uso.";
        exit();
    }else{
        // Insertar datos en la base de datos
        $consulta = mysqli_prepare($con, "INSERT INTO usuarios (nombre_usuario, clave_usuario) VALUES ('$usuario', '$clave')");
        $registro_exitoso = mysqli_stmt_execute($consulta);
        mysqli_stmt_close($consulta);
    
        if ($registro_exitoso) {
            header("Location: https://probarrancabermeja.org/login");
            exit();
        } else {
            echo "Error al registrar el usuario.";
        }        
    }
    mysqli_close($con);

?>
