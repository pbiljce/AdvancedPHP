<?php
    /**
     * ZADATAK - Ispis u minutama i sekundama
     * Prethodno kreiranu klasu (DateDifference) proširiti tako da dobije mogućnost ispisa razlike u minutama i sekundama, te da ispis bude kroz posebnu metodu koju pozivamo nakon instanciranja objekta
     */
    class DateDifference{
        public $date1 = "";
        public $date2 = "";
        public $format = "";
        public $result = "";

        public function __construct($date1,$date2,$format){
            if(!is_string($this -> date1) || !is_string($this -> date2) || !is_string($this -> format)){
                die("Unesite ispravan tip podatka");
            }
                if(empty($date2)){
                    $date2 = Date('d.m.Y H:i:s');
                }
                $this -> date1 = $date1;
                $this -> date2 = $date2;
                $this -> format = $format;
        }

        public function dateD(){
            if(!is_string($this -> date1) || !is_string($this -> date2) || !is_string($this -> format)){
                die("Unesite ispravan tip podatka");
            }
                $d1 = new DateTime($this -> date1);
                $d2 = new DateTime($this -> date2);
                $format = $this -> format;
                $dateDiff = $d1 -> diff($d2);
                $difference = $dateDiff -> days;
                $differenceYears = $dateDiff -> y;
                $differenceMonths = $dateDiff -> m + $differenceYears * 12;
                $differenceHours = $difference * 24;
                $differenceMinutes = $difference * 24 * 60;
                $differenceSeconds = $difference * 24 * 60 * 60;
        
                switch($format){
                    case "seconds":
                        $message = "Razlika u sekundama je " . $differenceSeconds . " sekundi.";
                    break;
                    case "minutes":
                        $message = "Razlika u minutama je " . $differenceMinutes . " minuta.";
                    break;
                    case "hours":
                        $message = "Razlika u satima je " . $differenceHours . " sati.";
                    break;
                    case "days":
                        $message = "Ukupna razlika je " . $difference . " dana.";
                    break;
                    case "months":
                        $message = "Razlika u mjesecima je " . $differenceMonths . " mjeseci.";
                    break;
                    case "years":
                        $message = "Razlika u godinama je " . $differenceYears . " godina.";
                    break;
                    default;
                        $message = $dateDiff -> format('Razlika je %y godina %m mjeseci %d dana %h sati %i minuta %s sekundi');
                    break;
                }
                $this -> result = $message;
                return $this -> result;
        }    
    }

    $d1 =  new DateDifference("25.03.1980 11:11:11","","");
    $d1 -> dateD();
    echo $d1 -> result;
?>