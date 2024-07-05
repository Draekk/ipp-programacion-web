<?php

class Database {

  public $conn;

  public function __construct($driver, $host, $user, $pass, $db) {
    try {
      $this->conn = new PDO("$driver:host=$host;dbname=$db", $user, $pass);
    } catch (PDOException $ex) {
      throw new Exception($ex->getMessage());
    }
  }

  public function getConn() {
    return $this->conn;
  }


}


?>