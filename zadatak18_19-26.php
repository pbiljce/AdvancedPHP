<?php
    /**
     * Kreirati statičnu klasu Database koja mora da izvršava osnovne SQL operacije: ○ INSERT ○ UPDATE ○ SELECT ○ DELETE
     * Za svaku SQL operaciju kreirati jednu metodu
     * Klasa može da nasljeđuje Connection klasu, ili da je poziva po potrebi ili recimo unutar samog konstruktora
     * Razlika između ovog i prethodnog zadatka jeste to što je sada Database klasa statična, pa ne moramo svaki put raditi instanciranje za rad sa njom, te služi kao Wrapper
     * Po izboru koristiti ili PDOili MySQLi objektni pristup
     */
    include "zadatak18_19-24.php";
    class Database{
        public static $conn;
        public static function connect(){
            $connection = new Connection();
            self::$conn = $connection->connection;
        }

        public static function insert($table,$column,$value){
            self::connect();
            $sql = "INSERT INTO " . $table . "(" . $column . ")" . " VALUES (" . $value . ")";
            self::$conn->exec($sql);
            echo "Podaci su uspješno snimljeni.";
        }

        public static function update($table,$column,$value,$where){
            self::connect();
            $sql = ("UPDATE " . $table . " SET " . $column . "=" . $value . " " . $where);
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            echo "Podaci su uspješno izmijenjeni";
        }
        
        public static function select($table,$what,$where=null){
            self::connect();
            $sql = self::$conn->prepare("SELECT " . $what . " FROM " .  $table . " " . $where);
            $sql->execute();
            $result = $sql->fetchAll();
            return $result;
        }
        
        public static function delete($table,$where){
            self::connect();
            $sql = ("DELETE FROM " . $table . " " . $where);
            self::$conn->exec($sql);
            echo "Podaci su uspješno obrisani";
        }
    }

    //Database::insert("book","book_title,book_price,book_author,book_publisher,book_status,book_datetime","'Knjiga Naslov 7', '20,5', 'Knjiga Autor 1', 'Knjiga Izdavač 1', '1', '12.12.2020'");
    //Database::select("book","*");
    //Database::update("book","book_price","10","WHERE book.book_id=6");
    //Database::delete("book","WHERE book.book_id=8");
?>