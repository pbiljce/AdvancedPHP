<?php
    /**
     * ZADATAK - Konstruktor
     * Prethodno kreiranu klasu (DateDifference) proširiti tako da dobije konstruktor, ulazne parametre i izlaz na osnovu ulaznih parametara (vrijednost više ne trebaju biti hardkodirane)
     * Konstruktor treba da prima tri podatka (dateOne, dateTwo, exportType) te da te ulazne podatke mapira na ranije kreirane promjenljive (svojstva) unutar klase
     */
    class DateDifference{
        public $date1 = "";
        public $date2 = "";
        public $format = "";
        public $result = "";

        public function __construct($date1,$date2,$format){
            $this -> date1 = $date1;
            $this -> date2 = $date2;
            $this -> format = $format;
        }

        public function dateD(){
            $d1 = new DateTime($this -> date1);
            $d2 = new DateTime($this -> date2);
            $format = $this -> format;
 
            $dateDiff = $d1 -> diff($d2);
            $difference = $dateDiff -> days;
            $differenceYears = $dateDiff -> y;
            $differenceMonths = $dateDiff -> m + $differenceYears * 12;
    
            switch($format){
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
                    $message = $dateDiff -> format('Razlika je %d dana %m mjeseci i %y godina');
                break;
            }
            $this -> result = $message;
            return $this -> result;
        }
    }

    $d1 =  new DateDifference("25.03.1980","01.01.2020","days");
    $d1 -> dateD();
    echo $d1 -> result;
?>