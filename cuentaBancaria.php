<?php
    class CuentaBancaria {
        private $numeroDeCuenta;
        private $dniCliente;
        private $saldoActual;
        private $interesAnual;
        public function __construct ($numeroDeCuenta,$dniCliente,$saldoActual,$interesAnual){
            $this->numeroDeCuenta = $numeroDeCuenta;
            $this->dniCliente = $dniCliente;
            $this->saldoActual = $saldoActual;
            $this->interesAnual = $interesAnual;
        }
        // Metodos getters de los atributos
        public function getNumeroDeCuenta(){
            return $this->numeroDeCuenta;
        }
        public function getDniCliente(){
            return $this->dniCliente;
        }
        public function getSaldoActual(){
            return $this->saldoActual;
        }
        public function getInteresAnual(){
            return $this->interesAnual;
        }
        // Metodos setters de los atributos
        public function setNumeroDeCuenta($numeroDeCuenta){
            $this->numeroDeCuenta = $numeroDeCuenta;
        }
        public function setDniCliente($dniCliente){
            $this->dniCliente = $dniCliente;
        }
        public function setSaldoActual($saldoActual){
            $this->saldoActual = $saldoActual;
        }
        public function setInteresAnual($interesAnual){
            $this->interesAnual = $interesAnual;
        }
        public function actualizarSolo(){
            $saldo = $this->getSaldoActual();
            echo $saldo . "\n";
            echo (1 + ($this->getInteresAnual()/365.0)/100) . "\n";
            $saldo = $saldo * (1 + (($this->getInteresAnual()/365.0)/100));
            echo $saldo;
            $this->setSaldoActual($saldo);
        }
        public function depositar($deposito){
            $deposito += $this->getSaldoActual();
            $this->setSaldoActual($deposito);
        }
        public function retirar($montoARetirar){
            $saldo = $this->getSaldoActual();
            if ($saldo>0 && $montoARetirar<$saldo){
                $saldo -= $montoARetirar;
                $this->setSaldoActual($saldo);
            }
            else {
                echo "No se puede realizar la extraccion";
            }
        }
        public function __toString()
        {
            return "El saldo actual de la cuenta es de: " . $this->saldoActual . " y el APR es de %" . $this->interesAnual;

        }
    

    }   


?>