<?php

echo "
<form method='post' action='ViewOficina.php'>

<p>ID: <input type='text'  name='id' id=”id_id” placeholder='Ej: 1' required='required'></p>

<p>Localidad: <input type='text' name='localidad' placeholder='Ej:Turismo' id=”id_localidad”></p>

<p>Telefono: <input type='number'  name='telefono' id=”id_telefono” placeholder='Ej:916643026'  required='required'></p>

<p>Direccion: <input type='text'  name='direccion' id=”id_direccion” placeholder='Ej:Paseo de la Castellana 4' required='required'></p>

<p>Hora de apertura: <input type='time'  name='hora_apertura' id=”hora_apertura”  required='required'></p>

<p>Hora de cierre: <input type='time'  name='hora_fin' id=”hora_fin”  required='required'></p>

<p>Oficina de recogida distinta de entrega: <input type='checkbox'  name='oficina_recogida_distinta_entrega' id=”id_oficina_recogida_distinta_entrega”  required='required' onClick='mostrarOcultar()'></p>

<p><a href='ViewOficinaRecogida.php' target='_blank'><button type='button' >+ Agregar nueva oficina de recogida</button></a></p>

<input type='submit' value='Agregar'>

</form>";

