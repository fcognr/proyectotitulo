<?php

$atracciones = ControladorAtracciones::ctrMostrarAtracciones();



?>
<!--=====================================
ATRACCIONES DE LA ZONA
======================================-->

<div class="atracciones container-fluid bg-white pb-5" id="atracciones">
	
	<div class="container">

		<h1 class="pt-5 text-center">ATRACCIONES DE LA ZONA</h1>	

			<div class="jd-slider slideAtracciones">
				
				<div class="slide-inner">
					
					<ul class="slide-area">

						<?php foreach ($atracciones as $key => $value): ?>
							

						<li>		
							<div class="grid-container pt-4 pb-1 pb-lg-0 px-0 px-lg-5">
								<div class="grid-item">				
									<img src="<?php echo $servidor.$value["foto_chica"]; ?>" class="img-fluid" width="100%">
								</div>
								<div class="grid-item">			
									<h1 class="mt-4 mb-0 my-lg-2"><?php echo $value["titulo"]; ?></h1>
									<p class="small p-3"><?php echo $value["descripcion"]; ?></p>
								</div>
								<div class="grid-item d-none d-lg-block">							
									<img src="<?php echo $servidor.$value["foto_grande"]; ?>" class="img-fluid" width="100%">
								</div>						
							</div>
						</li>	

						<?php endforeach ?>


					</ul>

				</div>

				<a class="d-none d-md-block prev" href="#">
	        <i class="fas fa-angle-left fa-2x" style="color:#3E92BD"></i>
		    </a>

		    <a class="d-none d-md-block next" href="#">
		      <i class="fas fa-angle-right fa-2x" style="color:#3E92BD"></i>
		    </a>

		    <div class="controller">
		       <div class="indicate-area"></div>
		    </div>

			</div>	
	
	</div>

</div>