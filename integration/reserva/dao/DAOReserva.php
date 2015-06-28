<?php

require_once dirname(dirname(__DIR__)) . '/connection/FactoryConnection.php';
require_once dirname(dirname(dirname(__DIR__))) . '/model/reserva/transfer/TransferReserva.php';

class DAOReserva {

    /** @var IConnection */
    private $connection;

    public function __construct() {
        $this->connection = FactoryConnection::getInstance()->getConnectionMySQL();
    }

    /**
     * Da de alta una reserva en la base de datos
     * @param TransferReserva $transferReserva
     */
    public function create($transferReserva) {

        $id = $transferReserva->getId();
        $tarifa = $transferReserva->getTarifa()->getId();
        $momento_recogida = $transferReserva->getMomento_recogida();
        $momento_devolucion = $transferReserva->getMomento_devolucion();


        if ($transferReserva->getTarifa()->getOficina()->getDevolucion_distinta_recogida()) {
            $oficina_devolucion = $transferReserva->getOficina_devolucion()->getId();
        } else {
            $oficina_devolucion = $transferReserva->getTarifa()->getOficina()->getId();
        }




        $cargado_cuenta = $transferReserva->getCargado_cuenta();
        $email = $transferReserva->getEmail();
        $estado = $transferReserva->getEstado();
        $NIF = $transferReserva->getNIF();
        $nombre = $transferReserva->getNombre();
        $apellidos = $transferReserva->getApellidos();
        $telefono1 = $transferReserva->getTelefono1();
        $telefono2 = $transferReserva->getTelefono2();
        $nacionalidad = $transferReserva->getNacionalidad();
        $fecha_nacimiento = $transferReserva->getFecha_nacimiento();
        $extra_gps = $transferReserva->getExtra_gps();
        $extra_silla_bebe = $transferReserva->getExtra_silla_bebe();
        $extra_silla_elevador = $transferReserva->getExtra_silla_elevador();
        $extra_portaesquis = $transferReserva->getExtra_portaesquis();
        $extra_cadenas = $transferReserva->getExtra_cadenas();

        $query = "INSERT INTO `reservas`"
                . "(`id`, `tarifa`, `momento_recogida`, `momento_devolucion`, `oficina_devolucion`, `cargado_cuenta`, `estado`, `NIF`, `nombre`,"
                . " `apellidos`,`email`, `telefono1`, `telefono2`, `nacionalidad`, `fecha_nacimiento`,`extra_gps`,`extra_silla_bebe`,`extra_silla_elevador`,"
                . "`extra_portaesquis`,`extra_cadenas`) "
                . "VALUES ($id, $tarifa, '$momento_recogida','$momento_devolucion', $oficina_devolucion, $cargado_cuenta,'$estado',"
                . "'$NIF', '$nombre','$apellidos','$email',$telefono1,$telefono2,'$nacionalidad','$fecha_nacimiento',$extra_gps,"
                . "$extra_silla_bebe,$extra_silla_elevador,$extra_portaesquis,$extra_cadenas)";

        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
            echo $query;
        }
    }

    /**
     * Devuelve una reserva registrada en la base de datos a través de su id
     * @param int $id
     * @return TransferReserva
     * @throws Exception
     */
    public function read($id) {
        $query = "SELECT * FROM `reservas` WHERE ID=$id";
        try {
            $datos = $this->connection->read($query);
            if (!$datos) {
                throw new Exception("no se han encontrado resultados");
            } else {

                $id = $datos[0]["ID"];
                $tarifa = FactoryDAO::getInstance()->getDAOTarifa()->read($datos[0]["tarifa"]);
                $momento_recogida = $datos[0]["momento_recogida"];
                $momento_devolucion = $datos[0]["momento_devolucion"];
                $oficina_devolucion = ($datos[0]["oficina_devolucion"] != null) ? FactoryDAO::getInstance()->getDAOOficina()->read($datos[0]["oficina_devolucion"]) : null;
                $cargado_cuenta = $datos[0]["cargado_cuenta"];
                $estado = $datos[0]["estado"];
                $NIF = $datos[0]["NIF"];
                $nombre = $datos[0]["nombre"];
                $apellidos = $datos[0]["apellidos"];
                $email = $datos[0]["email"];
                $telefono1 = $datos[0]["telefono1"];
                $telefono2 = $datos[0]["telefono2"];
                $nacionalidad = $datos[0]["nacionalidad"];
                $fecha_nacimiento = $datos[0]["fecha_nacimiento"];
                $extra_gps = $datos[0]["extra_gps"];
                $extra_silla_bebe = $datos[0]["extra_silla_bebe"];
                $extra_silla_elevador = $datos[0]["extra_silla_elevador"];
                $extra_portaesquis = $datos[0]["extra_portaesquis"];
                $extra_cadenas = $datos[0]["extra_cadenas"];




                return new TransferReserva($id, $tarifa, $momento_recogida, $momento_devolucion, $oficina_devolucion, $cargado_cuenta, $estado, $NIF, $nombre, $apellidos, $email, $telefono1, $telefono2, $nacionalidad, $fecha_nacimiento, $extra_gps, $extra_silla_bebe, $extra_silla_elevador, $extra_portaesquis, $extra_cadenas);
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Modifica un registro de un reserva en la base de datos.
     * @param TransferReserva $transferReserva
     */
    public function update($transferReserva) {

        $id = $transferReserva->getId();
        $tarifa = $transferReserva->getTarifa()->getId();
        $momento_recogida = $transferReserva->getMomento_recogida();
        $momento_devolucion = $transferReserva->getMomento_devolucion();


        if ($transferReserva->getTarifa()->getOficina()->getDevolucion_distinta_recogida()) {
            $oficina_devolucion = $transferReserva->getOficina_devolucion()->getId();
        } else {
            $oficina_devolucion = $transferReserva->getTarifa()->getOficina()->getId();
        }

        $cargado_cuenta = $transferReserva->getCargado_cuenta();
        $email = $transferReserva->getEmail();
        $estado = $transferReserva->getEstado();
        $NIF = $transferReserva->getNIF();
        $nombre = $transferReserva->getNombre();
        $apellidos = $transferReserva->getApellidos();
        $telefono1 = $transferReserva->getTelefono1();
        $telefono2 = $transferReserva->getTelefono2();
        $nacionalidad = $transferReserva->getNacionalidad();
        $fecha_nacimiento = $transferReserva->getFecha_nacimiento();
        $extra_gps = $transferReserva->getExtra_gps();
        $extra_silla_bebe = $transferReserva->getExtra_silla_bebe();
        $extra_silla_elevador = $transferReserva->getExtra_silla_elevador();
        $extra_portaesquis = $transferReserva->getExtra_portaesquis();
        $extra_cadenas = $transferReserva->getExtra_cadenas();

        $query = "UPDATE `reservas` SET "
                . "`tarifa`=$tarifa,`momento_recogida`='$momento_recogida',`momento_devolucion`='$momento_devolucion',"
                . "`oficina_devolucion`=$oficina_devolucion, `cargado_cuenta` = $cargado_cuenta, `email`='$email',`estado`= '$estado', `NIF`='$NIF',"
                . "`nombre` = '$nombre', `apellidos` = '$apellidos', `telefono1`= '$telefono1', `telefono2`='$telefono2',`nacionalidad`='$nacionalidad',"
                . "`fecha_nacimiento`='$fecha_nacimiento',`extra_gps`=$extra_gps,`extra_silla_bebe`=$extra_silla_bebe,`extra_silla_elevador`=$extra_silla_elevador,"
                . "`extra_portaesquis`=$extra_portaesquis,`extra_cadenas`=$extra_cadenas"
                . " WHERE ID=$id";
        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
            echo $query;
        }
    }

    /**
     * Da de baja una reserva de la base de datos a traves de su id
     * @param int $id
     */
    public function delete($id) {

        $query = "DELETE FROM `reservas` WHERE ID=$id";

        try {
            $this->connection->write($query);
        } catch (Exception $exception) {
            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
        }
    }

    /**
     * Devuelve una lista de ids de las reservas registradas
     * @return int[]
     */
    public function toList() {
        $query = "SELECT * FROM `reservas` ORDER BY `momento_recogida` DESC";
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
