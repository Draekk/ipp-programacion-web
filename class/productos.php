<?php

class Producto {

  private $id;
  private $name;
  private $image;
  private $description;
  private $price;
  private $category;

  //Constructor
  public function __construct($id = null, $name = null, $image = null, $description = null, $price = null, $category = null) {
    $this->id = $id;
    $this->name = $name;
    $this->image = $image;
    $this->description = $description;
    $this->price = $price;
    $this->category = $category;
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

  public function getImage() {
    return $this->image;
  }

  public function setImage($image) {
    $this->image = $image;
  }  

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getPrice() {
    return $this->price;
  }

  public function setPrice($price) {
    $this->price = $price;
  }

  public function getCategory() {
    return $this->category;
  }

  public function setCategory($category) {
    $this->category = $category;
  }

}


?>