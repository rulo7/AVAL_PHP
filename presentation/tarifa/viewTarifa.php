<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

$operation = $_REQUEST['operation'];
switch ($operation) {
    case Operations::CREATE:

        echo "<form method='post' action='tarifaExecutor.php?operation=$operation'>";
        //echo "<p>ID: <input type='text'  name='id' id='id_id' placeholder='Ej: 1 required></p>";
        echo "<p>Grupo de vehiculos: <select name='grupo' id='id_grupo'>";
        echo "<option value='A'>A</option>";
        echo "<option value='B'>B</option>";
        echo "<option value='C'>C</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "</select></p>";



        $idOficinas = FrontController::getInstance()->execute(Entities::OFICINA, Operations::TOLIST, null);

        if (sizeof($idOficinas) > 0) {
            echo "<p>Localidad: <select name='oficina' id='id_oficina'>";
            foreach ($idOficinas as $idOficina) {
                $localidad = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $idOficina)->getLocalidad();

                echo "<option value='$idOficina'>$localidad</option>";
            }
            echo "</select></p>";
        } else {
            echo "<p>No existen oficinas, crea alguna si quieres registrar una tarifa</p>";
        }

        echo "<p>Tramos: ";
        echo "<select name='modulo_tramos' id='id_grupo'>";
        echo "<option value='1'>1-3,4-7,8-12,13+</option>";
        echo "<option value='2'>1-5,6-9,10-15,15+</option>";
        echo "</select></p>";

        echo "<p>Precio tramo 1(eur): <input step='0.01' type='number'  name='precio_tramo1' id='id_precio_tramo1' placeholder='13.42'></p>";
        echo "<p>Precio tramo 2(eur): <input step='0.01' type='number'  name='precio_tramo2' id='id_precio_tramo2' placeholder='16.50'></p>";
        echo "<p>Precio tramo 3(eur): <input step='0.01' type='number'  name='precio_tramo3' id='id_precio_tramo3' placeholder='10'></p>";
        echo "<p>Precio tramo 4(eur): <input step='0.01' type='number'  name='precio_tramo4' id='id_precio_tramo4' placeholder='18.5'></p>";
        echo "<p>Km maximos diarios: (Km): <input step='0.01' type='number'  name='km_max_diarios' id='id_km_max_diarios' placeholder='350.22'></p>";
        echo "<p>Precio Km extra: (eur): <input step='0.01' type='number'  name='precio_km_extra' id='id_precio_km_extra' placeholder='3.25'></p>";
        echo "<p><input type='submit' value='Crear'></p>";
        echo "</form>";

        break;

    case Operations::READ:

        $transferTarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $_REQUEST["id"]);

        $id = $transferTarifa->getId();
        $grupo = $transferTarifa->getGrupo();
        $localidad = $transferTarifa->getOficina()->getLocalidad();
        $modulo_tramos = $transferTarifa->getModulo_tramos();
        $precio_tramo1 = $transferTarifa->getPrecio_tramo1();
        $precio_tramo2 = $transferTarifa->getPrecio_tramo2();
        $precio_tramo3 = $transferTarifa->getPrecio_tramo3();
        $precio_tramo4 = $transferTarifa->getPrecio_tramo4();
        $km_max_diarios = $transferTarifa->getKm_max_diarios();
        $precio_km_extra = $transferTarifa->getPrecio_km_extra();

        echo "<p>ID: <input readonly type='text'  name='id' id='id_id' value='$id'></p>";
        echo "<p>Grupo de vehiculos: <input readonly type='text'  name='grupo' id='id_grupo' value='$grupo'></p>";
        echo "<p>Localidad: <input readonly type='text'  name='localidad' id='id_localidad' value='$localidad'></p>";
        echo "<p>Tramos: ";
        switch ($modulo_tramos) {
            case 1:
                echo "1-3,4-7,8-12,13+";
                break;
            case 2:
                echo "1-5,6-9,10-15,15+";
                break;
        }
        echo "</p>";
        echo "<p>Precio tramo 1(eur): <input readonly step='0.01' type='number'  name='precio_tramo_1' id='id_precio_tramo_1' value='$precio_tramo1'></p>";
        echo "<p>Precio tramo 2(eur): <input readonly step='0.01' type='number'  name='precio_tramo_2' id='id_precio_tramo_2' value='$precio_tramo2'></p>";
        echo "<p>Precio tramo 3(eur): <input readonly step='0.01' type='number'  name='precio_tramo_3' id='id_precio_tramo_3' value='$precio_tramo3'></p>";
        echo "<p>Precio tramo 4(eur): <input readonly step='0.01' type='number'  name='precio_tramo_4' id='id_precio_tramo_4' value='$precio_tramo4'></p>";
        echo "<p>Km maximos diarios: (Km): <input readonly step='0.01' type='number'  name='km_max_diarios' id='id_km_max_diarios' value='$km_max_diarios'></p>";
        echo "<p>Precio Km extra: (eur): <input readonly step='0.01' type='number'  name='precio_km_extra' id='id_precio_km_extra' value='$precio_km_extra'></p>";


        break;

    case Operations::UPDATE:

        $transferTarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $_REQUEST["id"]);

        $id = $transferTarifa->getId();
        $grupo = $transferTarifa->getGrupo();
        $oficina = $transferTarifa->getOficina();
        $modulo_tramos = $transferTarifa->getModulo_tramos();
        $precio_tramo1 = $transferTarifa->getPrecio_tramo1();
        $precio_tramo2 = $transferTarifa->getPrecio_tramo2();
        $precio_tramo3 = $transferTarifa->getPrecio_tramo3();
        $precio_tramo4 = $transferTarifa->getPrecio_tramo4();
        $km_max_diarios = $transferTarifa->getKm_max_diarios();
        $precio_km_extra = $transferTarifa->getPrecio_km_extra();

        echo "<form method='post' action='tarifaExecutor.php?operation=$operation'>";


        echo "<form method='post' action='tarifaExecutor.php?operation=$operation'>";
        echo "<p>ID: <input readonly type='text'  name='id' id='id_id' value='$id' required></p>";
        echo "<p>Grupo de vehiculos (actual: $grupo): <select name='grupo' id='id_grupo'>";
        echo "<option value='A'>A</option>";
        echo "<option value='B'>B</option>";
        echo "<option value='C'>C</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
        echo "</select></p>";



        $idOficinas = FrontController::getInstance()->execute(Entities::OFICINA, Operations::TOLIST, null);


        echo "<p>Localidad (actual: " . $oficina->getLocalidad() . "): <select name='oficina' id='id_oficina'>";
        foreach ($idOficinas as $idOficina) {
            $localidad = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $idOficina)->getLocalidad();

            echo "<option value='$idOficina'>$localidad</option>";
        }
        echo "</select></p>";


        echo "<p>Tramos (actual: ";
        switch ($modulo_tramos) {
            case 1:
                echo "1-3,4-7,8-12,13+";
                break;
            case 2:
                echo "1-5,6-9,10-15,15+";
                break;
        }
        echo "): ";

        echo "<select name='modulo_tramos' id='id_grupo'>";
        echo "<option value='1'>1-3,4-7,8-12,13+</option>";
        echo "<option value='2'>1-5,6-9,10-15,15+</option>";
        echo "</select></p>";

        echo "<p>Precio tramo 1(eur): <input  step='0.01' type='number'  name='precio_tramo1' id='id_precio_tramo1' value='$precio_tramo1'></p>";
        echo "<p>Precio tramo 2(eur): <input  step='0.01' type='number'  name='precio_tramo2' id='id_precio_tramo2' value='$precio_tramo2'></p>";
        echo "<p>Precio tramo 3(eur): <input  step='0.01' type='number'  name='precio_tramo3' id='id_precio_tramo3' value='$precio_tramo3'></p>";
        echo "<p>Precio tramo 4(eur): <input  step='0.01' type='number'  name='precio_tramo4' id='id_precio_tramo4' value='$precio_tramo4'></p>";
        echo "<p>Km maximos diarios: (Km): <input  step='0.01' type='number'  name='km_max_diarios' id='id_km_max_diarios' value='$km_max_diarios'></p>";
        echo "<p>Precio Km extra: (eur): <input  step='0.01' type='number'  name='precio_km_extra' id='id_precio_km_extra' value='$precio_km_extra'></p>";
        echo "<p><input type='submit' value='Editar'></p>";
        echo "</form>";


        break;

    case Operations::DELETE:

        $id = $_REQUEST["id"];
        echo "<p>Seguro de que deseas eliminar?</p>";
        echo "<p><a href='tarifaExecutor.php?operation=$operation&id=$id'><button type='button' >SI</button></a>";
        echo "<a href='operationsTarifa.php'><button type='button' >NO</button></a></p>";

        break;
}