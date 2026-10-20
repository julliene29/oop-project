<?php
class database{
    private $connection;
    public function __construct(){

    $host="localhost";
    $dbname="oop";
    $username="root";
    $password="";
    $this->connection = new PDO(
    "mysql:host=localhost;dbname=oop;charset=utf8mb4",
    $username,
    $password
);
    $this->connection ->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
    );
    }
public function getConnection():PDO
{
    return $this->connection;
}
}
?>