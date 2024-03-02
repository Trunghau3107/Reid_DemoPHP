<?php
namespace App\config;

class ConnectDB
{
    private $host = 'localhost';
    private $dbname = 'php2';
    private $username = 'root';
    private $password = 'trantrunghau3174';

    function connection()
    {
        try {
            $conn = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>