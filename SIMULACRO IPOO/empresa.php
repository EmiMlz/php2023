<?php
    /* 
    En la clase Empresa :
    1. Se registra la siguiente información: identificación, nombre y la colección de Viajes que
    realiza.
    2. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    3. Los métodos de acceso de cada uno de los atributos de la clase.
    4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
    5. Implementar el método darViajeADestino($elDestino) que recibe por parámetro un
    destino junto a una cantidad de asientos y retorna una colección con todos los viajes
    disponibles a ese destino.
    6. Implementar el método incorporarViaje($objViaje) que recibe como parámetro un viaje,
    verifica que no se encuentre registrado ningún otro viaje al mismo destino, en la misma
    fecha y con el mismo horario de partida. El método retorna verdadero si la incorporación
    del viaje se realizó correctamente y falso en caso contrario.
    7. Implementar el método venderViajeADestino($canAsientos, $destino, $fecha) método que
    recibe por parámetro la cantidad de asientos, el destino, una fecha y se registra la
    asignación del viaje en caso de ser posible. (invocar al método
    asignarAsientosDisponibles). El método retorna la instancia del viaje asignado o null
    en caso contrario.
    8. Implementar el método montoRecaudado que retorna el monto recaudado por la
    Empresa. (tener en cuenta los asientos vendidos y el importe del viaje)*/
    class Empresa
    {
        private $identificacionEmpresa;
        private $nombreEmpresa;
        private $colViajes;
        public function __construct($identificacionEmpresa,$nombreEmpresa,$colViajes){
            $this->identificacionEmpresa = $identificacionEmpresa;
            $this->nombreEmpresa = $nombreEmpresa;
            $this->colViajes = $colViajes;
        }
        //METODOS GETTERS
        public function getIdentificacionEmpresa() {
            return $this->identificacionEmpresa;
        }
        public function getNombreEmpresa() {
            return $this->nombreEmpresa;
        }
        public function getColViajes() {
            return $this->colViajes;
        }
        public function setIdentificacionEmpresa($identificacionEmpresa) {
            $this->identificacionEmpresa = $identificacionEmpresa;
        }
        public function setNombreEmpresa($nombreEmpresa) {
            $this->nombreEmpresa = $nombreEmpresa;
        }
        public function setColViajes($colViajes) {
            $this->colViajes = $colViajes;
        }

        public function __toString(){
            return "Id de la Empresa - " . $this->getIdentificacionEmpresa() . "\n" . "Nombre de la Empresa - " . $this->getNombreEmpresa() . "\n" . "Viajes - " . $this->getColViajes() . "\n";
        }

        public function incorporarViaje($objViaje){
            $laColeccionDeViajes = $this->getColViajes();
            $encontro= false;
            for ($i=0; $i < count($laColeccionDeViajes) ; $i++) { 
                if($laColeccionDeViajes[$i]['destino'] == $objViaje[$i]['destino']){
                    $encontro = true;
                }
                if($laColeccionDeViajes[$i]['fecha'] == $objViaje[$i]['fecha']){
                    $encontro = true;
                }
                if($laColeccionDeViajes[$i]['horarioPartida'] == $objViaje[$i]['horarioPartida']){
                    $encontro = true;
                }
            }
            if ($encontro==false) {
                $this->setColViajes($objViaje);
            }
        }

        /*public function darViajeADestino ($elDestino,$losAsientos){
            $colConDestinoA[]= "";
            $laColeccionDeViajes = array (
                array('destino'=>"Madrid",'horaPartida'=>"12:00",'horaLlegada'=>"15:00",'numeroViaje'=>"1",'importe'=>10000,'fecha'=>"15/04",'cantAsientos'=>"30",'cantAsientosDisponibles'=>"15"),
                array('destino'=>"Barilo",'horaPartida'=>"12:00",'horaLlegada'=>"15:00",'numeroViaje'=>"2",'importe'=>10000,'fecha'=>"15/04",'cantAsientos'=>"30",'cantAsientosDisponibles'=>"15")
            );
            $i=0;
            $encontro =false;
            //$laColeccionDeViajes = $this->getColViajes();
            while (!$encontro && $i<count($laColeccionDeViajes)) {
                if ($elDestino == $laColeccionDeViajes[$i]['destino']){
                    $colConDestinoA = $laColeccionDeViajes[$i];
                    $encontro = true;
                    if ($) {
                        # code...
                    }
                }
                $i++;
            }
            print_r ($colConDestinoA);
        }*/
    }
?>