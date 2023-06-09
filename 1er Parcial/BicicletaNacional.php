<?php
include_once "Bicicleta.php";
class BicicletaNacional extends Bicicleta {

    private $descuentoNacional;
    
    //construct
    public function __construct ($codigo,$costo,$anoFabrica,$descripcion,$incrementoAnual,$activa,$descuentoNacional) {
        parent::__construct($codigo,$costo,$anoFabrica,$descripcion,$incrementoAnual,$activa);
        $this->descuentoNacional = $descuentoNacional;
    }
    //getter
    public function getDescuentoNacional() {
        return $this->descuentoNacional;
    }
    //setter
    public function setDescuentoNacional($descuentoNacional) {
        $this->descuentoNacional = $descuentoNacional;
    }

    public function __toString() {
        $mensaje = parent::__toString();
        $mensaje .= "\nDescuento Nacional - " . $this->getDescuentoNacional();
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
            // MODIFICACION DEL ORIGINAL, aplico descuento en base al porcentaje sobre la venta
            $valorVenta = $valorVenta - ($valorVenta * ($this->getDescuentoNacional()/100));
        }
        return $valorVenta;
    }

}