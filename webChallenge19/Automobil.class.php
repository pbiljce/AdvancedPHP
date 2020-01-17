<?php
namespace Automobil;
use AutomobilFunkcije;

    class Automobil extends AutomobilFunkcije\AutomobilFunkcije{
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

        public function openDoor($side){
            echo $side . " vrata su otvorena";
        }
        public function closeDoor($side){
            echo $side . " vrata su zatvorena";
        }
        public function fixDoor($side){
            echo $side . " vrata treba popraviti";
        }
        public function startEngine(){
            echo "Automobil je upaljen";
        }
        public function shutdownEngine(){
            echo "Automobil je ugašen";
        }
        public function fixEngine(){
            echo "Motor je popravljen";
        }
        public function go(){
            echo "Kreni";
        }
        public function stop(){
            echo "Stani";
        }
        public function break(){
            echo "Prekini";
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
?>
