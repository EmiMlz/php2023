<?php
include_once "Venta.php";
include_once "Empresa.php";
include_once "Bicicleta.php";
include_once "Cliente.php";
include_once "BicicletaNacional.php";
include_once "BicicletaImportada.php";

//Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
$objCliente1 = new Cliente("Emiliano","Lopez","Alta",44041629,"DNI");
$objCliente2 = new Cliente("Facundo","Pereira","Alta",33333333,"DNI");

//Cree 4 objetos bicicletas con la  información visualizada en las siguientes tablas: código, costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.
// Bicicletas Nacionales
$objBici1 = new BicicletaNacional(11,89500,2022,"Fire Bird Plegable Cuadro Acero",85,true,11);
$objBici2 = new BicicletaNacional(12,310000,2021,"Bicicleta Trek Marlin 5 Rodado 29 Talle L",70,true,12);
$objBici3 = new Bicicleta(13,10000,2023,"Bicicleta Topmega Fixie Streeter R28 Acero 1vel Azul Osc T54",55,false,0);
// Bicicleta Importada
$objBici4 = new BicicletaImportada(14,12499900,2020,"Bicicleta Vairo Xr 3.8 D29",100,true,"EEUU",6244400);

//Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”,  colección de bicicletas= [$obBici1, $obBici2, $obBici3, $obBici4] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$objEmpresa = new Empresa("Alta Gama","Argentina 123",[$objCliente1,$objCliente2],[$objBici1,$objBici2,$objBici3,$objBici4],[]);

//Invocar al método  registrarVenta($colCodigosBici, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de bicicletas es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.

echo $objEmpresa->registrarVenta([11,12,13,14],$objCliente2);

//Invocar al método  registrarVenta($colCodigosBicicletas, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de bicicletas es la siguiente [0,14].  Visualizar el resultado obtenido.

echo $objEmpresa->registrarVenta([0,14],$objCliente2);

//Invocar al método  registrarVenta($colCodigosBicicletas, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de bicicletas es la siguiente [2,14].  Visualizar el resultado obtenido.

echo $objEmpresa->registrarVenta([2,14],$objCliente2);

//Invocar al método  informarVentasImportadas().  Visualizar el resultado obtenido.

print_r($objEmpresa->informarVentasImportadas());

//Invocar al método  informarSumaVentasNacionales().  Visualizar el resultado obtenido.
//Realizar un echo de la variable Empresa creada en 3.

echo $objEmpresa->informarSumaVentasNacionales();

echo $objEmpresa;

?>