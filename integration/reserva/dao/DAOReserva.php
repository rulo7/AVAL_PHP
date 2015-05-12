<?php

require_once dirname(dirname(__DIR__)) . '/connection/FactoryConnection.php';

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
        $referencia = $transferReserva->getReferencia();
        $tipo = $transferReserva->getTipo();
        $fecha_alta = $transferReserva->getFecha_alta();
        $nombre_cliente = $transferReserva->getNombre_cliente();
        $email = $transferReserva->getEmail();
        $telefono = $transferReserva->getTelefono();
        $id_tarifa = $transferReserva->getTarifa()->getId();
        $id_oficina_entrega = $transferReserva->getOficina_entrega()->getId();
        $id_oficina_recogida = $transferReserva->getOficina_recogida()->getId();
        $fecha_inicio_alquiler = $transferReserva->getFecha_inicio_alquiler();
        $fecha_fin_alquiler = $transferReserva->getFecha_fin_alquiler();
        $precio_total = $transferReserva->getPrecio_total();
        $GPS = $transferReserva->getGps();

        try {
            if (is_null($referencia)) {
                $query = "INSERT INTO `reservas`"
                        . "(`tipo`, `fecha_alta`, `nombre`, `email`, `telefono`, `id_tarifa`, `id_oficina_entrega`,"
                        . " `id_oficina_recogida`, `fecha_inicio_alquiler`, `fecha_fin_alquiler`, `precio_total`, `GPS`) "
                        . "VALUES ('$tipo','$fecha_alta','$nombre_cliente','$email',$telefono,$id_tarifa,$id_oficina_entrega,"
                        . "$id_oficina_recogida,'$fecha_inicio_alquiler','$fecha_fin_alquiler',$precio_total,$GPS)";
            } else {
                $query = "INSERT INTO `reservas`"
                        . "(`referencia`, `tipo`, `fecha_alta`, `nombre`, `email`, `telefono`, `id_tarifa`, `id_oficina_entrega`,"
                        . " `id_oficina_recogida`, `fecha_inicio_alquiler`, `fecha_fin_alquiler`, `precio_total`, `GPS`) "
                        . "VALUES ('$referencia','$tipo','$fecha_alta','$nombre_cliente','$email',$telefono,$id_tarifa,$id_oficina_entrega,"
                        . "$id_oficina_recogida,'$fecha_inicio_alquiler','$fecha_fin_alquiler',$precio_total,$GPS)";
            }

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
                $referencia = $datos[0]["referencia"];
                $tipo = $datos[0]["tipo"];
                $fecha_alta = $datos[0]["fecha_alta"];
                $nombre_cliente = $datos[0]["nombre"];
                $email = $datos[0]["email"];
                $telefono = $datos[0]["telefono"];
                $id_tarifa = $datos[0]["id_tarifa"];
                $id_oficina_entrega = $datos[0]["id_oficina_entrega"];
                $id_oficina_recogida = $datos[0]["id_oficina_recogida"];
                $fecha_inicio_alquiler = $datos[0]["fecha_inicio_alquiler"];
                $fecha_fin_alquiler = $datos[0]["fecha_fin_alquiler"];
                $precio_total = $datos[0]["precio_total"];
                $GPS = $datos[0]["GPS"];
                
                $tarifa = FactoryDAO::getInstance()->getDAOTarifa()->read($id_tarifa);
                $oficina_entrega = FactoryDAO::getInstance()->getDAOOficina()->read($id_oficina_entrega);
                $oficina_recogida = $oficina_entrega->getOficinaRecogida($id_oficina_recogida);
                
                return new TransferReserva($id, $referencia, $tipo, $fecha_alta, $nombre_cliente, $email, $telefono, $tarifa, $oficina_entrega, $oficina_recogida, $fecha_inicio_alquiler, $fecha_fin_alquiler, $precio_total, $GPS);
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
        $referencia = $transferReserva->getReferencia();
        $tipo = $transferReserva->getTipo();
        $fecha_alta = $transferReserva->getFecha_alta();
        $nombre_cliente = $transferReserva->getNombre_cliente();
        $email = $transferReserva->getEmail();
        $telefono = $transferReserva->getTelefono();
        $id_tarifa = $transferReserva->getTarifa()->getId();
        $id_oficina_entrega = $transferReserva->getOficina_entrega()->getId();
        $id_oficina_recogida = $transferReserva->getOficina_recogida()->getId();
        $fecha_inicio_alquiler = $transferReserva->getFecha_inicio_alquiler();
        $fecha_fin_alquiler = $transferReserva->getFecha_fin_alquiler();
        $precio_total = $transferReserva->getPrecio_total();
        $GPS = $transferReserva->getGps();

        try {
            if (is_null($referencia)) {
                $query = "UPDATE `reservas` SET "
                        . "`tipo`='$tipo',`fecha_alta`='$fecha_alta',`nombre`='$nombre_cliente',"
                        . "`email`='$email',`telefono`=$telefono,`id_tarifa`=$id_tarifa,`id_oficina_entrega`=$id_oficina_entrega,"
                        . "`id_oficina_recogida`=$id_oficina_recogida,`fecha_inicio_alquiler`='$fecha_inicio_alquiler',"
                        . "`fecha_fin_alquiler`='$fecha_fin_alquiler',`precio_total`=$precio_total,`GPS`=$GPS"
                        . " WHERE ID=$id";
            } else {
                $query = "UPDATE `reservas` SET "
                        . "`referencia`='$referencia',`tipo`='$tipo',`fecha_alta`='$fecha_alta',`nombre`='$nombre_cliente',"
                        . "`email`='$email',`telefono`=$telefono,`id_tarifa`=$id_tarifa,`id_oficina_entrega`=$id_oficina_entrega,"
                        . "`id_oficina_recogida`=$id_oficina_recogida,`fecha_inicio_alquiler`='$fecha_inicio_alquiler',"
                        . "`fecha_fin_alquiler`='$fecha_fin_alquiler',`precio_total`=$precio_total,`GPS`=$GPS"
                        . " WHERE ID=$id";
            }

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

}
