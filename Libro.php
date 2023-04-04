<?php
    class Libro {
        //Asignacion de nombre a las propiedades de la clase
        private $ISBN;
        private $titulo;
        private $anioEdicion;
        private $editorial;
        private $nombre;
        private $apellido;
        /**
         * Funcion constructora de variables internas de la clase
         */
        public function __construct($ISBN,$titulo,$anioEdicion,$editorial,$nombre,$apellido){
            $this->ISBN = $ISBN;
            $this->titulo = $titulo;
            $this->anioEdicion = $anioEdicion;
            $this->editorial = $editorial;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }
        /** 
         * METODO DE ACCESO A LAS PROPIEDADES DE LA CLASE
        */
        public function getISBN(){
           return $this->ISBN;
        }
        public function getTitulo(){
           return $this->titulo;
        }
        public function getAnioEdicion(){
           return $this->anioEdicion;
        }
        public function getEditorial(){
            return $this->editorial;
        }
         public function getNombre(){
            return $this->nombre;
        }
         public function getApellido(){
            return $this->apellido;
        }
        /**
          * METODO DE ACCESO A LAS VARIABLES DE LA CLASE
          */
        public function setISBN($ISBN){
            return $this->ISBN = $ISBN;
        }
        public function setTitulo($titulo){
            return $this->titulo = $titulo;
        }
        public function setAnioEdicion($anioEdicion){
            return $this->anioEdicion = $anioEdicion;
        }
        public function setEditorial($editorial){
            return $this->editorial = $editorial;
        }
        public function setNombre($nombre){
            return $this->nombre = $nombre;
        }
        public function setApellido($apellido){
            return $this->apellido = $apellido;
        }
        public function __toString(){
            return "El numero id del libro es " . $this->ISBN . " cuyo titulo es " . $this->titulo . " del anio " . $this->anioEdicion . " de la editorial " . $this->editorial . " del autor " . $this->nombre . " " . $this->apellido;
        }
        public function perteneceEditorial ($pEditorial) {
            return $pEditorial == $this->getEditorial();
        }
        public function aniosDesdeEdicion(){
            $fecha_Actual = date('Y');
            return $fecha_Actual - $this->getAnioEdicion();
        }
        public function iguales($pLibro,$pArreglo){
            for ($i=0; $i < count($pArreglo); $i++) { 
                if ($pLibro == $pArreglo[$i]) {
                    return true;
                }
            }
            return false;
        }
        public function libroDeEditoriales($arregloLibros,$pEditorial){
            $mismaEditorial=[];
            for ($i=0; $i < count($arregloLibros) ; $i++) { 
                if ($arregloLibros[$i]["editorial"] == $pEditorial){
                    $mismaEditorial[$i]= $arregloLibros[$i];
                }
            }
            return $mismaEditorial;
        }
    }
?>