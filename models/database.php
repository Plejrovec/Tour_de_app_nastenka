<?php 
class Database {
    // DB Params
    private $host = 'beslkfubiaam6sbwkadq-mysql.services.clever-cloud.com';
    private $db_name = 'beslkfubiaam6sbwkadq';
    private $username = 'uifygli3oj8swltu';
    private $passowrd = 'K7Cn5yNEz33TodWcHWQA';
    private $conn;

    //DB connect
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname='. $this->db_name, $this->username, $this->passowrd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}