<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

$operation = $_REQUEST['operation'];
switch ($operation) {
    case Operations::CREATE:

        echo "<form method='post' action='vehiculoExecutor.php?operation=$operation'>";
        //echo "<p>ID: <input type='text'  name='id' id='id_id' placeholder='Ej: 1 required></p>";
        echo "<select name='tipo' id='id_tipo'>";
        echo "<option value='industrial'>Industrial</option>";
        echo "<option value='turismo'>Turismo</option>";
        echo "</select></p>";
        echo "<p>Grupo: <input type='text'  name='grupo' placeholder='A,B,1,2...' id='id_grupo'  required></p>";
        echo "<p>Modelo: <input type='text'  name='modelo' id='id_modelo' placeholder='Fiat Panda, Seat Leon...' required></p>";
        echo "<p>Puertas: <input type='number'  name='puertas' id='id_puertas' placeholder='Ej:4'  required></p>";
        echo "<p>Plazas: <input type='number'  name='plazas' id='id_plazas' placeholder='Ej:5' required></p>";
        echo "<p>Radio: <input type='checkbox'  name='radio' id='id_radio' value='1'></p>";
        echo "<p>Aire: <input type='checkbox'  name='aire' id='id_aire' value='1'></p>";
        echo "<u>SOLO INDUSTRIALES</u>";
        echo "<p>Metros cubicos: <input step='0.01' type='number'  name='metros_cubicos' id='id_metros_cubicos' placeholder='Ej:3'></p>";
        echo "<p>Alto(m): <input step='0.01' type='number'  name='alto' id='id_alto' placeholder='2'></p>";
        echo "<p>Ancho(m): <input step='0.01' type='number'  name='ancho' id='id_ancho' placeholder='1.5'></p>";
        echo "<p>Largo(m): <input step='0.01' type='number'  name='largo' id='id_largo' placeholder='4.6'></p>";
        echo "<p><input type='submit' value='Crear'></p>";
        echo "</form>";

        break;

    case Operations::READ:

        $transferVehiculo = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $_REQUEST["id"]);

        $id = $transferVehiculo->getId();
        $tipo = $transferVehiculo->getTipo();
        $grupo = $transferVehiculo->getGrupo();
        $modelo = $transferVehiculo->getModelo();
        $puertas = $transferVehiculo->getPuertas();
        $plazas = $transferVehiculo->getPlazas();
        $radio = ($transferVehiculo->getRadio()) ? "si" : "no";
        $aire = ($transferVehiculo->getAire()) ? "si" : "no";
        $metros_cubicos = $transferVehiculo->getMetros_cubicos();
        $alto = $transferVehiculo->getAlto();
        $ancho = $transferVehiculo->getAncho();
        $largo = $transferVehiculo->getLargo();

        echo "<p>ID: <input readonly type='text'  name='id' id='id_id' value='$id'></p>";
        echo "<p>Tipo: <input readonly type='text'  name='tipo' id='id_tipo' value='$tipo'></p>";
        echo "<p>Grupo: <input readonly type='text'  name='grupo' id='id_grupo' value='$grupo'></p>";
        echo "<p>Modelo: <input readonly type='text' name='modelo' id='id_modelo' value='$modelo'></p>";
        echo "<p>Puertas: <input readonly type='number'  name='puertas' id='id_puertas' value='$puertas'></p>";
        echo "<p>Plazas: <input readonly type='number'  name='plazas' id='id_plazas' value='$plazas'></p>";
        echo "<p>Radio: $radio</p>";
        echo "<p>Aire: $aire</p>";
        echo "<p>Metros cubicos: <input step='0.01' readonly type='number'  name='metros_cubicos' id='id_metros_cubicos' value='$metros_cubicos'></p>";
        echo "<p>Alto(m): <input step='0.01' readonly type='number'  name='alto' id='id_alto' value='$alto'></p>";
        echo "<p>Ancho(m): <input step='0.01' readonly type='number'  name='ancho' id='id_ancho' value='$ancho'></p>";
        echo "<p>Largo(m): <input step='0.01' readonly type='number'  name='largo' id='id_largo' value='$largo'></p>";


        break;

    case Operations::UPDATE:

        $transferVehiculo = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $_REQUEST["id"]);

        $id = $transferVehiculo->getId();
        $tipo = $transferVehiculo->getTipo();
        $grupo = $transferVehiculo->getGrupo();
        $modelo = $transferVehiculo->getModelo();
        $puertas = $transferVehiculo->getPuertas();
        $plazas = $transferVehiculo->getPlazas();
        $radio = $transferVehiculo->getRadio();
        $aire = $transferVehiculo->getAire();
        $metros_cubicos = $transferVehiculo->getMetros_cubicos();
        $alto = $transferVehiculo->getAlto();
        $ancho = $transferVehiculo->getAncho();
        $largo = $transferVehiculo->getLargo();

        echo "<form method='post' action='vehiculoExecutor.php?operation=$operation'>";
        echo "<p>ID: <input  readonly type='text'  name='id' id='id_id' value='$id'></p>";
        echo "<p>Tipo: <input  type='text'  name='tipo' id='id_tipo' value='$tipo'></p>";
        echo "<p>Grupo: <input  type='text'  name='grupo' id='id_grupo' value='$grupo'></p>";
        echo "<p>Modelo: <input  type='text' name='modelo' id='id_modelo' value='$modelo'></p>";
        echo "<p>Puertas: <input  type='number'  name='puertas' id='id_puertas' value='$puertas'></p>";
        echo "<p>Plazas: <input  type='number'  name='plazas' id='id_plazas' value='$plazas'></p>";
        echo "<p>Radio: <input type='checkbox'  name='radio' id='id_radio' value='1' " . (($radio) ? "checked" : "") . "></p>";
        echo "<p>Aire: <input type='checkbox'  name='aire' id='id_aire' value='1' " . (($aire) ? "checked" : "") . "></p>";
        echo "<p>Metros cubicos: <input step='0.01' type='number'  name='metros_cubicos' id='id_metros_cubicos' value='$metros_cubicos'></p>";
        echo "<p>Alto(m): <input step='0.01' type='number'  name='alto' id='id_alto' value='$alto'></p>";
        echo "<p>Ancho(m): <input step='0.01' type='number'  name='ancho' id='id_ancho' value='$ancho'></p>";
        echo "<p>Largo(m): <input step='0.01'  type='number'  name='largo' id='id_largo' value='$largo'></p>";
        echo "<p><input type='submit' value='Editar'></p>";
        echo "</form>";

        break;

    case Operations::DELETE:

        $id = $_REQUEST["id"];
        echo "<p>Seguro de que deseas eliminar?</p>";
        echo "<p><a href='vehiculoExecutor.php?operation=$operation&id=$id' target='_blank'><button type='button' >SI</button></a>";
        echo "<a href='volver' target='_blank'><button type='button' >NO</button></a></p>";

        break;
}