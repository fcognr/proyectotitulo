<?php

Class ControladorInfoCabanas{


	/*=============================================
	MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN
	=============================================*/

	static public function ctrMostrarInfoCabanas($valor){
		
		$tabla1 = "cabanas";
		$tabla2 = "info_cabana";

		$respuesta = ModeloInfoCabanas::mdlMostrarInfoCabanas($tabla1, $tabla2, $valor);

		return $respuesta;

	}

}