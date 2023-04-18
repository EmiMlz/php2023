<?php
    /*
    En la clase Terminal:
    1. Se registra la siguiente información: denominación, dirección y la colección empresas
    registradas en la terminal.
    2. Método constructor que recibe como parámetros los valores iniciales para los atributos
    de la clase.
    3. Los métodos de acceso para cada una de las variables instancias de la clase.
    4. Redefinir el método _toString para que retorne la información de los atributos de la
    clase.
    5. Implementar el método ventaAutomatica($cantAsientos, $fecha, $destino, $empresa) que
    recibe por parámetro la cantidad de asientos que se requieren, una fecha, un destino y
    la empresa con la que se desea viajar. Automáticamente se registra la venta del viaje. (Para
    la implementación de este método debe utilizarse uno de los métodos implementados en laclase
    FACULTAD DE INFORMÁTICA
    CÁTEDRA INTRODUCCIÓN POO
    Viaje).
    6. Implementar el método empresaMayorRecaudacion retorna un objeto de la clase
    empresa que se co- rresponde con la de mayor recaudación.
    7. Implementar el método responsableViaje($numeroViaje) que recibe por parámetro un
    numero de viaje y retorna al responsable del viaje.
    */
    class Terminal {
        private $denominacion;
        private $direccion;
        private $colEmpresas;
        public function __construct($denominacion, $direccion,$colEmpresas)
        {
         $this->denominacion = $denominacion;
        }
    }
?>