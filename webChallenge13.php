<?php
    /**
     * Kreirati PHP kalkulator klasu koja prihvata dva parametra (dva broja) te ta dva broja sabira, oduzima, množi i dijeli
     * Potrebno je da klasa ima posebne metode za vraćanje rezultata svake računske operacije, dok metoda __toString() vraća u obliku stringa rezultate svih operacija izvršenih nad ova dva ulazna parametra/broja.
     */
    class Kalkulator{
        public $broj1;
        public $broj2;

        public function __construct($br1,$br2){
            $this->broj1=$br1;
            $this->broj2=$br2;
        }

        public function sabiranje(){
            $sabiranje = $this->broj1 + $this->broj2;
            return $sabiranje;
        }

        public function oduzimanje(){
            $oduzimanje = $this->broj1 - $this->broj2;
            return $oduzimanje;
        }

        public function mnozenje(){
            $mnozenje = $this->broj1 * $this->broj2;
            return $mnozenje;
        }

        public function dijeljenje(){
            $dijeljenje = $this->broj1 / $this->broj2;
            return $dijeljenje;
        }

        public function __toString(){
            return $this->broj1 . "+" . $this->broj2 . "=" . $this->sabiranje() . "<br>" . $this->broj1 . "-" . $this->broj2 . "=" . $this->oduzimanje() . "<br>" . $this->broj1 . "*" . $this->broj2 . "=" . $this->mnozenje() . "<br>" . $this->broj1 . "/" . $this->broj2 . "=" . $this->dijeljenje();
        }
    }

    $rezultat = new Kalkulator(100,20);
    echo $rezultat;
?>