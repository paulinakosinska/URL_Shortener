<?php

class DB {
    private $servername = "localhost";
    private $dbname = "shortener";
    private $username = "root";
    private $password = "root";
    private $connection;

    public function __construct(){
        try {
            $this->connection = new \PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //____________________________

    public function query($query) {
        try {
            $result = $this->connection->query($query);
            return $result->fetch(\PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function executeQuery($query) {
        try {
            $result = $this->connection->exec($query);
            return $this->connection->lastInsertId();
        }
        catch(Exception $e)
        {
            echo "Query failed: " . $e->getMessage();
        }
    }

}

