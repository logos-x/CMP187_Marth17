<?php

namespace config;
class Database
{
    private $host = '127.0.0.1';
    private $db_name = '';
    private $username = 'root';
    private $password = 'root';
    private $port = 8889;
    private $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";port=" . $this->port, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}

?>