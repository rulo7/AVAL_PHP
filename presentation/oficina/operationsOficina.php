<?PHP

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

if (!isset($_REQUEST["operation"])) {
    echo "<p><a href='viewOficina.php?operation=" . Operations::CREATE . "'><button type='button' >CREAR NUEVA OFICINA</button></a></p>";
    echo "<p><a href='operationsOficina.php?operation=" . Operations::READ . "'><button type='button' >VER OFICINA</button></a></p>";
    echo "<p><a href='operationsOficina.php?operation=" . Operations::UPDATE . "'><button type='button' >EDITAR OFICINA</button></a></p>";
    echo "<p><a href='operationsOficina.php?operation=" . Operations::DELETE . "'><button type='button' >ELIMINAR OFICINA</button></a></p>";
} else {

    $ids = FrontController::getInstance()->execute(Entities::OFICINA, Operations::TOLIST, null);

    if (sizeof($ids) > 0) {
        foreach ($ids as $id) {
            $localidad = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $id)->getLocalidad();
            echo "<p><a href='viewOficina.php?operation=" . $_REQUEST["operation"] . "&id=$id'><button type='button' >$localidad</button></a></p>";
        }
    } else {
        echo "sin resultados";
    }
}
