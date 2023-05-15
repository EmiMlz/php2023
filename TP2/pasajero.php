<?php
    class Pasajero {
        private $nombre;
        private $apellido;
        private $dni;
        private $telefono;
        private $numTicket;
        private $numAsiento;
        
        public function __construct ($nombre,$apellido,$dni,$telefono,$numTicket,$numAsiento){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->dni = $dni;
            $this->telefono = $telefono;
            $this->numTicket = $numTicket;
            $this->numAsiento = $numAsiento;
        }
        // Metodos getters de los atributos
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getDni(){
            return $this->dni;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function getNumTicket(){
            return $this->numTicket;
        }
        public function getNumAsiento(){
            return $this->numAsiento;
        }
        // Metodos setters de los atributos
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        public function setDni($dni){
            $this->dni = $dni;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function setNumTicket($numTicket){
            $this->numTicket = $numTicket;
        }
        public function setNumAsiento($numAsiento){
            $this->numTicket = $numAsiento;
        }

        public function __toString()
        {
            return "Nombre - " . $this->nombre . "\nApellido - " . $this->apellido . "\nDNI - " . $this->dni . "\nTelefono - \n" . $this->telefono . "\n";
        }
    }   
    class PasajeroVip extends Pasajero {
        private $numFrecuente;
        private $cantMillas;

        public function __construct ($numFrecuente, $cantMillas){
            $this->numFrecuente = $numFrecuente;
            $this->cantMillas = $cantMillas;
        }

        //Getters
        public function getNumFrecuente(){
            return $this->numFrecuente;
        }
        public function getCantMillas(){
            return $this->cantMillas;
        }

        //Setters
        public function setNumFrecuente($numFrecuente)
    }

?>