<?php

class TransferReserva {

    private $id;
    private $referencia;
    private $tipo;
    private $fecha_alta;
    private $nombre_cliente;
    private $email;
    private $telefono;
    /*     * @var TransferTarifa */
    private $tarifa;
    /*     * @var TransferOficina */
    private $oficina_entrega;
    /*     * @var TransferOficina */
    private $oficina_recogida;
    private $fecha_inicio_alquiler;
    private $fecha_fin_alquiler;
    private $precio_total;
    //boolean
    private $gps;

    public function __construct($id, $referencia, $tipo, $fecha_alta, $nombre_cliente, $email, $telefono, $tarifa, $oficina_entrega, $oficina_recogida, $fecha_inicio_alquiler, $fecha_fin_alquiler, $precio_total, $gps) {
        $this->id = $id;
        $this->referencia = $referencia;
        $this->tipo = $tipo;
        $this->fecha_alta = $fecha_alta;
        $this->nombre_cliente = $nombre_cliente;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->tarifa = $tarifa;
        $this->oficina_entrega = $oficina_entrega;
        $this->oficina_recogida = $oficina_recogida;
        $this->fecha_inicio_alquiler = $fecha_inicio_alquiler;
        $this->fecha_fin_alquiler = $fecha_fin_alquiler;
        $this->precio_total = $precio_total;
        $this->gps = $gps;
    }

    public function getId() {
        return $this->id;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getFecha_alta() {
        return $this->fecha_alta;
    }

    public function getNombre_cliente() {
        return $this->nombre_cliente;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * 
     * @return TransferTarifa
     */
    public function getTarifa() {
        return $this->tarifa;
    }

    /**
     * 
     * @return TransferOficina
     */
    public function getOficina_entrega() {
        return $this->oficina_entrega;
    }

    /**
     * 
     * @return TransferOficina
     */
    public function getOficina_recogida() {
        return $this->oficina_recogida;
    }

    public function getFecha_inicio_alquiler() {
        return $this->fecha_inicio_alquiler;
    }

    public function getFecha_fin_alquiler() {
        return $this->fecha_fin_alquiler;
    }

    public function getGps() {
        return $this->gps;
    }

    public function getPrecio_total() {
        return $this->precio_total;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setReferencia($referencia) {
        $this->referencia = $referencia;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    public function setNombre_cliente($nombre_cliente) {
        $this->nombre_cliente = $nombre_cliente;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setTarifa(TransferTarifa $tarifa) {
        $this->tarifa = $tarifa;
    }

    public function setOficina_entrega(TransferOficina $oficina_entrega) {
        $this->oficina_entrega = $oficina_entrega;
    }

    public function setOficina_recogida(TransferOficina $oficina_recogida) {
        $this->oficina_recogida = $oficina_recogida;
    }

    public function setFecha_inicio_alquiler($fecha_inicio_alquiler) {
        $this->fecha_inicio_alquiler = $fecha_inicio_alquiler;
    }

    public function setFecha_fin_alquiler($fecha_fin_alquiler) {
        $this->fecha_fin_alquiler = $fecha_fin_alquiler;
    }

    public function setPrecio_total($precio_total) {
        $this->precio_total = $precio_total;
    }

    public function setGps($gps) {
        $this->gps = $gps;
    }

    /**
     * @return string string
     */
    public function __toString() {

        $string = '';
        $string .= $this->id . "<br>";
        if(is_null($this->referencia)){
            $string .= "NULL <br>";
        }else{
            $string .= $this->referencia . "<br>";
        }
        $string .= $this->tipo . "<br>";
        $string .= $this->fecha_alta . "<br>";
        $string .= $this->nombre_cliente . "<br>";
        $string .= $this->email . "<br>";
        $string .= $this->telefono . "<br>";
        $string .= $this->tarifa->__toString() . "<br>";
        $string .= $this->oficina_entrega->__toString() . "<br>";
        $string .= $this->oficina_recogida->__toString() . "<br>";
        $string .= $this->fecha_inicio_alquiler . "<br>";
        $string .= $this->fecha_fin_alquiler . "<br>";
        $string .= $this->precio_total . "<br>";
        $string .= $this->gps . "<br>";


        return $string;
    }

}
