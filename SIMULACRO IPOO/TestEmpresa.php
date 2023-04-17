<?php
    include "empresa.php";
    $miEmpresa = new Empresa(1,"cruzDelSur",[]);
    $miEmpresa->darViajeADestino("Madrid",5);
?>