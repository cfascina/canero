<?php

class Database
{
  private $host = "127.0.0.1";
  private $database = "canero";
  private $username = "root";
  private $password = "<@HBqYQ2";

  public $conn;

  public function getConnection()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO(
        "mysql:host=" . $this->host . 
        ";dbname=" . $this->database, 
        $this->username, 
        $this->password
      );
      $this->conn->exec("set names utf8");
    }
    catch(PDOException $exception) {
      echo "Error connecting to database: " . $exception->getMessage();
    }
    return $this->conn;
  }
}

?>