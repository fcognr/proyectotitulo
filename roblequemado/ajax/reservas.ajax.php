<?php

require_once "../controladores/reservas.controlador.php";
require_once "../modelos/reservas.modelo.php";

/*=============================================
Traer reserva desde cabañas
=============================================*/

class AjaxReservas{

	public $idCabana;

	public function ajaxTraerReserva(){

		$valor = $this->idCabana;

		$respuesta = ControladorReservas::ctrMostrarReservas($valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	TRAER CODIGO DE LA RESERVA
	=============================================*/

	public $codigoReserva;

	public function ajaxTraerCodigoReserva(){

		$valor = $this->codigoReserva;

		$respuesta = ControladorReservas::ctrMostrarCodigoReserva($valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
	TRAER RESERVA DE CABAÑA
=============================================*/

if(isset($_POST["idCabana"])){

	$idCabana = new AjaxReservas();
	$idCabana -> idCabana = $_POST["idCabana"];
	$idCabana -> ajaxTraerReserva();

}

/*=============================================
	TRAER RESERVA CODIGO
=============================================*/

if(isset($_POST["codigoReserva"])){

	$codigoReserva = new AjaxReservas();
	$codigoReserva -> codigoReserva = $_POST["codigoReserva"];
	$codigoReserva -> ajaxTraerCodigoReserva();

}







