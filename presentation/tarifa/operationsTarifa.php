<?PHP

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

if (!isset($_REQUEST["operation"])) {
    echo "<p><a href='viewTarifa.php?operation=" . Operations::CREATE . "'><button type='button' >CREAR NUEVA TARIFA</button></a></p>";
    echo "<p><a href='operationsTarifa.php?operation=" . Operations::READ . "'><button type='button' >VER TARIFA</button></a></p>";
    echo "<p><a href='operationsTarifa.php?operation=" . Operations::UPDATE . "'><button type='button' >EDITAR TARIFA</button></a></p>";
    echo "<p><a href='operationsTarifa.php?operation=" . Operations::DELETE . "'><button type='button' >ELIMINAR TARIFA</button></a></p>";
} else {

    $ids = FrontController::getInstance()->execute(Entities::TARIFA, Operations::TOLIST, null);

    if (sizeof($ids) > 0) {
        foreach ($ids as $id) {

            $tarifaGrupo = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $id)->getGrupo();
            $tarifaLocalidad = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $id)->getOficina()->getLocalidad();

            echo "<p><a href='viewTarifa.php?operation=" . $_REQUEST["operation"] . "&id=$id'><button type='button' >Grupo $tarifaGrupo en $tarifaLocalidad</button></a></p>";
        }
    } else {
        echo "sin resultados";
    }
}
