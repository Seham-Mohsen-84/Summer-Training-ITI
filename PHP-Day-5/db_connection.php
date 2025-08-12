<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "summer_iti";
    private $port = "3307";

    private $conn;

    public function __construct(){
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public function Insert($table, $columns, $values){
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }

    public function Update($table, $set, $where){
        $sql = "UPDATE $table SET  $set WHERE $where";
        return $this->conn->query($sql);
    }

    public function Delete($table, $where){
        $sql = "DELETE FROM $table WHERE $where";
        return $this->conn->query($sql);
    }

    public function Select($table, $columns, $where){
        $sql = "SELECT $columns FROM $table WHERE $where";
        return $this->conn->query($sql);
    }

    public function SelectAll($table){
        $sql = "SELECT * FROM $table";
        return $this->conn->query($sql);
    }
}
