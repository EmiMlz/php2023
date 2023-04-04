<?php
    class Fecha {
        //Asignacion de nombre a las propiedades de la clase
        private $year;
        private $month;
        private $day;
        /**
         * Funcion constructora de variables internas de la clase
         */
        public function __construct($year,$month,$day){
            $this->year = $year;
            $this->month = $month;
            $this->day = $day;
        }
        /**
         * Metodo de accesos a la variables de la clase
         */
        public function getYear(){
           return $this->year;
        }
        /**
         * Metodo de accesos a la variables de la clase
         */
        public function getMonth(){
           return $this->month;
        }
        /**
         * Metodo de acceso a las variables de la clase
         */
        public function getDay(){
           return $this->day;
        }
        /**
         * Metodo de setteo para las variables de la clase
         */
        public function setYear($year){
            $this->year = $year;
         }
        public function setMonth($month){
            $this->month = $month;
         }
         public function setDay($day){
            $this->day = $day;
         }
         public function fechaExtendida (){
            $mesAMostrar = $this->getMonth();
            $diaAMostrar = $this->getDay();
            $añoAMostrar = $this->getYear();
            switch ($mesAMostrar) {
               case '1':
                  $fechaString = "Es el dia " . $diaAMostrar . " de enero de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '2':
                  $fechaString = "Es el dia " . $diaAMostrar . " de febrero de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '3':
                  $fechaString = "Es el dia " . $diaAMostrar . " de marzo de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '4':
                  $fechaString = "Es el dia " . $diaAMostrar . " de abril de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '5':
                  $fechaString = "Es el dia " . $diaAMostrar . " de mayo de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '6':
                  $fechaString = "Es el dia " . $diaAMostrar . " de junio de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '7':
                  $fechaString = "Es el dia " . $diaAMostrar . " de julio de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '8':
                  $fechaString = "Es el dia " . $diaAMostrar . " de agosto de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '9':
                  $fechaString = "Es el dia " . $diaAMostrar . " de septiembre de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '10':
                  $fechaString = "Es el dia " . $diaAMostrar . " de octubre de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '11':
                  $fechaString = "Es el dia " . $diaAMostrar . " de noviembre de " . $añoAMostrar;
                  return $fechaString;
                  break;
               case '12':
                  $fechaString = "Es el dia " . $diaAMostrar . " de diciembre de " . $añoAMostrar;
                  return $fechaString;
                  break;
               default:
                  # code...
                  break;
            }
         }
         public function __toString()
         {
               return "La fecha actual es " . $this->year . "/" . $this->month. "/" . $this->day . "\n";
         }
         public function incremento_dias($diasAumento){
            $classDay = $this-> getDay();
            $classMonth = $this-> getMonth();
            $classYear = $this-> getYear();
            for ($i=0; $i < $diasAumento ; $i++) {
               if ($classYear % 4 == 0 && $classYear % 100 !=0 || $classYear % 400==0){
                  if ($classMonth % 2==0 && $classMonth != 2){
                     if ($classDay<30){
                        $classDay++;
                        $this->setDay($classDay);
                     }
                     else {
                        $classDay = 1;
                        $this->setDay(1);
                        $classMonth++;
                        $this->setMonth($classMonth);
                     }
                  }
                  elseif ($classMonth==2){
                     if ($classDay<29){
                        $classDay++;
                        $this->setDay($classDay);
                     }
                     else {
                        $classDay = 1;
                        $this->setDay(1);
                        $classMonth++;
                        $this->setMonth($classMonth);
                     }
                  }
                  else{
                     if ($classDay<31){
                        $classDay++;
                        $this->setDay($classDay);
                     }
                     else {
                        $classDay = 1;
                        $this->setDay(1);
                        $classMonth++;
                        $this->setMonth($classMonth);
                     }
                  }
                  if ($classMonth>12){
                     $classYear++;
                     $this->setYear($classYear);
                     $classMonth = 1;
                     $this->setMonth($classMonth);
                  }
               }
               else{
                  if ($classMonth % 2==0 && $classMonth != 2){
                     if ($classDay<30){
                        $classDay++;
                        $this->setDay($classDay);
                     }
                     else {
                        $classDay = 1;
                        $this->setDay(1);
                        $classMonth++;
                        $this->setMonth($classMonth);
                     }
                  }
                  elseif ($classMonth==2){
                     if ($classDay<28){
                        $classDay++;
                        $this->setDay($classDay);
                     }
                     else {
                        $classDay = 1;
                        $this->setDay(1);
                        $classMonth++;
                        $this->setMonth($classMonth);
                     }
                  }
                  else{
                     if ($classDay<31){
                        $classDay++;
                        $this->setDay($classDay);
                     }
                     else {
                        $classDay = 1;
                        $this->setDay(1);
                        $classMonth++;
                        $this->setMonth($classMonth);
                     }
                  }
                  if ($classMonth>12){
                     $classYear++;
                     $this->setYear($classYear);
                     $classMonth = 1;
                     $this->setMonth($classMonth);
                  }
               }
            }
         
         } 
      }
?>