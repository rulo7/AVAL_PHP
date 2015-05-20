<?php

require_once dirname(dirname(dirname(__DIR__))) . '/integration/FactoryDAO.php';

class SAVehiculo {

    /**
     * Crea el resgistro de un vehiculo
     * @param TransferVehiculo $transferVehiculo
     */
    public function create($transferVehiculo) {
        FactoryDAO::getInstance()->getDAOVehiculo()->create($transferVehiculo);
    }

    /**
     * Devuelve el registro de un vehiculo asociado a un id dado
     * @param int $id
     * @return TransferVehiculo
     */
    public function read($id) {
        try {
            return FactoryDAO::getInstance()->getDAOVehiculo()->read($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Actualiza los datos de un registro de un vehiculo
     * @param TransferVehiculo $transferVehiculo
     */
    public function update($transferVehiculo) {
        FactoryDAO::getInstance()->getDAOVehiculo()->update($transferVehiculo);
    }

    /**
     * da de baja un vehiculo de la flota
     * @param TransferVehiculo $id
     */
    public function delete($id) {
        FactoryDAO::getInstance()->getDAOVehiculo()->delete($id);
    }
    
    /**
     * Devuelve una lista de ids de vehiculos registrados
     * @return int[]
     */
    public function toList() {
        return FactoryDAO::getInstance()->getDAOVehiculo()->toList();
    }
}
