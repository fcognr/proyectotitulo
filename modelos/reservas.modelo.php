<?php

require_once "conexion.php";

Class ModeloReservas{

	/*=============================================
	MOSTRAR HABITACIONES-RESERVAS-CATEGORIAS CON INNER JOIN
	=============================================*/
	
	static public function mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_c = $tabla2.id_cabanas INNER JOIN $tabla3 ON $tabla1.tipo_c = $tabla3.id WHERE id_c = :id_c");


		$stmt -> bindParam(":id_c", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CODIGO DE RESERVA
	=============================================*/


	static public function mdlMostrarCodigoReserva($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_reserva = :codigo_reserva");

		$stmt -> bindParam(":codigo_reserva", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

}
