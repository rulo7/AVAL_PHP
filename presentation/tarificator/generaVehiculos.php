<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

$idOficina = $_GET['id'];
$html="";
$idTarifas = FrontController::getInstance()->execute(Entities::TARIFA, Operations::TOLIST, NULL);
foreach ($idTarifas as $idTarifa) {
	 $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);
	 $oficina_id=$tarifa->getOficina()->getId();
	 if($oficina_id== $idOficina)
		{
		$grupo = $tarifa->getGrupo();
		$oficina = $tarifa->getOficina()->getLocalidad();
        $grupo = $tarifa->getGrupo();
		
		$id_vehiculos = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::TOLIST, NULL);
		 foreach ($id_vehiculos as $id_vehiculo) {
			
			$vehiculo=FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $id_vehiculo);
			$tipo = $vehiculo->getTipo();
			$group=$vehiculo->getGrupo();
			if ($group == $grupo )
			{
				echo $html."<option value='$idTarifa'>Grupo '$grupo'</option>";
			}
		 
		 }
		}
}


?>

