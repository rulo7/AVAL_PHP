<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';



echo "<p>Seleccione la localidad en la que desea realizar la reserva<p>";
echo "<form method='post' action='viewTarificator2.php'>";


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




echo "<p><input type='submit' value='Siguiente'></p>";
echo "</form>";

