<?

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
        public function setNumFrecuente($numFrecuente){
            $this->numFrecuente = $numFrecuente;
        }
        public function setCantMillas($cantMillas){
            $this->cantMillas = $cantMillas;
        }
    }