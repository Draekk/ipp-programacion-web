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

  public function save($data) {
    try {
      if($data instanceof Categoria) {
        $insert = $this->conn->prepare("INSERT INTO categorias (identificador, nombre) VALUES (:id, :name)");
        $insert->bindParam(':id', $data->getId());
        $insert->bindParam(':name', $data->getName());
        $insert->execute();
      }
    } catch(Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }


}


?>