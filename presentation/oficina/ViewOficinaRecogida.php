<?php

echo '<form method="post" action="ViewOficinaRecogida.php">
ID:<br>
<input type="text"  name="id" id=”id_id” placeholder="Ej: 1" required="required">
<br>
Localidad:<br>
<input type="text" name="localidad" placeholder="Ej:Turismo" id=”id_localidad” >
<br>
Telefono:<br>
<input type="number"  name="telefono" id=”id_telefono” placeholder="Ej:916643026"  required="required">
<br>
Direccion:<br>
<input type="text"  name="direccion" id=”id_direccion” placeholder="Ej:Paseo de la Castellana 4" required="required">
<br>
Hora de apertura:<br>
<input type="time"  name="hora_apertura" id=”hora_apertura”  required="required">
<br>
Hora de cierre:<br>
<input type="time"  name="hora_fin" id=”hora_fin”  required="required">
<br><br>
<input type="submit" value="Submit">
</form>';

?>