<?php
    /**
     * Kreirati klasu o automobilima, koja ima sljedeće karakteristike:
     * __construct($proizvodac, $naziv, $brVrata, $boja, $potrosnja, $jacinaMotora) metodu
     * __destruct() metodu koja javlja kada je objekat uništen
     * __toString() metodu koja ispisuje HTML listu karakteristika automobila
     * Potrebno je da klasa implementira apstraktnu klasu koja ima metode:
     * openDoor();
     * closeDoor();
     * fireUp();
     * shutDown();
     */
    abstract class AutomobilFunkcije{
        public function openDoor(){

        }
        public function closeDoor(){
            
        }
        public function fireUp(){
            
        }
        public function shutDown(){
            
        }
    }

    class Automobil extends AutomobilFunkcije{
        public $proizvodac;
        public $naziv;
        public $brVrata;
        public $boja;
        public $potrosnja;
        public $jacinaMotora;

        public function __construct($proizvodac, $naziv, $brVrata, $boja, $potrosnja, $jacinaMotora){
            $this->proizvodac = $proizvodac;
            $this->naziv = $naziv;
            $this->brVrata = $brVrata;
            $this->boja = $boja;
            $this->potrosnja = $potrosnja;
            $this->jacinaMotora = $jacinaMotora;
        }

        public function __toString(){
            return "<p>Proizvođač: " . $this->proizvodac . "</p><p>Naziv: " . $this->naziv . "</p><p>Broj vrata: " . $this->brVrata . "</p><p>Boja: " . $this->boja . "</p><p>Potrošnja: " . $this->potrosnja . "</p><p>Jačin amotora: " . $this->jacinaMotora . "</p>";
        }

        public function __destruct(){
            echo "Objekat je uništen.";
        }
    }

    $automobil = new Automobil("Suzuki","Jimny","4","plava","5","66");
    echo $automobil;
?>