<?php
    /* 14. Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
    saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
    14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
    atributos de la clase.
    14.b. Los método de acceso de cada uno de los atributos de la clase.
    14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
    dividido entre 365 aplicado al saldo actual).
    14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
    14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
    14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
    14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada
    uno de los métodos implementados.*/
    class CuentaBancaria {
        private $numeroDeCuenta;
        private $dniCliente;
        private $saldoActual;
        private $interesAnual;
        public function __construct ($numeroDeCuenta,$dniCliente,$saldoActual,$interesAnual){
            $this->numeroDeCuenta = 0;
            $this->dniCliente = 0;
            $this->saldoActual = 0;
            $this->interesAnual = 0;
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

    

    }   


?>