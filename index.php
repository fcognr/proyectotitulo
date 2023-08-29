<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/banner.controlador.php";
require_once "modelos/banner.modelo.php";

require_once "controladores/planes.controlador.php";
require_once "modelos/planes.modelo.php";

require_once "controladores/cabanas.controlador.php";
require_once "modelos/cabanas.modelo.php";

require_once "controladores/info-cabanas.controlador.php";
require_once "modelos/info-cabanas.modelo.php";

require_once "controladores/atracciones.controlador.php";
require_once "modelos/atracciones.modelo.php";

require_once "controladores/reservas.controlador.php";
require_once "modelos/reservas.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
