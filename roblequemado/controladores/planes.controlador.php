<?php

Class ControladorPlanes{

	static public function ctrMostrarPlanes(){

		$tabla = "plan";

		$respuesta = ModeloPlanes::mdlMostrarPlanes($tabla);

		return $respuesta;

	}

}