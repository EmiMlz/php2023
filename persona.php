<?php
    class Persona {
        private $nombre;
        private $apellido;
        private $dni;
        public function __construct ($nombre,$apellido,$dni){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->dni = $dni;
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
        
        public function __toString()
        {
            return "Nombre - " . $this->nombre . "\n" . "Apellido - " . $this->apellido . "\n" . "DNI - " . $this->dni['tipo'] . " " . $this->dni['numeroDni'];
        }
    }   
?>