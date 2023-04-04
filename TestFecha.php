<?php
include "Fecha.php";
$miFecha = new Fecha(2024,2,1);
echo $miFecha . "Cuantos dias quieren agregar ? ";
$cantDiasAgregar = trim(fgets(STDIN));
$miFecha->incremento_dias($cantDiasAgregar);
echo $miFecha;
$fechaTest = $miFecha->fechaExtendida();
echo $fechaTest;
?>