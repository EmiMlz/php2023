<?php
class Reloj{
    private $hora;
    private $minutos;
    private $segundos;

    public function __construct($hora,$minutos,$segundos)
    {
        $this->hora = $hora;
        $this->minutos = $minutos;
        $this->segundos = $segundos;
    }
    public function getHoras (){
        return $this->hora;
    }
    public function getMinutos (){
        return $this->minutos;
    }
    public function getSegundos (){
        return $this->segundos;
    }
    public function setHoras ($hora){
        $this->hora = $hora;
    }
    public function setMinutos ($minutos){
        $this->minutos = $minutos;
    }
    public function setSegundos ($segundos){
        $this->segundos = $segundos;
    }
    /**
     * Esta funcion settea todas las variables a 0 simulando que se pasaron las 24 horas del dia
     */
    
    public function puesta_a_cero (){
        $this->setHoras(0) . $this->setMinutos(0) . $this->setSegundos(0);
    }
    public function incremento (){
        $horaEnClase = $this->getHoras();
        $minutosEnClase = $this->getMinutos();
        $segundosEnClase = $this->getSegundos();
        $segundosEnClase++;
        if ($segundosEnClase>59){
            $this->setSegundos(0);
            $minutosEnClase++;
        }
        else{
            $this->setSegundos($segundosEnClase);
        }
        if($minutosEnClase>59){
            $this->setMinutos(0);
            $horaEnClase++;
        }
        else{
            $this->setMinutos($minutosEnClase);
        }
        if($horaEnClase>23){
            $this->setHoras(0);
            echo "Ya es otro dia.\n";
        }
        else{
            $this->sethoras($horaEnClase);
        }
    }
    public function __toString()
    {
        return "Son las ". $this->getHoras() . ":" . $this->getMinutos() . ":" . $this->getSegundos() ."\n";         
    }
}





?>