<?php

class Viaje {
    // Atributos
    private $idViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $objResponsable;
    private $colPasajeros;
    private $importe;
    private $objEmpresa;
    private $mensajeOperacion;

    // Método constructor
    public function __construct() {
        $this->idViaje = 0;
        $this->destino = "";
        $this->cantMaxPasajeros = 0;
        $this->objResponsable = null;
        $this->colPasajeros = [];
        $this->importe = 0;
        $this->objEmpresa = null;
    }

    public function cargar($destino, $cantMaxPasajeros, $objResponsable, $colPasajeros, $importe, $objEmpresa) {
        $this->setDestino($destino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setObjResponsable($objResponsable);
        $this->setColPasajeros($colPasajeros);
        $this->setImporte($importe);
        $this->setObjEmpresa($objEmpresa);
    }

    // Métodos set
    public function setIdViaje($idViaje) {
        $this->idViaje = $idViaje;
    }
    public function setDestino($destino) {
        $this->destino = $destino;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros) {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function setObjResponsable($objResponsable) {
        $this->objResponsable = $objResponsable;
    }
    public function setColPasajeros($colPasajeros) {
        $this->colPasajeros = $colPasajeros;
    }
    public function setImporte($importe) {
        $this->importe = $importe;
    }
    public function setMensajeOperacion($mensajeOperacion) {
		$this->mensajeOperacion = $mensajeOperacion;
	}
    public function setObjEmpresa($objEmpresa) {
		$this->objEmpresa = $objEmpresa;
    }

    // Métodos get
    public function getIdViaje() {
        return $this->idViaje;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }
    public function getObjResponsable() {
        return $this->objResponsable;
    }
    public function getColPasajeros() {
        return $this->colPasajeros;
    }
    public function getImporte() {
        return $this->importe;
    }
    public function getMensajeOperacion(){
		return $this->mensajeOperacion;
	}
    public function getObjEmpresa() {
		return $this->objEmpresa;
    }

    //Funcion buscar que trata de encontrar la id de viaje ingresada por parametro y en caso de encontrarla carga los datos internamente 
    public function buscar($idViaje){
        $base = new BaseDatos();
        //Consulta Select en sql que busca todos los atributos de la tabla viaje donde coincida la id de parametro con la de la db
        $consultaViaje = "SELECT * FROM viaje WHERE idviaje=".$idViaje;
        $resp = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consultaViaje)){
                //Se ejecuta la consulta sql
                if($fila = $base->Registro()){
                    //Settea todos los datos encontrados de Base de datos en las variables internas del objeto
                    $unResponsable = new Responsable();
                    $this->setIdViaje($idViaje);
                    $this->setDestino($fila['vdestino']);
                    $this->setCantMaxPasajeros($fila['vcantmaxpasajeros']);
                    //Se encuentra el objeto responsable que coincida con su numero de empleado en la base de datos y carga
                    $unResponsable->buscar($fila['rnumeroempleado']);
                    $this->setObjResponsable($unResponsable);
                    $resp = true;
                }
             } else {
                 $this->setMensajeOperacion($base->getError());
            }
        } else {
             $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    //Funcion listar que obtiene una lista de viajes que cumplan la condicion que se manda por parametro
    public function listar($condicion){
        //Incializo la lista de viajes en null
	    $arregloViajes = null;
		$base=new BaseDatos();
        //Sentencia Sql que selecciona todos los datos/atributos del viaje
		$consultaViajes="Select * from viaje ";
		if ($condicion!=""){
            //Donde se cumpla la condicion ingresada por parametro
		    $consultaViajes=$consultaViajes.' where '.$condicion;
		}
        //Y se ordene por id de viaje
		$consultaViajes.=" order by idviaje ";
		if($base->Iniciar()){
            //Se manda la consulta Sql
			if($base->Ejecutar($consultaViajes)){	
                //Incializo la lista de de viajes como array			
				$arregloViajes= array();
				while($fila=$base->Registro()){
                    //Creo los objetos necesarios y setteo internamente los datos extraidos de la db
				    $objEmpresa = new Empresa();
                    $objResponsable = new Responsable();
                    $pasajeroAux = new Pasajero();
                    $idViaje = $fila['idviaje'];
                    $destino = $fila['vdestino'];
                    $cantMaxPasajeros = $fila['vcantmaxpasajeros'];
                    //Se busca y guarda internamente la empresa que coincida con la id de la base datos
                    $objEmpresa->buscar($fila['idempresa']);
                    //Lo mismo que con el objeto empresa pero con responsable
                    $objResponsable->buscar($fila['rnumeroempleado']);
                    $importe = $fila['vimporte'];
                    //se inicializa el viaje
                    $viajeAux = new Viaje();
                    //y se carga internamente
                    $viajeAux->cargar($destino,$cantMaxPasajeros,$objResponsable,[],$importe,$objEmpresa);
                    $viajeAux->setIdViaje($idViaje);
                    //Listo a los pasajeros que coincidan con el viaje
                    $listaPasajeros = $pasajeroAux->listar("idviaje=".$viajeAux->getIdViaje());
                    $viajeAux->setColPasajeros($listaPasajeros);
                    array_push($arregloViajes,$viajeAux);	
				}							
		 	} else {
		 		$this->setmensajeoperacion($base->getError());		 		
			}
		} else {
		 	$this->setmensajeoperacion($base->getError());		 	
		}	
		return $arregloViajes;
	}

    //Funcion que agregan en la base de datos los datos internos del objeto
    public function insertar(){
        $base = new BaseDatos();
        $resp= false;
        //Consulta Sql que ingresa en la tabla viaje los atributos internos del objeto
        $consultaInsertar = "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) 
                VALUES ('" . $this->getDestino() . "'," . $this->getCantMaxPasajeros() . "," . $this->getObjEmpresa()->getId() . ","  . $this->getObjResponsable()->getNumEmpleado() . "," . $this->getImporte() . ")";
        if ($base->Iniciar()) {
            if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                $this->setIdViaje($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false; 
        $base = new BaseDatos();
        $consultaModificar = "UPDATE viaje SET vdestino='".$this->getDestino()."',vcantmaxpasajeros='".$this->getCantMaxPasajeros()."'
                           ,idempresa=".$this->getObjEmpresa()->getId().",rnumeroempleado=".$this->getObjResponsable()->getNumEmpleado().",vimporte=".$this->getImporte()." WHERE idviaje = ".$this->getIdViaje();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaModificar)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
                $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
                $consultaBorrar = "DELETE FROM viaje WHERE idviaje=".$this->getIdViaje();
                if ($base->Ejecutar($consultaBorrar)) {
                    $resp = true;
                } else {
                    $this->setMensajeOperacion($base->getError());
                }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp; 
    }

    // Método toString
    public function __toString() {
        $cadena = "Código del viaje: " . $this->getIdViaje() . "\n";
        $cadena .= "Destino: " . $this->getDestino() . "\n";
        $cadena .= "Cantidad máxima de pasajeros: " . $this->getCantMaxPasajeros() . "\n";
        $cadena .= "Datos del responsable: " . $this->getObjResponsable() . "\n";
        $cadena .= "Colección de pasajeros\n";
        $arrayPasajeros = $this->getColPasajeros();
        for ($i = 0; $i < count($arrayPasajeros); $i++) {
            $unPasajero = $arrayPasajeros[$i];
            $cadena .= "Pasajero N°" . ($i+1) . "\n";
            $cadena .= $unPasajero;
        }
        $cadena .= "Importe: " . $this->getImporte() . "\n";
        return $cadena;
    }
}
?>