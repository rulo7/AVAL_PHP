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
        $nombre = $_REQUEST["nombre"];
        $puertas = $_REQUEST["puertas"];
        $plazas = $_REQUEST["plazas"];
        $musica = (isset($_REQUEST["musica"])) ? $_REQUEST["musica"] : 0;
        $motor = $_REQUEST["motor"];

        $vehiculo = new TransferVehiculo(0, $tipo, $nombre, $puertas, $plazas, $musica, $motor);
        FrontController::getInstance()->execute($entity, $operation, $vehiculo);

        break;
    case Operations::READ:
        // no hace nada, en un futuro informa que alguien ha leido algo ...
        break;
    case Operations::UPDATE:
        
        $id = $_REQUEST["id"];
        $tipo = $_REQUEST["tipo"];
        $nombre = $_REQUEST["nombre"];
        $puertas = $_REQUEST["puertas"];
        $plazas = $_REQUEST["plazas"];
        $musica = $_REQUEST["musica"];
        $motor = $_REQUEST["motor"];

        $vehiculo = new TransferVehiculo($id, $tipo, $nombre, $puertas, $plazas, $musica, $motor);
        FrontController::getInstance()->execute($entity, $operation, $vehiculo);
        
        break;
    case Operations::DELETE:
        
        $id = $_REQUEST["id"];
        
        FrontController::getInstance()->execute($entity, $operation, $id);
        
        break;
}