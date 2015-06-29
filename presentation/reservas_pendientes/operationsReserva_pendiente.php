<?PHP

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';



$ids = FrontController::getInstance()->execute(Entities::RESERVA, Operations::TOLIST, null);

if (sizeof($ids) > 0) {
    foreach ($ids as $id) {
        $reserva = FrontController::getInstance()->execute(Entities::RESERVA, Operations::READ, $id);

        if($reserva->getPendiente()) {
            $id = $reserva->getId();
            $momento_recogida = $reserva->getMomento_recogida();
            $nombre = $reserva->getNombre();
            $apellidos = $reserva->getApellidos();

            echo "<p><a href='viewReserva_pendiente.php?id=$id'><button type='button' >"
            . "$id: [$momento_recogida] - $nombre $apellidos</button></a></p>";
        }
    }
} else {
    echo "sin resultados";
}

