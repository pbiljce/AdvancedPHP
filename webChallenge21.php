<?php
    /**
     * Kompletnu klasu o automobilima instancirati u novi objekat
     * Novi objekat serijalizirati
     * koristiti funkciju: serialize($object)
     * Serijalizirani objekat smjestiti u fajl
     * koristiti funkciju: file_put_contents(‘serObj.txt’, $serializedObject);
     */

    trait Auto{
        public function turnOnLights(){
            echo "Svjetla upaljena";
        }
        public function turnOffLights(){
            echo "Svjetla ugašena";
        }
        public function blinkLights(){
            echo "Svjetla blinkaju";
        }
        public function turnOnLongLights(){
            echo "Duga svjetla upaljena";
        }
        public function turnOnBlinker($side){
            echo $side . " žmigavac upaljen";
        }
        public function turnOffBlinker($side){
            echo $side . " žmigavac ugašen";
        }
    }

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
        use Auto;
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

    $automobil = new Automobil("Suzuki","Vitara","4","plava","5","77");
    serialize($automobil);
    file_put_contents("serObj.txt", $automobil);
?>
