<?php

class TransferVehiculo {
    private $id;
    private $tipo;
    private $nombre;
    private $puertas;
    private $plazas;
    private $musica;
    private $motor;
    
    public function __construct($id, $tipo, $nombre, $puertas, $plazas, $musica, $motor) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nombre = $nombre;
        $this->puertas = $puertas;
        $this->plazas = $plazas;
        $this->musica = $musica;
        $this->motor = $motor;
    }
    
    

    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPuertas() {
        return $this->puertas;
    }

    public function getPlazas() {
        return $this->plazas;
    }

    public function getMusica() {
        return $this->musica;
    }

    public function getMotor() {
        return $this->motor;
    }

    
    public function setId($id) {
        $this->id = $id;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPuertas($puertas) {
        $this->puertas = $puertas;
    }

    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }

    public function setMusica($musica) {
        $this->musica = $musica;
    }

    public function setMotor($motor) {
        $this->motor = $motor;
    }
    
    /**
     * @return string string
     */
    public function __toString() {
        
        $string = '';
        $string .= $this->id . "<br>";
        $string .= $this->motor . "<br>";
        $string .= $this->musica . "<br>";
        $string .= $this->nombre . "<br>";
        $string .= $this->plazas . "<br>";
        $string .= $this->puertas . "<br>";
        $string .= $this->tipo . "<br>";
        
        return $string;
                
    }

    
    
}
