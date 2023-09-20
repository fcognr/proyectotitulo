<?php 

$item = "id_u";
$valor = $_SESSION["id"];

$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor); 

$reservas = ControladorReservas::ctrMostrarReservasUsuario($valor);

$fechahoy = date("Y-m-d");
$vencidas = 0;
$vigentes = 0;

foreach ($reservas as $key => $value) {
	
	if($fechahoy >= $value["fecha_ingreso"]){

		++$vencidas;		
	
	}else{

		++$vigentes;

	}

}

#echo '<pre class="bg-white">'; print_r($reservas); echo '</pre>';

?>


<!--=====================================
Perfil usuario
======================================-->

<div class="infoPerfil container-fluid bg-white p-0 pb-5 mb-5">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-3 colIzqPerfil p-0 px-lg-3">
				
				<div class="headerPerfil pt-4">
					
					<a href="<?php echo $ruta; ?>salir" class="float-left lead text-white pt-1 px-3 mb-4">
						<h5><i class="fas fa-chevron-left"></i> Salir</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>	
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">
					
					<figure class="text-center imgPerfil">

						<?php if ($usuario["foto"] == ""): ?>

							<img src="<?php echo $servidor; ?>vistas/img/usuarios/default/default.jpg" class="img-fluid rounded-circle">

						<?php else: ?>
						
							<?php if($usuario["modo"] == "directo"): ?>

								<img src="<?php echo $usuario["foto"]; ?>" class="img-fluid rounded-circle">

							<?php endif ?>

						<?php endif ?>
							
					</figure>

					<div id="accordion">

						<div class="card">

							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									MIS RESERVAS
								</a>
							</div>

							<div id="collapseOne" class="collapse show" data-parent="#accordion">

								<ul class="card-body p-0">

									<li class="px-2" style="background:#FFFDF4"> <?php echo $vigentes; ?> Por vencerse</li>
									<li class="px-2 text-white" style="background:#CEC5B6"> <?php echo $vencidas; ?> vencidas</li>

								</ul>

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->	

								<?php if (!$reservas){

								    echo '<div class="d-lg-none d-flex py-2">Usted no tiene reservas realizadas</div>';

								}foreach ($reservas as $key => $value){

									$cabana = ControladorInfoCabanas::ctrMostrarHabitacion($value["id_cabanas"]);

									echo '<div class="d-lg-none d-flex py-2">
									
									<div class="p-2 flex-grow-1">

										<h5>'.$value["descripcion_reserva"].'</h5>
										<h5 class="small text-gray-dark">Del '.$value["fecha_ingreso"].' al '.$value["fecha_salida"].'</h5>

									</div>

									

								</div>';
								}

								?>

							</div>

						</div>

						<div class="card">

							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									MIS DATOS
								</a>
							</div>

							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body p-0">

									<ul class="list-group">
										
										<li class="list-group-item small"><?php echo $usuario["nombre"]; ?> <?php echo $usuario["apellido"]; ?></li>
										<li class="list-group-item small"><?php echo $usuario["email"]; ?></li>
										<li class="list-group-item small">
											<button class="btn btn-dark btn-sm">Cambiar Contraseña</button>
										</li>
										<li class="list-group-item small">
											<button class="btn btn-primary btn-lg">Cambiar Imagen</button>
										</li>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-9 colDerPerfil">

				<div class="row">

					<div class="col-6 d-none d-lg-block">
						
						<h4 class="float-left">Hola <?php echo $usuario["nombre"]; ?></h4>

					</div>

					<!--=====================================
					MERCADO PAGO
					======================================-->
					<div class="col-12">

						<?php if (isset($_COOKIE["codigoReserva"])): ?>

							<?php 

							$validarPagoReserva = false;

							$hoy = date("Y-m-d");

							if ($hoy >= $_COOKIE["fechaIngreso"] || $hoy >= $_COOKIE["fechaSalida"]) {

								echo '<div class="alert alert-danger">Lo sentimos, la fecha de reserva no puede ser igual o anterior al día de hoy. Inténtalo nuevamente.</div>';

								$validarPagoReserva = false;
							}else{

								$validarPagoReserva = true;
							}

							/*--=====================================
							VALIDACION DE CRUCE DE FECHAS
							======================================-*/

							$valor = $_COOKIE["idCabana"];


							$validarReserva = ControladorReservas::ctrMostrarReservas($valor);

							$opcion1 = array();
							$opcion2 = array();
							$opcion3 = array();

							if($validarReserva != 0){

								foreach ($validarReserva as $key => $value) {

									/* OPCION 1*/

									if($_COOKIE["fechaIngreso"] == $value["fecha_ingreso"]){
										array_push($opcion1, false);
									}else{
										array_push($opcion1, true);
									}
									
									/* OPCION 2*/

									if($_COOKIE["fechaIngreso"] > $value["fecha_ingreso"] && $_COOKIE["fechaIngreso"] < $value["fecha_salida"]){
										array_push($opcion2, false);
									}else{
										array_push($opcion2, true);
									}

									/* OPCION 3*/

									if($_COOKIE["fechaIngreso"] < $value["fecha_ingreso"] && $_COOKIE["fechaSalida"] > $value["fecha_ingreso"]){
										array_push($opcion3, false);
									}else{
										array_push($opcion3, true);
									}

									if($opcion1[$key] == false || $opcion2[$key] == false || $opcion3[$key] == false){

											$validarPagoReserva = false;

											echo 'Lo sentimos, las fechas de la reserva que habías seleccionado han sido ocupadas  
												<a href="'.$ruta.'" class="btn btn-danger btn-sm">vuelve a intentarlo </a>';

											break;	

									}else{

											$validarPagoReserva = true;

								}	 
							}

						}

					?>

					<?php if ($validarPagoReserva): ?>								
							

						<div class="card">

							<div class="card-header">

								<h4>Tienes una reserva pendiente por pagar:</h4>
								
							</div>

							<div class="card-body">

								<figure>
									<img src="<?php echo $_COOKIE["imgCabana"]; ?>" class="img-thumbnail w-50">
								</figure>
								
								<h4><strong><?php echo $_COOKIE["infoCabana"]; ?></strong></h4>

								<h6>Fecha de Check-in: <?php echo $_COOKIE["fechaIngreso"]; ?> 15:00 pm</h6>

								<h6>Fecha de Check-out: <?php echo $_COOKIE["fechaSalida"]; ?> 11:00 am</h6>

								<h3><strong>$ <?php echo number_format($_COOKIE["pagoReserva"]); ?></strong></h3>

							</div>
							
							<div class="card-footer d-flex">
								
								<figure>
									<img src="img/mercadopago.png" class="img-fluid w-50">
								</figure>

								<form action="<?php echo $ruta.'perfil'; ?>" method="POST" class="pt-3">
									<script 
									src="https://www.mercadopago.cl/integrations/v1/web-tokenize-checkout.js" 
									data-public-key="TEST-bbfc937d-fc04-406d-8144-c80d92ee6802" 
									data-transaction-amount="<?php echo $_COOKIE["pagoReserva"]; ?>"
									data-button-label="Pagar"
									data-summary-product-label="<?php echo $_COOKIE["infoCabana"]; ?> - Ingreso: <?php echo $_COOKIE["fechaIngreso"] ?> - Salida: <?php echo $_COOKIE["fechaSalida"]; ?>"
									data-summary-product="<?php echo $_COOKIE["pagoReserva"]; ?>">
									</script>
								</form>

							</div>


					</div>

				</div>

						<?php 

						if(isset($_REQUEST["token"])){
							$token = $_REQUEST["token"];
							$payment_method_id = $_REQUEST["payment_method_id"];
							$installments = $_REQUEST["installments"];
							$issuer_id = $_REQUEST["issuer_id"];

							MercadoPago\SDK::setAccessToken('TEST-4259654300663307-082823-9058dee278f34c0011e8045c6f496116-148612187');

							    $payment = new MercadoPago\Payment();
							    $payment->transaction_amount = $_COOKIE["pagoReserva"];
							    $payment->token = $token;
							    $payment->description = $_COOKIE["infoCabana"];
							    $payment->installments = $installments;
							    $payment->payment_method_id = $payment_method_id;
							    $payment->issuer_id = $issuer_id;
							    $payment->payer = array(
							        "email" => "junior@gmail.com"
							    );
							    $payment->save();
							    echo '<pre>'; print_r($payment); echo '</pre>';

							    if($payment->status == "approved"){

							    	$datos = array(
							            "id_cabanas" => $_COOKIE["idCabana"],
							            "id_usuario" => $usuario["id_u"],
							            "pago_reserva" => $_COOKIE["pagoReserva"],
							            "numero_transaccion" => $payment->id,
							            "codigo_reserva" => $_COOKIE["codigoReserva"],
							            "descripcion_reserva" => $_COOKIE["infoCabana"],
							            "fecha_ingreso" => $_COOKIE["fechaIngreso"],
							            "fecha_salida" => $_COOKIE["fechaSalida"]
							        );

							        $respuesta = ControladorReservas::ctrGuardarReserva($datos);

							        if($respuesta == "ok"){

							        	echo '<script>

							            document.cookie = "idCabana=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";
							            document.cookie = "imgCabana=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";
							            document.cookie = "infoCabana=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";
							            document.cookie = "pagoReserva=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";
							            document.cookie = "codigoReserva=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";
							            document.cookie = "fechaIngreso=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";
							            document.cookie = "fechaSalida=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";
							            document.cookie = "horasTinaja=; expires=Thu, 31 Jul 2000 00:00:00 UTC; path='.$ruta.';";

							            swal({
							                type:"success",
							                title: "¡CORRECTO!",
							                text: "¡Su reserva ha sido creada con éxito!",
							                showConfirmButton: true,
							                confirmButtonText: "Cerrar"
							            }).then(function(result){

							                if(result.value){
							                    history.back();
							                }
							            });

							            </script>';

							        }else{
							            echo '<h1>¡Algo salió mal!</h1>
							            <p>Ha ocurrido un error con el pago. Por favor vuelve a intentarlo.</p>';
							        

							    }
							}
						}
					?>

					<?php endif ?>

					<?php endif ?>

					</div>




					<div class="col-6 d-none d-lg-block">

					</div>

					<div class="col-12 mt-3">
						
						<table class="table table-striped">
					    <thead>
					      <tr>
					      	<th>#</th>
					        <th>Tipo de Cabaña</th>
					        <th>Fecha de Check-in</th>
					        <th>Fecha de Check-Out</th>
					      </tr>
					    </thead>
					    <tbody>
					      
						<?php if (!$reservas): ?>

						    <tr><td colspan="5">Usted no tiene reservas realizadas</td></tr>

						<?php else:

						    foreach ($reservas as $key => $value) {

						        $cabana = ControladorInfoCabanas::ctrMostrarHabitacion($value["id_cabanas"]);
						        #echo '<pre class="bg-white">'; print_r($cabana); echo '</pre>';



						        echo '<tr>
						            <td>'.($key+1).'</td>
						            <td class="text-uppercase">'.$value["descripcion_reserva"].'</td>
						            <td>'.$value["fecha_ingreso"].'</td>
						            <td>'.$value["fecha_salida"].'</td>
						        </tr>';

						    }

						endif;
						?>

					    </tbody>
					  </table>


					</div>

				</div>
			
			</div>

		</div>

	</div>

</div>