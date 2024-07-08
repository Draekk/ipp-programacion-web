<?php

class Database {

  private $conn;

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

  public function findAll($table) {
    try {
      $query = $this->conn->query("SELECT * FROM " . $table . " ORDER BY identificador ASC");
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }

  public function save($data) {
    try {
      if($data instanceof Categoria) {
        $query = $this->conn->prepare("INSERT INTO categorias (identificador, nombre) VALUES (:id, :name)");
        $query->bindParam(':id', $data->getId());
        $query->bindParam(':name', $data->getName());
        $query->execute();
      } else {
        $query = $this->conn->prepare("INSERT INTO productos (identificador, nombre, imagen, descripcion, precio, categoria) VALUES (:id, :name, :image, :description, :price, :category");
        $query->bindParam(':id', $data->getId());
        $query->bindParam(':name', $data->getName());
        $query->bindParam(':image', $data->getImage());
        $query->bindParam(':description', $data->getDescription());
        $query->bindParam(':price', $data->getPrice());
        $query->bindParam(':category', $data->getCategory());
        $query->execute();
      }
    } catch(Exception $ex) {
      throw new Exception($ex->getMessage());
    }
  }


}


?>