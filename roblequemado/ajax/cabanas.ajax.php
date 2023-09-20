<?php

require_once "../controladores/info-cabanas.controlador.php";
require_once "../modelos/info-cabanas.modelo.php";


class AjaxInfoCabanas{

	public $ruta;

	public function ajaxTraerInfoCabanas(){

		$valor = $this->ruta;

		$respuesta = ControladorInfoCabanas::ctrMostrarInfoCabanas($valor);

		echo json_encode($respuesta);

	}

}

if(isset($_POST["ruta"])){

	$ruta = new AjaxInfoCabanas();
	$ruta -> ruta = $_POST["ruta"];
	$ruta -> ajaxTraerInfoCabanas();

}