<?PHP

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

if (!isset($_REQUEST["operation"])) {
    echo "<p><a href='viewReserva.php?operation=" . Operations::CREATE . "'><button type='button' >CREAR NUEVA RESERVA</button></a></p>";
    echo "<p><a href='operationsReserva.php?operation=" . Operations::READ . "'><button type='button' >VER RESERVA</button></a></p>";
    echo "<p><a href='operationsReserva.php?operation=" . Operations::UPDATE . "'><button type='button' >EDITAR RESERVA</button></a></p>";
    echo "<p><a href='operationsReserva.php?operation=" . Operations::DELETE . "'><button type='button' >ELIMINAR RESERVA</button></a></p>";
} else {

    $ids = FrontController::getInstance()->execute(Entities::RESERVA, Operations::TOLIST, null);

    if (sizeof($ids) > 0) {
        foreach ($ids as $id) {
            $reserva = FrontController::getInstance()->execute(Entities::RESERVA, Operations::READ, $id);

            $id = $reserva->getId();
            $momento_recogida = $reserva->getMomento_recogida();
            $nombre = $reserva->getNombre();
            $apellidos = $reserva->getApellidos();



            echo "<p><a href='viewReserva.php?operation=" . $_REQUEST["operation"] . "&id=$id'><button type='button' >"
            . "$id: [$momento_recogida] - $nombre $apellidos</button></a></p>";
        }
    } else {
        echo "sin resultados";
    }
}
