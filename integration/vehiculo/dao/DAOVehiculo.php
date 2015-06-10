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

        $tipo = $transferVehiculo->getTipo();
        $grupo = $transferVehiculo->getGrupo();
        $modelo = $transferVehiculo->getModelo();
        $puertas = $transferVehiculo->getPuertas();
        $plazas = $transferVehiculo->getPlazas();
        $radio = $transferVehiculo->getRadio();
        $aire = $transferVehiculo->getAire();
        $metros_cubicos = $transferVehiculo->getMetros_cubicos();
        $alto = $transferVehiculo->getAlto();
        $ancho = $transferVehiculo->getAncho();
        $largo = $transferVehiculo->getLargo();

        $query = "INSERT INTO `vehiculo`(`tipo`, `grupo`, `modelo`, `puertas`, `plazas`, `radio`, `aire`,`metros_cubicos`,`alto`,`ancho`,`largo`) "
                . "VALUES ('$tipo', '$grupo', '$modelo', '$puertas', '$plazas', '$radio', '$aire','$metros_cubicos','$alto','$ancho','$largo')";
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
        $query = "SELECT * FROM `vehiculo` WHERE ID=$id";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                $id = $datos[0]["ID"];
                $tipo = $datos[0]["tipo"];
                $grupo = $datos[0]["grupo"];
                $modelo = $datos[0]["modelo"];
                $puertas = $datos[0]["puertas"];
                $plazas = $datos[0]["plazas"];
                $radio = $datos[0]["radio"];
                $aire = $datos[0]["aire"];
                $metros_cubicos = $datos[0]["metros_cubicos"];
                $alto = $datos[0]["alto"];
                $ancho = $datos[0]["ancho"];
                $largo = $datos[0]["largo"];

                return new TransferVehiculo($id, $tipo, $grupo, $modelo, $puertas, $plazas, $radio, $aire, $metros_cubicos, $alto, $ancho, $largo);
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
        $grupo = $transferVehiculo->getGrupo();
        $modelo = $transferVehiculo->getModelo();
        $puertas = $transferVehiculo->getPuertas();
        $plazas = $transferVehiculo->getPlazas();
        $radio = $transferVehiculo->getRadio();
        $aire = $transferVehiculo->getAire();
        $metros_cubicos = $transferVehiculo->getMetros_cubicos();
        $alto = $transferVehiculo->getAlto();
        $ancho = $transferVehiculo->getAncho();
        $largo = $transferVehiculo->getLargo();

        $query = "UPDATE `vehiculo` "
                . "SET `tipo`='$tipo',`grupo`='$grupo',`modelo`='$modelo',`puertas`=$puertas,`plazas`=$plazas,`radio`=$radio,`aire`='$aire',`metros_cubicos`='$metros_cubicos',`alto`='$alto',`ancho`='$ancho',`largo`='$largo'"
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
        $query = "DELETE FROM `vehiculo` WHERE ID=$id";
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
        $query = "SELECT * FROM `vehiculo`";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                for ($i = 0; $i < count($datos); $i++) {
                    $ids[$i] = $datos[$i]["ID"];
                }

                return $ids;
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
