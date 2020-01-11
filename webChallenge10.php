<?php
    /**
     * ZADATAK - Nasleđivanje klase
     * Prethodno kreiranu klasu (DateDifference) naslijediti u novu klasu koja se zove DateUser
     * Nova klasa treba da koristi roditeljski konstruktor kao i roditeljske metode za računanje i ispis razlike u datumu
     * Nova klasa treba da omogući funkcionalnosti čestitanje rođendana korisniku (ako se desi poklapanje sa unesenim rođendanom), odbrojavanje dana do njegovog rođendana i mogućnost da isključi čestitanje rođendana
     * U suštini, potrebno je kreirati par svojstava (promjenljivih) i par metoda (funkcija) za ove funkcionalnosti
     * Napomena: Možete dodati i svojstva za ime, prezime, username, password korisnika i slično. (Da proširite klase.)
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
                echo "Do Vašeg rođendana je preostalo još " . $differenceDays . " dana.";
            }
        }
    }


    $datumiPoruka = new DateUser("15.01.1980","","","Biljana","Mijić");
    $datumiPoruka->dateD();
    echo "<br>";
    $datumiPoruka->birthday();
?>