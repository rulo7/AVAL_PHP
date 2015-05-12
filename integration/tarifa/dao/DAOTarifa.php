<?php

require_once dirname(dirname(__DIR__)) . '/connection/FactoryConnection.php';

class DAOTarifa {

    /** @var IConnection */
    private $connection;

    public function __construct() {
        $this->connection = FactoryConnection::getInstance()->getConnectionMySQL();
    }

    /**
     * Da de alta un tarifa en la base de datos
     * @param TransferTarifa $transferTarifa
     */
    public function create($transferTarifa) {

        $id = $transferTarifa->getId();
        $precio_3_dias = $transferTarifa->getPrecio_3_dias();
        $precio_4_7_dias = $transferTarifa->getPrecio_4_7_dias();
        $precio_7_15_dias = $transferTarifa->getPrecio_7_15_dias();
        $precio_mas_15 = $transferTarifa->getPrecio_mas_15();
        $precio_km_extra = $transferTarifa->getPrecio_km_extra();
        $id_vehiculo = $transferTarifa->getVehiculo()->getId();

        $query = "INSERT INTO `tarifas`(`id_vehiculo`, `precio_3_dias`, `precio_4_7_dias`, `precio_7_15_dias`, `precio_mas_15`, `precio_KM_extra`)"
                . "VALUES ('$id_vehiculo','$precio_3_dias',$precio_4_7_dias,$precio_7_15_dias,$precio_mas_15,'$precio_km_extra')";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
            echo $query;
        }
    }

    /**
     * Devuelve un tarifa registrado en la base de datos a través de su id
     * @param int $id
     * @return TransferTarifa
     * @throws Exception
     */
    public function read($id) {
        $query = "SELECT * FROM `tarifas` WHERE ID=$id";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                $id = $datos[0]["ID"];
                $precio_3_dias = $datos[0]["precio_3_dias"];
                $precio_4_7_dias = $datos[0]["precio_4_7_dias"];
                $precio_7_15_dias = $datos[0]["precio_7_15_dias"];
                $precio_mas_15 = $datos[0]["precio_mas_15"];
                $precio_km_extra = $datos[0]["precio_km_extra"];
                $id_vehiculo = $datos[0]["id_vehiculo"];

                //Se obtiene el vehiculo
                $vehiculo = FactoryDAO::getInstance()->getDAOVehiculo()->read($id_vehiculo);

                return new TransferTarifa($id, $vehiculo, $precio_3_dias, $precio_4_7_dias, $precio_7_15_dias, $precio_mas_15, $precio_km_extra);
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Modifica un registro de un tarifa en la base de datos.
     * @param TransferTarifa $transferTarifa
     */
    public function update($transferTarifa) {

        $id = $transferTarifa->getId();
        $precio_3_dias = $transferTarifa->getPrecio_3_dias();
        $precio_4_7_dias = $transferTarifa->getPrecio_4_7_dias();
        $precio_7_15_dias = $transferTarifa->getPrecio_7_15_dias();
        $precio_mas_15 = $transferTarifa->getPrecio_mas_15();
        $precio_km_extra = $transferTarifa->getPrecio_km_extra();
        $id_vehiculo = $transferTarifa->getVehiculo()->getId();

        $query = "UPDATE `tarifas`"
                . " SET `id_vehiculo` = $id_vehiculo, `precio_3_dias` = $precio_3_dias, `precio_4_7_dias` = $precio_4_7_dias, `precio_7_15_dias` = $precio_7_15_dias, `precio_mas_15` = $precio_mas_15, `precio_KM_extra` = $precio_km_extra WHERE id=$id";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }
    }

    /**
     * Da de baja un tarifa de la base de datos a traves de su id
     * @param int $id
     */
    public function delete($id) {
        $query = "DELETE FROM `tarifas` WHERE ID=$id";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }
    }

}
