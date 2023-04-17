<?php
include "viaje.php";
$miViaje = new Viaje("barilo",13,15,1,1000,"30/04",10,5,"a");
echo $miViaje;
$miViaje->asignarAsientosDisponibles(3);
echo $miViaje;
?>