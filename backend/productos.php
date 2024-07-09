<?php
include "../class/autoload.php";

$autoload = new Autoload();
$database = $autoload->database;
$product = $autoload->product;

switch($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    try {
      $id = $_POST['productId'];
      $name = $_POST['productName'];
      $img = $_POST['productImg'];
      $description = $_POST['productDescription'];
      $price = $_POST['productPrice'];
      $category = $_POST['productCategory'];

      $product->setId($id);
      $product->setName($name);
      $product->setImage($img);
      $product->setDescription($description);
      $product->setPrice($price);
      $product->setCategory($category);
      $database->save($product);
      header("Location: ../index.php");
      exit();
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;

  default:
    try {
      if(isset($_GET['forProducts'])) {
        $autoload->createSession($database->findAll('categorias'), 'categories', 'load_categorias.php');
      } else {
        $autoload->createSession($database->findAll('productos'), 'productos', 'lista_productos.php');
      }
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;
}




?>