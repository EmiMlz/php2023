<?
    include_once "pasajero.php";
    /*
     Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%.  Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %. 
    */
    class PasajeroVip extends Pasajero {
        private $numFrecuente;
        private $cantMillas;

        public function __construct ($nombre,$apellido,$dni,$telefono,$numTicket,$numAsiento,$numFrecuente, $cantMillas){
            parent::__construct($nombre,$apellido,$dni,$telefono,$numTicket,$numAsiento);
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
        public function setNumFrecuente($numFrecuente){
            $this->numFrecuente = $numFrecuente;
        }
        public function setCantMillas($cantMillas){
            $this->cantMillas = $cantMillas;
        }
        /**
         *Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. 
         */
        public function darPorcentajeIncremento(){
            $porcentajeAumentoVip = 35;
            if ($this->getCantMillas()>300){
                $porcentajeAumentoVip = 30;
            }
            return $porcentajeAumentoVip;
        }

        public function __toString()
        {
            $mensaje = parent::__toString();
            $mensaje .= "\n Numero de Viajero Frecuente: " . $this->getNumFrecuente() . "\n Cantidad de Millas Acumuladas: " . $this->getCantMillas(); 
            return $mensaje;
        }
    }