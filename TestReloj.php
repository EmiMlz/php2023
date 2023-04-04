<?php
include "reloj.php";
$miReloj = new Reloj(23,59,57);
echo $miReloj;
$miReloj->incremento();
echo $miReloj;
$miReloj->incremento();
echo $miReloj;
$miReloj->incremento();
echo $miReloj;
$miReloj->incremento();
?>