<?php

require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';
require_once dirname(dirname(__DIR__)) . '/model/reserva/transfer/TransferReserva.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';

$entity = Entities::RESERVA;
$operation = $_REQUEST['operation'];

switch ($operation) {
    case Operations::CREATE:

        //$id = $_REQUEST['id'];
        $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $_REQUEST['tarifa']);
        $momento_recogida = $_REQUEST['momento_recogida_date'] . " " . $_REQUEST['momento_recogida_time'];
        $momento_devolucion = $_REQUEST['momento_devolucion_date'] . " " . $_REQUEST['momento_devolucion_time'];
        $oficina_devolucion = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $_REQUEST['oficina_devolucion']);
        $cargado_cuenta = $_REQUEST['cargado_cuenta'];
        $estado = $_REQUEST['estado'];
        $NIF = $_REQUEST['NIF'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $email = $_REQUEST['email'];
        $telefono1 = $_REQUEST['telefono1'];
        $telefono2 = $_REQUEST['telefono2'];
        $nacionalidad = $_REQUEST['nacionalidad'];
        $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $extra_gps = (isset($_REQUEST['extra_gps'])) ? 1 : 0;
        $extra_silla_bebe = (isset($_REQUEST['extra_silla_bebe'])) ? 1 : 0;
        $extra_silla_elevador = (isset($_REQUEST['extra_silla_elevador'])) ? 1 : 0;
        $extra_portaesquis = (isset($_REQUEST['extra_portaesquis'])) ? 1 : 0;
        $extra_cadenas = (isset($_REQUEST['extra_cadenas'])) ? 1 : 0;

        $reserva = new TransferReserva(0, $tarifa, $momento_recogida, $momento_devolucion, $oficina_devolucion, $cargado_cuenta, $estado, $NIF, $nombre, $apellidos, $email, $telefono1, $telefono2, $nacionalidad, $fecha_nacimiento, $extra_gps, $extra_silla_bebe, $extra_silla_elevador, $extra_portaesquis, $extra_cadenas);
        FrontController::getInstance()->execute($entity, $operation, $reserva);

        break;
    case Operations::READ:
        // no hace nada, en un futuro informa que alguien ha leido algo ...
        break;
    case Operations::UPDATE:

        $id = $_REQUEST['id'];
        $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $_REQUEST['tarifa']);
        $momento_recogida = $_REQUEST['momento_recogida_date'] . " " . $_REQUEST['momento_recogida_time'];
        $momento_devolucion = $_REQUEST['momento_devolucion_date'] . " " . $_REQUEST['momento_devolucion_time'];
        $oficina_devolucion = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $_REQUEST['oficina_devolucion']);
        $cargado_cuenta = $_REQUEST['cargado_cuenta'];
        $estado = $_REQUEST['estado'];
        $NIF = $_REQUEST['NIF'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $email = $_REQUEST['email'];
        $telefono1 = $_REQUEST['telefono1'];
        $telefono2 = $_REQUEST['telefono2'];
        $nacionalidad = $_REQUEST['nacionalidad'];
        $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $extra_gps = (isset($_REQUEST['extra_gps'])) ? 1 : 0;
        $extra_silla_bebe = (isset($_REQUEST['extra_silla_bebe'])) ? 1 : 0;
        $extra_silla_elevador = (isset($_REQUEST['extra_silla_elevador'])) ? 1 : 0;
        $extra_portaesquis = (isset($_REQUEST['extra_portaesquis'])) ? 1 : 0;
        $extra_cadenas = (isset($_REQUEST['extra_cadenas'])) ? 1 : 0;

        $reserva = new TransferReserva($id, $tarifa, $momento_recogida, $momento_devolucion, $oficina_devolucion, $cargado_cuenta, $estado, $NIF, $nombre, $apellidos, $email, $telefono1, $telefono2, $nacionalidad, $fecha_nacimiento, $extra_gps, $extra_silla_bebe, $extra_silla_elevador, $extra_portaesquis, $extra_cadenas);
        FrontController::getInstance()->execute($entity, $operation, $reserva);

        break;
    case Operations::DELETE:

        $id = $_REQUEST["id"];

        FrontController::getInstance()->execute($entity, $operation, $id);


        break;
}

echo "<p><a href='operationsReserva.php'><button type='button' >VOLVER</button></a></p>";
