<?php
include_once "Empresa.php";
include_once "Pasajero.php";
include_once "ReponsableV.php";
include_once "Viaje.php";
include_once "BaseDatos.php";

$sigue = true;
$objEmpresa = new Empresa();
$objResponsable = new Responsable();
$objPasajero = new Pasajero();
$objViaje = new Viaje();
$listaEmpresa = $objEmpresa->listar("");
if (count($listaEmpresa) > 0) {
    $objEmpresa = $listaEmpresa[0];
}

while ($sigue) {
    echo "\n1-  Cargar datos de Empresa\n";
    echo "2-  Modificar datos de Empresa\n";
    echo "3-  Eliminar datos de Empresa\n";
    echo "4-  Cargar datos de un Representante\n";
    echo "5-  Modificar datos de un Representante\n";
    echo "6-  Eliminar datos de un Representante\n";
    echo "7-  Cargar datos de Viaje\n";
    echo "8-  Modificar datos de Viaje\n";
    echo "9-  Eliminar datos de Viaje\n";
    echo "10- Cargar datos de Pasajero\n";
    echo "11- Modificar datos de Pasajero\n";
    echo "12- Eliminar datos de Pasajero\n";
    echo "Ingrese una opcion: ";
    $opcion = trim(fgets(STDIN));
    $listaResponsable = $objResponsable->listar("");
    $listaEmpresa = $objEmpresa->listar("");
    $listaViajes = $objViaje->listar("");
    $listaPasajeros = $objPasajero->listar("");
    switch ($opcion) {
        case 1:
            // Option: Cargar datos de Empresa
            if (count($listaEmpresa) > 0) {
                $objEmpresa = $listaEmpresa[0];
                echo "ERROR: Ya hay una empresa, usa '2' para modificar los datos.\n";
            } else {
                echo "\nIngrese el nombre de la empresa: ";
                $nombreEmpresa = trim(fgets(STDIN));
                echo "\nIngrese la dirección de la empresa: ";
                $direccionEmpresa = trim(fgets(STDIN));
                $objEmpresa->cargar($nombreEmpresa, $direccionEmpresa);
                if ($objEmpresa->insertar()) {
                    echo "\nLa empresa ha sido correctamente cargada.";
                } else {
                    echo "\nNo se pudo agregar la empresa debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                }
            }
            sleep(3);
            break;

        case 2:
            // Option: Modificar datos de Empresa
            if (count($listaEmpresa) > 0) {
                echo "Ingrese el nuevo nombre de la empresa: ";
                $nombreEmpresa = trim(fgets(STDIN));
                echo "Ingrese la nueva dirección de la empresa: ";
                $direccionEmpresa = trim(fgets(STDIN));
                $objEmpresa->setNombre($nombreEmpresa);
                $objEmpresa->setDireccion($direccionEmpresa);
                if ($objEmpresa->modificar()) {
                    echo "La empresa ha sido correctamente modificada.";
                } else {
                    echo "No se pudo realizar la modificación debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                }
            } else {
                echo "No hay ninguna empresa que modificar, use '1' para añadir una.";
            }
            sleep(3);
            break;

        case 3:
            // Option: Eliminar datos de Empresa
            if (count($listaEmpresa)>0) {
                if (count($listaViajes)>0){
                    echo "ERROR: Hay viajes vinculados a esta empresa. Elimine los viajes antes de continuar.\n";
                } else {
                    if ($objEmpresa->eliminar()) {
                        echo "La empresa ha sido correctamente eliminada.\n";
                    } else {
                        echo "No se pudo realizar la eliminación de la empresa debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                    }
                }
            } else {
                echo "ERROR: No hay empresas para eliminar. Pruebe agregando una con la opción '1'.\n";
            }
            sleep(3);
            break;

        case 4:
            // Option: Cargar datos de un Representante
            echo "Ingrese el numero de Licencia : ";
            $numLicencia = trim(fgets(STDIN));
            echo "Ingrese el nombre del Responsable : ";
            $rNombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del Responsable : ";
            $rApellido = trim(fgets(STDIN));
            $objResponsable->cargar($numLicencia, $rNombre, $rApellido);
            if ($objResponsable->insertar()) {
                echo "\nModificacion del Responsable exitosa";
            } else {
                "\nNo se pudo agregar al responsable debido al siguiente error : " . $objResponsable->getMensajeOperacion();
            }
            sleep(3);
            break;

        case 5:
            // Option: Modificar a un Responsable
            if (count($listaResponsable) > 0) {
                // Mostrar la lista de responsables
                for ($i = 0; $i < count($listaResponsable); $i++) {
                    $unResponsable = $listaResponsable[$i];
                    $mensaje = "Nro Empleado: " . $unResponsable->getNumEmpleado() .  " - Nombre y apellido: " . $unResponsable->getNombre() . " " . $unResponsable->getApellido() . "\n";
                    echo $mensaje;
                }
                echo "Ingrese el numero de Empleado a modificar : ";
                $numEmpleado = trim(fgets(STDIN));
                echo "Ingrese el numero de Licencia a modificar: ";
                $numLicencia = trim(fgets(STDIN));
                echo "Ingrese el nombre del Responsable a modificar: ";
                $rNombre = trim(fgets(STDIN));
                echo "Ingrese el apellido del Responsable a modificar: ";
                $rApellido = trim(fgets(STDIN));
                
                // Verificar si el responsable existe
                if ($objResponsable->buscar($numEmpleado)) {
                    $objResponsable->setNumLicencia($numLicencia);
                    $objResponsable->setNombre($rNombre);
                    $objResponsable->setApellido($rApellido);
                    if ($objResponsable->modificar()) {
                        echo "\nModificacion del Responsable exitosa";
                    } else {
                        echo "\nNo se pudo modificar al Responsable debido al siguiente error : " . $objResponsable->getMensajeOperacion();
                    }
                } else {
                    echo "\nNo se encontro ningun empleado con el Nombre de Responsable N°: " . $numEmpleado;
                }
            } else {
                echo "\nNo se encontro ningun Responsable, inserte uno con la opcion 4";
            }
            sleep(3);
            break;

        case 6:
            // option: Borrar a un Responsable
            if (count($listaResponsable) > 0) {
                foreach ($listaResponsable as $unResponsable) {
                    echo "Número responsable: " . $unResponsable->getNumEmpleado() . " - Nombre y apellido: " . $unResponsable->getNombre() . " " . $unResponsable->getApellido() . "\n";
                }

                echo "\nIngrese el número de empleado del responsable que desea eliminar: ";
                $numEmpleado = trim(fgets(STDIN));

                // Pregunto si ese empleado está en algún viaje
                $listaAux = $objViaje->listar("rnumeroempleado=" . $numEmpleado);

                if (count($listaAux) > 0) {
                    $unViajeAux = $listaAux[0];
                    if ($numEmpleado == $unViajeAux->getObjResponsable()->getNumEmpleado()) {
                        echo "ERROR: No se puede eliminar un viaje que esté vinculado a un viaje. Elimine los viajes antes de eliminar al responsable.\n";
                    }
                } else {
                    if ($objResponsable->buscar($numEmpleado)) {
                        if ($objResponsable->eliminar()) {
                            echo "\nEl responsable ha sido correctamente eliminado.";
                        } else {
                            echo "\nNo se pudo realizar la eliminación del responsable debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                        }
                    } else {
                        echo "\nNo existe ningún responsable con el número de empleado N°" . $numEmpleado;
                    }
                }
            } else {
                echo "ERROR. No existen responsables para eliminar, prueba agregando uno con la siguiente opción '4'.";
            }
            sleep(3);
            break;

        case 7:
            // option: Ingresar un Viaje
            if (count($listaEmpresa) > 0) {
                if (count($listaResponsable) > 0) {
                    $unaColViajes = $objEmpresa->getColViajes();

                    echo "\nIngrese el destino: ";
                    $destinoViaje = trim(fgets(STDIN));
                    echo "\nIngrese la cantidad máxima de pasajeros: ";
                    $cantMaxPasajerosViaje = trim(fgets(STDIN));

                    $listaResponsable = $objResponsable->listar("");

                    for ($i = 0; $i < count($listaResponsable); $i++) {
                        $unResponsable = $listaResponsable[$i];
                        $mensaje = "Nro Empleado: " . $unResponsable->getNumEmpleado() .  " - Nombre y apellido: " . $unResponsable->getNombre() . " " . $unResponsable->getApellido() . "\n";
                        echo $mensaje;
                    }

                    echo "\nIngrese el número de empleado del responsable: ";
                    $numEmpleadoResponsableViaje = trim(fgets(STDIN));
                    echo "\nIngrese el importe: ";
                    $importeViaje = trim(fgets(STDIN));

                    if ($objResponsable->buscar($numEmpleadoResponsableViaje)) {
                        // Cargar un nuevo viaje
                        $objViaje->cargar($destinoViaje, $cantMaxPasajerosViaje, $objResponsable, [], $importeViaje, $objEmpresa);

                        if ($objViaje->insertar()) {
                            echo "\nEl viaje ha sido correctamente cargado.";
                            $objEmpresa->setColViajes($unaColViajes);
                        } else {
                            echo "\nNo se pudo agregar el viaje debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                        }
                    } else {
                        echo "\nNo existe ningún responsable con el número de empleado N°" . $numEmpleadoResponsableViaje;
                    }
                } else {
                    echo "\nNo existe ningún responsable cargado. Primero ingrese uno en la opcion 4.";
                }
            } else {
                echo "\nNo existe ninguna empresa cargada. primero ingrese una con la opcion 1";
            }
            sleep(3);
            break;

        case 8:
            // option: Modificar viaje
            if (count($listaResponsable) > 0) {
                // Mostrar la lista de viajes
                foreach ($listaViajes as $unViaje) {
                    echo "ID Viaje: " . $unViaje->getIdViaje() . " - Destino: " . $unViaje->getDestino() . "\n";
                }

                echo "\nIngrese el ID del viaje que desea modificar: ";
                $idViaje = trim(fgets(STDIN));
                echo "\nIngrese el nuevo destino del viaje: ";
                $destinoViaje = trim(fgets(STDIN));
                echo "\nIngrese la nueva cantidad máxima de pasajeros: ";
                $cantMaxPasajerosViaje = trim(fgets(STDIN));

                foreach ($listaResponsable as $unResponsable) {
                    echo "Número responsable: " . $unResponsable->getNumEmpleado() . " - Nombre y apellido: " . $unResponsable->getNombre() . " " . $unResponsable->getApellido() . "\n";
                }

                echo "\nIngrese el número de empleado del nuevo responsable: ";
                $numEmpleadoResponsableViaje = trim(fgets(STDIN));
                echo "\nIngrese el nuevo importe: ";
                $importeViaje = trim(fgets(STDIN));

                // Verificar si el viaje existe
                if ($objViaje->buscar($idViaje)) {
                    // Verificar si el responsable existe
                    if ($objResponsable->buscar($numEmpleadoResponsableViaje)) {
                        // Modificar los datos del viaje
                        $objViaje->setDestino($destinoViaje);
                        $objViaje->setCantMaxPasajeros($cantMaxPasajerosViaje);
                        $objViaje->setObjResponsable($objResponsable);
                        $objViaje->setObjEmpresa($objEmpresa);
                        $objViaje->setImporte($importeViaje);
                        if ($objViaje->modificar()) {
                            echo "\nEl viaje ha sido correctamente modificado.";
                        } else {
                            echo "\nNo se pudo realizar la modificación del viaje debido al siguiente error: " . $objResponsable->getMensajeOperacion();
                        }
                    } else {
                        echo "\nNo existe ningún responsable con el número de empleado N°" . $numEmpleadoResponsableViaje;
                    }
                } else {
                    echo "\nNo existe ningun viaje con el ID N°" . $idViaje;
                }
            } else {
                echo "ERROR: No existen viajes para modificar. Pruebe agregando uno con la opción '7'";
            }
            sleep(3);
            break;

        case 9:
            // option: Eliminar un Viaje
            if (count($listaViajes) > 0) {
                echo "Lista de viajes:\n";
                for ($i = 0; $i < count($listaViajes); $i++) {
                    $unViaje = $listaViajes[$i];
                    echo "Viaje ID N°" . $unViaje->getIdViaje() . ", destino: " . $unViaje->getDestino() . ", máximo de pasajeros: " . $unViaje->getCantMaxPasajeros() . ", importe: $" . $unViaje->getImporte();
                }
                echo "\nIngrese el ID del viaje que desea borrar: ";
                $idViaje = trim(fgets(STDIN));
                if ($objViaje->buscar($idViaje)) {
                    if ($objViaje->eliminar()) {
                        echo "El Viaje ha sido correctamente eliminado.";
                    } else {
                        echo "No se pudo realizar la eliminación debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                    }
                } else {
                    echo "No existe ningun viaje con el ID N°" . $idViaje;
                }
            } else {
                echo "No hay ningún viaje para eliminar, use '7' para agregar uno.";
            }
            sleep(3);
            break;

        case 10:
            // option: Insertar un Pasajero
            if (count($listaViajes) > 0) {
                $contador = 0;
                echo "A qué viaje quiere ir?\n";
                $listaViajes = $objViaje->listar(1);
                $cantViajes = count($listaViajes);

                // Mostrar la lista de viajes
                foreach ($listaViajes as $unViaje) {
                    $contador++;
                    $mensaje = $contador . ") ID: " . $unViaje->getIdViaje() . " Destino: " . $unViaje->getDestino() . "\n";
                    echo $mensaje;
                }

                echo "Ingrese un valor entre 1 a " . $cantViajes . ": ";
                $viajeElegido = trim(fgets(STDIN)) - 1;
                $unViaje = $listaViajes[$viajeElegido];

                // Verificar si el viaje tiene cupo disponible
                if (count($unViaje->getColPasajeros()) < $unViaje->getCantMaxPasajeros()) {
                    echo "Ingrese el número de documento: ";
                    $documentoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el nombre: ";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Ingrese el apellido: ";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el número de teléfono: ";
                    $nroTelefono = trim(fgets(STDIN));

                    // Cargar un nuevo Pasajero
                    $objPasajero->cargar($nombrePasajero, $apellidoPasajero, $documentoPasajero, $nroTelefono, $unViaje);
                    
                    if ($objPasajero->insertar()) {
                        echo "\nEl viaje ha sido correctamente cargado.";
                    } else {
                        echo "\nNo se pudo agregar el pasajero debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                    }
                } else {
                    echo "ERROR: Este viaje no tiene cupo.";
                }
            } else {
                echo "No existe ningun viaje en donde cargar el pasajero, primero ingrese uno en la opcion 7";
            }
            sleep(3);
            break;

        case 11:
            // option: Modificar pasajero

            // Verificar si existen pasajeros para modificar
            if (count($listaPasajeros) > 0) {
                // Mostrar la lista de pasajeros existentes
                foreach ($listaPasajeros as $unPasajero) {
                    echo "Nro Documento: " . $unPasajero->getNDocumento() . " - Nombre y apellido: " . $unPasajero->getNombre() . " " . $unPasajero->getApellido() . "\n";
                }
                // Solicitar el número de documento del pasajero a modificar
                echo "Ingrese el Nro de documento del pasajero a modificar: ";
                $nDoc = trim(fgets(STDIN));
                // Verificar si el pasajero existe
                if ($objPasajero->buscar($nDoc)) {
                    // Solicitar los nuevos datos del pasajero
                    echo "Ingrese el nuevo nombre: ";
                    $nombreNuevo = trim(fgets(STDIN));
                    echo "Ingrese el nuevo apellido: ";
                    $apellidoNuevo = trim(fgets(STDIN));
                    echo "Ingrese el nuevo nro telefono: ";
                    $telefonoNuevo = trim(fgets(STDIN));
                    // Cargar los nuevos datos en el objeto del pasajero
                    $objPasajero->cargar($nombreNuevo,$apellidoNuevo,$nDoc,$telefonoNuevo,$objPasajero->getObjViaje());
                    // Modificar el pasajero
                    $objPasajero->modificar();
                    echo "El pasajero ha sido modificado con éxito.\n";
                } else {
                    echo "ERROR: No existe un pasajero con ese número de documento. Porfavor, ingrese uno válido.\n";
                }
            } else {
                echo "ERROR: No existen pasajeros para modificar. Pruebe agregando uno con la opción '10'.\n";
            }
            sleep(3);
            break;

        case 12:
            // option: Eliminar Pasajero

            // Verificar si existen pasajeros para eliminar
            if (count($listaPasajeros)>0){
                foreach ($listaPasajeros as $unPasajero){
                    echo "Nro Documento: ". $unPasajero->getNDocumento(). " - Nombre y apellido: ".$unPasajero->getNombre()." ".$unPasajero->getApellido()."\n";
                }
                // Solicitar el número de documento del pasajero a eliminar
                echo "Ingrese el Nro de documento del pasajero a modificar: ";
                $nDoc = trim(fgets(STDIN));
                // Verificar si el pasajero existe
                if ($objPasajero->buscar($nDoc)){
                    // Eliminar el pasajero
                    if ($objPasajero->eliminar()) {
                        echo "El pasajero ha sido eliminado correctamente.\n";
                    } else {
                        echo "No se pudo realizar la eliminación de la empresa debido al siguiente error: " . $objEmpresa->getMensajeOperacion();
                    }                    
                } else {
                    echo "ERROR: No existen pasajeros con ese número de documento. Ingrese uno válido.\n";
                }
            } else {
                echo "ERROR: No existen pasajeros para eliminar. Pruebe agregando uno con la opción '10'.\n";
            }
            sleep(3);
            break;

        default:
            $sigue = false;
            break;

    }
}
