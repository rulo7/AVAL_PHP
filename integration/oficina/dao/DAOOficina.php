<?php

require_once dirname(dirname(__DIR__)) . '/connection/FactoryConnection.php';

class DAOOficina {

    /** @var IConnection */
    private $connection;

    public function __construct() {
        $this->connection = FactoryConnection::getInstance()->getConnectionMySQL();
    }

    /**
     * Da de alta un oficina en la base de datos
     * @param TransferOficina $transferOficina
     */
    public function create($transferOficina) {

        $localidad = $transferOficina->getLocalidad();
        $direccion_recogida = $transferOficina->getDireccion_recogida();
        $devolucion_distinta_recogida = $transferOficina->getDevolucion_distinta_recogida();
        $telefono = $transferOficina->getTelefono();
        $hora_apertura = $transferOficina->getHora_apertura();
        $hora_cierre = $transferOficina->getHora_cierre();
        $operador = $transferOficina->getOperador();

        $query = "INSERT INTO `oficinas`"
                . "(`localidad`,`direccion_recogida`,`devolucion_distinta_recogida`, `telefono`, `hora_apertura`, `hora_cierre`,`operador`) "
                . "VALUES ('$localidad','$direccion_recogida','$devolucion_distinta_recogida','$telefono',$hora_apertura','$hora_cierre','$operador')";

        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
            echo $query;
        }
    }

    /**
     * Devuelve una oficina registrada en la base de datos a través de su id
     * @param int $id
     * @return TransferOficina
     * @throws Exception
     */
    public function read($id) {
        $query = "SELECT * FROM `oficinas` WHERE ID=$id";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                $id = $datos[0]["ID"];
                $localidad = $datos[0]["localidad"];
                $direccion_recogida = $datos[0]["direccion_recogida"];
                $devolucion_distinta_recogida = $datos[0]["devolucion_distinta_recogida"];
                $telefono = $datos[0]["telefono"];
                $hora_apertura = $datos[0]["hora_apertura"];
                $hora_cierre = $datos[0]["hora_cierre"];
                $operador = $datos[0]["operador"];


                return new TransferOficina($id, $localidad, $direccion_recogida, $devolucion_distinta_recogida, $telefono, $hora_apertura, $hora_cierre, $operador);
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Modifica un registro de un oficina en la base de datos.
     * @param TransferOficina $transferOficina
     */
    public function update($transferOficina) {

        $id = $transferOficina->getId();
        $localidad = $transferOficina->getLocalidad();
        $direccion_recogida = $transferOficina->getDireccion_recogida();
        $devolucion_distinta_recogida = $transferOficina->getDevolucion_distinta_recogida();
        $telefono = $transferOficina->getTelefono();
        $hora_apertura = $transferOficina->getHora_apertura();
        $hora_cierre = $transferOficina->getHora_cierre();
        $operador = $transferOficina->getOperador();

        $query = "UPDATE `oficinas` SET "
                . "`ID`=$id,`localidad`='$localidad',`direccion_recogida` = $direccion_recogida, `devolucion_distinta_recogida` = $devolucion_distinta_recogida,"
                . "`telefono`=$telefono,`hora_apertura`='$hora_apertura',`hora_cierre`='$hora_cierre',`operador` = $operador "
                . "WHERE `ID`=$id";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
            echo $query;
        }
    }

    /**
     * Da de baja una oficina de la base de datos a traves de su id
     * @param int $id
     */
    public function delete($id) {

        $query = "DELETE FROM `oficinas` WHERE `ID`=$id";

        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }
    }

    /**
     * Devuelve una lista de todos los IDs de los behiculos de la flota
     * @return ArrayObject
     */
    public function readAll() {
        try {
            $datos = $this->connection->read("SELECT ID FROM `oficinas`");

            $i = 0;
            foreach ($datos as $oficina) {
                $oficinas[$i] = $this->read($oficina["ID"]);
                $i++;
            }

            return $oficinas;
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }
    }

}
