<?php

require_once "conexion.php";

class ModeloBanner {

	static public function mdlMostrarBanner($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

}



#require_once -> una clase que se requiere una vez

#La funcion permite mostrar el banner y conectar con la base de datos
#Selecciona desde la tabla
#Ejecuta la base de datos y selecciona todas las filas para traer las imagenes

