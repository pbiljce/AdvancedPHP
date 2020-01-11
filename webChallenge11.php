<?php
    /**
     * ZADATAK - Destruktor i __toString
     * Prethodno kreiranu klasu (UserDate) proširiti sa:
     * Destruktorom (koji vraća true na mjesto poziva ili ispisuje da je objekat uništen (što nije naročito korisno pa je bolje koristiti true
     * __toString() metodom koji ispisuje kompletnu razliku između datuma te ostale podatke o korisniku (sve u obliku niza podataka)
     */
    class DateDifference{
        public $date1 = "";
        public $date2 = "";
        public $format = "";
        public $newDate = "";

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
                echo $message;
        }    
    }
    class DateUser extends DateDifference{
        public $ime;
        public $prezime;
        public $differenceDays;
        public function __construct($date1,$date2,$format,$ime,$prezime){
            parent::__construct($date1,$date2,$format);
            $this->ime = $ime;
            $this->prezime = $prezime;  
        }
        public function dateD(){
            $message = parent::dateD() . " - Korisnik: " . $this->ime . " " . $this->prezime;
            echo $message;
        }
        public function birthday(){
            $birthDay = substr($this -> date1,0,2);
            $birthMonth = substr($this -> date1,3,2);
            $birthMonthDay = substr($this -> date1,0,6);
            $currentDay = substr($this -> date2,0,2);
            $currentMonth = substr($this -> date2,3,2);
            $currentYear = substr($this -> date2,6);
            $currentYearPlus = (int)$currentYear + 1;
            if($birthDay==$currentDay && $birthMonth==$currentMonth){
                echo "Sretan rođendan!";
            }
            else{
                if(($birthMonth == $currentMonth && $birthDay<$currentDay) || $birthMonth < $currentMonth){
                    $newDate = $birthMonthDay . $currentYearPlus;
                }
                elseif(($birthMonth == $currentMonth && $birthDay>$currentDay) || $birthMonth > $currentMonth){
                    $newDate = $birthMonthDay . $currentYear;
                }
                $this->newDate = $newDate;
                $d1 = new DateTime($this -> newDate);
                $d2 = new DateTime($this -> date2);
                $dateDiff = $d1 -> diff($d2);
                $differenceDays = $dateDiff -> days;
                $this->differenceDays = $differenceDays;
                return "Do Vašeg rođendana je preostalo još " . $differenceDays . " dana.";
            }
        }
        public function __destruct(){
            echo "Objekat je uništen.";
        }
        public function __toString(){
            return $this->ime . " " . $this->prezime . " - do rođendana je još preostalo " . $this->differenceDays . " dana.<br>";
        }
    }


    $datumiPoruka = new DateUser("15.01.1980","","","Biljana","Mijić");
    $datumiPoruka->birthday();
    echo $datumiPoruka;
?>