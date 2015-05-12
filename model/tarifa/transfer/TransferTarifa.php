<?php

class TransferTarifa {

    private $id;
    /** @var TransferVehiculo */
    private $vehiculo;
    private $precio_3_dias;
    private $precio_4_7_dias;
    private $precio_7_15_dias;
    private $precio_mas_15;
    private $precio_km_extra;

    public function __construct($id, $vehiculo, $precio_3_dias, $precio_4_7_dias, $precio_7_15_dias, $precio_mas_15, $precio_km_extra) {
        $this->id = $id;
        $this->vehiculo = $vehiculo;
        $this->precio_3_dias = $precio_3_dias;
        $this->precio_4_7_dias = $precio_4_7_dias;
        $this->precio_7_15_dias = $precio_7_15_dias;
        $this->precio_mas_15 = $precio_mas_15;
        $this->precio_km_extra = $precio_km_extra;
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return TransferVehiculo
     */
    public function getVehiculo() {
        return $this->vehiculo;
    }

    public function getPrecio_3_dias() {
        return $this->precio_3_dias;
    }

    public function getPrecio_4_7_dias() {
        return $this->precio_4_7_dias;
    }

    public function getPrecio_7_15_dias() {
        return $this->precio_7_15_dias;
    }

    public function getPrecio_mas_15() {
        return $this->precio_mas_15;
    }

    public function getPrecio_km_extra() {
        return $this->precio_km_extra;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setVehiculo($vehiculo) {
        $this->vehiculo = $vehiculo;
    }

    public function setPrecio_3_dias($precio_3_dias) {
        $this->precio_3_dias = $precio_3_dias;
    }

    public function setPrecio_4_7_dias($precio_4_7_dias) {
        $this->precio_4_7_dias = $precio_4_7_dias;
    }

    public function setPrecio_7_15_dias($precio_7_15_dias) {
        $this->precio_7_15_dias = $precio_7_15_dias;
    }

    public function setPrecio_mas_15($precio_mas_15) {
        $this->precio_mas_15 = $precio_mas_15;
    }

    public function setPrecio_km_extra($precio_km_extra) {
        $this->precio_km_extra = $precio_km_extra;
    }

    /**
     * @return string string
     */
    public function __toString() {

        $string = '';
        $string .= $this->id . "<br>";
        $string .= $this->precio_3_dias . "<br>";
        $string .= $this->precio_4_7_dias . "<br>";
        $string .= $this->precio_7_15_dias . "<br>";
        $string .= $this->precio_km_extra . "<br>";
        $string .= $this->precio_mas_15 . "<br>";
        $string .= $this->vehiculo->getNombre();
        
        return $string;
    }

}
