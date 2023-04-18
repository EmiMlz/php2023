<?php
    class ResponsableV {
        private $idEmpleado;
        private $licencia;
        private $nombre;
        private $apellido;
        
        public function __construct ($idEmpleado,$licencia,$nombre,$apellido){
            $this->idEmpleado = $idEmpleado;
            $this->licencia = $licencia;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }
        // Metodos getters de los atributos
        public function getIdEmpleado(){
            return $this->idEmpleado;
        }
        public function getLicencia(){
            return $this->licencia;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        // Metodos setters de los atributos
        public function setIdEmpleado($idEmpleado){
            $this->idEmpleado = $idEmpleado;
        }
        public function setLicencia($licencia){
            $this->licencia = $licencia;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        
        public function __toString() {
            $salida = "Numero de empleado: " . $this->getIdEmpleado() . "\n";
            $salida .= "Numero de licencia: " . $this->getLicencia() . "\n";
            $salida .= "Nombre: " . $this->getNombre() . "\n";
            $salida .= "Apellido: " . $this->getApellido() . "\n";
            return $salida;
        }
    }   
?>