<?php

Class ControladorReservas{

	/*=============================================
	Mostrar Reservas
	=============================================*/

	static public function ctrMostrarReservas($valor){

		$tabla1 = "info_cabanas";
		$tabla2 = "reservas";
		$tabla3 = "cabanas";

		$respuesta = ModeloReservas::mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor);

		return $respuesta;

	}

	/*=============================================
	Mostrar Codigo Reservas
	=============================================*/

	static public function ctrMostrarCodigoReserva($valor){

		$tabla = "reservas";

		$respuesta = ModeloReservas::mdlMostrarCodigoReserva($tabla, $valor);

		return $respuesta;

	}

	/*=============================================
	Guardar Reservas
	=============================================*/

	static public function ctrGuardarReserva($valor){

		$tabla = "reservas";

		$respuesta = ModeloReservas::mdlGuardarReserva($tabla, $valor);

		return $respuesta;


	}

	/*=============================================
	Mostrar Reservas de un usuario
	=============================================*/

	static public function ctrMostrarReservasUsuario($valor){

		$tabla = "reservas";

		$respuesta = ModeloReservas::mdlMostrarReservasUsuario($tabla, $valor);

		return $respuesta;

	}

}



