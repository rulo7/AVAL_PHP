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

        $id = $transferOficina->getId();
        $localidad = $transferOficina->getLocalidad();
        $telefono = $transferOficina->getTelefono();
        $direccion = $transferOficina->getDireccion();
        $hora_apertura = $transferOficina->getHora_apertura();
        $hora_fin = $transferOficina->getHora_fin();

        try {
            $query = "INSERT INTO `oficinas_entrega_vehiculo`"
                    . "(`localidad`, `telefono`, `direccion`, `hora_apertura`, `hora_fin`) "
                    . "VALUES ('$localidad',$telefono,'$direccion','$hora_apertura','$hora_fin')";

            $this->connection->write($query);

            if (!is_null($transferOficina->getOficinas_recogida())) {

                $id_oficina_entrega_vehiculo = $this->connection->read("SELECT `ID` FROM `oficinas_entrega_vehiculo` ORDER BY ID DESC LIMIT 1")[0]["ID"];

                foreach ($transferOficina->getOficinas_recogida() as $oficina) {

                    $id = $oficina->getId();
                    $localidad = $oficina->getLocalidad();
                    $telefono = $oficina->getTelefono();
                    $direccion = $oficina->getDireccion();
                    $hora_apertura = $oficina->getHora_apertura();
                    $hora_fin = $oficina->getHora_fin();


                    $query = "INSERT INTO `oficinas_recogida_vehiculo`"
                            . "(`id_oficina_entrega_vehiculo`, `localidad`, `telefono`, `direccion`, `hora_apertura`, `hora_fin`) "
                            . "VALUES ($id_oficina_entrega_vehiculo,'$localidad',$telefono,'$direccion','$hora_apertura','$hora_fin')";
                    $this->connection->write($query);
                }
            }
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
        $query = "SELECT * FROM `oficinas_entrega_vehiculo` WHERE ID=$id";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                $id = $datos[0]["ID"];
                $localidad = $datos[0]["localidad"];
                $telefono = $datos[0]["telefono"];
                $direccion = $datos[0]["direccion"];
                $hora_apertura = $datos[0]["hora_apertura"];
                $hora_fin = $datos[0]["hora_fin"];

                // comprobamos si posee oficinas de recogida;
                $datos = $this->connection->read("SELECT * FROM `oficinas_recogida_vehiculo` WHERE `id_oficina_entrega_vehiculo`=$id");

                if (!$datos) {
                    $oficinas_recogida = NULL;
                } else {
                    $i = 0;
                    while ($i < sizeof($datos)) {

                        $id2 = $datos[$i]["ID"];
                        $localidad2 = $datos[$i]["localidad"];
                        $telefono2 = $datos[$i]["telefono"];
                        $direccion2 = $datos[$i]["direccion"];
                        $hora_apertura2 = $datos[$i]["hora_apertura"];
                        $hora_fin2 = $datos[$i]["hora_fin"];

                        $oficinas_recogida[$i] = new TransferOficina($id2, $localidad2, $telefono2, $direccion2, $hora_apertura2, $hora_fin2, NULL);
                        $i++;
                    }
                }

                return new TransferOficina($id, $localidad, $telefono, $direccion, $hora_apertura, $hora_fin, $oficinas_recogida);
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
        $telefono = $transferOficina->getTelefono();
        $direccion = $transferOficina->getDireccion();
        $hora_apertura = $transferOficina->getHora_apertura();
        $hora_fin = $transferOficina->getHora_fin();

        try {

            if (is_null($transferOficina->getOficinas_recogida())) {
                $query = "UPDATE `oficinas_entrega_vehiculo` SET "
                        . "`localidad`='$localidad',`telefono`=$telefono,`direccion`='$direccion',`hora_apertura`='$hora_apertura',`hora_fin`='$hora_fin' "
                        . "WHERE `ID`=$id";
                $this->connection->write($query);

                $query = "DELETE FROM `oficinas_recogida_vehiculo` WHERE `id_oficina_entrega_vehiculo`=$id";
                $this->connection->write($query);
            } else {

                $query = "UPDATE `oficinas_entrega_vehiculo` SET "
                        . "`localidad`='$localidad',`telefono`=$telefono,`direccion`='$direccion',`hora_apertura`='$hora_apertura',`hora_fin`='$hora_fin' "
                        . "WHERE `ID`=$id";
                $this->connection->write($query);

                $id_oficina_entrega_vehiculo2 = $id;

                foreach ($transferOficina->getOficinas_recogida() as $oficina) {

                    $id2 = $oficina->getId();
                    $localidad2 = $oficina->getLocalidad();
                    $telefono2 = $oficina->getTelefono();
                    $direccion2 = $oficina->getDireccion();
                    $hora_apertura2 = $oficina->getHora_apertura();
                    $hora_fin2 = $oficina->getHora_fin();


                    if (!$this->connection->read("SELECT * FROM `oficinas_recogida_vehiculo` WHERE `ID`=$id2")) {
                        $query = "INSERT INTO `oficinas_recogida_vehiculo`"
                                . "(`id_oficina_entrega_vehiculo`, `localidad`, `telefono`, `direccion`, `hora_apertura`, `hora_fin`) "
                                . "VALUES ($id_oficina_entrega_vehiculo2,'$localidad2',$telefono2,'$direccion2','$hora_apertura2','$hora_fin2')";
                    } else {
                        $query = "UPDATE `oficinas_recogida_vehiculo` SET "
                                . "`id_oficina_entrega_vehiculo`=$id_oficina_entrega_vehiculo2,`localidad`='$localidad2',`telefono`=$telefono2,`direccion`='$direccion2',`hora_apertura`='$hora_apertura2',`hora_fin`='$hora_fin2' "
                                . "WHERE `ID`=$id2";
                    }

                    $this->connection->write($query);
                }
            }
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

        $query = "DELETE FROM `oficinas_recogida_vehiculo` WHERE `id_oficina_entrega_vehiculo`=$id";

        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }

        $query = "DELETE FROM `oficinas_entrega_vehiculo` WHERE `ID`=$id";

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
            $datos = $this->connection->read("SELECT ID FROM `oficinas_entrega_vehiculo`");

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
