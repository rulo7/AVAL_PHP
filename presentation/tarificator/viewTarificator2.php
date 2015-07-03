<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';



$id_tarifa = $_REQUEST['tarifa'];
$id_oficina = $_REQUEST['oficina'];
$momento_recogida_date = $_REQUEST['momento_recogida_date'];
$momento_recogida_time=$_REQUEST['momento_recogida_time'];
$momento_devolucion_date = $_REQUEST['momento_devolucion_date'];
$momento_devolucion_time= $_REQUEST['momento_devolucion_time']; 
echo "<form method='post' action='tarificatorExecutor.php'>";



$oficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $id_oficina);
$devolucion= $oficina->getDevolucion_distinta_recogida();

echo "<p>Introduzca sus datos personales:</p>";
echo "<p>NIF: <input type='text' name='NIF' required/></p>";
echo "<p>Nombre: <input type='text' name='nombre' required/></p>";
echo "<p>Apellidos: <input type='text' name='apellidos' required/></p>";
echo "<p>Email: <input type='email' name='email' required/></p>";
echo "<p>Telefono1: <input type='number' name='telefono1' required/></p>";
echo "<p>Telefono2: <input type='number' name='telefono2' required/></p>";
echo "<p>Nacionalidad: <input type='text' name='nacionalidad' required/></p>";
echo "<p>Fecha de nacimiento (yyyy-mm-dd): <input type='date' name='fecha_nacimiento' required/> </p>";

echo "<p>Seleccione los extras: </p>";
echo "<p>Con extra GPS: <input type='checkbox' name='extra_gps'/></p>";
echo "<p>Con extra Silla de bebe: <input type='checkbox' name='extra_silla_bebe'/></p>";
echo "<p>Con extra Silla Elevadora: <input type='checkbox' name='extra_silla_elevador'/></p>";
echo "<p>Con extra Portaesquis: <input type='checkbox' name='extra_portaesquis'/></p>";
echo "<p>Con extra Cadenas: <input type='checkbox' name='extra_cadenas'/></p>";

echo "<p><input type='hidden' name='estado' value='prueba'></p>";
echo "<p><input type='hidden' name='tarifa' value='$id_tarifa'></p>";
echo "<p><input type='hidden' name='oficina' value=$id_oficina></p>";
echo "<p><input type='hidden' name='momento_recogida_date' value=$momento_recogida_date></p>";
echo "<p><input type='hidden' name='momento_recogida_time' value=$momento_recogida_time></p>";
echo "<p><input type='hidden' name='momento_devolucion_date' value=$momento_devolucion_date></p>";
echo "<p><input type='hidden' name='momento_devolucion_time' value=$momento_devolucion_time></p>";


echo "<p><input type='submit' value='Crear'></p>";
echo "</form>";
?>