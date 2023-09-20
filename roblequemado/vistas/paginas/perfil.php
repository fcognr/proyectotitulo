<?php

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		include "modulos/banner_interior.php";
		include "modulos/info-perfil.php";

	}
}else{

	echo '<script> window.location="'.$ruta.'"</script>';
}

