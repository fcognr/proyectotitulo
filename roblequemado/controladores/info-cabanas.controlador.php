<?php

Class ControladorInfoCabanas{


	/*=============================================
	MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN
	=============================================*/

	static public function ctrMostrarInfoCabanas($valor){
		
		$tabla1 = "cabanas";
		$tabla2 = "info_cabanas";

		$respuesta = ModeloInfoCabanas::mdlMostrarInfoCabanas($tabla1, $tabla2, $valor);

		return $respuesta;

	}


	static function ctrMostrarHabitacion($valor){

		$tabla = "info_cabanas";

		$respuesta = ModeloInfoCabanas::mdlMostrarHabitacion($tabla, $valor);

		return $respuesta;
	}

}


