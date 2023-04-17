<?php
/*
En la clase Responsable:
1. Se registra la siguiente información: nombre, apellido, Nro de Documento, direccion,
mail y telefono.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos
definidos en la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los
atributos de la clase. */
    class Responsable
    {
        private $nombre;
        private $apellido;
        private $dni;
        private $direccion;
        private $mail;
        private $telefono;
        
        public function __construct($nombre,$apellido,$dni,$direccion,$mail,$telefono){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->dni = $dni;
            $this->direccion = $direccion;
            $this->mail = $mail;
            $this->telefono = $telefono;
        }
        //METODOS GETTERS
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getDni() {
            return $this->dni;
        }
        public function getDireccion() {
            return $this->direccion;
        }
        public function getMail() {
            return $this->mail;
        }
        public function getTelefono() {
            return $this->telefono;
        }
        //METODOS SETTERS
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setDni($dni) {
            $this->dni = $dni;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setMail($mail) {
            $this->mail = $mail;
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        public function __toString(){
            return "Nombre - " . $this->nombre . "\n" . "Apellido - " . $this->apellido . "\n" . "Dni - " . $this->dni . "\n" . "Direccion - " . $this->direccion . "\n" . "Mail - " . $this->mail . "\n" . "Telefono - " . $this->telefono . "\n";
        }
    }


?>