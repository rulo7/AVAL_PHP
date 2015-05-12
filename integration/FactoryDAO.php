<?php

require_once __DIR__.'/vehiculo/dao/DAOVehiculo.php';
require_once __DIR__.'/tarifa/dao/DAOTarifa.php';
require_once __DIR__.'/oficina/dao/DAOOficina.php';
require_once __DIR__.'/reserva/dao/DAOReserva.php';

class FactoryDAO {
    private static $instance;

    /**
     * Devuelve la instancia de FactoryDAO
     * @return FactoryDAO
     */
    public static function getInstance() {

        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    /**
     * Devuelve una instancia de un DAOVehiculo
     * @return DAOVehiculo
     */
    public function getDAOVehiculo(){
        return new DAOVehiculo();
    }
    
    /**
     * Devuelve una instancia de un DAOTarifa
     * @return DAOTarifa
     */
    public function getDAOTarifa(){
        return new DAOTarifa();
    }
    
    /**
     * Devuelve una instancia de un DAOOficina
     * @return DAOOficina
     */
    public function getDAOOficina(){
        return new DAOOficina();
    }
    
    /**
     * Devuelve una instancia de un DAOReserva
     * @return DAOReserva
     */
    public function getDAOReserva(){
        return new DAOReserva();
    }
}
