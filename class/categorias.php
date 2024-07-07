<?php

class Categoria {

  private $id;
  private $name;

  //Constructors

  public function __construct($id = null, $name = null) {
    $this->id = $id;
    $this->name = $name;
  }

  //Getters and Setters
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
}


?>