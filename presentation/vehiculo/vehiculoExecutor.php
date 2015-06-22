<?php

require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';
require_once dirname(dirname(__DIR__)) . '/model/vehiculo/transfer/TransferVehiculo.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';

$entity = Entities::VEHICULO;
$operation = $_REQUEST['operation'];

switch ($operation) {
    case Operations::CREATE:

        //$id = $_REQUEST["id"];
        $tipo = $_REQUEST["tipo"];
        $grupo = $_REQUEST["grupo"];
        $modelo = $_REQUEST["modelo"];
        $puertas = $_REQUEST["puertas"];
        $plazas = $_REQUEST["plazas"];
        $radio = (isset($_REQUEST["radio"])) ? $_REQUEST["radio"] : 0;
        $aire = (isset($_REQUEST["aire"])) ? $_REQUEST["aire"] : 0;
        
        if ($tipo == "industrial") {
            $metros_cubicos = $_REQUEST["metros_cubicos"];
            $alto = $_REQUEST["alto"];
            $ancho = $_REQUEST["alto"];
            $largo = $_REQUEST["largo"];
        } else {
            $metros_cubicos = 0;
            $alto = 0;
            $ancho = 0;
            $largo = 0;
        }

        $vehiculo = new TransferVehiculo(0, $tipo, $grupo, $modelo, $puertas, $plazas, $radio, $aire, $metros_cubicos, $alto, $ancho, $largo);
        FrontController::getInstance()->execute($entity, $operation, $vehiculo);

        break;
    case Operations::READ:
        // no hace nada, en un futuro informa que alguien ha leido algo ...
        break;
    case Operations::UPDATE:

        $id = $_REQUEST["id"];
        $tipo = $_REQUEST["tipo"];
        $grupo = $_REQUEST["grupo"];
        $modelo = $_REQUEST["modelo"];
        $puertas = $_REQUEST["puertas"];
        $plazas = $_REQUEST["plazas"];
        $radio = (isset($_REQUEST["radio"])) ? $_REQUEST["radio"] : 0;
        $aire = (isset($_REQUEST["aire"])) ? $_REQUEST["aire"] : 0;

        if ($tipo == "industrial") {
            $metros_cubicos = $_REQUEST["metros_cubicos"];
            $alto = $_REQUEST["alto"];
            $ancho = $_REQUEST["alto"];
            $largo = $_REQUEST["largo"];
        } else {
            $metros_cubicos = 0;
            $alto = 0;
            $ancho = 0;
            $largo = 0;
        }

        $vehiculo = new TransferVehiculo($id, $tipo, $grupo, $modelo, $puertas, $plazas, $radio, $aire, $metros_cubicos, $alto, $ancho, $largo);
        FrontController::getInstance()->execute($entity, $operation, $vehiculo);

        break;
    case Operations::DELETE:

        $id = $_REQUEST["id"];

        FrontController::getInstance()->execute($entity, $operation, $id);


        break;
}

echo "<p><a href='operationsVehiculo.php'><button type='button' >VOLVER</button></a></p>";
