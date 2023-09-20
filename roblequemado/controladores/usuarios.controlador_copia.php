<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class ControladorUsuarios{

	public function ctrRegistroUsuario(){

		if(isset($_POST["registroNombre"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroApellido"]) &&
			   preg_match('/^[0-9]+$/', $_POST["registroTelefono"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
			    preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])
				){

				$encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$encriptarEmail = md5($_POST["registroEmail"]);

				$tabla = "usuarios";

				$datos = array( "nombre" => $_POST["registroNombre"],
								"apellido" => $_POST["registroApellido"],
								"password" => $encriptarPassword,
								"email"=> $_POST["registroEmail"],
								"telefono" => $_POST["registroTelefono"],
								"modo" => "directo",
								"verificacion" => 0,
								"email_encriptado" => $encriptarEmail,
								"foto" => "");

				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

				if($respuesta == "ok"){

					/*--=====================================
						VERIFICACION DE EMAIL
					======================================-*/

					date_default_timezone_set("America/Santiago");

					$ruta = ControladorRuta::ctrRuta();

					$mail = new PHPMailer;

					$mail->CharSet = 'UTF-8';

					$mail->isMail();

					$mail->setFrom('fgodoyr93@gmail.com','Cabañas Roble Quemado');

					$mail->addReplyTo('fgodoyr93@gmail.com','Cabañas Roble Quemado');

					$mail->Subject = "Verifique su dirección de correo electrónico";

					$mail->addAddress($_POST["registroEmail"]);

					$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

						<center>
							
							<img style="padding:20px; width:10%" src="https://www.crq.cl/wp-content/uploads/2021/03/LogoCRQblanco.png">

						</center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
							
							<center>

								<img style="padding:20px; width:15%" src="https://us.123rf.com/450wm/telmanbagirov/telmanbagirov1611/telmanbagirov161100327/67912992-icono-de-sobre-plano-icono-de-correo-electr%C3%B3nico-abierto-transparente-sobre-fondo-blanco.jpg">

								<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

								<hr style="border:1px solid #ccc; width:80%">

								<h4 style="font-weight:100; color:#999; padding:0 20px">Para usar su cuenta, debe confirmar su dirección de correo electrónico</h4>

								<a href="'.$ruta.$encriptarPassword.'" target="_blank" style="text-decoration:none">
									
									<div style="line-height:60px; background:#0aa; width:60%; color:white">Verificar correo electrónico</div>

								</a>

								<br>

								<hr style="border:1px solid #ccc; width:80%">

								<h5 style="font-weight:100; color:#999">Si usted no se registró, puede ignorar este correo y la cuenta será eliminada.</h5>


							</center>


						</div>

					</div>');

					$envio = $mail->Send();

					if(!$envio){

						echo'<script>

							swal({
									type:"error",
								  	title: "¡ERROR!",
								  	text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["registroEmail"].$mail->ErrorInfo.', por favor inténtelo nuevamente",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

					}else{


						echo'<script>

							swal({
									type:"success",
								  	title: "¡SU CUENTA HA SIDO CREADA!",
								  	text: "¡Revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico para verificar la cuenta!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

					}

				}

			}else{

				echo'<script>

					swal({
							type:"error",
						  	title: "¡CORREGIR!",
						  	text: "¡No se permiten caracteres especiales!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    history.back();
							  } 
					});

				</script>';


			}

		}

	}


	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $item, $valor);

		return $respuesta;

	}




	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

		
	}


}