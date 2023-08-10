<?php
require_once('../libraries/rutas.php');
require_once(rutaBase . 'php' . DS . 'vendor' . DS . 'autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

class email
{
	public static function enviar($arrayRemitentes, $arrayDestinatarios, $asunto, $mensaje, $arrayAdjuntos, $arrayDestinatariosOcultos = array(), $arrayNombreAdjuntos = array())
	{
		require_once('email_smtp.php');
		$mail = new PHPMailer();
		$envioExitoso = false;
		$dominiosDesconocidos = array();
		$remitentesExitosos = "";
		$remitentesFallidos = "";
		$remitentesFallidosInfo = "";
		$remitentesFallidosDebug = "";

		try {
			// print_r($arrayRemitentes);exit;
			for ($i = 0; $i < count($arrayRemitentes); $i++) {
				$dominio = explode('@', $arrayRemitentes[$i]['correo'])[1];
				$proveedor = email_smtp::proveedor($dominio);

				//si el proveedor no esta configurado
				if ($proveedor == false) {
					$dominiosDesconocidos[] = $dominio;
				} else {
					$smtp = email_smtp::smtp($proveedor);

					//Server settings
					$mail->CharSet = "UTF-8";
					$mail->SMTPDebug = SMTP::DEBUG_SERVER;
					$debug = '';
					$mail->Debugoutput = function ($str, $level)  use (&$debug) {
						$debug .= "$level: $str\n";
					};

					$mail->isSMTP();
					$mail->SMTPAuth = true;

					$mail->Host = $smtp['host'];

					// Realizamos el envio por medio de OAuth2 en caso de ser gmail
					if ($smtp['host'] == 'smtp.gmail.com') {
						//Set AuthType to use XOAUTH2
						$mail->AuthType = 'XOAUTH2';

						$clientId = '836946795521-p9a1vuo3hdph50t5a50guh42sgeqkheo.apps.googleusercontent.com';
						$clientSecret = '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';

						// Obtener el token del correo del cliente
						$refreshToken = '';
						$provider = new Google(
							[
								'clientId' => $clientId,
								'clientSecret' => $clientSecret,
							]
						);
						//Pass the OAuth provider instance to PHPMailer
						$mail->setOAuth(
							new OAuth(
								[
									'provider' => $provider,
									'clientId' => $clientId,
									'clientSecret' => $clientSecret,
									'refreshToken' => $arrayRemitentes[$i]['refreshToken'],
									'userName' => $arrayRemitentes[$i]['correo'],
								]
							)
						);

						$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
					} else {
						$mail->Username = $arrayRemitentes[$i]['correo'];
						$mail->Password = $arrayRemitentes[$i]['contrasenia'];
						$mail->SMTPSecure = $smtp['secure'];
					}

					$mail->Port = $smtp['port'];

					$mail->setFrom($arrayRemitentes[$i]['correo']);

					//Recipients
					foreach ($arrayDestinatarios as $destinatario) {
						$mail->addAddress($destinatario);
					}

					//recipients hidden
					if (count($arrayDestinatariosOcultos) > 0) {
						foreach ($arrayDestinatariosOcultos as $destinatarioOculto) {
							$mail->addBCC($destinatarioOculto);
						}
					}

					//Attachments
					for ($j = 0; $j < count($arrayAdjuntos); $j++) {
						if (is_array($arrayAdjuntos[$j])) {
							// print_r($arrayAdjuntos[$j]);exit;
							$mail->AddStringAttachment(base64_decode($arrayAdjuntos[$j]['base64']), $arrayAdjuntos[$j]['name'], 'base64', $arrayAdjuntos[$j]['mime']);
						} else {
							if (count($arrayNombreAdjuntos) > 0) {
								$mail->addAttachment($arrayAdjuntos[$j], $arrayNombreAdjuntos[$j]);
							} else {
								$mail->addAttachment($arrayAdjuntos[$j]);
							}
						}
					}

					//Content
					$mail->isHTML(true);
					$mail->Subject = $asunto;
					//incrustar imagen para cuerpo de mensaje(no confundir con Adjuntar)
					//$mail->AddEmbeddedImage('../../img/email/semana_santa_rvo.jpeg', 'imagen');
					$mail->Body    = $mensaje;
					//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if ($mail->send()) {
						$remitentesExitosos .= $arrayRemitentes[$i]['correo'] . ",";
						$envioExitoso = true;
						break;
					} else {
						//$remitentesFallidosInfo[$arrayRemitentes[$i]['correo']] = $debug;
						$remitentesFallidos .= $arrayRemitentes[$i]['correo'] . ",";
						$remitentesFallidosInfo .= $arrayRemitentes[$i]['correo'] . ": \n" . $debug . "\n";
						$remitentesFallidosDebug .= $debug;
					}
				}
			}

			if ($envioExitoso  == true) {
				$remitentesExitosos = trim($remitentesExitosos, ",");
				$arrayRespuesta = array(
					'status' => '1',
					'remitentesExitosos' => $remitentesExitosos,
					'remitentesFallidos' => $remitentesFallidos,
					'dominiosFaltantes' => $dominiosDesconocidos
				);
			} else {
				$arrayRespuesta = array(
					'status' => '0',
					'remitentesFallidos' => $remitentesFallidosInfo,
					'dominiosFaltantes' => $dominiosDesconocidos,
					'debug' => $remitentesFallidosDebug
				);
			}

			//si hay algun remitente fallido
			if ($remitentesFallidos != "" && $remitentesFallidos != ",") {
				$remitentesFallidos = trim($remitentesFallidos, ",");
			}

			return $arrayRespuesta;
		} catch (Exception $e) {
			return $e;
		}
	}
}
