<?php
/*En la clase Viaje:
1. Se registra la siguiente información: destino, hora de partida, hora de llegada, número,
importe, fecha, cantidad de asientos totales, cantidad de asientos disponibles, y una
referencia a la persona responsable del viaje.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos
definidos en la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la
clase.
5. Implementar el método asignarAsientosDisponibles($catAsientos) que recibe por
parámetros la canti- dad de asientos que desean asignarse. El método retorna
verdadero en caso que la asignación pueda concretarse y falso en caso contrario*/
class Viaje
    {
        private $destino;
        private $horaPartida;
        private $horaLlegada;
        private $numero;
        private $importe;
        private $fecha;
        private $cantAsientos;
        private $cantAsientosDisponibles;
        private $referencia; //que

        public function __construct($destino,$horaPartida,$horaLlegada,$numero,$importe,$fecha,$cantAsientos,$cantAsientosDisponibles,$referencia){
            $this->destino = $destino;
            $this->horaPartida = $horaPartida;
            $this->horaLlegada = $horaLlegada;
            $this->numero = $numero;
            $this->importe = $importe;
            $this->fecha = $fecha;
            $this->cantAsientos = $cantAsientos;
            $this->cantAsientosDisponibles = $cantAsientosDisponibles;
            $this->referencia = $referencia;
        }
        //METODOS GETTERS
        public function getDestino() {
            return $this->destino;
        }
        public function getHoraPartida() {
            return $this->horaPartida;
        }
        public function getHoraLlegada() {
            return $this->horaLlegada;
        }
        public function getNumero() {
            return $this->numero;
        }
        public function getImporte() {
            return $this->importe;
        }
        public function getFecha() {
            return $this->fecha;
        }
        public function getCantAsientos() {
            return $this->cantAsientos;
        }
        public function getCantAsientosDisponibles() {
            return $this->cantAsientosDisponibles;
        }
        public function getReferencia() {
            return $this->referencia;
        }
        // METODOS SETTERS
        public function setDestino($destino) {
            $this->destino = $destino;
        }
        public function setHoraPartida($horaPartida) {
            $this->horaPartida = $horaPartida;
        }
        public function setHoraLlegada($horaLlegada) {
            $this->horaLlegada = $horaLlegada;
        }
        public function setNumero($numero) {
            $this->numero = $numero;
        }
        public function setImporte($importe) {
            $this->importe = $importe;
        }
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        public function setCantAsientos($cantAsientos) {
            $this->cantAsientos = $cantAsientos;
        }
        public function setCantAsientosDisponibles($cantAsientosDisponibles) {
            $this->cantAsientosDisponibles = $cantAsientosDisponibles;
        }
        public function setReferencia($referencia) {
            $this->referencia = $referencia;
        }
        public function asignarAsientosDisponibles($cantAsientosOcupar){
            $disponibilidad = false;
            if ($this->cantAsientos>$this->getCantAsientosDisponibles()){
                if($this->getCantAsientosDisponibles()-$cantAsientosOcupar>0){
                    $this->setCantAsientosDisponibles($this->getCantAsientosDisponibles() - $cantAsientosOcupar);
                    $disponibilidad = true;
                }
            }
            return $disponibilidad;
        }
        public function __toString(){
            return "Destino - " . $this->destino . "\n" . "Hora de Partida - " . $this->getHoraPartida() . "\n" . "Hora de Llegada - " . $this->horaLlegada . "\n" . "Numero del Viaje - " . $this->numero . "\n" . "Importe - " . $this->importe . "\n" . "Fecha - " . $this->fecha . "\n" . "Cantidad de Asientos - " . $this->cantAsientos . "\n" . "Cantidad de Asientos Disponibles - " . $this->cantAsientosDisponibles . "\n" . "Referencia a la Persona Responsable - \n" . $this->referencia . "\n";
        } //Segun mi gran analisis critico, para mostrar la referencia debemos asignarle la clase referencia a una variable y mostrarla por aca?

    }
?>