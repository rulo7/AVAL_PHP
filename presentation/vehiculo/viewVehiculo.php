<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

$operation = $_REQUEST['operation'];
switch ($operation) {
    case Operations::CREATE:

        echo "<form method='post' action='vehiculoExecutor.php?operation=$operation'>";
        //echo "<p>ID: <input type='text'  name='id' id='id_id' placeholder='Ej: 1 required></p>";
        echo "<p>Tipo: <input type='text' name='tipo' placeholder='Ej:Turismo' id='id_tipo' ></p>";
        echo "<p>Nombre: <input type='text'  name='nombre' placeholder='Ej:Fiat Panda' id='id_nombre'  required></p>";
        echo "<p>Puertas: <input type='number'  name='puertas' id='id_puertas' placeholder='Ej:4'  required></p>";
        echo "<p>Plazas: <input type='number'  name='plazas' id='id_plazas' placeholder='Ej:5' required></p>";
        echo "<p>Musica: <input type='checkbox'  name='musica' id='id_musica' value='1'></p>";
        echo "<p>Motor: ";
        echo "<select name='motor' id='id_motor'  required>";
        echo "<option value='diesel'>Diesel</option>";
        echo "<option value='gasolina'>Gasolina</option>";
        echo "<option value='hibrido'>Hibrido</option>";
        echo "</select></p>";
        echo "<p><input type='submit' value='Crear'></p>";
        echo "</form>";

        break;

    case Operations::READ:

        $vehiculo = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $_REQUEST["id"]);

        $id = $vehiculo->getId();
        $tipo = $vehiculo->getTipo();
        $nombre = $vehiculo->getNombre();
        $puertas = $vehiculo->getPuertas();
        $plazas = $vehiculo->getPlazas();
        $musica = ($vehiculo->getMusica()) ? "si" : "no";
        $motor = $vehiculo->getMotor();

        echo "<p>ID: <input readonly type='text'  name='id' id='id_id' value='$id'></p>";
        echo "<p>Tipo: <input readonly type='text' name='tipo' id='id_tipo' value='$tipo'></p>";
        echo "<p>Nombre: <input readonly type='text'  name='nombre' id='id_nombre'  value='$nombre'></p>";
        echo "<p>Puertas: <input readonly type='number'  name='puertas' id='id_puertas' value='$puertas'></p>";
        echo "<p>Plazas: <input readonly type='number'  name='plazas' id='id_plazas' value='$plazas'></p>";
        echo "<p>Musica: $musica</p>";
        echo "<p>Motor: $motor</p>";


        break;

    case Operations::UPDATE:

        $vehiculo = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $_REQUEST["id"]);

        $id = $vehiculo->getId();
        $tipo = $vehiculo->getTipo();
        $nombre = $vehiculo->getNombre();
        $puertas = $vehiculo->getPuertas();
        $plazas = $vehiculo->getPlazas();
        $musica = ($vehiculo->getMusica()) ? "si" : "no";
        $motor = $vehiculo->getMotor();

        echo "<form method='post' action='vehiculoExecutor.php?operation=$operation'>";
        echo "<p>ID: <input redaonly type='text'  name='id' id='id_id' required value='$id'></p>";
        echo "<p>Tipo: <input type='text' name='tipo' id='id_tipo' required value='$tipo'></p>";
        echo "<p>Nombre: <input type='text'  name='nombre' id='id_nombre'  required value='$nombre'></p>";
        echo "<p>Puertas: <input type='number'  name='puertas' id='id_puertas' required value='$puertas'></p>";
        echo "<p>Plazas: <input type='number'  name='plazas' id='id_plazas' required value='$plazas'></p>";

        if ($musica) {
            echo "<p>Musica: <input type='checkbox'  name='musica' id='id_musica'></p>";
        } else {
            echo "<p>Musica: <input type='checkbox'  name='musica' id='id_musica' checked></p>";
        }


        echo "<p>Motor: ";
        echo "<select name='motor' id='id_motor'  required>";
        if ($motor == "diesel") {
            echo "<option value='diesel'>Diesel</option>";
            echo "<option value='gasolina'>Gasolina</option>";
            echo "<option value='hibrido'>Hibrido</option>";
        } else if ($motor == "gasolina") {
            echo "<option value='gasolina'>Gasolina</option>";
            echo "<option value='hibrido'>Hibrido</option>";
            echo "<option value='diesel'>Diesel</option>";
        } else if ($motor == "hibrido") {
            echo "<option value='hibrido'>Hibrido</option>";
            echo "<option value='diesel'>Diesel</option>";
            echo "<option value='gasolina'>Gasolina</option>";
        }
        echo "</select></p>";


        echo "<p><input type='submit' value='Actualizar'></p>";
        echo "</form>";

        break;

    case Operations::DELETE:

        $id = $_REQUEST["id"];
        echo "<p>Seguro de que deseas eliminar?</p>";
        echo "<p><a href='vehiculoExecutor.php?operation=$operation&id=$id' target='_blank'><button type='button' >SI</button></a>";
        echo "<a href='volver' target='_blank'><button type='button' >NO</button></a></p>";

        break;
}