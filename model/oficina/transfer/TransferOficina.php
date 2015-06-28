<?php

class TransferOficina {

    private $id;
    private $localidad;
    private $direccion_recogida;
    //boolean
    private $devolucion_distinta_recogida;
    private $telefono;
    private $hora_apertura;
    private $hora_cierre;
    private $operador;

    function __construct($id, $localidad, $direccion_recogida, $devolucion_distinta_recogida, $telefono, $hora_apertura, $hora_cierre, $operador) {
        $this->id = $id;
        $this->localidad = $localidad;
        $this->direccion_recogida = $direccion_recogida;
        $this->devolucion_distinta_recogida = $devolucion_distinta_recogida;
        $this->telefono = $telefono;
        $this->hora_apertura = $hora_apertura;
        $this->hora_cierre = $hora_cierre;
        $this->operador = $operador;
    }

    function getId() {
        return $this->id;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion_recogida() {
        return $this->direccion_recogida;
    }

    function getDevolucion_distinta_recogida() {
        return $this->devolucion_distinta_recogida;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getHora_apertura() {
        return $this->hora_apertura;
    }

    function getHora_cierre() {
        return $this->hora_cierre;
    }

    function getOperador() {
        return $this->operador;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    function setDireccion_recogida($direccion_recogida) {
        $this->direccion_recogida = $direccion_recogida;
    }

    function setDevolucion_distinta_recogida($devolucion_distinta_recogida) {
        $this->devolucion_distinta_recogida = $devolucion_distinta_recogida;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setHora_apertura($hora_apertura) {
        $this->hora_apertura = $hora_apertura;
    }

    function setHora_cierre($hora_cierre) {
        $this->hora_cierre = $hora_cierre;
    }

    function setOperador($operador) {
        $this->operador = $operador;
    }

    /**
     * @return string string
     */
    public function __toString() {

        $string = '';
        $string .= $this->id . "<br>";
        $string .= $this->localidad . "<br>";
        $string .= $this->telefono . "<br>";
        $string .= $this->direccion_recogida . "<br>";
        $string .= $this->hora_apertura . "<br>";
        $string .= $this->hora_fin . "<br>";
        $string .= $this->devolucion_distinta_recogida . "<br>";
        $string .= $this->operador . "<br>";


        return $string;
    }

}
