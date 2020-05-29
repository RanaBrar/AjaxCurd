<?php

class Database
{

    public $conn;
    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "student";
        $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!$this->conn) {
            echo "connection failed !!!";
        }
    }
}
// $obj = new Database;
