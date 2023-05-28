<?php
    include 'viaje.php';
    include 'pasajero.php';
    include 'responsableV.php';
    include 'pasajeroVip.php';
    include 'pasajeroEspecial.php';
    $pasajero = new Pasajero("", "", 0, 0,0,0);
    $responsable = new ResponsableV(0, 0, "", "");
    $elViaje = new ViajeFeliz("", "", 0,[],0,"",0,0);
    $sigue = true;
    while ($sigue) {
        echo "Menú de opciones:\n";
        echo "1- Cargar información del viaje\n";
        echo "2- Modificar información del viaje\n";
        echo "3- Modificar datos de responsable\n";
        echo "4- Agregar pasajero\n";
        echo "5- Eliminar pasajero\n";
        echo "6- Modificar datos de un pasajero\n";
        echo "7- Ver datos de el/los viaje/s\n";
        echo "Otro número- Salir\n";
        echo "Indique el número de la opción que desea realizar: ";
        $opcion = trim(fgets(STDIN));
        switch ($opcion) {
            case 1:
                echo "Ingrese el numero de identificacion del viaje: ";
                $laIdViaje = trim(fgets(STDIN));
                echo "Ingrese el destino del viaje: ";
                $elDestino = trim(fgets(STDIN));
                echo "Ingrese la cantidad máxima de pasajeros: ";
                $elMaxPasajeros = trim(fgets(STDIN));
                echo "Ingrese el costo del viaje: ";
                $elCostoViaje = trim(fgets(STDIN));
                $elViaje = new ViajeFeliz($laIdViaje, $elDestino, $elMaxPasajeros, [], 0, "",$elCostoViaje,0);
                echo "Viaje cargado correctamente.\n";
                break;
            case 2:
                echo "Ingrese el numero de identificacion del viaje a cargar: ";
                $laIdViaje = trim(fgets(STDIN));
                echo "Ingrese el nuevo destino del viaje: ";
                $elDestino = trim(fgets(STDIN));
                echo "Ingrese la cantidad maxima de pasajeros del viaje: ";
                $elMaxPasajeros = trim(fgets(STDIN));
                echo "Ingrese el costo del viaje: ";
                $elCostoViaje = trim(fgets(STDIN));
                $elViaje->setViajeId($laIdViaje);
                $elViaje->setDestino($elDestino);
                $elViaje->setCantMaxPasajeros($elMaxPasajeros);
                $elViaje->setCostoViaje($elCostoViaje);
                echo "Viaje modificado correctamente.\n";
                break;
            case 3:
                echo "Ingrese el numero de empleado: ";
                $numeroEmpleado = trim(fgets(STDIN));
                echo "Ingrese el numero de licencia: ";
                $numeroLicencia = trim(fgets(STDIN));
                echo "Ingrese el nombre del responsable: ";
                $nombreResponsable = trim(fgets(STDIN));
                echo "Ingrese el apellido del responsable: ";
                $apellidoResponable = trim(fgets(STDIN));
                $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombreResponsable, $apellidoResponable);
                $elViaje->setPersonaResponsable($responsable);
                echo "Responsable modificado correctamente.\n";
                break;
            case 4:
                echo "Ingrese el nombre del pasajero: ";
                $nombrePasajero = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero: ";
                $apellidoPasajero = trim(fgets(STDIN));
                echo "Ingrese el número de documento del pasajero: ";
                $dniPasajero = trim(fgets(STDIN));
                echo "Ingrese el número de teléfono del pasajero: ";
                $telefonoPasajero = trim(fgets(STDIN));
                echo "Ingrese el numero de ticket : ";
                $ticketPasajero = trim(fgets(STDIN));
                echo "Ingrese el numero de Asiento : ";
                $asientoPasajero = trim(fgets(STDIN));
                echo "Es Vip? S/N ";
                $esVip = trim(fgets(STDIN));
                echo "Es Especial? S/N ";
                $esEspecial = trim(fgets(STDIN));
                if ($esVip == "S"){
                    echo "Ingrese el numero de Viajero Frecuente : ";
                    $numFrecuenteP = trim(fgets(STDIN));
                    echo "Ingrese la cantidad de millas acumuladas : ";
                    $cantMillasP = trim(fgets(STDIN));
                    $pasajero = new PasajeroVip($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero,$ticketPasajero,$asientoPasajero,$numFrecuenteP,$cantMillasP);
                }
                else{
                    if ($esEspecial == "S"){
                        $rqSillaB = false;
                        $rqAsistenciaB = false;
                        $rqComidaEspacialB = false;
                        echo "Ingrese si requiere silla de ruedas. S/N : ";
                        $rqSilla = trim(fgets(STDIN));
                        if ($rqSilla == "S"){
                            $rqSillaB = true;
                        }
                        echo "Ingrese si requiere asistencia. S/N : ";
                        $rqAsistencia = trim(fgets(STDIN));
                        if ($rqAsistencia == "S"){
                            $rqAsistenciaB = true;
                        }
                        echo "Ingrese si requiere comida especial. S/N : ";
                        $rqComidaEspacial = trim(fgets(STDIN));
                        if ($rqComidaEspacial == "S"){
                            $rqComidaEspacialB = true;
                        }
                        $pasajero = new PasajeroEspecial($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero,$ticketPasajero,$asientoPasajero,$rqSillaB,$rqAsistenciaB,$rqComidaEspacialB);
                    }
                    else {
                        $pasajero = new Pasajero ($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero,$ticketPasajero,$asientoPasajero);
                    }
                }
                

                if ($elViaje->venderPasaje($pasajero)==0) {
                       echo "Ya existe pasajero con el DNI N°" . $dniPasajero . "\n";
                } else {
                    echo "\nPasajero agregado y vendido correctamente .\n";
                }
                break;
            case 5:
                echo "Ingrese el DNI del pasajero: ";
                $dniPasajero = trim(fgets(STDIN));
                if ($elViaje->eliminarPasajero($dniPasajero) == false) {
                    echo "No hay pasajero con el DNI N°" . $dniPasajero . "\n";
                } else {
                    echo "Pasajero eliminado \n";
                }
                break;
            case 6:
                echo "Ingrese el DNI del pasajero a cambiar: ";
                $dniPasajero = trim(fgets(STDIN));
                if ($elViaje->modificarPasajero("", "", $dniPasajero , 0,0,0) == false) {
                    echo "No hay pasajero con el DNI N°" . $dniPasajero . "\n";
                } else {
                    echo "Ingrese el nombre del pasajero: ";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero: ";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el telefono del pasajero: ";
                    $telefonoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el numero de ticket : ";
                    $ticketPasajero = trim(fgets(STDIN));
                    echo "Ingrese el asiento del pasajero : ";
                    $asientoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el numero de ticket : ";
                    $elViaje->modificarPasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero,$ticketPasajero,$asientoPasajero);
                    echo "Pasajero editado exitosamente.\n";
                }
                break;
            case 7:
                echo $elViaje;
                break;
            default: 
                $sigue = false;
                break;
        }
    }
?>