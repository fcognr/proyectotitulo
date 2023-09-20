<?php

class ControladorAtracciones {

	static public function ctrMostrarAtracciones(){

	$tabla = "atracciones";

	$respuesta = ModeloAtracciones::mdlMostrarAtracciones($tabla);

	return $respuesta;

	}

}