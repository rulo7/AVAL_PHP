<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';


$transferReserva = FrontController::getInstance()->execute(Entities::RESERVA, Operations::READ, $_REQUEST["id"]);

$id = $transferReserva->getId();
$tarifa = $transferReserva->getTarifa();

$momento_recogida = $transferReserva->getMomento_recogida();
$momento_recogida_date = substr($momento_recogida, 0, 10);
$momento_recogida_time = substr($momento_recogida, 11);


$momento_devolucion = $transferReserva->getMomento_devolucion();
$momento_devolucion_date = substr($momento_devolucion, 0, 10);
$momento_devolucion_time = substr($momento_devolucion, 11);


$oficina_devolucion = $transferReserva->getOficina_devolucion()->getLocalidad();
$cargado_cuenta = $transferReserva->getCargado_cuenta();
$estado = $transferReserva->getEstado();
$NIF = $transferReserva->getNIF();
$nombre = $transferReserva->getNombre();
$apellidos = $transferReserva->getApellidos();
$email = $transferReserva->getEmail();
$telefono1 = $transferReserva->getTelefono1();
$telefono2 = $transferReserva->getTelefono2();
$nacionalidad = $transferReserva->getNacionalidad();
$fecha_nacimiento = $transferReserva->getFecha_nacimiento();
$extra_gps = $transferReserva->getExtra_gps();
$extra_silla_bebe = $transferReserva->getExtra_silla_bebe();
$extra_silla_elevadora = $transferReserva->getExtra_silla_elevador();
$extra_portaesquis = $transferReserva->getExtra_portaesquis();
$extra_cadenas = $transferReserva->getExtra_cadenas();
$pendiente = $transferReserva->getPendiente();


echo "<form method='post' action='reserva_pendienteExecutor.php'>";

echo "<p>Id: <input value='$id' type='text' name='id' readonly /></p>";
echo "<p>Vehiculo grupo: <input value='" . $tarifa->getGrupo() . "' type='text' name='grupo' readonly /></p>";
echo "<p>Oficina de recogida: <input value='" . $tarifa->getOficina()->getLocalidad() . "' type='text' name='oficina_recogida' readonly /></p>";
echo "<p>Oficina de devolucion: <input value='" . $oficina_devolucion . "' type='text' name='oficina_devolucion' readonly /></p>";
echo "<p>Recogida (yyyy-mm-dd hh:mm): <input type='date' value='$momento_recogida_date' name='momento_recogida_date' id='id_momento_recogida_date'readonly /> <input type='time' value='$momento_recogida_time' name='momento_recogida_time' id='id_momento_recogida_time'readonly /></p>";
echo "<p>Devolucion (yyyy-mm-dd hh:mm): <input type='date' value='$momento_devolucion_date' name='momento_devolucion_date' id='id_momento_devolucion_date'readonly /> <input type='time' value='$momento_devolucion_time' name='momento_devolucion_time' id='id_momento_devolucion_time'readonly /></p>";
echo "<p>Cargado a cuenta: <input type='number' name='cargado_cuenta' step='0.01' required /> EUR</p>";
echo "<p>Estado: <input type='text' name='estado' required /></p>";
echo "<p>NIF: <input value='$NIF' type='text' name='NIF'readonly /></p>";
echo "<p>Nombre: <input value='$nombre' type='text' name='nombre'readonly /></p>";
echo "<p>Apellidos: <input value='$apellidos' type='text' name='apellidos'readonly /></p>";
echo "<p>Email: <input value='$email' type='email' name='email'readonly /></p>";
echo "<p>Telefono1: <input value='$telefono1' type='number' name='telefono1'readonly /></p>";
echo "<p>Telefono2: <input value='$telefono2' type='number' name='telefono2'readonly /></p>";
echo "<p>Nacionalidad: <input value='$nacionalidad' type='text' name='nacionalidad'readonly /></p>";
echo "<p>Fecha de nacimiento (yyyy-mm-dd): <input value='$fecha_nacimiento'type='date' name='fecha_nacimiento'readonly /></p>";
echo "<p>Con extra GPS: " . (($extra_gps) ? "SI" : "NO" ) . "</p>";
echo "<p>Con extra Silla de bebe: " . (($extra_silla_bebe) ? "SI" : "NO" ) . "</p>";
echo "<p>Con extra Silla Elevadora: " . (($extra_silla_elevadora) ? "SI" : "NO" ) . "</p>";
echo "<p>Con extra Portaesquis: " . (($extra_portaesquis) ? "SI" : "NO" ) . "</p>";
echo "<p>Con extra Cadenas: " . (($extra_cadenas) ? "SI" : "NO" ) . "</p>";

echo "<p><input type='submit' value='Confirmar'></p>";
echo "</form>";



