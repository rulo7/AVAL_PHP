<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';



echo "<p>Seleccione la localidad en la que desea realizar la reserva<p>";
echo "<form method='post' action='viewTarificator2.php'>";


echo "<form method='post' action='viewTarificator2.php'>";
$idOficinas = FrontController::getInstance()->execute(Entities::OFICINA, Operations::TOLIST, null);
        if (sizeof($idOficinas) > 0) {
            echo "<p>Localidad: <select name='oficina' id='id_oficina' onchange='cargaSelects(this)'>";
			echo "<option value=0>Seleccione una oficina de recogida</option>";
            foreach ($idOficinas as $idOficina) {
                $localidad = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $idOficina)->getLocalidad();
                echo "<option value='$idOficina' >$localidad</option>";
            }
            echo "</select></p>";
        } else {
            echo "<p>No existen oficinas, crea alguna si quieres registrar una tarifa</p>";
        }

echo "<p>Vehiculo: <select name='tarifa' id='tarifa'>";
echo "<option value=0>Seleccione primero una oficina</option>";
echo "</select></p>";
echo "<p>Eliga las fechas de la reserva:</p>";
echo "<p>Recogida (yyyy-mm-dd hh:mm): <input type='date' name='momento_recogida_date' id='id_momento_recogida_date' required/> <input type='time' name='momento_recogida_time' id='id_momento_recogida_time' required/></p>";
echo "<p>Devolucion (yyyy-mm-dd hh:mm): <input type='date' name='momento_devolucion_date' id='id_momento_devolucion_date' required/> <input type='time' name='momento_devolucion_time' id='id_momento_devolucion_time' required/></p>";
echo "<p>Oficina de devolución: <select name='oficina_devolucion' id='id_oficina_devolucion'>";
echo "<option value=0>Seleccione primero una oficina de recogida</option>";
echo "</select></p>";


/*
echo "<p> Los datos de los vehiculos son los siguientes: <p>";
		
		$id_vehiculos = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::TOLIST, NULL);
		 foreach ($id_vehiculos as $id_vehiculo) {
			
			$vehiculo=FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $id_vehiculo);
			 $group=$vehiculo->getGrupo();
			 $tipo = $vehiculo->getTipo();
		   echo "<p>";
				echo $vehiculo->__toString();
				echo "<p>";
			
		 }*/
		


 

echo "<p><input type='submit' value='Siguiente' disabled id='boton'></p>";
echo "</form>";


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

function cargaSelects(oficina)
{	
	var id = oficina.options[oficina.selectedIndex].value;
	if(id!=0)
	{
	cargaVehiculos(id);
	cargaOficinas(id);
	$("#boton").removeAttr('disabled');
	}
	else {
		$("#tarifa").html("<option value=0>Seleccione primero una oficina de recogida</option>");
		$("#id_oficina_devolucion").html("<option value=0>Seleccione primero una oficina de recogida</option>");
		$("#boton").attr('disabled','disabled');
	}
	
}

function cargaVehiculos(id)
{	
	var url="generaVehiculos.php?id=" + id;
	$.get(url,mostrarVehiculos);
}

function mostrarVehiculos(data,status)
{
	$("#tarifa").html(data);
}

function cargaOficinas(id)
{	
	var url="generaOficinas.php?id=" + id;
	$.get(url,mostrarOficinas);
}




function mostrarOficinas(data,status)
{
	$("#id_oficina_devolucion").html(data);
}

</script>


echo "<p><input type='submit' value='Siguiente'></p>";
echo "</form>";

