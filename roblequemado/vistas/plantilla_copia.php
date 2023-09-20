<?php

$ruta = ControladorRuta::ctrRuta();
$servidor = ControladorRuta::ctrServidor();

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>	

	<title>Cabañas Roble Quemado</title>

	<base href="vistas/">

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
	<link rel="stylesheet" href="css/cabanas.css">
	<link rel="stylesheet" href="css/reservas.css">
	<link rel="stylesheet" href="css/perfil.css">
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

	<script src="js/plugins/sweetalert2.all.js"></script>


</head>
<body>

<?php

include "paginas/modulos/header.php";
include "paginas/modulos/ventanasmodales.php";



if(isset($_GET["pagina"])){

	$rutaCabanas = ControladorCabanas::ctrMostrarCabanas();
	
	foreach ($rutaCabanas as $key => $value) {
		if($_GET["pagina"] == $value["ruta"]){

		include "paginas/cabanas.php";
		}
	}

	/*VALIDAR CORREO ELECTRONICO */

	$item = "email_encriptado";

	$valor = $_GET["pagina"];

	$validarCorreo = ControladorUsuarios::ctrMostrarUsuario($item,$valor);

	if($validarCorreo["email_encriptado"] == $_GET["pagina"]){

		$id = $validarCorreo["id_u"];
		$item = "verificacion";
		$valor = 1;

		$verificarUsuario = ControladorUsuarios::ctrActualizarUsuario($id, $item, $valor);

		echo'<script>

					swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡Su cuenta ha sido verificada, ya puede ingresar al sistema!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    history.back();
							  } 
					});

				</script>';

			return;
	}


	if($_GET["pagina"] == "reservas" || $_GET["pagina"] == "perfil"){

		include "paginas/".$_GET["pagina"].".php";
	}

}else{

	include "paginas/inicio.php";
}



include "paginas/modulos/footer.php";



?>

<input type="hidden" value="<?php echo $ruta; ?>" id=urlPrincipal>
<input type="hidden" value="<?php echo $servidor; ?>" id=urlServidor>

<script src="js/plantilla.js"></script>
<script src="js/reservas.js"></script>
<script src="js/cabanas.js"></script>
<script src="js/menu.js"></script>
<script src="js/usuarios.js"></script>

</body>
</html>