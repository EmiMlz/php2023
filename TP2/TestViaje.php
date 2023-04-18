<?php
    include 'viaje.php';
    include 'pasajero.php';
    include 'responsableV.php';
    $pasajero = new Pasajero("", "", 0, 0);
    $responsable = new ResponsableV(0, 0, "", "");
    $elViaje = new ViajeFeliz("", "", 0,[],0,"");
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
                $elViaje = new ViajeFeliz($laIdViaje, $elDestino, $elMaxPasajeros, [], 0, "");
                echo "Viaje cargado correctamente.\n";
                break;
            case 2:
                echo "Ingrese el numero de identificacion del viaje a cargar: ";
                $laIdViaje = trim(fgets(STDIN));
                echo "Ingrese el nuevo destino del viaje: ";
                $elDestino = trim(fgets(STDIN));
                echo "Ingrese la cantidad maxima de pasajeros del viaje: ";
                $elMaxPasajeros = trim(fgets(STDIN));
                $elViaje->setViajeId($laIdViaje);
                $elViaje->setDestino($elDestino);
                $elViaje->setCantMaxPasajeros($elMaxPasajeros);
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
                $pasajero = new Pasajero ($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero);
                if ($elViaje->agregarPasajero($pasajero)) {
                       echo "Ya existe pasajero con el DNI N°" . $dniPasajero . "\n";
                } else {
                    echo "Pasajero agregado correctamente .\n";
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
                if ($elViaje->modificarPasajero("", "", $dniPasajero , 0) == false) {
                    echo "No hay pasajero con el DNI N°" . $dniPasajero . "\n";
                } else {
                    echo "Ingrese el nombre del pasajero: ";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero: ";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el telefono del pasajero: ";
                    $telefonoPasajero = trim(fgets(STDIN));
                    $elViaje->modificarPasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero);
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