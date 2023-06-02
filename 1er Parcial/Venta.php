<?php
/*
    En la clase Venta:
    Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de bicicletas y el precio final.
    Método constructor  que recibe como parámetros cada uno de los valores a ser asignados a cada atributo de la clase.
    Los métodos de acceso de cada uno de los atributos de la clase.
    Redefinir el método _toString  para que retorne la información de los atributos de la clase.
    Implementar el método incorporarBicicleta($objBici) que recibe por parámetro un objeto bicicleta y lo incorpora a la colección de bicicletas de la venta
    ,siempre y cuando sea posible la venta. El método cada vez que incorpora una  bicicleta a la venta, debe actualizar la variable instancia precio final de la venta. Utilizar el método que calcula el precio de venta de la bici donde crea necesario.
 */
    class Venta {
        private $numero;
        private $fecha;
        private $objCliente;
        private $colBicicletas;
        private $precioFinal;

        public function __construct($numero, $fecha, $objCliente, $colBicicletas, $precioFinal) {
            $this->numero = $numero;
            $this->fecha = $fecha;
            $this->objCliente = $objCliente;
            $this->colBicicletas = $colBicicletas;
            $this->precioFinal = $precioFinal;
        }

        //Metodos getters

        public function getNumero() {
            return $this->numero;
        }
        public function getFecha() {
            return $this->fecha;
        }
        public function getObjCliente() {
            return $this->objCliente;
        }
        public function getColBicicletas() {
            return $this->colBicicletas;
        }
        public function getPrecioFinal() {
            return $this->precioFinal;
        }

        //Metodos setters

        public function setNumero($numero) {
            $this->numero = $numero;
            return $this;
        }
        public function setFecha($fecha) {
            $this->fecha = $fecha;
            return $this;
        }
        public function setObjCliente($objCliente) {
            $this->objCliente = $objCliente;
            return $this;
        }
        public function setColBicicletas($colBicicletas) {
            $this->colBicicletas = $colBicicletas;
            return $this;
        }
        public function setPrecioFinal($precioFinal) {
            $this->precioFinal = $precioFinal;
            return $this;
        }

        public function __toString() {
            $laColBicicletas = $this->getColBicicletas();
            $mensaje = "";
            $mensaje .= "\nNumero - " . $this->getNumero() . "\nFecha - ". $this->getFecha();
            $mensaje .= "\nClientes -\n" . $this->getObjCliente() . "\n";
            $mensaje .= "\n Bicicletas - \n";
            for ($i=0; $i < count($laColBicicletas); $i++) { 
                $miBicicleta = $laColBicicletas[$i];
                $mensaje .= $miBicicleta; 
            }
            $mensaje .= "\n Precio Final - " . $this->precioFinal . "\n";
            return $mensaje;
        }
        /**
         * Implementar el método incorporarBicicleta($objBici) que recibe por parámetro un objeto bicicleta y lo incorpora a la colección de bicicletas de la venta
        *,siempre y cuando sea posible la venta. El método cada vez que incorpora una  bicicleta a la venta, debe actualizar la variable instancia precio final de la venta. Utilizar el método que calcula el precio de venta de la bici donde crea necesario.
         */
        public function incorporarBicicleta($objBici) {
            $precioBici = $objBici->darPrecioVenta();
            if ($precioBici !== -1) {
                $laColBicicletas = $this->getColBicicletas();
                $laColBicicletas[] = $objBici;
                $this->setColBicicletas($laColBicicletas);
                $precioFinal = $this->getPrecioFinal();
                $precioFinal += $precioBici;
                $this->setPrecioFinal($precioFinal);

            }
        }
    }
?>
