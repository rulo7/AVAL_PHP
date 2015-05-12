<?php

require_once dirname(dirname(dirname(__DIR__))) . '/integration/FactoryDAO.php';

class SAReserva {

    /**
     * Crea el registro de un reserva
     * @param TransferReserva $transferReserva
     */
    public function create($transferReserva) {
        FactoryDAO::getInstance()->getDAOReserva()->create($transferReserva);
    }

    /**
     * Devuelve el registro de un reserva asociado a un id dado
     * @param int $id
     * @return TransferReserva
     */
    public function read($id) {
        try {
            return FactoryDAO::getInstance()->getDAOReserva()->read($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Actualiza los datos de un registro de una reserva
     * @param TransferReserva $transferReserva
     */
    public function update($transferReserva) {
        FactoryDAO::getInstance()->getDAOReserva()->update($transferReserva);
    }

    /**
     * da de baja una reserva del registro
     * @param int $id
     */
    public function delete($id) {
        FactoryDAO::getInstance()->getDAOReserva()->delete($id);
    }

}
