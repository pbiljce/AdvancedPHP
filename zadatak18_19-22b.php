<!DOCTYPE html>
<!-- 
    Prethodnu klasu Books doraditi:
    Definisati konstruktor koji treba da incijalizuje vrijednosti tokom instanciranja klase
    Definisati toString() metod koji će ispisati kompletan objekat sa njegovim podacima
    Definisati poseban metod koji renderuje HTML red za tabelu (bez stilizacije)
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books - 2. dio</title>
</head>
<body>
    <?php
        class Books{
            protected $price;
            protected $title;

            public function __construct($price,$title){
                $this->price = $price;
                $this->title = $title;
            }

            public function __get($name){
                return $this->$name;
            }

            public function __set($name,$value){
                $this->$name = $value;
            }

            public function __toString(){
                return $this->title . ", " . $this->price;
            }

            public function row(){
                echo "<tr><td>Title: " . $this->title . ";</td><td> Price: " . $this->price . "</td></tr>";
            }
        }

        $book1 = new Books(10,"Title1");
        $book2 = new Books(20,"Title2");
        $book3 = new Books(30,"Title3");

        echo $book2->row();
    ?>
</body>
</html>
