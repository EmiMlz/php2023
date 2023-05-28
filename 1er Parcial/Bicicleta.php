<?php
    /*
    En la clase Bicicleta:
    Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje, incremento anual, activa (atributo que va a contener un valor true,  si la bici está  disponible para la venta  y false en caso contrario).
    Método constructor que recibe como parámetros los valores iniciales para los atributos  definidos en la clase.
    Los métodos de acceso de cada uno de los atributos de la clase.
    Redefinir el método toString  para que retorne la información de los atributos de la clase.
    Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una bici. Si la bici no se encuentra disponible para la venta retorna un valor < 0. Si la bici está disponible para la venta, el método realiza el siguiente cálculo: 
    $_venta = $_compra + $_compra * (anio * por_inc_anual) 
    donde  $_compra:  es el costo de la bici.
            anio: cantidad de años transcurridos desde que se fabricó  la bici.
            por_inc_anual:  porcentaje de incremento anual de la bici.
 
    */
    class Bicicleta {
        private $codigo;
        private $costo;
        private $anoFabrica;
        private $descripcion;
        private $porcentaje;
        private $incrementoAnual;
        private $activa;
        public function __construct($codigo,$costo,$anoFabrica,$descripcion,$porcentaje,$incrementoAnual,$activa)
        {
            $this->codigo = $codigo;
            $this->costo = $costo;
            $this->anoFabrica = $anoFabrica;
            $this->descripcion = $descripcion;
            $this->porcentaje = $porcentaje;
            $this->incrementoAnual = $incrementoAnual;
            $this->activa = $activa;
        }
        public function getCodigo() {
            return $this->codigo;
        }
        public function getCosto() {
            return $this->costo;
        }
        public function getAnoFabrica() {
            return $this->anoFabrica;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getPorcentaje() {
            return $this->porcentaje;
        }
        public function getIncrementoAnual() {
            return $this->incrementoAnual;
        }
        public function getActiva() {
            return $this->activa;
        }

        // Metodos setters

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        public function setCosto($costo){
            $this->costo = $costo;
        }
        public function setAnoFabrica($anoFabrica){
            $this->anoFabrica = $anoFabrica;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function setPorcentaje($porcentaje){
            $this->porcentaje = $porcentaje;
        }
        public function setIncrementoAnual($incrementoAnual){
            $this->incrementoAnual = $incrementoAnual;
        }
        public function setActiva($activa){
            $this->activa = $activa;
        }
        public function __toString(){
            return $this->codigo . "Codigo - " . $this->getCodigo() . "\nCosto - " . $this->getCosto() . "\n Año de Fabricado - " . $this->getAnoFabrica() . "\n Descripcion - " . $this->getDescripcion() . "\n Porcentaje - " . $this->getPorcentaje() . "\n Incremento Anual - " . $this->getIncrementoAnual() . "\n La Bici se encuentra -" . $this->getActiva();
        }
        /**darPrecioVenta el cual calcula el valor por el cual puede ser vendida una bici. Si la bici no se encuentra disponible para la venta retorna un valor < 0. Si la bici está disponible para la venta, el método realiza el siguiente cálculo: 
        $_venta = $_compra + $_compra * (anio * por_inc_anual) 
        donde  $_compra:  es el costo de la bici.
            anio: cantidad de años transcurridos desde que se fabricó  la bici.
            por_inc_anual:  porcentaje de incremento anual de la bici. */
        public function darPrecioVenta(){
            $estaActiva = $this->getActiva();
            // Si la bici no se encuentra disponible le asigno un valor < 0
            if (!$estaActiva) {
                $valorVenta = -1;
            }
            else {
                //revisar calculo
                $valorVenta = $this->getCosto() + $this->getCosto() * ($this->getAnoFabrica() * $this->getIncrementoAnual()); 
            }
            return $valorVenta;
        }
    }
?>