<!DOCTYPE html>
    <!-- 
    Klasu Bookstore proširiti sa metodama koje se bave:
    Unosom knjiga unutar baze za knjige
    Dobijanjem knjiga iz baze za knjige (zajedno sa filtracijom)
    Brisanjem knjiga iz baze podataka (mijenjanjem kolone book_status, a ne bukvalnim brisanjem)
    Uređivanjem podataka iz baze (book_id nemojte nikada mijenjati)
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
    include "zadatak18_19-24.php";
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
            public $conn;

            public function __construct($price,$title,$publisher,$author){
                parent::__construct($price,$title);
                $this->publisher = $publisher;
                $this->author = $author;
                $connection = new Connection();
                $this->conn = $connection->connection;
            }

            public function __toString(){
                return parent::__toString() . ", " . $this->publisher . ", " . $this->author;
            }

            public function row(){
                echo "<tr><td>Title: " . $this->title . ";</td><td> Price: " . $this->price . ";</td><td> Publisher: " . $this->publisher . ";</td><td> Author: " . $this->author . "</td></tr>";
            }

            public function insert($book_title,$book_price,$book_author,$book_publisher,$book_status="1",$book_datetime=null){
                $book_datetime=date("d.m.Y");
                $sql = $this->conn->prepare("INSERT INTO book (book_title,book_price,book_author,book_publisher,book_status,book_datetime) VALUES (:book_title,:book_price,:book_author,:book_publisher,:book_status,:book_datetime)");
                $sql->execute([":book_title"=>$book_title,":book_price"=>$book_price,":book_author"=>$book_author,":book_publisher"=>$book_publisher,":book_status"=>$book_status,":book_datetime"=>$book_datetime]);
                echo "Podaci su uspješno snimljeni.";
            }

            public function select($what,$where=null){
                $sql = $this->conn->prepare("SELECT " . $what . " FROM book " . $where);
                $sql->execute();
                $result = $sql->fetchAll();
                return $result;
            }

            public function delete($id){
                $sql = $this->conn->prepare("UPDATE book SET book_status='0' WHERE book_id=$id");
                $sql->execute();
                echo "Podaci su uspješno obrisani.";
            }

            public function update($column,$value,$where){
                $sql = $this->conn->prepare("UPDATE book SET " . $column . "='" . $value . "' " . $where);
                $sql->execute();
                echo "Podaci su uspješno izmijenjeni";
            }
        }

        //$book1 = new Bookstore("10","Title1","Publisher1","Author1");
        //$book2 = new Bookstore("20","Title2","Publisher2","Author3");
        //$book3 = new Bookstore("30","Title3","Publisher3","Author3");
        //$book4 = new Bookstore("","","","");
        //$book4->insert("Title10","80","Author10","Publisher10");
        //$book4->select("book_title,book_price,book_author,book_publisher","WHERE book_id=13");
        //$book4->delete("13");
        //$book4->update("book_title","Naziv novi","WHERE book.book_id=13");

    ?>
</body>
</html>
