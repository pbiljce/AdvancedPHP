<?php
    /**
     * ZADATAK - Metoda
     * Prethodno kreiranu klasu modificirati:
     * Dodati još jedno polje za rezultat razlike između dva datuma
     * Dodati metodu koja računa razliku između dva datuma
     * Metoda u polje za rezultat smješta razliku te vraća to polje na mjesto poziva
     */
    class DateDifference{
        public $date1 = "25.03.1980";
        public $date2 = "01.01.2020";
        public $format = "years";
        public $result = "";

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

    $d1 =  new DateDifference();
    $d1 -> dateD();
    echo $d1 -> result;
?>

