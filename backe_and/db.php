<?php
class Database{
    private $host = "localhost";
    private $dbname = "bloge";
    private $username = "root";
    private $passworde = "";

    private $conn;


    public function getConnection(){
        $this->conn = null;

        try{
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->passworde);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Connection error" . $e->getMessage();
    }

    return $this->conn;
}
}