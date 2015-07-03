<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

$idOficina = $_GET['id'];
$html="";
$oficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $idOficina);
$devolucion= $oficina->getDevolucion_distinta_recogida();
$localidad = $oficina->getLocalidad();
if($devolucion)
{

$idOficinas = FrontController::getInstance()->execute(Entities::OFICINA, Operations::TOLIST, null);
foreach ($idOficinas as $idOficina) {
	$oficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $idOficina);
    $localidad = $oficina->getLocalidad();
	echo $html."<option value='$idOficina'>$localidad</option>";
	
} 
}
else
	echo $html."<option value='$idOficina'>$localidad</option>";

?>

