<?php

require_once dirname(dirname(dirname(__DIR__))) . '/integration/FactoryDAO.php';

class SATarifa {

    /**
     * Crea el resgistro de una tarifa
     * @param TransferTarifa $transferTarifa
     */
    public function create($transferTarifa) {
        FactoryDAO::getInstance()->getDAOTarifa()->create($transferTarifa);
    }

    /**
     * Devuelve el registro de un tarifa asociado a un id dado
     * @param int $id
     * @return TransferTarifa
     */
    public function read($id) {
        try {
            return FactoryDAO::getInstance()->getDAOTarifa()->read($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Actualiza los datos de un registro de un tarifa
     * @param TransferTarifa $transferTarifa
     */
    public function update($transferTarifa) {
        FactoryDAO::getInstance()->getDAOTarifa()->update($transferTarifa);
    }

    /**
     * da de baja una tarifa de la base del registro
     * @param TransferTarifa $id
     */
    public function delete($id) {
        FactoryDAO::getInstance()->getDAOTarifa()->delete($id);
    }

    /**
     * Devuelve una lista de ids de tarifas registradas
     * @return int[]
     */
    public function toList() {
        return FactoryDAO::getInstance()->getDAOTarifa()->toList();
    }

}
