<?php

class ControladorBanner {

	static public function ctrMostrarBanner(){

	$tabla = "banner";

	$respuesta = ModeloBanner::mdlMostrarBanner($tabla);

	return $respuesta;

	}

    // Método para mostrar el banner
    //public static function ctrMostrarBanner() {
    //    $tabla = "banner";
    //    $respuesta = ModeloBanner::mdlMostrarBanner($tabla);
    //    return $respuesta;
    //}

}

