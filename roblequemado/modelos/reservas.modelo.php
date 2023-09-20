<?php

require_once "conexion.php";

Class ModeloReservas{

	/*=============================================
	MOSTRAR CABAÑAS-RESERVAS-INFO_CABAÑAS CON INNER JOIN
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

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Guardar reserva
	=============================================*/

	static public function mdlGuardarReserva($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cabanas, id_usuario, pago_reserva, numero_transaccion, codigo_reserva, descripcion_reserva, fecha_ingreso, fecha_salida) VALUES (:id_cabanas, :id_usuario, :pago_reserva, :numero_transaccion, :codigo_reserva, :descripcion_reserva, :fecha_ingreso, :fecha_salida)");

		$stmt->bindParam(":id_cabanas", $datos["id_cabanas"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":pago_reserva", $datos["pago_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":numero_transaccion", $datos["numero_transaccion"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo_reserva", $datos["codigo_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_reserva", $datos["descripcion_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		}

		$stmt->close();
		$stmt->null;
	}

	/*=============================================
	Mostrar reserva de un usuario
	=============================================*/

	static public function mdlMostrarReservasUsuario($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario ORDER BY id_reserva DESC LIMIT 5");

		$stmt->bindParam(":id_usuario", $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

}
