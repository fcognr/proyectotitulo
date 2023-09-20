<!--=====================================
CAPTURA DE DATOS DE MERCADO PAGO
======================================-->



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
					
					<a href="<?php echo $ruta; ?>reservas" class="float-left lead text-white pt-1 px-3 mb-4">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>	
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">
					
					<figure class="text-center">
							
						<img src="img/user.png" class="img-fluid w-50">

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

									<li class="px-2" style="background:#FFFDF4"> 1 Por vencerse</li>
									<li class="px-2 text-white" style="background:#CEC5B6"> 5 vencidas</li>

								</ul>

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->	

								<div class="d-lg-none d-flex py-2">
									
									<div class="p-2 flex-grow-1">

										<h5>Cabaña 2 personas</h5>
										<h5 class="small text-gray-dark">Del 30.08.2022 al 03.09.2022</h5>

									</div>

									<div class="p-2">

										<button type="button" class="btn btn-dark btn-sm text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning btn-sm text-white"><i class="fas fa-eye"></i></button>

									</div>

								</div>

								<hr class="my-0">

								<div class="d-lg-none d-flex py-2">
									
									<div class="p-2 flex-grow-1">

										<h5>Cabaña 6 personas</h5>
										<h5 class="small text-gray-dark">Del 30.08.2022 al 03.09.2022</h5>

									</div>

									<div class="p-2">

										<button type="button" class="btn btn-dark btn-sm text-white"><i class="fas fa-pencil-alt"></i></button>
										<button type="button" class="btn btn-warning btn-sm text-white"><i class="fas fa-eye"></i></button>

									</div>

								</div>

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
										
										<li class="list-group-item small">Juan Garrido</li>
										<li class="list-group-item small">juangarrido@gmail.com</li>
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
						
						<h4 class="float-left">Hola Juan</h4>

						<h4 class="float-right"> | <span class="colorTitulos">Salir</span></h4>

					</div>

					<!--=====================================
					MERCADO PAGO
					======================================-->

					<div class="col-12">

					<?php if(isset($_COOKIE["codigoReserva"])): ?>

						<?php 

						$validarPagoReserva = false;

						$hoy = date("Y-m-d");

						if($hoy >= $_COOKIE["fechaIngreso"] || $hoy >= $_COOKIE["fechaSalida"]){

							echo '<div class="aler alert-danger">Lo sentimos, las fechas de reserva deben ser distintas al día de hoy. Vuelve a intentarlo.</div>';

							$validarPagoReserva = false;
						}else{

							$validarPagoReserva = true;
						}

						/*--=====================================
						VALIDAR CRUCE DE FECHAS
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

								if($_COOKIE["fechaIngreso"] > $value["fecha_ingreso"] && $_COOKIE["fechaIngreso"] < $_COOKIE["fecha_salida"] ){
									array_push($opcion2, false);
								}else{
									array_push($opcion2, true);
								}

								/* OPCION 3*/

								if($_COOKIE["fechaIngreso"] < $value["fecha_ingreso"] && $_COOKIE["fechaSalida"] > $_COOKIE["fecha_ingreso"] ){
									array_push($opcion3, false);
								}else{
									array_push($opcion3, true);
								}

								if($opcion01[$key] == false || $opcion02[$key] == false || $opcion03[$key] == false){

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
					<div>
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

							    #echo $payment->status;

							    if($payment->status == "approved"){

							        $datos = array(
							            "id_cabanas" => $_COOKIE["idCabana"],
							            "id_usuario" => 1,
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
					        <th>Comentarios</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>1</td>
					        <td>Cabaña 2 personas</td>
					        <td>30.07.2023</td>
					        <td>03.08.2023</td>
					        <td>
					        
								  <button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
								  <button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>
								
					        </td>
					      </tr>
					       <tr>
					        <td>2</td>
					        <td>Cabaña 2 personas</td>
					        <td>30.08.2022</td>
					        <td>03.09.2022</td>
					        <td>
					        	
								  <button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
								  <button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>
								
					        </td>
					      </tr>

					       <tr>
					        <td>3</td>
					        <td>Cabañas 6 personas</td>
					        <td>30.08.2021</td>
					        <td>03.09.2021</td>
					        <td>
					        	
								  <button type="button" class="btn btn-dark text-white"><i class="fas fa-pencil-alt"></i></button>
								  <button type="button" class="btn btn-warning text-white"><i class="fas fa-eye"></i></button>
								
					        </td>
					      </tr>
					    </tbody>
					  </table>


					</div>

				</div>
			
			</div>

		</div>

	</div>

</div>