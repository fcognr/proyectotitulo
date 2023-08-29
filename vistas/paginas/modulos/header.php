<?php 

$cabanas = ControladorCabanas::ctrMostrarCabanas();


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<title>Cabañas Roble Quemado</title>

	<link rel="icon" href="img/logo.jpg">

	<!--=====================================
	VÍNCULOS CSS
	======================================-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- Fuente Open Sans y Ubuntu -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Ubuntu" rel="stylesheet">

	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="css/plugins/bootstrap-datepicker.standalone.min.css">

	<!-- jdSlider -->
	<link rel="stylesheet" href="css/plugins/jquery.jdSlider.css">

	<!-- Pano -->
	<link rel="stylesheet" href="css/plugins/jquery.pano.css">

	 <!-- fullCalendar -->
	<link rel="stylesheet" href="css/plugins/fullcalendar.min.css">

	<!-- Hoja de estilo personalizada -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/reservas.css">

	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- bootstrap datepicker -->
	<!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
	<script src="js/plugins/bootstrap-datepicker.min.js"></script>

	<!-- https://easings.net/es# -->
	<script src="js/plugins/jquery.easing.js"></script>

	<!-- https://markgoodyear.com/labs/scrollup/ -->
	<script src="js/plugins/scrollUP.js"></script>

	<!-- jdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="js/plugins/jquery.jdSlider-latest.js"></script>

	<!-- Pano -->
	<!-- https://www.jqueryscript.net/other/360-Degree-Panoramic-Image-Viewer-with-jQuery-Pano.html -->
	<script src="js/plugins/jquery.pano.js"></script>

	<!-- fullCalendar -->
	<!-- https://momentjs.com/ -->
	<script src="js/plugins/moment.js"></script>
	<!-- https://fullcalendar.io/docs/background-events-demo -->	
	<script src="js/plugins/fullcalendar.min.js"></script>


</head>
<body>

<!--=====================================
HEADER
======================================-->

<header class="container-fluid p-0 bg-white" >
	
	<div class="container p-0">
		
		<div class="grid-container py-2">

			<!-- LOGO -->
			
			<div class="grid-item">

				<a href="<?php echo $ruta; ?>">
				
					<img src="img/logo.jpg" class="img-fluid" width="50" height="50">

				</a>

			</div>

			<div class="grid-item d-none d-lg-block"></div>

			<!-- CAMPANA Y RESERVA -->

			<div class="grid-item d-none d-lg-block bloqueReservas">
				
				<div class="py-2 campana-y-reserva mostrarBloqueReservas" modo="abajo">

					<i class="fas fa-concierge-bell lead mx-2"></i>

					<i class="fas fa-caret-up lead mx-2 flechaReserva"></i>

				</div>	

<!--=====================================
				FORMULARIO DE RESERVAS
======================================-->

				<form action="<?php echo $ruta; ?>reservas" method="post">

					<div class="formReservas py-1 py-lg-2 px-4">
						
						<div class="form-group my-4">
							<select class="form-control form-control-lg" name="id-cabana" required>

								<option>Tipo de Cabaña</option>
								<?php foreach ($cabanas as $key => $value): ?>

								<option value="<?php echo $value["id"]; ?>"><?php echo $value["tipo"]; ?></option>
								<?php endforeach ?>



							</select>
						</div>

						<div class="row">
							
							 <div class="col-6 input-group input-group-lg pr-1">
							
								<input type="text" class="form-control datepicker entrada" placeholder="Entrada" name="fecha-ingreso" required>

								<div class="input-group-append">
									
									<span class="input-group-text p-2">
										<i class="far fa-calendar-alt small text-gray-dark"></i>
									</span>
								
								</div>

							</div>

							<div class="col-6 input-group input-group-lg pl-1">
							
								<input type="text" class="form-control datepicker salida" placeholder="Salida" name="fecha-salida" readonly required>

								<div class="input-group-append">
									
									<span class="input-group-text p-2">
										<i class="far fa-calendar-alt small text-gray-dark"></i>
									</span>
								
								</div>

							</div>

						</div>

						<input type="submit" class="btn btn-block btn-lg my-4 text-white" value="Ver disponibilidad">
						

					</div>

				</form>

			</div>

			<!-- INGRESO DE USUARIOS -->

			<div class="grid-item d-none d-lg-block mt-2">

				<a href="#modalLogin" data-toggle="modal"><i class="fas fa-user"></i></a>

			</div>

			<!-- BOTON MENÚ  -->

			<div class="grid-item mt-1 mt-sm-3 mt-md-4 mt-lg-2 botonMenu">
				
				<i class="fas fa-bars lead"></i>

			</div>

		</div>

	</div>

</header>

<!--=====================================
MENÚ
======================================-->

<nav class="menu container-fluid p-0">
	
	<ul class="nav nav-justified py-2">
		
		<li class="nav-item">
			<a class="nav-link text-white" href="#planes">Planes</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#cabanas">Cabañas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#atracciones">La zona</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#contactenos">Contáctenos</a>
		</li>

		<li class="nav-item">
			<ul class="nav nav-justified my-2 py-1">
		
				<li>
					<a href="http://www.instagram.com/cabanasroblequemado" target="_blank">
						<i class="fab fa-instagram text-white float-left mx-2"></i>
					</a>
				</li>

				<li>
					<a href="https://web.whatsapp.com/send/?phone=56982396422" target="_blank">
						<i class="fab fa-whatsapp text-white float-left mx-2"></i>
						<a class="text-white">   Nuestras Redes </a>
					</a>
				</li>

			</ul>
			
		</li>

	</ul>


</nav>

<!--=====================================
MENÚ MÓVIL
======================================-->
<div class="menuMovil">
	
	<div class="row">
		
		<div class="col-6">
			
			<a href="#modalLogin" data-toggle="modal">
				<i class="fas fa-user lead ml-3 mt-4"></i>
			</a>

		</div>	

		<div class="col-6">
			
		</div>	

	</div>

	<div class="formReservas py-1 py-lg-2 px-4">
					
		<div class="form-group my-4">
			<select class="form-control form-control-lg">
				<option>Tipo de Cabaña</option>
				<option>Cabaña 2 personas</option>
				<option>Cabaña 6 personas</option>
			</select>
		</div>

		<div class="row">
			
			 <div class="col-6 input-group input-group-lg pr-1">
			
				<input type="text" class="form-control datepicker entrada" placeholder="Entrada">

				<div class="input-group-append">
					
					<span class="input-group-text p-2">
						<i class="far fa-calendar-alt small text-gray-dark"></i>
					</span>
				
				</div>

			</div>

			<div class="col-6 input-group input-group-lg pl-1">
			
				<input type="text" class="form-control datepicker salida" placeholder="Salida">

				<div class="input-group-append">
					
					<span class="input-group-text p-2">
						<i class="far fa-calendar-alt small text-gray-dark"></i>
					</span>
				
				</div>

			</div>

		</div>

		<input type="button" class="btn btn-block btn-lg my-4 text-white" value="Ver disponibilidad">
		
	</div>

	<ul class="nav flex-column mt-4 pl-4 mb-5">
		
		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#planesMovil">Planes</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#cabanas">Cabañas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#atracciones">Atracciones de la Zona</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#contactenos">Contáctenos</a>
		</li>

	</ul>

</div>