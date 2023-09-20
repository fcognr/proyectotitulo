<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=roblequemado",
						"root",
						""); #contraseña

		$link->exec("set names utf8");

		return $link;

	}

}

#Esta funcion permite conectarse a la base de datos
#utf8 es la configuracion de idioma con caracteres latinos

