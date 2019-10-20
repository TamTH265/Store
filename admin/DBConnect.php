<?php
    class DBConnect {
        private $servername = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'vachnganve_db';

        public function connect() {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            mysqli_set_charset($conn, 'UTF8');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            return $conn;
        }
    }
?>