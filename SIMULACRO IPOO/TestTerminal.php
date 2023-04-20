<?php 
    include_once "terminal.php";
    include_once "empresa.php";
    include_once "responsable.php";
    include_once "viaje.php";

    /*Implementar un script TestTermial en el cual:
    1. Se crea una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche.
    2. A cada empresa se le incorporan 2 instancias de la clase viaje.
    3. Se crea un objeto Terminal con la colección de empresas creadas en el pnto1.
    4. Invocar y visualizar el resultado del método ventaAutomatica con cantidad de asientos
    3 y como destino alguno de los destinos de viaje creados en 2.
    5. Invocar y visualizar el resultado del método empresaMayorRecaudacion.
    6. Invocar y visualizar el resultado del método responsableViaje correspondiente a uno de los
    números de viajes del punto 2.*/

    // Creamos una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche.
    $empresa_1 = new Empresa(1,"Flecha Bus",[]);
    $empresa_2 = new Empresa(1,"Via Bariloche",[]);
    $viaje1_empresa1 = new Viaje ("Madrid","15:00","22:00",1,20000,"30/04",30,5,"");
    $viaje2_empresa1 = new Viaje ("Bariloche","15:00","22:00",2,10000,"30/04",30,5,"");
    $viaje1_empresa2 = new Viaje ("Peru","17:00","22:00",3,1000,"30/04",30,5,"");
    $viaje2_empresa2 = new Viaje ("España","15:00","23:59",4,20000,"30/04",30,5,"");
    $empresa_1->incorporarViaje($viaje1_empresa1);
    $empresa_1->incorporarViaje($viaje2_empresa1);
    $empresa_2->incorporarViaje($viaje1_empresa2);
    $empresa_2->incorporarViaje($viaje2_empresa2);
    $miColEmpresas = [
       $empresa_1,
       $empresa_2,
    ];
    $miTerminal = new Terminal("Terminal de Prueba","Cipolletti",$miColEmpresas);
    
    echo $miTerminal->ventaAutomatica(3,"30/04","Bariloche","Flecha Bus");
    echo $resultadoVentaAutomatica;
?>