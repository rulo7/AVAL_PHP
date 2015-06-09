<?php

class TransferTarifa {

    private $id;
    private $grupo;
    private $modulo_tramos;
    private $precio_tramo1;
    private $precio_tramo2;
    private $precio_tramo3;
    private $precio_tramo4;
    private $km_max_diarios;
    private $precio_km_extra;

    function getId() {
        return $this->id;
    }

    function __construct($id, $grupo, $modulo_tramos, $precio_tramo1, $precio_tramo2, $precio_tramo3, $precio_tramo4, $km_max_diarios, $precio_km_extra) {
        $this->id = $id;
        $this->grupo = $grupo;
        $this->modulo_tramos = $modulo_tramos;
        $this->precio_tramo1 = $precio_tramo1;
        $this->precio_tramo2 = $precio_tramo2;
        $this->precio_tramo3 = $precio_tramo3;
        $this->precio_tramo4 = $precio_tramo4;
        $this->km_max_diarios = $km_max_diarios;
        $this->precio_km_extra = $precio_km_extra;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function getModulo_tramos() {
        return $this->modulo_tramos;
    }

    function getPrecio_tramo1() {
        return $this->precio_tramo1;
    }

    function getPrecio_tramo2() {
        return $this->precio_tramo2;
    }

    function getPrecio_tramo3() {
        return $this->precio_tramo3;
    }

    function getPrecio_tramo4() {
        return $this->precio_tramo4;
    }

    function getKm_max_diarios() {
        return $this->km_max_diarios;
    }

    function getPrecio_km_extra() {
        return $this->precio_km_extra;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setGrupo(TransferVehiculo $grupo) {
        $this->grupo = $grupo;
    }

    function setModulo_tramos($modulo_tramos) {
        $this->modulo_tramos = $modulo_tramos;
    }

    function setPrecio_tramo1($precio_tramo1) {
        $this->precio_tramo1 = $precio_tramo1;
    }

    function setPrecio_tramo2($precio_tramo2) {
        $this->precio_tramo2 = $precio_tramo2;
    }

    function setPrecio_tramo3($precio_tramo3) {
        $this->precio_tramo3 = $precio_tramo3;
    }

    function setPrecio_tramo4($precio_tramo4) {
        $this->precio_tramo4 = $precio_tramo4;
    }

    function setKm_max_diarios($km_max_diarios) {
        $this->km_max_diarios = $km_max_diarios;
    }

    function setPrecio_km_extra($precio_km_extra) {
        $this->precio_km_extra = $precio_km_extra;
    }

    /**
     * @return string string
     */
    public function __toString() {

        $string = '';
        $string .= $this->id . "<br>";
        $string .= $this->grupo . "<br>";
        $string .= $this->modulo_tramos . "<br>";
        $string .= $this->precio_tramo1 . "<br>";
        $string .= $this->precio_tramo2 . "<br>";
        $string .= $this->precio_tramo3 . "<br>";
        $string .= $this->precio_tramo4 . "<br>";
        $string .= $this->km_max_diarios . "<br>";
        $string .= $this->precio_km_extra . "<br>";


        return $string;
    }

}
