<?php

require_once dirname(dirname(__DIR__)) . '/connection/FactoryConnection.php';
require_once dirname(dirname(dirname(__DIR__))) . '/model/vehiculo/transfer/TransferVehiculo.php';

class DAOVehiculo {
    
    /** @var IConnection */
    private $connection;

    public function __construct() {
        $this->connection = FactoryConnection::getInstance()->getConnectionMySQL();
    }

    /**
     * Da de alta un vehiculo en la base de datos
     * @param TransferVehiculo $transferVehiculo
     */
    public function create($transferVehiculo) {

        $id = $transferVehiculo->getId();
        $tipo = $transferVehiculo->getTipo();
        $nombre = $transferVehiculo->getNombre();
        $puertas = $transferVehiculo->getPuertas();
        $plazas = $transferVehiculo->getPlazas();
        $musica = $transferVehiculo->getMusica();
        $motor = $transferVehiculo->getMotor();

        $query = "INSERT INTO `flota`(`tipo`, `nombre`, `puertas`, `plazas`, `musica`, `motor`) "
                . "VALUES ('$tipo','$nombre',$puertas,$plazas,$musica,'$motor')";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
            echo $query;
        }
    }

    /**
     * Devuelve un vehiculo registrado en la base de datos a través de su id
     * @param int $id
     * @return TransferVehiculo
     * @throws Exception
     */
    public function read($id) {
        $query = "SELECT * FROM `flota` WHERE ID=$id";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                $id = $datos[0]["ID"];
                $tipo = $datos[0]["tipo"];
                $nombre = $datos[0]["nombre"];
                $puertas = $datos[0]["puertas"];
                $plazas = $datos[0]["plazas"];
                $musica = $datos[0]["musica"];
                $motor = $datos[0]["motor"];

                return new TransferVehiculo($id, $tipo, $nombre, $puertas, $plazas, $musica, $motor);
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Modifica un registro de un vehiculo en la base de datos.
     * @param TransferVehiculo $transferVehiculo
     */
    public function update($transferVehiculo) {

        $id = $transferVehiculo->getId();
        $tipo = $transferVehiculo->getTipo();
        $nombre = $transferVehiculo->getNombre();
        $puertas = $transferVehiculo->getPuertas();
        $plazas = $transferVehiculo->getPlazas();
        $musica = $transferVehiculo->getMusica();
        $motor = $transferVehiculo->getMotor();

        $query = "UPDATE `flota` "
                . "SET `tipo`='$tipo',`nombre`='$nombre',`puertas`=$puertas,`plazas`=$plazas,`musica`=$musica,`motor`='$motor'"
                . "WHERE ID=$id";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }
    }

    /**
     * Da de baja un vehiculo de la base de datos a traves de su id
     * @param int $id
     */
    public function delete($id) {
        $query = "DELETE FROM `flota` WHERE ID=$id";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }
    }
    
    /**
     * Devuelve una lista de ids de vehiculos registrados
     * @return int[]
     */
    public function toList() {
        $query = "SELECT * FROM `flota`";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                for ($i = 0; $i < count($datos); $i++){
                    $ids[$i] = $datos[$i]["ID"];
                }

                return $ids;
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
