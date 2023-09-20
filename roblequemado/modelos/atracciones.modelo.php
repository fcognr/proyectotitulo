<?php

require_once "conexion.php";

class ModeloAtracciones {

	static public function mdlMostrarAtracciones($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

}