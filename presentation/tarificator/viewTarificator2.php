<?php

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';




echo "<form method='post' action='tarificatorExecutor.php'>";


$idTarifas = FrontController::getInstance()->execute(Entities::TARIFA, Operations::TOLIST, null);

if (sizeof($idTarifas) > 0) {

    echo "<p>Tarifa: <select name='tarifa' id='id_tarifa' onchange='ocultar();'>";
    foreach ($idTarifas as $idTarifa) {

        $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);

        $oficina = $tarifa->getOficina()->getLocalidad();
        $grupo = $tarifa->getGrupo();

        echo "<option value='$idTarifa'>Vehiculos del grupo '$grupo' en '$oficina'</option>";
    }
    echo "</select></p>";
} else {
    echo "<p>No existen Tarifas, contacte con el administrador del sitio</p>";
}

echo "<p>Recogida (yyyy-mm-dd hh:mm): <input type='date' name='momento_recogida_date' id='id_momento_recogida_date'/> <input type='time' name='momento_recogida_time' id='id_momento_recogida_time'/></p>";
echo "<p>Devolucion (yyyy-mm-dd hh:mm): <input type='date' name='momento_devolucion_date' id='id_momento_devolucion_date'/> <input type='time' name='momento_devolucion_time' id='id_momento_devolucion_time'/></p>";


//JavaScript con oficina de devolucion activa o no en función de lo que permita o no la tarifa seleccionada
echo "<div id='devolucion_distinta_recogida'>";
$idOficinas = FrontController::getInstance()->execute(Entities::OFICINA, Operations::TOLIST, null);
echo "<p>Oficina de devolucion: <select name='oficina_devolucion' id='oficina_devolucion'>";
foreach ($idOficinas as $idOficina) {

    $oficina = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $idOficina);
    $localidad = $oficina->getLocalidad();

    echo "<option value='$idOficina'>$localidad</option>";
}
echo "</select></p>";
echo "</div>";

echo "<p>Cargado a cuenta: <input type='number' name='cargado_cuenta' step='0.01'/> EUR</p>";
echo "<p>Estado: <input type='text' name='estado'/></p>";
echo "<p>NIF: <input type='text' name='NIF'/></p>";
echo "<p>Nombre: <input type='text' name='nombre'/></p>";
echo "<p>Apellidos: <input type='text' name='apellidos'/></p>";
echo "<p>Email: <input type='email' name='email'/></p>";
echo "<p>Telefono1: <input type='number' name='telefono1'/></p>";
echo "<p>Telefono2: <input type='number' name='telefono2'/></p>";
echo "<p>Nacionalidad: <input type='text' name='nacionalidad'/></p>";
echo "<p>Fecha de nacimiento (yyyy-mm-dd): <input type='date' name='fecha_nacimiento'/></p>";
echo "<p>Con extra GPS: <input type='checkbox' name='extra_gps'/></p>";
echo "<p>Con extra Silla de bebe: <input type='checkbox' name='extra_silla_bebe'/></p>";
echo "<p>Con extra Silla Elevadora: <input type='checkbox' name='extra_silla_elevador'/></p>";
echo "<p>Con extra Portaesquis: <input type='checkbox' name='extra_portaesquis'/></p>";
echo "<p>Con extra Cadenas: <input type='checkbox' name='extra_cadenas'/></p>";

echo "<p><input type='submit' value='Crear'></p>";
echo "</form>";

