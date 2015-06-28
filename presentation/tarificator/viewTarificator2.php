<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';


echo "<p>Eliga el tipo de vehiculo: </p>";
echo "<button id='turismoButton'>Turismos</button>";
echo "          ";
echo "<button id='industrialesButton'>Industriales</button>";

mostrarVehiculos('turismo');

mostrarVehiculos('industrial');






function mostrarVehiculos($type)
{
$id_oficina = $_REQUEST['oficina'];
echo "<div id='$type'>";
echo "<form method='post' action='viewTarificator3.php'>";

$idTarifas = FrontController::getInstance()->execute(Entities::TARIFA, Operations::TOLIST, NULL);

if (sizeof($idTarifas) > 0) {

    echo "<p>Vehiculo: <select name='tarifa' id='id_tarifa' onchange='ocultar();'>";
    foreach ($idTarifas as $idTarifa) {

        $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);
		$oficina_id=$tarifa->getOficina()->getId();
		if($oficina_id==$id_oficina)
		{
        $oficina = $tarifa->getOficina()->getLocalidad();
        $grupo = $tarifa->getGrupo();
		
		$id_vehiculos = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::TOLIST, NULL);
		 foreach ($id_vehiculos as $id_vehiculo) {
			
			$vehiculo=FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $id_vehiculo);
			$tipo = $vehiculo->getTipo();
			$group=$vehiculo->getGrupo();
			if ($tipo == $type && $group == $grupo )
			{
				echo "<option value='$idTarifa'>Vehiculos del grupo '$grupo' en '$oficina'</option>";
			}
		 
		 }
		}
    }
    echo "</select></p>";
} else {
    echo "<p>No existen Tarifas, contacte con el administrador del sitio</p>";
}

echo "<p> Los datos de los vehiculos son los siguientes: <p>";
 foreach ($idTarifas as $idTarifa) {
	 
	 $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);
	 $oficina_id=$tarifa->getOficina()->getId();
	 if($oficina_id==$id_oficina)
		{
		$grupo = $tarifa->getGrupo();
		$id_vehiculos = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::TOLIST, NULL);
		 foreach ($id_vehiculos as $id_vehiculo) {
			
			$vehiculo=FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $id_vehiculo);
			 $group=$vehiculo->getGrupo();
			 $tipo = $vehiculo->getTipo();
			if($group == $grupo && $tipo == $type)
			{   echo "<p>";
				echo $vehiculo->__toString();
				echo "<p>";
			}
		 }
		}


 }
echo "<p><input type='hidden' name='oficina' value=$id_oficina></p>";
echo "<p><input type='submit' value='Siguiente'></p>";
echo "</form>";
echo "</div>";
}
?>

<script type="text/javascript">

 document.getElementById('industrial').style.display = 'none';
 
function swap(one, two) {
    document.getElementById(one).style.display = 'block';
    document.getElementById(two).style.display = 'none';
}

document.getElementById('turismoButton').addEventListener('click',function(){
    swap('turismo','industrial');
});

document.getElementById('industrialesButton').addEventListener('click',function(){
    swap('industrial','turismo');
});


</script>
