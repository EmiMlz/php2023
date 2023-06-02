<?php
/*
Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
Cree 3 objetos Bicicletas con la  información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo.
Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”,  colección de bicicletas= [$obBici1, $obBici2, $obBici3] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
Invocar al método  registrarVenta($colCodigosBici, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de bicicletas es la siguiente [11,12,13]. Visualizar el resultado obtenido.
Invocar al método  registrarVenta($colCodigosBicicletas, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de bicicletas es la siguiente [0].  Visualizar el resultado obtenido.
Invocar al método  registrarVenta($colCodigosBicicletas, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de bicicletas es la siguiente [2].  Visualizar el resultado obtenido.
Invocar al método retornarVentasXCliente($tipo,$numDoc)  donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente1.
Invocar al método retornarVentasXCliente($tipo,$numDoc)  donde el tipo y número de documento se corresponden con  el tipo y número de documento del $objCliente2
Realizar un echo de la variable Empresa creada en 2.

*/
include_once "Venta.php";
include_once "Empresa.php";
include_once "Bicicleta.php";
include_once "Cliente.php";

$objCliente1 = new Cliente("Emiliano","Lopez","Alta",44041629,"DNI");
$objCliente2 = new Cliente("Facundo","Pereira","Alta",33333333,"DNI");
//
$objBici1 = new Bicicleta(11,89500,2022,"Fire Bird Plegable Cuadro Acero",85,true);
$objBici2 = new Bicicleta(12,310000,2021,"Bicicleta Trek Marlin 5 Rodado 29 Talle L",70,true);
$objBici3 = new Bicicleta(13,10000,2023,"Bicicleta Topmega Fixie Streeter R28 Acero 1vel Azul Osc T54",55,false);

$colBicicletas1 = array($objBici1,$objBici2,$objBici3);

$objEmpresa = new Empresa("Alta Gama","Argentina 123",[$objCliente1,$objCliente2],$colBicicletas1,[]);
echo "--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
//5
echo "\n";
echo $objEmpresa->registrarVenta([12,11,13],$objCliente2);
echo "\n";
echo $objEmpresa;
echo "\n";
//6
echo $objEmpresa->registrarVenta([0],$objCliente2);
echo "\n";
//7
echo $objEmpresa->registrarVenta([2],$objCliente2);
echo "\n";
//8

$bicisXCliente1 =  $objEmpresa->retornarVentasXCliente("DNI",44041629);
echo "\n";
foreach($bicisXCliente1 as $venta){
    echo $venta;
}
//9

$bicisXCliente2 = $objEmpresa->retornarVentasXCliente("DNI",33333333);
echo "\n";
foreach($bicisXCliente1 as $venta){
    echo "Venta ID: " . $venta->getNumero() . ", Cliente: " . $venta->getObjCliente()->getNombre() . "\n";
}
//10
echo $objEmpresa;


?>