<?php
include_once "Bicicleta.php";
class BicicletaImportada extends Bicicleta {
    /*
    * Para el caso de las bicicletas importadas, se debe almacenar  el país desde el
     que se importa y el  importe correspondiente a los impuestos de importación que la empresa paga por el ingreso al país
    */
    private $paisOrigen;
    private $impuestoImportacion;
    
    //construct
    public function __construct ($codigo,$costo,$anoFabrica,$descripcion,$incrementoAnual,$activa,$paisOrigen,$impuestoImportacion) {
        parent::__construct($codigo,$costo,$anoFabrica,$descripcion,$incrementoAnual,$activa);
        $this->paisOrigen = $paisOrigen;
        $this->impuestoImportacion = $impuestoImportacion;
    }
    //getter
    public function getPaisOrigen() {
        return $this->paisOrigen;
    }
    public function getImpuestoImportacion() {
        return $this->impuestoImportacion;
    }

    //setter
    public function setPaisOrigen($paisOrigen) {
        $this->paisOrigen = $paisOrigen;
    }
    public function setImpuestoImportacion($impuestoImportacion) {
        $this->impuestoImportacion = $impuestoImportacion;
    }

    public function __toString() {
        $mensaje = parent::__toString();
        $mensaje .= "\nPais Origen - " . $this->getPaisOrigen();
        $mensaje .= "\nImpuesto Por Importacion - " . $this->getImpuestoImportacion();
        return $mensaje;
    }

    public function darPrecioVenta(){
        $estaActiva = $this->getActiva();
        // Si la bici no se encuentra disponible le asigno un valor < 0
        if (!$estaActiva) {
            $valorVenta = -1;
        }
        else {
            $valorVenta = $this->getCosto() + $this->getCosto() * (2023 - $this->getAnoFabrica()) * ($this->getIncrementoAnual()/100); 
            //MODIFICACION AL ORIGINAL, le sumo el impuesto por importacion
            $valorVenta = $valorVenta + $this->getImpuestoImportacion();
        }
        return $valorVenta;
    }

}