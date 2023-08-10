$(document).ready(function () {
    $('#enviar').click(function () {
        $cadena = "usuario=" + $('#usuario').val() + "clave=" + $('#clave').val();
                $.ajax({
                    type: "POST",
                    url: "functions/iniciarSesion.php",
                    data: $('#formulario_login').serialize(),
                    success: function (resultado) {
                        if (resultado == 1) {
                            window.location = "generarNoticia.php"
                        } else {
                            $('#validar').html(resultado);
                        }
                    }
                });
})

    //funcion para mostrar contraseña
    $('#pass').click(function () {
        var input_clave = document.getElementById('clave');
        if (input_clave.type == "password") {
            input_clave.type = "text";
        } else {
            input_clave.type = "password";
        }
    })
    

})



