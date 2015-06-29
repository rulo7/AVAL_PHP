<?php

require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';
require_once dirname(dirname(__DIR__)) . '/model/reserva/transfer/TransferReserva.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';



$cargado_cuenta = $_REQUEST["cargado_cuenta"];
$estado = $_REQUEST["estado"];
$pendiente = false;

$reserva = FrontController::getInstance()->execute(Entities::RESERVA, Operations::READ, $_REQUEST["id"]);
$reserva->setCargado_cuenta($cargado_cuenta);
$reserva->setEstado($estado);
$reserva->setPendiente(false);

FrontController::getInstance()->execute(Entities::RESERVA, Operations::UPDATE, $reserva);

echo "<h1>Reserva Confirmada</h1>";
echo "<p><a href='operationsReserva_pendiente.php'><button type='button' >VOLVER</button></a></p>";
