<?php
    /**
     * Kreirati klasu Database koja mora da izvršava osnovne SQL operacije: ○ INSERT ○ UPDATE ○ SELECT ○ DELETE
     * Za svaku SQL operaciju kreirati jednu metodu
     * Klasa može da nasljeđuje Connection klasu, ili da je poziva po potrebi ili recimo unutar samog konstruktora
     * Po izboru koristiti ili PDOili MySQLiobjektni pristup
     */
    include "zadatak18_19-24.php";
    class Database{
        public $conn;
        public function __construct(){
            $connection = new Connection();
            $this->conn = $connection->connection;
        }

        public function insert($table,$column,$value){
            $sql = "INSERT INTO " . $table . "(" . $column . ")" . " VALUES (" . $value . ")";
            $this->conn->exec($sql);
            echo "Podaci su uspješno snimljeni.";
        }

        public function update($table,$column,$value,$where){
             $sql = ("UPDATE " . $table . " SET " . $column . "=" . $value . " " . $where);
             $stmt = $this->conn->prepare($sql);
             $stmt->execute();
             echo "Podaci su uspješno izmijenjeni";
        }
        
        public function select($table,$what,$where=null){
            $sql = $this->conn->prepare("SELECT " . $what . " FROM " .  $table . " " . $where);
            $sql->execute();
            $result = $sql->fetchAll();
            return $result;
        }
        
        public function delete($table,$where){
             $sql = ("DELETE FROM " . $table . " " . $where);
             $this->conn->exec($sql);
             echo "Podaci su uspješno obrisani";
        }
    }
    //$baza = new Database();
    //$baza->select("book","*");
    //$baza->insert("book","book_title,book_price,book_author,book_publisher,book_status,book_datetime","'Knjiga Naslov 55', '20,5', 'Knjiga Autor 1', 'Knjiga Izdavač 1', '1', '12.12.2020'");
    //$baza->update("book","book_price","100","WHERE book.book_id=3");
    //$baza->delete("book","WHERE book.book_id=7");
?>