<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>webChallenge14</title>
</head>
<body>
    <?php
        /**
         * ZADATAK - User Management Class
         * Kreirati kompletnu User Managment klasu (kompletnu koliko god je to moguće)
         * Funkcionalnosti same klase:
         * Registracija korisnika
         * Login korisnika
         * Zaboravljena lozinka ili username korisnika
         * Pozdravljanje korisnika
         * Čestitanje rođendana korisniku
         * Prikaz podataka o korisniku
         * Izmjena podataka o korisniku
         * Mijenjanje statusa korisnika
         * Brisanje korisnika
         * Napomena: Za korak dalje, možete koristiti i jednu jednostavnu bazu i pokušati sami da se konektujete i oživite do kraja sve ove navedene funkcionalnosti (ali i druge, ako želite).
         */
        class UpravljanjeKorisnicima{

            public $connection;
            public function __construct(){
                $this->connection = mysqli_connect("localhost","root","","upravljanjekorisnicima");
                mysqli_set_charset($this->connection,"utf8");
                if (!$this->connection) {
                    die("Povezivanje sa bazom nije uspjelo: " . mysqli_connect_error());
                }
            }
   
            /**
             * Funkcija za registraciju novih korisnika.
             * Ukoliko unešeno korisničko ime već postoji, javlja se poruka da je potrebno odabrati drugo korisničko ime, a u suprotnom se kreira korisnički nalog.
             */
            public function registracija($ime,$prezime,$email,$datumRodjenja,$korisnickoIme,$korisnickaLozinka){
                    $unos = "INSERT INTO korisnici (ime,prezime,email,datumRodjenja,korisnickoIme,korisnickaLozinka,kstatus) VALUES ('$ime','$prezime','$email','$datumRodjenja','$korisnickoIme','$korisnickaLozinka','1')";
                    if (mysqli_query($this->connection, $unos)) {
                        echo "Podaci su snimljeni.";
                    } else {
                        echo "Greška: " . $unos . "<br>" . mysqli_error($this->connection);
                    }
            }

            /**
             * Funkcija za prikaz korisničkih podataka
             */
            public function prikaz($korisnickoIme,$korisnickaLozinka){
                $prikaz = mysqli_query($this->connection,"SELECT * FROM korisnici WHERE korisnickoIme = '$korisnickoIme' AND korisnickaLozinka = '$korisnickaLozinka'");
            
                if(mysqli_num_rows($prikaz) > 0){
                    while($korisnik = mysqli_fetch_assoc($prikaz)){
                        echo $korisnik['ime'] . " " . $korisnik['prezime'] . "; " . $korisnik['datumRodjenja'] . "; " . $korisnik['email'];
                    }
                }
            }

            /**
             * Funkcija za prikazivanje poruke u slučaju uspješnog logovanja korisnika
             */
            public function pozdrav($korisnickoIme,$korisnickaLozinka){
                $korisnik = mysqli_query($this->connection,"SELECT * FROM korisnici WHERE korisnickoIme = '$korisnickoIme' AND korisnickaLozinka = '$korisnickaLozinka'");
                if(mysqli_num_rows($korisnik) > 0){
                    echo "Dobro došli!";
                }
            }
    
            /**
             * Funkcija za čestitanje rođendana korisniku
             */
            public function cestitka($korisnickoIme,$korisnickaLozinka){
                $trenutniDatum = Date('Y-m-d');
                $korisnik = mysqli_query($this->connection,"SELECT * FROM korisnici WHERE korisnickoIme = '$korisnickoIme' AND korisnickaLozinka = '$korisnickaLozinka'");
                if(mysqli_num_rows($korisnik) > 0){
                    $k = mysqli_fetch_assoc($korisnik);
                    $danMjesecR = substr($k['datumRodjenja'],4);
                    $danMjesecT = substr($trenutniDatum,4);
        
                    if($danMjesecR==$danMjesecT){
                        echo "Sretan rođendan!";
                    }
                }
            }

            /**
             * Funkcija koja prikazuje poruku uslijed uspješnog/neuspješnog logovanja
             */
            public function login($korisnickoIme,$korisnickaLozinka){
                $korisnik = mysqli_query($this->connection,"SELECT * FROM korisnici WHERE korisnickoIme = '$korisnickoIme' AND korisnickaLozinka = '$korisnickaLozinka'");

                if(mysqli_num_rows($korisnik) > 0){
                    echo "Uspješno ste se logovali.";
                }
                else{
                    echo "Pogrešno korisničko ime ili lozinka.";
                }
            }
    
            /**
             * Funkcija za zaboravljenu korisničku lozinku ili korisničko ime
             */
            public function reset($email){
                $korisnik = mysqli_query($this->connection,"SELECT * FROM korisnici WHERE email = '$email'");
                if(mysqli_num_rows($korisnik) > 0){
                    echo "Podaci o Vašem korisničkom nalogu će Vam biti dostavljeni na Vašu email adresu.";
                }
                else{
                    echo "Email koji ste unijeli nije registrovan u sistemu.";
                }
            }

            /**
             * Funkcija za brisanje korisnika
             */
            public function brisanje($id){
                $korisnik = mysqli_query($this->connection,"SELECT * FROM korisnici WHERE id = '$id'");
                if(mysqli_num_rows($korisnik) > 0){
                    $brisanje = mysqli_query($this->connection,"DELETE FROM korisnici WHERE id = '$id'");
                    echo "Podaci o korisniku su uspješno obrisani.";
                }
                else{
                    echo "Korisnik sa ovim ID-em ne postoji u bazi.";
                }
            }

            /**
             * Funkcija za promjenu statusa korisnika
             */
            public function statusPromjena($id,$kstatus){
                $korisnik = mysqli_query($this->connection,"SELECT * FROM korisnici WHERE id = '$id'");
                if(mysqli_num_rows($korisnik) > 0){
                    $brisanje = mysqli_query($this->connection,"UPDATE korisnici SET kstatus = '$kstatus' WHERE id = '$id'");
                    echo "Podaci o statusu su promijenjeni.";
                }
                else{
                    echo "Korisnik sa ovim ID-em ne postoji u bazi.";
                }
            }
        }
        $korisnici = new UpravljanjeKorisnicima();
        echo "<br>";
        $korisnici->registracija("Test1","Test1","test@test.com","1990-01-21","test","test");
        echo "<br>";
        $korisnici->prikaz("ime1","ime1");
        echo "<br>";
        $korisnici->pozdrav("ime1","ime1");
        echo "<br>";
        $korisnici->cestitka("ime1","ime1");
        echo "<br>";
        $korisnici->login("ime1","ime1");
        echo "<br>";
        $korisnici->reset("ime1.prezime1@email.com");
        echo "<br>";
        $korisnici->brisanje("4");
        echo "<br>";
        $korisnici->statusPromjena("5","2");
    ?>
</body>
</html>

