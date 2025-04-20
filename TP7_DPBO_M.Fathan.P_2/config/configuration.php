<?php

class Database {
    
    public $conn;

    // Database connection parameters
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "db_rentagirlfriend";

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>