<?php
    include "persona.php";
    $miDni = array('tipo' => "Documento" , 'numeroDni' => 44041629 );
    $miPersona = new Persona("Emiliano","Lopez",$miDni);
    echo $miPersona;
?>