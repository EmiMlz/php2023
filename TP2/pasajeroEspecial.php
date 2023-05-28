<?
    include_once "pasajero.php";
    class PasajeroEspecial extends Pasajero {
        private $poseeSilla;
        private $rqAsistencia;
        private $rqComidaEspecial;

        public function __construct ($nombre,$apellido,$dni,$telefono,$numTicket,$numAsiento,$poseeSilla, $rqAsistencia,$rqComidaEspecial){
            parent::__construct($nombre,$apellido,$dni,$telefono,$numTicket,$numAsiento);
            $this->poseeSilla = $poseeSilla;
            $this->rqAsistencia = $rqAsistencia;
            $this->rqComidaEspecial = $rqComidaEspecial;
        }

        //Getters
        public function getPoseeSilla(){
            return $this->poseeSilla;
        }
        public function getRqAsistencia(){
            return $this->rqAsistencia;
        }
        public function getRqComidaEspecial(){
            return $this->rqComidaEspecial;
        }

        //Setters
        public function SetPoseeSilla($poseeSilla){
            $this->poseeSilla = $poseeSilla;
        }
        public function setRqAsistencia($rqAsistencia){
            $this->rqAsistencia = $rqAsistencia;
        }
        public function setRqComidaEspecial($rqComidaEspecial){
            $this->rqComidaEspecial = $rqComidaEspecial;
        }

        /**
         * Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
         */
        public function darPorcentajeIncremento(){
            $cantServicios = 0;
            $porcentajeAumentoEspecial = 15;
            if ($this->getPoseeSilla()==true){
                $cantServicios += 1;
            }
            if ($this->getRqAsistencia()==true){
                $cantServicios +=1;
            }
            if ($this->getRqComidaEspecial()==true){
                $cantServicios += 1;
            }
            if ($cantServicios>1){
                $porcentajeAumentoEspecial = 30;
            }
            return $porcentajeAumentoEspecial;
        }

        public function __toString()
        {
            $mensaje = parent::__toString();

            if ($this->getPoseeSilla()==true){
                $mensaje .= "\n Requiere Silla: Si";
            }
            if ($this->getRqAsistencia()==true){
                $mensaje.= "\n Requiere Asistencia para embarque/desembarque: Si";
            }
            if ($this->getRqComidaEspecial()==true){
                $mensaje.= "\n Requiere Comida Especial : Si";
            }
            return $mensaje;
        }
        
    }