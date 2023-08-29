<?php

$cabanas = ControladorCabanas::ctrMostrarCabanas();

?>


<!--=====================================
CABAÑAS
======================================-->

<div class="cabanas container-fluid bg-light" id="cabanas">
	
	<div class="container">

		<h1 class="pt-4 text-center">CABAÑAS</h1>

		<div class="row p-4 text-center">

			<?php foreach ($cabanas as $key => $value): ?>


				<div class="col-12 col-lg-6 pb-3 px-0 px-lg-3">

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