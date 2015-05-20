<?PHP

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

if (!isset($_REQUEST["operation"])) {
    echo "<p><a href='viewVehiculo.php?operation=" . Operations::CREATE . "'><button type='button' >CREAR NUEVO VEHICULO</button></a></p>";
    echo "<p><a href='operationsVehiculo.php?operation=" . Operations::READ . "'><button type='button' >VER VEHICULO</button></a></p>";
    echo "<p><a href='operationsVehiculo.php?operation=" . Operations::UPDATE . "'><button type='button' >EDITAR VEHICULO</button></a></p>";
    echo "<p><a href='operationsVehiculo.php?operation=" . Operations::DELETE . "'><button type='button' >ELIMINAR VEHICULO</button></a></p>";
} else {

    $ids = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::TOLIST, null);

    foreach ($ids as $id) {
        $name = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $id)->getNombre();
        echo "<p><a href='viewVehiculo.php?operation=" . $_REQUEST["operation"] . "&id=$id'><button type='button' >$name</button></a></p>";
    }
}
