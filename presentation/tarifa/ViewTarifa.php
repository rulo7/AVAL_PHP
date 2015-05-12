<?php

echo '<form method="post" action="ViewTarifa.php">
ID:<br>
<input type="text"  name="id" id=”id_id” placeholder="Ej:1" required="required">
<br>
Vehiculo:<br>
<label name="vehiculo" id=”id_vehiculo” >
<br>
Precio 3 dias:<br>
<input type="number"  name="precio_3_dias" id=”id_precio_3_dias” step=0.01 placeholder="Ej:100,86" required="required">
<br>
Precio 4-7 dias:<br>
<input type="number"  name="precio_4_7_dias" id=”id_precio_4_7_dias” step=0.01 placeholder="Ej:150" required="required">
<br>
Precio 7-15 dias:<br>
<input type="number"  name="precio_7_15_dias" id=”id_precio_7_15_dias” step=0.01 placeholder="200,50"required="required">
<br>
Precio mas 15 dias:<br>
<input type="number"  name="precio_mas_15" id=”id_precio_mas_15” step=0.01 placeholder="Ej:300,45"required="required">
<br>
Precio km extra :<br>
<input type="number"  name="precio_KM_extra" id=”id_precio_KM_extra” step=0.01 placeholder="Ej:3" required="required">
<br><br>
<input type="submit" value="Submit">
</form>';

?>