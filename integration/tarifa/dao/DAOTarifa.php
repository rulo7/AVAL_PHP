<?php

require_once dirname(dirname(__DIR__)) . '/connection/FactoryConnection.php';
require_once dirname(dirname(__DIR__)) . '/FactoryDAO.php';
require_once dirname(dirname(dirname(__DIR__))) . '/model/tarifa/transfer/TransferTarifa.php';
require_once dirname(dirname(dirname(__DIR__))) . '/model/oficina/transfer/TransferOficina.php';

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


        $grupo = $transferTarifa->getGrupo();
        $oficina = $transferTarifa->getOficina()->getId();
        $modulo_tramos = $transferTarifa->getModulo_tramos();
        $precio_tramo1 = $transferTarifa->getPrecio_tramo1();
        $precio_tramo2 = $transferTarifa->getPrecio_tramo2();
        $precio_tramo3 = $transferTarifa->getPrecio_tramo3();
        $precio_tramo4 = $transferTarifa->getPrecio_tramo4();
        $km_max_diarios = $transferTarifa->getKm_max_diarios();
        $precio_km_extra = $transferTarifa->getPrecio_km_extra();




        $query = "INSERT INTO `tarifas`(`grupo`, `oficina`, `modulo_tramos`, `precio_tramo1`, `precio_tramo2`,`precio_tramo3`,`precio_tramo4`,`km_max_diarios`, `precio_km_extra`)"
                . "VALUES ('$grupo', $oficina, $modulo_tramos,$precio_tramo1,$precio_tramo2,$precio_tramo3,$precio_tramo4,$km_max_diarios,$precio_km_extra)";
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
                $grupo = $datos[0]["grupo"];

                $oficina = FactoryDAO::getInstance()->getDAOOficina()->read($datos[0]["oficina"]);

                $modulo_tramos = $datos[0]["modulo_tramos"];
                $precio_tramo1 = $datos[0]["precio_tramo1"];
                $precio_tramo2 = $datos[0]["precio_tramo2"];
                $precio_tramo3 = $datos[0]["precio_tramo3"];
                $precio_tramo4 = $datos[0]["precio_tramo4"];
                $km_max_diarios = $datos[0]["km_max_diarios"];
                $precio_km_extra = $datos[0]["precio_km_extra"];

                return new TransferTarifa($id, $grupo, $oficina, $modulo_tramos, $precio_tramo1, $precio_tramo2, $precio_tramo3, $precio_tramo4, $km_max_diarios, $precio_km_extra);
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
        $grupo = $transferTarifa->getGrupo();
        $oficina = $transferTarifa->getOficina()->getId();
        $modulo_tramos = $transferTarifa->getModulo_tramos();
        $precio_tramo1 = $transferTarifa->getPrecio_tramo1();
        $precio_tramo2 = $transferTarifa->getPrecio_tramo2();
        $precio_tramo3 = $transferTarifa->getPrecio_tramo3();
        $precio_tramo4 = $transferTarifa->getPrecio_tramo4();
        $km_max_diarios = $transferTarifa->getKm_max_diarios();
        $precio_km_extra = $transferTarifa->getPrecio_km_extra();

        $query = "UPDATE `tarifas`"
                . " SET `grupo`='$grupo',`oficina`=$oficina, "
                . "`modulo_tramos`=$modulo_tramos, `precio_tramo1`=$precio_tramo1,`precio_tramo2`=$precio_tramo2,`precio_tramo3`=$precio_tramo3, "
                . "`precio_tramo4` = $precio_tramo4, `km_max_diarios`=$km_max_diarios, `precio_KM_extra`=$precio_km_extra"
                . " WHERE id=$id";
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

    public function toList() {
        $query = "SELECT * FROM `tarifas`";
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
