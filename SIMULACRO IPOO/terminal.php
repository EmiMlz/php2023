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
    la implementación de este método debe utilizarse uno de los métodos implementados en laclase.
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
         $this->direccion = $direccion;
         $this->colEmpresas = $colEmpresas;
        }
        // Metodos getters
        public function getDenominacion() {
            return $this->denominacion;
        }
        public function getDireccion() {
            return $this->direccion;
        }
        public function getColEmpresas() {
            return $this->colEmpresas;
        }
        //Metodos setters
        public function setDenominacion($denominacion) {
            $this->denominacion = $denominacion;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setColEmpresas($colEmpresas) {
            $this->colEmpresas = $colEmpresas;
        }
        /**
        * recibe por parámetro la cantidad de asientos que se requieren, una fecha, un destino y
        * la empresa con la que se desea viajar. Automáticamente se registra la venta del viaje 
        */
        public function ventaAutomatica($asientos, $fecha, $destino, $empresa) {
            $viajeVendido = $empresa->venderViajeADestino($asientos, $destino, $fecha);
            return $viajeVendido;
        }
        
        
        /** El método empresaMayorRecaudacion retorna un objeto de la clase
        * empresa que se corresponde con la de mayor recaudación.
        */
       public function empresaMayorRecaudacion() {
           // Obtener un array de objetos Empresa
           $laColEmpresas = $this->getColEmpresas();
           // Inicializar una variable para hacer un seguimiento del monto máximo recolectado
           $maxMontoRecaudado = 0;
           // Iterar a través de cada objeto Empresa en el array
           foreach ($laColEmpresas as $unaEmpresa) {
               // Si el monto recolectado de esta Empresa es mayor al máximo actual,
               // actualizar el máximo para que sea el monto recolectado de esta Empresa
               if ($unaEmpresa->montoRecaudado() > $maxMontoRecaudado) {
                   $empresaMayorMonto = $unaEmpresa; // Almacenar esta Empresa como la que tiene el monto más alto recolectado hasta ahora
               }
           }
           //Devolver el objeto Empresa con el monto más alto recolectado
           return $empresaMayorMonto;
       }
       /**
        * Implementar el método responsableViaje($numeroViaje) que recibe por parámetro un
        * numero de viaje y retorna al responsable del viaje
        */
        public function responsableViaje($numeroViaje){
            $responsable = null;
        $empresas = $this->getColEmpresas();
        $i = 0;
        while ($i < count($empresas) && $responsable==null) {
            $objEmpresa = $empresas[$i];
            $responsable = $objEmpresa->darInfoViaje($numeroViaje);  
            $i++;         
        }
        return $responsable;
        }
        

    }
?>