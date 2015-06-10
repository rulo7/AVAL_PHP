<?php

class TransferReserva {

    private $id;
    /*     * @var TransferTarifa */
    private $tarifa;
    private $momento_recogida;
    private $momento_devolucion;
    /*     * @var TransferOficina */
    private $oficina_devolucion;
    private $cargado_cuenta;
    private $estado;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono1;
    private $telefono2;
    private $nacionalidad;
    private $fecha_nacimiento;
    private $extra_gps;
    private $extra_silla_niño;
    private $extra_silla_elevador;
    private $extra_portaesquis;
    private $extra_cadenas;

    function __construct($id, $tarifa, $momento_recogida, $momento_devolucion, $oficina_devolucion, $cargado_cuenta, $estado, $nombre, $apellidos, $email, $telefono1, $telefono2, $nacionalidad, $fecha_nacimiento, $extra_gps, $extra_silla_niño, $extra_silla_elevador, $extra_portaesquis, $extra_cadenas) {
        $this->id = $id;
        $this->tarifa = $tarifa;
        $this->momento_recogida = $momento_recogida;
        $this->momento_devolucion = $momento_devolucion;
        $this->oficina_devolucion = $oficina_devolucion;
        $this->cargado_cuenta = $cargado_cuenta;
        $this->estado = $estado;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->nacionalidad = $nacionalidad;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->extra_gps = $extra_gps;
        $this->extra_silla_niño = $extra_silla_niño;
        $this->extra_silla_elevador = $extra_silla_elevador;
        $this->extra_portaesquis = $extra_portaesquis;
        $this->extra_cadenas = $extra_cadenas;
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    /**
     * 
     * @return TransferTarifa
     */
    function getTarifa() {
        return $this->tarifa;
    }

    function getMomento_recogida() {
        return $this->momento_recogida;
    }

    function getMomento_devolucion() {
        return $this->momento_devolucion;
    }

    /**
     * 
     * @return TransferOficina
     */
    function getOficina_devolucion() {
        return $this->oficina_devolucion;
    }

    function getCargado_cuenta() {
        return $this->cargado_cuenta;
    }

    function getEstado() {
        return $this->estado;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getTelefono1() {
        return $this->telefono1;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function getNacionalidad() {
        return $this->nacionalidad;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getExtra_gps() {
        return $this->extra_gps;
    }

    function getExtra_silla_niño() {
        return $this->extra_silla_niño;
    }

    function getExtra_silla_elevador() {
        return $this->extra_silla_elevador;
    }

    function getExtra_portaesquis() {
        return $this->extra_portaesquis;
    }

    function getExtra_cadenas() {
        return $this->extra_cadenas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTarifa($tarifa) {
        $this->tarifa = $tarifa;
    }

    function setMomento_recogida($momento_recogida) {
        $this->momento_recogida = $momento_recogida;
    }

    function setMomento_devolucion($momento_devolucion) {
        $this->momento_devolucion = $momento_devolucion;
    }

    function setOficina_devolucion($oficina_devolucion) {
        $this->oficina_devolucion = $oficina_devolucion;
    }

    function setCargado_cuenta($cargado_cuenta) {
        $this->cargado_cuenta = $cargado_cuenta;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setTelefono1($telefono1) {
        $this->telefono1 = $telefono1;
    }

    function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setExtra_gps($extra_gps) {
        $this->extra_gps = $extra_gps;
    }

    function setExtra_silla_niño($extra_silla_niño) {
        $this->extra_silla_niño = $extra_silla_niño;
    }

    function setExtra_silla_elevador($extra_silla_elevador) {
        $this->extra_silla_elevador = $extra_silla_elevador;
    }

    function setExtra_portaesquis($extra_portaesquis) {
        $this->extra_portaesquis = $extra_portaesquis;
    }

    function setExtra_cadenas($extra_cadenas) {
        $this->extra_cadenas = $extra_cadenas;
    }

    /**
     * @return string string
     */
    public function __toString() {

        $string = '';
        $string .= $this->id . "<br>";
        $string .= $this->tarifa->_toString() . "<br>";
        $string .= $this->momento_recogida . "<br>";
        $string .= $this->momento_devolucion . "<br>";
        $string .= $this->cargado_cuenta . "<br>";
        $string .= $this->estado . "<br>";
        $string .= $this->nombre . "<br>";
        $string .= $this->apellidos . "<br>";
        $string .= $this->telefono1 . "<br>";
        $string .= $this->telefono2 . "<br>";
        $string .= $this->nacionalidad . "<br>";
        $string .= $this->fecha_nacimiento . "<br>";
        $string .= $this->extra_gps . "<br>";
        $string .= $this->extra_silla_niño . "<br>";
        $string .= $this->extra_silla_elevador . "<br>";
        $string .= $this->extra_portaesquis . "<br>";
        $string .= $this->extra_cadenas . "<br>";


        return $string;
    }

}
