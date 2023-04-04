<?php 
    class Calculadora {  
        private $primerNumero;
        private $segundoNumero;

        public function __construct($pNumero, $sNumero)
        {
            $this->primerNumero = $pNumero;
            $this->segundoNumero = $sNumero;
        }
        public function getPrimerNumero(){
            return $this->primerNumero;
        }
        public function getSegundoNumero(){
            return $this->segundoNumero;
        }
        public function sumar(){
            $loSumado = $this->getPrimerNumero() + $this->getSegundoNumero();
            return $loSumado;
        }
        public function __toString()
        {
            return $this->sumar();
        }
    }
    echo $sumando= new Calculadora (5,2);
?>