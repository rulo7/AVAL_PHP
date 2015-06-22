<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';




echo "<form method='post' action='tarificatorExecutor.php'>";


$idTarifas = FrontController::getInstance()->execute(Entities::TARIFA, Operations::TOLIST, null);




echo "<p><input type='submit' value='Siguiente'></p>";
echo "</form>";

