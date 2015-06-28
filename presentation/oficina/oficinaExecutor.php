<?php

require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';
require_once dirname(dirname(__DIR__)) . '/model/oficina/transfer/TransferOficina.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';

$entity = Entities::OFICINA;
$operation = $_REQUEST['operation'];

switch ($operation) {
    case Operations::CREATE:

        $localidad = $_REQUEST['localidad'];
        $direccion_recogida = $_REQUEST['direccion_recogida'];
        $devolucion_distinta_recogida = $_REQUEST['devolucion_distinta_recogida'];
        $telefono = $_REQUEST['telefono'];
        $hora_apertura = $_REQUEST['hora_apertura'];
        $hora_cierre = $_REQUEST['hora_cierre'];
        $operador = $_REQUEST['operador'];

        $oficina = new TransferOficina(0, $localidad, $direccion_recogida, $devolucion_distinta_recogida, $telefono, $hora_apertura, $hora_cierre, $operador);
        FrontController::getInstance()->execute($entity, $operation, $oficina);

        break;
    case Operations::READ:
        // no hace nada, en un futuro informa que alguien ha leido algo ...
        break;
    case Operations::UPDATE:

        $id = $_REQUEST["id"];
        $localidad = $_REQUEST['localidad'];
        $direccion_recogida = $_REQUEST['direccion_recogida'];
        $devolucion_distinta_recogida = $_REQUEST['devolucion_distinta_recogida'];
        $telefono = $_REQUEST['telefono'];
        $hora_apertura = $_REQUEST['hora_apertura'];
        $hora_cierre = $_REQUEST['hora_cierre'];
        $operador = $_REQUEST['operador'];

        $oficina = new TransferOficina($id, $localidad, $direccion_recogida, $devolucion_distinta_recogida, $telefono, $hora_apertura, $hora_cierre, $operador);
        FrontController::getInstance()->execute($entity, $operation, $oficina);

        break;
    case Operations::DELETE:

        $id = $_REQUEST["id"];

        FrontController::getInstance()->execute($entity, $operation, $id);


        break;
}

echo "<p><a href='operationsOficina.php'><button type='button' >VOLVER</button></a></p>";
