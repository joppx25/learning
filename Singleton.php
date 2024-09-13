<?php

class Database
{
    private static $instance;
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        // $this->connection = rand(1, 100);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

// Test if instance are equal
$test = Database::getInstance();
$test2 = Database::getInstance();
echo $test === $test2 ? "They have the same instance value" : "NOPE";
