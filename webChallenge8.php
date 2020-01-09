<?php
    /**
     * ZADATAK - Provjera ulaznih podataka
     * U prethodnoj kreiranoj klasi provjeriti ulazne podatke/parametre (u našem slučaju da li su String)
     * Ako parametri nisu String prekinuti izvršavanje klase, odnosno objekta koji je od nje instanciran
     * Također, potrebno je dodati podrazumijevane vrijednosti za prvi i drugi parametar kako objekat ne bi pravio grešku kada se proslijedi samo prvi parametar (a i kako bi bila olakšana upotreba same klase)
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
                    $date2 = Date("d.m.Y");
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
                        $message = $dateDiff -> format('Razlika je %y godina %m mjeseci %d dana');
                    break;
                }
                $this -> result = $message;
                return $this -> result;
        }    
    }

    $d1 =  new DateDifference("25.03.1980","","");
    $d1 -> dateD();
    echo $d1 -> result;
?>