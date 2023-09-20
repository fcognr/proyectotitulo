<?php

class ControladorCabanas {

	static public function ctrMostrarCabanas(){

	$tabla = "cabanas";

	$respuesta = ModeloCabanas::mdlMostrarCabanas($tabla);

	return $respuesta;

	}




	static function ctrMostrarCabana($valor){

		$tabla = "cabanas";

		$respuesta = ModeloInfoCabanas::mdlMostrarCabana($tabla, $valor);

		return $respuesta;
	}

}