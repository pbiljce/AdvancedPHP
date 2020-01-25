<?php
    /**
     *Kreirati klasu Connection koja se konektuje na bazu i vraća konekcioni objekat
     *Jednu verziju klase Connection uraditi sa PDO, drugu verziju uraditi sa MySQLi objektnim pristupom
     */
    class Connection{
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "users";
        public $connection;
    
        //MySQLi objektni pristup
        /*public function __construct(){
            $this->connection = new mysqli($this->servername,$this->username,$this->password,$this->database);
            if($this->connection->connect_error){
                die("Konekcija nije uspjela - " . $this->connection->connect_error);
            }
            else{
                echo "Konekcija je uspostavljena";
            }
        }*/

        //PDO
        public function __construct(){
            try{
                $this->connection = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->database,$this->username,$this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                echo "Konekcija je uspostavljena";
            }
            catch(PDOException $e){
                echo "Konekcija nije uspjela" . $e->getMessage();
            }
        }
    }

    $baza = new Connection();
    echo "<br>";
?>
