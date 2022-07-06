<?php

class Database
{


    //PDO Connection
    public $pdo = null;

    public function __construct()
    {

        try {

            $servername = $_ENV["DB_SERVERNAME"];
            $username = $_ENV["DB_USERNAME"];
            $password = $_ENV["DB_PASSWORD"];
            $dbname = $_ENV["DB_NAME"];


            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }


        return null;
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection()
    {
        if ($this->pdo != null) {
            $this->pdo = null;
        }
    }
}
