<?php
class Database {
    public function __construct(
        private $host = getenv('DB_HOST'),
        private $username = getenv('DB_USER'),
        private $password = getenv('DE_PASS'),
        private $dbName = getenv('DE_NAME'),
        private $conn = null
    ) {}
    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName}",
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}