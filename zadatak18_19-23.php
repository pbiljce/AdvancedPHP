<!DOCTYPE html>
    <!-- 
    Kreirati novu klasu Bookstore koja nasljeđuje klasu Books
    Klasa Bookstore sadrži i nove atribute publisher i author
    Proširiti konstruktor tako da smješta i ove atribute kao i da poziva roditeljski konstruktor
    Proširiti toString() metod tako da ispisuje i ove atribute
    Proširiti metod  za render HTML reda, tako da ispis uključuje i ove atribute
    -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore</title>
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

        class Bookstore extends Books{
            protected $publisher;
            protected $author;

            public function __construct($price,$title,$publisher,$author){
                parent::__construct($price,$title);
                $this->publisher = $publisher;
                $this->author = $author;
            }

            public function __toString(){
                return parent::__toString() . ", " . $this->publisher . ", " . $this->author;
            }

            public function row(){
                echo "<tr><td>Title: " . $this->title . ";</td><td> Price: " . $this->price . ";</td><td> Publisher: " . $this->publisher . ";</td><td> Author: " . $this->author . "</td></tr>";
            }
        }

        $book1 = new Bookstore(10,"Title1","Publisher1","Author1");
        $book2 = new Bookstore(20,"Title2","Publisher2","Author3");
        $book3 = new Bookstore(30,"Title3","Publisher3","Author3");

        echo $book2->row();
    ?>
</body>
</html>
