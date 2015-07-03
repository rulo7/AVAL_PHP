<?php

require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';
require_once dirname(dirname(__DIR__)) . '/model/reserva/transfer/TransferReserva.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';



$tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $_REQUEST['tarifa']);
$momento_recogida = $_REQUEST['momento_recogida_date'] . " " . $_REQUEST['momento_recogida_time'];
$momento_devolucion = $_REQUEST['momento_devolucion_date'] . " " . $_REQUEST['momento_devolucion_time'];
if(isset($_REQUEST['oficina_devolucion']))
{
$oficina_devolucion = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $_REQUEST['oficina_devolucion']);
}
else
$oficina_devolucion = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ,$_REQUEST['oficina']);
$cargado_cuenta = 0;
$estado = $_REQUEST['estado'];
$NIF = $_REQUEST['NIF'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$email = $_REQUEST['email'];
$telefono1 = $_REQUEST['telefono1'];
$telefono2 = $_REQUEST['telefono2'];
$nacionalidad = $_REQUEST['nacionalidad'];
$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
$extra_gps = (isset($_REQUEST['extra_gps'])) ? 1 : 0;
$extra_silla_bebe = (isset($_REQUEST['extra_silla_bebe'])) ? 1 : 0;
$extra_silla_elevador = (isset($_REQUEST['extra_silla_elevador'])) ? 1 : 0;
$extra_portaesquis = (isset($_REQUEST['extra_portaesquis'])) ? 1 : 0;
$extra_cadenas = (isset($_REQUEST['extra_cadenas'])) ? 1 : 0;

$reserva = new TransferReserva(0, $tarifa, $momento_recogida, $momento_devolucion, $oficina_devolucion, $cargado_cuenta, $estado, $NIF, $nombre, $apellidos, $email, $telefono1, $telefono2, $nacionalidad, $fecha_nacimiento, $extra_gps, $extra_silla_bebe, $extra_silla_elevador, $extra_portaesquis, $extra_cadenas, true);
FrontController::getInstance()->execute(Entities::RESERVA, Operations::CREATE, $reserva);


// RECOGER TARJETA DE CREDITO
echo "<form method='post' action='enviarmail.php'>";
echo "<p><select name='tipo_tarjeta'>";
echo "<p><option value='MasterCard'>MasterCard</option>";
echo "<p><option value='Visa'>Visa</option>";
echo "<p><option value='American Express'>American Express</option>";
echo "<p></select>";
echo "<p>Introduzca los datos de su tarjeta:</p>";
echo "<p>Numero de la tarjeta:<input type='text' name='numero_tarjeta' required/></p>";
echo "<p>CVV(<a target='_blank' href='http://tudineroefectivo.com/que-es-el-cvv-credit-card-code/'>¿que es?</a>):<input type='text' name='vcode_tarjeta' required/></p>";
echo "<p>Caducidad:<input type='text' name='vcode_tarjeta' required/></p>";
echo "<p><input type='submit' value='Enviar'></p>";
echo "</form>";
// MANDAR EMAIL 


echo "<p><a href='operationsReserva.php'><button type='button' >VOLVER</button></a></p>";

