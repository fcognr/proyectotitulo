<?php 

if(isset($_POST["id-cabana"])){
	
	#echo '<pre class="bg-white">'; print_r($_POST["id-cabana"]); echo '</pre>';
	#echo '<pre class="bg-white">'; print_r($_POST["fecha-ingreso"]); echo '</pre>';
	#echo '<pre class="bg-white">'; print_r($_POST["fecha-salida"]); echo '</pre>';

	$valor = $_POST['id-cabana'];

	$reservas = ControladorReservas::ctrMostrarReservas($valor);
	#echo '<pre class="bg-white">'; print_r($reservas); echo '</pre>';


	/*--=====================================
	DEFINIR CANTIDAD DE DIAS
	======================================-*/

	$fechaIngreso2 = new DateTime($_POST["fecha-ingreso"]);
	$fechaSalida2 = new DateTime($_POST["fecha-salida"]);
	$diff = $fechaIngreso2->diff($fechaSalida2);
	$dias = $diff->days;

	/*--=====================================
	DEFINIR PRECIO POR TEMPORADA
	======================================-*/

	date_default_timezone_set("America/Santiago");

	$hoy = getdate(strtotime($_POST["fecha-ingreso"]));
	#echo '<pre class="bg-white">'; print_r($hoy); echo '</pre>';

	$fechaIngreso = $_POST["fecha-ingreso"];
	$fechaSalida = $_POST["fecha-salida"];

	$precioDiarioAlta = $reservas[0]["precio_alta"];
	$precioDiarioBaja = $reservas[0]["precio_baja"];

	$fechasTemporadaAlta = array(
	    array(strtotime("2023-12-20"), strtotime("2023-02-28")),
	    array(strtotime("2023-09-15"), strtotime("2023-09-20")),
	    array(strtotime("2023-07-01"), strtotime("2023-07-31"))
	);

	$fechaIngresoTimestamp = strtotime($fechaIngreso);
	$fechaSalidaTimestamp = strtotime($fechaSalida);

	$precioTotal = 0;

	// Recorrer cada día de la estadía
	for ($fechaActual = $fechaIngresoTimestamp; $fechaActual <= $fechaSalidaTimestamp; $fechaActual += 86400) {
	    $enTemporadaAlta = false;

	    // Verificar si la fecha actual está dentro de algún rango de temporada alta
	    foreach ($fechasTemporadaAlta as $rangoTemporadaAlta) {
	        if ($fechaActual >= $rangoTemporadaAlta[0] && $fechaActual <= $rangoTemporadaAlta[1]) {
	            $enTemporadaAlta = true;
	            break;
	        }
	    }

	    // Agregar el precio correspondiente al precio total
	    if ($enTemporadaAlta) {
	        $precioTotal += $precioDiarioAlta;
	    } else {
	        $precioTotal += $precioDiarioBaja;
	    }
	}

	echo "Precio total a cobrar: " . $precioTotal;

	/*--=====================================
	AGREGAR HORAS DE TINAJA
	======================================-*/

}else{

		echo '<script> window.location="'.$ruta.'"</script>';
	}

	
	#para que no se pueda ingresar directamente a pagina reservas sin antes haber seleccionado fechas y tipo de cabaña


?>


<!--=====================================
INFO RESERVAS
======================================-->

<div class="infoReservas container-fluid bg-white p-0 pb-5" idCabana="<?php echo $_POST["id-cabana"]; ?>" fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>" fechaSalida="<?php echo $_POST["fecha-salida"]; ?>" dias="<?php echo $dias; ?>">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqReservas p-0">
				
				<!--=====================================
				CABECERA RESERVAS
				======================================-->
				
				<div class="pt-4 headerReservas">
					
					<a href="<?php echo $ruta; ?>cabanas" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="float-left text-white p-2 pb-lg-5">RESERVAS</h1>	

					<h6 class="float-right px-3">

						<br>
						<a href="<?php echo $ruta; ?>perfil" style="color:#FFCC29">Ver tus reservas</a>

					</h6>

					<div class="clearfix"></div>

				</div>


				<!--=====================================
				CALENDARIO RESERVAS
				======================================	-->

				<div class="bg-white p-4 calendarioReservas">

					<?php if(!$reservas): ?>
		
						<h1 class="pb-5 float-left">¡Está Disponible!</h1>

					<?php else: ?>

						<div class="infoDisponibilidad"></div>

					<?php endif; ?>	

					<div class="float-right pb-3">
							
						<ul>
							<li>
								<i class="fas fa-square-full" style="color:gray;"></i> No disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:whitesmoke;"></i> Disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:mediumpurple;"></i> Tu reserva
							</li>
						</ul>

					</div>

					<div class="clearfix"></div>
			
					<div id="calendar"></div>

					<!--=====================================
					MODIFICAR FECHAS
					======================================	-->

					<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a la disponibilidad:</h6>

					<form action="<?php echo $ruta; ?>reservas" method="post">

						<input type="hidden" name="id-cabana" value="<?php echo $_POST["id-cabana"]; ?>">

						<div class="container mb-3">

							<div class="row py-2" style="background:#509CC3">

								 <div class="col-6 col-md-3 input-group pr-1">
								
									<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso" value="<?php echo $_POST["fecha-ingreso"]; ?>" required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>

							 	<div class="col-6 col-md-3 input-group pl-1">
								
									<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="fecha-salida"  value="<?php echo $_POST["fecha-salida"]; ?>" required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>

								<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
									<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" readonly style="background:black">	
								</div>

							</div>

						</div>

					</form>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerReservas" style="display:none">


				<h4 class="mt-lg-5">Código de la Reserva:</h4>
				<h2 class="colorTitulos"><strong class="codigoReserva"></strong></h2>

				<div class="form-group">
				  <label> Fecha Check-in 15:00 hrs:</label>
				  <input type="date" class="form-control" value="<?php echo $_POST["fecha-ingreso"]; ?>" readonly>
				</div>

				<div class="form-group">
				  <label>Fecha Check-out 11:00 hrs:</label>
				  <input type="date" class="form-control" value="<?php echo $_POST["fecha-salida"]; ?>"  readonly>
				</div>

				<div class="form-group">
				  <label>Tipo de Cabaña:</label>
				  <input type="text" class="form-control" value="Cabaña <?php echo $reservas[0]["tipo"]; ?>" readonly>

				  <img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid">

				</div>

				<div class="form-group">
				  <label>Valor Estadía:</label>
				  	<div class="form-group">
					<input type="text" class="form-control" value="$ <?php echo number_format($precioTotal)?> CLP" readonly>
					</div>

				  <label>Agregar hora de Tinaja:</label>
				  <select class="form-control horasTinaja">
		  	
					<option value="0">No agregar </option>
					<option value="20000">1 hora </option>
					<option value="35000">2 horas </option>
					<option value="45000">3 horas </option>
				  </select>
				</div>

				<div class="row py-4">

					<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">
						
						<h1>$<span id="precioTotal"><?php echo number_format($precioTotal); ?></span> CLP</h1>

					</div>


					<!--=====================================
					ACTUALIZAR EL PRECIO SEGUN CANTIDAD DE HORAS DE TINAJA
					======================================-->
					
					<script>
					  $(document).ready(function () {
					    // Manejar el cambio en la lista desplegable
					    $(".horasTinaja").on("change", function () {
					      var precioSeleccionado = parseInt($(this).val()); // Obtener el valor seleccionado como entero
					      var precioTotalActual = <?php echo $precioTotal; ?>; // Obtener el precio total actual desde PHP
					      var nuevoPrecioTotal = precioTotalActual + precioSeleccionado; // Calcular el nuevo precio total

					      // Actualizar el precio total en la página
					      $("#precioTotal").text(nuevoPrecioTotal.toLocaleString()); // Formatear el precio con separadores de miles
					    });
					  });
					</script>


					
					<div class="col-12 col-lg-6 col-xl-5">
				
						<a href="<?php echo $ruta; ?>perfil" 
							class="pagarReserva" 
							idCabana="<?php echo $_POST["id-cabana"]; ?>"
							imgCabana="img/cabana06.jpg"
							infoCabana="Cabaña <?php echo $reservas[0]["tipo"]; ?>"
							horasTinaja=""
							pagoReserva="<?php echo $precioTotal; ?>"
							codigoReserva=""
							fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>"
							fechaSalida="<?php echo $_POST["fecha-salida"]; ?>">

							<button type="button" class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
						</a>

					</div>
			
				</div>

			</div>

		</div>

	</div>

</div>
