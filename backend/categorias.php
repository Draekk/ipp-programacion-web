<?php

include "../class/autoload.php";

$autoload = new Autoload();
$category = $autoload->category;
$database = $autoload->database;

switch($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    try {
      $id = $_POST['categoryId'];
      $name = $_POST['categoryName'];
      $category->setId($id);
      $category->setName($name);

      $database->save($category);
      header("Location: ../index.php");
      exit();
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;
  default:
    try {
      $autoload->createSession($database->findAll('categorias'), 'categories', 'lista_categorias.php');
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;
}


?>