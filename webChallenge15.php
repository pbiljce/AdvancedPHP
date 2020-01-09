<?php
    /**
     * Kreirati klasu koja generalno definira jednu osobu (ime, prezime, datum rođenja)
     * Naslijediti ovu generalnu klasu koju smo kreirali u novu klasu koja generalno definira jednog korisnika sistema ITAcademy (recimo: radno mjesto - npr. koordinator nastave ili profesor, itd., username i password za sistem, grad iz kojeg dolazi) - dodaje nove podatke
     * Podrazumijevano je da ove klase imaju konstruktor, __toString() metodu za ispis kompletnog objekta, te metodu koja vraća traženi podatak
     * Za kraj, naslijediti i ovu klasu u specijalizaciji dva puta, tako da nove klase budu finalne te da opisuju zaposlenike (prva klasa) i studente (druga klasa). Ovdje možete dodati neka posebna svojstva. Recimo za profesore možete dodati predmete koje predaju, njihove glavne prednosti (recimo koji jezik najbolje znaju u kodiranju), ili za studente dodati ocjene iz određenih predmeta, glavne prednosti također i slično.
     * Na kraju, instancirati po jedan objekat uz prosljeđivanje potrebnih parametara iz ovih finalnih klasa (Zaposlenik i Student) te pozvati metode za ispis podataka iz njih.
     */
    class Osoba{
        public $ime;
        public $prezime;
        public $datumRodjenja;

        public function __construct($ime,$prezime,$datumRodjenja){
            $this->ime = $ime;
            $this->prezime = $prezime;
            $this->datumRodjenja = $datumRodjenja;
        }

        public function osnovniPodaci(){
            return $this->ime . " " . $this->prezime . ", " . $this->datumRodjenja;
        }

        public function __toString(){
            return $this->osnovniPodaci;
        }
    }

    class Korisnik extends Osoba{
        public $korisnickoIme;
        public $lozinka;
        public $grad;
        public function __construct($ime,$prezime,$datumRodjenja,$korisnickoIme,$lozinka,$grad){
            parent::__construct($ime,$prezime,$datumRodjenja);
            $this->korisnickoIme = $korisnickoIme;
            $this->lozinka = $lozinka;
            $this->grad = $grad;
        }

        public function osnovniPodaci(){
            return parent::osnovniPodaci() . ", " . $this->grad;
        }

        public function __toString(){
            return $this->osnovniPodaci();
        }
    }

    final class Zaposlenik extends Korisnik{
        public $predmet;
        public $prednost;
    }

    final class Student extends Korisnik{
        public $ocjena;
        public $prednost;
    }

    $zaposlenik = new Zaposlenik("Ime1","Prezime1","20.02.1960","ime1","","Grad1");
    echo $zaposlenik;
    echo "<br>";
    $student = new Student("Ime2","Prezime2","20.02.1990","ime2","","Grad2");
    echo $student;
?>