<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

$operation = $_REQUEST['operation'];
switch ($operation) {
    case Operations::CREATE:

        echo "<form method='post' action='oficinaExecutor.php?operation=$operation'>";
        //echo "<p>ID: <input type='text'  name='id' id='id_id' placeholder='Ej: 1 required></p>";
        echo "<p>Localidad: <input type='text'  name='localidad' placeholder='Alicante puerto, Madrid sur...' id='id_localidad'  required></p>";
        echo "<p>Direccion de recogida: <input size='100' type='text'  name='direccion_recogida' id='id_direccion_recogida' placeholder='Calle Falsa 123, 29023 Madrid...' required></p>";
        echo "<p>Admite devolucion distinta de recogida: <input type='checkbox'  name='devolucion_distinta_recogida' id='id_devolucion_distinta_recogida' placeholder='1'></p>";
        echo "<p>Telefono: <input type='number'  name='telefono' id='id_telefono' placeholder='628456616' required></p>";
        echo "<p>Hora de apertura(hh:mm): <input type='time'  name='hora_apertura' id='id_hora_apertura' placeholder='12:56' required></p>";
        echo "<p>Hora de cierre(hh:mm): <input type='time'  name='hora_cierre' id='id_hora_cierre' placeholder='21:00' required></p>";
        echo "<p>Operador: <input type='text'  name='operador' placeholder='euroscar, arval...' id='id_localidad'  required></p>";
        echo "<p><input type='submit' placeholder='Crear'></p>";
        echo "</form>";

        break;

    case Operations::READ:

        $transferOficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $_REQUEST["id"]);

        $id = $transferOficina->getId();
        $localidad = $transferOficina->getLocalidad();
        $direccion_recogida = $transferOficina->getDireccion_recogida();
        $devolucion_distinta_recogida = ($transferOficina->getDevolucion_distinta_recogida()) ? "si" : "no";
        $telefono = $transferOficina->getTelefono();
        $hora_apertura = $transferOficina->getHora_apertura();
        $hora_cierre = $transferOficina->getHora_cierre();
        $operador = $transferOficina->getOperador();


        echo "<p>ID: <input readonly type='text'  name='id' id='id_id' value='$id' ></p>";
        echo "<p>Localidad: <input readonly type='text'  name='localidad' value='$localidad' id='id_localidad'  ></p>";
        echo "<p>Direccion de recogida: <input size='100' readonly type='text'  name='direccion_recogida' id='id_direccion_recogida' value='$direccion_recogida' ></p>";
        echo "<p>Admite devolucion distinta de recogida: $devolucion_distinta_recogida</p>";
        echo "<p>Telefono: <input readonly type='number'  name='telefono' id='id_telefono' value='$telefono' ></p>";
        echo "<p>Hora de apertura(hh:mm): <input readonly type='time'  name='hora_apertura' id='id_hora_apertura' value='$hora_apertura' ></p>";
        echo "<p>Hora de cierre(hh:mm): <input readonly type='time'  name='hora_cierre' id='id_hora_cierre' value='$hora_cierre' ></p>";
        echo "<p>Operador: <input readonly type='text'  name='operador' value='$operador' id='id_localidad'  ></p>";



        break;

    case Operations::UPDATE:

        $transferOficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $_REQUEST["id"]);

        $id = $transferOficina->getId();
        $localidad = $transferOficina->getLocalidad();
        $direccion_recogida = $transferOficina->getDireccion_recogida();
        $devolucion_distinta_recogida = $transferOficina->getDevolucion_distinta_recogida();
        $telefono = $transferOficina->getTelefono();
        $hora_apertura = $transferOficina->getHora_apertura();
        $hora_cierre = $transferOficina->getHora_cierre();
        $operador = $transferOficina->getOperador();

        echo "<form method='post' action='oficinaExecutor.php?operation=$operation'>";
        echo "<p>ID: <input readonly type='text'  name='id' id='id_id' value='$id' ></p>";
        echo "<p>Localidad: <input  type='text'  name='localidad' value='$localidad' id='id_localidad'  ></p>";
        echo "<p>Direccion de recogida: <input size='100'  type='text'  name='direccion_recogida' id='id_direccion_recogida' value='$direccion_recogida' ></p>";
        echo "<p>Admite devolucion distinta de recogida: <input  type='checkbox'  name='devolucion_distinta_recogida' id='id_devolucion_distinta_recogida' value='1' " . (($devolucion_distinta_recogida) ? "checked" : "") . " ></p>";
        echo "<p>Telefono: <input  type='number'  name='telefono' id='id_telefono' value='$telefono' ></p>";
        echo "<p>Hora de apertura(hh:mm): <input  type='time'  name='hora_apertura' id='id_hora_apertura' value='$hora_apertura' ></p>";
        echo "<p>Hora de cierre(hh:mm): <input  type='time'  name='hora_cierre' id='id_hora_cierre' value='$hora_cierre' ></p>";
        echo "<p>Operador: <input  type='text'  name='operador' value='$operador' id='id_localidad'  ></p>";
        echo "<p><input type='submit' value='Editar'></p>";
        echo "</form>";

        break;

    case Operations::DELETE:

        $id = $_REQUEST["id"];
        echo "<p>Seguro de que deseas eliminar?</p>";
        echo "<p><a href='oficinaExecutor.php?operation=$operation&id=$id'><button type='button' >SI</button></a>";
        echo "<a href='operationsOficina.php'><button type='button'>NO</button></a></p>";

        break;
}