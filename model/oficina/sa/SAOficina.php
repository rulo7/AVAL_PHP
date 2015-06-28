<?php

require_once dirname(dirname(dirname(__DIR__))) . '/integration/FactoryDAO.php';

class SAOficina {

    /**
     * Crea el registro de un oficina
     * @param TransferOficina $transferOficina
     */
    public function create($transferOficina) {
        FactoryDAO::getInstance()->getDAOOficina()->create($transferOficina);
    }

    /**
     * Devuelve el registro de un oficina asociado a un id dado
     * @param int $id
     * @return TransferOficina
     */
    public function read($id) {
        try {
            return FactoryDAO::getInstance()->getDAOOficina()->read($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Actualiza los datos de un registro de un oficina
     * @param TransferOficina $transferOficina
     */
    public function update($transferOficina) {
        FactoryDAO::getInstance()->getDAOOficina()->update($transferOficina);
    }

    /**
     * Da de baja un oficina del registro
     * @param TransferOficina $id
     */
    public function delete($id) {
        FactoryDAO::getInstance()->getDAOOficina()->delete($id);
    }

    /**
     * Devuelve una lista de ids de oficinas registradas
     * @return int[]
     */
    public function toList() {
        return FactoryDAO::getInstance()->getDAOOficina()->toList();
    }

}
