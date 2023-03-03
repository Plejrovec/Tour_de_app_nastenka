<?php 
    class Database {
        // DB Params
        private $host = 'sql7.freemysqlhosting.net';
        private $db_name = 'sql7602650';
        private $username = 'sql7602650';
        private $passowrd = 'sUzblCqDsV';
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