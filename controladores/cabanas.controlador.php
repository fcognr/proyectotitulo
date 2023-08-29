<?php

class ControladorCabanas {

	static public function ctrMostrarCabanas(){

	$tabla = "cabanas";

	$respuesta = ModeloCabanas::mdlMostrarCabanas($tabla);

	return $respuesta;

	}

}