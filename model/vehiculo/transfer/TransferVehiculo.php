<?php

class TransferVehiculo {

    private $id;
    private $tipo;
    private $grupo;
    private $modelo;
    private $puertas;
    private $plazas;
    //boolean
    private $radio;
    //boolean
    private $aire;
    private $metros_cubicos;
    private $alto;
    private $ancho;
    private $largo;

    function __construct($id, $tipo, $grupo, $modelo, $puertas, $plazas, $radio, $aire, $metros_cubicos, $alto, $ancho, $largo) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->grupo = $grupo;
        $this->modelo = $modelo;
        $this->puertas = $puertas;
        $this->plazas = $plazas;
        $this->radio = $radio;
        $this->aire = $aire;
        $this->metros_cubicos = $metros_cubicos;
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->largo = $largo;
    }

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getPuertas() {
        return $this->puertas;
    }

    function getPlazas() {
        return $this->plazas;
    }

    function getRadio() {
        return $this->radio;
    }

    function getAire() {
        return $this->aire;
    }

    function getMetros_cubicos() {
        return $this->metros_cubicos;
    }

    function getAlto() {
        return $this->alto;
    }

    function getAncho() {
        return $this->ancho;
    }

    function getLargo() {
        return $this->largo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setPuertas($puertas) {
        $this->puertas = $puertas;
    }

    function setPlazas($plazas) {
        $this->plazas = $plazas;
    }

    function setRadio($radio) {
        $this->radio = $radio;
    }

    function setAire($aire) {
        $this->aire = $aire;
    }

    function setMetros_cubicos($metros_cubicos) {
        $this->metros_cubicos = $metros_cubicos;
    }

    function setAlto($alto) {
        $this->alto = $alto;
    }

    function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    function setLargo($largo) {
        $this->largo = $largo;
    }

    /**
     * @return string string
     */
    public function __toString() {

        $string = '';
     // $string .= $this->id . "<br>";
		$string .= "Grupo: " . $this->grupo . "<br>";
        $string .= "Tipo: " .$this->tipo . "<br>";
        $string .= "Modelo: " .$this->modelo . "<br>";
        $string .= "Puertas: " .$this->puertas . "<br>";
        $string .= "Plazas: " .$this->plazas . "<br>";
        $string .= "Radio: " .$this->radio . "<br>";
        $string .= "Aire: " .$this->aire . "<br>";
        $string .= "Metros cubicos: " .$this->metros_cubicos . "<br>";
        $string .= "Alto: " .$this->alto . "<br>";
        $string .= "Ancho: " .$this->ancho . "<br>";
        $string .="Largo: " . $this->largo . "<br>";
    }

}
