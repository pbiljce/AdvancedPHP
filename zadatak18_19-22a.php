<!DOCTYPE html>
<!-- 
    Definisati klasu Books koja se sastoji od atributa price i title
    Proširiti klasu Books tako što ćete u nju dodati get()i set()metode
    Definisati tri objekta klase Books i dodijeliti im odgovarajuće vrijednosti za svaki od atributa (proizvoljno, prema polaznikovom izboru)
    Ispisati sadržaj objekata u jednu HTML stilizovanu tabelu
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books - 1 dio</title>
    <style>
        table, tr, td, th{
            border: 1px solid #000000;
            border-collapse: collapse;
        }
        tr th{
            background-color:#99ddff;
        }
        td, th{
            width: 200px;
            text-align:center;
        }
    </style>
</head>
<body>
    <?php
        class Books{
            protected $price;
            protected $title;

            public function __get($name){
                return $this->$name;
            }

            public function __set($name,$value){
                $this->$name = $value;
            }
        }

        $book1 = new Books();
        $book2 = new Books();
        $book3 = new Books();
        $book1->price = 10;
        $book2->price = 20;
        $book3->price = 30;
        $book1->title = "Title1";
        $book2->title = "Title2";
        $book3->title = "Title3";

        $book = "";
        echo "<table>";
            echo "<tr><th>Item number</th><th>Title</th><th>Price</th></tr>";
            for($i = 1;$i < 4;$i++){
                $book = "book" . $i;
                echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $$book->title . "</td>";
                    echo "<td>" . $$book->price . "</td>";
                echo "</tr>";
            }
        echo "</table>";
    ?>
</body>
</html>
