<?php
    class ViajeFeliz {
        //Asignacion de nombre a las propiedades de la clase
        private $viajeId;
        private $destino;
        private $cantMaxPasajeros;
        private $colPasajeros = [];
        private $cantPasajeros;
        private $personaResponable;
        private $costoViaje;
        private $costoTotal;
        /** Metodo constructor */
        public function __construct ($viajeId,$destino,$cantMaxPasajeros,$colPasajeros,$cantPasajeros,$personaResponable,$costoViaje,$costoTotal) {
            $this->viajeId = $viajeId;
            $this->destino = $destino;
            $this->cantMaxPasajeros = $cantMaxPasajeros;
            $this->colPasajeros = $colPasajeros;
            $this->cantPasajeros = $cantPasajeros;
            $this->personaResponable = $personaResponable;
            $this->costoViaje = $costoViaje;
            $this->costoTotal = $costoTotal;
        }
        /** Metodos de acceso a las propiedades */
        public function getViajeId(){
           return $this->viajeId;
        }
        public function getDestino(){
           return $this->destino;
        }
        public function getCantMaxPasajeros(){
           return $this->cantMaxPasajeros;
        }
        public function getColPasajeros(){
            return $this->colPasajeros;
        }
        public function getCantPasajeros(){
            return $this->cantPasajeros;
        }
        public function getPersonaResponsable(){
            return $this->personaResponable;
        }
        public function getCostoViaje(){
            return $this->costoViaje;
        }
        public function getCostoTotal(){
            return $this->costoTotal;
        }

        /** Metodos de setteo */

        public function setViajeId($viajeId){
            return $this->viajeId = $viajeId;
        }
        public function setDestino($destino){
            return $this->destino = $destino;
        }
        public function setCantMaxPasajeros($cantMaxPasajeros){
            return $this->cantMaxPasajeros = $cantMaxPasajeros;
        }
        public function setCantPasajeros($cantPasajeros){
            return $this->cantPasajeros = $cantPasajeros;
        }
        public function setColPasajeros($colPasajeros){
            return $this->colPasajeros = $colPasajeros;
        }
        public function setPersonaResponsable($personaResponable){
            return $this->personaResponable = $personaResponable;
        }
        public function setCostoViaje($costoViaje){
            return $this->costoViaje = $costoViaje;
        }
        public function setCostoTotal($costoTotal){
            return $this->costoTotal = $costoTotal;
        }

        function agregarPasajero($objPasajero) {
            $laColPasajeros = $this->getColPasajeros();
            $cantPasajeros = $this->getCantPasajeros();
            $encontro = false;
            $i=0;
            while (!$encontro && count($laColPasajeros) >$i){
                $unPasajero = $laColPasajeros[$i];
                if ($unPasajero->getDni() == $objPasajero->getDni()) {
                    $encontro = true;
                }
                $i++;
            }
            if ($encontro == false) {
                if ($this->getCantMaxPasajeros()<=$cantPasajeros){
                    echo "Se llego a la cantidad maxima de pasajeros";
                }
                else{
                    echo "Cargado exitosamente al viaje";
                    $laColPasajeros[]=$objPasajero;
                    $cantPasajeros++;
                    $this->setColPasajeros($laColPasajeros);
                    $this->setCantPasajeros($cantPasajeros);
                }
            }
            return $encontro;
        }
        /** Esta funcion elimina a un pasajero.
         * @param INT $dni
         * @return BOOLEAN
         */
        public function eliminarPasajero($dni) {
            $laColPasajeros = $this->getColPasajeros();
            $cantPasajeros = $this->getCantPasajeros();
            $encontro = false;
            $i = 0;
            while ($i < count($laColPasajeros) && !$encontro) {
                $unPasajero = $laColPasajeros[$i];
                if ($unPasajero->getDni() == $dni) {
                    $incremento = $unPasajero->darPorcentajeIncremento();
                    $recaudado = $this->getCostoTotal();
                    $recaudado = $recaudado - ($this->getCostoViaje() + ($this->getCostoViaje() * $incremento / 100));
                    $this->setCostoTotal($recaudado);
                    unset($laColPasajeros[$i]);
                    $laColPasajeros = array_values($laColPasajeros);
                    $this->setColPasajeros($laColPasajeros);
                    $encontro = true;
                    $cantPasajeros--;
                    $this->setCantPasajeros($cantPasajeros);
                }
                $i++;
            }
            return $encontro;
        }
        public function modificarPasajero($nombre, $apellido, $dni, $telefono,$numTicket,$numAsiento) {
            $laColPasajeros = $this->getColPasajeros();
            $encontro = false;
            $i = 0;
            while ($i < count($laColPasajeros) && !$encontro) {
            $unPasajero = $laColPasajeros[$i];
            if ($unPasajero->getDni() == $dni) {
                $unPasajero->setNombre($nombre);
                $unPasajero->setApellido($apellido);
                $unPasajero->setTelefono($telefono);
                $unPasajero->setNumTicket($numTicket);
                $unPasajero->setNumAsiento($numAsiento);
                $laColPasajeros[$i] = $unPasajero;
                $this->setColPasajeros($laColPasajeros);
                $encontro = true;
            }
            $i++;
            }
            return $encontro;
        }

        public function venderPasaje($objPasajero){
            $encontroP = $this->agregarPasajero($objPasajero);
            $costoFinalPasajero = 0;
            $sumaTotal = $this->getCostoTotal();
            if ($encontroP==false) {
                $costoFinalPasajero = $this->getCostoViaje() * (1 + ($objPasajero->darPorcentajeIncremento()/100));
                $sumaTotal += $costoFinalPasajero; 
            }
            $this->setCostoTotal($sumaTotal);
            return $costoFinalPasajero;
        }

        public function hayPasajesDisponible() {
            $hay = false;
            if ($this->getCantPasajeros() < $this->getCantMaxPasajeros()) {
                $hay = true;
            }
            return $hay;
        }

        public function __toString() {
            $salida = "Numero de identificacion del viaje: " . $this->getViajeId() . "\n";
            $salida .= "Destino del viaje: " . $this->getDestino() . "\n";
            $salida .= "Cantidad de pasajeros máximos del viaje: " . $this->getCantMaxPasajeros() . "\n";
            $pasajerosArreglados = $this->getColPasajeros();
            if (count($pasajerosArreglados) != 0) {
                for ($i = 0; $i < count($pasajerosArreglados); $i++) {
                    $unPasajero = $pasajerosArreglados[$i];
                    $salida .= "\nPasajero N°" . ($i+1) . "\n";
                    $salida .= $unPasajero;
                }
                $salida .=  "\n";
            }
            $salida .= "Cantidad de pasajeros : " . $this->getCantPasajeros() . "\n";
            $salida .= "Responsable del viaje: \n";
            $salida .= $this->getPersonaResponsable();
            $salida .= "Costo del viaje: " . $this->getCostoViaje();
            $salida .= "\nTotal Recaudado: " . $this->getCostoTotal() . "\n";
            return $salida;
        }
    }
?>