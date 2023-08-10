<?php

class modelContacto
{
    public static function sendFormContacto($empresa, $nombre, $correo, $telefono, $mensaje)
    {
        require_once(rutaBase . 'php' . DS . 'libraries' . DS . 'email.php');
        $arrayRemitentes[0]['correo'] = "probarrancabermeja.comunica100@gmail.com";
        $arrayRemitentes[0]['contrasenia'] = "probarrancabermejacomunica100";
        $arrayRemitentes[0]['refreshToken'] = "1//01oU-a3lCN3JyCgYIARAAGAESNwF-L9IrmLsU8vHi46UxJM1oV2TPpdwaeL2a2eZ39MVArmpkSi_sQLV4c3-uVAh6jSK1o-I4XpA";

        $arrayDestinatarios[] = "probarrancabermeja.comunica100@gmail.com";

        $html = '
        <html>
            <head>
                <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">           
            </head>
            <body>
                <div>
                    <p><strong>Nombre: </strong>' . $empresa . '</p>
                    <p><strong>Empresa: </strong>' . $nombre . '</p>
                    <p><strong>Correo Electrónico: </strong>' . $correo . '</p>
                    <p><strong>Teléfono: </strong>' . $telefono . '</p>
                    <p><strong>Mensaje: </strong>' . $mensaje . '</p>
                </div>                            
            </body>
        </html>';

        $envio = email::enviar($arrayRemitentes, $arrayDestinatarios, "Formulario de Contacto", $html, array(), array(), array());
        return json_encode($envio);
    }

    public static function sendFormContactanos($nombre, $correo, $asunto, $mensaje)
    {
        require_once(rutaBase . 'php' . DS . 'libraries' . DS . 'email.php');
        $arrayRemitentes[0]['correo'] = "probarrancabermeja.comunica100@gmail.com";
        $arrayRemitentes[0]['contrasenia'] = "probarrancabermejacomunica100";
        $arrayRemitentes[0]['refreshToken'] = "1//01oU-a3lCN3JyCgYIARAAGAESNwF-L9IrmLsU8vHi46UxJM1oV2TPpdwaeL2a2eZ39MVArmpkSi_sQLV4c3-uVAh6jSK1o-I4XpA";

        $arrayDestinatarios[] = "probarrancabermeja.comunica100@gmail.com";

        $html = '
        <html>
            <head>
                <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">           
            </head>
            <body>
                <div>
                    <p><strong>Nombre: </strong>' . $nombre . '</p>
                    <p><strong>Correo Electrónico: </strong>' . $correo . '</p>
                    <p><strong>Asunto: </strong>' . $asunto . '</p>
                    <p><strong>Mensaje: </strong>' . $mensaje . '</p>
                </div>                            
            </body>
        </html>';

        $envio = email::enviar($arrayRemitentes, $arrayDestinatarios, "Formulario de Contactanos", $html, array(), array(), array());
        return json_encode($envio);
    }

    public static function sendFormExportaciones($empresa, $nombre, $correo, $telefono, $mensaje)
    {
        require_once(rutaBase . 'php' . DS . 'libraries' . DS . 'email.php');
        $arrayRemitentes[0]['correo'] = "probarrancabermeja.comunica100@gmail.com";
        $arrayRemitentes[0]['contrasenia'] = "probarrancabermejacomunica100";
        $arrayRemitentes[0]['refreshToken'] = "1//01oU-a3lCN3JyCgYIARAAGAESNwF-L9IrmLsU8vHi46UxJM1oV2TPpdwaeL2a2eZ39MVArmpkSi_sQLV4c3-uVAh6jSK1o-I4XpA";

        $arrayDestinatarios[] = "probarrancabermeja.comunica100@gmail.com";

        $html = '
        <html>
            <head>
                <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">           
            </head>
            <body>
                <div>
                    <p><strong>Nombre: </strong>' . $empresa . '</p>
                    <p><strong>Empresa: </strong>' . $nombre . '</p>
                    <p><strong>Correo Electrónico: </strong>' . $correo . '</p>
                    <p><strong>Teléfono: </strong>' . $telefono . '</p>
                </div>                            
            </body>
        </html>';

        $envio = email::enviar($arrayRemitentes, $arrayDestinatarios, "Formulario de Exportaciones", $html, array(), array(), array());
        return json_encode($envio);
    }
}
