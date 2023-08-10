<?PHP

require_once('../../libraries/rutas.php');
require_once(rutaBase . 'php' . DS . 'libraries' . DS . 'validaciones.php');

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;

class conversacion extends Conversation
{

    protected $ArrayConversacion;
    protected $bEnviar;

    public function __construct()
    {
        $this->ArrayConversacion = [];
    }

    function getArrayConversacion()
    {
        return $this->ArrayConversacion;
    }

    // Tipo de documento que se enviara
    function setArrayConversacion($ArrayConversacion)
    {
        $this->ArrayConversacion[] = $ArrayConversacion;
    }

    function getBEnviar()
    {
        return $this->BEnviar;
    }

    // Tipo de documento que se enviara
    function setBEnviar($BEnviar)
    {
        $this->BEnviar = $BEnviar;
    }

    public function askAyuda()
    {
        date_default_timezone_set('America/Bogota');
        $horaActual = date('Y-m-d H:i');
        $this->setArrayConversacion(array('¡Hola! Soy un Bot, Bienvenido a Probarrancabermeja', 2, $horaActual));
        // $this->say('¡Hola! Soy Probarrancabermeja, Bienvenido a RVO');
        $this->setArrayConversacion(array($this->bot->getMessage()->getPayload()["message"], 1, $horaActual));
        $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
        if ($fp) {
            fwrite($fp, "----------------------NUEVA CONVERSACIÓN----------------------" . PHP_EOL);
            fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : ¡Hola! Soy un Bot, Bienvenido a RVO" . PHP_EOL);
            fwrite($fp, "[" . $horaActual . "] Cliente : " . $this->bot->getMessage()->getPayload()["message"] . PHP_EOL);
            fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : ¿En que estas interesado/a?" . PHP_EOL);
            fclose($fp);
        }
        $this->setArrayConversacion(array('¿En que estas interesado/a?', 2, $horaActual));
        $this->ask('¿En que estas interesado/a?', function ($answer) {
            date_default_timezone_set('America/Bogota');
            $horaActual = date('Y-m-d H:i');
            $interesado = $answer->getText();
            $this->setArrayConversacion(array($interesado, 1, $horaActual));
            $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
            if ($fp) {
                fwrite($fp, "[" . $horaActual . "] Cliente : " . $interesado . PHP_EOL);
                fclose($fp);
            }
            $this->askNombres();
        });
    }

    public function askNombres()
    {
        date_default_timezone_set('America/Bogota');
        $horaActual = date('Y-m-d H:i');
        $this->bot->typesAndWaits(3);
        $this->setArrayConversacion(array('Será un placer asistirte, ¿Cuál es tu nombre?', 2, $horaActual));
        $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
        if ($fp) {
            fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : Será un placer asistirte, ¿Cuál es tu nombre?" . PHP_EOL);
            fclose($fp);
        }
        $this->ask('Será un placer asistirte, ¿Cuál es tu nombre?', function ($answer) {
            date_default_timezone_set('America/Bogota');
            $horaActual = date('Y-m-d H:i');
            $nombres = $answer->getText();
            $this->setArrayConversacion(array($nombres, 1, $horaActual));
            $this->say('Hola ' . $nombres . ', yo me encargo de ponerte en contacto con un asesor para que responda tu consulta');
            $this->setArrayConversacion(array('Hola ' . $nombres . ', yo me encargo de ponerte en contacto con un asesor para que responda tu consulta', 2, $horaActual));
            $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
            if ($fp) {
                fwrite($fp, "[" . $horaActual . "] Cliente : " . $nombres . PHP_EOL);
                fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : Hola " . $nombres . ", yo me encargo de ponerte en contacto con un asesor para que responda tu consulta" . PHP_EOL);
                fclose($fp);
            }
            $this->askTelefono(true);
        });
    }

    public function askTelefono($bMensaje)
    {
        date_default_timezone_set('America/Bogota');
        $horaActual = date('Y-m-d H:i');
        $this->bot->typesAndWaits(3);
        if ($bMensaje) {
            $mensaje = '¿Podrías dejarme tu teléfono?';
            $this->setArrayConversacion(array('¿Podrías dejarme tu teléfono?', 2, $horaActual));
            $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
            if ($fp) {
                fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : ¿Podrías dejarme tu teléfono?" . PHP_EOL);
                fclose($fp);
            }
        } else {
            $mensaje = 'Necesitaría un teléfono valido para que podamos contactarte. Digita de nuevo el teléfono';
            $this->setArrayConversacion(array('Necesitaría un teléfono valido para que podamos contactarte. Digita de nuevo el teléfono', 2, $horaActual));
            $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
            if ($fp) {
                fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : Necesitaría un teléfono valido para que podamos contactarte. Digita de nuevo el teléfono" . PHP_EOL);
                fclose($fp);
            }
        }

        $this->ask($mensaje, function ($answer) {
            date_default_timezone_set('America/Bogota');
            $horaActual = date('Y-m-d H:i');
            $telefono = $answer->getText();
            $this->setArrayConversacion(array($telefono, 1, $horaActual));
            if (
                validar::patronnumeros($telefono)
            ) {
                $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
                if ($fp) {
                    fwrite($fp, "[" . $horaActual . "] Cliente : " . $telefono . PHP_EOL);
                    fclose($fp);
                }
                $this->askEmail(true);
            } else {
                $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
                if ($fp) {
                    fwrite($fp, "[" . $horaActual . "] Cliente : " . $telefono . PHP_EOL);
                    fclose($fp);
                }
                $this->askTelefono(false);
            }
        });
    }

    public function askEmail($bMensaje)
    {
        date_default_timezone_set('America/Bogota');
        $horaActual = date('Y-m-d H:i');
        $this->bot->typesAndWaits(3);
        if ($bMensaje) {
            $mensaje = '¿Podrías dejarme tu email?';
            $this->setArrayConversacion(array('¿Podrías dejarme tu email?', 2, $horaActual));
            $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
            if ($fp) {
                fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : ¿Podrías dejarme tu email?" . PHP_EOL);
                fclose($fp);
            }
        } else {
            $mensaje = 'Necesitaría un email valido para que podamos contactarte. Digita de nuevo el email';
            $this->setArrayConversacion(array('Necesitaría un email valido para que podamos contactarte. Digita de nuevo el email', 2, $horaActual));
            $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
            if ($fp) {
                fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : Necesitaría un email valido para que podamos contactarte. Digita de nuevo el email" . PHP_EOL);
                fclose($fp);
            }
        }

        $this->ask($mensaje, function ($answer) {
            date_default_timezone_set('America/Bogota');
            $horaActual = date('Y-m-d H:i');
            $email = $answer->getText();
            $this->setArrayConversacion(array($email, 1, $horaActual));
            if (
                validar::correo($email)
            ) {
                $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
                if ($fp) {
                    fwrite($fp, "[" . $horaActual . "] Cliente : " . $email . PHP_EOL);
                    fclose($fp);
                }
                $this->askConsultaAdicional();
            } else {
                $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
                if ($fp) {
                    fwrite($fp, "[" . $horaActual . "] Cliente : " . $email . PHP_EOL);
                    fclose($fp);
                }
                $this->askEmail(false);
            }
        });
    }

    public function askConsultaAdicional()
    {
        date_default_timezone_set('America/Bogota');
        $horaActual = date('Y-m-d H:i');
        $this->bot->typesAndWaits(3);
        $this->setArrayConversacion(array('¿Quieres dejarme alguna consulta adicional?', 2, $horaActual));
        $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
        if ($fp) {
            fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : ¿Quieres dejarme alguna consulta adicional?" . PHP_EOL);
            fclose($fp);
        }
        $this->ask('¿Quieres dejarme alguna consulta adicional?', function ($answer) {
            date_default_timezone_set('America/Bogota');
            $horaActual = date('Y-m-d H:i');
            $consultaAdicional = $answer->getText();
            $this->setArrayConversacion(array($consultaAdicional, 1, $horaActual));
            $this->bot->typesAndWaits(3);
            $this->say('Con la información que me has pasado un asesor se comunicará contigo a la brevedad. Muchas gracias por comunicarte!');
            $this->setArrayConversacion(array('Con la información que me has pasado un asesor se comunicará contigo a la brevedad. Muchas gracias por comunicarte!', 2, $horaActual));
            $fp = fopen('logs/' . $this->bot->getUser()->getId() . '.txt', 'a');
            if ($fp) {
                fwrite($fp, "[" . $horaActual . "] Cliente : " . $consultaAdicional . PHP_EOL);
                fwrite($fp, "[" . $horaActual . "] Probarrancabermeja : Con la información que me has pasado un asesor se comunicará contigo a la brevedad. Muchas gracias por comunicarte!" . PHP_EOL);
                fclose($fp);
            }
            $this->enviar_correo();
        });
    }

    public function enviar_correo()
    {
        require_once(rutaBase . 'php' . DS . 'libraries' . DS . 'email.php');
        $array = $this->getArrayConversacion();
        $arrayRemitentes[0]['correo'] = "probarrancabermeja.comunica100@gmail.com";
        $arrayRemitentes[0]['contrasenia'] = "probarrancabermejacomunica100";
        $arrayRemitentes[0]['refreshToken'] = "1//01oU-a3lCN3JyCgYIARAAGAESNwF-L9IrmLsU8vHi46UxJM1oV2TPpdwaeL2a2eZ39MVArmpkSi_sQLV4c3-uVAh6jSK1o-I4XpA";

        $arrayDestinatarios[] = "probarrancabermeja.comunica100@gmail.com";

        $html = '<html>
        <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">           
        </head>
        <body>
        <div style="text-align: center;font-size: 20px;color: rgb(20, 82, 127);font-weight: bold;margin-bottom: 20px;">Hola, ¡Tienes un Nuevo Cliente en Probarrancabermeja!</div>
        <table style="width:50%;border-collapse: collapse;margin: 0 auto;"><thead></thead><tbody>';

        for ($i = 0; $i < count($array); $i++) {
            $mensajes = $array[$i];
            $mensaje = $mensajes[0];
            $tipo = $mensajes[1];
            $tiempo = $mensajes[2];

            if ($tipo == 1) {
                $mensajetitulo = "Cliente";
            } else if ($tipo == 2) {
                $mensajetitulo = "Probarrancabermeja";
            }

            $html .= "<tr><td><span style='font-weight: bold;'>[$tiempo] $mensajetitulo</span> : $mensaje</td></tr>";
        }

        $html .= '
        </tbody>
        </table>           
        </body>
        </html>';
        $envio = email::enviar($arrayRemitentes, $arrayDestinatarios, "ChatBot", $html, array(), array(), array());
    }

    public function run()
    {
        $this->askAyuda();
    }
}
