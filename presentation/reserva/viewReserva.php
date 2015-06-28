<script type="text/javascript">

    var oficinas_admiten_devolucion = [];


    window.onload = function () {
        ocultar();
    };

    function ocultar() {
        var select = document.getElementById("id_tarifa");

        if (oficinas_admiten_devolucion[select.selectedIndex]) {
            document.getElementById("devolucion_distinta_recogida").style.display = "block";

        } else {
            document.getElementById("devolucion_distinta_recogida").style.display = "none";
        }
    }
    ;

</script>

<?php
require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

$operation = $_REQUEST['operation'];
switch ($operation) {
    case Operations::CREATE:


        echo "<form method='post' action='reservaExecutor.php?operation=$operation'>";


        $idTarifas = FrontController::getInstance()->execute(Entities::TARIFA, Operations::TOLIST, null);

        if (sizeof($idTarifas) > 0) {

            //Rellenar array javascript para ver si las oficinas de la tarifas admiten o no oficina de devolucion
            echo "<script type='text/javascript'>";

            $i = 0;
            foreach ($idTarifas as $idTarifa) {

                $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);

                echo "oficinas_admiten_devolucion[$i] = " . ($tarifa->getOficina()->getDevolucion_distinta_recogida()) . ";";
                $i++;
            }


            echo "</script>";


            echo "<p>Tarifa: <select name='tarifa' id='id_tarifa' onchange='ocultar();'>";
            foreach ($idTarifas as $idTarifa) {

                $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);

                $oficina = $tarifa->getOficina()->getLocalidad();
                $grupo = $tarifa->getGrupo();

                echo "<option value='$idTarifa'>Vehiculos del grupo '$grupo' en '$oficina'</option>";
            }
            echo "</select></p>";
        } else {
            echo "<p>No existen Tarifas, crea alguna si quieres registrar una reserva</p>";
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

        break;

    case Operations::READ:

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



        echo "<p>Id: <input value='$id' type='text' name='id' readonly /></p>";
        echo "<p>Vehiculo grupo: <input value='" . $tarifa->getGrupo() . "' type='text' name='grupo' readonly /></p>";
        echo "<p>Oficina de recogida: <input value='" . $tarifa->getOficina()->getLocalidad() . "' type='text' name='oficina_recogida' readonly /></p>";
        echo "<p>Oficina de devolucion: <input value='" . $oficina_devolucion . "' type='text' name='id' readonly /></p>";
        echo "<p>Recogida (yyyy-mm-dd hh:mm): <input type='date' value='$momento_recogida_date' name='momento_recogida_date' id='id_momento_recogida_date'readonly /> <input type='time' value='$momento_recogida_time' name='momento_recogida_time' id='id_momento_recogida_time'readonly /></p>";
        echo "<p>Devolucion (yyyy-mm-dd hh:mm): <input type='date' value='$momento_devolucion_date' name='momento_devolucion_date' id='id_momento_devolucion_date'readonly /> <input type='time' value='$momento_devolucion_time' name='momento_devolucion_time' id='id_momento_devolucion_time'readonly /></p>";
        echo "<p>Cargado a cuenta: <input value='$cargado_cuenta' type='number' name='cargado_cuenta' step='0.01'readonly /> EUR</p>";
        echo "<p>Estado: <input value='$estado' type='text' name='estado'readonly /></p>";
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


        break;

    case Operations::UPDATE:

        $transferReserva = FrontController::getInstance()->execute(Entities::RESERVA, Operations::READ, $_REQUEST["id"]);

        $id = $transferReserva->getId();
        $tar = $transferReserva->getTarifa();

        $momento_recogida = $transferReserva->getMomento_recogida();
        $momento_recogida_date = substr($momento_recogida, 0, 10);
        $momento_recogida_time = substr($momento_recogida, 11);


        $momento_devolucion = $transferReserva->getMomento_devolucion();
        $momento_devolucion_date = substr($momento_devolucion, 0, 10);
        $momento_devolucion_time = substr($momento_devolucion, 11);


        $oficina_devolucion = $transferReserva->getOficina_devolucion();
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


        echo "<form method='post' action='reservaExecutor.php?operation=$operation'>";

        echo "<p>Id: <input value='$id' type='text' name='id' readonly /></p>";

        $idTarifas = FrontController::getInstance()->execute(Entities::TARIFA, Operations::TOLIST, null);
        if (sizeof($idTarifas) > 0) {

            //Rellenar array javascript para ver si las oficinas de la tarifas admiten o no oficina de devolucion
            echo "<script type='text/javascript'>";

            $i = 0;
            foreach ($idTarifas as $idTarifa) {

                $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);

                echo "oficinas_admiten_devolucion[$i] = " . ($tarifa->getOficina()->getDevolucion_distinta_recogida()) . ";";
                $i++;
            }


            echo "</script>";


            echo "<p>Tarifa: <select name='tarifa' id='id_tarifa' onchange='ocultar();'>";
            foreach ($idTarifas as $idTarifa) {

                $tarifa = FrontController::getInstance()->execute(Entities::TARIFA, Operations::READ, $idTarifa);

                $oficina = $tarifa->getOficina()->getLocalidad();
                $grupo = $tarifa->getGrupo();

                echo "<option value='$idTarifa'";
                if ($idTarifa == $tar->getId()) {
                    echo "selected";
                }
                echo ">Vehiculos del grupo '$grupo' en '$oficina'</option>";
            }
            echo "</select></p>";
        } else {
            echo "<p>No existen Tarifas, crea alguna si quieres registrar una reserva</p>";
        }

        echo "<p>Recogida (yyyy-mm-dd hh:mm): <input value='$momento_recogida_date' type='date' name='momento_recogida_date' id='id_momento_recogida_date'/> <input type='time' value='$momento_recogida_time' name='momento_recogida_time' id='id_momento_recogida_time'/></p>";
        echo "<p>Devolucion (yyyy-mm-dd hh:mm): <input type='date'value='$momento_devolucion_date' name='momento_devolucion_date' id='id_momento_devolucion_date'/> <input type='time' value='$momento_devolucion_time' name='momento_devolucion_time' id='id_momento_devolucion_time'/></p>";


        //JavaScript con oficina de devolucion activa o no en función de lo que permita o no la tarifa seleccionada
        echo "<div id='devolucion_distinta_recogida'>";

        $idOficinas = FrontController::getInstance()->execute(Entities::OFICINA, Operations::TOLIST, null);
        echo "<p>Oficina de devolucion: <select name='oficina_devolucion' id='oficina_devolucion'>";
        foreach ($idOficinas as $idOficina) {

            $localidad = FrontController::getInstance()->execute(Entities::OFICINA, Operations::READ, $idOficina)->getLocalidad();

            echo "<option value='$idOficina'";
            if ($idOficina == $oficina_devolucion->getId()) {
                echo "selected";
            }
            echo ">" . $localidad . "</option>";
        }

        echo "</select></p>";
        echo "</div>";

        echo "<p>Cargado a cuenta: <input value='$cargado_cuenta' type='number' name='cargado_cuenta' step='0.01'/> EUR</p>";
        echo "<p>Estado: <input value='$estado' type='text' name='estado'/></p>";
        echo "<p>NIF: <input value='$NIF' type='text' name='NIF'/></p>";
        echo "<p>Nombre: <input value='$nombre' type='text' name='nombre'/></p>";
        echo "<p>Apellidos: <input value='$apellidos' type='text' name='apellidos'/></p>";
        echo "<p>Email: <input value='$email' type='email' name='email'/></p>";
        echo "<p>Telefono1: <input value='$telefono1' type='number' name='telefono1'/></p>";
        echo "<p>Telefono2: <input value='$telefono2' type='number' name='telefono2'/></p>";
        echo "<p>Nacionalidad: <input value='$nacionalidad' type='text' name='nacionalidad'/></p>";
        echo "<p>Fecha de nacimiento (yyyy-mm-dd): <input value='$fecha_nacimiento'type='date' name='fecha_nacimiento'/></p>";
        echo "<p>Con extra GPS: <input type='checkbox' name='extra_gps'" . (($extra_gps) ? "checked" : "" ) . " /></p>";
        echo "<p>Con extra Silla de bebe: <input type='checkbox' name='extra_silla_bebe'" . (($extra_silla_bebe) ? "checked" : "" ) . "  /></p>";
        echo "<p>Con extra Silla Elevadora: <input type='checkbox' name='extra_silla_elevador'" . (($extra_silla_elevadora) ? "checked" : "" ) . " /></p>";
        echo "<p>Con extra Portaesquis: <input type='checkbox' name='extra_portaesquis'" . (($extra_portaesquis) ? "checked" : "" ) . " /></p>";
        echo "<p>Con extra Cadenas: <input type='checkbox' name='extra_cadenas'" . (($extra_cadenas) ? "checked" : "" ) . " /></p>";

        echo "<p><input type='submit' value='Editar'></p>";
        echo "</form>";

        break;

    case Operations::DELETE:

        $id = $_REQUEST["id"];
        echo "<p>Seguro de que deseas eliminar?</p>";
        echo "<p><a href='reservaExecutor.php?operation=$operation&id=$id'><button type='button' >SI</button></a>";
        echo "<a href='operationsReserva.php'><button type='button' >NO</button></a></p>";

        break;
}
