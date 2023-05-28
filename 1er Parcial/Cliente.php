<?php
    /*
    En la clase Cliente:
    Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    Método constructor que recibe como parámetros los valores iniciales para los atributos.
    Los métodos de acceso de cada uno de los atributos de la clase.
    Redefinir el método _toString  para que retorne la información de los atributos de la clase.
    */
    class Cliente {
        private $nombre;
        private $apellido;
        private $estado;
        private $dni;

        public function __construct($nombre, $apellido, $estado, $dni) {
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->estado = $estado;
                $this->dni = $dni;
            }
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getEstado() {
            return $this->estado;
        }
        public function getDni() {
            return $this->dni;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        public function setDni($dni) {
            $this->dni = $dni;
        }
        public function __toString()
        {
            return "Nombre -" . $this->getNombre() . "\n Apellido - " . $this->getApellido() . "\n Estado - " . $this->getEstado() . "Tipo ". $this->getDni()['tipo'] ."\n . DNI - " . $this->getDni()['numero'];
        }
    }
?>