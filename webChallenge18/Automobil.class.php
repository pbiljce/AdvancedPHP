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

        public static function mjerneJedinice(){
            echo self::POTROSNJA;
            echo "<br>";
            echo self::PUT;
        }

        public function renderCharacteristics(){
            return "<p>Proizvođač: " . $this->proizvodac . "</p><p>Naziv: " . $this->naziv . "</p><p>Broj vrata: " . $this->brVrata . "</p><p>Boja: " . $this->boja . "</p><p>Potrošnja: " . $this->potrosnja . "</p><p>Jačin amotora: " . $this->jacinaMotora . "</p>";
        }

        public function __toString(){
            return $this->renderCharacteristics();
        }

        public function __destruct(){
            echo "Objekat je uništen.";
        }
    }
?>