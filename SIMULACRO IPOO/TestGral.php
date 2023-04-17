<?php
include_once "viaje.php";
include_once "empresa.php";
    echo "ingrese destino \n";
    $elDestino = trim(fgets(STDIN));
    echo "ingrese la hora de partida \n";
    $laHoraPartida = trim(fgets(STDIN));
    echo "ingrese la hora de llegada \n";
    $laHoraLlegada = trim(fgets(STDIN));
    echo "ingrese la id del viaje \n";
    $elNumero = trim(fgets(STDIN));
    echo "ingrese el importe \n";
    $elImporte = trim(fgets(STDIN));
    echo "ingrese la fecha \n";
    $laFecha = trim(fgets(STDIN));
    echo "ingrese la cantidad de asientos \n";
    $laCantAsientos = trim(fgets(STDIN));
    echo "ingrese la cantidad de asientos que quedan disponibles \n";
    $laCantAsientosDisponibles = trim(fgets(STDIN));
    echo "ingrese la persona de referencia del viaje \n";
    $laReferencia = trim(fgets(STDIN));
    $unViaje = new Viaje($elDestino,$laHoraPartida,$laHoraLlegada,$elNumero,$elImporte,$laFecha,$laCantAsientos,$laCantAsientosDisponibles,$laReferencia);
    echo "ingrese la id de la empresa";
    $laIdEmpresa = trim(fgets(STDIN));
    echo "ingrese el nombre de la empresa";
    $elNombreEmpresa = trim(fgets(STDIN));
    $unaEmpresa = new Empresa ($laIdEmpresa,$elNombreEmpresa,[]);
    $unaEmpresa->incorporarViaje($unViaje);
    echo $unaEmpresa;

    // AQUI INGRESO OTRO DESTINO

    echo "ingrese destino \n";
    $elDestino = trim(fgets(STDIN));
    echo "ingrese la hora de partida \n";
    $laHoraPartida = trim(fgets(STDIN));
    echo "ingrese la hora de llegada \n";
    $laHoraLlegada = trim(fgets(STDIN));
    echo "ingrese la id del viaje \n";
    $elNumero = trim(fgets(STDIN));
    echo "ingrese el importe \n";
    $elImporte = trim(fgets(STDIN));
    echo "ingrese la fecha \n";
    $laFecha = trim(fgets(STDIN));
    echo "ingrese la cantidad de asientos \n";
    $laCantAsientos = trim(fgets(STDIN));
    echo "ingrese la cantidad de asientos que quedan disponibles \n";
    $laCantAsientosDisponibles = trim(fgets(STDIN));
    echo "ingrese la persona de referencia del viaje \n";
    $laReferencia = trim(fgets(STDIN));
    $unViaje = new Viaje($elDestino,$laHoraPartida,$laHoraLlegada,$elNumero,$elImporte,$laFecha,$laCantAsientos,$laCantAsientosDisponibles,$laReferencia);
    $unaEmpresa->incorporarViaje($unViaje);
    echo $unaEmpresa;
?>