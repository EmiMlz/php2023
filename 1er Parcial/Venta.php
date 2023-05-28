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
        private $colClientes;
        private $colBicicletas;
        private $precioFinal;

        public function __construct($numero, $fecha, $colClientes, $colBicicletas, $precioFinal) {
            $this->numero = $numero;
            $this->fecha = $fecha;
            $this->colClientes = $colClientes;
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
        public function getColClientes() {
            return $this->colClientes;
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
        public function setColClientes($colClientes) {
            $this->colClientes = $colClientes;
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
            $laColClientes = $this->getColClientes();
            $laColBicicletas = $this->getColBicicletas();
            $mensaje = "";
            $mensaje .= "\nNumero - " . $this->getNumero() . "Fecha - \n". $this->getFecha();
            $mensaje .= "\nClientes -";
            for ($i=0; $i < count($laColClientes); $i++) { 
                $miCliente = $laColClientes[$i];
                $mensaje .= $miCliente; 
            }
            $mensaje .= "\n Bicicletas - \n";
            for ($i=0; $i < count($laColBicicletas()); $i++) { 
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
            $laColBicicletas = $this->getColBicicletas();
            $elPrecioFinal = $this->getPrecioFinal();
            if ($objBici->darPrecioVenta()>0) {
                $laColBicicletas[] = $objBici;
                $elPrecioFinal += $objBici->darPrecioVenta();
            }
            $this->setPrecioFinal($elPrecioFinal);
            $this->setColBicicletas($laColBicicletas);
            
        }
    }
?>
