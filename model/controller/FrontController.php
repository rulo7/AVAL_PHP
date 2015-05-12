<?php

require_once dirname(__DIR__) . '/FactorySA.php';

class FrontController {

    private static $instance;

    /**
     * Devuelve la instancia de FrontController
     * @return FrontController
     */
    public static function getInstance() {

        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Ejecuta una operacion del modelo en la capa de integracion y a su vez
     * actualiza la informacion en la capa de la vista.
     * 
     * @param Entities $entity
     * @param Operations $operation
     * @param TransferVehiculo $data
     */
    public function execute($entity, $operation, $data) {

        switch ($entity) {
            case Entities::VEHICULO:

                switch ($operation) {
                    case Operations::CREATE:
                        FactorySA::getInstance()->getSAVehiculo()->create($data);
                        break;
                    case Operations::READ:
                        try {
                            return FactorySA::getInstance()->getSAVehiculo()->read($data);
                        } catch (Exception $exception) {
                            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
                        }
                        break;
                    case Operations::UPDATE:
                        FactorySA::getInstance()->getSAVehiculo()->update($data);
                        break;
                    case Operations::DELETE:
                        FactorySA::getInstance()->getSAVehiculo()->delete($data);
                        break;
                }

                break;

            case Entities::TARIFA:

                switch ($operation) {
                    case Operations::CREATE:
                        FactorySA::getInstance()->getSATarifa()->create($data);
                        break;
                    case Operations::READ:
                        try {
                            return FactorySA::getInstance()->getSATarifa()->read($data);
                        } catch (Exception $exception) {
                            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
                        }
                        break;
                    case Operations::UPDATE:
                        FactorySA::getInstance()->getSATarifa()->update($data);
                        break;
                    case Operations::DELETE:
                        FactorySA::getInstance()->getSATarifa()->delete($data);
                        break;
                }

                break;

            case Entities::OFICINA:

               switch ($operation) {
                    case Operations::CREATE:
                        FactorySA::getInstance()->getSAOficina()->create($data);
                        break;
                    case Operations::READ:
                        try {
                            return FactorySA::getInstance()->getSAOficina()->read($data);
                        } catch (Exception $exception) {
                            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
                        }
                        break;
                    case Operations::UPDATE:
                        FactorySA::getInstance()->getSAOficina()->update($data);
                        break;
                    case Operations::DELETE:
                        FactorySA::getInstance()->getSAOficina()->delete($data);
                        break;
                }

                break;

            case Entities::RESERVA:

                switch ($operation) {
                    case Operations::CREATE:
                        FactorySA::getInstance()->getSAReserva()->create($data);
                        break;
                    case Operations::READ:
                        try {
                            return FactorySA::getInstance()->getSAReserva()->read($data);
                        } catch (Exception $exception) {
                            echo 'Excepction was captured: ' . $exception->getMessage() . "<br>";
                        }
                        break;
                    case Operations::UPDATE:
                        FactorySA::getInstance()->getSAReserva()->update($data);
                        break;
                    case Operations::DELETE:
                        FactorySA::getInstance()->getSAReserva()->delete($data);
                        break;
                }


                break;
        }
    }

}
