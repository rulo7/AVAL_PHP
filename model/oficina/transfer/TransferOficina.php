<?php

class TransferOficina {

    private $id;
    private $localidad;
    private $telefono;
    private $direccion;
    private $hora_apertura;
    private $hora_fin;

    /**
     * NULL en caso de que no tenga.
     * Un array de oficinas en caso contrario.
     */
    private $oficinas_recogida;

    public function __construct($id, $localidad, $telefono, $direccion, $hora_apertura, $hora_fin, $oficinas_recogida) {
        $this->id = $id;
        $this->localidad = $localidad;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->hora_apertura = $hora_apertura;
        $this->hora_fin = $hora_fin;
        $this->oficinas_recogida = $oficinas_recogida;
    }

    public function getId() {
        return $this->id;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getHora_apertura() {
        return $this->hora_apertura;
    }

    public function getHora_fin() {
        return $this->hora_fin;
    }

    public function getOficinas_recogida() {
        return $this->oficinas_recogida;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setHora_apertura($hora_apertura) {
        $this->hora_apertura = $hora_apertura;
    }

    public function setHora_fin($hora_fin) {
        $this->hora_fin = $hora_fin;
    }

    public function setOficinas_recogida(ArrayObject $oficinas_recogida) {
        $this->oficinas_recogida = $oficinas_recogida;
    }

    /**
     * Devuelve una oficina de las de recogida asignadas
     * @param int $id_oficina_recogida
     * @return TransferOficina
     */
    public function getOficinaRecogida($id_oficina_recogida) {
        foreach ($this->oficinas_recogida as $oficina) {
            if ($oficina->getID() == $id_oficina_recogida) {
                return $oficina;
            }
        }

        return NULL;
    }

    /**
     * @return string string
     */
    public function __toString() {

        $string = '';
        $string .= $this->id . "<br>";
        $string .= $this->localidad . "<br>";
        $string .= $this->telefono . "<br>";
        $string .= $this->direccion . "<br>";
        $string .= $this->hora_apertura . "<br>";
        $string .= $this->hora_fin . "<br>";

        if(!is_null($this->oficinas_recogida)) {
            foreach ($this->oficinas_recogida as $oficina_recogida) {
                $string .= "_________________" . "<br>";
                $string .= $oficina_recogida . "<br>";
            }
        }else{
            $string .= "NULL <br>";
        }


        return $string;
    }

}
