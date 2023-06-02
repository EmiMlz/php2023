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
        private $numDocumento;
        private $tipoDocumento;

        public function __construct($nombre, $apellido, $estado, $numDocumento,$tipoDocumento) {
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->estado = $estado;
                $this->numDocumento = $numDocumento;
                $this->tipoDocumento = $tipoDocumento;
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
        public function getNumDocumento() {
            return $this->numDocumento;
        }
        public function getTipoDocumento() {
            return $this->tipoDocumento;
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
        public function setNumDocumento($numDocumento) {
            $this->numDocumento = $numDocumento;
        }
        public function setTipoDocumento($tipoDocumento) {
            $this->tipoDocumento = $tipoDocumento;
        }
        public function __toString()
        {
            return "Nombre - " . $this->getNombre() . "\nApellido - " . $this->getApellido() . "\nEstado - " . $this->getEstado() . "\nTipo - ". $this->getTipoDocumento() ."\nNumero de Documento - " . $this->getNumDocumento() . "\n";
        }
    }
?>