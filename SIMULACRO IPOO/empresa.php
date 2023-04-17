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
            $laColeccionToString = $this->getColViajes();
            $mensaje = "";
            $mensaje = "Id de la Empresa - " . $this->getIdentificacionEmpresa() . "\n" . "Nombre de la Empresa - " . $this->getNombreEmpresa() . "\n" . "Viajes - \n";
            for ($i=0; $i < count($laColeccionToString); $i++) { 
                $mensaje .= "Viaje N° - " . ($i+1) . "\n";
                $mensaje .= $laColeccionToString[$i];
            }
            return $mensaje;
        }

        public function incorporarViaje($objViaje){
            $i=0;
            $laColeccionDeViajes = $this->getColViajes();
            $encontro= false;
           while (!$encontro && $i<count($laColeccionDeViajes)){
                $unViaje=$laColeccionDeViajes[$i];
                if($unViaje->getDestino() == $objViaje->getDestino() && $unViaje->getFecha() == $objViaje->getFecha() && $unViaje->getHoraPartida() == $objViaje->getHoraPartida()){
                    $encontro = true;
                }
                $i++;
            }
            if ($encontro==false) {
                $laColeccionDeViajes[]= $objViaje;
                $this->setColViajes($laColeccionDeViajes);
            }
        }

        public function darViajeADestino ($elDestino,$losAsientos){
            $colConDestinoA=[];
            $i=0;
            $laColeccionDeViajes = $this->getColViajes();
            for ($i=0; $i <count ($laColeccionDeViajes) ; $i++) { 
                $unViaje = $laColeccionDeViajes[$i];
                if ($unViaje->getDestino() == $elDestino && (($unViaje->getCantAsientosDisponibles()-$losAsientos) >=0)){
                    $colConDestinoA[]=$unViaje;
                }
            }
            return $colConDestinoA;
        }
        public function venderViajeADestino($canAsientos, $destino, $fecha){
            $colViajesAVender = $this->getColViajes();
            $encontro = false;
            $i=0;
            $viajeVendido = null;
            while (!$encontro && count($colViajesAVender)>$i){
                $unViaje=$colViajesAVender[$i];
                if($destino == $unViaje->getDestino && $fecha == $unViaje->getFecha){
                    if($unViaje->asignarAsientosDisponibles($canAsientos)){
                        $encontro = true;
                        $viajeVendido = $unViaje;
                    }
                }
                $i++;
            }
            return $viajeVendido;
        }

        public function montoRecaudado(){
            $laColeccionDeViajes = $this->getColViajes();
            $acumulador=0;
            for ($i=0; $i < count($laColeccionDeViajes); $i++) { 
                $unViaje = $laColeccionDeViajes[$i];
                $acumulador += ($unViaje->getCantAsientos() - $unViaje->getCantAsientosDisponibles()) * $unViaje->getImporte(); 
            }
            return $acumulador;
        }
    }
?>