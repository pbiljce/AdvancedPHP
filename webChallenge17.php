<?php
    /**U klasi o automobilima implementirati __get() i __set() metode
     * Kreirati statičku metodu koja vraća mjerne jedinice koje koristimo unutar klase:
     * za potrošnju
     * za pređeni put
     * Kod iz __toString() metode prebaciti u renderCharacteristics() metod, a unutar __toString() metoda pozvati renderCharacteristics() metod */
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
        protected $proizvodac;
        protected $naziv;
        protected $brVrata;
        protected $boja;
        protected $potrosnja;
        protected $jacinaMotora;
        const POTROSNJA = "litara na sto kilometara";
        const PUT = "km";

        public function __construct($proizvodac, $naziv, $brVrata, $boja, $potrosnja, $jacinaMotora){
            $this->proizvodac = $proizvodac;
            $this->naziv = $naziv;
            $this->brVrata = $brVrata;
            $this->boja = $boja;
            $this->potrosnja = $potrosnja;
            $this->jacinaMotora = $jacinaMotora;
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name,$value){
            $this->$name = $value;
        }

        public static function mjerneJedinice(){
            echo self::POTROSNJA;
            echo "<br>";
            echo self::PUT;
        }

        public function renderCharacteristics(){
            return "<p>Proizvođač: " . $this->proizvodac . "</p><p>Naziv: " . $this->naziv . "</p><p>Broj vrata: " . $this->brVrata . "</p><p>Boja: " . $this->boja . "</p><p>Potrošnja: " . $this->potrosnja . "</p><p>Jačina motora: " . $this->jacinaMotora . "</p>";
        }

        public function __toString(){
            return $this->renderCharacteristics();
        }

        public function __destruct(){
            echo "Objekat je uništen.";
        }
    }

    $automobil = new Automobil("Suzuki","Jimny","4","plava","5","66");
    echo $automobil;
    echo "<br>";
    Automobil::mjerneJedinice();
    echo "<br>";

?>