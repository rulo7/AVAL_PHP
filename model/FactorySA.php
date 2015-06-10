<?php

require_once __DIR__.'/vehiculo/sa/SAVehiculo.php';
require_once __DIR__.'/tarifa/sa/SATarifa.php';
require_once __DIR__.'/oficina/sa/SAOficina.php';
require_once __DIR__.'/reserva/sa/SAReserva.php';

class FactorySA {
    private static $instance;

    /**
     * Devuelve la instancia de FactorySA
     * @return FactorySA
     */
    public static function getInstance() {

        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    /**
     * Devuelve la instancia de un SAVehiculo 
     * @return SAVehiculo
     */
    public function getSAVehiculo(){
        return new SAVehiculo();
    }
    
    /**
     * Devuelve la instancia de un SATarifa 
     * @return SATarifa
     */
    public function getSATarifa(){
        return new SATarifa();
    }
    
    /**
     * Devuelve la instancia de un SAOficina
     * @return SAOficina
     */
    public function getSAOficina(){
        return new SAOficina();
    }
    
    /**
     * Devuelve la instancia de un SAReserva
     * @return SAReserva
     */
    public function getSAReserva(){
        return new SAReserva();
    }
  
}
