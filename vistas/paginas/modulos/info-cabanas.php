<?php 

$valor = $_GET["pagina"];


$cabanas = ControladorCabanas::ctrMostrarCabanas($valor);
$infocabanas = ControladorInfoCabanas::ctrMostrarInfoCabanas($valor);
#echo '<pre class="bg-white">'; print_r($infocabanas); echo '</pre>';

?>


<!--=====================================
INFO CABANAS
======================================-->

<div class="infoCabanas container-fluid bg-white p-0 pb-5">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqCabanas p-0">
				
				<!--=====================================
				HEADER CABAÑAS
				======================================-->
				
				<div class="pt-4 headerCabanas">

					<a href="<?php echo $ruta; ?>" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<h2 class="float-right text-white px-3 categoria text-uppercase">Nuestras Cabañas</h2>

					<div class="clearfix"></div>

					<ul class="nav nav-justified mt-lg-4">	

						<?php foreach ($infocabanas as $key => $value): ?>

						<li class="nav-item">

							<a class="nav-link text-white" orden="<?php echo $key; ?>" ruta="<?php echo $_GET["pagina"]; ?>" href="#">
								 <?php echo $value["tipo"]; ?>
							</a>

						</li>
							
						<?php endforeach ?>
					</ul>

				</div>

				<!--=====================================
				MULTIMEDIA CABAÑAS
				======================================-->

				<!-- SLIDE  -->

				<section class="jd-slider mb-3 my-lg-3 slideCabanas" >

							      	       
			        <div class="slide-inner">
			            
			            <ul class="slide-area">


			            	<?php

			        		$galeria = json_decode($infocabanas[0]["galeria"], true);
			           
			       			?>

			            	
			            	<?php foreach ($galeria as $key => $value): ?>
			            		
				            <li>	

								<img src="<?php echo $servidor.$value; ?>" class="img-fluid">

							</li>

							<?php endforeach ?>	

						</ul>

					</div>

				  	  	<a class="prev d-none d-lg-block" href="#">
				            <i class="fas fa-angle-left fa-2x"></i>
				        </a>

				        <a class="next d-none d-lg-block" href="#">
				            <i class="fas fa-angle-right fa-2x"></i>
				        </a>

				        <div class="controller d-block d-lg-none">

					        <div class="indicate-area"></div>

					    </div>
									   
				</section>

				<!--=====================================
				DESCRIPCIÓN HABITACIONES
				======================================-->	

				<div class="descripcionCabanas px-3">
					
					<h1 class="colorTitulos float-left"><?php echo $infocabanas[0]["tipo"] ?></h1>

					<div class="float-right pt-2">
						
						<button type="button" class="btn btn-default" vista="fotos"><i class="fas fa-camera"></i> Fotos</button>
							
					</div>

					<div class="clearfix mb-4"></div>	


					<div class="d-cabanas">
						
						<?php echo $infocabanas[0]["descripcion_c"]; ?>


					</div>		

					<form action="<?php echo $ruta; ?>reservas" method="post">

						<input type="hidden" name="id-cabana" value="<?php echo $infocabanas[0]["id_c"]; ?>">
					<div class="container">


						<div class="row py-2" style="background:#509CC3">

							 <div class="col-6 col-md-3 input-group pr-1">
							
								<input type="text" class="form-control datepicker entrada" placeholder="Entrada" name="fecha-ingreso" required>

								<div class="input-group-append">
									
									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
								
								</div>

							</div>

						 	<div class="col-6 col-md-3 input-group pl-1">
							
								<input type="text" class="form-control datepicker salida" placeholder="Salida" name="fecha-salida" required>

								<div class="input-group-append">
									
									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
								
								</div>

							</div>

							<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
								
								<a href="<?php echo $ruta; ?>reservas" class="w-100">
									<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:black">	
								</a>

							</div>

						</div>

					</div>
					</form>

				</div>

			</div>
			
			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerCabanas">

				<h2 class="colorTitulos">La cabaña incluye:</h2>
				
				<ul>
					
				<?php

				$incluye = json_decode($infocabanas[0]["incluye"], true);

				?>

				<?php foreach ($incluye as $key => $value): ?>

					<li>
						<h5>
							<i class="<?php echo $value["icono"]; ?> w-25 colorTitulos"></i> 
							<span class="text-dark small"><?php echo $value["item"]; ?></span>
						</h5>
					</li>
					
				<?php endforeach ?>


				</ul>

				<!-- HABITACIONES -->

				<div class="cabanas container-fluid bg-light" id="cabanas">
	
					<div class="container">

						<h1 class="pt-4 text-center">CABAÑAS</h1>

						<div class="row p-4 text-center">

						<?php foreach ($cabanas as $key => $value): ?>

							<div class="col-12 pb-3 px-0 px-lg-3">

								<a href="<?php echo $ruta.$value["ruta"]; ?>">
					
								<figure class="text-center">
						
									<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid" width="100%">

									<p class="small py-3 px-2 px-lg-0 mb-0"><?php echo $value["descripcion"] ?></p>

									<h3 class="py-2 text-gray-dark mb-0">DESDE $<?php echo number_format($value["precio_baja"]) ?> CLP</h3>

									<h5 class="py-2 text-gray-dark border">Ver detalles <i class="fas fa-chevron-right ml-2"></i></h5>
						
									<h1 class="text-white p-3 mx-auto w-50 lead" style="background:#847059"><?php echo $value["tipo"] ?></h1>

								</figure>

								</a>

							</div>
				
						<?php endforeach ?>


		</div>

	</div>

</div>

			</div>


		</div>


	</div>

</div>