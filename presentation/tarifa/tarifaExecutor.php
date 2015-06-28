<?php

require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';
require_once dirname(dirname(__DIR__)) . '/model/TARIFA/transfer/TransferTarifa.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';

$entity = Entities::TARIFA;
$operation = $_REQUEST['operation'];

switch ($operation) {
    case Operations::CREATE:

        //$id = $_REQUEST['id'];
        $grupo = $_REQUEST['grupo'];
        $oficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $_REQUEST['oficina']);
        $modulo_tramos = $_REQUEST['modulo_tramos'];
        $precio_tramo1 = $_REQUEST['precio_tramo1'];
        $precio_tramo2 = $_REQUEST['precio_tramo2'];
        $precio_tramo3 = $_REQUEST['precio_tramo3'];
        $precio_tramo4 = $_REQUEST['precio_tramo4'];
        $km_max_diarios = $_REQUEST['km_max_diarios'];
        $precio_km_extra = $_REQUEST['precio_km_extra'];

        $tarifa = new TransferTarifa(0, $grupo, $oficina, $modulo_tramos, $precio_tramo1, $precio_tramo2, $precio_tramo3, $precio_tramo4, $km_max_diarios, $precio_km_extra);
        FrontController::getInstance()->execute($entity, $operation, $tarifa);

        break;
    case Operations::READ:
        // no hace nada, en un futuro informa que alguien ha leido algo ...
        break;
    case Operations::UPDATE:

        $id = $_REQUEST['id'];
        $grupo = $_REQUEST['grupo'];
        $oficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $_REQUEST['oficina']);
        $modulo_tramos = $_REQUEST['modulo_tramos'];
        $precio_tramo1 = $_REQUEST['precio_tramo1'];
        $precio_tramo2 = $_REQUEST['precio_tramo2'];
        $precio_tramo3 = $_REQUEST['precio_tramo3'];
        $precio_tramo4 = $_REQUEST['precio_tramo4'];
        $km_max_diarios = $_REQUEST['km_max_diarios'];
        $precio_km_extra = $_REQUEST['precio_km_extra'];

        $tarifa = new TransferTarifa($id, $grupo, $oficina, $modulo_tramos, $precio_tramo1, $precio_tramo2, $precio_tramo3, $precio_tramo4, $km_max_diarios, $precio_km_extra);
        FrontController::getInstance()->execute($entity, $operation, $tarifa);

        break;
    case Operations::DELETE:

        $id = $_REQUEST["id"];

        FrontController::getInstance()->execute($entity, $operation, $id);


        break;
}

echo "<p><a href='operationsTarifa.php'><button type='button' >VOLVER</button></a></p>";
