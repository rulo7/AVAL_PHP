<?php

require_once __DIR__.'/DataConstants.php';
require_once __DIR__.'/ConnectionMySQL.php';

class FactoryConnection {

    private static $instance;

    /**
     * Devuelve la instancia de FactoryConnection
     * @return FactoryConnection
     */
    public static function getInstance() {

        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 
     * @return ConnectionMySQL
     */
    public function getConnectionMySQL() {
        return new ConnectionMySQL(DataConstants::$hostName, DataConstants::$user, DataConstants::$password, DataConstants::$dataBaseName);
    }

}
