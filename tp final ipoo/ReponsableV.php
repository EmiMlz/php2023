<?php

class Responsable {
    // Atributos
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;
    private $mensajeOperacion;

    // Método constructor que inicializa las variables internas
    public function __construct() {
        $this->numEmpleado = 0;
        $this->numLicencia = 0;
        $this->nombre = "";
        $this->apellido = "";
    }

    // Metodo cargar que settea los valores internos
    public function cargar($numLicencia, $nombre, $apellido) {
        $this->setNumLicencia($numLicencia);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
    }

    // Métodos set
    public function setNumEmpleado($numEmpleado) {
        $this->numEmpleado = $numEmpleado;
    }
    public function setNumLicencia($numLicencia) {
        $this->numLicencia = $numLicencia;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setMensajeOperacion($mensajeOperacion){
		$this->mensajeOperacion = $mensajeOperacion;
	}

    // Métodos get
    public function getNumEmpleado() {
        return $this->numEmpleado;
    }
    public function getNumLicencia() {
        return $this->numLicencia;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getMensajeOperacion(){
		return $this->mensajeOperacion;
	}

    //Funcion listar que muestra una coleccion de responsables qeu cumplan la condicion ingresada
    public function listar($condicion){
        $arregloResponsable = null;
        $base=new BaseDatos();
        // Consulta Select que selecciona todos los responsables
        $consultaResponsable="Select * from responsable ";
        if ($condicion!=""){
            // Consulta where que agrega la condicion a cumplir para que seleccione
            $consultaResponsable=$consultaResponsable.' where '.$condicion;
        }
        $consultaResponsable.=" order by rnumeroempleado ";
        if($base->Iniciar()){
            if($base->Ejecutar($consultaResponsable)){      
                // Inicializo el arreglo de responsables         
                $arregloResponsable= array();
                while($fila=$base->Registro()){
                    //Extrae lo cargado en la base de datos
                    $numEmpleado=$fila['rnumeroempleado'];
                    $numLicencia=$fila['rnumerolicencia'];
                    $resNombre=$fila['rnombre'];    
                    $resApellido=$fila['rapellido'];
                    //Creo nuevo responsable, cargo los datos internamente en el objeto y lo agrego en la coleccion de empresas
                    $res = new Responsable();    
                    $res->cargar($numLicencia,$resNombre,$resApellido);
                    $res->setNumEmpleado($numEmpleado);
                    array_push($arregloResponsable,$res);    
                }                            
             } else {
                 $this->setmensajeoperacion($base->getError());                 
            }
        } else {
             $this->setmensajeoperacion($base->getError());             
        }    
        return $arregloResponsable;
    }

    //Funcion buscar que mediante un numero de empleado ingresado por parametro
    public function Buscar($numEmpleado){
		$base = new BaseDatos();
        //Consulta Select que elige todos los responsables donde el numero de empleado ingresado como parametro coincida con el de la base de datos
		$consultaPersona = "SELECT * FROM responsable WHERE rnumeroempleado=".$numEmpleado;
		$resp = false;
		if($base->Iniciar()){
            //Manda la consulta Sql
			if($base->Ejecutar($consultaPersona)){
				if($fila = $base->Registro()){
                    //Settea internamente los valores obtenidos de la base de datos en el objeto responsable
                    $this->setNumEmpleado($numEmpleado);
					$this->setNumLicencia($fila['rnumerolicencia']);
					$this->setNombre($fila['rnombre']);
					$this->setApellido($fila['rapellido']);
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

    //Funcion listar que ingresa en la base de datos los datos internos del objeto
    public function insertar(){
		$base = new BaseDatos();
		$resp = false;
        //Consulta que inserta los valores internos del objeto en la db
		$consultaInsertar = "INSERT INTO responsable(rnumerolicencia,rnombre,rapellido) 
				VALUES (".$this->getNumLicencia().",'".$this->getNombre()."','".$this->getApellido()."');";
		if ($base->Iniciar()) {
			if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                $this->setNumEmpleado($id);
			    $resp = true;
			} else {
	    		$this->setMensajeOperacion($base->getError());			
			}
		} else {
			$this->setMensajeOperacion($base->getError());
		}
		return $resp;
	}
	
    //Funcion modificar que actualiza el responsable con la id cargada previamente en el objeto que coincida con la de la db
	public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();
        //Consulta Sql que actualiza los datos de la tabla responsable con los valores internos del objeto
		$consultaModificar="UPDATE responsable SET rnumerolicencia=".$this->getNumLicencia().", rnombre='".$this->getNombre()."',rapellido='".$this->getApellido()."' WHERE rnumeroempleado=".$this->getNumEmpleado();
		if ($base->Iniciar()) {
            //Se manda la consulta
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
	
    //Funcion eliminar que borra el responsable con la id que esta cargada internamente en el objeto que coincida con la de la db
	public function eliminar(){
		$base = new BaseDatos();
		$resp = false;
		if ($base->Iniciar()) {
            //Sentencia sql que borra de la tabla responasble donde coincida la id en la base de datos con la interna del objeto
				$consultaBorrar="DELETE FROM responsable WHERE rnumeroempleado=".$this->getNumEmpleado();
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
        $cadena = "Número de empleado: " . $this->getNumEmpleado() . "\n";
        $cadena .= "Número de licencia: " . $this->getNumLicencia() . "\n";
        $cadena .= "Nombre: " . $this->getNombre() . "\n";
        $cadena .= "Apellido: " . $this->getApellido() . "\n";
        return $cadena;
    }
}
?>