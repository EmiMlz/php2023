<?php

use Empresa as GlobalEmpresa;

class Empresa {
    // Atributos
    private $id;
    private $nombre;
    private $direccion;
	private $colViajes = array();
    private $mensajeOperacion;

	//Metodo construct que inicializa las variables internas
    public function __construct() {
        $this->id = 0;
        $this->nombre = "";
        $this->direccion = "";
    }

	//Metodo cargar que settea internamente las variables
    public function cargar($nombre, $direccion) {
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
    }

	//Metodos Setters y Getters
    public function setId($id) {
        $this->id = $id;
    }

	public function getId() {
        return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

	public function getNombre() {
        return $this->nombre;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

	public function getDireccion() {
        return $this->direccion;
    }

	function setColViajes($colViajes){
		$this->colViajes = $colViajes;
	}

	function getColViajes(){
		return $this->colViajes;
	}

    public function setMensajeOperacion($mensajeOperacion){
		$this->mensajeOperacion = $mensajeOperacion;
	}

	public function getMensajeOperacion(){
		return $this->mensajeOperacion;
	}

	//Funcion buscar que por una id ingresada por parametro envia una consulta comparando la id con la de la base de datos y settea en caso de encontrarla
	function buscar($idEmpresa){
		$base=new BaseDatos();
		//Consulta sql que buscar por el id ingresado por parametro
		$consultaEmpresa="Select * from empresa where idempresa=".$idEmpresa;
		$resp= false;
		if($base->Iniciar()){
			//Manda la consulta Sql
			if($base->Ejecutar($consultaEmpresa)){
				if($fila=$base->Registro()){
					//En caso de encontrar la settea internamente
				    $this->setId($idEmpresa);
				    $this->setNombre($fila['enombre']);
					$this->setDireccion($fila['edireccion']);
					$resp= true;
				}							
		 	} else {
		 		$this->setmensajeoperacion($base->getError());		 		
			}
		} else {
		 	$this->setmensajeoperacion($base->getError());		 	
		}		
		return $resp;
	}

	//Funcion listar que obtiene una lista de la empresa cargada o una lista vacia
	public function listar($condicion){
	    $arregloEmpresas = null;
		$base=new BaseDatos();
		//Creo la consulta que selecciona todas las empresas
		$consultaEmpresas="Select * from empresa ";
		if ($condicion!=""){
		    $consultaEmpresas=$consultaEmpresas.' where '.$condicion;
		}
		//Ordeno por Id de las empresas
		$consultaEmpresas.=" order by idempresa ";
		if($base->Iniciar()){
			//Se manda la consulta Sql
			if($base->Ejecutar($consultaEmpresas)){		
				//Inicializo el array de empresas		
				$arregloEmpresas= array();
				while($fila=$base->Registro()){
					//Extrae lo guardado en la base de datos
				    $idEmpresa=$fila['idempresa'];
					$eNombre=$fila['enombre'];
					$eDireccion=$fila['edireccion'];	
					$this->cargar($eNombre,$eDireccion);
					$this->setId($idEmpresa);
					array_push($arregloEmpresas,$this);	
				}							
		 	} else {
		 		$this->setmensajeoperacion($base->getError());		 		
			}
		} else {
		 	$this->setmensajeoperacion($base->getError());		 	
		}	
		return $arregloEmpresas;
	}

	//Funcion insertar que ingresa los datos cargados internamente en la base de datos
    public function insertar(){
		$base = new BaseDatos();
		$resp = false;
		//Consulta Sql que inserta en la tabla empresa los valores de nombre y direccion
		$consultaInsertar = "INSERT INTO empresa(enombre,edireccion) 
				VALUES ('".$this->getNombre()."','".$this->getDireccion()."')";
		if ($base->Iniciar()) {
			if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                $this->setId($id);
			    $resp = true;
			} else {
	    		$this->setMensajeOperacion($base->getError());			
			}
		} else {
			$this->setMensajeOperacion($base->getError());
		}
		return $resp;
	}
	
	// Funcion modificar que actualiza la empresa
	public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();
		// Consulta Sql que actualiza los datos de la empresa en la base de datos donde la id interna coincide con la de la db
		$consultaModificar = "UPDATE empresa SET enombre='".$this->getNombre()."',edireccion='".$this->getDireccion()."' WHERE idempresa=".$this->getId();
		// Manda la consulta
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
	
	// Funcion eliminar que elimina la empresa cargada en la base de dato donde la id interna coincide con la de la db
	public function eliminar(){
		$base = new BaseDatos();
		$resp = false;
		if ($base->Iniciar()) {
				$consultaBorrar="DELETE FROM empresa WHERE idempresa=".$this->getId();
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
        $cadena = "ID: " . $this->getId() . "\n";
        $cadena .= "Nombre: " . $this->getNombre() . "\n";
        $cadena .= "Dirección: " . $this->getDireccion() . "\n";
        return $cadena;
    }
}
?>