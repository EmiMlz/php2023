<?php
/*
    En la clase Empresa:
    Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de bicicletas y la colección de ventas realizadas.
    Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase. 
    Los métodos de acceso para  cada una de las variables instancias de la clase.
    Redefinir el método _toString  para que retorne la información de los atributos de la clase.
    Implementar el método retornarBici($codigoBici) que recorre la colección de bicis de la Empresa y retorna la referencia al objeto bicicleta  cuyo código coincide con el recibido por parámetro. 
    Implementar el método registrarVenta($colCodigosBici, $objCliente) método que recibe por parámetro una colección de códigos de bicicletas, la cual es recorrida, y por cada elemento de la colección se busca el objeto bicicleta correspondiente al código y  se incorpora a la colección de bicis de la instancia Venta que debe ser creada. Recordar que no todos los clientes ni todas las bicis, están disponibles para registrar una venta en un momento determinado.                                                                     
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta. 
    Implementar  el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección  con las ventas realizadas al cliente. 

    */
class Empresa
{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colBicicletas;
    private $colVentasRealizadas;

    public function __construct($denominacion, $direccion, $colClientes, $colBicicletas, $colVentasRealizadas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colBicicletas = $colBicicletas;
        $this->colVentasRealizadas = $colVentasRealizadas;
    }

    //Metodos Getters

    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getColClientes()
    {
        return $this->colClientes;
    }
    public function getColBicicletas()
    {
        return $this->colBicicletas;
    }
    public function getColVentasRealizadas()
    {
        return $this->colVentasRealizadas;
    }

    //Metodos Setters
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setColClientes($colClientes)
    {
        $this->colClientes = $colClientes;
    }
    public function setColBicicletas($colBicicletas)
    {
        $this->colBicicletas = $colBicicletas;
    }
    public function setColVentasRealizadas($colVentasRealizadas)
    {
        $this->colVentasRealizadas = $colVentasRealizadas;
    }


    public function __toString()
    {
        $mensaje = "";
        $laColClientes = $this->getColClientes();
        $laColBicicletas = $this->getColBicicletas();
        $laColVentasRealizadas = $this->getColVentasRealizadas();
        $mensaje .= "\nDenominacion - " . $this->getDenominacion() . "\nDireccion - " . $this->getDireccion() . "\n\nClientes - \n";
        for ($i = 0; $i < count($laColClientes); $i++) {
            $miCliente = $laColClientes[$i];
            $mensaje .= $miCliente . "\n";
        }
        $mensaje .= "\nBicicletas - \n";
        for ($i = 0; $i < count($laColBicicletas); $i++) {
            $miBicicleta = $laColBicicletas[$i];
            $mensaje .= $miBicicleta . "\n";
        }
        $mensaje .= "\nVentas Realizadas - ";
        for ($i = 0; $i < count($laColVentasRealizadas); $i++) {
            $miVentaRealizada = $laColVentasRealizadas[$i];
            $mensaje .= $miVentaRealizada;
        }
        return $mensaje; 
    }

    /**
     * Implementar el método retornarBici($codigoBici) que recorre la colección de bicis de la Empresa y retorna la referencia al objeto bicicleta  cuyo código coincide con el recibido por parámetro.
     */
    public function retornarBici($codigoBici)
    {
        $laColBicicletas = $this->getColBicicletas();
        $i = 0;
        $encontroBici = false;
        while (!$encontroBici && $i < count($laColBicicletas)) {
            $miBicicleta = $laColBicicletas[$i];
            if ($miBicicleta->getCodigo() == $codigoBici) {
                $encontroBici = true;
                $bicicletaEncontrada = $miBicicleta;
            }
            $i++;
        }
        if (!$encontroBici) {
            $bicicletaEncontrada = null;
        }
        return $bicicletaEncontrada;
    }

    /**
     * Implementar el método registrarVenta($colCodigosBici, $objCliente) método que recibe por parámetro una colección de códigos de bicicletas, la cual es recorrida, y por cada elemento de la colección se busca el objeto bicicleta correspondiente al código y se incorpora a la colección de bicis de la instancia Venta que debe ser creada. Recordar que no todos los clientes ni todas las bicis, están disponibles para registrar una venta en un momento determinado.El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta.
     */
    public function registrarVenta($colCodigosBici, $objCliente)
    {
        $coleccionVentas = $this->getColVentasRealizadas();
        $cantidadVentas = count($coleccionVentas);
        $ventaRegistrar = new Venta($cantidadVentas + 1, "", $objCliente, [], 0);
        $cantCodigosBici = count($colCodigosBici);
        $incorporo = false;
    
        for ($i = 0; $i < $cantCodigosBici; $i++) {
            $unCodigo = $colCodigosBici[$i];
            $unaBici = $this->retornarBici($unCodigo);
    
            if ($unaBici == null) {
                echo "No hay ninguna bici con el codigo N°" . $unCodigo . "\n";
            } else {
                if (($unaBici->getActiva()) && ($objCliente->getEstado() == "Alta")) {
                    $ventaRegistrar->incorporarBicicleta($unaBici);
                    $incorporo = true;
                } else {
                    echo "La bici con el codigo N°" . $unCodigo . " no se puede incorporar a la venta\n";
                }
            }
        }
    
        if ($incorporo) {
            $coleccionVentas[] = $ventaRegistrar;
            $this->setColVentasRealizadas($coleccionVentas);
        }
    
        return $ventaRegistrar->getPrecioFinal();
    }
    


    /**
     * Implementar  el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección  con las ventas realizadas al cliente. 
     */
    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $coleccionVentasXCliente = [];
        $laColVentas = $this->getColVentasRealizadas();
        $cantVentas = count($laColVentas);
    
        for ($i = 0; $i < $cantVentas; $i++) {
            $unaVenta = $laColVentas[$i];
            $clienteVenta = $unaVenta->getObjCliente();
            if ($clienteVenta->getTipoDocumento() == $tipo && $clienteVenta->getNumDocumento() == $numDoc){
                $coleccionVentasXCliente[] = $unaVenta;
            }
        }
    
        return $coleccionVentasXCliente;
    }
    
    /**
     * Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.
     */
    public function informarSumaVentasNacionales() {
        $laColVentasRealizadas = $this->getColVentasRealizadas();
        $totalVentasNacionales = 0;
        for ($i=0; $i < count($laColVentasRealizadas) ; $i++) { 
            $unaVenta = $laColVentasRealizadas[$i];
            $totalVentasNacionales += $unaVenta->retornarTotalVentaNacional();
        }
        return $totalVentasNacionales;
    }

    /**Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y retorna una colección de ventas de bicicletas  importadas. Si en la venta al menos una de las bicicletas es importada la venta debe ser informada.
     */
    public function informarVentasImportadas() {
        $laColVentasRealizadas = $this->getColVentasRealizadas();
        $totalVentasImportadas = [];
        for ($i=0; $i < count($laColVentasRealizadas); $i++) { 
            $unaVenta = $laColVentasRealizadas[$i];
            $totalVentasImportadas[] = $unaVenta->retornarBicicletasImportadas();
        }
        return $totalVentasImportadas;
    }
}
?>