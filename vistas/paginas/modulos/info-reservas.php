<!--=====================================
INFO RESERVAS
======================================-->

<div class="infoReservas container-fluid bg-white p-0 pb-5">
	
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

					<h1 class="pb-5 float-left">¡Está Disponible!</h1>

					<div class="float-right pb-3">
							
						<ul>
							<li>
								<i class="fas fa-square-full" style="color:darkkhaki;"></i> No disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:lightgray;"></i> Disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:red;"></i> Tu reserva
							</li>
						</ul>

					</div>

					<div class="clearfix"></div>
			
					<div id="calendar"></div>

					<!--=====================================
					MODIFICAR FECHAS
					======================================	-->

					<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a la diponibilidad:</h6>

					<div class="container mb-3">

						<div class="row py-2" style="background:#509CC3">

							 <div class="col-6 col-md-3 input-group pr-1">
							
								<input type="text" class="form-control datepicker entrada" placeholder="Entrada">

								<div class="input-group-append">
									
									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
								
								</div>

							</div>

						 	<div class="col-6 col-md-3 input-group pl-1">
							
								<input type="text" class="form-control datepicker salida" placeholder="Salida">

								<div class="input-group-append">
									
									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
								
								</div>

							</div>

							<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
								
								<a href="<?php echo $ruta; ?>reservas" class="w-100">
									<input type="button" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:black">	
								</a>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerReservas">

				<div class="form-group">
				  <label>Fecha Check-in:</label>
				  <input type="date" class="form-control" value="2019-03-13" readonly>
				</div>

				<div class="form-group">
				  <label>Fecha Check-out:</label>
				  <input type="date" class="form-control" value="2019-03-15"  readonly>
				</div>

				<div class="form-group">
				  <label>Tipo de Cabaña:</label>
				  <input type="text" class="form-control" value="Cabana 6 personas" readonly>

				  <img src="img/cabana06.jpg" class="img-fluid">

				</div>

				<div class="form-group">
				  <label>Plan:</label>
				  <select class="form-control">
				  	
					<option value="continental">Plan Diario</option>
					<option value="americano">Plan Fin de semana</option>

				  </select>
				</div>

				<div class="row py-4">

					<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">
						
						<h1>$ CLP</h1>

					</div>
					
					<div class="col-12 col-lg-6 col-xl-5">
				
						<a href="<?php echo $ruta; ?>perfil">
							<button class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
						</a>

					</div>
			
				</div>

			</div>

		</div>

	</div>

</div>
