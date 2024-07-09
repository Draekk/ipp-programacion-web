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
        createSession($database->findAll('categorias'), 'categories');
        header('Location: load_categorias.php');
        exit();
      } else {
        createSession($database->findAll('productos'), 'productos');
        header('Location: lista_productos.php');
        exit();
      }
    } catch (Exception $ex) {
      throw new Exception($ex->getMessage());
    }
    break;
}

function createSession($data, $nameData) {
  session_start();
  $_SESSION[$nameData] = json_encode($data);
}


?>